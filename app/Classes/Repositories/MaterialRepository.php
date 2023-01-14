<?php
namespace App\Classes\Repositories;

use App\Interfaces\MaterialRepositoryInterface;
use App\Models\Material;
use App\Models\Menu;

class MaterialRepository implements MaterialRepositoryInterface
{
    function __construct()
    {

    }
    function register($storeableArray)
    {
        $success = Material::insert($storeableArray);
        if ($success) {
            return true;
        }
        return false;
    }
}
?>
