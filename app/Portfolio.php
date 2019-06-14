<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = ['name','name_ar','head','head_ar','content','content','image','active'];
}
