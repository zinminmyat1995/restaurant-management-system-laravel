<?php 

namespace App\Http\Controllers\ApiControllers;
use App\Classes\Repositories\MenuListRepository;
use App\Http\Requests\Menu\MenuListRequest;
use App\Interfaces\MenuListRepositoryInterface;
use Illuminate\Routing\Controller;

class MenuListcontroller extends Controller{
    private MenuListRepository $repository;
    public function __construct(MenuListRepositoryInterface $repository){
        $this->repository = $repository;
    }
    public function index(MenuListRequest $request){
        return $this->repository->list($request->validated());
    }
}