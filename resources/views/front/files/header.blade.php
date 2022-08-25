 <header class="header-wrap style1">
                <div class="header-top">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <div class="header-top-left">
                                    <ul class="contact-info list-style">
                                        <li>
                                            <span><i class="ri-customer-service-fill"></i></span>
                                            <p>Your Trusted Service Provider</p>
                                        </li>
                                        <li>
                                            <span><i class="ri-phone-fill"></i></span>
                                            <a>{{config('constant.help_line2')}}</a>
                                        </li>
                                        <li>
                                            <span><i class="ri-map-pin-fill"></i></span>
                                            <p>{{config('constant.short_address')}}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="header-top-right">
                                    <div class="select-lang">
                                        <i class="ri-earth-fill"></i>
                                        <div class="navbar-option-item navbar-language dropdown language-option">
                                            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <span class="lang-name"></span>
                                            </button>
                                            <div class="dropdown-menu language-dropdown-menu">
                                                <a class="dropdown-item" href="#">
                                                    <img src="{{ asset('assets/frontend/assets/img/uk.png') }}" alt="flag">
                                                    Eng
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <img src="{{ asset('assets/frontend/assets/img/china.png')}}" alt="flag">
                                                    简体中文
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <img src="{{ asset('assets/frontend/assets/img/uae.png')}}" alt="flag">
                                                    العربيّة
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="social-profile list-style style1">
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
                        </div>
                    </div>
                </div>
                <div class="header-bottom">
                    <div class="container">
                        <nav class="navbar navbar-expand-md navbar-light">
                           <a class="navbar-brand" href="{{ route('front_page') }}">
                                <img class="logo-light" src="{{ logo()}}" alt="logo">
                                <img class="logo-dark" src="{{ logo()}}" alt="logo">
                            </a>
                            <div class="collapse navbar-collapse main-menu-wrap" id="navbarSupportedContent">
                                <div class="menu-close d-lg-none">
                                    <a href="javascript:void(0)"> <i class="ri-close-line"></i></a>
                                </div>
                                <ul class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a href="{{ route('front_page') }}" class="nav-link {{Route::is('front_page') ? 'active' : ''}}">Home</a>
                                        
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('about_us') }}" class="nav-link {{Route::is('about_us') ? 'active' : ''}}">About </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('service') }}" class="nav-link {{Route::is('service') ? 'active' : ''}}"> Services  </a>
                                        
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a href="{{ route('package_pricing') }}" class="nav-link {{Route::is('package_pricing') ? 'active' : ''}}">Package Pricing</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('contact_us') }}" class="nav-link {{Route::is('contact_us') ? 'active' : ''}}">Contact Us</a>
                                    </li>
                                    
                                </ul>
                                <div class="other-options md-none">
                                    <div class="option-item">
                                        <button class="searchbtn"><i class="ri-search-line"></i></button>
                                    </div>
                                    <div class="option-item">
                                        <a href="#" class="btn style1">Book Appointment</a>
                                    </div>
                                </div>
                                
                            </div>
                        </nav>
                        <div class="search-area">
                            <form action="{{ route('report_search') }}" method="POST">
                                @csrf
                                <input type="search" name="search_key" placeholder="Type Report Number">
                                <button type="submit"><i class="ri-search-line"></i></button>
                            </form>
                            
                        </div>
                        <div class="mobile-bar-wrap">
                            <button class="searchbtn d-lg-none"><i class="ri-search-line"></i></button>
                            <div class="mobile-menu d-lg-none">
                                <a href="javascript:void(0)"><i class="ri-menu-line"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>  