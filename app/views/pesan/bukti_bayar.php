<?php
Flasher::flash_user();
?>

        <section class="page-section bg-light" >
            <div class="container">
                <div class="text-left mt-2">
                    <h2 class="section-heading"><a href="<?= BASEURL ?>/"><i class="fas fa-arrow-left"></i></a> Lanjutkan Pembayaran...</h2>
                </div>
                <form class="row form d-flex align-items-center justify-content-center" enctype="multipart/form-data" method="POST" action="<?= BASEURL ?>/pesan/update_bukti_bayar">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mt-2">Detail Pesanan</h5>
                            </div>

                            <div class="card-body p-3">
                                <div class="form">
                                    <div class="form-group">
                                        <label class="control-label" for="Nama">Nama :</label>
                                        <input class="form-control" disabled type="text" value="<?= $_SESSION['user']['nama'] ?>">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-lg-8 mt-3">
                        <button class="w-100 py-3 btn btn-lg btn-success">Submit</button>
                    </div>
                </form>
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