@extends('layouts.app')
@section('content')
<section class="home-slider position-relative">
    <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
        @foreach($banners as $banner)
        <div class="single-hero-slider single-animation-wrap">
            <div class="container">
                <div class="row align-items-center slider-animated-1">
                    <div class="col-lg-12 col-md-12">
                        <div class="single-slider-img single-slider-img-1">
                            <img class="animated slider-1-1" style="width: 100%;border: 5px;background-size: cover;" src="{{asset($banner->image)}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    <div class="slider-arrow hero-slider-1-arrow"></div>
</section>
<section class="featured section-padding position-relative">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-6 col-md-4 mb-md-3 mb-lg-0">
                <div class="banner-features wow fadeIn animated hover-up">
         <h4>Rp {{ number_format(\App\Models\Order::where('status', 'done')->sum('nominal'), 0, ',', '.') }}</h4>
 <br>
                    <h4 class="bg-1">Total Donasi</h4>
                </div>
            </div>
            <div class="col-lg-3 col-6 col-md-4 mb-md-3 mb-lg-0">
                <div class="banner-features wow fadeIn animated hover-up">
                    <h4>{{ \App\Models\Order::where('status', 'done')->count('*') }}</h4> <br>
                    <h4 class="bg-3">Jumlah Donasi</h4>
                </div>
            </div>
            <div class="col-lg-3 col-6 col-md-4 mb-md-3 mb-lg-0">
                <div class="banner-features wow fadeIn animated hover-up">
                    <h4>{{ \App\Models\Order::where('status', 'done')->count('*') }}</h4> <br>
                    <h4 class="bg-2">Jumlah Donatur</h4>
                </div>
            </div>
            <div class="col-lg-3 col-6 col-md-4 mb-md-3 mb-lg-0">
                <div class="banner-features wow fadeIn animated hover-up">
                    <h4>{{ \App\Models\CrowdFunding::count('*') }}</h4><br>
                    <h4 class="bg-4">Program Aktif</h4>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="product-tabs section-padding position-relative wow fadeIn animated" id="sedekahPanel">
    <div class="bg-square"></div>
    <div class="container">
        <div class="tab-header">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Sedekah</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two" type="button" role="tab" aria-controls="tab-two" aria-selected="false">Wakaf</button>
                </li>
            </ul>
        </div>
        <!--End nav-tabs-->
        <div class="tab-content wow fadeIn animated" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">
                    @foreach($nonwakaf as $cwR)
                    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img">
                                    <a href="{{route('productDetail', $cwR->id) }}">
                                        <img class="default-img" src="{{ asset($cwR->image) }}" alt="">
                                        <img class="hover-img" src="{{ asset($cwR->image) }}" alt="">
                                    </a>
                                </div>

                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="{{route('productDetail', $cwR->id) }}">{{$cwR->type}}</a>
                                </div>
                                <h2><a href="{{route('productDetail', $cwR->id) }}">{{$cwR->title}}</a></h2>
                                <div>
                                    <span>
                          <span>Goal Amount: Rp {{ number_format($cwR->goal_amount, 0, ',', '.') }}</span>

                                    </span>
                                </div>
                                <div class="product-price">
                        <span>Rp {{ number_format(\App\Models\Order::where(['crowd_funding_id' => $cwR->id, 'status' => 'done'])->sum('nominal'), 0, ',', '.') }}</span>


                                </div>

                                <a aria-label="Add To Cart" class="btn btn-success" href="{{route('productDetail', $cwR->id) }}">Donasi Sekarang</a>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!--En tab one (Featured)-->
            <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                <div class="row product-grid-4">
                    @foreach($wakaf as $cwR)
                    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img">
                                    <a href="{{route('productDetail', $cwR->id) }}">
                                        <img class="default-img" src="{{ asset($cwR->image) }}" alt="">
                                        <img class="hover-img" src="{{ asset($cwR->image) }}" alt="">
                                    </a>
                                </div>

                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="{{route('productDetail', $cwR->id) }}">{{$cwR->type}}</a>
                                </div>
                                <h2><a href="{{route('productDetail', $cwR->id) }}">{{$cwR->title}}</a></h2>
                                <div>
                                    <span>
                          <span>Goal Amount: Rp {{ number_format($cwR->goal_amount, 0, ',', '.') }}</span>

                                    </span>
                                </div>
                                <div class="product-price">
                        <span>Rp {{ number_format(\App\Models\Order::where(['crowd_funding_id' => $cwR->id, 'status' => 'done'])->sum('nominal'), 0, ',', '.') }}</span>


                                </div>

                                <a aria-label="Add To Cart" class="btn btn-success" href="{{route('productDetail', $cwR->id) }}">Donasi Sekarang</a>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!--En tab two (Popular)-->
            <div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
                <div class="row product-grid-4">
                    @foreach($nonwakaf as $cwR)
                    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img">
                                    <a href="{{route('productDetail', $cwR->id) }}">
                                        <img class="default-img" src="{{ asset($cwR->image) }}" alt="">
                                        <img class="hover-img" src="{{ asset($cwR->image) }}" alt="">
                                    </a>
                                </div>

                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="{{route('productDetail', $cwR->id) }}">{{$cwR->type}}</a>
                                </div>
                                <h2><a href="{{route('productDetail', $cwR->id) }}">{{$cwR->title}}</a></h2>
                                <div>
                                    <span>
                                        <span>Goal Amount : Rp. {{number_format($cwR->goal_amount)}}</span>
                                    </span>
                                </div>
                                <div class="product-price">
                                    <span>Rp. {{ number_format(\App\Models\Order::where(['crowd_funding_id' => $cwR->id, 'status'=>'done'])->sum('nominal')) }}; </span>

                                </div>

                                <a aria-label="Add To Cart" class="btn btn-success" href="{{route('productDetail', $cwR->id) }}">Donasi Sekarang</a>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!--En tab three (New added)-->
        </div>

        <!--End tab-content-->
    </div>
</section>
<section class="banner-2 section-padding pb-0">
    <div class="container">
        <div class="banner-img banner-big wow fadeIn animated f-none">
            <img src="{{asset('bannerpeduli.JPG')}}" alt="">
            <div class="banner-text d-md-block d-none">

            </div>
        </div>
    </div>
</section>
@endsection