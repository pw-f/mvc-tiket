<?php Flasher::flash() ?>
<a href="<?= BASEURL ?>/admin/destination_create">Tambah Destinasi</a>
<?php foreach ($data['destination'] as $item) : ?>
    <h3><?= $item['nama_destinasi'] ?></h3>
    <a href="<?= BASEURL ?>/admin/destination_edit/<?= $item['id'] ?>">edit</a>
    <button onclick="klik(<?= $item['id'] ?>)">hapus</button>
    <p><?= $item['deskripsi'] ?></p>
    <img src="<?= $item['url_img'] ?>" alt="<?= $item['nama_destinasi'] ?>">
<?php endforeach; ?>

<script>
    function klik(id) {
        if (confirm('Yakin mau hapus?')) {
            window.location.href = '<?= BASEURL ?>/admin/destination_delete/' + id;
        }
    }
</script>
