<?php
	@session_start();
@ob_start();
define("sayfa", "inc/");
define("data", "config/");
include(data."ayar.php");
include(sayfa."fonksiyon.php");
include(sayfa."bootstrap.php");

if($_GET["islem"]=="bildirimKontrol"){
	 $bildirimsor = $db->query("SELECT * FROM gorev WHERE bildirim=1 AND gorev_kullanici='$username' ORDER BY id DESC LIMIT 0,1");
  $bildirimcek = $bildirimsor->fetch(PDO::FETCH_ASSOC);
  if ($bildirimcek>0) {
  	echo "1";
  	$bildirimguncelle = $db->prepare("UPDATE gorev SET bildirim=0 WHERE gorev_kullanici='$username'");
    $kontrol = $bildirimguncelle->execute();
  }
}
?>