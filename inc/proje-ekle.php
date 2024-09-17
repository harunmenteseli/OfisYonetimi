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
            @$musteri_id=$_POST["musteri_id"];



            if (empty($proje_adi) || empty($proje_durum)) {
              echo '<div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h5><i class="icon fas fa-ban"></i> Oppss!</h5>
              Proje adı ve proje durum kısmı zorunlu alandır.Boş bırakmayınız.
              </div>';
            }
            
            
            else {
             if(strtotime($proje_baslangicTarih) > strtotime($proje_bitisTarih)){
              echo '<div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h5><i class="icon fas fa-ban"></i> Oppss!</h5>
              Proje bitiş tarihi başlangıç tarihinden küçük olamaz
              </div>';
            }

            else{
             $ekle = $db->prepare("INSERT INTO proje SET 
              proje_adi = :proje_adi,
              proje_aciklama = :proje_aciklama,
              proje_kullanici = :proje_kullanici,
              proje_durum = :proje_durum,
              proje_baslangicTarih = :proje_baslangicTarih,
              proje_bitisTarih = :proje_bitisTarih,
              proje_gsm = :proje_gsm,
              proje_firmaadi = :proje_firmaadi,
              proje_eposta = :proje_eposta,
              musteri_id = :musteri_id
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
                "proje_eposta" => $proje_eposta,
                "musteri_id" => $musteri_id,
              ));
             if ($kontrol) {
              echo '
              <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h5><i class="icon fas fa-check"></i> Başarılı</h5>
              Proje ekleme işlemini başarılı bir şekilde gerçekleştirdiniz.
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
    </div>
    <div class="card card-primary">


      <?php 
      if($user_rol==1){
        echo '          <div class="card-header">
        <h3 class="card-title">Proje Ekle</h3>

        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
        </button>
        </div>
        </div><form action="" method="post">
        <div class="card-body">
        <div class="form-group">
        <label for="inputName">Proje Adı</label>
        <input type="text" id="inputName" class="form-control" name="proje_adi">
        </div>
        <div class="form-group">
        <label for="inputDescription">Proje Açıklama</label>
        <textarea id="inputDescription" class="form-control" rows="4" name="proje_aciklama"></textarea>
        </div>
        <div class="form-group">
        <label for="inputStatus">Proje Durum</label>
        <select id="inputStatus" class="form-control custom-select" name="proje_durum">
        <option selected disabled>Durumu Seçiniz</option>
        <option value="1">Bekleyen Proje</option>
        <option value="3">Devam Eden Proje</option>
        <option value="4">Tıkanmış Proje</option>
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
        <label for="inputStatus">Proje Kullanıcısı</label>
        <select class="select2" multiple="multiple" data-placeholder="Projeyi Atayacağınız Kullanıcıyı Seçiniz" style="width: 100%;" name="proje_kullanici">';?>
        <?php
        if ($user_rol==1) {
          $sorgu = $db->query("SELECT * FROM user");
          while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) {
            echo "<option>".$cikti["user_name"]."</option>";
          }
        }
        else{
          $sorgu = $db->query("SELECT * FROM user WHERE user_role=2");
          while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) {
            echo "<option>".$cikti["user_name"]."</option>";
          }
        }
        
        ?>
        <?php echo '</select>
        </div>
        <div class="form-group">
        <label>Proje Başlangıç Tarihi:</label>
        <div class="input-group" >
        <input name="proje_baslangicTarih" type="text" class="form-control date-time" />
        
        </div>
        </div>
        <div class="form-group">
        <label>Proje Bitiş Tarihi:</label>
        <div class="input-group" >
        <input name="proje_bitisTarih" type="text" class="form-control date-time" />
        
        </div>
        </div>

        <h3>Proje Firma Bilgileri</h3>
        <div class="form-group">
        <label for="inputProjectLeader">Proje Firma adı</label>
        <input type="text" id="inputProjectLeader" class="form-control" name="proje_firmaadi">
        </div>
        <div class="form-group">
        <label for="inputProjectLeader">Proje Firma Gsm</label>
        <input type="text" id="inputProjectLeader" class="form-control" name="proje_gsm">
        </div>
        <div class="form-group">
        <label for="inputProjectLeader">Proje Firma E-Posta</label>
        <input type="text" id="inputProjectLeader" class="form-control" name="proje_eposta">
        </div>
        <hr>
        <div class="form-group">
        <div class="callout callout-info">
        <h5>Bilgilendirme</h5>

        <p>Zaten hali hazırda olan bir müşterinize ait proje eklemek istiyorsanız aşağıdan müşterinizi seçebilirsiniz.</p>
        </div>
        <label>Var olan bir müşteriye proje ekle</label>
        <select class="form-control select2" style="width: 100%;" name="musteri_id">
        <option selected disabled>Müşteri Seçiniz</option>';?>
        <?php 
        $sorgu = $db->query("SELECT * FROM musteri");
        while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) {
          echo "<option value=".$cikti["musteri_id"].">".$cikti["musteri_sirketadi"]."</option>";
        }
        echo'
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
        <input type="submit" value="Proje Ekle" class="btn btn-success float-left">
        </div>

        </div>
        </form>';
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