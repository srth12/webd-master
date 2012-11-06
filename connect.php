function connectdb(){

mysqli_connect("localhost","","") or die("could not connect to db stopping...");
mysql_select_db("test") or die(" database selection failed");

}