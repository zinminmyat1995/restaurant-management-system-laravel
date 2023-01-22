<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meat extends Model
{
    use SoftDeletes;
    protected $table = 'meat_type';
    protected $guarded=[];
}
