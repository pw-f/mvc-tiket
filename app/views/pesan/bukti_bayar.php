<?php
Flasher::flash_user();
?>

        <section class="page-section bg-light" >
            <div class="container">
                <div class="text-left mt-2">
                    <h2 class="section-heading"><a href="<?= BASEURL ?>/"><i class="fas fa-arrow-left"></i></a> Lanjutkan Pembayaran...</h2>
                </div>
                <form class="row form d-flex align-items-center justify-content-center" enctype="multipart/form-data" method="post" action="<?= BASEURL ?>/pesan/update_bukti_bayar">
                    <input type="hidden" name="id" value="<?= $data['id_pemesanan'] ?>">
                    <input type="hidden" name="id_tiket" value="<?= $data['tiket']['id'] ?>">
                    <input type="hidden" name="id_destinasi" value="<?= $data['destinasi']['id'] ?>">
                    <input type="hidden" name="id_user" value="<?= $data['user']['id'] ?>">
                    <input type="hidden" name="qty" value="<?= $data['qty'] ?>">
                    <input type="hidden" name="total_price" value="<?= $data['total_price'] ?>">


                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mt-2">Detail Pesanan</h5>
                            </div>

                            <div class="card-body p-3">
                                <div class="form">
                                    <div class="gap-1 d-md-flex d-lg-flex lg-flex-column">
                                        <div class="form-group col-lg-6 col-md-6 col-12">
                                            <img class="img-fluid rounded" src="<?= $data['destinasi']['url_img'] ?>" alt="images">
                                        </div>
                                        <ul class="form-group mb-3 col-lg-6 col-md-6 col-12 list-group list-group-flush">
                                            <li class="list-group-item" disabled type="text"><?= $data['destinasi']['nama_destinasi'] ?></li>
                                            <li class="list-group-item" disabled type="text"><?= $data['tiket']['nama_tiket'] ?></li>
                                            <li class="list-group-item" disabled type="text">Jumlah Tiket : <?= $data['qty'] ?></li>
                                            <li class="list-group-item" disabled id="total-price" type="text"><?= $data['total_price'] ?></li>
                                        </ul>
                                    </div>

                                    <hr class="my-3">

                                    <div class="form-group mb-3 d-flex justify-content-between">
                                        <img class="img-fluid col-5" src="<?= BASEURL ?>/assets/qr/qr.jpg" alt="qr">
                                        <span class="text-success col-7 align-self-center">*silahkan scan dan masukan nominal pembayaran</span>
                                    </div>
                                    
                                    <div class="form-group mb-3">
                                        <label class="control-label mb-1" for="Bukti Pembayaran">Upload Bukti Pembayaran :</label>
                                        <input class="form-control" required name="bukti_bayar" type="file">
                                        <span><span class="text-danger" id="bukti_bayar"></span></span>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="mt-3">
                            <button class="w-100 py-2 btn btn-lg btn-success">Submit</button>
                            <a href="<?= BASEURL ?>" class="w-100 py-2 btn btn-lg btn-danger mt-2" role="button">Bayar Nanti</a>
                        </div>
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

        <script>
            document.addEventListener("DOMContentLoaded", function() {
            var total_price = <?= $data['total_price'] ?>;
            
            const formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            });

            var total_prices = document.getElementById('total-price');
            var bukti = document.getElementById('bukti_bayar');

            total_prices.innerText = "Total : " + formatter.format(total_price);
            bukti.innerText = "*mohon upload bukti pembayaran dengan nominal yang sama yaitu " + formatter.format(total_price);
        });
        </script>

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