@extends('layouts.theme')

@section ('content')

<section class="w3l-about-breadcrumb position-relative text-center mt-4">
    <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
      <div class="container py-lg-5 py-3">
        <h2 class="title">Contact Us</h2>
        <ul class="breadcrumbs-custom-path mt-2">
          <!-- <li><a href="#url">Home</a></li> -->
          <!-- <li class="active"><span class="fa fa-angle-double-right mx-2" aria-hidden="true"></span> Contact </li> -->
        </ul>
      </div>
    </div>
</section>

<div>
  <hr>
</div>

<!-- <section class="mt-4">
  <div class="row">

      <div class="col-10"></div>

      <div class="col-2 row">
        <div class="col-4">
          <a class="contact_wa_btn" target="_blank" href="https://wa.me/{{ getUsersActive()->no_telp }}" title="Share to WhatsApp">
            <i class="fa fa-whatsapp"></i>
          </a>
        </div>
        <div class="col-4">
          <a class="contact_phone_btn" target="_blank" href="tel:{{ getUsersActive()->no_telp }}" title="Call Me">
            <i class="fa fa-phone"></i>
          </a>
        </div>
        <div class="col-4">
          <a class="contact_ig_btn" target="_blank" href="{{ getUsersActive()->instagram }}" title="My Instagram">
            <i class="fa fa-instagram"></i>
          </a>
        </div>
      </div>
  </div>
</section> -->

<section class="mt-4">
  <div class="row">
    <div class="col-1"></div>
    <div class="col-6">
      <div class="text-center">
        <h1 style="text-transform:uppercase;">Contact Info</h1>
        <p class="mt-3" style="font-family: 'Teko',Helvetica,Arial,Lucida,sans-serif;">
          Hi, saya <b style="text-transform:uppercase;">{{ getUsersActive()->name }}</b>, Branch Manager Dealer Resmi Hyundai Leuwi Panjangan Bandung akan membantu Anda dalam memiliki kendaraan Hyundai dalam bentuk: konsultasi menentukan produk Hyundai yang sesuai dengan kebutuhan, konsultasi pembelian cash/credit yang sesuai dan cocok dengan dana yang dimiliki, memberikan paket promo terbaik, test drive kendaraan, layanan service seperti booking service, dan lain sebagainya. Ada yang ingin ditanyakan? Hubungi kontak saya di bawah ini.
        </p>
      </div>
    </div>
    <div class="col-4 text-center">
      <img src="{{ asset('uploads') }}/{{ getUsersActive()->photo }}" alt="" class="img-fluid" style="width:50%;height:100%;">
    </div>
    <div class="col-1"></div>
  </div>
</section>


<div>
  <hr>
</div>

<section class="mt-3">
  <div class="row text-center">
    <div class="col-1"></div>
    <div class="col-10">
      <div class="card" style="width: 100%;background-color:#002b5e;">
        <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
        <div class="card-body">
          <div class="row">
            
            <div class="col-3">

              <h5 class="card-title text-white">
                <i class="fa fa-map-marker"></i>
                <b><strong> Location</strong></b>
              </h5>
              <p class="card-text text-white">Banjarbaru_kalsel, simpang 4, Kota Banjar Baru, Kalimantan Selatan 70721</p>

            </div>

            <div class="col-3">

            <h5 class="card-title text-white"><i class="fa fa-phone"></i> 
              <b><strong>Phone</strong></b>
            </h5>
            <p class="card-text text-white">{{ getUsersActive()->no_telp }}</p>

            </div>

            <div class="col-3">

            <h5 class="card-title text-white"><i class="fa fa-envelope"></i> 
              <b><strong>Email</strong></b>
            </h5>
            <p class="card-text text-white">{{ getUsersActive()->email }}</p>

            </div>

            <div class="col-3">

            <h5 class="card-title text-white"><i class="fa fa-whatsapp"></i> 
              <b><strong>Whatsapp</strong></b>
            </h5>
            <p class="card-text text-white">{{ getUsersActive()->no_telp }}</p>

            </div>

          </div>
          
        </div>
      </div>
    </div>
    <div class="col-1"></div>
  </div>
</section>





<!-- <div id="map" style="width:100%;height:380px;"></div>

</div> -->

@endsection

