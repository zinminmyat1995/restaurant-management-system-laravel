<?php
namespace App\Interfaces;

use App\Models\Menu;

interface MenuRegistrationInterface
{
    function getMenu($request);
    function menuRegister($request);
    function getMenuCategory();
    function getMenuType();
    function getMeat();
    function addMenuCategory($request);
    function addMenuType($request);
    function removeMenuCategory($request);
    function removeMenuType($request);
    function removeMeat($request);
    function addMeat($request);

}