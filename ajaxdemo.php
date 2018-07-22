<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
<body bgcolor="lightblue">
<title>Demo of List box selection and displaying matching records</title>

<script type="text/javascript">
function ajaxFunction()
{

//document.writeln(val)
var httpxml;
try
  {
  // Firefox, Opera 8.0+, Safari
  httpxml=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    httpxml=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    try
      {
      httpxml=new ActiveXObject("Microsoft.XMLHTTP");
      }
    catch (e)
      {
      alert("Your browser does not support AJAX!");
      return false;
      }
    }
  }

function stateChanged(){
    if(httpxml.readyState==4){

var myObject = JSON.parse(httpxml.responseText);  // Received the data 

var msg=myObject.value.message;
if(msg.length > 0){document.getElementById("msg").innerHTML=msg;}
else{document.getElementById("msg").style.display='none';}

var str="<table width='50%'  align=center><tr><th align='left' bgcolor='#ffff00'>ID</th><th align='left' bgcolor='#ffff00'>location</th><th align='left' bgcolor='#ffff00'>slug</th><th align='left' bgcolor='#ffff00'>population</th></tr>";
var color="#f1f1f1";
for(i=0;i<myObject.data.length;i++)
{ 
if((i%2)==0){color="#ffffff";}
else{color="#f1f1f1";}
str = str + "<tr bgcolor="+color+"><td>" + myObject.data[i].id + " </td><td>"+ myObject.data[i].location+"</td><td>"+ myObject.data[i].slug+"</td><td>"+myObject.data[i].population+ "</a></td></tr>"
}
str = str + "</table>" ;
document.getElementById("display").innerHTML=str;
    }
    }

var url="ajax-listbox-demo2.php";
var id=document.myForm.id.value;
url=url+"?id="+id;
url=url+"&kid="+Math.random();
//alert(url)
httpxml.onreadystatechange=stateChanged;
httpxml.open("GET",url,true);
httpxml.send(null);

document.getElementById("msg").style.background='#f1f1f1';
document.getElementById("msg").innerHTML="Please Wait ... ";
document.getElementById("msg").style.display='inline';
}

</script>

<?php
//////////////////////////// Your Database details here /////////////////
require "config.php"; // Database Connection 
///////////////////////////

echo "</head><body onload=\"ajaxFunction()\";>";
echo "<center><table border='0' width='100%' cellspacing='0' cellpadding='0' >  <tr bgcolor='#ffffcc'><form  name=myForm method='post' onSubmit=\"ajaxFunction(this.form); return false\">
 <td   align='center' colspan=2><font face='verdana, arial, helvetica' size='2'  ><b> Select a Category</b> </font></td></tr>";
echo "<tr>";
echo "<td  align='center'>";
$query="SELECT * FROM  population ORDER BY location asc";

echo "<select name=id onChange=\"ajaxFunction()\"><option value=0>Show All</option>";
foreach ($dbo->query($query) as $nt) {
echo "<option value=$nt[id]>$nt[location]>$nt[slug]>$nt[population]</option>";
}
echo "</select>";
echo "</font></td>";
echo "</tr></form>";
echo "</table>";
 

?>
<a href="http://localhost:82/PhpProject1/index.html" rel="nofollow" text-align="right"text-align="left" >Back To IndexPage</a><br><br>
<a href="http://localhost:82/wordpress/">Back To PHP Tests</a>
<br><br><br>
<div id=msg style="position:absolute;  z-index:1; left: 1100px; top: 0px;" >This is message area</div>
<br>
<br>

<div id="display"><b>Records will be displayed here</b></div>

 <br><br>
<br><br>


</body>
</html>