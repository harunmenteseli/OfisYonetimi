 <?php
 $proje_id = addslashes(strip_tags(trim($_GET["proje_id"])));
 if(!ctype_digit($proje_id)){
     header("location:?sayfa=guvenlik");
 }
 $proje_sor = $db->query("SELECT * FROM proje WHERE id=$proje_id");
 $proje_cek = $proje_sor->fetch(PDO::FETCH_ASSOC);
 $count = $proje_sor->rowCount();
 if ($count==0) {
      header("location:?sayfa=guvenlik");
 }
 ?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Proje Ekle</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
            <li class="breadcrumb-item active">Proje Ekle</li>
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
  @$proje_adi = $_POST["proje_adi"];
  @$proje_aciklama = $_POST["proje_aciklama"];
  @$proje_kullanici = $_POST["proje_kullanici"];
  @$proje_durum = $_POST["proje_durum"];
  @$proje_baslangicTarih = $_POST["proje_baslangicTarih"];
  @$proje_bitisTarih = $_POST["proje_bitisTarih"];
  @$proje_gsm = $_POST["proje_gsm"];
  @$proje_firmaadi = $_POST["proje_firmaadi"];
  @$proje_eposta= $_POST["proje_eposta"];


  if (empty($proje_adi) || empty($proje_durum)) {
    echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Oppss!</h5>
                  Proje adı ve proje durum kısmı zorunlu alandır.Boş bırakmayınız.
                </div>';
  }
 
  
  else {
     $ekle = $db->prepare("UPDATE proje SET 
  proje_adi = :proje_adi,
  proje_aciklama = :proje_aciklama,
  proje_kullanici = :proje_kullanici,
  proje_durum = :proje_durum,
  proje_baslangicTarih = :proje_baslangicTarih,
  proje_bitisTarih = :proje_bitisTarih,
  proje_gsm = :proje_gsm,
  proje_firmaadi = :proje_firmaadi,
  proje_eposta = :proje_eposta WHERE id=$proje_id
  ");
  $kontrol = $ekle->execute(
    array(
      "proje_adi" => $proje_adi,
      "proje_aciklama" => $proje_aciklama,
      "proje_kullanici" => $proje_kullanici,
      "proje_durum" => $proje_durum,
      "proje_baslangicTarih" => $proje_baslangicTarih,
      "proje_bitisTarih" => $proje_bitisTarih,
      "proje_gsm" => $proje_gsm,
      "proje_firmaadi" => $proje_firmaadi,
      "proje_eposta" => $proje_eposta
    ));
  if ($kontrol) {
     header("Refresh: 0;");
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
?>
</div>
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Proje Ekle</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>


          <?php 

          if(@$username==@$proje_cek["proje_kullanici"]) {
            echo '

            <form action="" method="post">
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Proje Adı</label>
                <input type="text" id="inputName" class="form-control" name="proje_adi" value="'.$proje_cek["proje_adi"].'">
              </div>
              <div class="form-group">
                <label for="inputDescription">Proje Açıklama</label>
                <textarea id="inputDescription" class="form-control" rows="4" name="proje_aciklama">'.$proje_cek["proje_aciklama"].'</textarea>
              </div>
              <div class="form-group">
                <label for="inputStatus">Proje Durum</label>
                <select id="inputStatus" class="form-control custom-select" name="proje_durum">
                  <option selected disabled>';?>
                  <?php
                  if($proje_cek['proje_durum']==1){
                    echo '<option value="1" selected>Bekleyen Proje</option>
                    <option value="2">Tamamlanmış Proje</option>
                    <option value="3">Devam Eden Proje</option>
                    <option value="4">Tıkanmış Proje</option>';
                  }
                  else if ($proje_cek["proje_durum"]==2) {
                    echo '<option value="1">Bekleyen Proje</option>
                   <option value="2" selected>Tamamlanmış Proje</option>
                   <option value="3">Devam Eden Proje</option>
                   <option value="4">Tıkanmış Proje</option>';
                 }
                 else if ($proje_cek["proje_durum"]==3) {
                   echo '<option value="1">Bekleyen Proje</option>
                   <option value="2">Tamamlanmış Proje</option>
                   <option value="3" selected>Devam Eden Proje</option>
                   <option value="4">Tıkanmış Proje</option>';
                 }
                 else if ($proje_cek["proje_durum"]==4) {
                   echo '<option value="1">Bekleyen Proje</option>
                   <option value="2">Tamamlanmış Proje</option>
                   <option value="3">Devam Eden Proje</option>
                   <option value="4" selected>Tıkanmış Proje</option>';
                 }

                 ?>
                  <?php 
                  echo'</option>
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

              <div class="form-group">
                <label for="inputStatus">Proje Atayacağınız Kullanıcı</label>
                <select id="inputStatus" class="form-control custom-select" name="proje_kullanici">
                  <option selected value='.$proje_cek['proje_kullanici'].'>'.$proje_cek['proje_kullanici'].'</option>';?>
                  <?php 
                  $sorgu = $db->query("SELECT * FROM user");
                  while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option>".$cikti["user_name"]."</option>";
                  }
                  ?>

                <?php echo'</select>
              </div>
              <div class="form-group">
                  <label>Proje Başlangıç Tarihi:</label>
                    <div class="input-group" >
                        <input name="proje_baslangicTarih" type="text" class="form-control date-time" value="'.$proje_cek["proje_baslangicTarih"].'"/>
                        
                    </div>
                </div>
                <div class="form-group">
                  <label>Proje Bitiş Tarihi:</label>
                    <div class="input-group" >
                        <input name="proje_bitisTarih" type="text" class="form-control date-time" value="'.$proje_cek["proje_bitisTarih"].'"/>
                        
                    </div>
                </div>

              <h3>Proje Firma Bilgileri</h3>
              <div class="form-group">
                <label for="inputProjectLeader">Proje Firma adı</label>
                <input type="text" id="inputProjectLeader" class="form-control" name="proje_firmaadi" value="'.$proje_cek["proje_firmaadi"].'">
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Proje Firma Gsm</label>
                <input type="text" id="inputProjectLeader" class="form-control" name="proje_gsm" value="'.$proje_cek["proje_gsm"].'">
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Proje Firma E-Posta</label>
                <input type="text" id="inputProjectLeader" class="form-control" name="proje_eposta" value="'.$proje_cek["proje_eposta"].'">
              </div>
              <hr>
              <div class="form-group">
                <div class="callout callout-info">
                  <h5>Bilgilendirme</h5>

                  <p>Zaten hali hazırda olan bir müşterinize ait proje eklemek istiyorsanız aşağıdan müşterinizi seçebilirsiniz.</p>
                </div>
                <label>Var olan bir müşteriye proje ekle</label>
                <select class="form-control select2" style="width: 100%;">
                  <option selected disabled>Müşteri Seçiniz</option>';?>
                  <?php 
                  $sorgu = $db->query("SELECT * FROM musteri");
                  while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value=".$cikti["musteri_id"].">".$cikti["musteri_sirketadi"]."</option>";
                  }
                  ?>
                <?php echo '</select>
              </div>
            </div>
            <!-- /.card-body -->
          </div>

            ';

          }
          else if($user_rol==1){
  echo '

            <form action="" method="post">
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Proje Adı</label>
                <input type="text" id="inputName" class="form-control" name="proje_adi" value="'.$proje_cek["proje_adi"].'">
              </div>
              <div class="form-group">
                <label for="inputDescription">Proje Açıklama</label>
                <textarea id="inputDescription" class="form-control" rows="4" name="proje_aciklama" ><'.$proje_cek["proje_aciklama"].'</textarea>
              </div>
              <div class="form-group">
                <label for="inputStatus">Proje Durum</label>
                <select id="inputStatus" class="form-control custom-select" name="proje_durum">
                  <option selected disabled>';?>
                   <?php
                  if($proje_cek['proje_durum']==1){
                    echo '<option value="1" selected>Bekleyen Proje</option>
                    <option value="2">Tamamlanmış Proje</option>
                    <option value="3">Devam Eden Proje</option>
                    <option value="4">Tıkanmış Proje</option>';
                  }
                  else if ($proje_cek["proje_durum"]==2) {
                    echo '<option value="1">Bekleyen Proje</option>
                   <option value="2" selected>Tamamlanmış Proje</option>
                   <option value="3">Devam Eden Proje</option>
                   <option value="4">Tıkanmış Proje</option>';
                 }
                 else if ($proje_cek["proje_durum"]==3) {
                   echo '<option value="1">Bekleyen Proje</option>
                   <option value="2">Tamamlanmış Proje</option>
                   <option value="3" selected>Devam Eden Proje</option>
                   <option value="4">Tıkanmış Proje</option>';
                 }
                 else if ($proje_cek["proje_durum"]==4) {
                   echo '<option value="1">Bekleyen Proje</option>
                   <option value="2">Tamamlanmış Proje</option>
                   <option value="3">Devam Eden Proje</option>
                   <option value="4" selected>Tıkanmış Proje</option>';
                 }

                 ?>
                  <?php 
                  echo'</option>
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

              <div class="form-group">
                <label for="inputStatus">Proje Atayacağınız Kullanıcı</label>
                <select id="inputStatus" class="form-control custom-select" name="proje_kullanici">
                  <option selected value='.$proje_cek['proje_kullanici'].'>'.$proje_cek['proje_kullanici'].'</option>';?>
                  <?php 
                  $sorgu = $db->query("SELECT * FROM user");
                  while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option>".$cikti["user_name"]."</option>";
                  }
                  ?>

                <?php echo'</select>
              </div>
              <div class="form-group">
                  <label>Proje Başlangıç Tarihi:</label>
                    <div class="input-group" >
                        <input name="proje_baslangicTarih" type="text" class="form-control date-time" value="'.$proje_cek["proje_baslangicTarih"].'"/>
                        
                    </div>
                </div>
                <div class="form-group">
                  <label>Proje Bitiş Tarihi:</label>
                    <div class="input-group" >
                        <input name="proje_bitisTarih" type="text" class="form-control date-time" value="'.$proje_cek["proje_bitisTarih"].'"/>
                        
                    </div>
                </div>

              <h3>Proje Firma Bilgileri</h3>
              <div class="form-group">
                <label for="inputProjectLeader">Proje Firma adı</label>
                <input type="text" id="inputProjectLeader" class="form-control" name="proje_firmaadi" value="'.$proje_cek["proje_firmaadi"].'">
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Proje Firma Gsm</label>
                <input type="text" id="inputProjectLeader" class="form-control" name="proje_gsm" value="'.$proje_cek["proje_gsm"].'">
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Proje Firma E-Posta</label>
                <input type="text" id="inputProjectLeader" class="form-control" name="proje_eposta" value="'.$proje_cek["proje_eposta"].'">
              </div>
              <hr>
              <div class="form-group">
                <div class="callout callout-info">
                  <h5>Bilgilendirme</h5>

                  <p>Zaten hali hazırda olan bir müşterinize ait proje eklemek istiyorsanız aşağıdan müşterinizi seçebilirsiniz.</p>
                </div>
                <label>Var olan bir müşteriye proje ekle</label>
                <select class="form-control select2" style="width: 100%;">
                  <option selected disabled>Müşteri Seçiniz</option>';?>
                  <?php 
                  $sorgu = $db->query("SELECT * FROM musteri");
                  while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value=".$cikti["musteri_id"].">".$cikti["musteri_sirketadi"]."</option>";
                  }
                  ?>
                <?php echo '</select>
              </div>
            </div>
            <!-- /.card-body -->
          </div>

            ';

          }
          else {
           echo '<div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="fas fa-exclamation-triangle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Bu alanı görüntelemek için yetkiniz yok veya size atanmış bir görev değil.</span>
              </div>
              <!-- /.info-box-content -->
            </div>';
          }
          ?>
          <!-- /.card -->
        </div>
        
      </div>
      <div class="row">
        <div class="col-12">
          <input type="submit" value="Proje Ekle" class="btn btn-success float-left">
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