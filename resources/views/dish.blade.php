@extends('layouts.app')

@section('content')
<div class="container p-4">
    <div class="row welcome text-center welcome">
        <div class="col-12 pb-5">
            <h1>Menu of {{ $res->name }}</h1>
        </div>
    </div>
<div class = "row">
    <div class="container res-card col-6 pb-5">
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


    <div class="container res-card col-5 overflow-auto pb-5">
        <div class="card h-100 w-100 p-2">
            <div class="card-body">
                <h4 class="card-title font-weight-bold text-warning">Restaurant Review</h4>
                @forelse($reviews as $r)
                <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
                  <div class="u-container-style P-2 u-list-item u-palette-2-light-2 u-repeater-item u-list-item-2">
                    <div class="border border-warning rounded p-2 u-container-layout u-similar-container u-valign-top u-container-layout-2" style="background-color:#FCAE1E">
                      <h5 class="u-text u-text-default u-text-5 text-white">{{ $r->name }}</h5>
                      <p class="u-text u-text-6">{{ $r->comment }}</p>
                    </div>
                  </div>
                  @empty
                  <h3>The restaurant has no review</h3>
                  @endforelse  
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


<div class="row">
      <div class="container h-100 w-75 col-12 pb-5">
          <div class="row menu-container pt-2">
          @foreach($foods as $f)
            <div class="col-lg-4 menu-item filter-{{$f->restaurant_id}} p-2">
            <img src="/{{ $f->img }}" alt="{{ $f->name }}" height="300px;" width="300px">
              <div class="menu-content">     
                <p class="text-warning">{{$f->name}}</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="text-dark">  {{$f->price}}</span>
              </div>
              <div class="menu-ingredients pt-3 pb-2">
                {{$f->description}} 
              </div>
              <a name="addToCart" id="addToCart" class="btn btn-warning btn-block" style="color:white;" href="{{ URL('/cart/'.$f->id )}}" role="button">Add To Cart</a>
            </div>
            @endforeach      
          </div>
      </div>
</div>

 







@endsection