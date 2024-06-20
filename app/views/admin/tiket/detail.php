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
    <?php endforeach; ?>
</div>