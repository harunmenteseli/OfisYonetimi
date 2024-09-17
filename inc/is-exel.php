<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>İş Listele</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li class="breadcrumb-item active">Duyuru Lislete</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">

     <?php
     $is_tarih = $_POST["is_tarih"];
     $tarih=date("Y-m-d",strtotime($is_tarih));
     $is_kullanici = $_POST["is_kullanici"];
     if (empty($is_kullanici)) {
        $sorgu = $db->query("SELECT * FROM istakip WHERE baslangic_saat LIKE '%$tarih%' AND is_kullanici='$username'");
     }
     else {
      $sorgu = $db->query("SELECT * FROM istakip WHERE baslangic_saat LIKE '%$tarih%' AND is_kullanici='$is_kullanici'");
     }



     ?>
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Dışa aktarma</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>İş Adı</th>
                    <th>İş Açıklama</th>
                    <th>İş Başlangıç Tarihi</th>
                    <th>İş Bitiş Tarihi</th>
                  </tr>
                  </thead>
                  <tbody>

                    <?php
                     while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) { 
                      echo '

                      <tr>
                      <td>'.$cikti["is_adi"].'</td>
                      <td>'.$cikti["is_aciklama"].'</td>
                      <td>'.$cikti["baslangic_saat"].'</td>
                      <td>';?>
                      <?php 
                      if ($cikti["bitis_saat"]=="") {
                        echo 'Devam Ediyor';
                      }
                      else{
                        echo $cikti["bitis_saat"];
                      }
                      ?>
                      <?php echo'</td>
                      </tr>
                      ';
                    }

                    ?>
                  
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>



    </section>

  </div>