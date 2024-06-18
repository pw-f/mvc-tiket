<?php Flasher::flash() ?>
<?php foreach ($data['destination'] as $item) : ?>
    <h2><?= $item['nama_destinasi'] ?></h2>
    <a href="<?= BASEURL ?>/admin/tiket_create/<?= $item['id'] ?>">tambah untuk destinasi <?= $item['nama_destinasi'] ?></a>
    <?php foreach ($data['tiket'] as $items) : ?>
        <?php if ($items['id_destinasi'] == $item['id']) : ?>
            <h4><?= $items['nama_tiket'] ?></h4>
            <h5><?= $items['harga'] ?></h5>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endforeach; ?>
