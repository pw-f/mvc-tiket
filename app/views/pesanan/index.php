
        <section class="page-section bg-light" >
            <div class="container">
                <div class="text-left mt-2">
                    <h2 class="section-heading"><a href="<?= BASEURL ?>"><i class="fas fa-arrow-left"></i></a> Pesanan Saya</h2>
                </div>
                <div class="row">
                    <?php if(empty($data['pesanan'])) : ?>
                        <div class="col-12 my-3">
                            <h4>Anda Belum memesan apapun...</h4>
                        </div>
                    <?php endif; ?>
                    
                    <?php foreach ($data['pesanan'] as $pesanan) : 
                        $timestamp = strtotime($pesanan['tanggal_pemesanan']) * 1000;
                        $statusClass = '';
                            if ($pesanan['status_tiket'] == 'diterima') {
                                $statusClass = 'text-success fw-bold';
                            } elseif ($pesanan['status_tiket'] == 'dibatalkan') {
                                $statusClass = 'text-danger fw-bold';
                            } elseif ($pesanan['status_tiket'] == 'diproses') {
                                $statusClass = 'text-warning fw-bold';
                            }
                        // var_dump($pesanan);
                        ?>
                        <div class="col-lg-6 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <span id="formattedDate_<?= $timestamp ?>">blavlalalal</span>
                                    <script>
                                        var timestamp = <?= $timestamp ?>;
                                        var date = new Date(timestamp);

                                        var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                                        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                        var dayName = days[date.getDay()];
                                        var day = date.getDate();
                                        var monthIndex = date.getMonth();
                                        var year = date.getFullYear();
                                        var hours = date.getHours();
                                        var minutes = date.getMinutes();

                                        var ampm = hours >= 12 ? 'PM' : 'AM';
                                        hours = hours % 12;
                                        hours = hours ? hours : 12; // handle midnight
                                        minutes = minutes < 10 ? '0' + minutes : minutes;

                                        var formattedDate = hours + '.' + minutes + ' ' + ampm + ', ' + dayName + ' ' + day + ' ' + months[monthIndex] + ' ' + year;

                                        document.getElementById('formattedDate_' + timestamp).textContent = formattedDate + " ---> " + "<?= $pesanan['destinasi']['nama_destinasi'] ?>";
                                    </script>
                                </div>
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                        <p><?= $pesanan['tiket']['nama_tiket'] ?></p>
                                        <div class="d-lg-flex justify-content-between">
                                            <footer class="blockquote-footer <?= $statusClass ?>"><cite><?= $pesanan['status_tiket']?></cite></footer>
                                            <?php if ($pesanan['status_tiket'] == 'menunggu pembayaran') : ?>
                                                <form action="<?= BASEURL ?>/pesan/bukti_bayar_2" method="post" class="mb-2 px-1">
                                                    <input type="hidden" name="id" value="<?= $pesanan['id'] ?>">
                                                    <button type="submit" class="btn btn-secondary">Lanjutkan Pembayaran</button>
                                                </form>
                                                <form action="<?= BASEURL ?>/pesan/batal_pesan" method="post" class="px-1" onsubmit="return confirm('Apakah anda yakin ingin membatalkan pesanan ini?')">
                                                    <input type="hidden" name="id" value="<?= $pesanan['id'] ?>">
                                                    <button type="submit" class="btn btn-danger">Batalkan Pesanan</button>
                                                </form>
                                            <?php elseif ($pesanan['status_tiket'] == 'diproses') :?>
                                                <a href="<?= $pesanan['bukti_bayar'] ?>" class="blockquote-footer text-success mt-3">Lihat Bukti Pembayaran</a>
                                            <?php elseif ($pesanan['status_tiket'] == 'diterima') :?>
                                                <a href="<?= $pesanan['bukti_bayar'] ?>" class="blockquote-footer">Lihat Bukti Bayar</a>
                                            <?php endif; ?>
                                        </div>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
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