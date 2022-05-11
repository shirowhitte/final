@extends('layouts.app')
<link href="{{ asset('css/progress.css') }}" rel="stylesheet">
@section('content')
        <div class="carousel-inner text-center"role="listbox"style="background-color: white;">
          <div class="carousel-item active d-flex justify-content-center" style="background-color: white;">
            <div class="carousel-container d-flex justify-content-center" style="background-color: white;">
                <div class="row d-flex justify-content-center">
           
                    <div class="col-sm-12 col-md-12 col-md-offset-12 col-sm-offset-12">
                        <h1 class="text-warning">Checkout</h1>
                        <h4>Your Total: $ <span id="total" name="total"> </span></h4>
                       
                        <br>
                    
                        <div class="wrapper">
                            <input type="radio" name="ordertype" id="option-1" value="delivernow" onclick="general()">
                            <input type="radio" name="ordertype" id="option-2" value="deliverlater" onclick="general()" >
                            <input type="radio" name="ordertype" id="option-3"  value="preorder" onclick="general()">
                            <label for="option-1" class="option option-1">
                                <div class="dot"></div>
                                <span>Deliver Now</span>
                                </label>
                            <label for="option-2" class="option option-2">
                                <div class="dot"></div>
                                <span>Deliver Later</span>
                            </label>
                            <label for="option-3" class="option option-3">
                                <div class="dot"></div>
                                <span>Reservation Pre-order</span>
                            </label>
                        </div>
                        <br><br>
         
                        <div id="now" name="now">
                            <div class="container w-75">
                            <form action="{{ route('checkout') }}" method="post" id="checkout-form">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                        <p id="shippingFee" name="shippingFee">Shipping Fee Charges: $10</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" value="{{ Auth::user()->username }}" class="form-control" required name="name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" id="address" value="{{ Auth::user()->address }}" class="form-control" required name="address">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="address">Additional notes</label>
                                            <input type="textarea" id="notes" value="" class="form-control" name="notes">
                                            <input type="hidden" id="totall" name="hey"/>
                                            <input type="hidden" id="ordertype" name="ordertype" value="delivernow"/>
                                            
                                        </div>
                                    </div>
                                </div>
                                {{ csrf_field() }}
                                <br>
                                <fieldset>
                                                <legend class="d-flex justify-content-left display-8">Payment Method</legend>
                                                <div class="form__radios">
                                                    <div class="form__radio">
                                                      <label for="cod">
                                                        <i class="bi bi-wallet"></i>
                                                        Cash On Delivery</label>
                                                      <input id="cod" value="COD" name="payment_type" type="hidden" />
                                                      
                                                    </div>
                                              </fieldset><br>
                                <button type="submit" class="btn btn-success w-100">Place Order</button>
                            </form> 
                        </div>  
                    </div>  

                        <div id="later" name="later">
                            <div class="container w-75">
                            <form action="{{ route('checkout') }}" method="post" id="checkout-form">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <p id="shippingFee" name="shippingFee">Shipping Fee Charges: $10</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" value="{{ Auth::user()->username }}" class="form-control" required readonly name="name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" id="address" value="{{ Auth::user()->address }}" class="form-control" required name="address">
                                            
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="deliverlatertime">Time</label>
                                            <select class="selectpicker form-select" id="deliverlatertime" name="deliverlatertime">
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
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="address">Additional notes</label>
                                            <input type="textarea" id="notes" value="" class="form-control" required name="notes">
                                            <input type="hidden" id="tota" name="hey"/>
                                            <input type="hidden" id="ordertype" name="ordertype" value="deliverlater"/>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                {{ csrf_field() }}
                                <fieldset>
                                                <legend class="d-flex justify-content-left display-8">Payment Method</legend>
                                                <div class="form__radios">
                                                    <div class="form__radio">
                                                      <label for="cod">
                                                        <i class="bi bi-wallet"></i>
                                                        Cash On Delivery</label>
                                                      <input id="cod" value="COD" name="payment_type" type="hidden" />
                                                      
                                                    </div>
                                              </fieldset><br>
                                <button type="submit" class="btn btn-success w-100">Place Order</button>
                                <br><br>
                            </form>
                            <br>
                        </div>
                    </div>

                        <div id="preorder" name="preorder">
                            <div class="container w-75">
                          
                            <form action="{{ route('checkout') }}" method="post" id="checkout-form">
                                <div class="row d-flex justify-content-center">
                                
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="text-left" for="name">Shipping Fee</label>
                                            <input type="text" id="ship" value="Not Applicable" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="text-left" for="name">Name</label>
                                            <input type="text" id="name" value="{{ Auth::user()->username }}" class="form-control" readonly name="name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="address">Reservation</label>
                                            <select class="form-select" id="reservation_id" name="reservation_id">
                                             @forelse($reservation as $reserve)
                                            <option id="{{ $reserve->id }}"name="{{ $reserve->id }}" value="{{ $reserve->id }}" >{{ $reserve->restaurant->name.' ID:'.$reserve->id.' Date:'.$reserve->date.' Time:'.$reserve->time  }}</option>
                                            @empty
                                            <option>You have no existing reservation!</option>
                                            @endforelse
                                            </select>
                                        </div>
                                    </div>
                                  
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="address">Additional notes</label>
                                            <input type="textarea" id="notes" value="" class="form-control" name="notes">
                                            <input type="hidden" id="t" name="hey"  >
                                            <input type="hidden"  name="ordertype" value="preorder">                           
                                        </div>
                                    </div>

                                    <div><br>
                                              <fieldset>
                                                <legend class="d-flex justify-content-left display-8">Payment Method</legend>
                                                <div class="form__radios">
                                                    <div class="form__radio">
                                                      <label for="cod">
                                                        <i class="bi bi-wallet"></i>
                                                        Pay At Restaurant</label>
                                                      <input id="payatrestaurant" value="payatrestaurant" name="payment_type" type="hidden" />
                                                    </div>
                                              </fieldset>
                                              <br> 
                        
                                    </div></div>
                                    {{ csrf_field() }}
                                <button type="submit" class="btn btn-success w-100">Place Order </button>
                            </form>
                           
                        </div>   
                    </div>
                    <br> 
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
    var today = new Date();
        var tzoffset = (new Date()).getTimezoneOffset() * 60000; //offset in milliseconds
        var t = (new Date(Date.now()+ +7.2e+6 - tzoffset)).toISOString().slice(11, -8);
        var time = t.replace(':', '');
        $('#deliverlatertime').find('option').prop('disabled',false); 
          $('#deliverlatertime').find('option').each(function(i,e)
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
  
  
  function general()
  {
     
    var delivernow = document.getElementById("option-1").checked;
    var deliverlater = document.getElementById("option-2").checked;
    var preorder = document.getElementById("option-3").checked;
  
    //  var sum = document.getElementById("totalPrice").innerHTML;
     // var price = Number(sum.replace(/[^0-9.-]+/g,""));
  
      if(preorder)
      {
        //  document.getElementById("discount").innerHTML = -0;
        document.getElementById("total").innerHTML = price;
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