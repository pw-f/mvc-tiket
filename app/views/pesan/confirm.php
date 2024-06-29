        <section class="page-section bg-light" >
            <div class="container">
                <div class="text-left mt-2">
                    <h2 class="section-heading"><a href="<?= BASEURL ?>/pesan/tiket/<?= $data['destination']['id'] ?>"><i class="fas fa-arrow-left"></i></a> Konfirmasi Pesanan</h2>
                </div>
                <form class="row form" method="POST" action="<?= BASEURL ?>/pesan/pemesanan">
                    <div class="col-lg-8 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mt-2">Detail Pesanan</h5>
                            </div>

                            <div class="card-body p-3">
                                <div class="form">
                                    <input type="text" name="id_tiket" value="<?= $data['tiket']['id'] ?>" hidden class="form-control">
                                    <input type="text" name="id_destinasi" value="<?= $data['tiket']['id_destinasi'] ?>" hidden class="form-control">
                                    <input type="text" name="id_user" value="<?= $_SESSION['user']['id'] ?>" hidden class="form-control">
                                    <input type="number" name="qty" value="<?= $data['qty'] ?>" hidden class="form-control">
                                    <input type="text" name="total_price" value="<?= $data['total_price'] ?>" hidden class="form-control">

                                    <div class="form-group">
                                        <label class="control-label" for="Nama">Nama :</label>
                                        <input class="form-control" disabled type="text" value="<?= $_SESSION['user']['nama'] ?>">
                                    </div>

                                    <div class="form-group my-3">
                                        <label class="control-label" for="email">Email :</label>
                                        <input class="form-control" disabled type="text" value="<?= $_SESSION['user']['email'] ?>">
                                    </div>

                                    <div class="form-group my-3">
                                        <label class="control-label" for="no_telp">No. HP :</label>
                                        <input class="form-control" disabled type="text" value="<?= $_SESSION['user']['no_telp'] ?>">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mt-2">Detail Pesanan</h5>
                            </div>

                            <div class="card-body p-3">
                                <div class="d-flex justify-content-between mb-3">
                                    <img class="rounded col-6" src="<?= $data['destination']['url_img'] ?>" alt="<?= $data['destination']['nama_destinasi'] ?>" />
                                    <ul class="col-6 list-group list-group-flush align-items-center justify-content-center">
                                        <li class="px-3 list-group-item"><?= $data['destination']['nama_destinasi'] ?></li>
                                        <li class="px-3 list-group-item"><?= $data['tiket']['nama_tiket'] ?></li>
                                    </ul>
                                </div>
                                <div class="">
                                    <div>
                                        <ul class="col-lg-12 list-group list-group-flush mb-3">
                                            <li class="px-3 list-group-item">
                                                <p>Total Tiket : <?= $data['qty'] ?></p>
                                                <p id="harga">Harga : <?= $data['tiket']['harga'] ?></p>
                                            </li>
                                            <li class="px-3 list-group-item" id="total-price">Total : <?= $data['total_price'] ?></>
                                        </ul>
                                        <script>
                                            document.addEventListener("DOMContentLoaded", function() {
                                                var total_price = <?= $data['total_price'] ?>;
                                                var harga = <?= $data['tiket']['harga'] ?>;
                                                
                                                const formatter = new Intl.NumberFormat('id-ID', {
                                                    style: 'currency',
                                                    currency: 'IDR',
                                                    minimumFractionDigits: 0
                                                });

                                                var total_prices = document.getElementById('total-price');
                                                var hargajs = document.getElementById('harga');

                                                total_prices.textContent = "Total : " + formatter.format(total_price);
                                                hargajs.textContent = "Harga : " + formatter.format(harga);
                                            });
                                        </script>
                                        
                                    </div>

                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-12 mt-3">
                        <button class="w-100 py-3 btn btn-lg btn-success">Confirm & Pay</button>
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