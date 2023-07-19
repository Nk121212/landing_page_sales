@extends('layouts.theme')

@section ('content') 

<div class="w3-services py-5">
    <div class="container py-lg-4">
        <div class="title-content text-left mb-lg-5 mb-4">
            <h6 class="sub-title">Our Products</h6>
            <h3 class="hny-title">All Products</h3>
            <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit hic odio.</p> -->
        </div>
        <div class="row w3-services-grids">
            @foreach(getProductsGroupByType() as $product)
            @php 
                $encodedId = base64_encode($product->id);
            @endphp
            <div class="col-lg-4 col-md-6 causes-grid">
                <div class="causes-grid-info">
                    <a href="{{ route('guest.products.detail') }}?param={{ $encodedId }}">
                        <img src="{{ asset('uploads') }}/{{ $product->photo }}" class="img-fuild" alt="">
                    </a>
                    <div class="text-center">

                        <p class="card-text mb-0 mt-2">
                            @php
                                $nominal = (int)$product->price;
                                $rupiah = rupiah($nominal);
                            @endphp
                            {{ $rupiah }}
                        </p>

                        <a class="btn btn-style btn-primary mt-1" href="{{ route('guest.products.detail') }}?param={{ $encodedId }}">{{ $product->name }}</a>
                        
                    </div>
                    
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div> 

@endsection
