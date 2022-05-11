@component('mail::message')
# Your reservation with {{ $rese->restaurant->name }} has been confirmed.


Show this email when you arrive at the <b>{{ $rese->restaurant->name }}.</b><b>
<b>Please be punctual on time to avoid queue</b>.

<address>
    <b>Reservation Date</b> {{ $rese->date }}<br>
    <b>Reservation Time</b> {{ $rese->time }}<br>
    <b>Restaurant Address</b> {{ $rese->restaurant->address }}
</address>
<br>

Thanks,<br>
<b>{{ config('app.name') }} SG</b><br>
<hr>
<i>+65 9283 1829</i><br>
<i>390 Victoria St, Singapore 188061</i>
@endcomponent
