@extends('layout/standar')

@section('content')
<div class="container p-2 bg-light ">
  <div class="row  justify-content-md-center">
    <div class="col-md-auto">
      <button type="button" class="btn btn-outline-primary" > Add new event</button>
      <button type="button" class="btn btn-outline-primary mx-2" onclick="load1(new Date())" id=">" >Today</button>
    </div>
    <div class="col-md-auto ">
      <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-outline-primary " onclick="load('-')" id="<"><</button>
        <?php 
            $d=date("Y-m-d");
            echo '<p id="d" class="d-none">',$d,'</p>';
        ?>
        <h4 id="date" class="mx-3 "></h4>
        <button type="button" class="btn btn-outline-primary " onclick="load('+')" id=">">></button>
      </div>
    </div>
    <div class="col-md-auto">
      <div class="btn-group" role="group" aria-label="Basic example" id="bgrp">
        <button type="button" class="btn btn-outline-primary" onclick="load_month('month')" id="m">Month</button>
        <button type="button" class="btn btn-outline-primary" onclick="openPage('week')" >Week</button>
        <button type="button" class="btn btn-outline-primary" onclick="openPage('day')" >Day</button>
        <button type="button" class="btn btn-outline-primary" onclick="openPage('list')" >List</button>
      </div>
    </div>
  </div>
  
  <div id="month" class="tabcontent">
    <p id="csrf">{{ csrf_token() }}</p>
      <div id = 'msg'>This message will be replaced using Ajax. 
          Click the button to replace the message.</div>
       <?php
          echo Form::button('Replace Message',['onClick'=>'getMessage()']);
       ?>
    <div class="table-responsive-sm">
      <table class="table">
        <thead class="thead-light">
        </thead>
        <tbody>
        </tbody>
      </table>
  </div>
  </div>
  
  <div id="week" class="tabcontent">
    <div class="table-responsive-sm">
      <table class="table">
        <thead class="thead-light">
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
  
  <div id="day" class="tabcontent">
      <div class="table-responsive-sm">
          <table class="table">
            <thead class="thead-light">
              <tr>
                <th colspan="8" class="text-center"></th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
  </div>
  
  <div id="list" class="tabcontent">
    
  </div>
</div>
<script>
  function getMessage() {
 
 $.ajax({
  
    url:'{{ route('search') }}',
    type:'GET',
    data:{'name':'query'},
       success:function(data){
           alert(data);
       },error:function(){ 
           alert("error!!!!");
       }
 });
}
</script>


@endsection
