<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Book360Deg.com</title>
<?php
function connectdb(){

mysqli_connect("localhost","","") or die("could not connect to db stopping...");
mysql_select_db("test") or die(" database selection failed");

}

function check_input($value)
{
// Stripslashes
if (get_magic_quotes_gpc())
  {
  $value = stripslashes($value);
  }
// Quote if not a number
if (!is_numeric($value))
  {
  $value = "'" . mysql_real_escape_string($value) . "'";
  }
return $value;
}
if(isset($_REQUEST["login"])){
//echo $_REQUEST["username"];


$username=check_input($_REQUEST["username"]);
$password=check_input($_REQUEST["password"]);



}



?>
<script>



function fn(search){
	
	   if(window.XMLHttpRequest){
	 xmlhttp= new XMLHttpRequest();
	 }
	 else{
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.open("GET","search.php?id="+search,false);
	xmlhttp.send();
	var dom=xmlhttp.responseText;
	document.getElementById('content').innerHTML=dom;
}
function def(){
	if(window.XMLHttpRequest){
	 xmlhttp= new XMLHttpRequest();
	 }
	 else{
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.open("GET","default.php",false);
	xmlhttp.send();
	var dom=xmlhttp.responseText;
	document.getElementById('content').innerHTML="<div id=\'imggrp\'>"+dom+"</div>";
	
	}

function fn3(arg) {
	//document.write("kljslfjlksjdfklsjfl");
	if(window.XMLHttpRequest){
	 xmlhttp= new XMLHttpRequest();
	 }
	 else{
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.open("GET","genre.php?id="+arg,false);
	xmlhttp.send();
	var dom=xmlhttp.responseText;
	document.getElementById('content').innerHTML="<div id=\'imggrp\'>"+dom+"</div>";
	}


</script>




</head>
<body>
<!DOCTYPE html>
<html>
<body>
<img src="./images/titlebar.jpg" width="100%" height="90px"/><br />
<div id="container"><br />
</div>
<div id="Searchbox" align="right">

<input id="oval" type="text" value="search" name="Searchbox" onkeypress="fn(this.value)" >

</div>
<div id="bottom">
<div id="menu">
<b>Genre</b><br><br>
<div id="menubar1"><a onclick="fn3('Adventure')" >Adventure</a></div><br><br>
<div id="menubar"><a onclick="fn3('Comics')" >Comics</a></div><br><br>
<div id="menubar"><a onclick="fn3('Science')" >Science</a></div><br><br>
<div id="menubar"><a onclick="fn3('Sci-Fi')" >Sci-Fi</a></div><br><br>
<div id="menubar"><a onclick="fn3('Novel')" >Novel</a></div><br><br>
<div id="menubar"><a onclick="fn3('Short Story')" >Short Story</a></div><br><br>
<div id="menubar"><a onclick="fn3('History')" >History</a></div><br><br>
<div id="menubar"><a onclick="fn3('Autobiography')" >Autobiography</a></div><br/><br>
<div id="menubar"><a onclick="fn3('Epic')" >Epic</a></div>
</div>
<div id="content" >
Content goes here

</div>
<div id="loginfield">
<form align="right" action="index.php" method="POST">
User ID  : 
<input type="text" name="username"><br/>
Password 
<input type="password" name="password"><br />
<input id= "loginbutton" type="submit" value="login" name="login" >
</form>
</div>
</div>
</div>
<script>def()</script>
</body>
</html>
