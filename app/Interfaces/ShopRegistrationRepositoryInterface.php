<?php
namespace App\Interfaces;

use App\Models\Menu;

interface ShopRegistrationRepositoryInterface
{
    function search($request);
    function store($request);
    function update($request);
    function delete(int $id);
}