<?php
namespace App\Classes\Repositories;

use App\Interfaces\ShopTabletListInterface;
use App\Models\Shop;
use Illuminate\Support\Facades\DB;
class ShopTabletListRepository implements ShopTabletListInterface
{
    function __construct()
    {

    }
    function searchData($request)
    {
       
        $result = DB::table('shops')
        ->where('shops.shop_name',$request->shop_name)
        ->where('shops.status',2)
        ->where('shops.deleted_at',NULL)
        ->orderBy('shops.id')
        ->select()->paginate(20);

        return $result;
    }

    // delete shop data
    function deleteData($request){
        $result = DB::table('shops')
        ->where('shops.shop_name',$request->shop_name)
        ->where('shops.shop_code',$request->delete_tablet_code)
        ->update([
            'deleted_at' => now()
        ]);
        return $result;
    }

    // update shop data
    function updateData($request){
        $result = DB::table('shops')
        ->where('shops.shop_name',$request->shop_name)
        ->where('shops.shop_code',$request->old_tablet_code)
        ->update([
            'shop_code' => $request->edit_tablet_code
        ]);
        return $result;
    }

    
}
