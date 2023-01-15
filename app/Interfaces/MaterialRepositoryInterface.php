<?php
namespace App\Interfaces;

use App\Models\Material;

interface MaterialRepositoryInterface
{
    function store(array $storeableArray);
}
