@extends('layout/standar')

@section('content')
<?php 
function getDates($year)
{
    $dates = array();

    date("L", mktime(0,0,0, 7,7, $year)) ? $days = 366 : $days = 365;
    for($i = 1; $i <= $days; $i++){
        $month = date('m', mktime(0,0,0,1,$i,$year));
        $wk = date('w', mktime(0,0,0,1,$i,$year));
        $wkDay = date('D', mktime(0,0,0,1,$i,$year));
        $day = date('d', mktime(0,0,0,1,$i,$year));
        //echo $wk,'\n';
        $dates[$month][$wk][$wkDay] = $day;
    } 

    return $dates;   
}
?>
<div class="container p-2 bg-light ">
  <div class="row  justify-content-md-center">
    <div class="col-md-auto">
      <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-outline-primary"><</button>
        <button type="button" class="btn btn-outline-primary">></button>
      </div>
      <button type="button" class="btn btn-outline-primary ml-2">Today</button>
    </div>
    <div class="col-md-auto mx-2">
      <h2>
        <?php $d=date("Y-m-d H:i:s");
              echo date('F-Y', strtotime($d));
      ?>
      </h2>
    </div>
    <div class="col-md-auto">
      <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-outline-primary" onclick="openPage('month')" id="defaultOpen">Month</button>
        <button type="button" class="btn btn-outline-primary" onclick="openPage('week')">Week</button>
        <button type="button" class="btn btn-outline-primary" onclick="openPage('day')">Day</button>
        <button type="button" class="btn btn-outline-primary" onclick="openPage('list')">List</button>
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
    <h3>News</h3>
    <p>Some news this fine day!</p>
  </div>
  
  <div id="day" class="tabcontent">
    <h3>Contact</h3>
    <p>Get in touch, or swing by for a cup of coffee.</p>
  </div>
  
  <div id="list" class="tabcontent">
    <h3>About</h3>
    <p>Who we are and what we do.</p>
  </div>
</div>

  </div>
@endsection
