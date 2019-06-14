<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name','head','content','name_ar','head_ar','content_ar','image','icon','b_image','category_id','active'];
}
