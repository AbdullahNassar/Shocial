<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['image','site','industry','head1','head2','site_ar','industry_ar','head1_ar','head2_ar','active'];
}
