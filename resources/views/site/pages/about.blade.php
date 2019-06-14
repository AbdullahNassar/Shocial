@extends('site.layouts.master')
@section('content')
                <div class="page-header">
                    <img src="{{asset('assets/site/images/head-bg.jpg')}}" alt="page-header">
                    <div class="container">
                        <h2 class="title select-last">
                            @if (Config::get('app.locale') == 'en')
                            about us
                            @else
                            من نحن
                            @endif
                        </h2>
                    </div><!--End Container-->
                </div><!--End page-header-->
                <div class="page-content">
                    <section class="section-md">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="section-head">
                                        <h3 class="section-title">
                                            @if (Config::get('app.locale') == 'en')
                                            Who We Are?
                                            @else
                                            من نحن؟
                                            @endif
                                        </h3>
                                        <p>
                                            @if (Config::get('app.locale') == 'en')
                                            {{$data->get('about')}}
                                            @else
                                            {{$data->get('about_ar')}}
                                            @endif
                                        </p>
                                    </div><!-- End Section-head -->
                                </div><!-- End col -->
                                <div class="col-md-4">
                                    <div class="section-img margin-top-60">
                                        <img src="{{asset('storage/uploads/statics').'/'.$data->get('about_image')}}" alt="...">
                                    </div><!-- End Section-Img -->
                                </div><!-- End col -->
                            </div><!-- End row -->
                        </div><!-- End container -->
                    </section><!-- End section -->
                    <section class="section-sm feature style-2">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="section-head">
                                        <h3 class="section-title">
                                            @if (Config::get('app.locale') == 'en')
                                                What We offer?
                                            @else
                                                ما نقدمه؟
                                            @endif
                                        </h3>
                                    </div><!-- End Section-Head -->
                                    <div class="section-img">
                                        <img src="{{asset('assets/site/images/feature.jpg')}}" alt="...">
                                    </div><!-- End section-img -->
                                </div>
                                <div class="col-md-5">
                                    <div class="section-content">
                                        @if (Config::get('app.locale') == 'en')
                                        @foreach($cats as $cat)
                                        <div class="icon-box list">
                                            <br><br>
                                            <div class="icon-box-head">
                                                <div class="icon">
                                                    <img src="{{asset('storage/uploads/icons').'/'.$cat->c_icon}}" alt="...">
                                                </div><!-- End Icon -->
                                                <h3 class="title">{{$cat->c_name}}</h3>
                                            </div><!-- End Icon-Box-Head -->
                                            <div class="icon-box-body">
                                                <p>
                                                    {{$cat->c_content_en}} 
                                                </p>
                                                <a href="#" class="more">
                                                    Read More
                                                </a>
                                                <br><br>
                                            </div><!-- End Icon-Box-Body -->
                                        </div><!-- End Icon-Box -->
                                        @endforeach
                                        @else
                                        @foreach($cats as $cat)
                                        <div class="icon-box list">
                                            <br><br>
                                            <div class="icon-box-head">
                                                <div class="icon">
                                                    <img src="{{asset('storage/uploads/icons').'/'.$cat->c_icon}}" alt="...">
                                                </div><!-- End Icon -->
                                                <h3 class="title">{{$cat->c_name_ar}}</h3>
                                            </div><!-- End Icon-Box-Head -->
                                            <div class="icon-box-body">
                                                <p>
                                                    {{$cat->c_content_ar}} 
                                                </p>
                                                <a href="#" class="more">
                                                    المزيد
                                                </a>
                                                <br><br>
                                            </div><!-- End Icon-Box-Body -->
                                        </div><!-- End Icon-Box -->
                                        @endforeach
                                        @endif
                                    </div><!-- End Section-Content -->
                                </div>
                            </div><!-- End row -->
                        </div><!-- End container -->
                    </section><!-- End section -->
                </div><!-- End Page-Content -->
@endsection