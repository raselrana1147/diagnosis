 <section class="hero-wrap style1">
                <div class="hero-slider-one owl-carousel">
                    @foreach ($sliders as $slider)
                      
                    <div class="hero-slide-item">
                        <div class="container">
                            <div class="row align-items-center gx-5">
                                <div class="col-xl-5 col-lg-6">
                                    <div class="hero-content">
                                        
                                        <h1>{{$slider->title_1}}</h1>
                                        <p>{{$slider->title_2}}</p>
                                        
                                    </div>
                                </div>
                                <div class="col-xl-7 col-lg-6">
                                    <div class="hero-img-wrap">
                                        <img class="hero-img" src="{{ asset('assets/backend/image/slider/small/'.$slider->image)}}" alt="Image">
                                        <img src="{{ asset('assets/frontend/assets/img/hero/hero-shape-1.png')}}" alt="Image" class="hero-shape-one moveHorizontal">
                                        <img src="{{ asset('assets/frontend/assets/img/hero/hero-shape-2.png')}}" alt="Image" class="hero-shape-two rotate">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                       {{-- expr --}}
                   @endforeach
                </div>
            </section>