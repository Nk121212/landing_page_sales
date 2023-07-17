@extends('layouts.theme')

@section ('content') 

<div class="w3-services py-5">
    <div class="container py-lg-4">
        <div class="title-content text-left mb-lg-5 mb-4">
            <h6 class="sub-title">Simulasi</h6>
            <h3 class="hny-title">Simulasi Kredit</h3>
            <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit hic odio.</p> -->
        </div>
        <div>
            <hr>
        </div>
        <div class="row w3-services-grids">
            @foreach(getSimulasi() as $simulasi)
            <div class="col-lg-6 col-md-6 causes-grid">
                <div class="causes-grid-info">
                    <a href="{{ asset('uploads') }}/{{ $simulasi->photo }}" target="_blank">
                        <img src="{{ asset('uploads') }}/{{ $simulasi->photo }}" class="img-fuild" alt="" width="100" height="300">
                    </a>
                    <div class="text-left">

                        <p class="card-text mb-0 mt-2">
                            <!-- {{ $simulasi->description }} -->
                        </p>

                    </div>
                    
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</div> 

@endsection

