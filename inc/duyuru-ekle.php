 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Duyuru Ekle</h1>
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

  <?php 

if($user_rol==1){

echo '     <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Duyuru Ekle</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <form action="" method="post">
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Duyuru Başlık</label>
                <input type="text" id="inputName" class="form-control" name="duyuru_baslik">
              </div>
              <div class="form-group">
                <label for="inputDescription">Duyuru Açıklama</label>
                <textarea id="inputDescription" class="form-control" rows="4" name="duyuru_aciklama"></textarea>
              </div>
              <div class="form-group">
                <label>Duyuru Bitiş Tarihi:</label>
                <div class="input-group" >
                  <input name="duyuru_bitistarih" type="text" class="form-control date-time" required=""/>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
      <div class="row">
        <div class="col-12">
          <input type="submit" value="Duyuru Ekle" class="btn btn-success float-left">
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
<?php 
if ($_POST) {
  $duyuru_baslik = $_POST["duyuru_baslik"];
  $duyuru_aciklama = $_POST["duyuru_aciklama"];
  $duyuru_bitistarih = $_POST["duyuru_bitistarih"];
  $duyuru_eklemetarih = date('Y-m-d');
  $newDate = date("Y-m-d", strtotime($duyuru_bitistarih));


  $ekle = $db->prepare("INSERT INTO duyuru SET 
  duyuru_baslik = :duyuru_baslik,
  duyuru_aciklama = :duyuru_aciklama,
  duyuru_bitistarih = :duyuru_bitistarih,
  duyuru_eklemetarih = :duyuru_eklemetarih
  ");
  $kontrol = $ekle->execute(
    array(
      "duyuru_baslik" => $duyuru_baslik,
      "duyuru_aciklama" => $duyuru_aciklama,
      "duyuru_bitistarih" => $newDate,
      "duyuru_eklemetarih" => $duyuru_eklemetarih

    ));
  if ($kontrol) {
    echo '
<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h5><i class="icon fas fa-check"></i> Başarılı</h5>
Duyuru ekleme işlemini başarılı bir şekilde gerçekleştirdiniz.
</div>

    ';
  }
  else {
    echo "Eklenmedi.";
  }

}
?>
</div>
   

  </section>









</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
