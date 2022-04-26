@extends('layouts.app')

@section('content')


<div class="container p-4">
    <div class="row welcome text-center welcome">
        <div class="col-12 pb-5">
            @foreach($food as $restaurant)
            <h1>Menu of {{ $restaurant->name }}</h1>
        </div>
    </div>
    <div class="container res-card col-7">
        <div class="card h-100 w-100">
            <img src="/assets/img/restaurant/{{$restaurant->img}}.png" class="card-img-top" height="500px" width="200px"/>
            <div class="card-body">
                <h4 class="card-title font-weight-bold text-primary">{{ $restaurant->name }}</h4>
                <p class="card-text lead">{{ $restaurant->address }}</p>
                <p class="card-text">
                A feast of gorgeousness awaits you with super-seasonal dishes created with love by our wonderful chefs.
                </p>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="row menu-container pt-4">
        @foreach($food as $f)
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

@endsection