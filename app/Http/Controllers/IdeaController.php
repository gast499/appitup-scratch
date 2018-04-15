<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;
use App\Repositories\IdeaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Category;

class IdeaController extends AppBaseController
{
    /** @var  IdeaRepository */
    private $ideaRepository;

    public function __construct(IdeaRepository $ideaRepo)
    {
        $this->ideaRepository = $ideaRepo;
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
        return view('ideas.create');
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
        $input = $request->all();

        $idea = $this->ideaRepository->create($input);

        Flash::success('Idea saved successfully.');

        return redirect(route('ideas.index'));
    }

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
     * @param  int              $id
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
