<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use App\Cat;
use DB;
use Alert;

class ServicesController extends Controller
{
    public function getIndex() {
    	$services = Service::all();
        return view('admin.pages.service.index', compact('services'));
    }

    public function getAdd() {
        $categories = Cat::all();
        return view('admin.pages.service.add', compact('categories'));
    }

    public function postAdd(Request $request) {
        $v = validator($request->all() ,[
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'image2' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'image3' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'name' => 'required',
            'name_ar' => 'required',
            'head' => 'required',
            'head_ar' => 'required',
            'content' => 'required',
            'content_ar' => 'required',
            'active' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'image2.required' => 'Please upload image',
            'image2.image' => 'Please upload image not video',
            'image2.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image2.max' => 'Max Size 20 MB',
            'image3.required' => 'Please upload image',
            'image3.image' => 'Please upload image not video',
            'image3.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image3.max' => 'Max Size 20 MB',
            'name.required' => 'Please Enter Portfolio Name in English',
            'name_ar.required' => 'Please Enter Portfolio Name in Arabic',
            'head.required' => 'Please Enter Portfolio Header in English',
            'head_ar.required' => 'Please Enter Portfolio Header in Arabic',
            'content.required' => 'Please Enter Portfolio Content in English',
            'content_ar.required' => 'Please Enter Portfolio Content in Arabic',
            'active.required' => 'Please Enter Activation Status',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $name = $request->input('name');
        $name_ar = $request->input('name_ar');
        $head = $request->input('head');
        $head_ar = $request->input('head_ar');
        $content = $request->input('content');
        $content_ar = $request->input('content_ar');
        $image = $request->input('image');
        $image2 = $request->input('image2');
        $image3 = $request->input('image3');
        $active = $request->input('active');
        $category_id = $request->input('cat_id');
        $data = array('name' => $name ,'name_ar' => $name_ar ,'head' => $head ,'head_ar' => $head_ar ,'content' => $content ,'content_ar' => $content_ar ,'image' => $image ,'icon' => $image2 ,'b_image' => $image3 ,'category_id' => $category_id,'active' => $active);
        $R = Service::create($data);
        if ($R){
            return ['status' => 'succes' ,'data' => 'Data is inserted Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
        
    }

    public function getEdit($id) {
        if (isset($id)) {
            $services = DB::table('services')
                ->join('cats','services.category_id','=','cats.id')
                ->select('services.*','cats.c_name')
                ->where('services.id','=', $id)
                ->get();
            $categories = Cat::all();
            return view('admin.pages.service.edit', compact('services','categories'));
        }        
    }

    public function postEdit(Request $request) {
        
        $v = validator($request->all() ,[
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'image2' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'image3' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'name' => 'required',
            'name_ar' => 'required',
            'head' => 'required',
            'head_ar' => 'required',
            'content' => 'required',
            'content_ar' => 'required',
            'active' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'image2.required' => 'Please upload image',
            'image2.image' => 'Please upload image not video',
            'image2.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image2.max' => 'Max Size 20 MB',
            'image3.required' => 'Please upload image',
            'image3.image' => 'Please upload image not video',
            'image3.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image3.max' => 'Max Size 20 MB',
            'name.required' => 'Please Enter Portfolio Name in English',
            'name_ar.required' => 'Please Enter Portfolio Name in Arabic',
            'head.required' => 'Please Enter Portfolio Header in English',
            'head_ar.required' => 'Please Enter Portfolio Header in Arabic',
            'content.required' => 'Please Enter Portfolio Content in English',
            'content_ar.required' => 'Please Enter Portfolio Content in Arabic',
            'active.required' => 'Please Enter Activation Status',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
        $id = $request->input('s_id');
        $name = $request->input('name');
        $name_ar = $request->input('name_ar');
        $head = $request->input('head');
        $head_ar = $request->input('head_ar');
        $content = $request->input('content');
        $content_ar = $request->input('content_ar');
        $image = $request->input('image');
        $image2 = $request->input('image2');
        $image3 = $request->input('image3');
        $active = $request->input('active');
        $category_id = $request->input('cat_id');
        $data = array('name' => $name ,'name_ar' => $name_ar ,'head' => $head ,'head_ar' => $head_ar ,'content' => $content ,'content_ar' => $content_ar ,'image' => $image ,'icon' => $image2 ,'b_image' => $image3 ,'category_id' => $category_id,'active' => $active);
        $R = DB::table('services')->where('id','=', $id)->update($data);
        if ($R){
            return ['status' => 'succes' ,'data' => 'Data is updated Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }

    public function delete($id) {
        if (isset($id)) {
            DB::table('services')->where('id','=', $id)->delete();
            return back();
        }
    }

}
