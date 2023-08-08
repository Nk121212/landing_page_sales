<footer class="w3l-footer-66">
    <!-- <section class="footer-inner-main">
      <div class="footer-hny-grids py-5">
        <div class="container py-lg-4">
          <div class="text-txt"> -->
            
            
            <!-- <div class="row">
              <div class="col-2"></div>
              <div class="col-4 text-left">
                <h5 style="color:white!important;margin-bottom:1rem;">Kabupaten</h5>
                <p>Balangan</p>
                <p>Banjar</p>
                <p>Barito Kuala</p>
                <p>Hulu Sungai Selatan</p>
                <p>Hulu Sungai Tengah</p>
                <p>Hulu Sungai Utara</p>
                <p>Kota Baru</p>
                <p>Tabalong</p>
                <p>Tanah Bumbu</p>
                <p>Tanah Laut</p>
                <p>Tapin</p>
              </div>
              <div class="col-4 text-left">
                <h5 style="color:white!important;margin-bottom:1rem;">Kota</h5>
                <p>Kota Banjarbaru</p>
                <p>Kota Banjarmasin</p>
              </div>
              <div class="col-2"></div>
            </div> -->

            <section class="mt-3">
              <div class="row text-center">
                <!-- <div class="col-1"></div> -->
                <div class="col-12">
                  <div class="card" style="width: 100%;background-color:#002b5e;">
                    <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
                    <div class="card-body">
                      <div class="row">
                        
                        <div class="col-3">

                          <h5 class="card-title text-white">
                            <i class="fa fa-map-marker fa-2x"></i>
                            <!-- <b><strong> Location</strong></b> -->
                          </h5>
                          <p class="card-text text-white" style="font-size: 12px;">{{ getUsersActive()->alamat_kantor }}</p>

                        </div>

                        <div class="col-2">

                        <h5 class="card-title text-white">
                          <i class="fa fa-phone fa-2x"></i> 
                          <!-- <b><strong>Phone</strong></b> -->
                        </h5>
                        <p class="card-text text-white" style="font-size: 12px;">{{ getUsersActive()->no_telp }}</p>

                        </div>

                        <div class="col-2">

                        <h5 class="card-title text-white">
                          <i class="fa fa-instagram fa-2x"></i> 
                          <!-- <b><strong>Phone</strong></b> -->
                        </h5>
                        <p class="card-text text-white" style="font-size: 12px;">{{ getUsersActive()->instagram }}</p>

                        </div>

                        <div class="col-2">

                        <h5 class="card-title text-white">
                          <i class="fa fa-envelope fa-2x"></i> 
                          <!-- <b><strong>Email</strong></b> -->
                        </h5>
                        <p class="card-text text-white" style="font-size: 12px;">{{ getUsersActive()->email }}</p>

                        </div>

                        <div class="col-3">

                        <h5 class="card-title text-white">
                          <i class="fa fa-whatsapp fa-2x"></i> 
                          <!-- <b><strong>Whatsapp</strong></b> -->
                        </h5>
                        <p class="card-text text-white" style="font-size: 12px;">{{ getUsersActive()->no_telp }}</p>

                        </div>

                      </div>
                      
                    </div>
                  </div>
                </div>
                <!-- <div class="col-1"></div> -->
              </div>
            </section>

          </div>
        </div>
      </div>
      <div class="below-section">
        <div class="container">
          <div class="copyright-footer">
            <div class="columns text-lg-left">
              <p>© 2020 Carserving. All rights reserved | Designed by <a href="https://w3layouts.com">W3layouts</a></p>
            </div>
            <ul class="columns text-lg-right">
              <li><a href="#">Privacy Policy</a>
              </li>
              <li>|</li>
              <li><a href="#">Terms Of Use</a>
              </li>
            </ul>
          <!-- </div>
        </div>
      </div> -->
      <!-- copyright -->
      <!-- move top -->
      <button class="movetop" onclick="topFunction()" id="movetop" title="Go to top" style="display: block;">
        <span class="fa fa-long-arrow-up" aria-hidden="true"></span>
      </button>

      <div class="wrapper-footer">
          <a class="social-footer" target="_blank" href="https://wa.me/{{ getUsersActive()->no_telp }}"><i class="fa fa-whatsapp"></i></a>
          <a class="social-footer" href="tel:{{ getUsersActive()->no_telp }}"> <i class="fa fa-phone"></i></a>
          <a class="close-button"> 
            <i class="fa fa-close"></i>
          </a>
      </div>
      

    <!-- </section> -->
  </footer>