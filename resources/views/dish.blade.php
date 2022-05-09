@extends('layouts.app')

@section('content')
<div class="container p-4">
    <div class="row welcome text-center welcome">
        <div class="col-12 pb-5">

            <h1>Menu of {{ $res->name }}</h1>
        </div>
    </div>
    <div class="container res-card col-7">
        <div class="card h-100 w-100">
            <img src="/assets/img/restaurant/{{$res->img}}.png" class="card-img-top" height="500px" width="200px"/>
            <div class="card-body">
                <h4 class="card-title font-weight-bold text-primary">{{ $res->name}}</h4>
                <p class="card-text lead">{{ $res->address }}</p>
                <p class="card-text">
                A feast of gorgeousness awaits you with super-seasonal dishes created with love by our wonderful chefs.
                </p>

            </div>
        </div>
    </div>
</div>


     <!-- ======= Menu Section ======= -->
     <section id="menu" class="menu"  style="background-color:white">
      <div class="container">

        <div class="row menu-container pt-0">
        @foreach($foods as $f)
          <div class="col-lg-4 menu-item filter-{{$f->restaurant_id}} pb-3">
          <img src="/{{ $f->img }}" alt="{{ $f->name }}" height="300px;" width="300px">
            <div class="menu-content">     
              <a href="#">{{$f->name}}</a><span>{{$f->price}}</span>
            </div>
            <div class="menu-ingredients pt-3 pb-2">
              {{$f->description}} 
            </div>
            <a name="addToCart" id="addToCart" class="btn btn-warning btn-block" style="color:white;" href="{{ URL('/cart/'.$f->id )}}" role="button">Add To Cart</a>
          </div>
          @endforeach      
        </div>
      </div>
    </section><!-- End Menu Section -->




@endsection