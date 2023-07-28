@extends('layouts.theme')

@section('content')

<style>
    #scroll-container {
    /* position:fixed; */
    top:6rem;
    /* border: 3px solid black; */
    border-radius: 5px;
    overflow: hidden;
    z-index: 10;
    width: 100%;
    }

    #scroll-text {
    /* animation properties */
    -moz-transform: translateX(100%);
    -webkit-transform: translateX(100%);
    transform: translateX(100%);
    
    -moz-animation: my-animation 15s linear infinite;
    -webkit-animation: my-animation 15s linear infinite;
    animation: my-animation 15s linear infinite;
    }

    /* for Firefox */
    @-moz-keyframes my-animation {
    from { -moz-transform: translateX(100%); }
    to { -moz-transform: translateX(-100%); }
    }

    /* for Chrome */
    @-webkit-keyframes my-animation {
    from { -webkit-transform: translateX(100%); }
    to { -webkit-transform: translateX(-100%); }
    }

    @keyframes my-animation {
        from {
            -moz-transform: translateX(100%);
            -webkit-transform: translateX(100%);
            transform: translateX(100%);
        }
        to {
            -moz-transform: translateX(-100%);
            -webkit-transform: translateX(-100%);
            transform: translateX(-100%);
        }
    }

</style>

<section class="w3l-main-slider position-relative mt-1" id="home">
    <div class="companies20-content">
      <div class="owl-one owl-carousel owl-theme owl-loaded owl-drag">
        <div class="owl-stage-outer">
            <div class="owl-stage" style="transform: translate3d(-2698px, 0px, 0px); transition: all 0s ease 0s; width: 10792px;">
                @foreach(getProducts() as $product)
                @php 
                    $encodedId = base64_encode($product->id);
                @endphp
                <div class="owl-item active" style="width: 1349px;">
                    <div class="item">
                        <li>
                            <div class="slider-info banner-view banner-top2 bg bg2" style="background: url('{{ asset('storage/uploads') }}/{{ $product->photo }}') no-repeat center;">
                                <div class="banner-info">
                                    <div class="container">
                                        <div class="banner-info-bg">
                                            <p style="text-transform: uppercase;font-weight:bold;font-size: 40px;">{{ $product->name }}</p>
                                            <p style="font-weight:bold;font-size: 20px;margin-top: 10px;">{{ $product->slogan }}</p>
                                            @php
                                                $str = $product->description;
                                                $useDesc = substr($str, 0, 40).' ...';
                                            @endphp
                                            <p style="font-size: 14px;margin-top: 10px;">{{ $useDesc }}</p>
                                            <div class="banner-buttons">
                                                <a class="btn btn-style btn-primary" href="{{ route('guest.products.detail') }}?param={{ $encodedId }}">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="owl-nav">
            <button type="button" role="presentation" class="owl-prev"><span aria-label="Previous"> 
                <span class="fa fa-angle-left"></span> </span></button><button type="button" role="presentation" class="owl-next">
                    <span aria-label="Next"> <span class="fa fa-angle-right"></span> </span></button></div><div class="owl-dots">
                        <button role="button" class="owl-dot active"><span></span></button><button role="button" class="owl-dot">
                            <span></span></button><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button></div></div>
    </div>
</section>

<section class="mt-4 text-center">
    <div id="scroll-container">
    <div id="scroll-text">
        <h3>Selamat Datang di Dealer Hyundai Banjarbaru</h3>
    <div>
    </div>
</section>

@foreach(getPromo() as $promo)
<section class="w3l-content-3 mt-0">
    <!-- /content-3-main-->
    <div class="content-3-mian py-5">
      <div class="container py-lg-5">
        <div class="content-info-in row">
          <div class="col-lg-6">
            <img src="{{ asset('storage/uploads') }}/{{ $promo->photo }}" alt="" class="img-fluid">
          </div>
          <div class="col-lg-6 mt-lg-0 mt-5 about-right-faq align-self  pl-lg-5">
            <div class="title-content text-left mb-2">
              <h6 class="sub-title">Promo</h6>
              <h3 class="hny-title">{{ $promo->name }}</h3>
            </div>
            <p class="mt-3">{{ $promo->description }}</p>
            <!-- <a href="about.html" class="btn btn-style btn-primary mt-md-5 mt-4">Read More</a> -->
          </div>
        </div>
      </div>
  </div>
</section>
@endforeach

