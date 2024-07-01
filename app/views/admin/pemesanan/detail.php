<div class="row">
    <div class="col">
        <?php Flasher::flash() ?>
    </div>

    <div class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Detail Pesanan <?= $data['user']['nama'] ?></h4>
            </div>
            <div class="card-body">
                <form action="<?= BASEURL ?>/admin/pemesanan_update" method="post">
                    <input type="hidden" name="id" value="<?= $data['pemesanan']['id'] ?>">
                    <div class="form-group">
                        <label for="username">Nama</label>
                        <input type="text" class="form-control" value="<?= $data['user']['nama'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="username">Nama Destinasi</label>
                        <input type="text" class="form-control" value="<?= $data['destinasi']['nama_destinasi'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="username">Nama tiket</label>
                        <input type="text" class="form-control" value="<?= $data['tiket']['nama_tiket'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="username">Jumlah Pesanan</label>
                        <input type="text" class="form-control" value="<?= $data['pemesanan']['qty'] ?> Tiket" readonly>
                    </div>
                    <div class="form-group">
                        <label for="username">Total Harga</label>
                        <script>
                             document.addEventListener("DOMContentLoaded", function() {
                                var totalHarga = <?= $data['pemesanan']['total_price'] ?>;
                                const formatter = new Intl.NumberFormat('id-ID', {
                                    style: 'currency',
                                    currency: 'IDR',
                                    minimumFractionDigits: 0
                                })

                                var harga = document.getElementById('total-harga');

                                harga.value = formatter.format(totalHarga);
                            });
                        </script>
                        <input type="text" id="total-harga" class="form-control" value="0" readonly>
                    </div>
                    
                    <?php if ($data['pemesanan']['status_tiket'] == 'menunggu pembayaran') : ?>
                        <div class="form-group">
                            <label for="username">Status Pemesanan</label>
                            <input type="text" class="form-control" value="<?= $data['pemesanan']['status_tiket'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <a href="<?= BASEURL ?>/admin/pemesanan" class="btn btn-secondary">Kembali</a>
                        </div>
                    <?php elseif ($data['pemesanan']['status_tiket'] == 'dibatalkan') : ?>
                        <div class="form-group">
                            <label for="username">Status Pemesanan</label>
                            <input type="text" class="form-control text-danger" value="<?= $data['pemesanan']['status_tiket'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <a href="<?= BASEURL ?>/admin/pemesanan" class="btn btn-secondary">Kembali</a>
                        </div>
                    <?php elseif ($data['pemesanan']['status_tiket'] == 'diterima') : ?>
                        <label for="username">Bukti pembayaran:</label>
                        <div class="form-group">
                            <input type="hidden" value="<?= $data['pemesanan']['bukti_bayar'] ?>">
                            <img  class="img-fluid col-3" src="<?= $data['pemesanan']['bukti_bayar'] ?>" alt="<?= $data['pemesanan']['bukti_bayar'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="username">Status Pemesanan</label>
                            <input type="text" class="form-control text-success" value="<?= $data['pemesanan']['status_tiket'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <a href="<?= BASEURL ?>/admin/pemesanan" class="btn btn-secondary">Kembali</a>
                        </div>
                    <?php elseif ($data['pemesanan']['status_tiket'] == 'diproses') : ?>
                        <label for="username">Bukti pembayaran:</label>
                        <div class="form-group">
                            <input type="hidden" value="<?= $data['pemesanan']['bukti_bayar'] ?>">
                            <img  class="img-fluid col-3" src="<?= $data['pemesanan']['bukti_bayar'] ?>" alt="<?= $data['pemesanan']['bukti_bayar'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="username">Status Pemesanan</label>
                            <select name="status_tiket" class="form-control mb-2">
                                <option selected><?= $data['pemesanan']['status_tiket'] ?></option>
                                <option value="diterima">terima</option>
                                <option value="dibatalkan">tolak</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Update</button>
                            <a href="<?= BASEURL ?>/admin/pemesanan" class="btn btn-secondary">Kembali</a>
                        </div>
                    <?php endif ?>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function searchTable() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toLowerCase();
        table = document.getElementById("ordersTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 1; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1]; // Assuming the user name is in the second column (index 1)
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toLowerCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }       
        }
    }
</script>
