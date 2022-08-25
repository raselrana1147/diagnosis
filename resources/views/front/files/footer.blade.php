<footer class="footer-wrap">
                <div class="container">
                    <div class="row pt-100 pb-75">
                        <div class="col-xl-3 col-lg-5 col-md-5 col-sm-12">
                            <div class="footer-widget">
                                <a href="index.html" class="footer-logo">
                                    <img src="{{ logo()}}" alt="Image">
                                </a>
                                <p class="comp-desc">
                                    <span>{{config('constant.company_detail')}}</span>
                                </p>
                                <ul class="social-profile style1 list-style">
                                    @foreach (socials() as $social)
                                       <li>
                                           <a href="{{$social->url}}">
                                              {!!$social->icon!!}
                                           </a>
                                        </li>
                                    @endforeach
                                    
                                   
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
                            <div class="footer-widget">
                                <h3 class="footer-widget-title">Company</h3>
                                <ul class="footer-menu list-style">
                                    <li>
                                        <a href="{{ route('front_page') }}">
                                            <i class="ri-arrow-right-s-line"></i>
                                           Home
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('about_us') }}">
                                            <i class="ri-arrow-right-s-line"></i>
                                            About Us
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('service') }}">
                                            <i class="ri-arrow-right-s-line"></i>
                                          Our Services
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a href="{{ route('contact_us') }}">
                                            <i class="ri-arrow-right-s-line"></i>
                                           Contact Us
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6">
                            <div class="footer-widget">
                                <h3 class="footer-widget-title">Important</h3>
                                <ul class="footer-menu list-style">
                                   
                                    <li>
                                        <a href="{{ route('privacy_policy') }}">
                                            <i class="ri-arrow-right-s-line"></i>
                                            Privacy Policy
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('term_condition') }}">
                                            <i class="ri-arrow-right-s-line"></i>
                                            Terms &amp; Conditions
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-5 col-md-6 col-sm-6 pe-xl-4">
                            <div class="footer-widget">
                                <h3 class="footer-widget-title">Quick Link</h3>
                                <ul class="footer-menu list-style">
                                   
                                    <li>
                                        <a href="{{ route('package_pricing') }}">
                                            <i class="ri-arrow-right-s-line"></i>
                                            Pricing Plan
                                        </a>
                                    </li>
                                  
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-7 col-md-6 col-sm-6">
                            <div class="footer-widget">
                                <h3 class="footer-widget-title">Official Info</h3>
                                <ul class="contact-info list-style">
                                    <li>
                                        <i class="flaticon-map"></i>
                                        <h6>Location</h6>
                                        <p>{{config('constant.company_address')}}</p>
                                    </li>
                                    <li>
                                        <i class="flaticon-email-1"></i>
                                        <h6>Email</h6>
                                        <span class="text-white">{{config('constant.company_email')}}</span>
                                        <span class="text-white">{{config('constant.company_email2')}}</span>
                                    </li>
                                    <li>
                                        <i class="flaticon-phone-call-1"></i>
                                        <h6>Phone</h6>
                                        <span class="text-white">{{config('constant.company_phone1')}}</span><br>
                                        <span class="text-white">{{config('constant.company_phone2')}}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="copyright-text"><i class="ri-copyright-line"></i> <span><span>{{config('constant.company_name')}}</span></span>. All Rights Reserved</p>
            </footer>