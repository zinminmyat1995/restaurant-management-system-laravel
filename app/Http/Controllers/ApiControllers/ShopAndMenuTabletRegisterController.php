<?php

namespace App\Http\Controllers\ApiControllers;

use App\Classes\Repositories\ShopTabletRegisterRepository;
use App\Http\Controllers\Controller;
use App\Interfaces\ShopTabletRegisterInterface;
use App\Http\Requests\ShopTabletRegisterRequest\ShopTabletRegisterSaveRequest;
use App\Http\Requests\ShopTabletRegisterRequest\ShopTabletRegisterIndexRequest;
use Illuminate\Support\Facades\Validator;
use PDO;

class ShopAndMenuTabletRegisterController extends Controller
{
    private ShopTabletRegisterRepository $shopTabletRegRepo;
    public function __construct(ShopTabletRegisterInterface $shopTabletRegRepo){
        $this->shopTabletRegRepo = $shopTabletRegRepo;
    }

    public function index(ShopTabletRegisterIndexRequest $request){

        $data['login_id'] = $request->login_id;$admin="";
        $shopData = array();
        $login_id = $request->login_id;
   
        //Validation
        $rules = [
            'login_id' => 'required|integer',

        ];
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {//check validation errors
            return response()->json(['status'=>'NG', 'message' => $validator->errors()], 422);
        }
        
        $role = $this->shopTabletRegRepo->getRoleData($login_id);
        
        if($role == 1){
            $shopData = $this->shopTabletRegRepo->getAllShopData($request);
            $admin = true;
        }else if($role == 2){
            $shopData = $this->shopTabletRegRepo->getShopData($request);
            $admin = false;
        }
       

        if(empty($shopData)){
            return response()->json([
                'status' => 'NG',
                'admin' => $admin,
                'message' =>  "Data is not found!"
            ],200);
        }else{
       



            return $shopData;


            return response()->json([
                'status' => 'OK',
                'admin' => $admin,
                'data' => $shopData 
            ],200);
            
        }

    }

    public function save(ShopTabletRegisterSaveRequest $request){

        $login_id = $request->login_id;$shop_name="";$address="";
        $phone_no="";$opening_hour=""; $closing_hour=""; $token=""; 
        $shop_code = $request->shop_code;
        $data['login_id'] = $request->login_id;
        $tabletCode = $request->tablet_data;
        

        //Validation
        $rules = [
            'login_id' => 'required|integer',

        ];
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {//check validation errors
            return response()->json(['status'=>'NG', 'message' => $validator->errors()], 422);
        }

        $shopData = $this->shopTabletRegRepo->getShopInfo($shop_code);
        if(!empty($shopData)){
            $all['shop_name']=$shopData[0]->shop_name  ;
            $all['address']=$shopData[0]->address  ;
            $all['phone_no']=$shopData[0]->phone_no  ;
            $all['opening_hour']=$shopData[0]->opening_hour  ;
            $all['closing_hour']=$shopData[0]->closing_hour  ;
            $all['token']=$shopData[0]->token  ;
            $all['shop_key']=$shopData[0]->shop_key  ;
        }

        // try{
            $result = $this->shopTabletRegRepo->saveTabletData($all, $tabletCode, $request);

            
            if (empty($result)) {
                return response()->json(['status'=>'OK', 'message' => "Save successfully!"], 200);
            } else {
                return response()->json(['status'=>'NG', 'message' => "Fail to save data!"], 200);
            }
       
    }

  
}
