<?php Flasher::flash() ?>
<form action="<?= BASEURL ?>/admin/tiket_update/<?= $data['tiket']['id'] ?>" method="post">
    <div class="form-group">
        <label for="nama_destinasi">Nama Destinasi</label>
        <input type="text" class="form-control" name="nama_destinasi" value="<?= $data['tiket']['nama_destinasi'] ?>">
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <input type="text" class="form-control" name="deskripsi" value="<?= $data['tiket']['deskripsi'] ?>">
    </div>
    <div class="form-group">
        <label for="url_img">Gambar</label>
        <input type="text" class="form-control" name="url_img" value="<?= $data['tiket']['url_img'] ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="<?= BASEURL ?>/admin/tiket">kembali</a>
</form>