<?php
namespace App\Classes\Repositories;

use App\Interfaces\ShopTabletRegisterInterface;
use App\Models\Shop;
use Illuminate\Support\Facades\DB;
class ShopTabletRegisterRepository implements ShopTabletRegisterInterface
{
    function __construct()
    {

    }
    function saveData($request)
    {
        // $success = Shop::insert($storeableArray);
        // if ($success) {
        //     return true;
        // }
        // return false;
    }

    function getRoleData($login_id){
        $data = DB::table('employee')
        ->where('employee.employee_id',$login_id)
        ->where('employee.deleted_at',NULL)
        ->select('employee.role')->get();
        $tempData = collect($data)->pluck('role');
        if(count($tempData) < 1){
            return 0;
        }else{
            return $tempData[0];
        }
       
    }

    
    function getAllShopData($request){
        $result = array();
        $data = DB::table('shops')
        ->where('shops.deleted_at',NULL)
        ->where('shops.status',1)
        ->select()->get()->toArray();
        // $tempData = collect($data)->pluck('role');
        foreach ($data as $property => $value) {
            $temp['id'] = $value->id;
            $temp['shop_key'] = $value->shop_key;
            $temp['shop_code'] = $value->shop_code;
            $temp['shop_name'] = $value->shop_name;
            array_push($result,$temp);
        }
        return $result;
    }

    // get one shop data
    function getShopData($request){
        $result = array();
        $data = DB::table('shops')
        ->join('employee','shops.shop_code', 'employee.shop_code')
        ->where('shops.deleted_at',NULL)
        ->where('employee.employee_id',$request->login_id)
        ->select()->get()->toArray();
        // $tempData = collect($data)->pluck('role');
        foreach ($data as $property => $value) {
            $temp['id'] = $value->id;
            $temp['shop_key'] = $value->shop_key;
            $temp['shop_code'] = $value->shop_code;
            $temp['shop_name'] = $value->shop_name;
            array_push($result,$temp);
        }
        return $result;
    }

    
    // get shop information
    function getShopInfo($shop_code){
        $data = DB::table('shops')
        ->where('shops.deleted_at',NULL)
        ->where('shops.shop_code',$shop_code)
        ->select()->get()->toArray();
        return $data;
    }

    // save shop information
    function saveTabletData($all, $tabletCode, $request){
        
        foreach($tabletCode as  $val){ 
            $shopData = [
                        "shop_key" => $all['shop_key'],
                        "shop_code" => $val['tablet_code'],
                        "shop_name" => $all['shop_name'],
                        "address" => $all['address'],
                        "phone_no" => $all['phone_no'],
                        "opening_hour" => $all['opening_hour'],
                        "closing_hour" => $all['closing_hour'],
                        "status" => 2,
                        "token" => $all['token'],
                        "deleted_at" => NULL,
                        "created_emp" => $request->login_id,
                        "updated_emp" => $request->login_id,
                        "created_at"     => now(),
                        "updated_at"     => now()
                    ]; 
                  
            $shopInsert = Shop::insert($shopData);
        }
       
    }
    
    
}
