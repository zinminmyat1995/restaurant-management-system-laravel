<?php
namespace App\Interfaces;

use App\Models\Shop;

interface ShopTabletRegisterInterface
{
    // save shop and tablet data
    function saveData($request);

    // get role id 
    function getRoleData($login_id);

    // get all shop data
    function getAllShopData($request);

    // get one shop data
    function getShopData($request);

    // get shop information
    function getShopInfo($shop_code);

    // save shop information
    function saveTabletData($all, $tabletCode, $request);
    
}


