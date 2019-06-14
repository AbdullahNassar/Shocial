@extends('site.layouts.master')
@section('content')
                <div class="home-slider">
                    <div id="slider">
                        <div class="fullwidthbanner-container">
                            <div id="revolution-slider">
                                <ul>
                                    @if (Config::get('app.locale') == 'en')
                                    @foreach($sliders as $slider)
                                    <li data-transition="random" data-slotamount="7" data-masterspeed="800">
                                        <img src="{{asset('storage/uploads/sliders').'/'.$slider->image}}" alt="">
                                        <div class="tp-caption sfr stt custom-font tp-resizeme"
                                             data-x="left"
                                             data-hoffset="0"
                                             data-y="150"
                                             data-speed="400"
                                             data-start="1000"
                                             data-easing="easeInOut">
                                            <span class="custom-font-1">
                                                <span>{{$slider->site}}</span> 
                                                    is a company  
                                                    <br> for
                                                    {{$slider->industry}}
                                            </span>
                                        </div>
                                        <div class="tp-caption sfr stl custom-font tp-resizeme"
                                             data-x="left"
                                             data-hoffset="0"
                                             data-y="300"
                                             data-speed="400"
                                             data-start="1400"
                                             data-easing="easeInOut">
                                             <span class="custom-font-2">
                                                {{$slider->head1}}
                                             <br>
                                                {{$slider->head2}}
                                            </span>
                                        </div>
                                    </li>
                                    @endforeach
                                    @else
                                    @foreach($sliders as $slider)
                                    <li data-transition="random" data-slotamount="7" data-masterspeed="800">
                                        <img src="{{asset('storage/uploads/sliders').'/'.$slider->image}}" alt="">
                                        <div class="tp-caption sfr stt custom-font tp-resizeme"
                                             data-x="left"
                                             data-hoffset="0"
                                             data-y="160"
                                             data-speed="400"
                                             data-start="1000"
                                             data-easing="easeInOut">
                                            <span class="custom-font-1">
                                                {{$slider->site_ar}}
                                            </span>
                                            <span class="custom-font-2">
                                                {{$slider->head1_ar}}
                                                <br>
                                                {{$slider->head2_ar}}
                                            </span>
                                        </div>
                                        <div class="tp-caption sfr stl custom-font-2 tp-resizeme"
                                             data-x="left"
                                             data-hoffset="0"
                                             data-y="230"
                                             data-speed="400"
                                             data-start="1400"
                                             data-easing="easeInOut">
                                             
                                        </div>
                                        <div class="tp-caption sfr stb custom-font-3 tp-resizeme"
                                             data-x="left"
                                             data-hoffset="0"
                                             data-y="230"
                                             data-speed="400"
                                             data-start="1400"
                                             data-easing="easeInOut">
                                             هي شركة
                                            {{$slider->industry_ar}}
                                        </div>
                                    </li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div><!--End fullwidthbanner-container-->
                    </div><!--End slider-->
                </div><!-- End Home-Slider -->
                <div class="page-content">
                    <section class="section-md">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="section-head no-margin">
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
                                        <a href="{{URL::to('/about')}}" class="more">
                                            @if (Config::get('app.locale') == 'en') Find Out
                                            @else  المزيد
                                            @endif
                                        </a>
                                    </div><!-- End Section-head -->
                                </div><!-- End col -->
                                <div class="col-md-5">
                                    <div class="section-img">
                                        <img src="{{asset('storage/uploads/statics').'/'.$data->get('about_image')}}" alt="...">
                                    </div><!-- End Section-Img -->
                                </div><!-- End col -->
                            </div><!-- End row -->
                        </div><!-- End container -->
                    </section><!-- End section -->
                    <section class="section-md services-section">
                        <div class="container">
                            <div class="section-head text-center">
                                <h3 class="section-title">
                                    
                                    @if (Config::get('app.locale') == 'en')
                                        What We offer?
                                    @else
                                            ما نقدمه؟
                                    @endif
                                </h3>
                            </div><!-- End Section-Head -->
                            <div class="section-content">
                                <div class="row">
                                    @if (Config::get('app.locale') == 'en')
                                    @foreach($cats as $cat)
                                    <div class="col-md-6">
                                        <div class="icon-box">
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
                                                <a href="{{ route('site.services' , ['id' => $cat->id]) }}" class="more">
                                                    Read More
                                                </a>
                                            </div><!-- End Icon-Box-Body -->
                                        </div><!-- End Icon-Box -->
                                    </div><!-- End col -->
                                    @endforeach
                                    @else
                                    @foreach($cats as $cat)
                                    <div class="col-md-6">
                                        <div class="icon-box">
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
                                                <a href="{{ route('site.services' , ['id' => $cat->id]) }}" class="more">
                                                    المزيد
                                                </a>
                                            </div><!-- End Icon-Box-Body -->
                                        </div><!-- End Icon-Box -->
                                    </div><!-- End col -->
                                    @endforeach
                                    @endif
                                </div><!-- End row -->
                            </div><!-- End section-content -->
                        </div><!-- End container -->
                    </section><!-- End section -->
                    <section class="section-md portfolio-section">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="section-head">
                                        <h3 class="section-title">
                                            @if (Config::get('app.locale') == 'en')
                                            <span>Our </span>Portfolio
                                            @else
                                            <span>حقيبة </span>اعمالنا
                                            @endif
                                        </h3>
                                        <p>
                                            @if (Config::get('app.locale') == 'en')
                                            {{$data->get('portfolio')}}
                                            @else
                                            {{$data->get('portfolio_ar')}}
                                            @endif
                                        </p>
                                        <a href="{{route('site.portfolios')}}" class="more">
                                            @if (Config::get('app.locale') == 'en')
                                            View More
                                            @else
                                            المزيد
                                            @endif
                                        </a>
                                    </div><!-- End Section-Head -->
                                </div><!-- End col -->
                                @if (Config::get('app.locale') == 'en')
                                @php 
                                $count2 = 1;
                                @endphp
                                @foreach($portfolios as $portfolio)
                                @if($count2 < 6)
                                <div class="col-md-4">
                                    <div class="portfolio-item">
                                        <div class="portfolio-item-img">
                                            <img src="{{asset('storage/uploads/portfolios').'/'.$portfolio->image}}" alt="...">
                                        </div><!-- End Portfolio-Item-Img -->
                                        <div class="portfolio-item-content">
                                            <a class="title" href="{{route('site.portfolio' , ['id' => $portfolio->id])}}">{{$portfolio->name}}</a>
                                        </div><!-- End Portfolio-Item-Content -->
                                    </div><!-- End Portfolio-Item -->
                                </div>
                                @endif
                                @php 
                                $count2 = $count2+1;
                                @endphp
                                @endforeach
                                @else
                                @php 
                                $count3 = 1;
                                @endphp
                                @foreach($portfolios as $portfolio)
                                @if($count3 < 6)
                                <div class="col-md-4">
                                    <div class="portfolio-item">
                                        <div class="portfolio-item-img">
                                            <img src="{{asset('storage/uploads/portfolios').'/'.$portfolio->image}}" alt="...">
                                        </div><!-- End Portfolio-Item-Img -->
                                        <div class="portfolio-item-content">
                                            <a class="title" href="{{ route('site.portfolio' , ['id' => $portfolio->id]) }}">{{$portfolio->name_ar}}</a>
                                        </div><!-- End Portfolio-Item-Content -->
                                    </div><!-- End Portfolio-Item -->
                                </div>
                                @endif
                                @php 
                                $count3 = $count3+1;
                                @endphp
                                @endforeach
                                @endif
                                </div><!-- End col -->
                            </div><!-- End row -->
                        </div><!-- End container -->
                    </section><!-- End Section -->
                    <section class="our-clients">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="section-head">
                                        @if (Config::get('app.locale') == 'en')
                                        <h3 class="section-title">
                                            Our Clients
                                        </h3>
                                        <p>
                                            {{$data->get('clients')}}
                                        </p>
                                        @else
                                        <h3 class="section-title">
                                            عملائنا
                                        </h3>
                                        <p>
                                            {{$data->get('clients_ar')}}
                                        </p>
                                        @endif
                                    </div><!-- End Section-head -->
                                </div><!--End Col-md-4-->
                                <div class="col-md-8">
                                    <div class="carousel-our-clients">
                                        @foreach($clients as $client)
                                        <div class="client-box">
                                            <img src="{{asset('storage/uploads/clients').'/'.$client->image}}" alt="">
                                        </div><!--End Client-box-->
                                        @endforeach
                                    </div><!--End Carousel-our-clients-->
                                </div><!--End Col-md-8-->
                            </div><!--End row-->
                        </div><!--End Container-->
                    </section><!--End Section-->
                    
                    <section class="section-sm our-blog">
                        <div class="container">
                            <div class="section-head text-center">
                                <h3 class="section-title">
                                    @if (Config::get('app.locale') == 'en')
                                        Our blog
                                    @else
                                        المدونة
                                    @endif
                                    
                                </h3>
                            </div><!-- End Section-head -->
                            <div class="row">
                                @if (Config::get('app.locale') == 'en')
                                @php 
                                $count = 1;
                                @endphp
                                @foreach($posts as $post)
                                @if($count < 3)
                                <div class="col-md-6">
                                    <div class="blog-box">
                                        <div class="blog-box-img">
                                            <img src="{{asset('storage/uploads/posts').'/'.$post->image}}" alt="">
                                        </div><!--End Blog-box-img-->
                                        <div class="blog-box-content">
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
                                </div><!--End Col-md-6-->
                                @endif
                                @php 
                                $count = $count+1;
                                @endphp
                                @endforeach
                                @else
                                @php 
                                $count1 = 1;
                                @endphp
                                @foreach($posts as $post)
                                @if($count1 < 3)
                                <div class="col-md-6">
                                    <div class="blog-box">
                                        <div class="blog-box-img">
                                            <img src="{{asset('storage/uploads/posts').'/'.$post->image}}" alt="">
                                        </div><!--End Blog-box-img-->
                                        <div class="blog-box-content">
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
                                </div><!--End Col-md-6-->
                                @endif
                                @php 
                                $count1 = $count1+1;
                                @endphp
                                @endforeach
                                @endif
                            </div><!--End Row-->
                        </div><!--End Container-->
                    </section><!--End Our-blog-->
                </div><!-- End Page-Content -->
@endsection