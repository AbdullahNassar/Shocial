@extends('site.layouts.master')
@section('content')
                <div class="page-header">
                    <img src="{{asset('assets/site/images/head-bg.jpg')}}" alt="page-header">
                    <div class="container">
                        <h2 class="title select-last">Contact Us</h2>
                    </div><!--End Container-->
                </div><!--End page-header-->
                <div class="page-content">
                    <section class="section-lg contact-page">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="section-head inline">
                                        @if (Config::get('app.locale') == 'en')
                                        <h3 class="section-title">Contact Us</h3>
                                        <p>
                                            {{$data->get('contact')}}
                                        </p>
                                        @else
                                        <h3 class="section-title">اتصل بنا</h3>
                                        <p>
                                            {{$data->get('contact_ar')}}
                                        </p>
                                        @endif
                                    </div><!-- End Section-Head -->
                                    <div class="section-content">
                                        <form action="{{route('site.message')}}" enctype="multipart/form-data" method="post" onsubmit="return false;" class="form">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="@if (Config::get('app.locale') == 'en') Full Name @else الاسم بالكامل @endif" name="name">
                                                    </div><!-- End Form-Group -->
                                                </div><!-- End col -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="tel" class="form-control" placeholder="@if (Config::get('app.locale') == 'en') Phone Number @else رقم الهاتف @endif" name="phone">
                                                    </div><!-- End Form-Group -->
                                                </div><!-- End col -->
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" placeholder=" @if (Config::get('app.locale') == 'en') Email Address @else البريد الالكترونى @endif" name="email">
                                                    </div><!-- End Form-Group -->
                                                </div><!-- End col -->
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder=" @if (Config::get('app.locale') == 'en') Message @else الرسالة @endif" rows="5" name="message"></textarea>
                                                    </div><!-- End Form-Group -->
                                                </div><!-- End col -->
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <button type="submit" class="custom-btn addBTN">@if (Config::get('app.locale') == 'en') Send @else ارسل @endif</button>
                                                </div><!-- End Form-Group -->
                                                </div><!-- End col -->
                                            </div><!-- End row -->
                                        </div><!-- End Section-Content -->
                                    </form>
                                </div><!-- End col -->
                                <div class="col-md-4">
                                    <div class="contact-widget">
                                        @if(Config::get('app.locale') == 'en')
                                        @php
                                        $addresses = json_decode($data->get('address'));
                                        $count1 = 1;
                                        @endphp
                                        @foreach((array)$addresses as $a)
                                        <div class="contact-item">
                                            <div class="icon">
                                                <img src="{{asset('assets/site/images/icons/04.png')}}" alt="...">
                                            </div><!-- End Icon -->
                                            <p>
                                                {{$a}}
                                            </p>
                                        </div><!-- End Contact-Item -->
                                        @php $count1 = $count1+1; @endphp
                                        @endforeach
                                        @else
                                        @php
                                        $addresses = json_decode($data->get('address_ar'));
                                        $count1 = 1;
                                        @endphp
                                        @foreach((array)$addresses as $a)
                                        <div class="contact-item">
                                            <div class="icon">
                                                <img src="{{asset('assets/site/images/icons/04.png')}}" alt="...">
                                            </div><!-- End Icon -->
                                            <p>
                                                {{$a}}
                                            </p>
                                        </div><!-- End Contact-Item -->
                                        @php $count1 = $count1+1; @endphp
                                        @endforeach
                                        @endif
                                    </div><!-- End Contact-Info -->
                                </div><!-- End col -->
                            </div><!-- End row -->
                        </div><!-- End container -->
                    </section><!-- End Section -->
                </div><!-- End Page-Content -->
@endsection