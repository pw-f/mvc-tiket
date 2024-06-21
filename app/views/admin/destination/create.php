<?php Flasher::flash() ?>
<form action="<?= BASEURL ?>/admin/destination_store" class="text-dark" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Nama Destinasi</label>
        <input type="text" class="form-control input-default" required name="nama_destinasi">
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <input type="text" class="form-control input-default" required name="deskripsi">
    </div>
    <div class="form-group mb-3">
        <label for="url_img">Upload image</label>
        <input type="file" class="form-control-file" required name="url_img">
    </div>
    <div class="d-flex mt-4">
        <button type="submit" class="btn btn-primary mr-3">Submit</button>
        <a href="<?= BASEURL ?>/admin/destination" class="btn btn-secondary">Kembali</a>
    </div>
</form>