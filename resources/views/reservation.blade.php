@extends('layouts.app')

@section('content')

<div class="">
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active" >
            <div class="carousel-container" style="background-color: white;">
                <div class="container-md mt-5 pt-5 w-30 p-5 " style="">
                        <h3>upcoming</h3><br>
                        @foreach($reservation as $reserve)
                             <div class="input-group">
                                <input type="text" class="form-control" id="orderID" value="{{ $reserve->restaurant->name.' ID:'.$reserve->id.' Date:'.$reserve->date.' Time:'.$reserve->time}}" readonly>
                                <!-- Button trigger modal -->
                         
                          <a  class="btn btn-primary text-center"data-toggle="modal" id="smallButton" data-target="#smallModal-{{ $reserve->id }}"
                                data-attr="{{ route('reservation.show', $reserve->id) }}" title="show">
                                view reservation
                            </a>

                                <!-- small modal -->
    <div class="modal fade" id="smallModal-{{ $reserve->id }}" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle">View/Edit Reservation for id{{ $reserve->id }}</h3>
                  
                </div>
                <div class="modal-body" id="smallBody">
                    <div>
                    <form method="POST" action="/reservation/{{ Auth::user()->id }}/{{ $reserve->id }}">
       @csrf 
                            @method('PUT')
                            <div class="form-group">
                            <label for="created">created at</label>
                            <input type="text" value="{{ $reserve->created_at }}" class="form-control" id="created" name="created">
                        </div>
                        <div class="form-group">
                          <label for="restaurant">restaurant</label> <i class="bi bi-egg-fried"></i>
                          <input type="text" value="{{ $reserve->restaurant->name }}" class="form-control" id="bookingDate" readonly >
                        </div>
                        <div class="form-group">
                            <label for="bookingDate">booking date</label>
                            <i class="bi bi-calendar-date"><input type="date" value="{{ $reserve->date }}" class="form-control" id="bookingDate" name="bookingDate" min= "{{ $reserve->date }}" max="{{ Date('Y-m-d' ,strtotime('+3 days')) }}" ></i>
                        </div>
                        <div class="form-group">
                          <label for="capacity">capacity</label> <i class="bi bi-person"></i>
                          <select class="form-control" id="capacity" name="capacity" value="{{ $reserve->capacity }}">
                            <option>1-4</option>
                            <option>4-8</option>
                            <option>>8</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="time">select time</label>
                          <i class="bi bi-alarm"></i>
                          <select class="selectpicker form-control" id="time" name="time" value="{{ $reserve->time }}" required>
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
                          <textarea class="form-control" name="note" id="note" rows="3" value="{{ $reserve->notes }}"></textarea>
                        </div><br>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <br>
        </form>
        <div class="modal-footer pt-4">
  
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      
      </div>
                    
                    
                       
                    


                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">View/Edit Reservation for id{{ $reserve->id }}</h3>
        
      </div>
      <div class="modal-body">
       <!--start Modal -->

       <form method="POST" action="/reservation/{{ Auth::user()->id }}/{{ $reserve->id }}">
       @csrf 
                            @method('PUT')
                            <div class="form-group">
                            <label for="created">created at</label>
                            <input type="text" value="{{ $reserve->created_at }}" class="form-control" id="created" name="created">
                        </div>
                        <div class="form-group">
                          <label for="restaurant">restaurant</label> <i class="bi bi-egg-fried"></i>
                          <input type="text" value="{{ $reserve->restaurant->name }}" class="form-control" id="bookingDate" readonly >
                        </div>
                        <div class="form-group">
                            <label for="bookingDate">booking date</label>
                            <i class="bi bi-calendar-date"><input type="date" value="{{ $reserve->date }}" class="form-control" id="bookingDate" name="bookingDate" min= "{{ $reserve->date }}" max="{{ Date('Y-m-d' ,strtotime('+3 days')) }}" ></i>
                        </div>
                        <div class="form-group">
                          <label for="capacity">capacity</label> <i class="bi bi-person"></i>
                          <select class="form-control" id="capacity" name="capacity" value="{{ $reserve->capacity }}">
                            <option>1-4</option>
                            <option>4-8</option>
                            <option>>8</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="time">select time</label>
                          <i class="bi bi-alarm"></i>
                          <select class="selectpicker form-control" id="time" name="time" value="{{ $reserve->time }}" required>
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
                          <textarea class="form-control" name="note" id="note" rows="3" value="{{ $reserve->notes }}"></textarea>
                        </div><br>
                        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
                    
                    








<!--end  Modal -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
</div>
                                <div class="input-group-append"> &NonBreakingSpace;
                                <button class="btn btn-danger"style="height: 50px;" onclick="terminate()" type="button">delete reservation</button>
                                </div>
                            </div><br>
@endforeach
                          </div>
                        </div>      
                  </div>  
                <br>    
            </div>
          </div>
        </div>   
      </div>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active" >
            <div class="carousel-container" style="background-color: lightgrey;">
                <div class="container-md mt-5 pt-5 w-30 p-5 " style="background-color: lightgrey;">
                        <h3>history</h3><br>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="ry01-02mar-2030-4-8p" readonly>
                               
                                
                            </div>
                            <br>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="rn03-05mar-2030->8p" readonly>
                            </div>
                            <br>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="ry05-10mar-2030-1-4p" readonly>
                            </div>
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
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
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
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });

    </script>



@endsection