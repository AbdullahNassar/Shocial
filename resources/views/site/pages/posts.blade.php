@extends('site.layouts.master')
@section('content')
                <div class="page-header">
                    
                    <img src="{{asset('assets/site/images/head-bg.jpg')}}" alt="page-header">
                    <div class="container">
                        <h2 class="title select-last">
                            @if (Config::get('app.locale') == 'en')
                            Our Blog
                            @else
                            مدونتنا
                            @endif
                        </h2>
                    </div><!--End Container-->
                </div><!--End page-header-->
                <div class="page-content">
                    <div class="section-sm our-blog">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3 col-md-push-9">
                                    <div class="side-widget">
                                        <div class="side-widget-title">
                                            <h2 class="title">
                                                @if (Config::get('app.locale') == 'en')
                                                Search
                                                @else
                                                ابحث
                                                @endif
                                            </h2>
                                        </div><!--End Side-widget-title-->
                                        <div class="side-widget-content">
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="@if (Config::get('app.locale') == 'en') Type search keywords... @else اكتب ما تبحث عنه... @endif">
                                                <button type="submit" class="search-btn">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div><!--End Form-group-->
                                        </div><!--End Side-widget-content-->
                                    </div><!--End Side-widget-->
                                    
                                    <div class="side-widget">
                                        <div class="side-widget-title">
                                            <h2 class="title">
                                            @if (Config::get('app.locale') == 'en')
                                                Categories
                                            @else
                                                الأقسام
                                            @endif
                                            </h2>
                                        </div><!--End Side-widget-title-->
                                        <div class="side-widget-content">
                                            <ul class="categories-list">
                                                @if (Config::get('app.locale') == 'en')
                                                @foreach($categories as $cat)
                                                <li><a href="#">{{$cat->cat_name}}</a></li>
                                                @endforeach
                                                @else
                                                @foreach($categories as $cat)
                                                <li><a href="#">{{$cat->cat_name_ar}}</a></li>
                                                @endforeach
                                                @endif
                                            </ul><!--End Categories-list-->
                                        </div><!--End Side-widget-content-->
                                    </div><!--End Side-widget-->
                                </div><!--End Col-md-3-->
                                <div class="col-md-9 col-md-pull-3">
                                    @if (Config::get('app.locale') == 'en')
                                    @foreach($posts as $post)
                                    <div class="blog-box box-2">
                                        <div class="blog-box-img">
                                            <img src="{{asset('storage/uploads/posts').'/'.$post->image}}" alt="blog img">
                                        </div><!--End Blog-box-img-->
                                        <div class="blog-box-content">
                                            <div class="item-date">
                                                <span>{{$post->day}}</span>
                                                <span>{{$post->month}} <br>{{$post->year}}</span>
                                            </div><!--End Item-date-->
                                            <h2 class="item-name">
                                                {{$post->name}}
                                            </h2>
                                            <p>
                                                {{$post->head}}
                                            </p>
                                            <a href="{{ route('site.post' , ['id' => $post->id]) }}">
                                                view more 
                                            </a>
                                        </div><!--End Blog-box-content-->
                                    </div><!--End Blog-box-->
                                    @endforeach
                                    @else
                                    @foreach($posts as $post)
                                    <div class="blog-box box-2">
                                        <div class="blog-box-img">
                                            <img src="{{asset('storage/uploads/posts').'/'.$post->image}}" alt="blog img">
                                        </div><!--End Blog-box-img-->
                                        <div class="blog-box-content">
                                            <div class="item-date">
                                                <span>{{$post->day}}</span>
                                                <span>{{$post->month}} <br>{{$post->year}}</span>
                                            </div><!--End Item-date-->
                                            <h2 class="item-name">
                                                {{$post->name_ar}}
                                            </h2>
                                            <p>
                                                {{$post->head_ar}}
                                            </p>
                                            <a href="{{ route('site.post' , ['id' => $post->id]) }}">
                                                المزيد
                                            </a>
                                        </div><!--End Blog-box-content-->
                                    </div><!--End Blog-box-->
                                    @endforeach
                                    @endif
                                </div><!--End Col-md-9-->
                            </div><!--End Row-->
                        </div><!--End Container-->
                    </div><!--End section-->
                </div><!-- End Page-Content -->

@endsection