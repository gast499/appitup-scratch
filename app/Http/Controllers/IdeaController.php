<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;
use App\Repositories\IdeaRepository;
use App\Repositories\CategoriesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\User;
use App\Models\Category;
use App\Models\Idea;
use Illuminate\Support\Facades\DB;

class IdeaController extends AppBaseController
{
    /** @var  IdeaRepository */
    private $ideaRepository;
    private $categoryRepository;

    public function __construct(IdeaRepository $ideaRepo, CategoriesRepository $categoryRepo)
    {
        $this->ideaRepository = $ideaRepo;
        $this->categoryRepository = $categoryRepo;
    }
    private function matchPlatform(User $creator, Idea $idea){
        if ($creator->platform == $idea->platform){
            return 1;
        }
        return 0;
    }

    private function matchCategories(User $creator, Idea $idea){
        $creatorCats = $creator->categories;
        $dreamerCats = $idea->categories;
        $num = 0;
        foreach($creatorCats as $cc){
            if(in_array($cc, $dreamerCats)){
                $num+=1;
            }
        }
        return $num;
    }

    private function calcMatch(User $creator, Idea $idea){
//        dd($this->matchCategories($creator, $idea));
        dd($idea);

    }

    public function match(Request $request, Idea $idea){
        //$creators = DB::table('users')->where('type', 'Creator')->get();

        $creators = User::where('type', 'Creator')->get();
        $matchVals = [];
        foreach ($creators as $creator){
            $val = $this->calcMatch($creator, $idea);
            $matchVals[$creator->id] = $val;
        }

    }
    /**
     * Display a listing of the Idea.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ideaRepository->pushCriteria(new RequestCriteria($request));
        $ideas = $this->ideaRepository->all();

        $categories = Category::pluck('name', 'id');
        return view('ideas.index')
            ->with('ideas', $ideas)
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new Idea.
     *
     * @return Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->all();
        return view('ideas.create')->with('categories', $categories);
    }

    /**
     * Store a newly created Idea in storage.
     *
     * @param CreateIdeaRequest $request
     *
     * @return Response
     */
    public function store(CreateIdeaRequest $request)
    {
        if ($request['categories']) {
            $cats = json_decode($request["categories"]);
            $this->validate($request, [
                'categories' => "required"
            ]);
        }
        $input = $request->except('categories');

        $idea = $this->ideaRepository->create($input);
        $user = User::find($request->user()->id);
        $user->ideas()->attach($idea->id);
        foreach ($cats as $cat) {
            $idea->categories()->attach($cat);
        }

        Flash::success('Idea saved successfully.');
        $this->match($idea);
        return redirect()->route('idea.match', ['idea'=>$idea]);
//        return redirect(route('ideas.index'));
    }

//    public function store(Request $request)
//    {
//        $user = User::find($request->user()->id);
//        if($request['platform']){
//            $this->validate($request, [
//                'platform' => Rule::in(['Android', 'iOS', 'Web'])
//            ]);
//            $platform = $request['platform'];
//        }
//        if($request['categories']){
//            $cats = json_decode($request["categories"]);
//            $this->validate($request, [
//                'categories' => "required"
//            ]);
//
//        }
//        $input = $request->all();
//
//        $idea = $this->ideaRepository->create($input);
//
//        Flash::success('Idea saved successfully.');
//
//        return redirect(route('ideas.index'));
//    }

    /**
     * Display the specified Idea.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $idea = $this->ideaRepository->findWithoutFail($id);

        if (empty($idea)) {
            Flash::error('Idea not found');

            return redirect(route('ideas.index'));
        }

        return view('ideas.show')->with('idea', $idea);
    }

    /**
     * Show the form for editing the specified Idea.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $idea = $this->ideaRepository->findWithoutFail($id);

        if (empty($idea)) {
            Flash::error('Idea not found');

            return redirect(route('ideas.index'));
        }

        return view('ideas.edit')->with('idea', $idea);
    }

    /**
     * Update the specified Idea in storage.
     *
     * @param  int $id
     * @param UpdateIdeaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIdeaRequest $request)
    {
        $idea = $this->ideaRepository->findWithoutFail($id);

        if (empty($idea)) {
            Flash::error('Idea not found');

            return redirect(route('ideas.index'));
        }

        $idea = $this->ideaRepository->update($request->all(), $id);

        Flash::success('Idea updated successfully.');

        return redirect(route('ideas.index'));
    }

    /**
     * Remove the specified Idea from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $idea = $this->ideaRepository->findWithoutFail($id);

        if (empty($idea)) {
            Flash::error('Idea not found');

            return redirect(route('ideas.index'));
        }

        $this->ideaRepository->delete($id);

        Flash::success('Idea deleted successfully.');

        return redirect(route('ideas.index'));
    }
}
