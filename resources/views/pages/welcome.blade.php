@extends('layout/standar')

@section('content')
<div class="container p-2 bg-light ">
  <div class="row  justify-content-md-center">
    <div class="col-md-auto">
      <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-outline-primary" onclick="load()" id="<"><</button>
        <button type="button" class="btn btn-outline-primary" id=">">></button>
      </div>
      <button type="button" class="btn btn-outline-primary" id="+">+</button>
      <button type="button" class="btn btn-outline-primary m-2" id="t">Today</button>
    </div>
    <div class="col-md-auto mx-2">
      <h2>
        <?php 
          $d=date("Y-m-d");
          echo '<p id="d" class="d-none">',$d,'</p>';
          echo date('F-Y', strtotime($d));
      ?>
      </h2>
    </div>
    <div class="col-md-auto">
      <div class="btn-group" role="group" aria-label="Basic example" id="bgrp">
        <button type="button" class="btn btn-outline-primary active" onclick="openPage('month')" id="m">Month</button>
        <button type="button" class="btn btn-outline-primary" onclick="openPage('week')" id="w">Week</button>
        <button type="button" class="btn btn-outline-primary" onclick="openPage('day')" id="d">Day</button>
        <button type="button" class="btn btn-outline-primary" onclick="openPage('list')" id="l">List</button>
      </div>
    </div>
  </div>
  
  <div id="month" class="tabcontent">
    <div class="table-responsive-sm">
      <table class="table">
        <thead class="thead-light">
          <tr>
            <?php
            $L=array("Saturday","Sunday",	"Monday",	"Tuesday",	"Wednesday",	"Thursday",	"Friday");
            for($n=0;$n<7;$n++){
              echo '<th>',$L[$n],'</th>' ;
            }
            ?>
          </tr>
        </thead>
        <?php
        $m = date('n', strtotime($d));
        $y=(int)date('Y', strtotime($d));
        $j=(int)date('j', strtotime($d));
        $nbr =date("t");
        echo '<tbody><tr>';
        $i=0;
        for($indx=1;$indx<$nbr+1;$indx++){
          $a=0;          
          while($a!=1 ){          
            $t=date('l', mktime(0,0,0,$m,$indx,$y));
            if($t==$L[$i]) {
              if($indx==$j) {
                echo '<th scope="col"><div class="con">
                  <div class="containerbackground">',date('j', mktime(0,0,0,$m,$indx,$y)),'</div>
                  <p>f</p>
              </div></th>';
              }else echo '<th scope="col"><div class="con">
                  <div class="containerbackground">',date('j', mktime(0,0,0,$m,$indx,$y)),'</div>
                  <p>f</p>
              </div></th>';
              $a=1;
            }else  echo '<th scope="col"></th>';
            if($i==6) {
              echo '</tr><tr>';
                $i=-1;
            }
              
            $i++;
          }
        }        
        echo '</tr></tbody>';
        ?>
      </table>
  </div>
  </div>
  
  <div id="week" class="tabcontent">
    <div class="table-responsive-sm">
      <table class="table">
        <thead class="thead-light">
          <tr>
            <?php
            echo '<th></th>' ;
            $L=array("Saturday","Sunday",	"Monday",	"Tuesday",	"Wednesday",	"Thursday",	"Friday");
            for($n=0;$n<7;$n++){
              echo '<th>',$L[$n],'</th>' ;
            }
            ?>
          </tr>
        </thead>
        <tbody>
          <?php
            $k=8;
            $sufix='AM';
            for($n=0;$n<10;$n++){
              if($k==12) $sufix='PM';
              echo '<tr><td>',$k,' ',$sufix,'</td>' ;
              for($n2=0;$n2<7;$n2++){
                echo '<td></td>';
              }
              echo '</tr>' ;
              $k++;
            }
            //<td colspan="2">
          ?>
        </tbody>
      </table>
    </div>
  </div>
  
  <div id="day" class="tabcontent">
      <div class="table-responsive-sm">
          <table class="table">
            <thead class="thead-light">
              <tr>
                <?php
                echo '<th colspan="8" class="text-center">', date('l j-F', strtotime($d)),'</th>' ;
                ?>
              </tr>
            </thead>
            <tbody>
              <?php
                $k=8;
                $sufix='AM';
                for($n=0;$n<10;$n++){
                  if($k==12) $sufix='PM';
                  echo '<tr><td>',$k,' ',$sufix,'</td>' ;
                  for($n2=0;$n2<7;$n2++){
                    echo '<td></td>';
                  }
                  echo '</tr>' ;
                  $k++;
                }
              ?>
            </tbody>
          </table>
        </div>
  </div>
  
  <div id="list" class="tabcontent">
    
  </div>
</div>

  </div>
@endsection
