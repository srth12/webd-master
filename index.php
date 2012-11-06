<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Book360Deg.com</title>
<?php
session_start();
function connectdb(){

mysql_connect("localhost","","") or die("could not connect to db stopping...");
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

connectdb();
$username=$_REQUEST["username"];
$password=$_REQUEST["password"];
mysql_connect("localhost","","") or die("could not connect to db stopping...");
mysql_select_db("test") or die(" database selection failed");

$che="select * from book_user where username='".$username."'";
$check=mysql_query($che) or die("Query failed11111");
$chec=mysql_fetch_assoc($check);
if(($res=mysql_num_rows($check))==0){
	$q="User name doesn't exist";
	header("Location:signup.php?q");

	}
	else{ 
	if($chec["password"]==$password){
	session_start();
	$_SESSION["username"]=$username;
	header("Location:insert.php");
	}
	}

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
	
	xmlhttp.open("GET","search.php?id="+search+"&q="+0,false);
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
	
function fff(searc){
	
	   if(window.XMLHttpRequest){
	 xmlhttp= new XMLHttpRequest();
	 }
	 else{
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.open("GET","search.php?id="+searc+"&q="+1,false);
	xmlhttp.send();
	var dom=xmlhttp.responseText;  
	document.getElementById('content').innerHTML=dom;
	//document.getElementById('content').innerHTML="hhhhhddd";
	
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


<?php

if(!isset($_SESSION["username"])){

?>
<div id="loginfield">
<form align="right" action="index.php" method="POST">
User ID  : 
<input type="text" name="username"><br/>
Password 
<input type="password" name="password"><br />
<input id= "loginbutton" type="submit" value="login" name="login" >
<?php }
else{
echo "         Hello  ".$_SESSION["username"];
?>
  

</form> 
<?php
}
?>
</div>
</div>
</div>
<script>def()</script>
<br />
<br />
<pre>

</pre>
<iframe src="./vote.html" style="margin-top:20px;" />
</body>
</html>
