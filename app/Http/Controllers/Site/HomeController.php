<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;
use App\Cat;
use App\Categorie;
use App\Slider;
use App\Service;
use App\Portfolio;
use App\Client;
use App\Post;
use App\Team;
use Alert;
use App\Data;
use DB;
use App\Notifications\notify_me;
use App\User;
use Auth;

class HomeController extends Controller {

    public function getIndex() {
        $sliders = Slider::all()->where('active','=',1);
        $services = Service::all()->where('active','=',1);
        $portfolios = Portfolio::all()->where('active','=',1);
        $clients = Client::all()->where('active','=',1);
        $posts = Post::all()->where('active','=',1);
        $cats = Cat::all()->where('active','=',1);
        $contact = new Contact;
        $data = new Data;

        return view('site.pages.home',compact('sliders','contact','data','services','portfolios','clients','posts','cats'));
    }

    public function getAbout() {
        
        $data = new Data;
        $team = Team::all()->where('active','=',1);
        $services = Service::all()->where('active','=',1);
        $cats = Cat::all()->where('active','=',1);
        $contact = new Contact;

        return view('site.pages.about',compact('data','team','contact','services','cats'));
    }

    public function getServices($id) {

        if(isset($id)){
            $data = new Data;
            $cats = Cat::all()->where('active','=',1);
            $categories = Cat::all()->where('id','=',$id);
            $services = DB::table('services')
                    ->join('cats','services.category_id','=','cats.id')
                    ->select('services.*')
                    ->where('services.category_id','=', $id)
                    ->get();
            $contact = new Contact;
        }
        
        return view('site.pages.services',compact('data','contact','services','cats','categories'));
    }

    public function getPortfolios() {
        
        $data = new Data;
        $portfolios = Portfolio::all()->where('active','=',1);
        $contact = new Contact;
        $cats = Cat::all()->where('active','=',1);

        return view('site.pages.portfolios',compact('data','contact','portfolios','cats'));
    }

    public function getPortfolio($id) {
        if(isset($id)){
            $data = new Data;
            $portfolios = Portfolio::all()->where('id','=',$id);
            $contact = new Contact;
            $cats = Cat::all()->where('active','=',1);
            $categories = Categorie::all()->where('active','=',1);
            return view('site.pages.portfolio',compact('data','contact','portfolios','categories','cats'));
        }
    }

    public function getPosts() {
        
        $data = new Data;
        $posts = Post::all()->where('active','=',1);
        $contact = new Contact;
        $categories = Categorie::all()->where('active','=',1);
        $cats = Cat::all()->where('active','=',1);

        return view('site.pages.posts',compact('data','contact','posts','categories','cats'));
    }

    public function getPost($id) {
        if(isset($id)){
            $data = new Data;
            $posts = DB::table('posts')
                    ->join('categories','posts.cat_id','=','categories.id')
                    ->join('users','posts.user_id','=','users.id')
                    ->select('posts.*','users.username','categories.*')
                    ->where('posts.id','=', $id)
                    ->get();
            $contact = new Contact;
            $cats = Cat::all()->where('active','=',1);
            $categories = Categorie::all()->where('active','=',1);
            return view('site.pages.post',compact('data','contact','posts','categories','cats'));
        }
        
    }

    public function getCat($id) {
        if(isset($id)){
            $data = new Data;
            $posts = DB::table('posts')
                    ->join('cats','posts.cat_id','=','cats.id')
                    ->join('users','posts.user_id','=','users.id')
                    ->select('posts.*','users.username','cats.c_name')
                    ->where('cats.id','=', $id)
                    ->get();
            $contact = new Contact;
            $categories = Cat::all();
            $cats = Cat::all()->where('active','=',1);
            return view('site.pages.posts',compact('data','contact','posts','categories','cats'));
        }
        
    }

    public function getContact() {
        
        $data = new Data;
        $contact = new Contact;
        $cats = Cat::all()->where('active','=',1);

        return view('site.pages.contact',compact('data','contact','cats'));
    }

    public function message(Request $request)
    {
        $v = validator($request->all() ,[
            'name' => 'required|min:6',
            'message' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ] ,[
            'name.required' => 'Please Enter Your Full Name',
            'email.required' => 'Please Enter Your Email Address',
            'message.required' => 'Please Enter Your Message',
            'phone.required' => 'Please Enter Your Phone Number',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $message = $request->input('message');
        $data = array('name'=>$name,'email'=>$email,'phone'=>$phone,'message'=>$message);

        $m = DB::table('messages')->insert($data);

        if ($m) {
            if (Auth::guard('admins')->check()){
                Auth::guard('admins')->user()->notify(new notify_me());
            }
            return ['status' => 'succes' ,'data' => 'Your Message is sent Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }

    public function subscribe(Request $request)
    {
        if ($request->ajax()){
            $subscribe = $request->input('subscribe');
            $data = array('email'=>$subscribe);
            $subscriber = Subscriber::create($data);
            Alert::success('You Subscribed Successfully', 'Done!');
            return response($subscriber);             
            
        }
    }

}
