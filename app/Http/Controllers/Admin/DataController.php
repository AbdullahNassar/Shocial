<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Data;
use DB;
use Alert;

class DataController extends Controller {

	public function getData()
    {
        $statics = DB::table('statics')
            ->select('statics.*')
            ->where('id','=', 1)
            ->get();
        return view('admin.pages.data', compact('statics'));
    }


    public function updateData(Request $request)
    {
      $v = validator($request->all() ,[
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'about' => 'required',
            'about_ar' => 'required',
            'portfolio' => 'required',
            'portfolio_ar' => 'required',
            'clients' => 'required',
            'clients_ar' => 'required',
            'footer' => 'required',
            'footer_ar' => 'required',
            'contact' => 'required',
            'contact_ar' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'about.required' => 'Please Enter About Content in English',
            'about_ar.required' => 'Please Enter About Content in Arabic',
            'portfolio.required' => 'Please Enter Portfolio Content in English',
            'portfolio_ar.required' => 'Please Enter Portfolio Content in Arabic',
            'clients.required' => 'Please Enter Clients Content in English',
            'clients_ar.required' => 'Please Enter Clients Content in Arabic',
            'footer.required' => 'Please Enter Footer Content in English',
            'footer_ar.required' => 'Please Enter Footer Content in Arabic',
            'contact.required' => 'Please Enter Contact Us Content in English',
            'contact_ar.required' => 'Please Enter Contact Us Content in Arabic',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        for ($i=1; $i <= 3 ; $i++) { 
            $addresses['ad'.$i] = $request->input('ad'.$i);
        }
        $address = json_encode($addresses);

        for ($j=1; $j <= 3 ; $j++) { 
            $addresses_ar['add'.$j] = $request->input('add'.$j);
        }
        $address_ar = json_encode($addresses_ar);

        $image = $request->input('image');
        $about = $request->input('about');
        $about_ar = $request->input('about_ar');
        $portfolio = $request->input('portfolio');
        $portfolio_ar = $request->input('portfolio_ar');
        $clients = $request->input('clients');
        $clients_ar = $request->input('clients_ar');
        $footer = $request->input('footer');
        $footer_ar = $request->input('footer_ar');
        $contact = $request->input('contact');
        $contact_ar = $request->input('contact_ar');

        $data = array( 'about_image' => $image ,
                       'about' => $about,
                       'portfolio' => $portfolio,
                       'clients' => $clients,
                       'footer' => $footer,
                       'contact' => $contact,
                       'address' => $address,
                       'about_ar' => $about_ar,
                       'portfolio_ar' => $portfolio_ar,
                       'clients_ar' => $clients_ar,
                       'footer_ar' => $footer_ar,
                       'contact_ar' => $contact_ar,
                       'address_ar' => $address_ar,
                       );
        
        $c = DB::table('statics')->where('id', 1)->update($data);

        if ($c){
            return ['status' => 'succes' ,'data' => 'Data is updated Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }
}
