@extends('site.layouts.master')
@section('content')
@foreach($posts as $post)
                <div class="page-header">
                    <img src="{{asset('assets/site/images/head-bg.jpg')}}" alt="page-header">
                    <div class="container">
                        <h2 class="title select-last">
                            @if (Config::get('app.locale') == 'en')
                            {{$post->name}}
                            @else
                            {{$post->name_ar}}
                            @endif
                        </h2>
                    </div><!--End Container-->
                </div><!--End page-header-->
                <div class="page-content">
                    <section class="section-lg blog-post-page">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="blog-post">
                                        <div class="blog-post-head">
                                            <p>
                                                By : <span>{{$post->username}}</span>
                                                In: <span>@if (Config::get('app.locale') == 'en')
                                                {{$post->cat_name}}
                                                @else
                                                {{$post->cat_name_ar}}
                                                @endif
                                                </span>
                                                {{$post->created_at}}
                                            </p>                                            
                                        </div><!-- End Blog-Post-Head -->
                                        <div class="blog-post-content">
                                            
                                            <p>
                                                @if (Config::get('app.locale') == 'en')
                                                {{$post->content}}
                                                @else
                                                {{$post->content_ar}}
                                                @endif
                                            </p>
                                            <ul class="share-list">
                                                <li>
                                                    <i class="fa fa-share-alt"></i>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-google-plus"></i>
                                                    </a>
                                                </li>
                                            </ul><!-- End Share-List -->
                                        </div><!-- End Blog-Post-Content -->
                                    </div><!-- End Blog-Post -->
                                    @endforeach
                                </div>
                                <div class="col-md-3">
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
                                            <h2 class="title">@if (Config::get('app.locale') == 'en')
                                                Categories
                                            @else
                                                الأقسام
                                            @endif</h2>
                                        </div><!--End Side-widget-title-->
                                        <div class="side-widget-content">
                                            <ul class="categories-list">
                                                @if (Config::get('app.locale') == 'en')
                                                @foreach($categories as $category)
                                                <li><a href="{{ route('post.category' , ['id' => $category->id]) }}">{{$category->cat_name}}</a></li>
                                                @endforeach
                                                @else
                                                @foreach($categories as $category)
                                                <li><a href="{{ route('post.category' , ['id' => $category->id]) }}">{{$category->cat_name_ar}}</a></li>
                                                @endforeach
                                                @endif
                                            </ul><!--End Categories-list-->
                                        </div><!--End Side-widget-content-->
                                    </div><!--End Side-widget-->
                                </div><!-- End col -->
                            </div><!-- End row -->
                        </div><!-- End container -->
                    </section><!-- End section -->
                </div><!-- End Page-Content -->  
@endsection