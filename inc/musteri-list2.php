<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Müşteri Listele</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li class="breadcrumb-item active">Müşteri Lislete</li>
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
          <h3 class="card-title">Müşteri Listesi</h3>

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
                          Firma Adı
                      </th>
                      <th style="width: 30%">
                          Yetkili Ad Soyad
                      </th>
                      
                      <th style="width: 10%" class="text-center">
                          E-Posta
                      </th>
                      <th style="width: 10%" class="text-center">
                          Telefon
                      </th>
                      <th style="width: 50%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                  $sorgu = $db->query("SELECT * FROM musteri");
                  while ($cikti = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                    echo '
                    <tr>
                      <td>
                          #
                      </td>
                      <td>
                          <a>
                              '.$cikti["musteri_sirketadi"].'
                          </a>
                      </td>
                      <td>
                          <ul class="list-inline">
                              <li class="list-inline-item">
                                 '.$cikti["musteri_adsoyad"].'
                              </li>
                          </ul>
                      </td>
                      <td>
                          <ul class="list-inline">
                              <li class="list-inline-item">
                                 '.$cikti["musteri_eposta"].'
                              </li>
                          </ul>
                      </td>
                      <td class="project-state">
                     '.$cikti["musteri_gsm"].'
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              Göster
                          </a>
                          <a class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Düzenle
                          </a>
                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Sil
                          </a>
                      </td>
                  </tr>
                    ';
                    
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