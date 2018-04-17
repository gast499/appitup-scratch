<?php
/**
 * Created by PhpStorm.
 * User: Tameem
 * Date: 4/16/2018
 * Time: 9:25 PM
 */

namespace App\Http\Controllers;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repositories\CategoriesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PitchController extends AppBaseController
{
    private $categoriesRepository;

    public function __construct(CategoriesRepository $categoriesRepo)
    {
        $this->categoriesRepository = $categoriesRepo;
    }

    public function pitch(Request $request)
    {
        $this->categoriesRepository->pushCriteria(new RequestCriteria($request));
        $categories = $this->categoriesRepository->all();

        return view('ideas.pitch')
            ->with('categories', $categories);
    }
}