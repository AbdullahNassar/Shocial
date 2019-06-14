<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $fillable = ['c_icon','c_name','c_name_ar','c_content_ar','c_content_en','active'];
}
