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
                  <a href="makeReservation.html" style="background-color:#fdb42d;" class="btn-book animate__animated animate__fadeInUp scrollto">Book a Table</a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Reservation Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="section-title">
          <h2>Reservation</h2>
          <p>Book and review your booking</p>
        </div>

        <div class="row">
            
            <div class="col-lg-4">
                <a href="viewReservation.html">
                <div class="box">
                    <span>Upcoming Reservation</span>
                </div>
            </a>
            </div>
            
            <div class="col-lg-4 mt-4 mt-lg-0">
                <a href="viewReservation.html">
                <div class="box">
                <span>Reservation History</span>
                </div>
            </a>
            </div>
         
            <div class="col-lg-4 ">
                <a href="makeReservation.html">
                <div class="box">
                <span>Table Reservation</span>
                </div>
            </a>
            </div>
      
        </div>
      </div>
    </section><!-- End Reservation Section -->

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

        <div class="row menu-container pt-4">
        @foreach($foods as $f)
          <div class="col-lg-4 menu-item filter-{{$f->restaurant_id}} pb-3">
          <img src="{{ $f->img }}" alt="{{ $f->name }}" height="300px;" width="300px">
            <div class="menu-content">     
              <a href="#">{{$f->name}}</a><span>{{$f->price}}</span>
            </div>
            <div class="menu-ingredients pt-3 pb-2">
              {{$f->description}} 
            </div>
            <a name="" id="" class="btn btn-primary btn-block" href="#" role="button">Add To Cart</a>
          </div>
          @endforeach      
        </div>
      </div>
    </section><!-- End Menu Section -->


                     

        

@endsection
