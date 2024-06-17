<?php Flasher::flash() ?>
<form action="<?= BASEURL ?>/admin/destination_update/<?= $data['destination']['id'] ?>" method="post">
    <div class="form-group">
        <label for="nama_destinasi">Nama Destinasi</label>
        <input type="text" class="form-control" name="nama_destinasi" value="<?= $data['destination']['nama_destinasi'] ?>">
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <input type="text" class="form-control" name="deskripsi" value="<?= $data['destination']['deskripsi'] ?>">
    </div>
    <div class="form-group">
        <label for="url_img">Gambar</label>
        <input type="text" class="form-control" name="url_img" value="<?= $data['destination']['url_img'] ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="<?= BASEURL ?>/admin/destination">kembali</a>
</form>