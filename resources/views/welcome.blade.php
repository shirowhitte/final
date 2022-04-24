<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>FoodOnClick</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo asset('css/main.css')?>" type="text/css">
        
          <!-- Vendor CSS Files -->
        <link href="/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
        <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
        <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="/assets/vendor/php-email-form/validate.js"></script>
        <script src="/assets/js/jquery-3.5.1.min.js"></script>
        <script src="/assets/js/multislider.min"></script>
        <script src="/assets/js/main.js"></script>
        <script src="/assets/main.js"></script>
    </head>
    <body>

        <!-- ======= Top Bar ======= -->
        <section id="topbar" class="d-flex align-items-center fixed-top topbar-gray">
            <div class="container-fluid container-xl d-flex align-items-center justify-content-center justify-content-lg-start">
            <i class="bi bi-phone d-flex align-items-center"><span>+65 9283 1829</span></i>
            <i class="bi bi-envelope ms-4 d-none d-lg-flex align-items-center"><span>foodonclickSG@gmail.com</span></i>
            </div>
        </section>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-gray">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <div class="logo me-auto">
        <h1 class="p-2"><a href=""><img src="assets/img/foodonclick.png" alt="FoodOnClick" style="max-height: 60px;"></a></h1>
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#menu">Menu</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="book-a-table-btn scrollto">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="book-a-table-btn scrollto">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="book-a-table-btn scrollto">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

      </a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
          <!-- photo1 -->
          <div class="carousel-item active" style="background-image: url(assets/img/slide/SS2.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Your one stop solution.</h2>
                <p class="animate__animated animate__fadeInUp">We combines multiple cuisine, from multiple restaurant. With us, you can order food and reserve a table easily.</p>
                <div>
                  <a href="#menu" class="btn-menu animate__animated animate__fadeInUp scrollto">Our Menu</a>
                  <a href="{{ route('login') }}" class="btn-book animate__animated animate__fadeInUp scrollto">Book a Table</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= Whu Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="section-title">
          <h2>Easy <span> 3 Steps To Enjoy Food</span></h2>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="box">
              <span>Step 01</span>
              <h4>Choose the restaurant</h4>
              <p>We offer dishes from different categories and restaurants</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box">
              <span>Step 02</span>
              <h4>Choose the dish</h4>
              <p>Enjoy premium food with affordable price at your fingertip</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box">
              <span>Step 03</span>
              <h4>Delivery, Pick Up or Pre-order</h4>
              <p>The food gets delivered or you can pick it up and even pre-order for your upcoming reservation as per your choices!</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Whu Us Section -->

      <!-- ======= Whu Us Section ======= -->
      <section id="why-us" class="why-us">
      <div class="container">

        <div class="section-title">
          <h2>Easy <span> 3 Steps To Book A Table</span></h2>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="box">
              <span>Step 01</span>
              <h4>Choose the restaurant</h4>
              <p>We partnering with more than 50 restaurants.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box">
              <span>Step 02</span>
              <h4>Choose the desirable time and date.</h4>
              <p>Fill in the details to reserve a table for free!</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box">
              <span>Step 03</span>
              <h4>Arrive at the restaurant on your appointed reservation time </h4>
              <p>Avoid queues!</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Whu Us Section -->

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
      <div class="container">

        <div class="section-title">
          <h2>Check our tasty <span>Menu</span></h2>
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="menu-flters">
              <li id="2001" data-filter=".filter-2001">Japanese</li>
              <li id="2002" data-filter=".filter-2002">Italian</li>
              <li id="2003"data-filter=".filter-2003">Korean</li>
              <li id="2004" data-filter=".filter-2004">Chinese</li>
              <li id="2005" data-filter=".filter-2005">Desserts</li>
              <li id="2006" data-filter=".filter-2006">American</li>
              <li id="2007" data-filter=".filter-2007">Vegan</li>
              <li data-filter="*" class="filter-active">Show All</li>
            </ul>
          </div>
        </div>

        <div class="row menu-container">
        @foreach($foods as $f)
          <div class="col-lg-6 menu-item filter-{{$f->restaurant_id}}">
            <div class="menu-content">     
              <a href="#">{{$f->name}}</a><span>{{$f->price}}</span>
            </div>
            <div class="menu-ingredients">
              {{$f->description}} 
            </div>
          </div>
          @endforeach      
        </div>
      </div>
    </section><!-- End Menu Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Get In Touch</h2>
          <p>Reach Us Out!</p>
        </div>
      </div>

      <div class="map">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://maps.google.com/maps?q=390%20Victoria%20St,%20Singapore%20188061&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container mt-5">

        <div class="info-wrap">
          <div class="row">

            <div class="col-lg-4 col-md-6 info mt-4 mt-lg-0">
              <i class="bi bi-clock"></i>
              <h4>Office Open Hours:</h4>
              <p>Monday-Friday:<br>09:00 AM - 06:30 PM</p>
            </div>

            <div class="col-lg-4 col-md-6 info mt-4 mt-lg-0">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>HR: foodonclickHR@gmail.com</p>
              <p>Services: foodonclickSG@gmail.com</p>
            </div>

            <div class="col-lg-4 col-md-6 info mt-4 mt-lg-0">
              <i class="bi bi-phone"></i>
              <h4>Phone:</h4>
              <p>+65 9283 1829</p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Food On Click</h3>
      <p>Beyond The Boundaries of Taste.</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>FoodOnClickSG</span></strong>. All Rights Reserved
      </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
        




    </body>
</html>
