<?php
namespace App\Classes\Repositories;

use App\Models\Shop;
use Illuminate\Support\Facades\DB;
use App\Interfaces\ShopRegistrationRepositoryInterface;


class ShopRegistrationRepository implements ShopRegistrationRepositoryInterface
{
    function __construct()
    {

    }
    public function search($request)
    {
        $shop_key = $request->shop_key;
        $shop_code = $request->shop_code;
        $shop_name = $request->shop_name;
        $address = $request->address;
        $ph_no = $request->phone_no;
        $op_hr = $request->opening_hr;
        $cs_hr = $request->closing_hr;
        
        if(empty($shop_key) && empty($shop_code) && empty($shop_name) && empty($address) && empty($ph_no) && empty($op_hr) && empty($cs_hr)){

            $data = Shop::whereRaw("RIGHT(shop_code,1)=1")->whereNull('deleted_at')->paginate(20);
            $data_count = $data->count();
            foreach ($data as $key =>$value){
                $shop_code = $value->shop_key . $value->shop_code;
                $value->shop_code = $shop_code;
            
            }
            
            if ($data) {
                return ['status'=>'OK','data' =>$data];
            }
            return ['status'=>'NG','messsage' =>'NO Data.'];
        } else {

            $data = Shop::whereRaw("RIGHT(shop_code,1)=1")->whereNull('deleted_at');

            if(!empty($shop_key)){
               $data = $data->where('shop_key', "LIKE", "%" . $shop_key . "%");
            }
            if(!empty($shop_code)){
                $data = $data->where('shop_code', "LIKE", "%" . $shop_code . "%");
            }
            if(!empty($shop_name)){
                $data = $data->where('shop_name', "LIKE", "%" . $shop_name . "%");
            }
            if(!empty($address)){
                $data = $data->where('address', "LIKE", "%" . $address . "%");
            }
            if(!empty($ph_no)){
                $data = $data->where('phone_no', "LIKE", "%" . $ph_no . "%");
            }
            if(!empty($op_hr)){
                $data = $data->where('opening_hour', "LIKE", "%" . $op_hr . "%");
            }
            if(!empty($cs_hr)){
                $data =  $data->where('closing_hour', "LIKE", "%" . $cs_hr . "%");
            }
    
            $data = $data->paginate(20);

            if ($data) {
                return ['status'=>'OK','data' =>$data];
            }
            return ['status'=>'NG','messsage' =>'NO Data.'];
        } 
        
    }

    public function store($request){
        $shop_key = $request->shop_key;
        $shop_code = $request->shop_code;
        $shop_name = $request->shop_name;
        $address = $request->address;
        $ph_no = $request->phone_no;
        $op_hr = $request->opening_hr;
        $cs_hr = $request->closing_hr;
        $login_id = $request->login_id;

        // $shop_code_arr = explode("-", $shop_code);
        // $shop_key = $shop_code_arr[0];
        // $shop_code = $shop_code_arr[1];
        // $shop_code_exist = Shop::select('shop_code')->whereNull('deleted_at')->get()->toArray();
        // foreach($shop_code_exist as $value){
        //     if(in_array($shop_code,$value)){
            
        //         return ['status' => 'NG1'];
        //     }
        // }

        $insert = [
            'shop_key' => $shop_key,
            'shop_code' => $shop_code,
            'shop_name' => $shop_name,
            'address' => $address,
            'phone_no' => $ph_no,
            'opening_hour' => $op_hr,
            'closing_hour' => $cs_hr,
            'status' => 1,
            'token' => 1,
            'created_emp' => $login_id,
            'updated_emp' => $login_id        
        ];

        $creat = Shop::create($insert);
        if($creat){
            return ['status' => 'OK'];
        } else {
            return ['status' => 'NG'];
        } 
    }

    public function update($request){
        $id = $request->id;
        $shop_key = $request->shop_key;
        $shop_code = $request->shop_code;
        $shop_name = $request->shop_name;
        $address = $request->address;
        $ph_no = $request->phone_no;
        $op_hr = $request->opening_hr;
        $cs_hr = $request->closing_hr;
        $login_id = $request->login_id;

        // $shop_code_arr = explode("-", $shop_code);
        // $shop_key = $shop_code_arr[0];
        // $shop_code = $shop_code_arr[1];
        $shop_code_exist = Shop::where('shop_code',$shop_code)->where('id',$id)->whereNull('deleted_at')->exists();
        if($shop_code_exist){
            $insert = [
                'shop_key' => $shop_key,
                'shop_code' => $shop_code,
                'shop_name' => $shop_name,
                'address' => $address,
                'phone_no' => $ph_no,
                'opening_hour' => $op_hr,
                'closing_hour' => $cs_hr,
                'status' => 1,
                'token' => 1,
                'created_emp' => $login_id,
                'updated_emp' => $login_id        
            ];
    
            $updae = Shop::where('id',$id)->update($insert);
            if($updae){
                return ['status'=>'OK'];
            } else {
                return ['status'=>'NG2'];
            } 
        }
        return ['status' => 'NG1'];
        

    }

    public function delete(int $id){
        $id_exist = Shop::where('id', $id)->exists();
        if($id_exist){
            $shop = Shop::where('id', $id)->delete();
            if($shop){
                return ['status' => 'OK'];
            }
            return ['status' => 'NG2'];
        }
        return ['status' => 'NG1'];
    }


}
?>
