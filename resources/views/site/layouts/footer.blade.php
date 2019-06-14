<footer class="footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="footer-logo">
                                    <img src="{{asset('assets/site/images/footerlogo.png')}}">
                                    <div class="footer-about">
                                        <p>
                                            @if (Config::get('app.locale') == 'en')
                                                {{$data->get('footer')}}
                                            @else
                                                {{$data->get('footer_ar')}}
                                            @endif
                                        </p>
                                    </div>
                                </div><!--End Footer-logo-->
                                <div class="footer-contact">
                                    <ul class="contact-list">
                                        <li>
                                            <i class="fa fa-map-marker"></i>
                                            <span>
                                            @if (Config::get('app.locale') == 'en')
                                                {{$contact->get('address')}}
                                            @else
                                                {{$contact->get('address_ar')}}
                                            @endif
                                            
                                            </span>
                                        </li>
                                        <li>
                                            <i class="fa fa-phone"></i>
                                            <span>{{$contact->get('phone')}}</span>
                                        </li>
                                        <li>
                                            <i class="fa fa-envelope"></i>
                                            <span>{{$contact->get('email')}}</span>
                                        </li>
                                    </ul><!--End Contact-list-->
                                </div><!--End Contact-->
                            </div><!--End Col-md-8-->
                        </div><!--End Row-->
                    </div><!--End Container-->
                </footer><!-- End footer-->
                <div class="copy-right">
                    <div class="container">
                        <div class="pull-left">
                            <p>&copy; All Rights Reserved for <a href="#">Shocial.com</a></p>
                        </div>
                        <div class="pull-right">
                            Design and Developed By <a href="http://upureka.com/">Upureka</a>
                        </div>
                    </div><!--End Container-->
                </div><!-- End Copy-Right -->