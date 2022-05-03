@extends('layouts.app')

@section('content')

 <!-- ======= Hero Section ======= -->
 <section id="">
    <div class="hero-container">
      <div id="heroCarousel">
    

        <div class="carousel-inner" role="listbox">
          <!-- Slide 1 -->
          
          <div class="carousel-item active" >
            <div class="carousel-container">
                <div class="container-md mt-5 pt-5 w-30 p-5 " style="background-color:rgb(243, 243, 243);">
                @if (session('success'))
                     <div class="alert alert-warning" role="alert">
                      {{ session('success')}}
                     </div>
                     @endif 
                    <form id="booking" method="POST" action="/r">
                        @csrf
                        <h3>reservation</h3>
                        <br>
                        <input type="hidden"  id="user" name="user" value="{{ Auth::user()->id }}" >
                        <div class="form-group">
                          <label for="restaurant">restaurant</label> <i class="bi bi-egg-fried"></i>
                          <select class="form-control" id="restaurant" name="restaurant" value="Select Restaurant">
                          @foreach($res as $r)
                            <option value="{{ $r->id }}">{{ $r->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                            <label for="bookingDate">booking date</label>
                            <i class="bi bi-calendar-date"><input type="date" value="{{ date('Y-m-d')}}" class="form-control" id="bookingDate" name="bookingDate" min= "{{ date('Y-m-d') }}" max="{{ Date('Y-m-d',strtotime('+3 days')) }}" ></i>
                        </div>
                        <div class="form-group">
                          <label for="capacity">capacity</label> <i class="bi bi-person"></i>
                          <select class="form-control" id="capacity" name="capacity" value="Select Capacity">
                            <option>1-4</option>
                            <option>4-8</option>
                            <option>>8</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="time">select time</label>
                          <i class="bi bi-alarm"></i>
                          <select class="selectpicker form-control" id="time" name="time" value="Select Time" required>
                            <option>1100</option>
                            <option>1130</option>
                            <option>1200</option>
                            <option>1230</option>
                            <option>1300</option>
                            <option>1330</option>
                            <option>1400</option>
                            <option>1430</option>
                            <option>1500</option>
                            <option>1530</option>
                            <option>1600</option>
                            <option>1630</option>
                            <option>1700</option>
                            <option>1730</option>
                            <option>1800</option>
                            <option>1830</option>
                            <option>1900</option>
                            <option>1930</option>
                            <option>2000</option>
                            <option>2030</option>
                            <option>2100</option>
                            <option>2130</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="note">extra note</label> <i class="bi bi-clipboard"></i>
                          <textarea class="form-control" name="note" id="note" rows="3" placeholder="baby chair,  birthday celebration.."></textarea>
                        </div><br>
                        <input type="submit" class="btn btn-warning btn-md btn-block text-white"value="Reserve Table"/>      
                    </form>
                  </div> 
                  <br>    
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->





@endsection