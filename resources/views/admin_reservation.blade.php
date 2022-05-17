@extends('layouts.adminlayout')
@section('content')

<div class="">
        <div class="carousel-inner" role="listbox"id="up">
          <div class="carousel-item active" >
            <div class="carousel-container" style="background-color: white;">
                <div class="container-md mt-5 pt-5 w-30 p-5 "  style="">
                        <h3>upcoming</h3><br>
                        @if (session('updated'))
                        <div class="alert alert-success" role="alert">
                          {{ session('updated')}}
                        </div>
                        @elseif (session('deleted'))
                        <div class="alert alert-success" role="alert">
                          {{ session('deleted')}}
                        </div>
                        @endif 
                        @forelse($new as $reserve)
                             <div class="input-group">
                              <input type="text" class="form-control" id="orderID" value="{{ $reserve->restaurant->name.' ID:'.$reserve->id.' Date:'.$reserve->date.' Time:'.$reserve->time}}" readonly>
                                <!-- Button trigger modal -->
                              
                              <a class="btn btn-light text-center"data-toggle="modal" id="mediumButton" data-target="#mediumModal-{{ $reserve->id }}"
                                data-attr="{{ route('reservation.show', $reserve->id) }}" title="show">
                                view
                              </a>
                              <a class="btn btn-warning text-center" data-toggle="modal" id="smallButton" data-target="#smallModal-{{ $reserve->id }}"
                                data-attr="{{ route('reservation.show', $reserve->id) }}" title="show">
                                edit 
                              </a>
                              <a class="btn btn-danger text-center" href="/admin_reservation/delete/{{ $reserve->id }}" onclick="return confirm('Are you sure?')" >
                                delete
                              </a>

                              <div class="modal fade" id="mediumModal-{{ $reserve->id }}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-md" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          <h3 class="modal-title" id="exampleModalLongTitle">View Reservation for id{{ $reserve->id }}</h3>
                                        </div>
                                        <div class="modal-body" id="mediumBody">
                                          <div>
                                              <div class="form-group">
                                              <label for="created">created at</label>
                                              <input type="text" value="{{ $reserve->created_at }}" class="form-control" id="created" name="created" readonly>
                                            </div>
                                          <div class="form-group">
                                            <label for="restaurant">restaurant</label> <i class="bi bi-egg-fried"></i>
                                            <input type="text" value="{{ $reserve->restaurant->name }}" class="form-control" id="restaurant" readonly>
                                          </div>

                                          <input type="hidden" name="_method" value="PUT">
                                          <div class="form-group">
                                              <label for="date">booking date</label>
                                              <i class="bi bi-calendar-date">
                                                <input type="text" class="form-control" value="{{ $reserve->date }}" id="date" name="date" readonly/>
                                              </i>
                                          </div>
                                          <div class="form-group">
                                            <label for="capacity">capacity</label> <i class="bi bi-person"></i>
                                            <input type="text" class="form-control" value="{{ $reserve->capacity }}" id="capacity" name="capacity" readonly/>
                                          </div>
                                          <div class="form-group">
                                            <label for="time">select time</label>
                                            <i class="bi bi-alarm"></i>
                                            <input type="text" class="form-control" value="{{ $reserve->time }}" id="time" name="time" readonly/>
                                          </div>
                                          <div class="form-group">
                                            <label for="note">extra note</label> <i class="bi bi-clipboard"></i>
                                            <input type="text" class="form-control" value="{{ $reserve->notes }}" id="notes" name="notes" readonly/>
                                          </div><br>       
                                          <br>
                                        <div class="modal-footer pt-4">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>



                            <div class="modal fade" id="smallModal-{{ $reserve->id }}" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-md" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          <h3 class="modal-title" id="exampleModalLongTitle">Edit Reservation for id{{ $reserve->id }}</h3>
                                        </div>
                                        <div class="modal-body" id="smallBody">
                                            <div>
                                              <div class="form-group">
                                              <label for="created">created at</label>
                                              <input type="text" value="{{ $reserve->created_at }}" class="form-control" id="created" name="created" readonly>
                                          </div>
                                          <div class="form-group">
                                            <label for="restaurant">restaurant</label> <i class="bi bi-egg-fried"></i>
                                            <input type="text" value="{{ $reserve->restaurant->name }}" class="form-control" id="restaurant" readonly>
                                          </div>
                                          <form method="POST" action="/admin_reservation/{{ $reserve->id }}">
                                          {!! csrf_field() !!}
                                          <input type="hidden" name="_method" value="PUT">
                                          <div class="form-group">
                                              <label for="date">booking date</label>
                                              <i class="bi bi-calendar-date">
                                                <input type="date" class="form-control" (change)="changeFromTime($event.target.value)" id="date" name="date" min= "{{ $reserve->date }}" max="{{ Date('Y-m-d' ,strtotime('+5 days')) }}" />
                                              </i>
                                          </div>
                                          <div class="form-group">
                                            <label for="capacity">capacity</label> <i class="bi bi-person"></i>
                                            <select class="form-select" id="capacity" name="capacity" value="{{ old('capacity') ?? $reserve->capacity }}">
                                              <option>1-4</option>
                                              <option>4-8</option>
                                              <option>>8</option>
                                            </select>
                                          </div>
                                          <div class="form-group">
                                            <label for="time">select time</label>
                                            <i class="bi bi-alarm"></i>
                                            <select class="selectpicker form-select" id="time" name="time" value="{{ old('time') ?? $reserve->time }}" required>
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
                                          <div class="form-group">
                                            <label for="note">extra note</label> <i class="bi bi-clipboard"></i>
                                            <textarea class="form-control" name="{{ $reserve->notes }}" id="notes" rows="3" value="{{ old('notes') ?? $reserve->notes }}"></textarea>
                                          </div><br>
                                          <input type="submit" class="btn btn-primary" value="Save Changes">       
                                          <br>
                                        <div class="modal-footer pt-4">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              @empty
                            <h5>no data found</h5>
                            @endforelse
                           
                            </div> <br>
                            <br>  
                           
                          </div>
                        </div>      
                  </div>  
                  
                <br>    
            </div>
          </div>
        </div>   
      </div>
      
        <div class="carousel-inner" role="listbox"id="down">
          <div class="carousel-item active" >
            <div class="carousel-container" style="background-color: lightgrey;">
                <div class="container-md mt-5 pt-5 w-30 p-5 "  style="background-color: lightgrey;">
                        <h3>history</h3><br>
                            <br>
                            @forelse($past as $reserve)
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{ $reserve->restaurant->name.' ID:'.$reserve->id.' Date:'.$reserve->date.' Time:'.$reserve->time}}" readonly>
                            </div>
                            @empty
                            <h5>no data found</h5>
                            @endforelse
                            <br>
                  </div>      
              </div>  
              <br>    
            </div>
          </div>
         </div>

         <script>
        // display a modal (small modal)
        $(document).on('click', '#smallButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#smallModal').modal("show");
                    $('#smallBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
            })
        });

        // display a modal (medium modal)
        $(document).on('click', '#mediumButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#mediumModal').modal("show");
                    $('#mediumBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
            })
        });

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