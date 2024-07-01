<div class="row">
    <div class="col">
        <?php Flasher::flash() ?>
        <?php Flasher::flash_user() ?>
    </div>

    <div class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Kelola Pesanan User</h4>
                <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for users names.." class=" col-6 form-control mt-2">
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-sm table-striped text-dark" id="ordersTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama User</th>
                                <th>Nama Destinasi</th>
                                <th>Nama Tiket</th>
                                <th>Qty</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($data['pemesanan'] as $item) : ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <?php $i++; ?>
                                    <td><?= $item['nama_user'] ?></td>
                                    <td><?= $item['nama_destinasi'] ?></td>
                                    <td><?= $item['tiket_dipesan'] ?></td>
                                    <td><?= $item['jumlah_tiket_qty'] ?></td>
                                    <td><?= $item['total_bayar'] ?></td>
                                    <td>
                                        <?php if ($item['status_tiket'] == "menunggu pembayaran") : ?>
                                            <span class="badge badge-primary"><?= $item['status_tiket'] ?></span>
                                        <?php elseif ($item['status_tiket'] == "diproses") : ?>
                                            <span class="badge badge-warning"><?= $item['status_tiket'] ?></span>
                                        <?php elseif ($item['status_tiket'] == "dibatalkan") : ?>
                                            <span class="badge badge-danger"><?= $item['status_tiket'] ?></span>
                                        <?php elseif ($item['status_tiket'] == "diterima") : ?>
                                            <span class="badge badge-success"><?= $item['status_tiket'] ?></span>
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <span class="d-flex">
                                            <a href="<?= BASEURL ?>/admin/pemesanan_detail/<?= $item['id'] ?>" class="mr-2" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="mdi mdi-eye color-muted btn btn-sm btn-info"></i></a>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function klik(id) {
        if (confirm('Yakin mau hapus?')) {
            window.location.href = '<?= BASEURL ?>/admin/destination_delete/' + id;
        }
    }

    function searchTable() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toLowerCase();
        table = document.getElementById("ordersTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 1; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0]; // Assuming the user name is in the second column (index 1)
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
