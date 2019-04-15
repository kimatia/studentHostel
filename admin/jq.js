$(document).ready(function()
{

$(".tredit").click(function()
{
var ID=$(this).attr('id');

$("#first_"+ID).hide();
$("#second_"+ID).hide();
$("#third_"+ID).hide();
$("#first_ip_"+ID).show();
$("#second_ip_"+ID).show();
$("#third_ip_"+ID).show();
}).change(function()
{
var ID=$(this).attr('id');
var first=$("#first_ip_"+ID).val();
var second=$("#second_ip_"+ID).val();
var third=$("#third_ip_"+ID).val();
var dataString = 'id='+ ID +'&name='+first+'&comment='+second+'&replace='+third;
 //alert(dataString);
$("#first_"+ID).html('<img src="load.gif" />');


if(first.length && second.length && third.length > 0)
{
$.ajax({
type: "POST",
url: "post_tabel.php",
data: dataString,
cache: false,
success: function(html)
{

$("#first_"+ID).html(first);
$("#second_"+ID).html(second);
$("#third_"+ID).html(third);
}
});
}
else
{
alert('Enter something.');
}

});

$(".ip").mouseup(function() 
{
return false
});

$(document).mouseup(function()
{
$(".ip").hide();
$(".text").show();
});


});