@extends('layouts.app')

@section('content')

    @if(Session::has('cart'))

    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" >
    <div class="" >
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active" >
            <div class="carousel-container" style="background-color: white;">
                <div class="row">
                <div class="container-md p-5 col-5 justify-content-center" style="background-color:rgb(224, 203, 146);">
                        <h3>View Order Summary</h3><br>
                       
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-md-offset-6 col-sm-offset-6 ">
                                <ul class="list-group"> 
                         
                                    @foreach($food as $f)
                                        <li class="list-group-item">
                                        <input type="hidden" name="food_id" id="food_id" value="{{ $f['item']['id'] }}" >
                                        <input type="hidden" name="restaurant" id="restaurant" value="{{ $f['item']['restaurant_id'] }}" >
                                        <div class="row">

                                        <div class="col-lg-3">
                                            <img src="{{ $f['item']['img'] }}" height="100px" width="100px"/>
                                        </div>
                                        <div class="col-lg-2">
                                            <strong>{{ $f['item']['name'] }}</strong>
                                        </div>
                                        <div class="col-lg-2 float-right">

                                            <span class="badge alert-warning">${{ $f['pri'] }}</span>
                                        </div>
                                        <div class="col-lg-3">
                                        <div class="input-group quantity">
                                            <a href="{{ route('cart.reduceByOne', ['id' => $f['item']['id']]) }} "class="input-group-prepend decrement-btn changeQuantity" style="cursor: pointer">
                                                <span class="input-group-text">-</span>
                                            </a>
                                            <input type="text" class="qty-input form-control" maxlength="2" max="10" name="qty" id="qty"value="{{ $f['qty']  }}">
                                            <a href="{{ route('cart.increaseByOne', ['id' => $f['item']['id']]) }} "class="input-group-prepend decrement-btn changeQuantity" style="cursor: pointer">
                                                <span class="input-group-text">+</span>
                                            </a>
                                        </div>                     
                                        </div>
                                    </div>

                                <div class="col-lg-2">
                                    <a href="{{ route('cart.remove', ['id' => $f['item']['id']]) }}" class="">Remove</a>
                                        </li>
                                    @endforeach
                                </ul>
                                </div>
                            </div>   
                        </div>
                          <div class="container-md w-30 p-5 col-7 " style="background-color:rgb(240, 238, 229);">
                            <div class="container p-3 my-3 border">
                           
                            <!--
                                  <div class="deliverlater box" id="later">
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Address</span>
                                    </div>
                                        <input type="text" value="{{ Auth::user()->address }}" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="address" id="address" required><br>
                                        
                                  </div><br>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Delivery Time</span>
                                    </div>
                                  
                                    <input type="time" class="form-control" value="{{ date('H:i',  strtotime('+30 minutes')) }}" min="{{ date('H:i',  strtotime('+30 minutes')) }}" max="21:00">
                                  </div><BR>
                                  <p><I>A delivery charge of $10 will be imposed.</I></p>
                                </div>
                                <div class="delivernow box" id="now">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Address</span>
                                        </div>
                                        <input type="text" value="{{ Auth::user()->address }}" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="address" id="address" required><br>
                                        
                                        </div>
                                    <br>
                                        <p><I>A delivery charge of $10 will be imposed.</I></p>  
                                  </div>
                                <div class="preorder box form-group "id="pre">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">Upcoming Reservation</span>
                                            </div>
                                        
                                            <select class="form-control">
                                                @foreach($reservation as $reserve)
                                             <option name="{{ $reserve->id }}" >{{ $reserve->restaurant->name.' ID:'.$reserve->id.' Date:'.$reserve->date.' Time:'.$reserve->time  }}</option>
                                             @endforeach
                                            </select>
                                          </div>
                                    </div>
                                </div>
                                    <div class="container p-3 my-3 border">
                                        <header class="header">
                                    <!--                <h1>Checkout</h1>
                                            </header>
                                              <div>
                                              <fieldset>
                                                <legend>Payment Method</legend>
                                                <div class="form__radios">
                                                    <div class="form__radio">
                                                      <label for="cod">
                                                        <i class="bi bi-wallet"></i>
                                                        Cash On Delivery</label>
                                                      <input checked id="cod" name="payment-method" type="radio" />
                                                    </div>
                                                <div class="form__radios">
                                                  <div class="form__radio">
                                                    <label for="visa"><svg class="icon">
                                                        <use xlink:href="#icon-visa" />
                                                      </svg>Visa Payment</label>
                                                    <input checked id="visa" name="payment-method" type="radio" />
                                                  </div>
                                          
                                                  <div class="form__radio">
                                                    <label for="paypal"><svg class="icon">
                                                        <use xlink:href="#icon-paypal" />
                                                      </svg>PayPal</label>
                                                    <input id="paypal" name="payment-method" type="radio" />
                                                  </div>
                                          
                                                  <div class="form__radio">
                                                    <label for="mastercard"><svg class="icon">
                                                        <use xlink:href="#icon-mastercard" />
                                                      </svg>Master Card</label>
                                                    <input id="mastercard" name="payment-method" type="radio" />
                                                  </div>
                                                </div>
                                              </fieldset>
                                              <br> -->

                                       <form action="{{ route('voucher.store', '$Auth::user()->id') }}" method="POST">
                                         @csrf
                                              <div class="input-group">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text">Voucher</span>
                                                </div> 
                                                    <input type="text" placeholder="Input your voucher here"  class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="voucher_code" name="voucher_code"><br>
                                                    <input type="submit" class="btn btn-success" value="Apply"/>
                                                  </form>
                                                </div>
                                                <br>
                                       

                                               @if (session('error'))
                                                <div class="alert alert-danger" role="alert">
                                                {{ session('error')}}
                                                </div>
                                                @endif 

                                                @if (session('success'))
                                                <div class="alert alert-success" role="alert">
                                                {{ session('success')}}
                                                </div>

                                                @endif 
                                          
                                              <div><br>
                                                <h3>Invoice</h3>
                                          
                                                <table width="100%">
                                                  <tbody>
                                        
                                                    <tr>
                                                      <td>Price (SGD $) </td>
                                                      <td align="right" name="totalPrice" id="totalPrice" value="{{ $totalPrice }}"> {{ $totalPrice }}
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td>Discount (SGD $) </td>
                                                      <td align="right" id="discount" name="discount">-0</td>
                                                    </tr>
                                                  </tbody>
                                                  <tfoot>
                                                    <tr>
                                      
                                                      <td>Total Amount (SGD $) </td>
                                                      
                                                      <td align="right"  id="total"  value="" >
                                                        {{ $totalPrice }}
                                                      </td> 
                                                    
                                                      
                                                    </tr>
                       
                                                  </tfoot>
                                                </table>
                                              </div>
                                              <br>
                                              <div class="row">
                                                <div class="col-sm-12 col-md-12 col-md-offset-6 col-sm-offset-6 ">
                                 
                                                   <a href="/checkout"   class="btn btn-block btn-success col-12"  >Check Out</a>
                                                    
                                                </div>
                                            </div>
                                          </div>
                                        
                                          <svg xmlns="http://www.w3.org/2000/svg" style="display: none">
                                          
                                            <symbol id="icon-shopping-bag" viewBox="0 0 24 24">
                                              <path d="M20 7h-4v-3c0-2.209-1.791-4-4-4s-4 1.791-4 4v3h-4l-2 17h20l-2-17zm-11-3c0-1.654 1.346-3 3-3s3 1.346 3 3v3h-6v-3zm-4.751 18l1.529-13h2.222v1.5c0 .276.224.5.5.5s.5-.224.5-.5v-1.5h6v1.5c0 .276.224.5.5.5s.5-.224.5-.5v-1.5h2.222l1.529 13h-15.502z" />
                                            </symbol>
                                          
                                            <symbol id="icon-mastercard" viewBox="0 0 504 504">
                                              <path d="m504 252c0 83.2-67.2 151.2-151.2 151.2-83.2 0-151.2-68-151.2-151.2 0-83.2 67.2-151.2 150.4-151.2 84.8 0 152 68 152 151.2z" fill="#ffb600" />
                                              <path d="m352.8 100.8c83.2 0 151.2 68 151.2 151.2 0 83.2-67.2 151.2-151.2 151.2-83.2 0-151.2-68-151.2-151.2" fill="#f7981d" />
                                              <path d="m352.8 100.8c83.2 0 151.2 68 151.2 151.2 0 83.2-67.2 151.2-151.2 151.2" fill="#ff8500" />
                                              <path d="m149.6 100.8c-82.4.8-149.6 68-149.6 151.2s67.2 151.2 151.2 151.2c39.2 0 74.4-15.2 101.6-39.2 5.6-4.8 10.4-10.4 15.2-16h-31.2c-4-4.8-8-10.4-11.2-15.2h53.6c3.2-4.8 6.4-10.4 8.8-16h-71.2c-2.4-4.8-4.8-10.4-6.4-16h83.2c4.8-15.2 8-31.2 8-48 0-11.2-1.6-21.6-3.2-32h-92.8c.8-5.6 2.4-10.4 4-16h83.2c-1.6-5.6-4-11.2-6.4-16h-70.4c2.4-5.6 5.6-10.4 8.8-16h53.6c-3.2-5.6-7.2-11.2-12-16h-29.6c4.8-5.6 9.6-10.4 15.2-15.2-26.4-24.8-62.4-39.2-101.6-39.2 0-1.6 0-1.6-.8-1.6z" fill="#ff5050" />
                                              <path d="m0 252c0 83.2 67.2 151.2 151.2 151.2 39.2 0 74.4-15.2 101.6-39.2 5.6-4.8 10.4-10.4 15.2-16h-31.2c-4-4.8-8-10.4-11.2-15.2h53.6c3.2-4.8 6.4-10.4 8.8-16h-71.2c-2.4-4.8-4.8-10.4-6.4-16h83.2c4.8-15.2 8-31.2 8-48 0-11.2-1.6-21.6-3.2-32h-92.8c.8-5.6 2.4-10.4 4-16h83.2c-1.6-5.6-4-11.2-6.4-16h-70.4c2.4-5.6 5.6-10.4 8.8-16h53.6c-3.2-5.6-7.2-11.2-12-16h-29.6c4.8-5.6 9.6-10.4 15.2-15.2-26.4-24.8-62.4-39.2-101.6-39.2h-.8" fill="#e52836" />
                                              <path d="m151.2 403.2c39.2 0 74.4-15.2 101.6-39.2 5.6-4.8 10.4-10.4 15.2-16h-31.2c-4-4.8-8-10.4-11.2-15.2h53.6c3.2-4.8 6.4-10.4 8.8-16h-71.2c-2.4-4.8-4.8-10.4-6.4-16h83.2c4.8-15.2 8-31.2 8-48 0-11.2-1.6-21.6-3.2-32h-92.8c.8-5.6 2.4-10.4 4-16h83.2c-1.6-5.6-4-11.2-6.4-16h-70.4c2.4-5.6 5.6-10.4 8.8-16h53.6c-3.2-5.6-7.2-11.2-12-16h-29.6c4.8-5.6 9.6-10.4 15.2-15.2-26.4-24.8-62.4-39.2-101.6-39.2h-.8" fill="#cb2026" />
                                              <g fill="#fff">
                                                <path d="m204.8 290.4 2.4-13.6c-.8 0-2.4.8-4 .8-5.6 0-6.4-3.2-5.6-4.8l4.8-28h8.8l2.4-15.2h-8l1.6-9.6h-16s-9.6 52.8-9.6 59.2c0 9.6 5.6 13.6 12.8 13.6 4.8 0 8.8-1.6 10.4-2.4z" />
                                                <path d="m210.4 264.8c0 22.4 15.2 28 28 28 12 0 16.8-2.4 16.8-2.4l3.2-15.2s-8.8 4-16.8 4c-17.6 0-14.4-12.8-14.4-12.8h32.8s2.4-10.4 2.4-14.4c0-10.4-5.6-23.2-23.2-23.2-16.8-1.6-28.8 16-28.8 36zm28-23.2c8.8 0 7.2 10.4 7.2 11.2h-17.6c0-.8 1.6-11.2 10.4-11.2z" />
                                                <path d="m340 290.4 3.2-17.6s-8 4-13.6 4c-11.2 0-16-8.8-16-18.4 0-19.2 9.6-29.6 20.8-29.6 8 0 14.4 4.8 14.4 4.8l2.4-16.8s-9.6-4-18.4-4c-18.4 0-36.8 16-36.8 46.4 0 20 9.6 33.6 28.8 33.6 6.4 0 15.2-2.4 15.2-2.4z" />
                                                <path d="m116.8 227.2c-11.2 0-19.2 3.2-19.2 3.2l-2.4 13.6s7.2-3.2 17.6-3.2c5.6 0 10.4.8 10.4 5.6 0 3.2-.8 4-.8 4s-4.8 0-7.2 0c-13.6 0-28.8 5.6-28.8 24 0 14.4 9.6 17.6 15.2 17.6 11.2 0 16-7.2 16.8-7.2l-.8 6.4h14.4l6.4-44c0-19.2-16-20-21.6-20zm3.2 36c0 2.4-1.6 15.2-11.2 15.2-4.8 0-6.4-4-6.4-6.4 0-4 2.4-9.6 14.4-9.6 2.4.8 3.2.8 3.2.8z" />
                                                <path d="m153.6 292c4 0 24 .8 24-20.8 0-20-19.2-16-19.2-24 0-4 3.2-5.6 8.8-5.6 2.4 0 11.2.8 11.2.8l2.4-14.4s-5.6-1.6-15.2-1.6c-12 0-24 4.8-24 20.8 0 18.4 20 16.8 20 24 0 4.8-5.6 5.6-9.6 5.6-7.2 0-14.4-2.4-14.4-2.4l-2.4 14.4c.8 1.6 4.8 3.2 18.4 3.2z" />
                                                <path d="m472.8 214.4-3.2 21.6s-6.4-8-15.2-8c-14.4 0-27.2 17.6-27.2 38.4 0 12.8 6.4 26.4 20 26.4 9.6 0 15.2-6.4 15.2-6.4l-.8 5.6h16l12-76.8zm-7.2 42.4c0 8.8-4 20-12.8 20-5.6 0-8.8-4.8-8.8-12.8 0-12.8 5.6-20.8 12.8-20.8 5.6 0 8.8 4 8.8 13.6z" />
                                                <path d="m29.6 291.2 9.6-57.6 1.6 57.6h11.2l20.8-57.6-8.8 57.6h16.8l12.8-76.8h-26.4l-16 47.2-.8-47.2h-23.2l-12.8 76.8z" />
                                                <path d="m277.6 291.2c4.8-26.4 5.6-48 16.8-44 1.6-10.4 4-14.4 5.6-18.4 0 0-.8 0-3.2 0-7.2 0-12.8 9.6-12.8 9.6l1.6-8.8h-15.2l-10.4 62.4h17.6z" />
                                                <path d="m376.8 227.2c-11.2 0-19.2 3.2-19.2 3.2l-2.4 13.6s7.2-3.2 17.6-3.2c5.6 0 10.4.8 10.4 5.6 0 3.2-.8 4-.8 4s-4.8 0-7.2 0c-13.6 0-28.8 5.6-28.8 24 0 14.4 9.6 17.6 15.2 17.6 11.2 0 16-7.2 16.8-7.2l-.8 6.4h14.4l6.4-44c.8-19.2-16-20-21.6-20zm4 36c0 2.4-1.6 15.2-11.2 15.2-4.8 0-6.4-4-6.4-6.4 0-4 2.4-9.6 14.4-9.6 2.4.8 2.4.8 3.2.8z" />
                                                <path d="m412 291.2c4.8-26.4 5.6-48 16.8-44 1.6-10.4 4-14.4 5.6-18.4 0 0-.8 0-3.2 0-7.2 0-12.8 9.6-12.8 9.6l1.6-8.8h-15.2l-10.4 62.4h17.6z" />
                                              </g>
                                              <path d="m180 279.2c0 9.6 5.6 13.6 12.8 13.6 5.6 0 10.4-1.6 12-2.4l2.4-13.6c-.8 0-2.4.8-4 .8-5.6 0-6.4-3.2-5.6-4.8l4.8-28h8.8l2.4-15.2h-8l1.6-9.6" fill="#dce5e5" />
                                              <path d="m218.4 264.8c0 22.4 7.2 28 20 28 12 0 16.8-2.4 16.8-2.4l3.2-15.2s-8.8 4-16.8 4c-17.6 0-14.4-12.8-14.4-12.8h32.8s2.4-10.4 2.4-14.4c0-10.4-5.6-23.2-23.2-23.2-16.8-1.6-20.8 16-20.8 36zm20-23.2c8.8 0 10.4 10.4 10.4 11.2h-20.8c0-.8 1.6-11.2 10.4-11.2z" fill="#dce5e5" />
                                              <path d="m340 290.4 3.2-17.6s-8 4-13.6 4c-11.2 0-16-8.8-16-18.4 0-19.2 9.6-29.6 20.8-29.6 8 0 14.4 4.8 14.4 4.8l2.4-16.8s-9.6-4-18.4-4c-18.4 0-28.8 16-28.8 46.4 0 20 1.6 33.6 20.8 33.6 6.4 0 15.2-2.4 15.2-2.4z" fill="#dce5e5" />
                                              <path d="m95.2 244.8s7.2-3.2 17.6-3.2c5.6 0 10.4.8 10.4 5.6 0 3.2-.8 4-.8 4s-4.8 0-7.2 0c-13.6 0-28.8 5.6-28.8 24 0 14.4 9.6 17.6 15.2 17.6 11.2 0 16-7.2 16.8-7.2l-.8 6.4h14.4l6.4-44c0-18.4-16-19.2-22.4-19.2m12 34.4c0 2.4-9.6 15.2-19.2 15.2-4.8 0-6.4-4-6.4-6.4 0-4 2.4-9.6 14.4-9.6 2.4.8 11.2.8 11.2.8z" fill="#dce5e5" />
                                              <path d="m136 290.4s4.8 1.6 18.4 1.6c4 0 24 .8 24-20.8 0-20-19.2-16-19.2-24 0-4 3.2-5.6 8.8-5.6 2.4 0 11.2.8 11.2.8l2.4-14.4s-5.6-1.6-15.2-1.6c-12 0-16 4.8-16 20.8 0 18.4 12 16.8 12 24 0 4.8-5.6 5.6-9.6 5.6" fill="#dce5e5" />
                                              <path d="m469.6 236s-6.4-8-15.2-8c-14.4 0-19.2 17.6-19.2 38.4 0 12.8-1.6 26.4 12 26.4 9.6 0 15.2-6.4 15.2-6.4l-.8 5.6h16l12-76.8m-20.8 41.6c0 8.8-7.2 20-16 20-5.6 0-8.8-4.8-8.8-12.8 0-12.8 5.6-20.8 12.8-20.8 5.6 0 12 4 12 13.6z" fill="#dce5e5" />
                                              <path d="m29.6 291.2 9.6-57.6 1.6 57.6h11.2l20.8-57.6-8.8 57.6h16.8l12.8-76.8h-20l-22.4 47.2-.8-47.2h-8.8l-27.2 76.8z" fill="#dce5e5" />
                                              <path d="m260.8 291.2h16.8c4.8-26.4 5.6-48 16.8-44 1.6-10.4 4-14.4 5.6-18.4 0 0-.8 0-3.2 0-7.2 0-12.8 9.6-12.8 9.6l1.6-8.8" fill="#dce5e5" />
                                              <path d="m355.2 244.8s7.2-3.2 17.6-3.2c5.6 0 10.4.8 10.4 5.6 0 3.2-.8 4-.8 4s-4.8 0-7.2 0c-13.6 0-28.8 5.6-28.8 24 0 14.4 9.6 17.6 15.2 17.6 11.2 0 16-7.2 16.8-7.2l-.8 6.4h14.4l6.4-44c0-18.4-16-19.2-22.4-19.2m12 34.4c0 2.4-9.6 15.2-19.2 15.2-4.8 0-6.4-4-6.4-6.4 0-4 2.4-9.6 14.4-9.6 3.2.8 11.2.8 11.2.8z" fill="#dce5e5" />
                                              <path d="m395.2 291.2h16.8c4.8-26.4 5.6-48 16.8-44 1.6-10.4 4-14.4 5.6-18.4 0 0-.8 0-3.2 0-7.2 0-12.8 9.6-12.8 9.6l1.6-8.8" fill="#dce5e5" />
                                            </symbol>
                                          
                                            <symbol id="icon-paypal" viewBox="0 0 491.2 491.2">
                                              <path d="m392.049 36.8c-22.4-25.6-64-36.8-116-36.8h-152.8c-10.4 0-20 8-21.6 18.4l-64 403.2c-1.6 8 4.8 15.2 12.8 15.2h94.4l24-150.4-.8 4.8c1.6-10.4 10.4-18.4 21.6-18.4h44.8c88 0 156.8-36 176.8-139.2.8-3.2.8-6.4 1.6-8.8-2.4-1.6-2.4-1.6 0 0 5.6-38.4 0-64-20.8-88" fill="#263b80" />
                                              <path d="m412.849 124.8c-.8 3.2-.8 5.6-1.6 8.8-20 103.2-88.8 139.2-176.8 139.2h-44.8c-10.4 0-20 8-21.6 18.4l-29.6 186.4c-.8 7.2 4 13.6 11.2 13.6h79.2c9.6 0 17.6-7.2 19.2-16l.8-4 15.2-94.4.8-5.6c1.6-9.6 9.6-16 19.2-16h12c76.8 0 136.8-31.2 154.4-121.6 7.2-37.6 3.2-69.6-16-91.2-6.4-7.2-13.6-12.8-21.6-17.6" fill="#139ad6" />
                                              <path d="m391.249 116.8c-3.2-.8-6.4-1.6-9.6-2.4s-6.4-1.6-10.4-1.6c-12-2.4-25.6-3.2-39.2-3.2h-119.2c-3.2 0-5.6.8-8 1.6-5.6 2.4-9.6 8-10.4 14.4l-25.6 160.8-.8 4.8c1.6-10.4 10.4-18.4 21.6-18.4h44.8c88 0 156.8-36 176.8-139.2.8-3.2.8-6.4 1.6-8.8-4.8-2.4-10.4-4.8-16.8-7.2-1.6 0-3.2-.8-4.8-.8" fill="#232c65" />
                                              <path d="m275.249 0h-152c-10.4 0-20 8-21.6 18.4l-36.8 230.4 246.4-246.4c-11.2-1.6-23.2-2.4-36-2.4z" fill="#2a4dad" />
                                              <path d="m441.649 153.6c-2.4-4-4-8-7.2-12-5.6-6.4-13.6-12-21.6-16.8-.8 3.2-.8 5.6-1.6 8.8-20 103.2-88.8 139.2-176.8 139.2h-44.8c-10.4 0-20 8-21.6 18.4l-25.6 161.6z" fill="#0d7dbc" />
                                              <path d="m50.449 436.8h94.4l23.2-145.6c0-2.4.8-4 1.6-5.6l-131.2 131.2-.8 4.8c-.8 8 4.8 15.2 12.8 15.2z" fill="#232c65" />
                                              <path d="m246.449 0h-123.2c-3.2 0-5.6.8-8 1.6l-12 12c-.8 1.6-1.6 3.2-1.6 4.8l-24 150.4z" fill="#436bc4" />
                                              <path d="m450.449 232.8c2.4-12 3.2-23.2 3.2-34.4l-156 156c76-.8 135.2-32 152.8-121.6z" fill="#0cb2ed" />
                                              <path d="m248.849 471.2 12.8-80-100 100h68c9.6 0 17.6-7.2 19.2-16z" fill="#0cb2ed" />
                                              <g fill="#33e2ff" opacity=".6">
                                                <path d="m408.049 146.4 45.6 45.6c0-5.6-1.6-11.2-2.4-16.8l-40-40c-1.6 4-2.4 7.2-3.2 11.2z" />
                                                <path d="m396.849 180c-1.6 3.2-3.2 6.4-4.8 9.6l55.2 55.2c.8-4 1.6-8 2.4-12z" />
                                                <path d="m431.249 287.2c1.6-3.2 3.2-6.4 4.8-9.6l-60.8-60.8c-2.4 2.4-4 5.6-6.4 8z" />
                                                <path d="m335.249 250.4 69.6 69.6 7.2-7.2-68-68c-3.2 1.6-5.6 3.2-8.8 5.6z" />
                                                <path d="m292.849 266.4 76 76c3.2-1.6 6.4-3.2 9.6-4.8l-74.4-74.4c-4 .8-7.2 2.4-11.2 3.2z" />
                                                <path d="m320.849 353.6c4-.8 8.8-.8 12.8-1.6l-80-80c-4.8 0-8.8.8-13.6.8z" />
                                                <path d="m196.049 272.8h-6.4c-2.4 0-4.8.8-6.4.8l86.4 87.2c2.4-2.4 5.6-4.8 8.8-5.6z" />
                                                <path d="m164.049 314.4 94.4 94.4 2.4-12.8-94.4-94.4z" />
                                                <path d="m156.049 364.8 94.4 94.4 2.4-12-94.4-94.4z" />
                                                <path d="m150.449 403.2-1.6 12.8 75.2 75.2h5.6c2.4 0 4.8-.8 7.2-1.6z" />
                                                <path d="m140.049 466.4 24.8 24.8h14.4l-36.8-36.8z" />
                                              </g>
                                            </symbol>
                                          
                                            <symbol id="icon-visa" viewBox="0 0 504 504">
                                              <path d="m184.8 324.4 25.6-144h40l-24.8 144z" fill="#3c58bf" />
                                              <path d="m184.8 324.4 32.8-144h32.8l-24.8 144z" fill="#293688" />
                                              <path d="m370.4 182c-8-3.2-20.8-6.4-36.8-6.4-40 0-68.8 20-68.8 48.8 0 21.6 20 32.8 36 40s20.8 12 20.8 18.4c0 9.6-12.8 14.4-24 14.4-16 0-24.8-2.4-38.4-8l-5.6-2.4-5.6 32.8c9.6 4 27.2 8 45.6 8 42.4 0 70.4-20 70.4-50.4 0-16.8-10.4-29.6-34.4-40-14.4-7.2-23.2-11.2-23.2-18.4 0-6.4 7.2-12.8 23.2-12.8 13.6 0 23.2 2.4 30.4 5.6l4 1.6z" fill="#3c58bf" />
                                              <path d="m370.4 182c-8-3.2-20.8-6.4-36.8-6.4-40 0-61.6 20-61.6 48.8 0 21.6 12.8 32.8 28.8 40s20.8 12 20.8 18.4c0 9.6-12.8 14.4-24 14.4-16 0-24.8-2.4-38.4-8l-5.6-2.4-5.6 32.8c9.6 4 27.2 8 45.6 8 42.4 0 70.4-20 70.4-50.4 0-16.8-10.4-29.6-34.4-40-14.4-7.2-23.2-11.2-23.2-18.4 0-6.4 7.2-12.8 23.2-12.8 13.6 0 23.2 2.4 30.4 5.6l4 1.6z" fill="#293688" />
                                              <path d="m439.2 180.4c-9.6 0-16.8.8-20.8 10.4l-60 133.6h43.2l8-24h51.2l4.8 24h38.4l-33.6-144zm-18.4 96c2.4-7.2 16-42.4 16-42.4s3.2-8.8 5.6-14.4l2.4 13.6s8 36 9.6 44h-33.6z" fill="#3c58bf" />
                                              <path d="m448.8 180.4c-9.6 0-16.8.8-20.8 10.4l-69.6 133.6h43.2l8-24h51.2l4.8 24h38.4l-33.6-144zm-28 96c3.2-8 16-42.4 16-42.4s3.2-8.8 5.6-14.4l2.4 13.6s8 36 9.6 44h-33.6z" fill="#293688" />
                                              <path d="m111.2 281.2-4-20.8c-7.2-24-30.4-50.4-56-63.2l36 128h43.2l64.8-144h-43.2z" fill="#3c58bf" />
                                              <path d="m111.2 281.2-4-20.8c-7.2-24-30.4-50.4-56-63.2l36 128h43.2l64.8-144h-35.2z" fill="#293688" />
                                              <path d="m0 180.4 7.2 1.6c51.2 12 86.4 42.4 100 78.4l-14.4-68c-2.4-9.6-9.6-12-18.4-12z" fill="#ffbc00" />
                                              <path d="m0 180.4c51.2 12 93.6 43.2 107.2 79.2l-13.6-56.8c-2.4-9.6-10.4-15.2-19.2-15.2z" fill="#f7981d" />
                                              <path d="m0 180.4c51.2 12 93.6 43.2 107.2 79" />
                                              </g>
                                            </symbol>
                                        </svg>
                                </div>
                            </div>
                        </div>   
                    </div>  
                <br>    
            </div>
            
          </div>


   
    @else
    <div class="row text-center p-5">
        <div class="col-sm-12 col-md-12 col-md-offset-12 col-sm-offset-12">
            <h1>No Items in Cart!</h1>
        </div>
    </div>
    
    @endif



    <script>
                
                <?php 
                if (session('success'))
                {
                    ?>
                    document.getElementById("discount").innerHTML = "-10";
                   var currentPrice = document.getElementById("totalPrice").innerHTML;
                   var price = Number(currentPrice.replace(/[^0-9.-]+/g,""));
                   var totalPrice = currentPrice - 10;
                   document.getElementById("total").innerHTML = totalPrice;

                   if(totalPrice<0)
                   {
                       totalPrice = 0;
                    document.getElementById("total").innerHTML = 0;
                   }
              //     document.getElementByName("total").value = totalPrice;

                    localStorage.setItem("totalP", totalPrice);
                    
                   <?php
                    
             
                }
                
                else
                {
                    ?>
                    document.getElementById("discount").innerHTML = "-0";
                   var currentPrice = document.getElementById("totalPrice").innerHTML;
                   var price = Number(currentPrice.replace(/[^0-9.-]+/g,""));
                
                    localStorage.setItem("totalP", price);
                    
                   <?php
                }?>

                   
                  


                                            

                                                              

        
  window.onload=function(){
    document.getElementById("now").style.display='none';
    document.getElementById("later").style.display='none';
    document.getElementById("pre").style.display='none';
  
  
    
  }


  
  
        $(document).ready(function(){
      $('input[name="ordertype"]').click(function(){
          var inputValue = $(this).attr("value");
          var targetBox = $("." + inputValue);
          $(".box").not(targetBox).hide();
          $(targetBox).show();
      });
  });

    
  
  var total;

  function general()
  {
      var preorder = document.getElementById("preorder").checked;
      var delivernow = document.getElementById("delivernow").checked;
      var deliverlater = document.getElementById("deliverlater").checked;
  
      var sum = document.getElementById("totalPrice").innerHTML;
      var price = Number(sum.replace(/[^0-9.-]+/g,""));
  
      if(preorder)
      {
          document.getElementById("discount").innerHTML = -0;
          document.getElementById('shippingFee').innerHTML=0;
          document.getElementById('total').innerHTML = sum;
          document.getElementById('hey').value = sum;  

          
          
      }
      else if(delivernow || deliverlater)
      {
          document.getElementById("discount").innerHTML = -0;
          document.getElementById('shippingFee').innerHTML= 10;
          var total = price + 10 ;
          document.getElementById('total').innerHTML = total;  
          
          document.getElementById('hey').value = total;
          
      }  

         
  }




 
  
  
  function check()
  {
      alert("Your address is within delivery area!");
  } 
  
  function pay()
  {
      alert("Your payment has been received. Kindly check your email for order confirmation.");
      alert("Your will be redirected to view order in next second");
      window.setTimeout(function(){
  
  // Move to a new location or you can do something else
  window.location.href = "viewOrder.html";
  
  }, 1000);
  
  
  }

  
  </script>
  




@endsection