<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Proje Listele</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
            <li class="breadcrumb-item active">Proje Lislete</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <?php 
    $gorev=$db->prepare("SELECT COUNT(*) from proje WHERE proje_kullanici='$username'");
        $gorev->execute();
        $say = $gorev->fetchColumn();
        if($say<1){
          if ($user_rol!=1) {
            
          echo '
    <div class="col-md-12">
      <div class="info-box mb-3 bg-info">
        <span class="info-box-icon"><i class="fas fa-edit"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Size atanmış herhangi bir proje bulunmamaktadır.</span>
          <span class="info-box-number"><a href="?sayfa=main" style="color:#fff;">Anasayfaya Dön.<a/></span>
          </div>
          <!-- /.info-box-content -->
        </div>
      </div>';
          }
        }
?>



    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Proje Listesi</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped projects">
          <thead>
            <tr>
              <th style="width: 1%">
                #
              </th>
              <th style="width: 20%">
                Proje Proje Adı
              </th>
              <th style="width: 30%">
                Proje Kullanıcısı
              </th>

              <th style="width: 20%" class="text-center">
                Proje Durumu
              </th>
              <th style="width: 50%">
              </th>
            </tr>
          </thead>
          <tbody>

            <?php 
            if($user_rol==1){
              $sorgu = $db->query("SELECT * FROM proje");
              while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                echo '
                <tr>
                <td>
                          #
                </td>
                <td>
                <a>
                '.$cikti["proje_adi"].'
                </a>
                </td>
                <td>
                <ul class="list-inline">
                <li class="list-inline-item">
                '.$cikti["proje_kullanici"].'
                </li>
                </ul>
                </td>
                <td class="project-state">';
                if($cikti["proje_durum"]==1){
                  echo '<span class="badge badge-info ">Bekleyen Proje</span>';
                }
                else if($cikti["proje_durum"]==2){
                  echo '<span class="badge badge-success">Tamamlanan Proje</span>';
                }
                else if($cikti["proje_durum"]==3){
                  echo '<span class="badge badge-warning">Devam Eden Proje</span>';
                }
                else if($cikti["proje_durum"]==4){
                  echo '<span class="badge badge-danger">Tıkanmış Proje</span>';
                }
                echo'
                </td>
                <td class="project-actions text-right">
                <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#modal-secondary'.$cikti["id"].'">
                <i class="fas fa-folder">
                </i>
                Göster
                </a>
                <a class="btn btn-info btn-sm" href="?sayfa=proje_duzenle&proje_id='.$cikti["id"].'">
                <i class="fas fa-pencil-alt">
                </i>
                Düzenle
                </a>
                <a class="btn btn-danger btn-sm" href="?sayfa=sil&url=proje_sil&id='.$cikti["id"].'" onclick="return confirmDelete(this);">
                <i class="fas fa-trash">
                </i>
                Sil
                </a>
                </td>
                </tr>
                <div class="modal fade" id="modal-secondary'.$cikti["id"].'">
                <div class="modal-dialog">
                <div class="modal-content bg-secondary">
                <div class="modal-header">
                <h4 class="modal-title">Proje</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">

                <div class="callout callout-info">
                <h5>Proje Adı: '.$cikti["proje_adi"].'</h5>
                <hr>
                <span class="badge badge-primary">Proje Adı:</span> '.$cikti["proje_firmaadi"].'<br>
                <span class="badge badge-primary">Proje Telefon:</span> '.$cikti["proje_gsm"].'<br>
                <span class="badge badge-primary">Proje E-Posta:</span> '.$cikti["proje_eposta"].'<br>
                <span class="badge badge-primary">Proje Açıklama:</span> '.$cikti["proje_aciklama"].'<br>
                <span class="badge badge-primary">Proje Kullanıcı:</span> '.$cikti["proje_kullanici"].'<br>
                <span class="badge badge-primary">Proje Durum:</span>';
                if($cikti["proje_durum"]==1){
                  echo '<span class="badge badge-info ">Bekleyen Proje</span>';
                }
                else if($cikti["proje_durum"]==2){
                  echo '<span class="badge badge-success">Tamamlanan Proje</span>';
                }
                else if($cikti["proje_durum"]==3){
                  echo '<span class="badge badge-warning">Devam Eden Proje</span>';
                }
                else if($cikti["proje_durum"]==4){
                  echo '<span class="badge badge-danger">Tıkanmış Proje</span>';
                }
                echo'<br>
                <span class="badge badge-primary">Proje Firma:</span> '.$cikti["proje_baslangicTarih"].'<br>
                <span class="badge badge-primary">Proje Website:</span> '.$cikti["proje_bitisTarih"].'<br>
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
            }
            else {
              $sorgu = $db->query("SELECT * FROM proje WHERE proje_kullanici='$username'");
              while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                echo '
                <tr>
                <td>
                          #
                </td>
                <td>
                <a>
                '.$cikti["proje_adi"].'
                </a>
                </td>
                <td>
                <ul class="list-inline">
                <li class="list-inline-item">
                '.$cikti["proje_kullanici"].'
                </li>
                </ul>
                </td>
                <td class="project-state">';
                if($cikti["proje_durum"]==1){
                  echo '<span class="badge badge-info ">Bekleyen Proje</span>';
                }
                else if($cikti["proje_durum"]==2){
                  echo '<span class="badge badge-success">Tamamlanan Proje</span>';
                }
                else if($cikti["proje_durum"]==3){
                  echo '<span class="badge badge-warning">Devam Eden Proje</span>';
                }
                else if($cikti["proje_durum"]==4){
                  echo '<span class="badge badge-danger">Tıkanmış Proje</span>';
                }
                echo'
                </td>
                <td class="project-actions text-right">
                <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#modal-secondary'.$cikti["id"].'">
                <i class="fas fa-folder">
                </i>
                Göster
                </a>
                <a class="btn btn-info btn-sm" href="?sayfa=proje_duzenle&proje_id='.$cikti["id"].'">
                <i class="fas fa-pencil-alt">
                </i>
                Düzenle
                </a>
                <a class="btn btn-danger btn-sm" href="?sayfa=sil&url=proje_sil&id='.$cikti["id"].'" onclick="return confirmDelete(this);">
                <i class="fas fa-trash">
                </i>
                Sil
                </a>
                </td>
                </tr>
                <div class="modal fade" id="modal-secondary'.$cikti["id"].'">
                <div class="modal-dialog">
                <div class="modal-content bg-secondary">
                <div class="modal-header">
                <h4 class="modal-title">Proje</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">

                <div class="callout callout-info">
                <h5>Proje Adı: '.$cikti["proje_adi"].'</h5>
                <hr>
                <span class="badge badge-primary">Proje Adı:</span> '.$cikti["proje_firmaadi"].'<br>
                <span class="badge badge-primary">Proje Telefon:</span> '.$cikti["proje_gsm"].'<br>
                <span class="badge badge-primary">Proje E-Posta:</span> '.$cikti["proje_eposta"].'<br>
                <span class="badge badge-primary">Proje Açıklama:</span> '.$cikti["proje_aciklama"].'<br>
                <span class="badge badge-primary">Proje Kullanıcı:</span> '.$cikti["proje_kullanici"].'<br>
                <span class="badge badge-primary">Proje Durum:</span>';
                if($cikti["proje_durum"]==1){
                  echo '<span class="badge badge-info ">Bekleyen Proje</span>';
                }
                else if($cikti["proje_durum"]==2){
                  echo '<span class="badge badge-success">Tamamlanan Proje</span>';
                }
                else if($cikti["proje_durum"]==3){
                  echo '<span class="badge badge-warning">Devam Eden Proje</span>';
                }
                else if($cikti["proje_durum"]==4){
                  echo '<span class="badge badge-danger">Tıkanmış Proje</span>';
                }
                echo'<br>
                <span class="badge badge-primary">Proje Firma:</span> '.$cikti["proje_baslangicTarih"].'<br>
                <span class="badge badge-primary">Proje Website:</span> '.$cikti["proje_bitisTarih"].'<br>
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
            }


            ?>



          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>