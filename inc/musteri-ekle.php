 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Müşteri Ekle</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
            <li class="breadcrumb-item active">Müşteri Ekle</li>
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
  @$musteri_adsoyad = $_POST["musteri_adsoyad"];
  @$musteri_sirketadi = $_POST["musteri_sirketadi"];
  @$musteri_unvan = $_POST["musteri_unvan"];
  @$musteri_sektor = $_POST["musteri_sektor"];
  @$musteri_gsm = $_POST["musteri_gsm"];
  @$musteri_sabithat = $_POST["musteri_sabithat"];
  @$musteri_eposta = $_POST["musteri_eposta"];
  @$musteri_aciklama = $_POST["musteri_aciklama"];
  @$musteri_internetsitesi = $_POST["musteri_internetsitesi"];
  @$musteri_il= $_POST["musteri_il"];
  @$musteri_ilce= $_POST["musteri_ilce"];
  @$musteri_adres= $_POST["musteri_adres"];
  @$musteri_durum= $_POST["musteri_durum"];
  @$musteri_kullanici= $_POST["musteri_kullanici"];
  @$musteri_tarih= $_POST["musteri_tarih"];


  if (empty($musteri_adsoyad)) {
    echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Oppss!</h5>
                  Müşeteri adı kısmı zorunlu alandır.Boş bırakmayınız.
                </div>';
  }
 
  
  else {
     $ekle = $db->prepare("INSERT INTO musteri SET 
  musteri_adsoyad = :musteri_adsoyad,
  musteri_sirketadi = :musteri_sirketadi,
  musteri_unvan = :musteri_unvan,
  musteri_sektor = :musteri_sektor,
  musteri_gsm = :musteri_gsm,
  musteri_sabithat = :musteri_sabithat,
  musteri_eposta = :musteri_eposta,
  musteri_aciklama = :musteri_aciklama,
  musteri_internetsitesi = :musteri_internetsitesi,
  musteri_il = :musteri_il,
  musteri_ilce = :musteri_ilce,
  musteri_adres = :musteri_adres,
  musteri_durum = :musteri_durum,
  musteri_kullanici = :musteri_kullanici,
  musteri_tarih = :musteri_tarih
  ");
  $kontrol = $ekle->execute(
    array(
      "musteri_adsoyad" => $musteri_adsoyad,
      "musteri_sirketadi" => $musteri_sirketadi,
      "musteri_unvan" => $musteri_unvan,
      "musteri_sektor" => $musteri_sektor,
      "musteri_gsm" => $musteri_gsm,
      "musteri_sabithat" => $musteri_sabithat,
      "musteri_eposta" => $musteri_eposta,
      "musteri_aciklama" => $musteri_aciklama,
      "musteri_internetsitesi" => $musteri_internetsitesi,
      "musteri_il" => $musteri_il,
      "musteri_ilce" => $musteri_ilce,
      "musteri_adres" => $musteri_adres,
      "musteri_durum" => $musteri_durum,
      "musteri_kullanici" => $musteri_kullanici,
      "musteri_tarih" => $musteri_tarih,
    ));
  if ($kontrol) {
    echo '
<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h5><i class="icon fas fa-check"></i> Başarılı</h5>
Müşteri ekleme işlemini başarılı bir şekilde gerçekleştirdiniz.
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
?>
</div>
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Müşteri Ekle</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <form action="" method="post">
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Müşteri Adı Soyadı</label>
                <input type="text" id="inputName" class="form-control" name="musteri_adsoyad">
              </div>
               <div class="form-group">
                <label for="inputName">Müşteri Şirket Adı</label>
                <input type="text" id="inputName" class="form-control" name="musteri_sirketadi">
              </div>
              <div class="form-group">
                <label for="inputName">Müşteri Ünvanı</label>
                <input type="text" id="inputName" class="form-control" name="musteri_unvan">
              </div>
              <div class="form-group">
                <label for="inputName">Müşteri Sektörü</label>
                <input type="text" id="inputName" class="form-control" name="musteri_sektor">
              </div>
               <div class="form-group">
                <label for="inputName">Müşteri Gsm</label>
                <input type="text" id="inputName" class="form-control" name="musteri_gsm">
              </div>
              <div class="form-group">
                <label for="inputName">Müşteri Sabit Hat</label>
                <input type="text" id="inputName" class="form-control" name="musteri_sabithat">
              </div>
              <div class="form-group">
                <label for="inputName">Müşteri E-posta</label>
                <input type="text" id="inputName" class="form-control" name="musteri_eposta">
              </div>
              <div class="form-group">
                <label for="inputName">Müşteri İnternet Sitesi</label>
                <input type="text" id="inputName" class="form-control" name="musteri_internetsitesi">
              </div>
              <div class="form-group">
                <label for="inputDescription">Müşteri Açıklama</label>
                <textarea id="inputDescription" class="form-control" rows="4" name="musteri_aciklama"></textarea>
              </div>
              <div class="form-group">
                <label for="inputStatus">İl Seçiniz</label>
                <select id="il" class="form-control custom-select" name="musteri_il">
                  <option selected disabled>İl Seçiniz</option>
                </select>
              </div>
               <div class="form-group">
                <label for="inputStatus">İlçe Seçiniz</label>
                <select id="ice" class="form-control custom-select" name="musteri_ilce">
                  <option selected disabled>İlçe Seçiniz</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputDescription">Müşteri Adres</label>
                <textarea id="inputDescription" class="form-control" rows="4" name="musteri_adres"></textarea>
              </div>
              <div class="form-group">
                <label for="inputStatus">Müşteri Durum</label>
                <select id="inputStatus" class="form-control custom-select" name="musteri_durum">
                  <option selected disabled>Durumu Seçiniz</option>
                  <option value="1">Aktif Müşteri</option>
                  <option value="2">Sonra Görüşülecek</option>
                  <option value="3">Tekrar Aranacak</option>
                  <option value="3">Ödeme Bekleniyor</option>
                  <option value="4">Takipli Müşteri</option>
                  <option value="5">İptal Müşteri</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputStatus">Müşteri İle İrtibat Sağlayan</label>
                <select id="inputStatus" class="form-control custom-select" name="musteri_kullanici">
                  <option selected disabled>Müşteri Atanan Kullanıcıyı Seçiniz</option>
                  <?php 
                  $sorgu = $db->query("SELECT * FROM user");
                  while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option>".$cikti["user_name"]."</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                  <label>Müşteri Tarihi:</label>
                    <div class="input-group" >
                        <input name="musteri_tarih" type="text" class="form-control date-time" />
                        
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