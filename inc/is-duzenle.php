   <?php
 $is_id = addslashes(strip_tags(trim($_GET["is_id"])));
 if(!ctype_digit($is_id)){
     header("location:?sayfa=guvenlik");
 }
 $is_sor = $db->query("SELECT * FROM istakip WHERE id=$is_id");
 $is_cek = $is_sor->fetch(PDO::FETCH_ASSOC);
 $count = $is_sor->rowCount();
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
          <h1 class="m-0">İş Ekle</h1>
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
  $is_adi = $_POST["is_adi"];
  $is_aciklama = $_POST["is_aciklama"];
  $bitis_saat = date("Y-m-d H:i:s");  
  $is_kullanici = $username;
  $is_durum = 1;

   $ekle = $db->prepare("UPDATE istakip SET 
  is_adi = :is_adi,
  is_aciklama = :is_aciklama,
  is_kullanici = :is_kullanici,
  is_durum = :is_durum WHERE id=$is_id
  ");
  $kontrol = $ekle->execute(
    array(
      "is_adi" => $is_adi,
      "is_aciklama" => $is_aciklama,
      "is_kullanici" => $is_kullanici,
      "is_durum" => $is_durum
    ));
  if ($kontrol) {
    echo '
<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h5><i class="icon fas fa-check"></i> Başarılı</h5>
Güncelleme işlemi başarılı bir şekilde yapılmıştır.
</div>

    ';
    header("Refresh:3");
  }
  else {
    echo "Eklenmedi.";
  }

   

}
?>
</div>
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">İş Ekle</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <form action="" method="post">
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">İş Adı</label>
                <input type="text" id="inputName" class="form-control" name="is_adi" value="<?php echo $is_cek["is_adi"];?>">
              </div>
              <div class="form-group">
                <label for="inputDescription">İş Açıklama</label>
                <textarea id="inputDescription" class="form-control" rows="4" name="is_aciklama"><?php echo $is_cek["is_aciklama"];?></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Güncelle" class="btn btn-success float-left">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
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