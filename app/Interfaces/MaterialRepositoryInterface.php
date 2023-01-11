<?php
namespace App\Interfaces;

use App\Models\Material;

interface MaterialRepositoryInterface
{
    function register(Menu $menu);
}
