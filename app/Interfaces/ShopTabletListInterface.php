<?php
namespace App\Interfaces;

use App\Models\Shop;

interface ShopTabletListInterface
{
    // search shop data
    function searchData($request);

    // delete shop data
    function deleteData($request);

    // update shop data
    function updateData($request);
    
   
    
}


