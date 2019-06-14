<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categorie;
use DB;

class CategoriesController extends Controller
{
    public function getIndex() {
    	$categories = Categorie::all();
        return view('admin.pages.category.index', compact('categories'));
    }

    public function getAdd() {
        return view('admin.pages.category.add');
    }

    public function insert(Request $request) {
        $v = validator($request->all() ,[
            'name' => 'required',
            'name_ar' => 'required',
            'active' => 'required',
        ] ,[
            'name.required' => 'Please Enter Category Name in English',
            'name_ar.required' => 'Please Enter Category Name in Arabic',
            'active.required' => 'Please Enter Category Activation Status',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
    	$name = $request->input('name');
        $name_ar = $request->input('name_ar');
    	$active = $request->input('active');
    	$data = array('cat_name' => $name ,'cat_name_ar' => $name_ar ,'active' => $active);
    	$category = Categorie::create($data);

        if ($category){
            return ['status' => 'succes' ,'data' => 'Data is inserted Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    	
    }

    public function getEdit($id) {
    	if (isset($id)) {
	        $categories = DB::table('categories')
	            ->select('categories.*')
	            ->where('id','=', $id)
	            ->get();
	        return view('admin.pages.category.edit', compact('categories'));
        }        
    }

    public function postEdit(Request $request) {
    	
    	$v = validator($request->all() ,[
            'name' => 'required',
            'name_ar' => 'required',
            'active' => 'required',
        ] ,[
            'name.required' => 'Please Enter Category Name in English',
            'name_ar.required' => 'Please Enter Category Name in Arabic',
            'active.required' => 'Please Enter Category Activation Status',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
        $id = $request->input('s_id');
        $name = $request->input('name');
        $name_ar = $request->input('name_ar');
        $active = $request->input('active');
        $data = array('cat_name' => $name ,'cat_name_ar' => $name_ar ,'active' => $active);
    	$category = DB::table('categories')->where('id','=', $id)->update($data);
    	if ($category){
            return ['status' => 'succes' ,'data' => 'Data is updated Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }

    public function delete($id) {
    	if (isset($id)) {
	    	DB::table('categories')->where('id','=', $id)->delete();
	    	return back();
	    }
    }

}
