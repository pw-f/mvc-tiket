<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Blank</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff" />
    <!-- Retina iPad Touch Icon-->
    <link
      rel="apple-touch-icon"
      sizes="144x144"
      href="http://placehold.it/144.png/000/fff"
    />
    <!-- Retina iPhone Touch Icon-->
    <link
      rel="apple-touch-icon"
      sizes="114x114"
      href="http://placehold.it/114.png/000/fff"
    />
    <!-- Standard iPad Touch Icon-->
    <link
      rel="apple-touch-icon"
      sizes="72x72"
      href="http://placehold.it/72.png/000/fff"
    />
    <!-- Standard iPhone Touch Icon-->
    <link
      rel="apple-touch-icon"
      sizes="57x57"
      href="http://placehold.it/57.png/000/fff"
    />

    <!-- Styles -->
    <link href="<?= BASEURL ?>/assets/css/lib/font-awesome.min.css" rel="stylesheet" />
    <link href="<?= BASEURL ?>/assets/css/lib/themify-icons.css" rel="stylesheet" />
    <link href="<?= BASEURL ?>/assets/css/lib/menubar/sidebar.css" rel="stylesheet" />
    <link href="<?= BASEURL ?>/assets/css/lib/bootstrap.min.css" rel="stylesheet" />

    <link href="<?= BASEURL ?>/assets/css/lib/helper.css" rel="stylesheet" />
    <link href="<?= BASEURL ?>/assets/css/style.css" rel="stylesheet" />
  </head>

  <body>
    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
      <div class="nano">
        <div class="nano-content">
          <div class="logo">
            <a href="<?= BASEURL ?>"
              ><!-- <img src="assets/images/logo.png" alt="" /> --><span
                >Belitiket</span
              ></a
            >
          </div>
          <ul>
            <li class="label">Main</li>
            <li class="active">
                <a href="<?= BASEURL ?>/admin"
                    ><i class="ti-calendar"></i> Dashboard
              </a>
            </li>
            
            <li class="label">Apps</li>
            <li>
              <a href="<?= BASEURL ?>/admin/destination"><i class="ti-image"></i> Destinasi</a>
            </li>
            <li>
              <a href="<?= BASEURL ?>/admin/tiket"><i class="ti-ticket"></i> Tiket</a>
            </li>
            <li>
              <a href="<?= BASEURL ?>/admin/pemesanan"><i class="ti-email"></i> Pemesanan</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- /# sidebar -->

    <div class="header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="float-left">
              <div class="hamburger sidebar-toggle">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
              </div>
            </div>
            <div class="float-right">
              <ul>
                <li class="header-icon dib">
                  <span class="user-avatar"
                    ><?= $_SESSION['user']['nama'] ?> <i class="ti-angle-down f-s-10"></i
                  ></span>
                  <div class="drop-down dropdown-profile">
                    <div class="dropdown-content-body">
                      <ul>
                        <li>
                          <a href="<?= BASEURL ?>/logout"
                            ><i class="ti-power-off"></i> <span>Logout</span></a
                          >
                        </li>
                      </ul>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>