@extends('layouts.app')
@section('content')
<section class="mt-10 mb-10">
    <div class="container custom">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="single-page pl-30">
                            <div class="single-header style-2">
                                <h4 class="">{{ $data->judul_post }}</h4>
                                <div class="single-header-meta">
                                    <div class="entry-meta meta-1 font-xs">

                                    </div>
                                </div>
                            </div>
                            <figure class="single-thumbnail">
                                  <center>
                                <img src="{{ asset( $data->image ) }}" alt="" style="height:200px">
                                </center>
                            </figure>
                            <div class="single-content">
                              
                                       {!! $data->isi !!}
                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
