<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->

@php
    if (!isset($action)) {
        $action = ['createUrl' => '', 'updateUrl' => ''];
    } else {
        $action = $action;
    }
    
@endphp

<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="ad.orientation" content="portrait">

    <title>Landing Page Hyundai</title>
    <!-- Template CSS -->
    <link href="//fonts.googleapis.com/css?family=Poppins:300,400,400i,500,600,700&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css2?family=Limelight&display=swap" rel="stylesheet">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style-starter.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datepicker/bootstrap-datepicker3.css') }}">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <style>
        .w3l-main-slider .banner-view {
            background-size: cover;
            min-height: calc(100vh - 30px);
            position: relative;
            z-index: 0;
            display: grid;
            align-items: center;
        }

        /* .w3l-main-slider .banner-top1 {
        background: url("{{ asset('assets/images/banner2.jpg') }}") no-repeat center;
        background-size: cover;
    }

    .w3l-main-slider .banner-top2 {
        background: url("{{ asset('assets/images/banner3.jpg') }}") no-repeat center;
        background-size: cover;
    }

    .w3l-main-slider .banner-top3 {
        background: url("{{ asset('assets/images/banner4.jpg') }}") no-repeat center;
        background-size: cover;
    } */

        .wrapper-footer {
            position: fixed;
            bottom: 5px;
            left: 20px;
            z-index: 1000;
        }

        .wrapper-footer a:nth-child(1) {
            background-color: green;
        }

        .wrapper-footer a:nth-child(2) {
            background-color: blue;
        }

        .wrapper-footer a:nth-child(3) {

            animation: 0.7s ease-out 0s 1 FadeIn;
            transition: all 0.3s;
        }


        .wrapper-footer a:hover:nth-child(3) {

            background-color: red;
        }


        @keyframes FadeIn {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }


        .hide {
            position: absolute;
            bottom: 0px !important;
            z-index: -1;
            transition: all 2s;

        }

        .social-footer {}

        .wrapper-footer a {
            height: 45px;
            width: 46px;
            background: #000;
            padding: 10px;
            display: flex;
            flex-direction: row;
            border-radius: 50%;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            color: #fff;
            margin: 2px;
            margin-top: 1px;
        }
    </style>

    <style>
        @import url(https://fonts.googleapis.com/css?family=Raleway:400,200,300,800);
        @import url(https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css);

        figure.snip0057 {
            font-family: 'Raleway', Arial, sans-serif;
            position: relative;
            overflow: hidden;
            margin-top: 5%;
            /* margin: 10px; */
            min-width: 380px;
            /* max-width: 480px; */
            width: 100%;
            background: #ffffff;
            color: #000000;
        }

        figure.snip0057 * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-transition: all 0.35s ease-in-out;
            transition: all 0.35s ease-in-out;
        }

        figure.snip0057 .image {
            width: 25%;
            overflow: hidden;
            z-index: 1;
            -webkit-transform: skewX(-15deg);
            transform: skewX(-15deg);
        }

        figure.snip0057 .image img {
            position: relative;
            display: block;
            /* left: -15%; */
            z-index: 1;
            -webkit-transform: skew(15deg);
            transform: skew(15deg);
        }

        figure.snip0057:before {
            position: absolute;
            content: '';
            height: 100%;
            width: 45%;
            background: rgba(0, 0, 0, 0.2);
            -webkit-transform: skewX(-17deg);
            transform: skewX(-17deg);
            -webkit-box-shadow: 15px 0px 25px rgba(0, 0, 0, 0.7);
            box-shadow: 15px 0px 25px rgba(0, 0, 0, 0.7);
        }

        figure.snip0057 figcaption {
            padding: 20px 30px 20px 20px;
            position: absolute;
            right: 0;
            bottom: 10px;
            width: 50%;
        }

        figure.snip0057 figcaption h2,
        figure.snip0057 figcaption p {
            margin: 0;
            text-align: right;
            padding: 10px 0;
            width: 100%;
        }

        figure.snip0057 figcaption h2 {
            font-size: 1.3em;
            font-weight: 300;
            text-transform: uppercase;
            border-bottom: 1px solid rgba(0, 0, 0, 0.2);
        }

        figure.snip0057 figcaption h2 span {
            font-weight: 800;
        }

        figure.snip0057 figcaption p {
            font-size: 0.9em;
            opacity: 0.8;
        }

        figure.snip0057 figcaption .icons {
            width: 100%;
            text-align: right;
        }

        figure.snip0057 figcaption .icons i {
            font-size: 26px;
            padding: 5px;
            top: 50%;
            color: #000000;
            opacity: 0;
        }

        figure.snip0057 figcaption a {
            opacity: 0.3;
        }

        figure.snip0057 figcaption a:hover {
            opacity: 0.8;
        }

        figure.snip0057 .position {
            position: absolute;
            bottom: 0;
            width: 100%;
            text-align: right;
            padding: 15px 30px;
            font-size: 0.9em;
            opacity: 1;
            font-style: italic;
            color: #ffffff;
            background: #000000;
        }

        figure.snip0057.blue .position {
            background: #20638f;
        }

        figure.snip0057.red .position {
            background: #962d22;
        }

        figure.snip0057.yellow .position {
            background: #bf6516;
        }

        figure.snip0057:hover figcaption,
        figure.snip0057.hover figcaption {
            bottom: 40px;
        }

        figure.snip0057:hover .icons i,
        figure.snip0057.hover .icons i {
            opacity: 1;
            -webkit-transition-delay: 0.2s;
            transition-delay: 0.2s;
        }

        figure.snip0057:hover:before,
        figure.snip0057.hover:before {
            -webkit-animation: shadow 0.6s ease-in-out;
            animation: shadow 0.6s ease-in-out;
        }

        @-webkit-keyframes shadow {
            0% {
                left: 0px;
            }

            50% {
                left: -5px;
            }

            100% {
                left: 0px;
            }
        }

        @keyframes shadow {
            0% {
                left: 0px;
            }

            50% {
                left: -5px;
            }

            100% {
                left: 0px;
            }
        }
    </style>

    <style>
        .contact_wa_btn {
            background-color: #6dd96d;
            padding: 5px 10px 5px 10px;
            color: white;
            font-size: 20px;
            border-radius: 25px;
        }

        .contact_phone_btn {
            background-color: #6e6cef;
            padding: 5px 10px 5px 10px;
            color: white;
            font-size: 20px;
            border-radius: 25px;
        }

        .contact_ig_btn {
            background-color: #fccc63;
            padding: 5px 10px 5px 10px;
            color: white;
            font-size: 20px;
            border-radius: 25px;
        }
    </style>