<section class="w3l-testimonials">
    <div class="testimonials py-5">
        <div class="container text-center py-lg-3">
            <div class="title-content text-center mb-lg-5 mb-4">
                <h6 class="sub-title">Client Testimonials</h6>
                <h3 class="hny-title">100% approved by customers</h3>
            </div>
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="owl-testimonial owl-carousel owl-theme owl-loaded owl-drag">

                        <div class="owl-stage-outer">
                            @php 
                                $i=0;
                            @endphp
                            @foreach(getTestimoni() as $testi)
                                @if($i == 0)
                                    <div class="owl-stage" style="transform: translate3d(-4849px, 0px, 0px); transition: all 0.25s ease 0s; width: 7760px;"><div class="owl-item cloned" style="width: 969.984px;">
                                        <div class="item">
                                            <div class="slider-info mt-lg-4 mt-3">
                                                <div class="img-circle">
                                                    <img src="{{ asset('storage/uploads') }}/{{ $testi->photo }}" class="img-fluid rounded" alt="client image">
                                                </div>
                                                <div class="message">
                                                    {{ $testi->description }}
                                                </div>
                                                <div class="name">- {{ $testi->name }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="owl-item" style="width: 969.984px;">
                                        <div class="item">
                                            <div class="slider-info mt-lg-4 mt-3">
                                                <div class="img-circle">
                                                    <img src="{{ asset('storage/uploads') }}/{{ $testi->photo }}" class="img-fluid rounded" alt="client image">
                                                </div>
                                                <div class="message">
                                                    {{ $testi->description }}
                                                </div>
                                                <div class="name">- {{ $testi->name }}</div>
                                            </div>
                                        </div>
                                    </div>

                                @endif

                                @php
                                    $i++
                                @endphp

                            @endforeach
                            <!-- <div class="owl-item cloned" style="width: 969.984px;">
                                <div class="item">
                                    <div class="slider-info mt-lg-4 mt-3">
                                        <div class="img-circle">
                                            <img src="assets/images/team4.jpg" class="img-fluid rounded" alt="client image">
                                        </div>
                                        <div class="message">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea sit
                                            id
                                            accusantium
                                            officia quod quasi necessitatibus perspiciatis Harum error provident
                                            quibusdam tenetur.
                                        </div>
                                        <div class="name">- Elizabeth</div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="owl-item" style="width: 969.984px;">
                                <div class="item">
                                    <div class="slider-info mt-lg-4 mt-3">
                                        <div class="img-circle">
                                            <img src="assets/images/team1.jpg" class="img-fluid rounded" alt="client image">
                                        </div>
                                        <div class="message">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea sit
                                                id
                                                accusantium
                                                officia quod quasi necessitatibus perspiciatis Harum error provident
                                                quibusdam tenetur.
                                        </div>
                                        <div class="name">- Jenkins</div>

                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="owl-item" style="width: 969.984px;">
                                <div class="item">
                                    <div class="slider-info mt-lg-4 mt-3">
                                        <div class="img-circle">
                                            <img src="assets/images/team3.jpg" class="img-fluid rounded" alt="client image">
                                        </div>
                                        <div class="message">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea sit
                                            id
                                            accusantium
                                            officia quod quasi necessitatibus perspiciatis Harum error provident
                                            quibusdam tenetur.
                                        </div>
                                        <div class="name">- Kiss Kington</div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="owl-item active" style="width: 969.984px;">
                                <div class="item">
                                    <div class="slider-info mt-lg-4 mt-3">
                                        <div class="img-circle">
                                            <img src="assets/images/team4.jpg" class="img-fluid rounded" alt="client image">
                                        </div>
                                        <div class="message">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea sit
                                            id
                                            accusantium
                                            officia quod quasi necessitatibus perspiciatis Harum error provident
                                            quibusdam tenetur.
                                        </div>
                                        <div class="name">- Elizabeth</div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="owl-item cloned" style="width: 969.984px;">
                                <div class="item">
                                    <div class="slider-info mt-lg-4 mt-3">
                                        <div class="img-circle">
                                            <img src="assets/images/team1.jpg" class="img-fluid rounded" alt="client image">
                                        </div>
                                            <div class="message">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea sit
                                                id
                                                accusantium
                                                officia quod quasi necessitatibus perspiciatis Harum error provident
                                                quibusdam tenetur.
                                            </div>
                                            <div class="name">- Jenkins</div>

                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="owl-item cloned" style="width: 969.984px;">
                                    <div class="item">
                                        <div class="slider-info mt-lg-4 mt-3">
                                            <div class="img-circle">
                                                <img src="assets/images/team2.jpg" class="img-fluid rounded" alt="client image">
                                            </div>
                                            <div class="message">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea sit
                                                id
                                                accusantium
                                                officia quod quasi necessitatibus perspiciatis Harum error provident
                                                quibusdam tenetur.
                                            </div>
                                            <div class="name">- John Balmer</div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous"> <span class="fa fa-angle-left"></span> </span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next"> <span class="fa fa-angle-right"></span> </span></button></div><div class="owl-dots"><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot active"><span></span></button></div></div>
                    </div>
                </div>
            </div>
        </div>
</section>

@endsection
