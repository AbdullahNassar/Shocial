<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['name','name_ar','head','head_ar','content','content_ar','image','cat_id','user_id','active','day','month','year'];
}
