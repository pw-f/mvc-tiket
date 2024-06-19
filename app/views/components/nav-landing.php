        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="<?= BASEURL ?>/home/index#page-top"><img src="<?= BASEURL ?>/assets/img/navbar-logo.svg" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="<?= BASEURL ?>/home/index#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= BASEURL ?>/home/index#portfolio">Destinations</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= BASEURL ?>/home/index#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= BASEURL ?>/home/index#team">Team</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= BASEURL ?>/home/index#contact">Contact</a></li>
                        <?php if (!isset($_SESSION['user'])) :?>
                            <li class="nav-item"><a class="nav-link" href="<?= BASEURL ?>/login">Sign In</a></li>
                        <?php elseif ($_SESSION['user']['id_role'] === 2) : ?>
                            <li class="nav-item"><a class="nav-link" href="<?= BASEURL ?>/pesanan">pesanan</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= BASEURL ?>/logout">Logout</a></li>
                        <?php else : ?>
                            <li class="nav-item"><a class="nav-link" href="<?= BASEURL ?>/logout">Logout</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>