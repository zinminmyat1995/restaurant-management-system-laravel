<?php

namespace App\Http\Controllers\ApiControllers;

use App\Classes\Repositories\ShopTabletListRepository;
use App\Http\Controllers\Controller;
use App\Interfaces\ShopTabletListInterface;
use App\Http\Requests\ShopTabletListRequest\ShopTabletListSearchRequest;
use App\Http\Requests\ShopTabletListRequest\ShopTabletListDeleteRequest;
use Illuminate\Support\Facades\Validator;
use PDO;

class ShopAndMenuTabletListController extends Controller
{
    private ShopTabletListRepository $shopTabletListRepo;
    public function __construct(ShopTabletListInterface $shopTabletListRepo){
        $this->shopTabletListRepo = $shopTabletListRepo;
    }

    public function search(ShopTabletListSearchRequest $request){
        $result = "";$finalOtData = "";
        $data['login_id'] = $request->login_id;
        $result = $this->shopTabletListRepo->searchData($request);
       
        return $result;
    
        // if(empty($result)){
        //     return response()->json([
        //         'status' => 'NG',
        //         'message' =>  "Data is not found!"
        //     ],200);
        // }else{
        //     return response()->json([
        //         'status' => 'OK',
        //         'data' => $result
        //     ],200);
            
        // }
     
    }

    public function delete(ShopTabletListDeleteRequest $request){
        $data['login_id'] = $request->login_id;
        $result = $this->shopTabletListRepo->deleteData($request);
        if($result == 0){
            return response()->json([
                'status' => 'NG',
                'message' =>  "Fail to delete data!"
            ],200);
        }else{
            return response()->json([
                'status' => 'OK',
                'data' => 'Delete Successfully!'
            ],200);
            
        }
    }

    public function update(ShopTabletListDeleteRequest $request){
        $data['login_id'] = $request->login_id;
        $result = $this->shopTabletListRepo->updateData($request);
        if($result == 0){
            return response()->json([
                'status' => 'NG',
                'message' =>  "Fail to update data!"
            ],200);
        }else{
            return response()->json([
                'status' => 'OK',
                'data' => 'Update Successfully!'
            ],200);
            
        }
    }

    

    

  
}
