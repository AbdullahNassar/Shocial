<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Static extends Model
{
    protected $fillable = ['image','about','portfolio','clients','footer','contact','address','about_ar','portfolio_ar','clients_ar','footer_ar','contact_ar','address_ar'];

    public function get($value)
    {
        $data = DB::table('statics')
            ->select($value)
            ->first();

    if($data)
        return $data->$value;
    return '';
    }
}
