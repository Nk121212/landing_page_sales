@extends('layouts.theme')

@section ('content') 

<div class="w3-services py-5">
    <div class="container py-lg-4">
        <div class="title-content text-left mb-lg-5 mb-4">
            <h6 class="sub-title">News</h6>
            <h3 class="hny-title">Latest News</h3>
            <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit hic odio.</p> -->
        </div>
        <div>
            <hr>
        </div>
        <div class="row w3-services-grids">
            @foreach(getNews() as $news)
            <div class="col-lg-3 col-md-6 causes-grid">
                <div class="causes-grid-info">
                    <a href="">
                        <img src="{{ asset('uploads') }}/{{ $news->photo }}" class="img-fuild" alt="" width="100" height="100">
                    </a>
                    <div class="text-left">

                        <p class="card-text mb-0 mt-2">
                            {{ $news->description }}
                        </p>

                    </div>
                    
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</div> 

@endsection

