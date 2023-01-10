<?php
namespace App\Interfaces;

use App\Models\Menu;

interface MenuRepositoryInterface
{
    function register(Menu $menu);
}