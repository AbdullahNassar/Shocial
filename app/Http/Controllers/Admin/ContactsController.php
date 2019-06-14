<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contacts;
use DB;

class ContactsController extends Controller {

	public function getContacts()
    {
        $contacts = DB::table('contacts')
            ->select('contacts.*')
            ->where('id','=', 1)
            ->get();
        return view('admin.pages.contact', compact('contacts','con'));
    }


    public function updateContacts(Request $request)
    {
        $v = validator($request->all() ,[
            'address' => 'required',
            'address_ar' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ] ,[
            'address.required' => 'Please Enter Your Address in English',
            'email.required' => 'Please Enter Your Email Address',
            'address_ar.required' => 'Please Enter Your Address in Arabic',
            'phone.required' => 'Please Enter Your Phone Number',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $address = $request->input('address');
        $address_ar = $request->input('address_ar');
        $phone = $request->input('phone');
        $email = $request->input('email');

        $data = array('address' => $address ,'address_ar' => $address_ar ,'phone' => $phone ,
         'email' => $email);

        $c = DB::table('contacts')->where('id', 1)->update($data);

        if ($c){
            return ['status' => 'succes' ,'data' => 'Data is updated Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
        
    }
}
