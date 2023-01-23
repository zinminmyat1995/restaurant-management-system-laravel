<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Requests\ShopRegistrationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\ShopRegistrationRepositoryInterface;

class ShopRegistrationConttoller extends Controller
{
    private ShopRegistrationRepositoryInterface $repository;
    public function __construct(ShopRegistrationRepositoryInterface $repository){
        $this->repository = $repository;
    }

    public function index(){
        $data = $this->repository->index();
        if($data){
            return response()->json(['status' => 'OK', 'data' => $data], 200);
        }
        return response()->json(['status' => 'NG', 'message' => 'Fail to get data.'], 200);
    }

    public function store(ShopRegistrationRequest $request){
        dd($request);

    }
}
