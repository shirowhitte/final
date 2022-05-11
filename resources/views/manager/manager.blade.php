@extends('layouts.app')

@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner" role="listbox">
          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url(assets/img/hey.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>FoodOnClick.</h2>
                <p>Researve your seat and start ordering with us</p>
                <div>
                  <a href="#menu" style="background-color:#fdb42d;" class="btn-menu animate__animated animate__fadeInUp scrollto">Our Menu</a>
                  <a href="/r/create" style="background-color:#fdb42d;" class="btn-book animate__animated animate__fadeInUp scrollto">Book a Table</a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section><!-- End Hero -->


@endsection
