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
<?php 
$tarih =date("Y-m-d");
?>
  <form action="?sayfa=is-exel" method="post">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-sm-3"># Yazdırma ve Dışa Aktarma İşlemi</div>
        <div class="col-sm-3">
          <div class="input-group" >
            <input name="is_tarih" type="text" class="form-control date-time" required=""/>
          </div>
        </div>
                <?php 
            if ($user_rol==1) {
              echo '
                     <div class="col-sm-3">
          <div class="form-group">
            <select id="inputStatus" class="form-control custom-select" name="is_kullanici">
              <option selected disabled>Kullanıcı Seçiniz</option>';?>
              <?php 
              $sorgu = $db->query("SELECT * FROM user");
              while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                echo "<option>".$cikti["user_name"]."</option>";
              }
              ?>
          <?php echo'</select>
          </div>
        </div>
              ';
              
            } 


            ?><br>
 
        <div class="col-sm-3">      
          <input type="submit" value="Listele / Yazdır" class="btn btn-success float-left">
        </div>
        <form>
        </div>
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">İş Listesi</h3>

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
                    Kullanıcı
                  </th>
                  <th style="width: 10%">
                    İş Başlık
                  </th>
                  <th style="width: 20%">
                    İş Açıklama
                  </th>

                  <th style="width: 11%" class="text-center">
                   İş Başlangıç Tarihi 
                 </th>
                 <th style="width: 11%" class="text-center">
                   İş Bitiş Tarihi 
                 </th>
                 <th style="width: 30%">
                 </th>
               </tr>
             </thead>
             <tbody>

              <?php 
              if($user_rol==1){
                $sorgu = $db->query("SELECT * FROM istakip WHERE baslangic_saat LIKE '%$tarih%'");
                while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                  echo '
                  <tr>
                  <td>
                   '.$cikti["is_kullanici"].'
                  </td>
                  <td>
                  <a>
                  '.$cikti["is_adi"].'
                  </a>
                  </td>
                  <td>
                  <ul class="list-inline">
                  <li class="list-inline-item">
                  '.$cikti["is_aciklama"].'
                  </li>
                  </ul>
                  </td>
                  <td>
                  <ul class="list-inline">
                  <li class="list-inline-item">
                  '.$cikti["baslangic_saat"].'
                  </li>
                  </ul>
                  </td>
                  <td>
                  <ul class="list-inline">
                  <li class="list-inline-item">
                  ';?>

                  <?php 
                  if ($cikti["bitis_saat"]=="") {
                    echo '<span class="badge badge-primary">Devam Ediyor<br>';
                  }
                  else{
                    echo $cikti["bitis_saat"];
                  }
                  ?>

                  <?php echo'</li>
                  </ul>
                  </td>
                  <td class="project-actions text-right">
                  <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#modal-secondary'.$cikti["id"].'">
                  <i class="fas fa-folder">
                  </i>
                  Göster
                  </a>
                  <a class="btn btn-info btn-sm" href="?sayfa=is-duzenle&is_id='.$cikti["id"].'">
                  <i class="fas fa-pencil-alt">
                  </i>
                  Düzenle
                  </a>
                  ';?>

                  <?php 
                  if ($cikti["is_durum"]==0) {
                    echo '
                    <a class="btn btn-success btn-sm" href="?sayfa=is-bitir&is_id='.$cikti["id"].'" >
                    <i class="fas fa-check">
                    </i>
                    Bitir
                    </a>';
                  }
                  ?>
                  <?php echo'
                  <a class="btn btn-danger btn-sm" href="?sayfa=sil&url=is_sil&id='.$cikti["id"].'" onclick="return confirmDelete(this);">
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
                  <h4 class="modal-title">Görev</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <div class="modal-body">

                  <div class="callout callout-info">
                  <h5>İş Adı: '.$cikti["is_adi"].'</h5>
                  <hr>
                  <span class="badge badge-primary">İş Açıklama:</span> '.$cikti["is_aciklama"].'<br>
                  <span class="badge badge-primary">İş Başlangıç Tarihi:</span> '.$cikti["baslangic_saat"].'<br>';?>
                  <?php 
                  if ($cikti["bitis_saat"]=="") {
                    echo '<span class="badge badge-primary">İş Bitiş Tarihi:</span> Devam Ediyor <br>';
                  }
                  else{
                    echo '<span class="badge badge-primary">İş Bitiş Tarihi:</span> '.$cikti["bitis_saat"].'<br>';
                  }

                  ?>

                  <?php echo'<span class="badge badge-primary">İş Kullanıcı:</span> '.$cikti["is_kullanici"].'<br><br><br>
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
                $sorgu = $db->query("SELECT * FROM istakip WHERE baslangic_saat LIKE '%$tarih%' AND is_kullanici='$username'");
                while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                  echo '
                 <tr>
                  <td>
                     '.$cikti["is_kullanici"].'
                  </td>
                  <td>
                  <a>
                  '.$cikti["is_adi"].'
                  </a>
                  </td>
                  <td>
                  <ul class="list-inline">
                  <li class="list-inline-item">
                  '.$cikti["is_aciklama"].'
                  </li>
                  </ul>
                  </td>
                  <td>
                  <ul class="list-inline">
                  <li class="list-inline-item">
                  '.$cikti["baslangic_saat"].'
                  </li>
                  </ul>
                  </td>
                  <td>
                  <ul class="list-inline">
                  <li class="list-inline-item">
                  ';?>

                  <?php 
                  if ($cikti["bitis_saat"]=="") {
                    echo '<span class="badge badge-primary">Devam Ediyor<br>';
                  }
                  else{
                    echo $cikti["bitis_saat"];
                  }
                  ?>

                  <?php echo'</li>
                  </ul>
                  </td>
                  <td class="project-actions text-right">
                  <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#modal-secondary'.$cikti["id"].'">
                  <i class="fas fa-folder">
                  </i>
                  Göster
                  </a>
                  <a class="btn btn-info btn-sm" href="?sayfa=is-duzenle&is_id='.$cikti["id"].'">
                  <i class="fas fa-pencil-alt">
                  </i>
                  Düzenle
                  </a>';?>

                  <?php 
                  if ($cikti["is_durum"]==0) {
                    echo '
                    <a class="btn btn-success btn-sm" href="?sayfa=is-bitir&is_id='.$cikti["id"].'" >
                    <i class="fas fa-check">
                    </i>
                    Bitir
                    </a>';
                  }
                  ?>
                  <?php echo'
                  <a class="btn btn-danger btn-sm" href="?sayfa=sil&url=is_sil&id='.$cikti["id"].'" onclick="return confirmDelete(this);">
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
                  <h4 class="modal-title">Görev</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <div class="modal-body">

                  <div class="callout callout-info">
                  <h5>İş Adı: '.$cikti["is_adi"].'</h5>
                  <hr>
                  <span class="badge badge-primary">İş Açıklama:</span> '.$cikti["is_aciklama"].'<br>
                  <span class="badge badge-primary">İş Başlangıç Tarihi:</span> '.$cikti["baslangic_saat"].'<br>';?>
                  <?php 
                  if ($cikti["bitis_saat"]=="") {
                    echo '<span class="badge badge-primary">İş Bitiş Tarihi:</span> Devam Ediyor <br>';
                  }
                  else{
                    echo '<span class="badge badge-primary">İş Bitiş Tarihi:</span> '.$cikti["bitis_saat"].'<br>';
                  }

                  ?>

                  <?php echo'
                  <span class="badge badge-primary">İş Kullanıcı:</span> '.$cikti["is_kullanici"].'<br><br>

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
        <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>