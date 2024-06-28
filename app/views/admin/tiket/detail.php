<div class="col">
    <a class="btn btn-secondary" href="<?= BASEURL ?>/admin/tiket">kembali</a>
    <a class="btn btn-primary" href="<?= BASEURL ?>/admin/tiket_create/<?= $data['id'] ?>">tambah tiket untuk destinasi ini</a>
    <h2><?= $data['destination']['nama_destinasi'] ?></h2>
    <img src="<?= $data['destination']['url_img'] ?>" width="400px" alt="<?= $data['destination']['nama_destinasi'] ?>">

    <?php foreach ($data['tiket'] as $ticket) : ?>
        <div>
            <h4><?= $ticket['nama_tiket'] ?></h4>
            <p><?= $ticket['stok_tiket'] ?></p>
            <p><?= $ticket['harga'] ?></p>
        </div>
        <div>
            <a href="<?= BASEURL ?>/admin/tiket_edit/<?= $ticket['id'] ?>" class="btn btn-primary">edit</a>
            <a href="<?= BASEURL ?>/admin/tiket_delete/<?= $ticket['id'] ?>" onclick="return confirm('yakin mau hapus tiket?')" class="btn btn-danger">hapus</a>
        </div>
    <?php endforeach; ?>
</div>