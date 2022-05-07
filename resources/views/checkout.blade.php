@extends('layouts.app')

@section('content')
        <div class="carousel-inner text-center"role="listbox"style="background-color: white;">
          <div class="carousel-item active d-flex justify-content-center" style="background-color: white;">
            <div class="carousel-container d-flex justify-content-center" style="background-color: white;">
                <div class="row d-flex justify-content-center">
           
                    <div class="col-sm-12 col-md-12 col-md-offset-12 col-sm-offset-12">
                        <h1>Checkout</h1>
                        <h4>Your Total: <span id="total" name="total"> </span></h4>

                        <div class="row">
                            <div class="col-lg-12">
                            <input type="radio"  name="ordertype" id="delivernow"  value="delivernow" onclick="general()" required>
                                        <label for="delivernow" class="rad-text">Delivery Now</label>
                                      
                                        <input type="radio" name="ordertype" id="deliverlater" value="deliverlater" onclick="general()" required>
                                        <label for="deliverlater" class="rad-text">Delivery Later</label>
                                     
                                        <input type="radio" name="ordertype"  id="pre" value="preorder" onclick="general()" required>
                                        <label for="pre" class="rad-text">Reservation Pre-Order</label>
                            </div>

                        </div>
                        
                    
                        

                        <div id="now" name="now">
                            <form action="{{ route('checkout') }}" method="post" id="checkout-form">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="shippingFee">Shipping Fee</label>
                                            <input type="text" id="shippingFee" value="10" class="form-control" name="shippingFee" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" value="{{ Auth::user()->username }}" class="form-control" required name="name">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" id="address" value="{{ Auth::user()->address }}" class="form-control" required name="address">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="address">Additional notes</label>
                                            <input type="textarea" id="notes" value="" class="form-control" required name="notes">
                                            <input type="hidden" id="totall" name="hey"/>
                                            <input type="hidden" id="ordertype" name="ordertype" value="delivernow"/>
                                            
                                        </div>
                                    </div>

                                    
                                   
                                    
                        

                                </div>
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-success">Buy now</button>
                            </form>
                        </div>    

                        <div id="later" name="later">
                            <form action="{{ route('checkout') }}" method="post" id="checkout-form">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="shippingFee">Shipping Fee</label>
                                            <input type="text" id="shippingFee" value="10" class="form-control" name="shippingFee" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" value="{{ Auth::user()->username }}" class="form-control" required name="name">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" id="address" value="{{ Auth::user()->address }}" class="form-control" required name="address">
                                            
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="time">Time</label>
                                            <input type="text" id="address" value="{{ Auth::user()->address }}" class="form-control" required name="address">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="address">Additional notes</label>
                                            <input type="textarea" id="notes" value="" class="form-control" required name="notes">
                                            <input type="hidden" id="tota" name="hey"/>
                                            <input type="hidden" id="ordertype" name="ordertype" value="deliverlater"/>
                                        </div>
                                    </div>
                                    
                        

                                </div>
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-success">Buy now</button>
                            </form>
                        </div>
                        
                        
                        <div id="preorder" name="preorder">
                            <form action="{{ route('checkout') }}" method="post" id="checkout-form">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" value="{{ Auth::user()->username }}" class="form-control" required name="name">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="address">Reservation</label>
                                            <select class="form-control" id="reservation_id" name="reservation_id">
                                                @foreach($reservation as $reserve)
                                             <option id="{{ $reserve->id }}"name="{{ $reserve->id }}" value="{{ $reserve->id }}" >{{ $reserve->restaurant->name.' ID:'.$reserve->id.' Date:'.$reserve->date.' Time:'.$reserve->time  }}</option>
                                             @endforeach
                                            </select>
                                        </div>
                                    </div>
                                  
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="address">Additional notes</label>
                                            <input type="textarea" id="notes" value="" class="form-control" required name="notes">
                                            <input type="hidden" id="t" name="hey"  >
                                            <input type="hidden"  name="ordertype" value="preorder" >
                                            
                                        </div>
                                    </div>

                                    <div>
                                              <fieldset>
                                                <legend>Payment Method</legend>
                                                <div class="form__radios">
                                                    <div class="form__radio">
                                                      <label for="cod">
                                                        <i class="bi bi-wallet"></i>
                                                        Cash On Delivery</label>
                                                      <input checked id="cod" value="cod" name="payment_type" type="radio" />
                                                    </div>
                                                <div class="form__radios">
                                                  <div class="form__radio">
                                                    <label for="visa"><svg class="icon">
                                                        <use xlink:href="#icon-visa" />
                                                      </svg>Visa Payment</label>
                                                    <input checked id="visa" value="visa" name="payment_type" type="radio" />
                                                  </div>
                                                </div>
                                              </fieldset>
                                              <br> 
                        
                                </div>
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-success">Buy now</button>
                            </form>
                        </div>    


                    </div>
                </div>
            </div>
        </div>
</div>

<script>  

var b = localStorage.getItem("totalP");

var price = Number(b.replace(/[^0-9.-]+/g,""));
document.getElementById("total").innerHTML = price;
localStorage.setItem("totalP", price);




window.onload=function(){
    document.getElementById("now").style.display='none';
    document.getElementById("later").style.display='none';
    document.getElementById("preorder").style.display='none';

  
    
  }
  
  
  function general()
  {
      var preorder = document.getElementById("pre").checked;
      var delivernow = document.getElementById("delivernow").checked;
      var deliverlater = document.getElementById("deliverlater").checked;
  
    //  var sum = document.getElementById("totalPrice").innerHTML;
     // var price = Number(sum.replace(/[^0-9.-]+/g,""));
  
      if(preorder)
      {
        //  document.getElementById("discount").innerHTML = -0;
        document.getElementById("total").innerHTML = price;
          document.getElementById('shippingFee').innerHTML=0;
          document.getElementById("preorder").style.display='contents';
          document.getElementById("now").style.display='none';
          document.getElementById("later").style.display='none';
          document.getElementById("t").value = price;
        //  document.getElementById('total').innerHTML = sum;
         // document.getElementById('hey').value = sum;  

          
          
      }
      if(delivernow)
      {
       //   document.getElementById("discount").innerHTML = -0;
       document.getElementById("total").innerHTML = price + 10;
          document.getElementById("preorder").style.display='none';
          document.getElementById("now").style.display='contents';
          document.getElementById("later").style.display='none';
          document.getElementById("totall").value = price+10;
        //  var total = price + 10 ;
         // document.getElementById('total').innerHTML = total;  
          
         // document.getElementById('hey').value = total;
          
      }  
      else if(deliverlater)
      {
       //   document.getElementById("discount").innerHTML = -0;
       document.getElementById("total").innerHTML = price +10;
          document.getElementById("preorder").style.display='none';
          document.getElementById("now").style.display='none';
          document.getElementById("later").style.display='contents';
          document.getElementById("tota").value = price+10;
        //  var total = price + 10 ;
         // document.getElementById('total').innerHTML = total;  
          
         // document.getElementById('hey').value = total;
          
      }  
      

         
  }
</script>
    
@endsection