</head>

<body>
    <!--header-->
    <header id="site-header" class="fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <!-- <img src="{{ asset('assets/images/logo.png') }}" alt="" srcset=""> -->
                <div>
                    <img src="{{ asset('assets/images/logo.png') }}" alt="No Logo" style="width: 86%;">
                </div>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa icon-expand fa-bars"></span>
                    <span class="fa icon-close fa-times"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item home">
                                    <a class="nav-link" href="{{ route('home') }}">Home </a>
                                </li>
                                <li class="nav-item products">
                                    <a class="nav-link" href="{{ route('guest.products') }}">Product</a>
                                </li>
                                <li class="nav-item news">
                                    <a class="nav-link" href="{{ route('guest.news') }}">News</a>
                                </li>
                                <li class="nav-item simulasi">
                                    <a class="nav-link" href="{{ route('guest.simulasi') }}">Simulasi</a>
                                </li>
                                <li class="nav-item contact">
                                    <a class="nav-link" href="{{ route('guest.contact') }}">Contact Us</a>
                                </li>
                                <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li> -->
                            @endif
                        @else
                            <li class="nav-item products">
                                <a class="nav-link" href="{{ route('admin.products') }}">Product</a>
                            </li>
                            <li class="nav-item categories">
                                <a class="nav-link" href="{{ route('admin.categories') }}">Categories</a>
                            </li>
                            <li class="nav-item simulasi">
                                <a class="nav-link" href="{{ route('admin.simulasi') }}">Simulasi</a>
                            </li>
                            <li class="nav-item testimoni">
                                <a class="nav-link" href="{{ route('admin.testimoni') }}">Testimoni</a>
                            </li>
                            <li class="nav-item news">
                                <a class="nav-link" href="{{ route('admin.news') }}">News</a>
                            </li>
                            <li class="nav-item promo">
                                <a class="nav-link" href="{{ route('admin.promo') }}">Promo</a>
                            </li>
                            <li class="nav-item profile">
                                <a class="nav-link" href="{{ route('admin.my-users') }}">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>


                        @endguest
                    </ul>
                    <ul class="navbar-nav search-right mt-lg-0 mt-2">
                        <!-- <li class="nav-item mr-3" title="Search"><a href="#search" class="btn search-search">
                <span class="fa fa-search" aria-hidden="true"></span></a></li>
            <li class="nav-item"><a href="contact.html" class="btn btn-primary d-none d-lg-block btn-style mr-2">Contact
                Us</a></li> -->
                    </ul>

                    <!-- //toggle switch for light and dark theme -->
                    <!-- search popup -->
                    <div id="search" class="pop-overlay">
                        <div class="popup">
                            <form action="#" method="GET" class="d-sm-flex">
                                <input type="search" placeholder="Search.." name="search" required="required"
                                    autofocus>
                                <button type="submit">Search</button>
                                <a class="close" href="#url">&times;</a>
                            </form>
                        </div>
                    </div>
                    <!-- /search popup -->
                </div>
                <!-- toggle switch for light and dark theme -->
                <div class="mobile-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container">
                                    <!-- <i class="gg-sun"></i>
                  <i class="gg-moon"></i> -->
                                </div>
                            </label>
                        </div>
                    </nav>
                </div>
            </nav>
        </div>
    </header>

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>

    <script src="{{ asset('assets/js/owl.carousel.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countup.js') }}"></script>

    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/jquery.dataTables.min.js') }}"></script>

    <script src="{{ asset('assets/js/theme-change.js') }}"></script>

    <script src="{{ asset('js/helper.js') }}"></script>
    <script src="{{ asset('assets/datepicker/bootstrap-datepicker.min.js') }}"></script>

    <div class="fixed-top text-right text-white show-my-toast" style="width: 25%;"></div>


    <!-- <script src="http://maps.googleapis.com/maps/api/js"></script> -->
    <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOnRnCM70E5HWQ5wgDJ8SOz955ILS8jrc&callback=initMap"></script>

    <script>
        let map;
        $(document).ready(function() {
            initMap();
        })

        async function initMap() {
            const {
                Map
            } = await google.maps.importLibrary("maps");

            map = new Map(document.getElementById("map"), {
                center: {
                    lat: -34.397,
                    lng: 150.644
                },
                zoom: 8,
            });
        }
    </script>

    <div style="margin-top: 2%;margin-bottom: 10%;">
        <section>
            <main class="py-4">
                @yield('content')
            </main>
        </section>
    </div>

