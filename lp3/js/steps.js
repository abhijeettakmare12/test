$(document).ready(function(){
$('#popup img:eq(1)').on('click',function(){$('#popup-wrapper').hide()
})
setInterval(function(){$("h1").toggle();},1500);
$("#q0 .answer").click(function(){$("#q0").hide(0,function(){$("#q1").fadeIn().focus();});});
$("#q1 .answer").click(function(){$("#q1").hide(0,function(){$("#q2").fadeIn().focus();});});
$("#q2 .answer").click(function(){$("#q2").hide(0,function(){$("#q3").fadeIn().focus();});});
$("#q3 .answer").click(function(){$("#q3").hide(0,function(){$("#q4").fadeIn().focus();});});
$("#q4 .answer").click(function(){$("#content").hide();$("#q4").hide(0,function(){
	$("#final, #v1, #results-header").fadeIn().focus();});
	setTimeout(function(){$("#v1").hide();$("#v2").show();},2000);
	setTimeout(function(){$("#v2").hide();$("#v3").show();},4500);
	setTimeout(function(){$("#v3").hide();$("#v4").show();},6000);
	setTimeout(function(){$("#v4").hide();$("#v5").show();},8500);
	});
});
	
function showdate(){var mydate=new Date()
var year=mydate.getYear()
if(year<1000)
year+=1900
var day=mydate.getDay()+ 0
var month=mydate.getMonth()
var daym=mydate.getDate()+ 1
if(daym<10)
daym="0"+ daym
var dayarray=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday")
var montharray=new Array("January","February","March","April","May","June","July","August","September","October","November","December")
return(""+ montharray[month]+" "+ daym+"th")}

