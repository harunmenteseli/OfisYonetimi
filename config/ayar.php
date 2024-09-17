<?php
$mysqlsunucu = "localhost";
$mysqlkullanici = "root";
$mysqlsifre = "";
try {
	$db = new PDO("mysql:host=$mysqlsunucu;dbname=ofisyonetim;charset=utf8", $mysqlkullanici, $mysqlsifre);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Bağlantı başarılı"; 
}
catch(PDOException $e)
{
	echo "Bağlantı hatası: " . $e->getMessage();
}


@$username = $_SESSION["username"];
$sql=$db->prepare("SELECT * from user WHERE user_name='$username'");
$sql->execute();
$row=$sql->fetch(PDO::FETCH_ASSOC);
@$user_rol = $row["user_role"];




?>