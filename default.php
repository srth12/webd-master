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

connectdb();
$genre[0]="Adventure";
$genre[1]="Comics";
$genre[2]="Science";
$genre[3]="Sci-Fi";
$genre[4]="Novel";
$genre[5]="Short Story";
$genre[6]="History";
$genre[7]="Autobiography";
$genre[8]="Epic";
$var="";$i=1;
for($i=0;$i<9;$i++){
$query="select image_url,title from book_details where genre like '%".$genre[$i]."%' limit 0,1";
$res=mysql_query($query) or die("Querying failed... ");
if(mysql_num_rows($res) > 0 ){
while( $row=mysql_fetch_assoc($res) ){
$var=$var."<img onclick='fff(".'"'.$row["image_url"].'"'.")'  title='".$row["title"]."' width='100px' height='150px' style='clear:both;z-index:-5; ' src='./images/".$row['image_url']."' /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

}

}

}
echo $var;

?>