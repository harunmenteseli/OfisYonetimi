<?php 
session_destroy();
@ob_end_flush();
header("location:login.php");
echo '<meta http-equiv="refresh" content="0;URL=login.php">';
?>