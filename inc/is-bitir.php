<?php
 $is_id = addslashes(strip_tags(trim($_GET["is_id"])));
 if(!ctype_digit($is_id)){
     header("location:?sayfa=guvenlik");
 }


  $bitis_saat = date("Y-m-d H:i:s");  
  $is_durum = 1;


    
  $ekle = $db->prepare("UPDATE istakip SET 

  bitis_saat = :bitis_saat,
  is_durum = :is_durum WHERE id=$is_id
  ");
  $kontrol = $ekle->execute(
    array(

      "bitis_saat" => $bitis_saat,
      "is_durum" => $is_durum
    ));
  if ($kontrol) {
header("location:?sayfa=is-list");
  }
  else {
    echo "Eklenmedi.";
  }



?>