        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Destinations</h2>
                    <h3 class="section-subheading text-muted">Lihat destinasi wisata yang menarik di Bali dengan membeli tiket wisata langsung di sini.</h3>
                </div>
                <div class="row">
                    <?php $index = 1; foreach ($data['destinasi'] as $dest) : ?>
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
                    <?php $index++; endforeach; ?>
                </div>
            </div>
        </section>