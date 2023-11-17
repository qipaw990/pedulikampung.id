                       @extends('layouts.app')
                       @section('content')
                       <main class="main">
                           <section class="mt-50 mb-50">
                               <div class="container">
                                   <div class="row">
                                       <div class="col-lg-9">
                                           <div class="product-detail accordion-detail">
                                               <div class="row mb-50">
                                                   <div class="col-md-6 col-sm-12 col-xs-12">
                                                       <div class="">

                                                           <!-- MAIN SLIDES -->
                                                           <div class="">
                                                               <figure class="border-radius-10">
                                                                   <img src="{{ asset($data->image) }}" alt="product image">
                                                               </figure>
                                                           </div>
                                                       </div>
                                                       <!-- End Gallery -->
                                                       <div class="social-icons single-share">
                                                           <ul class="text-grey-5 d-inline-block">
                                                               <li><strong class="mr-10">Share this:</strong></li>
                                                               <li class="social-facebook"><a href="#"><img src="{{asset('evara-frontend/assets/imgs/theme/icons/icon-facebook.svg')}}" alt=""></a></li>
                                                               <li class="social-twitter"> <a href="#"><img src="{{asset('evara-frontend/assets/imgs/theme/icons/icon-twitter.svg')}}" alt=""></a></li>
                                                               <li class="social-instagram"><a href="#"><img src="{{asset('evara-frontend/assets/imgs/theme/icons/icon-instagram.svg')}}" alt=""></a></li>
                                                               <li class="social-linkedin"><a href="#"><img src="{{asset('evara-frontend/assets/imgs/theme/icons/icon-pinterest.svg')}}" alt=""></a></li>
                                                           </ul>
                                                       </div>
                                                   </div>
                                                   <div class="col-md-6 col-sm-12 col-xs-12">
                                                       <div class="detail-info">
                                                           <h2 class="title-detail">{{ $data->title }}</h2>
                                                           <div class="product-detail-rating">
                                                               <div class="pro-details-brand">
                                                                   <span> Type: <a href="shop-grid-right.html">{{ $data->type }}</a></span>
                                                               </div>
                                                               <div class="product-rate-cover text-end">

 <span class="font-small ml-5 text-muted">Amount Goal: Rp {{ number_format($data->goal_amount, 0, ',', '.') }}</span>

                                                               </div>
                                                           </div>
                                                           <div class="clearfix product-price-cover">
                                                               <div class="product-price primary-color float-left">
                                                                   <h4>Dana Terkumpul : </h4>
                                      <ins><span class="text-brand">Rp {{ number_format($total, 0, ',', '.') }}</span></ins>

                                                               </div>
                                                           </div>
                                                           <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                                           <div class="short-desc mb-30">
                                                               <p>{!! $data->description !!}</p>
                                                           </div>

                                                           <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                                           <div class="detail-extralink">

                                                               <a href="{{ route('order.index', $data->id) }}" class="btn btn-primary">Donasi Sekarang</a>

                                                           </div>

                                                       </div>
                                                       <!-- Detail Info -->
                                                   </div>
                                               </div>
                                               <div class="tab-style3">
                                                   <ul class="nav nav-tabs text-uppercase">
                                                       <li class="nav-item">
                                                           <a class="nav-link active" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info">Donatur</a>
                                                       </li>
                                                       <li class="nav-item">
                                                           <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Doa Orang Baik</a>
                                                       </li>
                                                   </ul>
                                                   <div class="tab-content shop_info_tab entry-main-content">

                                                       <div class="tab-pane fade show active" id="Additional-info">
                                                           <div class="comments-area">
                                                               <div class="row">
                                                                   <div class="col-lg-12">
                                                                       <div class="comment-list">
                                                                           @foreach($users as $usrRow)
                                                                           <div class="card mt-2">
                                                                               <div class="card-body">
                                                                                   <div class="desc">
                                                                                       <h6 class="badge bg-success text-white">
                                                                                           @if($usrRow->is_anonim == "false")
                                                                                           Nama Donatur : {{ $usrRow->nama }}
                                                                                           @else
                                                                                           Nama Donatur : Orang Baik

                                                                                           @endif
                                                                                       </h6>
                                                                                       <br>
                                                                                       <div class="d-flex justify-content-between">
                                                                                           <div class="d-flex align-items-center">
                                                                                <p class="">Donation Amount: Rp {{ number_format($usrRow->nominal, 0, ',', '.') }}</p>

                                                                                           </div>
                                                                                       </div>
                                                                                   </div>
                                                                               </div>
                                                                           </div>
                                                                           @endforeach
                                                                       </div>
                                                                   </div>

                                                               </div>
                                                           </div>
                                                       </div>
                                                       <div class="tab-pane fade" id="Reviews">
                                                           <!--Comments-->
                                                           <div class="comments-area">
                                                               <div class="row">
                                                                   <div class="col-lg-12">
                                                                       <div class="comment-list">
                                                                           @foreach($users as $usrRow)
                                                                           <div class="card mt-2">
                                                                               <div class="card-body">
                                                                                   <div class="desc">
                                                                                       <h6 class="badge bg-success text-white">
                                                                                           @if($usrRow->is_anonim == "false")
                                                                                           Nama Donatur : {{ $usrRow->nama }}
                                                                                           @else
                                                                                           Nama Donatur : Orang Baik

                                                                                           @endif
                                                                                       </h6>
                                                                                       <br>
                                                                                       <div class="d-flex justify-content-between">
                                                                                           <div class="d-flex align-items-center">
                                                                                               <p class="">{{ $usrRow->pesan }}</p>
                                                                                           </div>
                                                                                       </div>
                                                                                   </div>
                                                                               </div>
                                                                           </div>
                                                                           @endforeach
                                                                       </div>
                                                                   </div>

                                                               </div>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>

                                   </div>
                               </div>
                           </section>
                       </main>
                       @endsection