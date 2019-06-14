@extends('site.layouts.master')
@section('content')
@foreach($portfolios as $portfolio)
                <div class="page-header">
                    <img src="{{asset('assets/site/images/head-bg.jpg')}}" alt="page-header">
                    <div class="container">
                        <h2 class="title select-last">
                            @if (Config::get('app.locale') == 'en')
                            Porttfolio Item
                            @else
                            أحد الاعمال
                            @endif
                        </h2>
                    </div><!--End Container-->
                </div><!--End page-header-->
                <div class="page-content">
                    <section class="section-lg">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="portfolio-detail-img">
                                        <img src="{{asset('storage/uploads/portfolios').'/'.$portfolio->image}}">
                                    </div><!-- End Product-Img -->
                                </div><!-- End col -->
                                <div class="col-md-6">
                                    <div class="portfolio-detail">
                                        <div class="portfolio-detail-head">
                                            <h3 class="title">
                                                @if (Config::get('app.locale') == 'en')
                                                {{$portfolio->name}}
                                                @else
                                                {{$portfolio->name_ar}}
                                                @endif
                                            </h3>
                                        </div><!-- End Product-Details-Head -->
                                        <div class="portfolio-detail-content">
                                            <p>
                                                @if (Config::get('app.locale') == 'en')
                                                {{$portfolio->content}}
                                                @else
                                                {{$portfolio->content_ar}}
                                                @endif
                                            </p>
                                        </div><!-- End Product-Details-Contact -->
                                    </div><!-- End portfolio-detail -->
                                </div><!-- End col -->
                            </div><!-- End row -->
                        </div><!-- End container -->
                    </section><!-- End Section -->
                </div><!-- End Page-Content -->
@endforeach
@endsection