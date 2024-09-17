 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Görev Ekle</h1>
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


?>


<?php 
if ($_POST) {
  $gorev_projeadi = $_POST["gorev_projeadi"];
  $gorev_aciklama = $_POST["gorev_aciklama"];
  $gorev_kullanici = $_POST["gorev_kullanici"];
  $gorev_durum = $_POST["gorev_durum"];
  $gorev_firma = $_POST["gorev_firma"];
  $gorev_website = $_POST["gorev_website"];
  $gorev_tarih = date("d-m-Y");

   
  $ekle = $db->prepare("INSERT INTO gorev SET 
  gorev_projeadi = :gorev_projeadi,
  gorev_aciklama = :gorev_aciklama,
  gorev_kullanici = :gorev_kullanici,
  gorev_durum = :gorev_durum,
  gorev_firma = :gorev_firma,
  gorev_website = :gorev_website,
  gorev_tarih = :gorev_tarih,
  bildirim = 1
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
    echo '
<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h5><i class="icon fas fa-check"></i> Başarılı</h5>
Görev ekleme işlemini başarılı bir şekilde gerçekleştirdiniz.
</div>

    ';
  }
  else {
    echo "Eklenmedi.";
  }



 if ($_FILES["resim"]["size"]<1024*1024){//Dosya boyutu  aldık ve 1Mb'tan az olmasını söyledik. 
        if ($_FILES["resim"]){  //Dosya tipi aldık ve sadece jpeg olmasını söyledik.
   //Post ile gelen resimaciklamayı aciklama değişkenine atadık.
            $dosya_adi   =    $_FILES["resim"]["name"];  //Dsoya adını aldık.
 
            //Resimi kayıt ederken yeni bir isim oluşturalım
            $uret=array("cv","fg","th","lu","er");
            $uzanti=substr($dosya_adi,-4,4);
            $sayi_tut=rand(1,10000);
 
            $yeni_ad="dosyalar/".$uret[rand(0,4)].$sayi_tut.$uzanti;
 
            //Dosya yeni adıyla yuklenenresimler klasörüne kaydedilecek
 
            if (move_uploaded_file($_FILES["resim"]["tmp_name"],$yeni_ad)){
               // echo 'Dosya başarıyla yüklendi.';
 
                //Bilgileri veritabanına kayıt ediyoruz..
                $lastId = $db->lastInsertId();
                $sql = "INSERT INTO resim SET 
                res_ad=?,
                res_tur=?,
                res_kullanici=?,
                gorev_id=?
                 ";
                $stmt= $db->prepare($sql);
                $stmt->execute([
                  $yeni_ad,
                  $res_tur=1,
                  $gorev_kullanici,
                  $lastId
                ]);

            if($stmt){
                // echo 'Veritabanına kaydedildi.';
            }else{
                //  echo 'Kayıt sırasında bir sorun oluştu!';
            }
        }else{
            //  echo 'Dosya Yüklenemedi!';
        }
    }else{
        echo 'Dosya yalnızca jpeg formatında olabilir!';
    }
    }else{          
        echo 'Dosya boyutu 1 Mb ı geçmemeli!';
    }



}
?>
</div>

<?php 
if ($user_rol==1) {
  echo ' 

 <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Göre Ekle</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <form action="" method="post" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Görev Proje Adı</label>
                <input type="text" id="inputName" class="form-control" name="gorev_projeadi">
              </div>
              <div class="form-group">
                <label for="inputDescription">Görev Açıklama</label>
                <textarea id="inputDescription" class="form-control" rows="4" name="gorev_aciklama"></textarea>
              </div>
              <div class="form-group">
                <label for="inputStatus">Görev Durumu</label>
                <select id="inputStatus" class="form-control custom-select" name="gorev_durum">
                  <option selected disabled>Durumu Seçiniz</option>
                  <option value="1">Öncelikli(Acil)</option>
                  <option value="2">İkinci İş(Müssait Olduğunda)</option>
                  <option value="3">Ertelenebilir(İş Biriminden Sonra)</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputStatus">Görev Atayacağınız Kullanıcı</label>
                <select id="inputStatus" class="form-control custom-select" name="gorev_kullanici">
                  <option selected disabled>Kullanıcı Seçiniz</option>';?>
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
                <input type="text" id="inputClientCompany" class="form-control" name="gorev_firma">
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Firma İnternet Sitesi</label>
                <input type="text" id="inputProjectLeader" class="form-control" name="gorev_website">
              </div>

              <div class="form-group">
                    <label for="customFile">Görev Görseli Ekle</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile" name="resim">
                      <label class="custom-file-label" for="customFile">Dosya Seç</label>
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
          <input type="submit" value="Görev Ekle" class="btn btn-success float-left">
        </div>

      </div>
    </form>


  ';
}

else{

  echo'<div class="col-md-12">
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
       
<br><br><br><br>


  </section>









</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>