<?php Flasher::flash() ?>
<form action="<?= BASEURL ?>/admin/tiket_store" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Nama Destinasi</label>
        <input type="text" class="form-control" required name="nama_destinasi">
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <input type="text" class="form-control" required name="deskripsi">
    </div>
    <div class="form-group">
        <label for="url_img">Gambar</label>
        <input type="text" class="form-control" required name="url_img">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="<?= BASEURL ?>/admin/tiket">kembali</a>
</form>