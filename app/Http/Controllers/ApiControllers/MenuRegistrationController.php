<?php

namespace App\Http\Controllers\ApiControllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\MenuRegistrationInterface;
use App\Http\Requests\MenuRegistrationRequests\MeatRequest;
use App\Http\Requests\MenuRegistrationRequests\MenuTypeRequest;
use App\Http\Requests\MenuRegistrationRequests\MenuCategoryRequest;
use App\Http\Requests\MenuRegistrationRequests\MenuRegistrationRequest;

class MenuRegistrationController extends Controller
{
    private MenuRegistrationInterface $repository;
    public function __construct(MenuRegistrationInterface $repository){
        $this->repository = $repository;
    }

    public function getMenu(Request $request){
        $data = $this->repository->getMenu($request);
        return $data;
    }

    public function menuRegister(MenuRegistrationRequest $request){
        $data = $this->repository->menuRegister($request);
        if($data){
            return response()->json(['status' => 'OK', 'message' => 'Save Successful'], 200);
        }
        return response()->json(['status' => 'NG', 'message' => 'Save Fail'], 200);
        

    }

    public function getMenuCategory(){
        $data = $this->repository->getMenuCategory();
        if($data){
            return response()->json(["status" => "OK", "data" => $data], 200);
        }
        return response()->json(["status" => "NG", "message" => "Fail to get the shops."], 200);
    }
    public function getMenuType(){
        $data = $this->repository->getMenuType();
        if($data){
            return response()->json(["status" => "OK", "data" => $data], 200);
        }
        return response()->json(["status" => "NG", "message" => "Fail to get the shops."], 200);
    }
    public function getMeat(){
        $data = $this->repository->getMeat();
        if($data){
            return response()->json(["status" => "OK", "data" => $data], 200);
        }
        
        return response()->json(["status" => "NG", "message" => "Fail to get the shops."], 200);
    }
    public function addMenuCategory(MenuCategoryRequest $request){
        $data = $this->repository->addMenuCategory($request);
        if($data['status']=='NG'){
            return response()->json(["status" => "NG", "message" => "Name can not be duplicate"], 200);
        }else if($data['status']=='true'){
            return response()->json(["status" => "OK", "message" => "Save Successful"], 200);
        }
        return response()->json(["status" => "NG", "message" => "Fail"], 200);

    }
    public function addMenuType(MenuTypeRequest $request){
        $data = $this->repository->addMenuType($request);
        if(!empty($data['status']=='NG')){
            return response()->json(["status" => "NG", "message" => "Name can not be duplicate"], 200);
        }else if($data['status']=='true'){
            return response()->json(["status" => "OK", "message" => "Save Successful"], 200);
        }

        return response()->json(["status" => "NG", "message" => "Fail"], 200);
        }

    public function addMeat(MeatRequest $request){
        $data = $this->repository->addMeat($request);
        if($data['status']=='NG'){
            return response()->json(["status" => "NG", "message" => "Name can not be duplicate"], 200);
        }else if($data['status']=='true'){
            return response()->json(['status' => 'OK', 'message' => 'Save Successful'], 200);
        }
        return response()->json(['status' => 'NG', 'message' => 'Fail'], 200);
    }
    public function removeMenuCategory(Request $request){
        $data = $this->repository->removeMenuCategory($request);
        if($data['status'] == 'OK'){
            return response()->json(['status' => 'OK', 'message' => 'Delete Successful'], 200);
        }else if($data['status'] == 'NG1'){
            return response()->json(['status' => 'NG', 'message' => 'The Menu Category is not exist.'], 200);
        }
        return response()->json(['status' => 'NG', 'message' => 'Delete Fail.'], 200);
    }
    public function removeMenuType(Request $request){
        $data = $this->repository->removeMenuType($request);
        if($data['status'] == 'OK'){
            return response()->json(['status' => 'OK', 'message' => 'Delete Successful'], 200);
        }else if($data['status'] == 'NG1'){
            return response()->json(['status' => 'NG', 'message' => 'The Menu Category is not exist.'], 200);
        }
        return response()->json(['status' => 'NG', 'message' => 'Delete Fail.'], 200);
    }
    public function removeMeat(Request $request){
        $data = $this->repository->removeMeat($request);
        if($data['status'] == 'OK'){
            return response()->json(['status' => 'OK', 'message' => 'Delete Successful'], 200);
        }else if($data['status'] == 'NG1'){
            return response()->json(['status' => 'NG', 'message' => 'The Menu Category is not exist.'], 200);
        }
        return response()->json(['status' => 'NG', 'message' => 'Delete Fail.'], 200);
    }
}
