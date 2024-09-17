 <?php
 $gorev_id = addslashes(strip_tags(trim($_GET["gorev_id"])));
 if(!ctype_digit($gorev_id)){
     header("location:?sayfa=guvenlik");
 }
 $gorev_sor = $db->query("SELECT * FROM gorev WHERE id=$gorev_id");
 $gorev_cek = $gorev_sor->fetch(PDO::FETCH_ASSOC);

  $count = $gorev_sor->rowCount();
 if ($count==0) {
      header("location:?sayfa=guvenlik");
 }

 $resim_sor = $db->query("SELECT * FROM resim WHERE gorev_id=$gorev_id");
 $resim_cek = $resim_sor->fetch(PDO::FETCH_ASSOC);
 ?>



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Görev Düzenle</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
            <li class="breadcrumb-item active">Ön izleme</li>
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
                 <div class="card-body">
<?php 
if ($_POST) {
  @$gorev_projeadi = $_POST["gorev_projeadi"];
  @$gorev_aciklama = $_POST["gorev_aciklama"];
  @$gorev_kullanici = $_POST["gorev_kullanici"];
  @$gorev_durum = $_POST["gorev_durum"];
  @$gorev_firma = $_POST["gorev_firma"];
  @$gorev_website = $_POST["gorev_website"];
  @$gorev_tarih = date("d-m-Y");


  $ekle = $db->prepare("UPDATE gorev SET 
  gorev_projeadi = :gorev_projeadi,
  gorev_aciklama = :gorev_aciklama,
  gorev_kullanici = :gorev_kullanici,
  gorev_durum = :gorev_durum,
  gorev_firma = :gorev_firma,
  gorev_website = :gorev_website,
  gorev_tarih = :gorev_tarih WHERE id=$gorev_id
  ");
  $kontrol = $ekle->execute(
    array(
      "gorev_projeadi" => $gorev_projeadi,
      "gorev_aciklama" => $gorev_aciklama,
      "gorev_kullanici" => $gorev_kullanici,
      "gorev_durum" => $gorev_durum,
      "gorev_firma" => $gorev_firma,
      "gorev_website" => $gorev_website,
      "gorev_tarih" => $gorev_tarih
    ));
  if ($kontrol) {
   header("Refresh: 0;");
  }
  else {
    echo "Eklenmedi.";
  }

}
?>
</div>

        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Görev Düzenle</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>

          <?php 

if(@$username==@$gorev_cek["gorev_kullanici"]) {
echo '<form action="" method="post">
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Görev Proje Adı</label>
                <input type="text" id="inputName" class="form-control" name="gorev_projeadi" value="'.$gorev_cek['gorev_projeadi'].'">
              </div>
              <div class="form-group">
                <label for="inputDescription">Görev Açıklama</label>
                <textarea id="inputDescription" class="form-control" rows="4" name="gorev_aciklama">'.$gorev_cek['gorev_aciklama'].'</textarea>
              </div>
              <div class="form-group">
                <label for="inputStatus">Görev Durumu</label>
                <select id="inputStatus" class="form-control custom-select" name="gorev_durum">';?>
                  <?php
                   if($gorev_cek['gorev_durum']==1){
                    echo '
                    <option selected value="1">Öncelikli(Acil)</option>
                    <option value="2">İkinci İş(Müsait Olduğunda)</option>
                    <option value="3">Ertelenebilir(İş Bitiminden Sonra)</option>
                    <option value="4">Tamamlanmış Görev</option>
                    ';
                   }
                   else if ($gorev_cek['gorev_durum']==2) {
                     echo '
                     <option value="1">Öncelikli(Acil)</option>
                     <option selected value="2">İkinci İş(Müsait Olduğunda)</option>
                     <option value="3">Ertelenebilir(İş Bitiminden Sonra)</option>
                     <option value="4">Tamamlanmış Görev</option>

                     ';
                   }
                   else if ($gorev_cek['gorev_durum']==3) {
                     echo '
                     <option value="1">Öncelikli(Acil)</option>
                     <option value="2">İkinci İş(Müsait Olduğunda)</option>
                     <option selected value="3">Ertelenebilir(İş Bitiminden Sonra)</option>
                     <option value="4">Tamamlanmış Görev</option>
                     ';
                   }
                   else if ($gorev_cek['gorev_durum']==4) {
                    echo '
                     <option value="1">Öncelikli(Acil)</option>
                     <option value="2">İkinci İş(Müsait Olduğunda)</option>
                     <option value="3">Ertelenebilir(İş Bitiminden Sonra)</option>
                     <option selected value="4">Tamamlanmış Görev</option>
                     ';
                   }

                  ?>
                    
                    
                  <?php echo'
              
                </select>
              </div>
              <div class="form-group">
                <label for="inputStatus">Görev Atayacağınız Kullanıcı</label>
                <select id="inputStatus" class="form-control custom-select" name="gorev_kullanici">
                  <option selected value='.$gorev_cek['gorev_kullanici'].'>'.$gorev_cek['gorev_kullanici'].'</option>';?>
                  <?php 
                  $sorgu = $db->query("SELECT * FROM user");
                  while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option>".$cikti["user_name"]."</option>";
                  }
                  ?>

                <?php echo'</select>
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Firma</label>
                <input type="text" id="inputClientCompany" class="form-control" name="gorev_firma" value="'.$gorev_cek['gorev_firma'].'">
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Firma İnternet Sitesi</label>
                <input type="text" id="inputProjectLeader" class="form-control" name="gorev_website" value="'.$gorev_cek['gorev_website'].'">
              </div>

            </div>
            
            <div class="filtr-item col-sm-12" data-category="2, 4" data-sort="black sample" style="opacity: 1; transform: scale(1) translate3d(0px, 0px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; width: 100%; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
            <a href="'.$resim_cek['res_ad'].'" data-toggle="lightbox" data-title="'.$gorev_cek['gorev_projeadi'].'">
            <img src="'.$resim_cek['res_ad'].'" class="img-fluid mb-2" alt="">
            </a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
      <div class="row">
        <div class="col-12">
          <input type="submit" value="Güncelle" class="btn btn-success float-left">
        </div>

      </div>
    </form> ';
}
else if($user_rol==1){
  echo '<form action="" method="post">
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Görev Proje Adı</label>
                <input type="text" id="inputName" class="form-control" name="gorev_projeadi" value="'.$gorev_cek['gorev_projeadi'].'">
              </div>
              <div class="form-group">
                <label for="inputDescription">Görev Açıklama</label>
                <textarea id="inputDescription" class="form-control" rows="4" name="gorev_aciklama">'.$gorev_cek['gorev_aciklama'].'</textarea>
              </div>
              <div class="form-group">
                <label for="inputStatus">Görev Durumu</label>
                <select id="inputStatus" class="form-control custom-select" name="gorev_durum">';?>
                   <?php
                   if($gorev_cek['gorev_durum']==1){
                    echo '
                    <option selected value="1">Öncelikli(Acil)</option>
                    <option value="2">İkinci İş(Müsait Olduğunda)</option>
                    <option value="3">Ertelenebilir(İş Bitiminden Sonra)</option>
                    <option value="4">Tamamlanmış Görev</option>
                    ';
                   }
                   else if ($gorev_cek['gorev_durum']==2) {
                     echo '
                     <option value="1">Öncelikli(Acil)</option>
                     <option selected value="2">İkinci İş(Müsait Olduğunda)</option>
                     <option value="3">Ertelenebilir(İş Bitiminden Sonra)</option>
                     <option value="4">Tamamlanmış Görev</option>

                     ';
                   }
                   else if ($gorev_cek['gorev_durum']==3) {
                     echo '
                     <option value="1">Öncelikli(Acil)</option>
                     <option value="2">İkinci İş(Müsait Olduğunda)</option>
                     <option selected value="3">Ertelenebilir(İş Bitiminden Sonra)</option>
                     <option value="4">Tamamlanmış Görev</option>
                     ';
                   }
                   else if ($gorev_cek['gorev_durum']==4) {
                    echo '
                     <option value="1">Öncelikli(Acil)</option>
                     <option value="2">İkinci İş(Müsait Olduğunda)</option>
                     <option value="3">Ertelenebilir(İş Bitiminden Sonra)</option>
                     <option selected value="4">Tamamlanmış Görev</option>
                     ';
                   }

                  ?>
                    
                  <?php echo'

                </select>
              </div>
              <div class="form-group">
                <label for="inputStatus">Görev Atayacağınız Kullanıcı</label>
                <select id="inputStatus" class="form-control custom-select" name="gorev_kullanici">
                  <option selected value='.$gorev_cek['gorev_kullanici'].'>'.$gorev_cek['gorev_kullanici'].'</option>';?>
                  <?php 
                  $sorgu = $db->query("SELECT * FROM user");
                  while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option>".$cikti["user_name"]."</option>";
                  }
                  ?>

                <?php echo'</select>
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Firma</label>
                <input type="text" id="inputClientCompany" class="form-control" name="gorev_firma" value="'.$gorev_cek['gorev_firma'].'">
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Firma İnternet Sitesi</label>
                <input type="text" id="inputProjectLeader" class="form-control" name="gorev_website" value="'.$gorev_cek['gorev_website'].'">
              </div>
            </div>
                    <div class="filtr-item col-sm-12" data-category="2, 4" data-sort="black sample" style="opacity: 1; transform: scale(1) translate3d(0px, 0px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; width: 100%; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
            <a href="'.$resim_cek['res_ad'].'" data-toggle="lightbox" data-title="'.$gorev_cek['gorev_projeadi'].'">
            <img src="'.$resim_cek['res_ad'].'" class="img-fluid mb-2" alt="">
            </a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
      <div class="row">
        <div class="col-12">
          <input type="submit" value="Güncelle" class="btn btn-success float-left">
        </div>

      </div>
    </form>';



}
else{
  echo '<div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="fas fa-exclamation-triangle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Bu alanı görüntelemek için yetkiniz yok veya size atanmış bir görev değil.</span>
              </div>
              <!-- /.info-box-content -->
            </div>';
}

?>
          
<br><br><br><br>


  </section>









</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>