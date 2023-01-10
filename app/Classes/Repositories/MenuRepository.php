<?php
namespace App\Classes\Repositories;

use App\Interfaces\MenuRepositoryInterface;
use App\Models\Menu;

class MenuRepository implements MenuRepositoryInterface
{
    function __construct()
    {

    }
    function register($storeableArray)
    {
        $success = Menu::insert($storeableArray);
        if ($success) {
            return true;
        }
        return false;
    }
}
?>