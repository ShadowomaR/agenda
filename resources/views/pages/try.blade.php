@extends('layout/standar')

@section('content')
<div class="container bg-light ">
  <div class="row justify-content-md-center py-2">
    <div class="col-md-auto">
      <button type="button" class="btn btn-outline-primary" > Add new event</button>
      <button type="button" class="btn btn-outline-primary mx-2" onclick="load1(new Date())" id=">" >Today</button>
    </div>
    <div class="col-md-auto ">
      <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-outline-primary " onclick="load('-')" id="<"><</button>
        <h4 id="date" class="mx-3 "></h4>
        <button type="button" class="btn btn-outline-primary " onclick="load('+')" id=">">></button>
      </div>
    </div>
    <div class="col-md-auto">
      <div class="btn-group bgrp" role="group" aria-label="Basic example" id="bgrp">
        <button type="button" class="btn btn-outline-primary active" onclick="load_month()" id="m">Month</button>
        <button type="button" class="btn btn-outline-primary" onclick="load_week()" id="w">Week</button>
        <button type="button" class="btn btn-outline-primary" onclick="load_day()" id="d">Day</button>
        <button type="button" class="btn btn-outline-primary" onclick="load_list()" id="l">List</button>
      </div>
    </div>
  </div>
  
  <div id="month" class="tabcontent "></div>
  
  <div id="week" class="tabcontent"></div>
  
  <div id="day" class="tabcontent"></div>
  
  <div id="list" class="tabcontent"></div>
</div>

@endsection
