<?php

namespace App\Http\Controllers\ApiControllers;

use App\Classes\Repositories\PurchaseTypeRepository;
use App\Http\Controllers\Controller;
use App\Interfaces\PurchaseTypeRepositoryInterface;
use App\Http\Requests\PurchaseTypeRequests\{PurchaseTypeCreateRequest,PurchaseTypeDeleteRequest};

class PurchaseTypeController extends Controller
{
    private PurchaseTypeRepository $repository;
    public function __construct(PurchaseTypeRepositoryInterface $repository){
        $this->repository = $repository;
    }

    public function create(PurchaseTypeCreateRequest $request){
        dd($request->validated());
        $bool=$this->repository->register([
            "name"=>$request->name,
            "created_emp"=>10001,
            "updated_emp"=>10001
        ]);
        if($bool){
            return response()->json(["status" => "OK", "message" => "Create Successfully"], 200);
        }
        return response()->json(["status" => "NG", "message" => "Create fail"], 200);
    }

    public function delete(PurchaseTypeDeleteRequest $request){
        $bool = $this->repository->delete($request->id);
        if($bool){
            return response()->json(["status" => "OK", "message" => "Delete Successfully"], 200);
        }
        return response()->json(["status" => "NG", "message" => "Delete failed"], 200);
    }

    public function index(){
        $data = $this->repository->getAll();
        return response()->json(['status' => "OK", "data" => $data],200);
    }
}
?>