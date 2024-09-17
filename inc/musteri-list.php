<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Müşteri Listele</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
            <li class="breadcrumb-item active">Müşteri Listele</li>
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

  if ($user_rol==1) {
   $sorgu = $db->query("SELECT * FROM musteri");
   while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) {
    echo'

    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
    <div class="card bg-light d-flex flex-fill">
    <div class="card-header text-muted border-bottom-0">
    '.$cikti["musteri_sirketadi"].'
    </div>
    <div class="card-body pt-0">
    <div class="row">
    <div class="col-7">
    <h2 class="lead"><b>'.$cikti["musteri_adsoyad"].'</b></h2>
    <ul class="ml-4 mb-0 fa-ul text-muted">
    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>'.$cikti["musteri_adres"].'</li><br>
    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>'.$cikti["musteri_gsm"].'</li>
    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span>'.$cikti["musteri_eposta"].'</li>
    </ul>
    </div>
    <div class="col-5 text-center">
    <img src="img/torettocomtrlogo.jpg" alt="user-avatar" class="img-circle img-fluid">
    </div>
    </div>
    </div>
    <div class="card-footer">
    <div class="text-right">
    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-secondary'.$cikti["musteri_id"].'">
    <i class="fas fa-eye"></i> Görüntüle
    </a>
    <a href="?sayfa=musteri-duzenle&id='.$cikti["musteri_id"].'" class="btn btn-info btn-sm">
    <i class="fas fa-eye"></i> Düzenle
    </a>
    <a href="?sayfa=sil&url=musteri_sil&id='.$cikti["musteri_id"].'" class="btn btn-danger btn-sm">
    <i class="fas fa-eye"></i> Sil
    </a>
    </div>
    </div>
    </div>
    </div>

    <div class="modal fade" id="modal-secondary'.$cikti["musteri_id"].'">
    <div class="modal-dialog">
    <div class="modal-content bg-secondary">
    <div class="modal-header">
    <h4 class="modal-title">Müşteri</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">

    <div class="callout callout-info">
    <h5>Firma Adı: '.$cikti["musteri_sirketadi"].'</h5>
    <hr>
    Müşteri Ad soyad: '.$cikti["musteri_adsoyad"].'<br>
    Müşteri Ünvan: '.$cikti["musteri_unvan"].'<br>
    Müşteri Sektör: '.$cikti["musteri_sektor"].'<br>
    Müşteri Gsm: '.$cikti["musteri_gsm"].'<br>
    Müşteri E-posta: '.$cikti["musteri_eposta"].'<br>
    Müşteri Sabit Hat: '.$cikti["musteri_sabithat"].'<br>
    Müşteri Websitesi: '.$cikti["musteri_internetsitesi"].'<br>
    Müşteri Açıklama: '.$cikti["musteri_aciklama"].'<br>
    Müşteri İl: '.$cikti["musteri_il"].'<br>
    Müşteri ilçe: '.$cikti["musteri_ilce"].'<br>
    Müşteri Adres: '.$cikti["musteri_adres"].'<br>
    Müşteri Kulallnıcı: '.$cikti["musteri_kullanici"].'<br>
    Müşteri Tarih: '.$cikti["musteri_tarih"].'<br>
    Müşteri Durum: ';
    if($cikti["musteri_durum"]==1){
      echo '<span class="badge badge-success">Aktif Müşteri</span>';
    }
    else if($cikti["musteri_durum"]==2){
      echo '<span class="badge badge-warning">Sonra Görüşülecek</span>';
    }
    else if($cikti["musteri_durum"]==3){
      echo '<span class="badge badge-body">Tekrar Aranacak</span>';
    }
    else if($cikti["musteri_durum"]==4){
      echo '<span class="badge badge-secondary">Takipli Müşteri</span>';
    }
    else if($cikti["musteri_durum"]==5){
      echo '<span class="badge badge-danger">İptal Müşteri</span>';
    }
    echo'<br>
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
  echo '<div class="col-md-12">
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