@extends('layouts.theme')

@section('content')
    <div class="w3-services py-4">
        <div class="container py-lg-4">
            <div class="title-content text-center mb-lg-2 mb-2">
                <h6 class="sub-title">Detail Products</h6>
            </div>
            <div>
                <hr>
            </div>
            <div class="row w3-services-grids">

                <div class="col-lg-8 col-md-6 causes-grid">
                    <div class="causes-grid-info">
                        <a>
                            <img src="{{ asset('uploads') }}/{{ $data->photo }}" class="img-fuild" alt="">
                        </a>
                        <div class="text-center mt-2">
                            <h3 class="sub-title bg-danger text-white" style="border-radius: 10px;">{{ $data->name }}</h3>
                        </div>
                        <div>
                            <hr>
                        </div>
                        <div class="text-left mt-2">
                            <a href="{{ URL::asset('uploads') }}/{{ $data->brosur }}" target="_blank">
                                <i class="fa fa-download" aria-hidden="true"></i>
                                Download Brosur
                            </a>
                        </div>
                        <div>
                            <hr>
                        </div>
                        <div class="text-left mt-2">
                            <p>{{ $data->description }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 causes-grid">
                    <div class="causes-grid-info">
                        <a>
                            <img src="{{ asset('uploads') }}/{{ getUsersActive()->photo }}" class="img-fuild"
                                alt="">
                        </a>
                        <div class="text-center">
                            <a href="https://wa.me/{{ getUsersActive()->no_telp }}"
                                class="btn btn-style btn-primary mt-3">Hubungi Kami</a>

                            <p class="card-text mb-0 mt-2 text-danger" style="text-transform: uppercase;">
                                {{ getUsersActive()->name }}
                            </p>
                            <p class="card-text mb-0 mt-2">
                                Sales Executive
                            </p>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="container mb-3">
            <div class="title-content text-center mb-lg-2 mb-2">
                <h6 class="sub-title">Detail Product</h6>
                <!-- <h3 class="hny-title">{{ $data->name }}</h3> -->
            </div>
            <div>
                <hr>
            </div>
            <div class="owl-product-carousel owl-carousel owl-theme text-center">
                @foreach (getProductsDetail($data->id) as $details)
                    <div class="item">
                        <img src="{{ asset('uploads') }}/details/{{ $details->photo_detail }}" style="width:100%;">
                    </div>
                @endforeach
            </div>
        </div>

        <div class="container py-lg-4 mt-5">
            <div class="title-content text-center mb-lg-2 mb-2">
                <h6 class="sub-title">Products Terkait</h6>
                <!-- <h3 class="hny-title">{{ $data->name }}</h3> -->
            </div>
            <div>
                <hr>
            </div>
            <div class="row w3-services-grids">
                <div class="col-lg-12 col-md-12 causes-grid">
                    <div class="causes-grid-info">

                        @php
                            $param = base64_decode(app('request')->input('param'));
                        @endphp

                        <div class="row">
                            <div class="row w3-services-grids">
                                @foreach(getProductTerkait($param) as $terkait)
                                @php 
                                    $encodedId = base64_encode($terkait->id);
                                @endphp
                                <div class="col-lg-4 col-md-6 causes-grid">
                                    <div class="causes-grid-info">
                                        <a href="{{ route('guest.products.detail') }}?param={{ $encodedId }}">
                                            <img src="{{ asset('uploads') }}/{{ $terkait->photo }}" class="img-fuild" alt="">
                                        </a>
                                        <div class="text-center">

                                            <p class="card-text mb-0 mt-2">
                                                @php
                                                    $nominal = (int)$terkait->price;
                                                    $rupiah = rupiah($nominal);
                                                @endphp
                                                {{ $rupiah }}
                                            </p>

                                            <a class="btn btn-style btn-primary mt-1" href="{{ route('guest.products.detail') }}?param={{ $encodedId }}">{{ $terkait->name }}</a>
                                            
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

        

        <div class="container py-lg-4">
            <div class="title-content text-center mb-lg-2 mb-2">
                <h6 class="sub-title">Video Terkait</h6>
                <!-- <h3 class="hny-title">{{ $data->name }}</h3> -->
            </div>
            <div>
                <hr>
            </div>
            <div class="row w3-services-grids">
                <div class="col-lg-12 col-md-6 causes-grid">
                    <div class="causes-grid-info">

                        <iframe src="{{ $data->embed }}" title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            style="width:100%; height:400px;" allowfullscreen></iframe>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
