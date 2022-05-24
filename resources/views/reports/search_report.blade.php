@extends('layouts.adminlayout')
<link href="{{ asset('css/progress.css') }}" rel="stylesheet">
@section('content')


<div class="container-md p-5 col-10 justify-content-center" style="background-color:rgb(224, 203, 146) ;">
<div>
     <!--button  class="btn btn-light " style="float: right;"><a href=""@click.prevent="pdf" target="_blank"><i class="fa fa-download">PDF</i></a></button!-->
     <!--button  class="btn btn-light " style="float: right;"><a href=""@click.prevent="printme" target="_blank"><i class="fa fa-print">Print</i></a></button!-->
     
     <button class="btn btn-light" text="black" style="float: right" onclick="printDiv()"><i class="fa fa-print">Print</i></button>
     <button class="btn btn-light" text="black" style="float: right" ><i class="fa fa-arrow-left"><a href="{{ url('/report/order/view') }}">Back to daily report</a></i></button>
 </div>

<div id="search_report">
<h1>Searched Reports</h1>
<h3>
@foreach($searchsales as $searchsales)
 
{{$searchsales['date']}}  ==>
 Total Sales : ${{$searchsales['sums']}}
 <br>
 
 
 @endforeach
</h3>

<table class="container-md p-5 col-10 justify-content-center"> 
    <tr>
    
        <td> Date </td>
        <td> Restaurant ID</td>
        <td> Price($) </td>
        
        


    </tr>
    
    @foreach($search as $search)
    <tr>
        <td> {{$search['created_at']}}</td>
        <td> {{$search['restaurant_id']}}</td>
        <td> ${{$search['price']}}</td>
        
        

       
        
        
     
        
    </tr>
   

    @endforeach
</table>
</div>
</div>

<script>
        function printDiv() {
            var divContents = document.getElementById("search_report").innerHTML;
            var a = window.open('', '', 'height=500, width=500');
            a.document.write(divContents);
            a.document.close();
            a.print();
        }
</script>

@endsection