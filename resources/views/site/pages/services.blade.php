@extends('site.layouts.master')
@section('content')
                <div class="page-header">
                    <img src="{{asset('assets/site/images/head-bg.jpg')}}" alt="page-header">
                    <div class="container">
                        <h2 class="title select-first">
                            @if (Config::get('app.locale') == 'en')
                            @foreach($categories as $category)
                            {{$category->c_name}}
                            @endforeach
                            @else
                            @foreach($categories as $category)
                            {{$category->c_name_ar}}
                            @endforeach
                            @endif
                        </h2>
                    </div><!--End Container-->
                </div><!--End page-header-->
                <div class="page-content">
                    @if (Config::get('app.locale') == 'en')
                    @foreach($services as $service)
                    <section class="section-lg service">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="icon-box block">
                                        <img src="{{asset('storage/uploads/icons').'/'.$service->b_image}}" alt="...">
                                        <div class="icon-box-head">
                                            <div class="icon">
                                                <img src="{{asset('storage/uploads/icons').'/'.$service->icon}}" alt="...">
                                            </div><!-- End Icon -->
                                            <h3 class="title select-first">{{$service->name}}</h3>
                                        </div><!-- End Icon-Box-Head -->
                                        <div class="icon-box-body">
                                        <p>
                                            {{$service->content}}
                                        </p>
                                        </div><!-- End Icon-Box-Body -->
                                    </div><!-- End Icon-Box -->
                                </div><!-- End col -->
                                <div class="col-md-5">
                                    <div class="section-img">
                                        <img src="{{asset('storage/uploads/services').'/'.$service->image}}" alt="...">
                                    </div><!-- End Section-Img -->
                                </div><!-- End col -->
                            </div><!-- End row -->
                        </div><!-- End container -->
                    </section><!-- End section -->
                    @endforeach
                    @else
                    @foreach($services as $service)
                    <section class="section-lg service">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="icon-box block">
                                        <img src="{{asset('storage/uploads/icons').'/'.$service->b_image}}" alt="...">
                                        <div class="icon-box-head">
                                            <div class="icon">
                                                <img src="{{asset('storage/uploads/icons').'/'.$service->icon}}" alt="...">
                                            </div><!-- End Icon -->
                                            <h3 class="title select-first">{{$service->name_ar}}</h3>
                                        </div><!-- End Icon-Box-Head -->
                                        <div class="icon-box-body">
                                        <p>
                                            {{$service->content_ar}}
                                        </p>
                                        </div><!-- End Icon-Box-Body -->
                                    </div><!-- End Icon-Box -->
                                </div><!-- End col -->
                                <div class="col-md-5">
                                    <div class="section-img">
                                        <img src="{{asset('storage/uploads/services').'/'.$service->image}}" alt="...">
                                    </div><!-- End Section-Img -->
                                </div><!-- End col -->
                            </div><!-- End row -->
                        </div><!-- End container -->
                    </section><!-- End section -->
                    @endforeach
                    @endif
                </div><!-- End Page-Content -->
@endsection