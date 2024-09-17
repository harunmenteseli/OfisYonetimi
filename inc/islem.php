<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>İşlem Yap</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li class="breadcrumb-item active">İşlem</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
       $islem = $_GET["islem"];
       $gorev_id = $_GET["gorev_id"];
       if ($islem=="gorev_duzenle"){ gorev_duzenle($gorev_id); }
 	   else{ echo "Yanlış bir link'e tıkladınız"; }
      ?>

    </section>
    <!-- /.content -->
  </div>