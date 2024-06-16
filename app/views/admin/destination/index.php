<?php Flasher::flash() ?>
<a href="<?= BASEURL ?>/admin/destination_create">Tambah Destinasi</a>
<?php foreach ($data['destination'] as $item) : ?>
    <h3><?= $item['nama_destinasi'] ?></h3>
    <a href="<?= BASEURL ?>/admin/destination_edit/<?= $item['id'] ?>">edit</a>
    <a href="<?= BASEURL ?>/admin/destination_delete/<?= $item['id'] ?>">delete</a>
    <p><?= $item['deskripsi'] ?></p>
    <img src="<?= $item['url_img'] ?>" alt="<?= $item['nama_destinasi'] ?>">
<?php endforeach; ?>