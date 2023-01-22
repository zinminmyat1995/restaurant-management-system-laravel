<?php

namespace App\Interfaces;

interface MenuListRepositoryInterface{
    public function list(array $filters);
}