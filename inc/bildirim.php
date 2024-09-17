
  <?php 
  echo "1";
  exit;
  $bildirimsor = $db->query("SELECT * FROM gorev WHERE bildirim=1 AND gorev_kullanici='$username' ORDER BY id DESC LIMIT 0,1");
  $bildirimcek = $bildirimsor->fetch(PDO::FETCH_ASSOC);
  if ($bildirimcek>0) {
    echo '
    <audio autoplay="autoplay">
    <source src="../Slate.mp3" type="audio/ogg" />
    <source src="../Slate.mp3" type="audio/mpeg" />
    </audio>

    <script language="JavaScript">
    var left="["
    var right="]"
    var msg=" Ofis Yönetim (Yeni Bildirimin Var) ";
    var speed=200;

    function scroll_title() {
      document.title=left+msg+right;
      msg=msg.substring(1,msg.length)+msg.charAt(0);
      setTimeout("scroll_title()",speed);
    }
    scroll_title();
    </script>';

    /*$bildirimguncelle = $db->prepare("UPDATE gorev SET bildirim=0 WHERE gorev_kullanici='$username'");
    $kontrol = $bildirimguncelle->execute();*/
  }
  else{
    echo '
    <title>Ofis Yönetim  | Agarta Plus Bilişim Sistemleri</title>';
  }
  ?>