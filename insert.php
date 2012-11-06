<?php

include("auth.inc.php");
if(isset($_REQUEST["submit"])){




mysql_connect("localhost","","") or die("could not connect to db stopping...");
mysql_select_db("test") or die(" database selection failed1");
$img=$_FILES["image"];
$image=$_FILES["image"]['name'];
$source=$img['tmp_name'];
$target="./images/".$image;

//$img=$image["name"];
//echo "hai".$_FILES["image"]["tmp_name"];
$title=$_REQUEST['title'];
$author=$_REQUEST['author'];
$publisher=$_REQUEST['publisher'];
$genre=$_REQUEST['genre'];
//$query1="INSERT INTO `books`.`book_details` (`title`, `author`, `publisher`, `genre`) VALUES ('$title','$author','$publisher','$genre')";
$query1="insert into book_details values('$title','$author','$publisher','$genre','$image')";
$query2="insert into book_index(title) values('$title') ";
mysql_query($query1) or die("Inertion Failed 1");
mysql_query($query2) or die(" insertion failed 2");


if(copy($source,$target))
{
echo "file copied successfully";
}
else{
die( "image uplaoding failed");
}
}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="signup_style.css" />
<title>Book 360deg</title>
</head>
<body style="background-color:#CCC">









<div align="center"><img id="titlebar" src="./images/titlebar.jpg" width="100%" height="100px" />
</div>
<div align="center">
<form action="insert.php" method="post" enctype="multipart/form-data"  >
<table>
<tr>
<td>Title</td>
<td><input type="text" name="title"  /></td>
</tr>
<tr>
<td>Autor</td>
<td><input type="text" name="author" /></td>
</tr>
<tr>
<td>Publisher</td>
<td><input type="text" name="publisher" /></td>
</tr>
<tr>
<td>Genre</td>
<td><input type="text" name="genre" /></td>
</tr>
<tr>
<td> Upload Image</td>
<td><input type="file" name="image"></td>
</tr>
<tr>
</div>
<td colspan="2" align="center" >
<input id="signupbutton" src="./images/titlebar.jpg" width="100px" height="30px" type="submit"  value="Submit" name="submit"></td>
</table>


</tr>


</form>

<p id="response"    >
</p>


<script>



function fn(){
	//document.write(v);
	  //document.write("hai");
	   if(window.XMLHttpRequest){
	 xmlhttp= new XMLHttpRequest();
	 }
	 else{
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.open("GET","forum.php?id=batman",false);
	xmlhttp.send();
	var dom=xmlhttp.responseText;
	//document.write(dom);
	
	document.getElementById('response').innerHTML=dom;
}


//fn();
</script> 
</body>
</html>