@extends('layouts.app')

@section('content')

<div class="container p-5">
    <div class="row">
        @foreach($restaurants as $r)
        <div class="col-lg-4 pb-4">
                <div class="card mb-4 shadow-sm h-100">
                    <img class="card-img-top" src="assets/img/restaurant/{{ $r->img }}.png" height="400px" width="300px">
                    <div class="card-body p-5">
                        <h4 class="card-title">{{$r->name}}</h4>
                        <p class="card-text mb-0">{{$r->phone}}</p>
                        <p class="card-text mb-0">{{$r->address}}</p>
                        <hr>
                        <p class="card-text mb-0"></p>
                        <p class="card-text mb-0">Email</p>
                        <p class="card-text mb-0">{{$r->email}}</p>
                        <hr>
                        <a href="{{ URL('/dish/'.$r->id )}}" class="btn btn-success btn-md">View Menu</a>
                    </div>
                </div>    
            </div>
    @endforeach
    </div>
</div>


@endsection