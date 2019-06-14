<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cat;
use DB;

class CatsController extends Controller
{
    public function getIndex() {
    	$categories = Cat::all();
        return view('admin.pages.cat.index', compact('categories'));
    }

    public function getAdd() {
        return view('admin.pages.cat.add');
    }

    public function insert(Request $request) {
        $v = validator($request->all() ,[
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'c_name' => 'required',
            'c_name_ar' => 'required',
            'c_content_ar' => 'required',
            'c_content_en' => 'required',
            'active' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'c_name.required' => 'Please Enter Category Name in English',
            'c_name_ar.required' => 'Please Enter Category Name in Arabic',
            'c_content_ar.required' => 'Please Enter Category Content in English',
            'c_content_en.required' => 'Please Enter Category Content in Arabic',
            'active.required' => 'Please Enter Category Activation Status',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

    	$c_icon = $request->input('image');
        $c_name = $request->input('c_name');
        $c_name_ar = $request->input('c_name_ar');
        $c_content_ar = $request->input('c_content_ar');
        $c_content_en = $request->input('c_content_en');
    	$active = $request->input('active');
    	$data = array('c_icon' => $c_icon ,'c_name' => $c_name ,'c_name_ar' => $c_name_ar ,
            'c_content_ar' => $c_content_ar ,'c_content_en' => $c_content_en ,
            'active' => $active);
    	$category = Cat::create($data);

        if ($category){
            return ['status' => 'succes' ,'data' => 'Data is inserted Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }

    public function getEdit($id) {
    	if (isset($id)) {
	        $categories = DB::table('cats')->select('cats.*')->where('id','=', $id)->get();
	        return view('admin.pages.cat.edit', compact('categories'));
        }
    }

    public function postEdit(Request $request) {
        $v = validator($request->all() ,[
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'c_name' => 'required',
            'c_name_ar' => 'required',
            'c_content_ar' => 'required',
            'c_content_en' => 'required',
            'active' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'c_name.required' => 'Please Enter Category Name in English',
            'c_name_ar.required' => 'Please Enter Category Name in Arabic',
            'c_content_ar.required' => 'Please Enter Category Content in English',
            'c_content_en.required' => 'Please Enter Category Content in Arabic',
            'active.required' => 'Please Enter Category Activation Status',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

    	$id = $request->input('s_id');
    	$c_icon = $request->input('image');
        $c_name = $request->input('c_name');
        $c_name_ar = $request->input('c_name_ar');
        $c_content_ar = $request->input('c_content_ar');
        $c_content_en = $request->input('c_content_en');
        $active = $request->input('active');
        $data = array('c_icon' => $c_icon ,'c_name' => $c_name ,'c_name_ar' => $c_name_ar ,
            'c_content_ar' => $c_content_ar ,'c_content_en' => $c_content_en ,
            'active' => $active);

    	$category = DB::table('cats')->where('id','=', $id)->update($data);
    	if ($category){
            return ['status' => 'succes' ,'data' => 'Data is updated Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }

    public function delete($id) {
    	if (isset($id)) {
	    	DB::table('cats')->where('id','=', $id)->delete();
	    	return back();
	    }
    }

}
