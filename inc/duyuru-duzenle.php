  <?php
 $duyuru_id = addslashes(strip_tags(trim($_GET["duyuru_id"])));
 if(!ctype_digit($duyuru_id)){
     header("location:?sayfa=guvenlik");
 }
 $duyuru_sor = $db->query("SELECT * FROM duyuru WHERE id=$duyuru_id");
 $duyuru_cek = $duyuru_sor->fetch(PDO::FETCH_ASSOC);
 $count = $duyuru_sor->rowCount();
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
if ($_POST) {
  $duyuru_baslik = $_POST["duyuru_baslik"];
  $duyuru_aciklama = $_POST["duyuru_aciklama"];
  $duyuru_bitistarih = $_POST["duyuru_bitistarih"];
  $duyuru_eklemetarih = date('Y-m-d');
  $newDate = date("Y-m-d", strtotime($duyuru_bitistarih));


  $ekle = $db->prepare("UPDATE duyuru SET 
  duyuru_baslik = :duyuru_baslik,
  duyuru_aciklama = :duyuru_aciklama,
  duyuru_bitistarih = :duyuru_bitistarih,
  duyuru_eklemetarih = :duyuru_eklemetarih WHERE id=$duyuru_id;
  ");
  $kontrol = $ekle->execute(
    array(
      "duyuru_baslik" => $duyuru_baslik,
      "duyuru_aciklama" => $duyuru_aciklama,
      "duyuru_bitistarih" => $newDate,
      "duyuru_eklemetarih" => $duyuru_eklemetarih

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
                <input type="text" id="inputName" class="form-control" name="duyuru_baslik" value="<?php echo $duyuru_cek["duyuru_baslik"];?>">
              </div>
              <div class="form-group">
                <label for="inputDescription">Duyuru Açıklama</label>
                <textarea id="inputDescription" class="form-control" rows="4" name="duyuru_aciklama"><?php echo $duyuru_cek["duyuru_aciklama"];?></textarea>
              </div>
              <div class="form-group">
                <label>Duyuru Bitiş Tarihi:</label>
                <div class="input-group" >
                  <input name="duyuru_bitistarih" type="text" class="form-control date-time" required=""value="<?php echo $duyuru_cek["duyuru_bitistarih"];?>"/>
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
          <input type="submit" value="Duyuru Güncelle" class="btn btn-success float-left">
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