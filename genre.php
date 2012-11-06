<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<?php
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
function connectdb(){


mysqli_connect("localhost","","") or die("could not connect to db stopping...");
mysql_select_db("test") or die(" database selection failed");

}
$search=$_GET["id"];
$search=$search;
connectdb();
$query="select * from book_details where genre like '%".$search."%' ";
$res=mysql_query($query) or die("searching failed... ");
if($res and !mysql_num_rows($res)){
die("Content not found");
}

echo ("<br>");
$i=1;
while( ($row=mysql_fetch_assoc($res)) && ($i<50))
{
echo ("<img onclick='fff(".'"'.$row["image_url"].'"'.")' id='image' style='clear:both;' title='".$row['title']."' width='100px' height='150px' src='./images/".$row["image_url"]."' />"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
if($i%5==0)
{
	echo("<br><br><br>");
}
$i++;
}
?>
</body>
</html>