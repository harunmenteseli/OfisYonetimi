<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Görev Listele</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li class="breadcrumb-item active">Görev Lislete</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <?php 
    $gorev=$db->prepare("SELECT COUNT(*) from gorev WHERE gorev_kullanici='$username'");
        $gorev->execute();
        $say = $gorev->fetchColumn();
        if($say<1){
          if ($user_rol!=1) {
                     echo '
    <div class="col-md-12">
      <div class="info-box mb-3 bg-info">
        <span class="info-box-icon"><i class="fas fa-edit"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Size atanmış herhangi bir görev bulunmamaktadır.</span>
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
                          Görev
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
              if($user_rol==1){
                $sorgu = $db->query("SELECT * FROM gorev");
                  while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                    echo '
                    <tr>
                      <td>
                          #
                      </td>
                      <td>
                          <a>
                              '.$cikti["gorev_projeadi"].'
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
                            echo '<span class="badge badge-warning">İkinci İş(Müsait Olduğunda)</span>';
                          }
                           else if($cikti["gorev_durum"]==3){
                            echo '<span class="badge badge-info">Ertelenebilir(İş Bitiminden Sonra)</span>';
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
                          <a class="btn btn-info btn-sm" href="?sayfa=gorev-duzenle&gorev_id='.$cikti["id"].'">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Düzenle
                          </a>
                          <a class="btn btn-danger btn-sm" href="?sayfa=sil&url=gorev_sil&id='.$cikti["id"].'" onclick="return confirmDelete(this);">
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
                      <h5>Görev Adı: '.$cikti["gorev_projeadi"].'</h5>
                      <hr>
                      <span class="badge badge-primary">Görev Açıklama:</span> '.$cikti["gorev_aciklama"].'<br>
                      <span class="badge badge-primary">Görev Kullanıcı:</span> '.$cikti["gorev_kullanici"].'<br>
                      <span class="badge badge-primary">Görev Durum:</span> ';
                      if($cikti["gorev_durum"]==1){
                        echo '<span class="badge badge-danger ">Öncelikli(Acil)</span>';
                      }
                      else if($cikti["gorev_durum"]==2){
                        echo '<span class="badge badge-warning">İkinci İş(Müsait Olduğunda)</span>';
                      }
                      else if($cikti["gorev_durum"]==3){
                        echo '<span class="badge badge-info">Ertelenebilir(İş Bitiminden Sonra)</span>';
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
              }
             else {
              $sorgu = $db->query("SELECT * FROM gorev WHERE gorev_kullanici='$username'");
                  while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                    echo '
                    <tr>
                      <td>
                          #
                      </td>
                      <td>
                          <a>
                              '.$cikti["gorev_projeadi"].'
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
                          <a class="btn btn-info btn-sm" href="?sayfa=gorev-duzenle&gorev_id='.$cikti["id"].'">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Düzenle
                          </a>
                          <a class="btn btn-danger btn-sm" href="?sayfa=sil&url=gorev_sil&id='.$cikti["id"].'" onclick="return confirmDelete(this);">
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
                      <h5>Görev Adı: '.$cikti["gorev_projeadi"].'</h5>
                      <hr>
                      Görev Açıklama: '.$cikti["gorev_aciklama"].'<br>
                      Görev Kullanıcı: '.$cikti["gorev_kullanici"].'<br>
                      Görev Durum: ';
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
                      Görev Firma: '.$cikti["gorev_firma"].'<br>
                      Görev Website: '.$cikti["gorev_website"].'<br>
                      Görev Tarih: '.$cikti["gorev_tarih"].'<br>

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