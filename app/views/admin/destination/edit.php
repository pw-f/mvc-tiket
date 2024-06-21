<?php Flasher::flash() ?>
<form action="<?= BASEURL ?>/admin/destination_update/<?= $data['destination']['id'] ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nama_destinasi">Nama Destinasi</label>
        <input type="text" class="form-control" name="nama_destinasi" value="<?= $data['destination']['nama_destinasi'] ?>">
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <input type="text" class="form-control" name="deskripsi" value="<?= $data['destination']['deskripsi'] ?>">
    </div>
    <div class="form-group mb-4">
        <?php if ($data['destination']['url_img'] != '') : ?>
            <label for="url_img">Gambar Sebelumnya :</label>
            <div class="col-md-6 mb-3">
                    <img src="<?= $data['destination']['url_img'] ?>" alt="<?= $data['destination']['nama_destinasi'] ?>" class="img-fluid img-thumbnail">
            </div>
        <?php endif; ?>
        <input type="hidden" name="gambar_lama" value="<?= $data['destination']['url_img'] ?>">
        <input type="file" class="form-control-file" name="url_img">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary mr-3">Submit</button>
        <a href="<?= BASEURL ?>/admin/destination" class="btn btn-secondary">Kembali</a>
    </div>
</form>