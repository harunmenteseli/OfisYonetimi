<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Duyuru Listele</h1>
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

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Duyuru Listesi</h3>

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
                          Duyuru Başlık
                      </th>
                      <th style="width: 20%">
                        Duyuru Açıklama
                      </th>
                      
                      <th style="width: 80%" class="text-center">
                          
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>

              <?php 
              if($user_rol==1){
                $sorgu = $db->query("SELECT * FROM duyuru");
                  while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                    echo '
                    <tr>
                      <td>
                          #
                      </td>
                      <td>
                          <a>
                              '.$cikti["duyuru_baslik"].'
                          </a>
                      </td>
                      <td>
                          <ul class="list-inline">
                              <li class="list-inline-item">
                                 '.$cikti["duyuru_aciklama"].'
                              </li>
                          </ul>
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#modal-secondary'.$cikti["id"].'">
                              <i class="fas fa-folder">
                              </i>
                              Göster
                          </a>
                          <a class="btn btn-info btn-sm" href="?sayfa=duyuru-duzenle&duyuru_id='.$cikti["id"].'">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Düzenle
                          </a>
                          <a class="btn btn-danger btn-sm" href="?sayfa=sil&url=duyuru_sil&id='.$cikti["id"].'" onclick="return confirmDelete(this);">
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
                      <h5>Görev Adı: '.$cikti["duyuru_baslik"].'</h5>
                      <hr>
                      <span class="badge badge-primary">Duyuru Açıklama:</span> '.$cikti["duyuru_aciklama"].'<br>
                    

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
              $sorgu = $db->query("SELECT * FROM duyuru ");
                  while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                    echo '
                                 <tr>
                      <td>
                          #
                      </td>
                      <td>
                          <a>
                              '.$cikti["duyuru_baslik"].'
                          </a>
                      </td>
                      <td>
                          <ul class="list-inline">
                              <li class="list-inline-item">
                                 '.$cikti["duyuru_aciklama"].'
                              </li>
                          </ul>
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
                      <h5>Görev Adı: '.$cikti["duyuru_baslik"].'</h5>
                      <hr>
                      <span class="badge badge-primary">Duyuru Açıklama:</span> '.$cikti["duyuru_aciklama"].'<br>
                    

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