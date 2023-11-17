                       @extends('layouts.app')
                       @section('content')
                       <section class="mt-10 mb-10">
                           <div class="container custom">
                               <div class="row">
                                   <div class="col-lg-12">
                                       <div class="single-header mb-50 text-center">
                                           <h3 class="font-xl text-brand">Blog Kami</h3>
                                           <h6>Berikut beberapa kegiatan sosial Kami</h6>
                                       </div>
                                       <div class="loop-grid pr-30">
                                           <div class="row">
                                               @foreach($post as $row)
                                               <div class="col-lg-3">
                                                   <article class="wow fadeIn animated hover-up mb-30 animated" style="visibility: visible;">
                                                       <div class="post-thumb img-hover-scale">
                                                           <a href="{{url('/blog/'. $row->id) }}">
                                                               <img src="{{ asset($row->image) }}" alt="">
                                                           </a>
                                                           <div class="entry-meta">
                                                           </div>
                                                       </div>
                                                       <div class="entry-content-2">
                                                           <div class="" style="height: 120px;overflow: hidden;">
                                                               <h4 class="post-title mb-15">
                                                                   <a href="{{url('/blog/'. $row->id) }}">{{ $row->judul_post }}</a>
                                                               </h4>
                                                           </div>
                                                           <div class="" style="height: 80px;overflow: hidden;">
                                                               <p class="post-exerpt mb-30 font-sm">{!! $row->isi !!}</p>
                                                           </div>

                                                           <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                                               <a href="{{url('/blog/'. $row->id) }}" class="text-brand">Read more <i class="fi-rs-arrow-right"></i></a>
                                                           </div>
                                                       </div>
                                                   </article>
                                               </div>
                                               @endforeach
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </section>
                       @endsection