<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slider;
use DB;
use Alert;

class SlidersController extends Controller {

    public function getIndex() {
        $sliders = Slider::all();
        return view('admin.pages.slider.index', compact('sliders'));
    }

    public function getAdd() {
        return view('admin.pages.slider.add');
    }

    public function insert(Request $request) {
        $v = validator($request->all() ,[
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'site' => 'required',
            'site_ar' => 'required',
            'industry' => 'required',
            'industry_ar' => 'required',
            'head1' => 'required',
            'head1_ar' => 'required',
            'active' => 'required',
            'head2' => 'required',
            'head2_ar' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'site.required' => 'Please Enter Site Name in English',
            'site_ar.required' => 'Please Enter Site Name in Arabic',
            'industry.required' => 'Please Enter Site Purpose in English',
            'industry_ar.required' => 'Please Enter Site Purpose in Arabic',
            'head1.required' => 'Please Enter Slider Header 1 in English',
            'head1_ar.required' => 'Please Enter Slider Header 1 in Arabic',
            'active.required' => 'Please Enter Activation Status',
            'head2.required' => 'Please Enter Slider Header 2 in English',
            'head2_ar.required' => 'Please Enter Slider Header 2 in Arabic',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
        $image = $request->input('image');
        $site = $request->input('site');
        $site_ar = $request->input('site_ar');
        $industry = $request->input('industry');
        $industry_ar = $request->input('industry_ar');
        $head1 = $request->input('head1');
        $head1_ar = $request->input('head1_ar');
        $head2 = $request->input('head2');
        $head2_ar = $request->input('head2_ar');
        $active = $request->input('active');
        $data = array('image' => $image ,'site' => $site ,'site_ar' => $site_ar ,'industry' => $industry ,'industry_ar' => $industry_ar ,'head1' => $head1 ,'head1_ar' => $head1_ar ,'head2' => $head2 ,'head2_ar' => $head2_ar ,'active' => $active);
        $slider = Slider::create($data);

        if ($slider){
            return ['status' => 'succes' ,'data' => 'Data is inserted Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
        
    }

    public function getEdit($id) {
        if (isset($id)) {
            $sliders = DB::table('sliders')
                ->select('sliders.*')
                ->where('id','=', $id)
                ->get();
            return view('admin.pages.slider.edit', compact('sliders'));
        }        
    }

    public function postEdit(Request $request) {
        $v = validator($request->all() ,[
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'site' => 'required',
            'site_ar' => 'required',
            'industry' => 'required',
            'industry_ar' => 'required',
            'head1' => 'required',
            'head1_ar' => 'required',
            'active' => 'required',
            'head2' => 'required',
            'head2_ar' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'site.required' => 'Please Enter Site Name in English',
            'site_ar.required' => 'Please Enter Site Name in Arabic',
            'industry.required' => 'Please Enter Site Purpose in English',
            'industry_ar.required' => 'Please Enter Site Purpose in Arabic',
            'head1.required' => 'Please Enter Slider Header 1 in English',
            'head1_ar.required' => 'Please Enter Slider Header 1 in Arabic',
            'active.required' => 'Please Enter Activation Status',
            'head2.required' => 'Please Enter Slider Header 2 in English',
            'head2_ar.required' => 'Please Enter Slider Header 2 in Arabic',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
        $id = $request->input('s_id');
        $image = $request->input('image');
        $site = $request->input('site');
        $site_ar = $request->input('site_ar');
        $industry = $request->input('industry');
        $industry_ar = $request->input('industry_ar');
        $head1 = $request->input('head1');
        $head1_ar = $request->input('head1_ar');
        $head2 = $request->input('head2');
        $head2_ar = $request->input('head2_ar');
        $active = $request->input('active');
        $data = array('image' => $image ,'site' => $site ,'site_ar' => $site_ar ,'industry' => $industry ,'industry_ar' => $industry_ar ,'head1' => $head1 ,'head1_ar' => $head1_ar ,'head2' => $head2 ,'head2_ar' => $head2_ar ,'active' => $active);
        $slider = DB::table('sliders')->where('id','=', $id)->update($data);
        if ($slider){
            return ['status' => 'succes' ,'data' => 'Data is updated Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }

    public function delete($id) {
        if (isset($id)) {
            DB::table('sliders')->where('id','=', $id)->delete();
            return back();
        }
    }

}
