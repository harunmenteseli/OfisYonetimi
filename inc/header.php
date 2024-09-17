<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">




  <title>Ofis Yönetim  | Agarta Plus Bilişim Sistemleri</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="theme/plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="theme/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="theme/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="theme/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="theme/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="theme/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="theme/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="theme/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="theme/plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="theme/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="theme/plugins/ekko-lightbox/ekko-lightbox.css">

  <script type="js/select2.full.min.js"></script>


</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    <div id="audio"></div>

    <!-- Preloader -->
   <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="img/torettocomtrlogo.jpg" alt="AdminLTELogo" height="60" width="60">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="?sayfa=main" class="nav-link">Anasayfa</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">İletişim</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">


      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
            <?php

            $gorev=$db->prepare("SELECT COUNT(*) from gorev WHERE gorev_kullanici='$username' AND gorev_durum!=4");
            $gorev->execute();
            $say = $gorev->fetchColumn();
            if($say<1){

            }
            else{
             echo '<span class="badge badge-danger navbar-badge">'.$say.'</span>';
           }
           ?>
         
       </a>
       <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <div class="dropdown-divider"></div>
        <?php 
        $gicerik=$db->query("SELECT * from gorev WHERE gorev_kullanici='$username' AND gorev_durum!=4");
        while ($rows=$gicerik->fetch(PDO::FETCH_ASSOC)) {
         echo'
         <a href="?sayfa=gorev-list" class="dropdown-item">
         <!-- Message Start -->
         <div class="media">
         <img src="theme/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
         <div class="media-body">
         <h3 class="dropdown-item-title">
         '.$rows["gorev_projeadi"];
         if ($rows["gorev_durum"]==1) {
          echo '<span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>';
        }
        else if ($rows["gorev_durum"]==2) {
          echo '<span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>';
        }
        else if ($rows["gorev_durum"]==3) {
          echo '<span class="float-right text-sm text-success"><i class="fas fa-star"></i></span>';
        }

        ?>

        <?php
        echo'
        </h3>
        <p class="text-sm">';?>
        <?php echo substr($rows["gorev_aciklama"],0,50)."..."; ?>

        <?php echo'</p>
        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>'.$rows["gorev_tarih"].'</p>
        </div>
        </div>
        <!-- Message End -->
        </a>

        ';
      }
      ?>
      <a href="?sayfa=gorev-list" class="dropdown-item dropdown-footer">Diğer Görevleri Gör</a>
    </div>
  </li>
  <!-- Notifications Dropdown Menu -->
  <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
      <i class="far fa-bell"></i>
   
        <?php

        $gorev=$db->prepare("SELECT COUNT(*) from proje WHERE proje_kullanici='$username'");
        $gorev->execute();
        $say = $gorev->fetchColumn();
        if($say<1){
    
        }
        else{
        echo '<span class="badge badge-warning navbar-badge">'.$say.'</span>';
       }
       ?>
     </a>
     <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
       <?php 
       $gicerik=$db->query("SELECT * from proje WHERE proje_kullanici='$username'");
       while ($rows=$gicerik->fetch(PDO::FETCH_ASSOC)) {
         echo'
         <a href="?sayfa=proje-list" class="dropdown-item">
         <!-- Message Start -->
         <div class="media">
         <img src="theme/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
         <div class="media-body">
         <h3 class="dropdown-item-title">
         '.$rows["proje_adi"];
         if ($rows["proje_durum"]==1) {
          echo '<span class="float-info text-sm text-info"><i class="fas fa-star"></i></span>';
        }
        else if ($rows["proje_durum"]==2) {
          echo '<span class="float-right text-sm text-success><i class="fas fa-star"></i></span>';
        }
        else if ($rows["proje_durum"]==3) {
          echo '<span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>';
        }
        else if ($rows["proje_durum"]==4) {
          echo '<span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>';
        }

        ?>

        <?php
        echo'
        </h3>
        <p class="text-sm">'.$rows["proje_aciklama"].'</p>
        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>'.$rows["proje_baslangicTarih"].'</p>
        </div>
        </div>
        <!-- Message End -->
        </a>

        ';
      }
      ?>
      <a href="?sayfa=proje-list" class="dropdown-item dropdown-footer">Diğer Projeleri Gör</a>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
      <i class="fas fa-expand-arrows-alt"></i>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
      <i class="fas fa-th-large"></i>
    </a>
  </li>
</ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="?sayfa=main" class="brand-link">
    <img src="img/torettocomtrlogo.jpg" alt="Yazılım ve Bilişim Sistemleri" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"><?php echo marka_sidebar;?></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php

        if($row["cinsiyet"]=='erkek'){
          echo "img/erkek.png";
        }
        else{
          echo "img/kadin.png";
        }
        ?>" class="img-circle elevation-2" alt="Üye Avatar">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo $row["user_adsoyad"]?></a>
      </div>
    </div>



    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item menu-open">
            <a href="?sayfa=main" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Ön İzleme
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Görevler
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
              if ($user_rol==1) {
                echo '<li class="nav-item">
                <a href="?sayfa=gorev-ekle" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Görev Ekle</p>
                </a>
                </li>';
              }

              ?>
              <li class="nav-item">
                <a href="?sayfa=gorev-list" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Görev Listele</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Proje
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             <?php
             if ($user_rol==1) {
              echo '<li class="nav-item">
              <a href="?sayfa=proje-ekle" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Proje Ekle</p>
              </a>
              </li>';
            }

            ?>
            <li class="nav-item">
              <a href="?sayfa=proje-list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Proje Listele</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              İş Takip
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="?sayfa=is-ekle" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>İş Ekle</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?sayfa=is-list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>İş Listele</p>
              </a>
            </li>
          </ul>
        </li>

        <?php

        if ($user_rol==1) {
          echo ' <li class="nav-item">
          <a href="#" class="nav-link">
          <i class="nav-icon fas fa-handshake"></i>
          <p>
          Müşteri
          <i class="fas fa-angle-left right"></i>
          </p>
          </a>
          <ul class="nav nav-treeview">
          <li class="nav-item">
          <a href="?sayfa=musteri-ekle" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Müşteri Ekle</p>
          </a>
          </li>
          <li class="nav-item">
          <a href="?sayfa=musteri-list" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Müşteri Listele</p>
          </a>
          </li>
          </ul>
          </li>';
        }

        ?>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Üyeler
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <?php 

            if ($user_rol==1) {
              echo '<li class="nav-item">
              <a href="?sayfa=uye-ekle" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Üye Ekle</p>
              </a>
              </li>';
            }
            ?>
            <li class="nav-item">
              <a href="?sayfa=uye-list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Üye Listele</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-bullhorn"></i>
            <p>
              Duyuru
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <?php
            if ($user_rol==1) {
              echo '<li class="nav-item">
              <a href="?sayfa=duyuru-ekle" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Duyuru Ekle</p>
              </a>
              </li>';
            }

            ?>
            <li class="nav-item">
              <a href="?sayfa=duyuru-list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Duyuru Listele</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="?sayfa=cikis" class="nav-link">
            <i class="fas fa-sign-out-alt"></i>
            <p>
              Çıkış Yap
            </p>
          </a>
        </li>


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>