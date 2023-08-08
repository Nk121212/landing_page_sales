@extends('layouts.theme')

@section ('content')

<!-- <section class="w3l-about-breadcrumb position-relative text-center mt-4">
    <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
      <div class="container py-lg-5 py-3">
        <h2 class="title">Contact Us</h2>
        <ul class="breadcrumbs-custom-path mt-2">
        </ul>
      </div>
    </div>
</section> -->

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

<section class="mt-5">
  <div class="row">
    <div class="col-1"></div>
    <div class="col-6">
      <div class="text-center">
        <h1 style="text-transform:uppercase;">My Profile</h1>
        <p class="mt-3" style="font-family: 'Teko',Helvetica,Arial,Lucida,sans-serif;">
          {{ getUsersActive()->description_profile }}
        </p>
      </div>
    </div>
    <div class="col-4 text-center">
      <img src="{{ asset('storage/uploads') }}/{{ getUsersActive()->photo }}" alt="" class="img-fluid" style="width:50%;height:100%;">
    </div>
    <div class="col-1"></div>
  </div>
</section>


<div>
  <hr>
</div>





<!-- <div id="map" style="width:100%;height:380px;"></div>

</div> -->

@endsection

