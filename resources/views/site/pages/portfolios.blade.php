@extends('site.layouts.master')
@section('content')
                <div class="page-header">
                    <img src="{{asset('assets/site/images/head-bg.jpg')}}" alt="page-header">
                    <div class="container">
                        <h2 class="title select-last">
                            @if (Config::get('app.locale') == 'en')
                                <span>Our </span>Portfolio
                            @else
                                <span>حقيبة </span>اعمالنا
                            @endif</h2>
                    </div><!--End Container-->
                </div><!--End page-header-->
                <div class="page-content">
                    <section class="section-md">
                        <div class="container">
                            <section class="section-md">
                        <div class="container">
                            <div class="portfolio-wrap">
                                @foreach($portfolios as $portfolio)
                                <div class="grid-item">
                                    <div class="portfolio-item">
                                        <div class="portfolio-item-img">
                                            <img src="{{asset('storage/uploads/portfolios').'/'.$portfolio->image}}" alt="...">
                                        </div><!-- End Portfolio-Item-Img -->
                                        <div class="portfolio-item-content">
                                            <a class="title" href="portfolio-item-ar.html">
                                                @if (Config::get('app.locale') == 'en')
                                                {{$portfolio->name}}
                                                @else
                                                {{$portfolio->name_ar}}
                                                @endif
                                            </a>
                                        </div><!-- End Portfolio-Item-Content -->
                                    </div><!-- End Widget -->
                                </div><!--End grid-item-->
                                @endforeach
                            </div><!--End grid-->
                        </div><!-- End container -->
                    </section><!-- End section -->
                        </div><!-- End container -->
                    </section><!-- End section -->
                </div><!-- End Page-Content -->
@endsection