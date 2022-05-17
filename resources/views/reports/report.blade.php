@extends('layouts.adminlayout')
<link href="{{ asset('css/progress.css') }}" rel="stylesheet">
@section('content')

<div class="container-md p-5 col-10 justify-content-center" style="background-color:rgb(224, 203, 146) ;">

 <!-- Search Filter -->
 <div>
     <!--button  class="btn btn-light " style="float: right;"><a href=""@click.prevent="pdf" target="_blank"><i class="fa fa-download">PDF</i></a></button!-->
     <!--button  class="btn btn-light " style="float: right;"><a href=""@click.prevent="printme" target="_blank"><i class="fa fa-print">Print</i></a></button!-->
     <input class="fa fa-print" style="float: right"type="button" value="Print/Generate PDF" onclick="printDiv()">  
     <i class="fa fa-print"style="float: right"></i>
 </div>


 
 <form action="search_report" method="post">
    @csrf
     <div class="row filter-row">
                    <div class="col-sm-6 col-md-3">  
                        <div class="form-group form-focus">
                        <label class="date">Search from</label>
                            <input type="date" class="form-control floating" name="fromDate">
                            
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <label class="date">Search to</label>
                            <input type="date" class="form-control floating" name="toDate">
                            
                        </div>
                    </div>
                    
                    <div class="col-sm-6 col-md-5">  
                        <label>    </label>
                        <button type="submit" class="btn btn-success btn-block">Search </a></button>  
                    </div>
                </div>
            </form>

            <!-- /Search Filter -->

<p>
<br></br>
<div id="dailyreport">
<h1>Daily sales Reports</h1>
<h3>

   @foreach($totalsales as $totalsales)
 
   
   Total Sales for the day : ${{$totalsales['sums']}}
   
   
   @endforeach
  
<br></br>
</h3>

<table class="container-md p-5 col-10 justify-content-center" > 
    <tr>
    
        <td> Date </td>
        <td> Restaurant ID</td>
        <td> Price($) </td>
        
        


    </tr>
    
    @foreach($report as $report)
    <tr>
        <td> {{$report['created_at']}}</td>
        <td> {{$report['restaurant_id']}}</td>
        <td> ${{$report['price']}}</td>
       
        
        
     
        
    </tr>
   

    @endforeach
</table>
</p>
</div>

</div>

<script>
        function printDiv() {
            var divContents = document.getElementById("dailyreport").innerHTML;
            var a = window.open('', '', 'height=500, width=500');
         
           
            a.document.write(divContents);
             
            a.document.close();
            a.print();
        }
</script>



                                          
 @endsection