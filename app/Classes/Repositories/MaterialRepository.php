<?php
namespace App\Classes\Repositories;

use App\Interfaces\MaterialRepositoryInterface;
use App\Models\Menu;

class MaterialRepository implements MaterialRepositoryInterface
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
