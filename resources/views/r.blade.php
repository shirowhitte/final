@extends('layouts.app')

@section('content')

 <!-- ======= Hero Section ======= -->
 <section id="">
    <div class="hero-container">
      <div id="heroCarousel">
        <div class="carousel-inner" role="listbox">
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
                          <select class="form-select" id="restaurant" name="restaurant" value="Select Restaurant">
                          @foreach($res as $r)
                            <option value="{{ $r->id }}">{{ $r->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                            <label for="bookingDate">booking date</label>
                            <input type="date" class="form-control" (change)="changeFromTime($event.target.value)" id="bookingDate" name="bookingDate" min= "{{ date('Y-m-d') }}" max="{{ Date('Y-m-d' ,strtotime('+3 days')) }}"  required/>
                          </i>
                        </div>
                        <div class="form-group">
                          <label for="capacity">capacity</label> <i class="bi bi-person"></i>
                          <select class="form-select" id="capacity" name="capacity" value="Select Capacity">
                            <option>1-4</option>
                            <option>4-8</option>
                            <option>>8</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="time">select time</label>
                          <i class="bi bi-alarm"></i>
                          <select class="selectpicker form-select" id="time" name="time" value="Select Time" min="{{ date('Y-m-d',  strtotime('+30 minutes')) }}" max="21:00">
                            <option value="1000">1000</option>
                            <option value="1300">1030</option>
                            <option value="1100">1100</option>
                            <option value="1130">1130</option>
                            <option value="1200">1200</option>
                            <option value="1230">1230</option>
                            <option value="1300">1300</option>
                            <option value="1330">1330</option>
                            <option value="1400">1400</option>
                            <option value="1430">1430</option>
                            <option value="1500">1500</option>
                            <option value="1530">1530</option>
                            <option value="1600">1600</option>
                            <option value="1630">1630</option>
                            <option value="1700">1700</option>
                            <option value="1730">1730</option>
                            <option value="1800">1800</option>
                            <option value="1830">1830</option>
                            <option value="1900">1900</option>
                            <option value="1930">1930</option>
                            <option value="2000">2000</option>
                            <option value="2030">2030</option>
                            <option value="2100">2100</option>
                            <option value="2130">2130</option>
                          </select>
                        </div>
                        <p id="hey"></p>
                        <div class="form-group">
                        <div id="digital-clock"></div>
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
<script>
  var today = new Date();
        var tzoffset = (new Date()).getTimezoneOffset() * 60000; //offset in milliseconds
        var todayDate = (new Date(Date.now() - tzoffset)).toISOString().slice(0, -14);
        var t = (new Date(Date.now() - tzoffset)).toISOString().slice(11, -8);
        var time = t.replace(':', ''); 

    $('#bookingDate').on('change' , function(){
      var date = $(this).val();
   
      if(date == todayDate)
      {

        $('#time').find('option').prop('disabled',false);
        $('#time').find('option').each(function(i,e)
        {
          var opt = $(e);
          if(time.length == 3)
              {
                time = "0" + time;
              }
            if(opt.val() < time)
            {
              opt.prop('disabled',true);
            }
        })
      }
      else
      {
        $('#time').find('option').prop('disabled',false);
      } 
    })
</script>
@endsection