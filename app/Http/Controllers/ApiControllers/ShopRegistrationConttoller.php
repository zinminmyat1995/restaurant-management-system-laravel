<?php

namespace App\Http\Controllers\ApiControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShopRegistration\ShopRegistrationRequest;
use App\Interfaces\ShopRegistrationRepositoryInterface;
use App\Http\Requests\ShopRegistration\ShopRegistrationUpdateRequest;

class ShopRegistrationConttoller extends Controller
{
    private ShopRegistrationRepositoryInterface $repository;
    public function __construct(ShopRegistrationRepositoryInterface $repository){
        $this->repository = $repository;
    }

    public function search(Request $request){
        $data = $this->repository->search($request);
        if($data['status']=='OK'){
            return response()->json(['status' => 'OK', 'data' => $data['data']], 200);
        }
        return response()->json(['status' => 'NG', 'message' => 'No Data Found'], 200);
    }

    public function store(ShopRegistrationRequest $request){
        $data = $this->repository->store($request);
        if($data['status']=='OK'){
            return response()->json(['status' => 'OK', 'message' => "Save Successful"],200);
        }
        // else if($data['status']=='NG2'){
        //     return response()->json(['status' => 'NG', 'message' => 'Fail to create'], 200);
        // }
        return response()->json(['status' => 'NG', 'message' => "The shop code is already exist."],200);
    }


    public function update(ShopRegistrationUpdateRequest $request){
        $data = $this->repository->update($request);
        if($data['status']=='OK'){
            return response()->json(['status' => 'OK', 'message' => "Update Successful"]);
        } else if($data['status']=='NG2')
        {
            return response()->json(['status' => 'NG', 'message' => "Fail to create"]);
        }
        return response()->json(['status' => 'NG', 'message' => "The shop does not exist."]);
    }

    public function delete($id){
        $data = $this->repository->delete($id);
        if($data['status']=='OK'){
            return response()->json(['status' => 'OK', 'message'=>'Delete Successful.']);
        } else if($data['status']=='NG2'){
            return response()->json(['status' => 'NG', 'message' => 'Delete Fail.']);
        }
        return response()->json(['status' => 'NG', 'message' => 'Shop is not exist.']);
    }
}
