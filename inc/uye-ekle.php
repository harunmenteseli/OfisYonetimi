 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Üye Ekle</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
            <li class="breadcrumb-item active">Üye Ekle</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->



  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card-body">
           <?php 
          



           error_reporting(0);
          if ($_POST) {
            @$user_adsoyad = $_POST["user_adsoyad"];
            @$user_mail = $_POST["user_mail"];
            @$user_password = $_POST["user_password"];
            @$user_role = $_POST["user_role"];
            @$user_telefon = $_POST["user_telefon"];
            @$user_adres = $_POST["user_adres"];
            @$user_dogumTarih = $_POST["user_dogumTarih"];
            @$user_baslangicTarih= $_POST["user_baslangicTarih"];
            @$cinsiyet= $_POST["cinsiyet"];
            @$userkadi = self($user_adsoyad);

            $salt = "18811938]au";
            $md5 = md5($user_password); 
            $guvenlisifre = md5($md5.$salt);


            $user_cek=$db->prepare("SELECT * from user WHERE user_name='$userkadi' OR user_mail='$user_mail'");
            $user_cek->execute();
            $user_row=$user_cek->fetch(PDO::FETCH_ASSOC);


            if (empty($user_adsoyad) || empty($user_mail) || empty($user_password) || empty($user_role) || empty($user_telefon) || empty($user_dogumTarih) || empty($user_baslangicTarih)) {
              echo '<div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h5><i class="icon fas fa-ban"></i> Oppss!</h5>
              Adres alanı dışındaki tüm alanlar zorunlu alandır.
              </div>';
            }
            else {
              if(@$user_mail== $user_row["user_mail"] || @$userkadi== $user_row["user_name"]){
               echo '<div class="alert alert-danger alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h5><i class="icon fas fa-ban"></i> Oppss!</h5>
               E-posta adresi veya kullanıcı adı daha önce kullanılmış
               </div>';
             }
             else{
               $ekle = $db->prepare("INSERT INTO user SET 
                user_adsoyad = :user_adsoyad,
                user_name = :userkadi,
                user_mail = :user_mail,
                user_password = :user_password,
                user_role = :user_role,
                user_telefon = :user_telefon,
                user_adres = :user_adres,
                user_dogumTarih = :user_dogumTarih,
                user_baslangicTarih = :user_baslangicTarih,
                cinsiyet = :cinsiyet
                ");
               $kontrol = $ekle->execute(
                array(
                  "user_adsoyad" => $user_adsoyad,
                  "userkadi" => $userkadi,
                  "user_mail" => $user_mail,
                  "user_password" => $guvenlisifre,
                  "user_role" => $user_role,
                  "user_telefon" => $user_telefon,
                  "user_adres" => $user_adres,
                  "user_dogumTarih" => $user_dogumTarih,
                  "user_baslangicTarih" => $user_baslangicTarih,
                  "cinsiyet" => $cinsiyet
                ));
               if ($kontrol) {
                echo '
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Başarılı</h5>
                Üye ekleme işlemini başarılı bir şekilde gerçekleştirdiniz. Giriş yaparken kullanıcı adınız ile giriş yapmanız gerekmektedir.<br><br><span class="badge badge-danger" style="padding:10px;">Kullanıcı Adınız: '.$userkadi.'</span>
                </div>

                ';
              }
              else {
                echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> Oppss!</h5>
                Veritabanına eklerken bir hata oluştu.
                </div>';
              }
            }


          }
        }
        ?>


          <?php
          if($user_rol==1){
            echo '
                  <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Üye Ekle</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>


        <form action="" method="post">
          <div class="card-body">
            <div class="form-group">
              <label for="inputName">Ad Soyad</label>
              <input type="text" id="inputName" class="form-control" name="user_adsoyad" required="">
            </div>
            <div class="form-group">
              <label for="inputName">Kullanıcı E-posta</label>
              <input type="text" id="inputName" class="form-control" name="user_mail" required="">
            </div>
            <div class="form-group">
              <label for="inputName">Kullanıcı Şifre</label>
              <input type="password" id="inputName" class="form-control" name="user_password" required="">
            </div>
            <div class="form-group">
              <label for="inputStatus">Kullanıcı Yetki</label>
              <select id="inputStatus" class="form-control custom-select" name="user_role" required="">
                <option selected disabled>Yetki Seçiniz</option>
                <option value="1">Yönetici</option>
                <option value="2">Kullanıcı</option>
              </select>
            </div>
            <div class="form-group">
              <label for="inputName">Kullanıcı Telefon</label>
              <input type="text" id="inputName" class="form-control" name="user_telefon" required="">
            </div>
            <div class="form-group">
              <label for="inputDescription">Kullaınıcı Adres</label>
              <textarea id="inputDescription" class="form-control" rows="4" name="user_adres"></textarea>
            </div>
            <div class="form-group">
              <label>Kullanıcı Doğum Tarihi:</label>
              <div class="input-group" >
                <input name="user_dogumTarih" type="text" class="form-control date-time" required=""/>

              </div>
            </div>
            <div class="form-group">
              <label>Kullanıcı İşe Başlangıç Tarihi:</label>
              <div class="input-group" >
                <input name="user_baslangicTarih" type="text" class="form-control date-time" required=""/>

              </div>
            </div>
            <div class="form-group">
                <label for="inputStatus">Kullanıcı Cinsiyet</label>
                <select id="inputStatus" class="form-control custom-select" name="cinsiyet">
                  <option selected disabled>Cinsiyet Seçiniz</option>
                <option value="erkek">Erkek</option>
                <option value="kadın">Kadın</option>
                </select>
              </div>
             <!-- <div class="form-group">
                <label for="inputStatus">Proje Kullanıcısı</label>
                <select id="inputStatus" class="form-control custom-select" name="proje_kullanici">
                  <option selected disabled>Projeyi Atayacağınız Kullanıcıyı Seçiniz</option>
                  <?php 
                  // $sorgu = $db->query("SELECT * FROM user");
                  // while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                  //   echo "<option>".$cikti["user_name"]."</option>";
                  // }
                  ?>
                </select>
              </div>-->


            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
      <div class="row">
        <div class="col-12">
          <input type="submit" value="Üye Ekle" class="btn btn-success float-left">
        </div>
      </div>
    </form>
    <br><br><br><br>
            ';
          }
else {
  echo '<div class="col-md-12">
            <div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="fas fa-exclamation-triangle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Bu sayfayı görüntülemek için yetkiniz bulunmamaktadır.</span>
                <span class="info-box-number"><a href="?sayfa=main" style="color:#fff;">Anasayfaya Dön.<a/></span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>';
}


          ?>

         
      </div>
  </section>

</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>