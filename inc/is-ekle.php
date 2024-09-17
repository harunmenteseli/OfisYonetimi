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
  $baslangic_saat = date("Y-m-d H:i:s");  
  $bitis_saat = $_POST["bitis_saat"];
  $is_kullanici = $username;
  $is_durum = 0;


  $ekle = $db->prepare("INSERT INTO istakip SET 
  is_adi = :is_adi,
  is_aciklama = :is_aciklama,
  baslangic_saat = :baslangic_saat,
  bitis_saat = :bitis_saat,
  is_kullanici = :is_kullanici,
  is_durum = :is_durum
  ");
  $kontrol = $ekle->execute(
    array(
      "is_adi" => $is_adi,
      "is_aciklama" => $is_aciklama,
      "baslangic_saat" => $baslangic_saat,
      "bitis_saat" => $bitis_saat,
      "is_kullanici" => $is_kullanici,
      "is_durum" => $is_durum
    ));
  if ($kontrol) {
    echo '
<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h5><i class="icon fas fa-check"></i> Başarılı</h5>
İş başlangıçı başarılı bir şekilde oluşturulmuştur.
</div>

    ';
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
                <input type="text" id="inputName" class="form-control" name="is_adi">
              </div>
              <div class="form-group">
                <label for="inputDescription">İş Açıklama</label>
                <textarea id="inputDescription" class="form-control" rows="4" name="is_aciklama"></textarea>
              </div>
                    <div class="form-group">
                <input type="submit" value="Başla" class="btn btn-success float-left">
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