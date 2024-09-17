 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Üye Listele</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
            <li class="breadcrumb-item active">Üye Listele</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
            
            <?php 
                  $sorgu = $db->query("SELECT * FROM user");
                  while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                    echo'

          <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  '.$cikti["user_name"].'
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>'.$cikti["user_adsoyad"].'</b></h2>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>';

                        if($user_rol==1){
                          echo $cikti["user_adres"];
                        }
                        else{
                          echo '<span class="text text-warning" style="backgorund-color:#fff;">Adres bilgisine erişmek için yetkiniz bulunmamaktadır.</span>';

                        }

                        ?>
                        <?php 
                        echo'</li><br>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>';?>
                        <?php 
                        if ($user_rol==1) {
                          echo'<a href="tel:'.$cikti["user_telefon"].'" style="color:#adb5bd;">'.$cikti["user_telefon"].'</a>';
                        }
                        else{
                          echo '<a href="" style="color:#adb5bd;"> *(***) *** ** ** </a>';
                        }


                        echo' </li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span><a href="mailto:'.$cikti["user_mail"].'" style="color:#adb5bd;">'.$cikti["user_mail"].'</a></li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="';?> 
                      <?php 
                      if($cikti["cinsiyet"]=='erkek'){
                        echo "img/erkek.png";
                      }
                      else{
                        echo "img/kadin.png";
                      }
                      ?> 
                      <?php echo'" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>';?>

                <?php 

                if($user_rol==1){
                  echo'                <div class="card-footer">
                  <div class="text-right">
                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-secondary'.$cikti["user_id"].'">
                      <i class="fas fa-eye"></i> Görüntüle
                    </a>
                    <a href="?sayfa=uye-duzenle&id='.$cikti["user_id"].'" class="btn btn-info btn-sm">
                      <i class="fas fa-eye"></i> Düzenle
                    </a>
                    <a href="?sayfa=sil&url=uye_sil&id='.$cikti["user_id"].'" class="btn btn-danger btn-sm">
                      <i class="fas fa-eye"></i> Sil
                    </a>
                  </div>
                </div>';

                }


              echo'</div>
            </div>

            <div class="modal fade" id="modal-secondary'.$cikti["user_id"].'">
                  <div class="modal-dialog">
                    <div class="modal-content bg-secondary">
                      <div class="modal-header">
                        <h4 class="modal-title">Kullanıcı Bilgileri</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                      <div class="callout callout-info">
                      <h5>Kullanıcı Adı: '.$cikti["user_name"].'</h5>
                      <hr>
                      Kullanıcı Ad soyad: '.$cikti["user_adsoyad"].'<br>
                      Kullanıcı Mail: '.$cikti["user_mail"].'<br>
                      Kullanıcı Telefon: '.$cikti["user_telefon"].'<br>
                      Kullanıcı Adres: '.$cikti["user_adres"].'<br>
                      Kullanıcı İşe Başlangıç Tarihi: '.$cikti["user_baslangicTarih"].'<br>
                      Kullanıcı Doğum Tarihi: '.$cikti["user_dogumTarih"].'<br>
                      </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Kapat</button>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>

                    ';
                  }
                  ?>
            
        </div>
        <!-- /.card-body -->
        <!-- <div class="card-footer">
          <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
              <li class="page-item"><a class="page-link" href="#">6</a></li>
              <li class="page-item"><a class="page-link" href="#">7</a></li>
              <li class="page-item"><a class="page-link" href="#">8</a></li>
            </ul>
          </nav>
        </div> -->
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

    </section>

  </div>