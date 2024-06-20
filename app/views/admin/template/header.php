




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= BASEURL ?>/images/favicon.png">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= BASEURL ?>/vendor/toastr/css/toastr.min.css">
    <!-- Custom Stylesheet -->
    <link href="<?= BASEURL ?>/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="<?= BASEURL ?>/assets/img/navbar-logo.svg" alt="logo">
                <img class="brand-title" src="<?= BASEURL ?>/assets/img/navbar-logo.svg" alt="title-logo">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account text-xs"><?= $_SESSION['user']['nama'] ?></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="<?= BASEURL ?>/logout" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li><a href="<?= BASEURL ?>/admin" aria-expanded="false"><i class="mdi mdi-home"></i><span
                                class="nav-text">Dashboard</span></a></li>
                    
                    <li class="nav-label">Apps</li>
                    <li><a href="<?= BASEURL ?>/admin/destination" aria-expanded="false"><i class="mdi mdi-panorama-variant"></i><span
                                class="nav-text">Destinasi</span></a></li>
                    <li><a href="<?= BASEURL ?>/admin/tiket" aria-expanded="false"><i class="mdi mdi-ticket-account"></i><span
                                class="nav-text">Tiket</span></a></li>
                    <li><a href="<?= BASEURL ?>/admin/pemesanan" aria-expanded="false"><i class="mdi mdi-mail"></i><span
                                class="nav-text">Pemesanan</span></a></li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">

