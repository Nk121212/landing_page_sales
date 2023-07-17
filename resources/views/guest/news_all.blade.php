@extends('layouts.theme')

@section ('content') 

<section class="w3l-content-3">
    <div class="content-3-mian py-5">
      <div class="container py-lg-5">
        <div class="content-info-in row">
        @foreach(getNews() as $news)
            <div class="col-lg-4 mt-lg-0 mt-5 about-right-faq align-self pl-lg-5" style="margin-bottom: 10px;">
                <img src="{{ asset('uploads') }}/{{ $news->photo }}" alt="" class="img-fluid" style="width: 100%;height: 186px;">
            </div>
            <div class="col-lg-6" style="margin-bottom: 10px;">

                <div class="title-content text-left mb-2">
                    <!-- <h6 class="sub-title">Who We Are</h6> -->
                    <p class="" style="font-weight: bold;font-size: 20px;"> 
                        {{ $news->judul }}
                    </p>
                </div>
                <p class="mt-3" style="font-style: italic;font-size: 12px;">{{ $news->description }}</p>

            </div>
            <div class="col-2">

            </div>
            <div class="col-12">
                <hr>
            </div>
        @endforeach
            <div class="col-12 text-right">
                <a href="{{ route('guest.news') }}">Back ></a>
            </div>
        </div>
      </div>
  </div>
</section>

@endsection

