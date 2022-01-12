var d;
$( document ).ready(function() {
  d=$("#d").text();
  load1(d);
  $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

});
function openPage(pageName) {
  // Hide all elements with class="tabcontent" by default */
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  // Remove the background color of all tablinks/buttons
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  // remove the active button

  //document.getElementById(pageName).style.display = "block";
  $("#"+pageName).css("display", "block");
  $("#"+pageName).focus();
  var j=$("#bgrp").get();
  for (i = 0; i < j.length; i++) {
    $("#bgrp").get(i).removeClass('active');
  }
  if(event) $(event.target).addClass('active');
}
function load1(d3){
  var d1=new Date();
  var d2=new Date(d3);
  var months = [ "January", "February", "March", "April", "May", "June", 
  "July", "August", "September", "October", "November", "December" ];
  var days=["Saturday","Sunday",	"Monday",	"Tuesday",	"Wednesday",	"Thursday",	"Friday"];

  var t=months[d2.getMonth()]+" "+d2.getFullYear();
  $("#date").text(t);
}
function load(typ){
  var d1=new Date(d);
  var y=d1.getFullYear(), m;
  if(typ=="+"){
    if(d1.getMonth()==11) {
      y=d1.getFullYear()+1;
      m='01';
    }
    else  m=d1.getMonth()+2;
  }else{
    if(d1.getMonth()==0) {
      y=d1.getFullYear()-1;
      m='12';
    }
    else m=d1.getMonth();
  }
  d=y+"-"+m;
  load1(d);
}
function load_month(pageName){
  //$("#"+pageName).html('<h2>hi</h2>');
  $("#"+pageName).css("display", "block");
  //console.log($($("#bgrp").contents()[3]).addClass('active'));
  /*
  $.ajax({
    type:'POST',
    url:'/getmsg',
    data:'_token = <?php echo csrf_token() ?>',
    success:function(data) {
       $("#"+pageName).html(data.msg);
    }
 });*/
}

