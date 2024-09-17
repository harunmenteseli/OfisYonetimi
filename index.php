<?php
@session_start();
@ob_start();
define("sayfa", "inc/");
define("data", "config/");
include(data."ayar.php");
include(sayfa."fonksiyon.php");
include(sayfa."bootstrap.php");
$suser_id = $_SESSION["user_id"];
$suser_name= $_SESSION["username"];
include(sayfa."header.php");
if (!empty($_SESSION["oturum"])) {

}
else{
	header("location:login.php");
}

if ($_GET && !empty($_GET["sayfa"])) {
	$sayfa = $_GET["sayfa"].".php";
	if (file_exists(sayfa.$sayfa)) {
		include(sayfa.$sayfa);
	}
	else {
		include(sayfa."main.php");
	}
}
else{
	include(sayfa."main.php");
}

include(sayfa."footer.php");
?>