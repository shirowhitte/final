@extends('layouts.app')

@section('content')
<section id="hero">
    <div class="hero-container" >
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel"style="background-color:white;">
        <div class="carousel-inner" role="listbox" >
          <div class="carousel-item active">
            <div class="carousel-container"style="background-image: url('/assets/img/orange.jpg');">
              <div class="carousel-content" style="padding-right:10rem;">             
              </div> 
              <div class="carousel-content" style="padding-right:8rem; ">
                    

              <div class="card text-center" style="width:600px;">
                    <div class="card-header" style="font-size:1.5rem;">Edit Profile</div>
                    <div class="card-body">
   
                    <img src="/assets/img/profile.jpg" style="height:300px;">
                    <form action="/profile/{{ $user->id }}" method="POST">
                            @csrf 
                            @method('PUT')


                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control text-center" name="username" id="username" value="{{ $user->username}}" readonly>
                            <label for="birthday">Birthday</label>
                            <input type="date" class="form-control text-center" name="birthdate" id="birthdate" value="{{ $user->birthdate}}" readonly>
                            <label for="email">Email</label>
                            <input type="text" class="form-control text-center" name="email" id="email" value="{{ $user->email}}" readonly>
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control text-center" name="phone" id="phone" value="{{  old('phone') ?? $user->phone}}">
                            <label for="address">Address</label>
                            <input type="textarea" class="form-control text-center" name="address" id="address" value="{{  old('address') ?? $user->address}}"><br>
                                <button type="submit" name="submit" id="submit" class="btn btn-warning btn-lg btn-block" style="color:white">Save Profile</button>       
                        </form>
                  
                     
                         </div>
                      
                    </div>
                </div>      
              </div>   
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section><!-- End Hero -->



@endsection