</body>

<script>
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("movetop").style.display = "block";
        } else {
            document.getElementById("movetop").style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>

<script>
    $(document).ready(function() {

        var createUrl = "{{ $action['createUrl'] }}";
        var updateUrl = "{{ $action['updateUrl'] }}";

        $('#btn-add').click(function() {
            $('#myModal').modal({
                backdrop: 'static',
                keyboard: false
            });
            $('#formCRUD').attr('action', createUrl);
            $('input[name="password"]').prop('required', true);
        });

        var segment = "{{ request()->segment(2) }}";
        $('.nav-item').removeClass('active');

        if (segment == "") {
            $('.home').addClass('active');
        } else {
            $('.{{ request()->segment(2) }}').addClass('active');
        }

        $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',

            fixedContentPos: false,
            fixedBgPos: true,

            overflowY: 'auto',

            closeBtnInside: true,
            preloader: false,

            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });

        $('.popup-with-move-anim').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-slide-bottom'
        });

    });
</script>
<!--//-->

<!-- script for banner slider-->
<script>
    $(document).ready(function() {
        $('.owl-one').owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            responsiveClass: true,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplaySpeed: 1000,
            autoplayHoverPause: false,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                480: {
                    items: 1,
                    nav: true
                },
                667: {
                    items: 1,
                    nav: true
                },
                1000: {
                    items: 1,
                    nav: true
                }
            }
        });

        $('.owl-product-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            center: true,
            responsiveClass: true,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplaySpeed: 1000,
            autoplayHoverPause: false,
            responsive: {
                0: {
                    items: 4,
                    nav: true
                },
                480: {
                    items: 4,
                    nav: true
                },
                667: {
                    items: 4,
                    nav: true
                },
                1000: {
                    items: 4,
                    nav: true
                }
            }
        });
    })
</script>
<!-- //script -->
<!-- script for owlcarousel -->
<script>
    $(document).ready(function() {
        $('.owl-testimonial').owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            responsiveClass: true,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplaySpeed: 1000,
            autoplayHoverPause: false,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                480: {
                    items: 1,
                    nav: false
                },
                667: {
                    items: 1,
                    nav: false
                },
                1000: {
                    items: 1,
                    nav: false
                }
            }
        })
    })
</script>
<!-- disable body scroll which navbar is in active -->
<script>
    $(function() {
        $('.navbar-toggler').click(function() {
            $('body').toggleClass('noscroll');
        })
    });
</script>
<!-- disable body scroll which navbar is in active -->

<!-- stats number counter-->

<script>
    $('.counter').countUp();
</script>
<!-- //stats number counter -->
<!--/MENU-JS-->
<script>
    $(window).on("scroll", function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 80) {
            $("#site-header").addClass("nav-fixed");
        } else {
            $("#site-header").removeClass("nav-fixed");
        }
    });

    //Main navigation Active Class Add Remove
    $(".navbar-toggler").on("click", function() {
        $("header").toggleClass("active");
    });
    $(document).on("ready", function() {
        if ($(window).width() > 991) {
            $("header").removeClass("active");
        }
        $(window).on("resize", function() {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
        });
    });
</script>

@include('layouts.footer')

</html>
