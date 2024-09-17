<?php
$id= $_GET["id"];
$url= $_GET["url"];
echo $url;
echo "denme";
if ($url=="gorev_sil") {
	$cek = $db->query("DELETE FROM gorev WHERE id=$id");
	if ($cek) {
		header("location:?sayfa=gorev-list");
	}
	else{
		echo "Veri silinirken bir sorun oluştu.";
	}
}
else if ($url=="proje_sil") {
	$cek = $db->query("DELETE FROM proje WHERE id=$id");
	if ($cek) {
		header("location:?sayfa=proje-list");
	}
	else{
		echo "Veri silinirken bir sorun oluştu.";
	}
}

else if ($url=="musteri_sil") {
	$cek = $db->query("DELETE FROM musteri WHERE musteri_id=$id");
	if ($cek) {
		header("location:?sayfa=musteri-list");
	}
	else{
		echo "Veri silinirken bir sorun oluştu.";
	}
}

else if ($url=="uye_sil") {
	$cek = $db->query("DELETE FROM user WHERE user_id=$id");
	if ($cek) {
		header("location:?sayfa=uye-list");
	}
	else{
		echo "Veri silinirken bir sorun oluştu.";
	}
}
else if ($url=="duyuru_sil") {
	$cek = $db->query("DELETE FROM duyuru WHERE id=$id");
	if ($cek) {
		header("location:?sayfa=duyuru-list");
	}
	else{
		echo "Veri silinirken bir sorun oluştu.";
	}
}

else if ($url=="is_sil") {
	$cek = $db->query("DELETE FROM istakip WHERE id=$id");
	if ($cek) {
		header("location:?sayfa=is-list");
	}
	else{
		echo "Veri silinirken bir sorun oluştu.";
	}
}


	?>