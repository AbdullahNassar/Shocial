<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Portfolio;
use App\Categ;
use DB;
use Alert;

class PortfolioController extends Controller
{
    public function getIndex() {
    	$portfolios = Portfolio::all();
        return view('admin.pages.portfolio.index', compact('portfolios'));
    }

    public function getAdd() {
        return view('admin.pages.portfolio.add');
    }

    public function insert(Request $request) {
        $v = validator($request->all() ,[
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
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
        $active = $request->input('active');
    	$data = array('name' => $name ,'name_ar' => $name_ar ,'head' => $head ,'head_ar' => $head_ar ,'content' => $content ,'content_ar' => $content_ar ,'image' => $image ,'active' => $active);
    	$d = Portfolio::create($data);
        if ($d){
            return ['status' => 'succes' ,'data' => 'Data is inserted Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    	
    }

    public function getEdit($id) {
    	if (isset($id)) {
            $portfolios = DB::table('portfolios')
                ->select('portfolios.*')
                ->where('id','=', $id)
                ->get();
	        return view('admin.pages.portfolio.edit', compact('portfolios'));
        }        
    }

    public function postEdit(Request $request) {
    	
    	$v = validator($request->all() ,[
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
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
        $active = $request->input('active');
        $data = array('name' => $name ,'name_ar' => $name_ar ,'head' => $head ,'head_ar' => $head_ar ,'content' => $content ,'content_ar' => $content_ar ,'image' => $image ,'active' => $active);

    	$d = DB::table('portfolios')->where('id','=', $id)->update($data);
    	if ($d){
            return ['status' => 'succes' ,'data' => 'Data is updated Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }

    public function delete($id) {
    	if (isset($id)) {
	    	$d = DB::table('portfolios')->where('id','=', $id)->delete();
	    	return back();
	    }
    }

}
