<?php
$uye_id = $_GET["id"];
$user_sor = $db->query("SELECT * FROM user WHERE user_id=$uye_id");
$user_cek = $user_sor->fetch(PDO::FETCH_ASSOC);
?>


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Üye Düzenle</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
            <li class="breadcrumb-item active">Üye Düzenle</li>

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

            if ($user_password==$user_cek["user_password"]) {
             $user_password=$user_cek["user_password"];
             $guvenlisifre=$user_password;
           }
           else{
             $salt = "18811938]au";
             $md5 = md5($user_password); 
             $guvenlisifre = md5($md5.$salt);
           }

                  $ekle = $db->prepare("UPDATE user SET 
                user_adsoyad = :user_adsoyad,
                user_name = :userkadi,
                user_mail = :user_mail,
                user_password = :user_password,
                user_role = :user_role,
                user_telefon = :user_telefon,
                user_adres = :user_adres,
                user_dogumTarih = :user_dogumTarih,
                user_baslangicTarih = :user_baslangicTarih,
                cinsiyet =:cinsiyet WHERE user_id=$uye_id
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
                Üye güncelleme işlemini başarılı bir şekilde gerçekleştirdiniz.</span>
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
        ?>
      </div>
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Üye Düzenle</h3>

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
              <input type="text" id="inputName" class="form-control" name="user_adsoyad" required="" value="<?php echo $user_cek['user_adsoyad']?>">
            </div>
            <div class="form-group">
              <label for="inputName">Kullanıcı E-posta</label>
              <input type="text" id="inputName" class="form-control" name="user_mail" required=""  value="<?php echo $user_cek['user_mail']?>">
            </div>
            <div class="form-group">
              <label for="inputName">Kullanıcı Şifre</label>
              <input type="password" id="inputName" class="form-control" name="user_password" required="" value="<?php echo $user_cek['user_password']?>">
            </div>
            <div class="form-group">
              <label for="inputStatus">Kullanıcı Yetki</label>
              <select id="inputStatus" class="form-control custom-select" name="user_role" required="">
                  <?php
                  if($user_cek['user_role']==1){
                      echo '<option value="1" selected>Yönetici</option>
                            <option value="2">Kullanıcı</option>';
                  }
                  else if($user_cek['user_role']==2){
                  echo '<option value="1" >Yönetici</option>
                        <option value="2" selected>Kullanıcı</option>';
                  }
            
                  ?>
                    
              </select>
            </div>
            <div class="form-group">
              <label for="inputName">Kullanıcı Telefon</label>
              <input type="text" id="inputName" class="form-control" name="user_telefon" required="" value="<?php echo $user_cek['user_telefon']?>">
            </div>
            <div class="form-group">
              <label for="inputDescription">Kulllanıcı Adres</label>
              <textarea id="inputDescription" class="form-control" rows="4" name="user_adres"><?php echo $user_cek['user_adres']?></textarea>
            </div>
            <div class="form-group">
              <label>Kullanıcı Doğum Tarihi:</label>
              <div class="input-group" >
                <input name="user_dogumTarih" type="text" class="form-control date-time" required="" value="<?php echo $user_cek['user_dogumTarih']?>"/>

              </div>
            </div>
            <div class="form-group">
              <label>Kullanıcı İşe Başlangıç Tarihi:</label>
              <div class="input-group" >
                <input name="user_baslangicTarih" type="text" class="form-control date-time" required="" value="<?php echo $user_cek["user_baslangicTarih"] ?>"/>

              </div>
            </div>
              <div class="form-group">
                <label for="inputStatus">Cinsiyet Seçiniz</label>
                <select id="inputStatus" class="form-control custom-select" name="cinsiyet" required="">
                  <?php
                  if($user_cek['cinsiyet']=='erkek'){
                      echo '<option value="erkek" selected>Erkek</option>
                            <option value="kadın">Kadın</option>';
                  }
                  else if($user_cek['cinsiyet']=='kadın'){
                  echo '<option value="erkek" >Erkek</option>
                        <option value="kadın" selected>Kadın</option>';
                  }
            
                  ?>
                    
              </select>
              </div>


            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
      <div class="row">
        <div class="col-12">
          <input type="submit" value="Üye Güncelle" class="btn btn-success float-left">
        </div>

      </div>
    </form>
    <br><br><br><br>


  </section>

</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>