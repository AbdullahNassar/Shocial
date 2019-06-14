<header class="header">
                <div class="container">
                    <a href="{{URL::to('/')}}" class="logo">
                        <img src="{{asset('assets/site/images/Logo.png')}}" alt="logo">
                    </a><!-- End Logo -->
                    <button class="btn btn-responsive-nav" data-toggle="collapse" data-target=".navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div class="lang dropdown">
                        @if (Config::get('app.locale') == 'ar')
                        <a href="{{route('site.lang','en')}}">
                            En                        
                        </a>
                        @else
                        <a href="{{route('site.lang','ar')}}">               
                            AR 
                        </a>
                        @endif
                        {{ csrf_field() }}
                    </div>
                    <a href="" class="search-head">
                        <i class="fa fa-search"></i>
                    </a><!--End Icon-header-->
                </div><!-- End container -->
                <div class="navbar-collapse collapse">
                    <div class="container">
                        <nav class="nav-main">
                            <ul class="nav navbar-nav">
                                <li class="@if(Route::currentRouteName()=='site.home') active @endif"><a href="{{URL::to('/')}}">{{trans('app.home')}}</a></li>
                                <li class="@if(Route::currentRouteName()=='site.about') active @endif"><a href="{{URL::to('/about')}}">{{trans('app.about')}}</a></li>
                                <li class="dropdown">
                                    <a href="#" data-toggle="dropdown">
                                        {{trans('app.services')}} <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu small-menu">
                                        @foreach($cats as $cat)
                                        <li><a href="{{ route('site.services' , ['id' => $cat->id]) }}"> 
                                            @if (Config::get('app.locale') == 'en')
                                                {{$cat->c_name}}
                                            @else
                                                {{$cat->c_name_ar}}
                                            @endif
                                        </a></li>
                                        @endforeach
                                    </ul><!--End dropdown-menu-->
                                </li>
                                <li class="@if(Route::currentRouteName()=='site.portfolios') active @endif"><a href="{{URL::to('/portfolios')}}">{{trans('app.portfolio')}}</a></li>
                                <li class="@if(Route::currentRouteName()=='site.posts') active @endif"><a href="{{URL::to('/posts')}}">{{trans('app.blog')}}</a></li>
                                <li class="@if(Route::currentRouteName()=='site.contact') active @endif"><a href="{{URL::to('/contact')}}">{{trans('app.contact')}}</a></li>
                            </ul> 
                        </nav><!-- End nav-main -->
                    </div><!-- End Container -->
                </div><!-- End nav-main-collapse -->
            </header><!-- End Header -->