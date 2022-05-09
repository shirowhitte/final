@component('mail::message')
# Hey, you! Thanks for being our friend. Here’s $10 off 😀

<img src="/assets/img/foodonclick.png" alt="foodonclick" style="height:150px; width:500px">

Use the code <b>Welcome10</b> to enjoy $10 off!<br>
<b>Only for first time user</b>.



Thanks,<br>
<b>{{ config('app.name') }} SG</b><br>
<hr>
<i>+65 9283 1829</i><br>
<i>390 Victoria St, Singapore 188061</i>
@endcomponent
