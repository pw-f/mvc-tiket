        <!-- Masthead-->
        <header class="masthead">
            <div class="overlay"></div>
            <div class="container">
                <div class="masthead-subheading">Welcome To <?= APP_NAME ?>!</div>
                <div class="masthead-heading text-uppercase">Discover Your Next Journey</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#services">Selengkapnya</a>
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Services</h2>
                    <h3 class="section-subheading text-muted">"Explore the diverse and captivating offerings we provide." </h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-earth-americas fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Cultural Sites</h4>
                        <p class="text-muted">Jelajahi kekayaan budaya Bali dengan tiket ke berbagai situs budaya. Nikmati pertunjukan tari tradisional dan upacara keagamaan.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-mountain-sun fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Wonderfull Destinations</h4>
                        <p class="text-muted">Pesan tiket untuk mengunjungi objek wisata terkenal di Bali. Nikmati berbagai destinasi keindahan alam Bali.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-dragon fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Guided Tours</h4>
                        <p class="text-muted">Nikmati tur terpandu yang memberikan wawasan mendalam tentang keindahan dan budaya Bali. Kami menawarkan berbagai tiket tur yang mencakup pemandangan alam dan pengalaman budaya autentik.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Destination Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Destinations</h2>
                    <h3 class="section-subheading text-muted">Lihat destinasi wisata yang menarik di Bali dengan membeli tiket wisata langsung di sini.</h3>
                </div>
                <div class="row">
                    <?php if (empty($data['destinasi'])): ?>
                        <div class="col-12 text-center">
                            <p>Oops data destinasi sedang liburan~</p>
                        </div>
                    <?php else: ?>
                        <?php 
                        $index = 1; 
                        foreach ($data['destinasi'] as $dest) : 
                            if ($index > 6) break;
                        ?>
                            <div class="col-lg-4 col-sm-6 mb-4">
                                <div class="portfolio-item">
                                    <a class="portfolio-link" data-bs-toggle="modal" href="#destination<?= $index ?>">
                                        <div class="portfolio-hover">
                                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                        </div>
                                        <img style="object-fit: cover; width: 100%; height: 250px;" class="img-fluid" src="<?= $dest['url_img'] ?>" alt="..." />
                                    </a>
                                    <div class="portfolio-caption">
                                        <div class="portfolio-caption-heading"><?= $dest['nama_destinasi'] ?></div>
                                        <!-- <div class="portfolio-caption-subheading text-muted">Illustration</div> -->
                                    </div>
                                </div>
                            </div>
                        <?php 
                            $index++; 
                        endforeach; 
                        ?>
                        <?php if (count($data['destinasi']) > 6): ?>
                            <div class="col-12 text-center">
                                <a class="btn btn-primary btn-xl text-uppercase" href="<?= BASEURL ?>/destinasi">Lihat destinasi lengkap <i class="fas fa-arrow-right"></i></a>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <!-- Flow tiket -->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Alur Pemesanan Tiket Wisata</h2>
                    <h3 class="section-subheading text-muted">yuk, di simak dulu!</h3>
                </div>
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="<?= BASEURL ?>/assets/img/about/tahap1.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Tahap 1</h4>
                                <h4 class="subheading">Login atau Registrasi</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Pengguna harus login ke akun mereka atau mendaftar jika belum memiliki akun untuk memulai pembelian tiket.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="<?= BASEURL ?>/assets/img/about/tahap2.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Tahap 2</h4>
                                <h4 class="subheading">Pemesanan Tiket</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Pengguna dapat memilih destinasi yang diinginkan lalu memilih jenis tiket yang ingin dibeli dan jumlah tiket yang ingin di beli.</p></div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="<?= BASEURL ?>/assets/img/about/tahap3.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Tahap 3</h4>
                                <h4 class="subheading">Pembayaran</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Pengguna melakukan pembayaran dengan mengklik tombol "Confirm and Pay". Mereka akan diarahkan ke halaman pembayaran dalam kode QR dan kirim bukti bayar, lalu tunggu validasi oleh admin</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="<?= BASEURL ?>/assets/img/about/tahap4.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Tahap 4</h4>
                                <h4 class="subheading">Selesai</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Proses pembelian tiket selesai setelah tiket diverifikasi oleh admin, dan pengguna dapat menggunakan tiket tersebut untuk masuk ke tempat wisata.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                                Be Part
                                <br />
                                Of Our
                                <br />
                                Story!
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- Team -->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
                    <h3 class="section-subheading text-muted">Meet the dedicated professionals who drive our success</h3>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="<?= BASEURL ?>/assets/img/team/palgun.jpg" alt="..." />
                            <h4>I Made Palguna Widiarsana</h4>
                            <p class="text-muted">NIM : 2301010364</p>
                            <a class="btn btn-dark btn-social mx-2" href="https://github.com/Palguna1121" aria-label="I Made Palguna Widiarsana Github Profile"><i class="fab fa-github"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/palguna._28" aria-label="I Made Palguna Widiarsana Instagram Profile"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="<?= BASEURL ?>/assets/img/team/susan.jpg" alt="..." />
                            <h4>Ni Nyoman Susanthi Dewi</h4>
                            <p class="text-muted">NIM : 2301010391</p>
                            <a class="btn btn-dark btn-social mx-2" href="https://susanthidewi23.github.io/" aria-label="Ni Nyoman Susanthi Dewi Github Profile"><i class="fab fa-github"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/susantidewi8446/" aria-label="Ni Nyoman Susanthi Dewi Instagram Profile"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="<?= BASEURL ?>/assets/img/team/sri.jpeg" alt="..." />
                            <h4>Ni Putu sri Andayani</h4>
                            <p class="text-muted">NIM : 2301010348</p>
                            <a class="btn btn-dark btn-social mx-2" href="https://sriandayani.github.io/" aria-label="Ni Putu sri Andayani Github Profile"><i class="fab fa-github"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/sriandayanii04_/" aria-label="Ni Putu sri Andayani Instagram Profile"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="<?= BASEURL ?>/assets/img/team/Frizy.jpeg" alt="..." />
                            <h4>Frizy Yuda Ardika</h4>
                            <p class="text-muted">NIM : 2301010367</p>
                            <a class="btn btn-dark btn-social mx-2" href="https://github.com/zyrenchi" aria-label="Frizy Yuda Ardika Github Profile"><i class="fab fa-github"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/zyrenchi?igsh=MWlqOXY4dG1iMHcw" aria-label="Frizy Yuda Ardika Instagram Profile"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="<?= BASEURL ?>/assets/img/team/satya.jpeg" alt="..." />
                            <h4>Gede Satya Mardawa</h4>
                            <p class="text-muted">NIM : 2301010362</p>
                            <a class="btn btn-dark btn-social mx-2" href="https://github.com/Shihane" aria-label="Gede Satya Mardawa Github Profile"><i class="fab fa-github"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/stya.md?igsh=c3kyd2ZlemFjOXVv" aria-label="Gede Satya Mardawa Instagram Profile"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"><p class="large text-muted"><p>We are dedicated to providing the best services and innovative solutions for your needs.</p>
                    </p></div>
                </div>
            </div>
        </section>

        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contact Us</h2>
                    <h3 class="section-subheading text-muted">Ada yang ingin ditanyakan?, hubungi kami disini</h3>
                </div>

                <form action="<?= BASEURL ?>/home/contact" method="post">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <input class="form-control" id="name" required name="name" type="text" placeholder="Your Name *"/>
                            </div>
                            <div class="form-group my-4">
                                <input class="form-control" id="email" required name="email" type="email" placeholder="Your Email *" />
                            </div>
                            <div class="form-group mt-2">
                                <input class="form-control" id="phone" required name="phone" type="tel" placeholder="Your Phone *" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea my-sm-4 my-md-0">
                                <textarea class="form-control" id="message" required name="message" placeholder="Your Message *"></textarea>
                            </div>
                        </div>
                    </div>
                    <?php
                        if (isset($_SESSION['flash'])) {
                            echo <<<HTML
                                <div class="text-center text-white mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                </div>
                            HTML;
                            unset($_SESSION['flash']);
                        } else {
                            echo <<<HTML
                                <div class="text-center">
                                    <button class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
                                </div>
                            HTML;
                        }
                        Flasher::flash_user();
                    ?>
                </form>
            </div>
        </section>