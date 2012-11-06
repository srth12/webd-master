<?php
session_start();
if (isset($_SESSION["username"]) && $_SESSION["username"] == 1) {
//Do Nothing
} else {
$redirect = $_SERVER["PHP_SELF"];
header("Refresh: 3; URL=index.php?redirect=$redirect");
echo "You are being redirected to the login page!<br>";
echo "(If your browser doesn’t support this, " .
"<a href=\"login.php?redirect=$redirect\">click here</a>)";
die();
}
?>