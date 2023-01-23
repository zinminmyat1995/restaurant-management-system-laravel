<?php
namespace App\Classes\Repositories;

use App\Interfaces\ShopRegistrationRepositoryInterface;
use App\Models\Shop;


class ShopRegistrationRepository implements ShopRegistrationRepositoryInterface
{
    function __construct()
    {

    }
    public function index()
    {
        $data = Shop::whereNull('deleted_at')->paginate(20);
        if ($data) {
            return $data;
        }
        return false;
    }


}
?>
