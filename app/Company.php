<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    protected $table = "companies";
    protected $guarded = [];
    use SoftDeletes;
}
