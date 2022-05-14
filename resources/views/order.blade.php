@extends('layouts.app')
<link href="{{ asset('css/progress.css') }}" rel="stylesheet">
@section('content')

<div class="">
        <div class="carousel-inner" role="listbox"id="up">
          <div class="carousel-item active" >
            <div class="carousel-container" style="background-color: white;">
                <div class="container-md mt-5 pt-5 w-30 p-5 "  style="">
                        <h3>upcoming</h3><br>
                        @if (session('ordered'))
                        <div class="alert alert-success" role="alert">
                          {{ session('ordered')}}
                        </div>
                        @endif 
                        @forelse($new as $n)
                             <div class="input-group">
                              <input type="text" class="form-control" id="orderID" value="{{'ID: '. $n->id.' Created At: '. $n->created_at.' Type:'. $n->type }}" readonly>
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
                                            @if( $n->type == 'preorder')
                                            <div class="card card-timeline border-none h-50" style="background-color:orange"> 
                                                <div class="form-group p-5"><h4 class="text-white">Please show this page upon arrival</h4>
                                                <label class="text-white" for="reservation"> Preorder for {{ $n->reservation->restaurant->name }}'s table reservation</label>
                                                <input type="text" style="background-color:#FEDEBE" value="{{'id: '.$n->reservation_id . ' date: '.$n->reservation->date .' time: '.$n->reservation->time}}" class="form-control  border-0" id="reservation" readonly>
                                                </div>   
                                            </div>
                                            @endif

                                            @if( $n->type == 'delivernow')
                                            <div class="card card-timeline border-none p-3 h-50 text-center"  style="background-color: #ffb347"> 
                                                <h4 id="estimate" class="text-white">Estimated delivery time<br> {{ $n->created_at->addMinutes(50) }}</h4>
                                                <ul class="bs4-order-tracking">
                                                @if( $n->status == 'created')
                                                    <li class="step active tab"> <div><i class="fas fa-user h-25 pt-2"></i> </div> Order Placed </li> 
                                                    <li class="step active tab"> <div><i class="fas fa-bread-slice h-25 pt-2"></i></div> In Kitchen </li>
                                                    <li class="step tab"> <div><i class="fas fa-truck pt-2 h-25"></i></div> Out for delivery </li>
                                                    <li class="step tab "> <div><i class="fas fa-birthday-cake pt-2 h-25"></i></div> Delivered </li> 
                                                @elseif( $n->status == 'delivery')
                                                    <li class="step active tab"> <div><i class="fas fa-user h-25 pt-2"></i> </div> Order Placed </li> 
                                                    <li class="step active tab"> <div><i class="fas fa-bread-slice h-25 pt-2"></i></div> In Kitchen </li>
                                                    <li class="step active tab"> <div><i class="fas fa-truck pt-2 h-25"></i></div> Out for delivery </li>
                                                    <li class="step tab "> <div><i class="fas fa-birthday-cake pt-2 h-25"></i></div> Delivered </li> 
                                                @elseif( $n->status == 'delivered')
                                                    <li class="step active tab"> <div><i class="fas fa-user h-25 pt-2"></i> </div> Order Placed </li> 
                                                    <li class="step active tab"> <div><i class="fas fa-bread-slice h-25 pt-2"></i></div> In Kitchen </li>
                                                    <li class="step active tab"> <div><i class="fas fa-truck pt-2 h-25"></i></div> Out for delivery </li>
                                                    <li class="step active tab "> <div><i class="fas fa-birthday-cake pt-2 h-25"></i></div> Delivered </li> 
                                                @endif
                                                </ul>
                                                    @if( $n->status == 'created')
                                                        <p id="kitchen" class="text-center text-white display-7"><b>In Kitchen</b>. Your food is being processed!</p>
                                                    @elseif( $n->status == 'delivery')
                                                        <p id="delivery" class="text-center text-white display-7"><b>Out for delivery</b>. Your food is on the way!</p>
                                                    @elseif( $n->status == 'delivered')
                                                        <p id="delivered" class="text-center text-white display-7"><b>Order delivered</b>. Your food is delivered. Bon appétit!</p>
                                                    @endif
                                                </div>
                                            @endif

                                            @if($n->type == 'deliverlater')
                                            <div class="form-group">
                                                <label for="deliverlatertime">delivery time</label> 
                                                <input type="text" value="{{ $n->deliverlatertime }}" class="form-control" id="deliverlatertime" readonly>
                                            </div><br>
                                            <div class="card card-timeline border-none p-3 h-50 text-center"  style="background-color: #ffb347"> 
                                            <h4 id="estimate" class="text-white">Estimated delivery time<br>  
                                                <?php
                                                    $date = strtotime($n->deliverlatertime);
                                                    echo date('H:i', strtotime("+50 minutes", $date));
                                                ?>
                                                <ul class="bs4-order-tracking">
                                                @if( $n->status == 'created')
                                                    <li class="step active tab"> <div><i class="fas fa-user h-25 pt-2"></i> </div> Order Placed </li> 
                                                    <li class="step active tab"> <div><i class="fas fa-bread-slice h-25 pt-2"></i></div> In Kitchen </li>
                                                    <li class="step tab"> <div><i class="fas fa-truck pt-2 h-25"></i></div> Out for delivery </li>
                                                    <li class="step tab "> <div><i class="fas fa-birthday-cake pt-2 h-25"></i></div> Delivered </li> 
                                                @elseif( $n->status == 'delivery')
                                                    <li class="step active tab"> <div><i class="fas fa-user h-25 pt-2"></i> </div> Order Placed </li> 
                                                    <li class="step active tab"> <div><i class="fas fa-bread-slice h-25 pt-2"></i></div> In Kitchen </li>
                                                    <li class="step active tab"> <div><i class="fas fa-truck pt-2 h-25"></i></div> Out for delivery </li>
                                                    <li class="step tab "> <div><i class="fas fa-birthday-cake pt-2 h-25"></i></div> Delivered </li> 
                                                @elseif( $n->status == 'delivered')
                                                    <li class="step active tab"> <div><i class="fas fa-user h-25 pt-2"></i> </div> Order Placed </li> 
                                                    <li class="step active tab"> <div><i class="fas fa-bread-slice h-25 pt-2"></i></div> In Kitchen </li>
                                                    <li class="step active tab"> <div><i class="fas fa-truck pt-2 h-25"></i></div> Out for delivery </li>
                                                    <li class="step active tab "> <div><i class="fas fa-birthday-cake pt-2 h-25"></i></div> Delivered </li> 
                                                @endif
                                                </ul>
                                                        @if( $n->status == 'created')
                                                          <p id="kitchen" class="text-center text-white display-7"><b>In Kitchen</b>. Your food is being processed!</p>
                                                        @elseif( $n->status == 'delivery')
                                                          <p id="delivery" class="text-center text-white display-7"><b>Out for delivery</b>. Your food is on the way!</p>
                                                        @elseif( $n->status == 'delivered')
                                                          <p id="delivered" class="text-center text-white display-7"><b>Order delivered</b>. Your food is delivered. Bon appétit!</p>
                                                        @endif
                                                </div>
                                            @endif
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
                            @empty
                            <h5>no data found</h5>
                            @endforelse
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
                        @if (session('reviewed'))
                        <div class="alert alert-success" role="alert">
                          {{ session('reviewed')}}
                        </div>
                        @endif 
                            <br>
                            @forelse($past as $n)
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{'ID: '. $n->id.''.' Created At: '. $n->created_at.' Type:'. $n->type }}" readonly>
                                <a class="btn btn-warning text-center" data-toggle="modal" id="smallButton" data-target="#smallModal-{{ $n->id }}"
                                data-attr="{{ route('reservation.show', $n->id) }}" title="show">
                                edit 
                              </a>
                            </div>

                            <div class="modal fade" id="smallModal-{{ $n->id }}" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-md" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          <h3 class="modal-title" id="exampleModalLongTitle">Review for order id#{{ $n->id }}</h3>
                                        </div>
                                        <div class="modal-body" id="smallBody">
                                            <div>
                                              <div class="form-group">
                                              <label for="created">created at</label>
                                              <input type="text" value="{{ $n->created_at }}" class="form-control" id="created" name="created" readonly>
                                          </div>
                                          <div class="form-group">
                                            <?php $restaurant = $n->restaurant_id ;
                                            $res = \App\Models\restaurant::select('name')->where('id', $restaurant)->get();?>
                                            <label for="restaurant">restaurant</label> <i class="bi bi-egg-fried"></i>
                                            <input type="text" value="{{ $res }}" class="form-control" id="restaurant" readonly>
                                          </div>
                                      
                                          <div class="form-group">
                                              <label for="status">status</label>
                                            
                                              <input type="text" value="{{ $n->status }}" class="form-control" id="status" name="status" readonly>
                                         
                                          </div>
                                          <form method="POST" action="/order/{{ Auth::user()->id }}/{{ $n->id }}">
                                          {!! csrf_field() !!}
                                          <input type="hidden" name="_method" value="PUT">
                                          <div class="form-group">
                                            <label for="comment">comment</label> <i class="bi bi-clipboard"></i>
                                            <textarea class="form-control" name="comment" id="comment" rows="3" value="{{ old('comment') ?? $n->comment }}"></textarea>
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