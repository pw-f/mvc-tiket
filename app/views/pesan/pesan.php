<section class="page-section bg-light" >
            <div class="container">
                <div class="text-left mt-2">
                    <h2 class="section-heading text-uppercase">Konfirmasi pesanan</h2>
                </div>
                <div class="row">
                    <div class="col-lg-8 mb-4">
                        <div class="card">
                            <img class="rounded" src="<?= $data['destination']['url_img'] ?>" alt="<?= $data['destination']['nama_destinasi'] ?>" />
                        </div>
                        <div class="card-body mt-3">
                            <h5 class="text-muted">About This Destination</h5>
                            <p class="card-text"><?= $data['destination']['deskripsi'] ?></p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="mt-2">Ticket yang ingin Dipesan:</h3>
                            </div>
                            <div class="container p-3">
                                <div class="alert alert-secondary">
                                    <div>
                                        <div class="col-lg-12 mb-3">
                                            <h5><?= $data['tiket']['nama_tiket'] ?></h5>
                                        </div>
                                        <script>
                                            document.addEventListener("DOMContentLoaded", function() {
                                                var hargajs = <?= $data['tiket']['harga'] ?>;
                                                const rupiah = new Intl.NumberFormat("id", {
                                                    style: "currency",
                                                    currency: "IDR",
                                                    minimumFractionDigits: 0
                                                }).format(hargajs);

                                                var hargaElement = document.getElementById('harga-tiket-<?= $data['tiket']['id'] ?>');
                                                if (hargaElement) {
                                                    hargaElement.innerText = "Harga Tiket : " + rupiah;
                                                }
                                            });
                                        </script>
                                        <div class="col-lg-12">
                                            <p>Stok Tiket : <?= $data['tiket']['stok_tiket'] ?></p>
                                            <p id="harga-tiket-<?= $data['tiket']['id'] ?>"></p>
                                        </div>
                                        
                                    </div>
                                    <div class="d-flex justify-content-center">
                                            <a class="btn btn-dark" href="<?= BASEURL . '/pesan/pesan/' . $data['tiket']['id'] ?>">Pesan tiket ini</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Belitiket 2024</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-github"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-instagram"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?= BASEURL ?>/js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script> -->
    </body>
</html>