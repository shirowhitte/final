@extends('layouts.app')
<link href="{{ asset('css/progress.css') }}" rel="stylesheet">
@section('content')

<div class="">
        <div class="carousel-inner" role="listbox"id="up">
          <div class="carousel-item active" >
            <div class="carousel-container" style="background-color: white;">
                <div class="container-md mt-5 pt-5 w-30 p-5 "  style="">
                        <h3>upcoming</h3><br>
                        
                        @if (session('orderdeleted'))
                        <div class="alert alert-success" role="alert">
                          {{ session('deleted')}}
                        </div>
                        @elseif (session('ordered'))
                        <div class="alert alert-success" role="alert">
                          {{ session('ordered')}}
                        </div>
                        @endif 
                        @foreach($new as $n)
                        
                             <div class="input-group">
                              <input type="text" class="form-control" id="orderID" value="{{'ID: '. $n->id.' Created At: '. $n->created_at }}" readonly>
                                <!-- Button trigger modal -->
                        
                              <a class="btn btn-warning text-center" data-toggle="modal" id="mediumButton" data-target="#mediumModal-{{ $n->id }}"
                                data-attr="{{ route('reservation.show', $n->id) }}" title="show">
                                track order
                              </a>
                            <div class="modal fade" id="mediumModal-{{ $n->id }}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          <h3 class="modal-title" id="exampleModalLongTitle">Order id #{{ $n->id }}</h3>
                                        </div>
                                        <div class="modal-body" id="smallBody">
                                            <div>
                                              <div class="form-group">
                                              <label for="created">created at</label>
                                              <input type="text" value="{{ $n->created_at }}" class="form-control" id="created" name="created" readonly>
                                          </div>
                                          <div class="form-group">
                                            <label for="restaurant">restaurant</label> <i class="bi bi-egg-fried"></i>
                                            <input type="text" value="{{ $n->restaurant_id }}" class="form-control" id="restaurant" readonly>
                                          </div>
                                          
                                            <hr>
                                            <div class="card card-timeline border-none"> 
                                                <ul class="bs4-order-tracking">
                                                     <li class="step active"> <div><i class="fas fa-user h-25 pt-2"></i> </div> Order Placed </li> 
                                                      <li class="step active"> <div><i class="fas fa-bread-slice h-25 pt-2"></i></div> In transit </li>
                                                        <li class="step"> <div><i class="fas fa-truck pt-2 h-25"></i></div> Out for delivery </li>
                                                         <li class="step "> <div><i class="fas fa-birthday-cake pt-2 h-25"></i></div> Delivered </li> 
                                                        </ul>
                                                          <h5 class="text-center"><b>In transit</b>. The order has been shipped!</h5>
</div>


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
                            <br>
                            @endforeach
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
                            @foreach($past as $reserve)
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{ $reserve->restaurant->name.' ID:'.$reserve->id.' Date:'.$reserve->date.' Time:'.$reserve->time}}" readonly>
                            </div>
                            @endforeach
                            <br>
                  </div>      
              </div>  
              <br>    
            </div>
          </div>
         </div>

         <script>
        // display a modal (small modal)
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

    </script>
@endsection