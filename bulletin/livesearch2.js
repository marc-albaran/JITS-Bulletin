function showResults(str)
{
var xmlhttp;
if (str.length==0)
  { 
  //document.getElementById("results").innerHTML="";
  window.location = 'http://localhost/bulletin/home.php';
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("results").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","livesearch2.php?q="+str,true);
xmlhttp.send();
}
