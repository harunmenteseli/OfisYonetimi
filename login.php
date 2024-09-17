<?php
include("config/ayar.php"); 
ob_start();
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ofis Yönetim | Agarta Plus Bilişim Sistemleri</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="theme/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="theme/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
           <span style="color:#283947;"><b style="color:#f96a44;">Agarta Plus</b> Bilişim Sistemleri</span><br><a href="#" class="h1"><b>Ofis </b>Yönetim</a>
 
    </div>
    <div class="card-body">
      <p class="login-box-msg">Giriş Yap</p>

      <form action="#" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Kullanıcı Adı" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Şifre" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Giriş Yap</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

<?php
$value = "123456789abcdef";
$end    = substr($value, -4 ,4); // Sondan 10 Karakteri Alıyoruz.
$start  = substr($value, 0 ,0); // tamamını alıyoruz.
$result = str_replace([$start, $end], null, $value); // Metnin İçinden Eşleşenleri Siliyoruz.






if ($_POST) {
$username = addslashes(strip_tags($_POST["username"]));
$password = addslashes(strip_tags($_POST["password"]));


$salt = "18811938]au";
$md5 = md5($password); 
$guvenlisifre = md5($md5.$salt);

 if (!$username || !$password) {
   echo '<br><div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   Boş Alan Bırakmayın.
                </div>';
 }
 else {
$girisyap=$db->prepare("SELECT * from user WHERE user_name='$username' and user_password='$guvenlisifre'");
$girisyap->execute();
$giris_row=$girisyap->fetch(PDO::FETCH_ASSOC);

   if ($girisyap->rowcount()) {
     $_SESSION["oturum"] = "yes";
     $_SESSION["username"]= $giris_row["user_name"];
     $_SESSION["user_id"] = $giris_row["user_id"];
     header("location:index.php?sayfa=main");
   }
   else{
   echo'<br><div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   Kullanıcı adı veya şifreniz hatalı
                </div>';
   }
 }
 
}

?>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="theme/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="theme/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="theme/dist/js/adminlte.min.js"></script>
<script type='text/javascript' src='js/assets/js/art.js'></script>
</body>
</html>
