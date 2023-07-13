@extends('layouts.theme')

@section ('content') 

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
                        <a href="">
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
                        <a href="">
                            <img src="https://radarpekalongan.disway.id/uploads/post-1.-dwi-ADV-nasmoco.jpg" class="img-fuild" alt="">
                        </a>
                        <div class="text-center">

                            <button class="btn btn-style btn-primary mt-3">Hubungi Kami</button>
                            <p class="card-text mb-0 mt-2 text-danger" style="text-transform: uppercase;">
                                M. Ridwan Taufik
                            </p>
                            <p class="card-text mb-0 mt-2">
                                Sales Executive
                            </p>
                            
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

                        <iframe src="{{ $data->embed }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" style="width:100%; height:400px;" allowfullscreen></iframe>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
