@extends('layouts.app')

@section('content')

<section id="hero">
    <div class="hero-container p-auto" >
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel"style="background-color:white;">
        <div class="carousel-inner" role="listbox" >
          <div class="carousel-item active">
            <div class="carousel-container"style="background-image: url('/assets/img/orange.jpg');">
              <div class="carousel-content" style="padding-right:10rem;">             
              </div> 
              <div class="carousel-content" style="padding-right:8rem; ">
              @if (session('status'))
                     <div class="alert alert-warning" role="alert">
                      {{ session('status')}}
                     </div>
                     @endif 
                    

              <div class="card text-center" style="width:600px;">
                    <div class="card-header" style="font-size:1.5rem;">My Profile</div>
                    <div class="card-body">
                    <img src="/assets/img/profile.jpg" style="height:300px;"> 
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" value="{{ $user->username}}" readonly>
                            <label for="birthday">Birthday</label>
                            <input type="date" class="form-control" name="birthdate" id="birthdate" value="{{ $user->birthdate}}" readonly>
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="{{ $user->email}}" readonly>
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{ $user->phone}}"readonly>
                            <label for="address">Address</label>
                          <input type="textarea" class="form-control" name="address" id="address" value="{{ $user->address}}" readonly><br>
                            <div class="row">
                                <div class="col-lg-12">
                                <a href="/profile/{{ $user->id }}/edit"  name="" id="" class="btn btn-warning btn-lg btn-block" style="color:white">Update Profile</a>
                                </div>
                                <div class="col-lg-6">
                                @if ($message = Session::get('success'))
                                <div>
                                  <strong>{{ $message }}</strong>
                                </div>
                                @endif
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
      </div>
    </div>
  </section><!-- End Hero -->




@endsection