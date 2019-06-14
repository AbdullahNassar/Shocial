<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Categorie;
use App\User;
use DB;
use Alert;

class PostsController extends Controller
{
    public function getIndex() {
    	$posts = Post::all();
        return view('admin.pages.post.index', compact('posts'));
    }

    public function getAdd() {
        $categories = Categorie::all();
        $users = User::all();
        return view('admin.pages.post.add', compact('categories','users'));
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
            'day' => 'required',
            'month' => 'required',
            'year' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'name.required' => 'Please Enter Post Name in English',
            'name_ar.required' => 'Please Enter Post Name in Arabic',
            'head.required' => 'Please Enter Post Header in English',
            'head_ar.required' => 'Please Enter Post Header in Arabic',
            'content.required' => 'Please Enter Post Content in English',
            'content_ar.required' => 'Please Enter Post Content in Arabic',
            'active.required' => 'Please Enter Activation Status',
            'day.required' => 'Please Enter Day',
            'month.required' => 'Please Enter Month',
            'year.required' => 'Please Enter Year',
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
        $cat_id = $request->input('cat_id');
        $user_id = $request->input('user_id');
        $active = $request->input('active');
        $day = $request->input('day');
        $month = $request->input('month');
        $year = $request->input('year');
        $data = array('name' => $name ,'name_ar' => $name_ar ,'head' => $head ,'head_ar' => $head_ar ,'content' => $content ,'content_ar' => $content_ar ,'image' => $image ,'cat_id' => $cat_id ,'user_id' => $user_id ,'active' => $active,'day' => $day,'month' => $month,'year' => $year);
        $p = Post::create($data);
        if ($p){
            return ['status' => 'succes' ,'data' => 'Data is inserted Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
        
    }

    public function getEdit($id) {
        if (isset($id)) {
            $posts = DB::table('posts')
                ->join('categories','posts.cat_id','=','categories.id')
                ->join('users','posts.user_id','=','users.id')
                ->select('posts.*','users.username','categories.cat_name')
                ->where('posts.id','=', $id)
                ->get();

            $categories = Categorie::all();
            $users = User::all();
            return view('admin.pages.post.edit', compact('posts','categories','users'));
        }        
    }

    public function postEdit(Request $request) {
        $id = $request->input('s_id');
        $v = validator($request->all() ,[
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'name' => 'required',
            'name_ar' => 'required',
            'head' => 'required',
            'head_ar' => 'required',
            'content' => 'required',
            'content_ar' => 'required',
            'active' => 'required',
            'day' => 'required',
            'month' => 'required',
            'year' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'name.required' => 'Please Enter Post Name in English',
            'name_ar.required' => 'Please Enter Post Name in Arabic',
            'head.required' => 'Please Enter Post Header in English',
            'head_ar.required' => 'Please Enter Post Header in Arabic',
            'content.required' => 'Please Enter Post Content in English',
            'content_ar.required' => 'Please Enter Post Content in Arabic',
            'active.required' => 'Please Enter Activation Status',
            'day.required' => 'Please Enter Day',
            'month.required' => 'Please Enter Month',
            'year.required' => 'Please Enter Year',
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
        $cat_id = $request->input('cat_id');
        $user_id = $request->input('user_id');
        $active = $request->input('active');
        $day = $request->input('day');
        $month = $request->input('month');
        $year = $request->input('year');
        $data = array('name' => $name ,'name_ar' => $name_ar ,'head' => $head ,'head_ar' => $head_ar ,'content' => $content ,'content_ar' => $content_ar ,'image' => $image ,'cat_id' => $cat_id ,'user_id' => $user_id ,'active' => $active,'day' => $day,'month' => $month,'year' => $year);
        $p = DB::table('posts')->where('id','=', $id)->update($data);
        if ($p){
            return ['status' => 'succes' ,'data' => 'Data is updated Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }

    public function delete($id) {
        if (isset($id)) {
            DB::table('posts')->where('id','=', $id)->delete();
            return back();
        }
    }

}
