@component('mail::message')

# Your food order has been confirmed.

<img src="https://i.pinimg.com/564x/3f/12/26/3f12264cad7f964c30ec0af37c19154a.jpg" alt="food" border="0"/>

We have receive your order! Please prepare cash in exact amount.<br>

<address>
    <b>Amount </b> ${{ $or->price }}<br> 
    <b>Order Type</b> {{ $or->type }}<br>   
    <b>Payment Method</b> {{ $or->payment_type }}<br> 
    <b>Created At</b> {{ $or->created_at }}<br>
</address>
<br>

Thanks,<br>
<b>{{ config('app.name') }} SG</b><br>
<hr>
<i>+65 9283 1829</i><br>
<i>390 Victoria St, Singapore 188061</i>
@endcomponent
