<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShopRegistration extends Model
{
    use SoftDeletes;
    protected $table = 'shops';
    protected $guarded=[];
}
