var d=new Date();
var ab;
const months = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
const days=["Saturday","Sunday",	"Monday",	"Tuesday",	"Wednesday",	"Thursday",	"Friday"];

$( document ).ready(function() {
  load_month();
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
  $("#"+pageName).css("display", "block");
}

function load(typ){  
  switch(ab){
    case 'm':
        if(typ=="+") d.setMonth(d.getMonth()+1);
        else d.setMonth(d.getMonth()-1);
        load_month()
    break;
    case 'w':
        if(typ=="+") d.setDate(d.getDate()+7);
        else d.setDate(d.getDate()-7);        
        load_week();
    break;
    case 'd':
        if(typ=="+") d.setDate(d.getDate()+1);
        else d.setDate(d.getDate()-1);        
        load_day();
    break;
    case 'l':
    break;
  }
}
function load_month(){
  var d1=new Date(d);
  $("#date").text(months[d1.getMonth()]+" "+d1.getFullYear());
  var t="<div class='table-responsive-sm'><table class='table'><thead class='thead-light'><tr>";
  for(i=0;i<7;i++) t=t+"<th>"+days[i]+"</th>";
  t=t+"</tr></thead><tbody>";  
  var cnt=new Date(d1.getFullYear(),d1.getMonth(),0).getDate();
  var cnt2=new Date(d1.getFullYear(),d1.getMonth(),1).getDay()+1;
  if(cnt2>6) cnt2=cnt2-7;
  // 0 sanday
  var j=0;
  for(i=0;i<cnt2;i++){
    if(i==0) t=t+"<tr>";
    j++;
    t=t+"<td></td>";
  }
  for(i=1;i<=cnt;i++){
    if(j==7) {
      t=t+"</tr>";
      j=0;
    }
    if(j==0) t=t+"<tr>";
    t=t+"<td><div class='bg-con'><div class='bg-div'>"+i+"</div></div></td>";
    j++;
  }
  t=t+"</tr></tbody></table></div>";
  $("#month").html(t);
  ab='m';
  openPage('month');  
}
function load_day(){  
  var d1=new Date(d);
  $("#date").text(months[d1.getMonth()]+" "+d1.getDate()+"-"+d1.getFullYear());
  var cns=d1.getDay()+1;
  if(cns>6) cns=0;
  var t="<div class='table-responsive-sm'><table class='table'><thead class='thead-light'><tr><th> All day</th><th colspan='5'>"+days[cns]+"</th></tr></thead><tbody>";
  for(i=0;i<24;i++){
    t=t+"<tr><th>"+i+" - "+(i+1)+" am</th><td></td>";
    t=t+"</tr>";
  }
  t=t+"</tbody></table></div>";
  $("#day").html(t);
  ab='d';
  openPage('day');  
}
function load_week(){
  var d1=new Date(d);
  var d2=new Date(d1);
  d2.setDate(d1.getDate()+6);
  if(d1.getMonth()==d2.getMonth()) $("#date").text(months[d1.getMonth()]+" "+d1.getDate()+"-"+d2.getDate());
  else $("#date").text(months[d1.getMonth()]+" "+d1.getDate()+"-"+months[d2.getMonth()]+" "+d2.getDate());
  var t="<div class='table-responsive-sm'><table class='table'><thead class='thead-light'><tr><th> All day</th>";
  d2=new Date(d);
  var cns=d1.getDay()+1;
  for(i=0;i<7;i++) {
    if(cns>6) cns=0;
    t=t+"<th>"+days[cns]+" "+(d2.getMonth()+1)+"/"+d2.getDate()+"</th>";
    cns++;
    d2.setDate(d2.getDate()+1);
  }
  t=t+"</tr></thead><tbody>";
  for(i=0;i<24;i++){
    t=t+"<tr><th>"+i+" - "+(i+1)+" am</th>";
    for(j=0;j<7;j++){
      t=t+"<td></td>";
    }
    t=t+"</tr>";
  }
  t=t+"</tbody></table></div>";
  $("#week").html(t);
  ab='w';
  openPage('week');
  
}
function load_list(){
  openPage('list');
  ab='l';
}
function load1(){
  d=new Date();
  switch(ab){
    case 'm':load_month();
    break;
    case 'w':load_week();
    break;
    case 'd':load_day();
    break;
    case 'l':load_l();
    break;
  }
}