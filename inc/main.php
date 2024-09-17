<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Anasayfa</h1>
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
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="nav-icon fas fa-chart-pie"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Bekleyen Proje</span>
              <span class="info-box-number">
               <?php 
               $username= $row['user_name'];
               $proje=$db->prepare("SELECT COUNT(*) from proje WHERE proje_kullanici='$username' AND proje_durum=1");
               $proje->execute();
               $say = $proje->fetchColumn();

               if($say<1){
                echo "0";
              }
              else{
               echo $say;
             }
             ?>
           </span>
         </div>
         <!-- /.info-box-content -->
       </div>
       <!-- /.info-box -->
     </div>
     <!-- /.col -->
     <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-thumbs-up"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Tamamlanan Proje</span>
          <span class="info-box-number">
           <?php 
           $username= $row['user_name'];
           $proje=$db->prepare("SELECT COUNT(*) from proje WHERE proje_kullanici='$username' AND proje_durum=2");
           $proje->execute();
           $say = $proje->fetchColumn();

           if($say<1){
            echo "0";
          }
          else{
           echo $say;
         }
         ?>
       </span>
     </div>
     <!-- /.info-box-content -->
   </div>
   <!-- /.info-box -->
 </div>
 <!-- /.col -->

 <!-- fix for small devices only -->
 <div class="clearfix hidden-md-up"></div>

 <div class="col-12 col-sm-6 col-md-3">
  <div class="info-box mb-3">
    <span class="info-box-icon bg-warning elevation-1"><i class="nav-icon fas fa-edit"></i></span>

    <div class="info-box-content">
      <span class="info-box-text">Devam Eden Proje</span>
      <span class="info-box-number">
        <?php 
        $username= $row['user_name'];
        $proje=$db->prepare("SELECT COUNT(*) from proje WHERE proje_kullanici='$username' AND proje_durum=3");
        $proje->execute();
        $say = $proje->fetchColumn();

        if($say<1){
          echo "0";
        }
        else{
         echo $say;
       }
       ?>
     </span>
   </div>
   <!-- /.info-box-content -->
 </div>
 <!-- /.info-box -->
</div>
<!-- /.col -->
<div class="col-12 col-sm-6 col-md-3">
  <div class="info-box mb-3">
    <span class="info-box-icon bg-danger elevation-1"><i class="nav-icon fas fa-ellipsis-h"></i></span>

    <div class="info-box-content">
      <span class="info-box-text">Tıkanmış Proje</span>
      <span class="info-box-number">
        <?php 
        $username= $row['user_name'];
        $proje=$db->prepare("SELECT COUNT(*) from proje WHERE proje_kullanici='$username' AND proje_durum=4");
        $proje->execute();
        $say = $proje->fetchColumn();

        if($say<1){
          echo "0";
        }
        else{
         echo $say;
       }
       ?>
     </span>
   </div>
   <!-- /.info-box-content -->
 </div>
 <!-- /.info-box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
<!-- /.row -->
<?php 
$tarih = "2022-07-19";
$duyurusor = $db->query("SELECT * FROM duyuru WHERE duyuru_bitistarih>'$tarih'");

while ($duyurucek = $duyurusor->fetch(PDO::FETCH_ASSOC)) {

echo '
<div class="info-box mb-3 bg-danger">
<span class="info-box-icon"><i class="fas fa-bullhorn"></i></span>

<div class="info-box-content"><span style="text-align:right;">'.substr($duyurucek["duyuru_eklemetarih"],0,10).'</span>
<span class="info-box-number">'.$duyurucek["duyuru_baslik"].'</span>
<span class="info-box-text" style="text-overflow: inherit !important; white-space: initial !important;">'.$duyurucek["duyuru_aciklama"].'</span>
</div>
<!-- /.info-box-content -->
</div>';
}
?>

<!-- Main row -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Görev Listesi</h3>

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
            Görev Proje Adı
          </th>
          <th style="width: 30%">
            Görev Kullanıcısı
          </th>

          <th style="width: 20%" class="text-center">
            Görev Durumu
          </th>
          <th style="width: 50%">
          </th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $sorgu = $db->query("SELECT * FROM gorev WHERE gorev_kullanici='$username'");
        while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) {
          echo '
          <tr>
          <td>
           #
          </td>
          <td>
          <a>
          '.$cikti["gorev_firma"].'
          </a>
          </td>
          <td>
          <ul class="list-inline">
          <li class="list-inline-item">
          '.$cikti["gorev_kullanici"].'
          </li>
          </ul>
          </td>
          <td class="project-state">';
          if($cikti["gorev_durum"]==1){
            echo '<span class="badge badge-danger ">Öncelikli(Acil)</span>';
          }
          else if($cikti["gorev_durum"]==2){
            echo '<span class="badge badge-warning">İkinci İş(Müssait Olduğunda)</span>';
          }
          else if($cikti["gorev_durum"]==3){
            echo '<span class="badge badge-info">Ertelenebilir(İş Biriminden Sonra)</span>';
          }
           else if($cikti["gorev_durum"]==4){
            echo '<span class="badge badge-success">Tamamlanmış Görev</span>';
          }
          echo'
          </td>
          <td class="project-actions text-right">
          <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#modal-secondary'.$cikti["id"].'">
          <i class="fas fa-folder">
          </i>
          Göster
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
          <h5>Görev Adı: '.$cikti["gorev_projeadi"].'</h5>
          <hr>
          <span class="badge badge-primary">Görev Açıklama:</span> '.$cikti["gorev_aciklama"].'<br>
          <span class="badge badge-primary">Görev Kullanıcı:</span> '.$cikti["gorev_kullanici"].'<br>
          <span class="badge badge-primary">Görev Durum: </span>';
          if($cikti["gorev_durum"]==1){
            echo '<span class="badge badge-danger ">Öncelikli(Acil)</span>';
          }
          else if($cikti["gorev_durum"]==2){
            echo '<span class="badge badge-warning">İkinci İş(Müssait Olduğunda)</span>';
          }
          else if($cikti["gorev_durum"]==3){
            echo '<span class="badge badge-info">Ertelenebilir(İş Biriminden Sonra)</span>';
          }
           else if($cikti["gorev_durum"]==4){
            echo '<span class="badge badge-success">Tamamlanmış Görev</span>';
          }
          echo'<br>
          <span class="badge badge-primary">Görev Firma:</span> '.$cikti["gorev_firma"].'<br>
          <span class="badge badge-primary">Görev Website:</span> '.$cikti["gorev_website"].'<br>
          <span class="badge badge-primary">Görev Tarih:</span> '.$cikti["gorev_tarih"].'<br>

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



      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>

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
            Proje Adı
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
        ?>



      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>






</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>