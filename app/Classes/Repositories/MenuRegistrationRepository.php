<?php
namespace App\Classes\Repositories;

use App\Models\Employee;
use Exception;
use App\Models\Meat;
use App\Models\Menu;
use App\Models\MenuType;
use App\Models\MenuCategory;
use App\Models\ShopRegistration;
use Illuminate\Support\Facades\DB;
use App\Interfaces\MenuRegistrationInterface;


class MenuRegistrationRepository implements MenuRegistrationInterface
{
    function getMenu($request){
        $login_id = $request->login_id;
      
        $menu = Employee::select('shops.shop_name as shop_name','shops.shop_code as shop_code')
                    ->leftjoin('shops','shops.shop_code','=','employee.shop_code')
                    ->where('employee.employee_id',$login_id)
                    ->whereNull('shops.deleted_at')->distinct()->first();
        return $menu;
    }
    function menuRegister($request){
        $login_id = $request->login_id;
        $shop_code = $request->shop_code;
        $menu_code = $request->menu_code;
        $menu_name = $request->menu_name;
        $menu_category_id = $request->menu_category_id;
        $menu_type_id = $request->menu_type_id;

        DB::beginTransaction();
        try{
            foreach ($request->menu_price as $value){
                $insert = [
                    "shop_code" =>  $shop_code,
                    "menu_code" =>  $menu_code,
                    "menu_name" => $menu_name,
                    "menu_type_id" => $menu_type_id,
                    "menu_category_id" => $menu_category_id,
                    "meat_type_id" => $value['meat_id'],
                    "price" => $value['price'],
                    "created_emp" => $login_id,
                    "updated_emp" => $login_id
                ];
                $create = Menu::create($insert);
            }
            
            DB::commit();
            return true;
        } catch (Exception $e) {
			DB::rollBack();
			return false;
		}
        

    }
    
    function getMenuCategory(){
        $menu_category = MenuCategory::whereNull('deleted_at')->get();
        return $menu_category;
    }
    function getMenuType(){
        $menu_type = MenuType::whereNull('deleted_at')->get();
        return  $menu_type;
    }
    function getMeat(){
        $meat = Meat::whereNull('deleted_at')->get();
        return $meat;
    }
    function addMenuCategory($request){

        $menu_category_name = $request->menu_category_name;
        $login_id = $request->login_id;

        $rvm_name = str_replace(' ', '', $menu_category_name);
        $lower_name = strtolower($rvm_name);

        $get_name = MenuCategory::select('name')->whereNull('deleted_at')->get();
        $name_arr = [];

        if(!empty($get_name)){
            foreach ($get_name as $name) {
                $rvm_name = str_replace(' ', '', $name->name);
                $lower_namedb = strtolower($rvm_name);
    
                array_push($name_arr, $lower_namedb);
            }
    
            if(in_array($lower_name,$name_arr)){
                return ["status" => "NG"];
            }
        }

        $insert = [
            'name' => $menu_category_name,
            'created_emp' => $login_id,
            'updated_emp' => $login_id

        ];

        $create = MenuCategory::create($insert);
        if($create){
            return ["status" => "true"];
        } else {
            return ["status" => "false"];
        }
    }
    function addMenuType($request){
        $menu_type_name = $request->menu_type_name;
        $login_id = $request->login_id;

        $rvm_name = str_replace(' ', '', $menu_type_name);
        $lower_name = strtolower($rvm_name);

        $get_name = MenuType::select('name')->whereNull('deleted_at')->get();
        $name_arr = [];

        if(!empty($get_name)){
            foreach ($get_name as $name) {
                $rvm_name = str_replace(' ', '', $name->name);
                $lower_namedb = strtolower($rvm_name);
    
                array_push($name_arr, $lower_namedb);
            }
    
            if(in_array($lower_name,$name_arr)){
                return ["status" => "NG"];
            }
        }
        
        $insert = [
            'name' => $menu_type_name,
            'created_emp' => $login_id,
            'updated_emp' => $login_id

        ];

        $create = MenuType::create($insert);
        if($create){
            return ["status" => "true"];
        } else {    
            return ["status" => "false"];
        }
    }
    function addMeat($request){
        $name = $request->meat;
        $login_id = $request->login_id;

        $rvm_name = str_replace(' ', '', $name);
        $lower_name = strtolower($rvm_name);

        $get_name = Meat::select('name')->whereNull('deleted_at')->get();
        $name_arr = [];

       if(!empty($get_name)){
            foreach ($get_name as $namedb) {
                $rvm_name = str_replace(' ', '', $namedb->name);
                $lower_namedb = strtolower($rvm_name);
    
                $a =array_push($name_arr, $lower_namedb);
            }
        
            if(in_array($lower_name,$name_arr)){
                return ["status" => "NG"];
            }
        }

        $insert = [
            'name' => $name,
            'created_emp' => $login_id,
            'updated_emp' => $login_id
        ];
        $create = Meat::create($insert);

        if ($create)
            return ["status" => "true"];

        return ["status" => "false"];
    }
    function removeMenuCategory($request){
        $id = $request->id;
        $login_id = $request->login_id;

        $id_exist = MenuCategory::where('id', $id)->exists();
        if($id_exist){
            DB::beginTransaction();
            try {
                MenuCategory::where('id', $id)->delete();
                Menu::where('menu_category_id', $id)->delete();

                DB::commit();
                return ['status'=>'OK'];
            } catch (Exception $e) {
                DB::rollBack();
                return ['status'=>'NG2'];
            }
        }
        return ['status'=>'NG1'];
    }
    function removeMenuType($request){
        $id = $request->id;
        $login_id = $request->login_id;

        $id_exist = MenuType::where('id', $id)->exists();
        if($id_exist){
            $menu = MenuType::where('id', $id)->delete();
            if($menu){
                return ['status' => 'OK'];
            }
            return ['status' => 'NG2'];
        }
        return ['status' => 'NG1'];
    }
    function removeMeat($request){
        $id = $request->id;
        $login_id = $request->login_id;

        $id_exist = Meat::where('id', $id)->exists();
        if($id_exist){
            $menu = Meat::where('id', $id)->delete();
            if($menu){
                return ['status' => 'OK'];
            }
            return ['status' => 'NG2'];
        }
        return ['status' => 'NG1'];
    }
    
}
?>