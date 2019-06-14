<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;
use Alert;
use DB;

class ClientsController extends Controller
{
    public function getIndex() {
    	$clients = Client::all();
        return view('admin.pages.client.index', compact('clients'));
    }

    public function getAdd() {
        return view('admin.pages.client.add');
    }

    public function postAdd(Request $request) {
        $v = validator($request->all() ,[
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'active' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'active.required' => 'Please Enter Activation Status',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
        $image = $request->input('image');
        $active = $request->input('active');
        $data = array('image' => $image ,'active' => $active);
        $client = Client::create($data);
        if ($client){
            return ['status' => 'succes' ,'data' => 'Data is inserted Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
        
    }

    public function getEdit($id) {
        if (isset($id)) {
            $clients = DB::table('clients')
                ->select('clients.*')
                ->where('id','=', $id)
                ->get();
            return view('admin.pages.client.edit', compact('clients'));
        }        
    }

    public function postEdit(Request $request) {
        $v = validator($request->all() ,[
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'active' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'active.required' => 'Please Enter Activation Status',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
        $id = $request->input('s_id');
        $image = $request->input('image');
        $active = $request->input('active');
        $data = array('image' => $image ,'active' => $active);

        $client = DB::table('clients')->where('id','=', $id)->update($data);
        if ($client){
            return ['status' => 'succes' ,'data' => 'Data is updated Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }

    public function delete($id) {
        if (isset($id)) {
            DB::table('clients')->where('id','=', $id)->delete();
            return back();
        }
    }

}
