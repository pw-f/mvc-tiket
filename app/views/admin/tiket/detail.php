<div class="col">
    <h2 class="d-flex align-items-center">
        <a class="btn btn-sm text-dark fw-bold" href="<?= BASEURL ?>/admin/tiket" aria-label="Kembali ke halaman tiket">
            <i class="mdi mdi-arrow-left"></i>
        </a>
        <?= $data['destination']['nama_destinasi'] ?>
    </h2>
    <div>
        <img src="<?= $data['destination']['url_img'] ?>" width="400px" alt="<?= $data['destination']['nama_destinasi'] ?>" class="img-fluid mb-3">
    </div>
    
    <a class="btn btn-primary mb-3" href="<?= BASEURL ?>/admin/tiket_create/<?= $data['id'] ?>">Tambah Tiket untuk Destinasi Ini</a>
    
    <div class="table-responsive mt-4">
        <table class="table table-striped text-dark">
            <thead>
                <tr>
                    <th>Nama Tiket</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['tiket'] as $ticket) : ?>
                    <tr>
                        <td><?= $ticket['nama_tiket'] ?></td>
                        <td><?= $ticket['stok_tiket'] ?></td>
                        <td><?= $ticket['harga'] ?></td>
                        <td>
                            <a href="<?= BASEURL ?>/admin/tiket_edit/<?= $ticket['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="<?= BASEURL ?>/admin/tiket_delete/<?= $ticket['id'] ?>" onclick="return confirm('Yakin mau hapus tiket?')" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
