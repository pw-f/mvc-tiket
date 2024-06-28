<?php Flasher::flash() ?>
<form action="<?= BASEURL ?>/admin/tiket_store" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_destinasi" value="<?= $data['destination']['id'] ?>">
    <div class="form-group">
        <label for="name">Nama Destinasi</label>
        <input type="text" class="form-control" disabled name="nama_destinasi" value="<?= $data['destination']['nama_destinasi'] ?>">
    </div>
    <div class="form-group">
        <label for="nama_tiket">Nama Tiket</label>
        <input type="text" class="form-control" required name="nama_tiket">
    </div>
    <div class="form-group">
        <label for="stok_tiket">Stok Tiket</label>
        <input type="number" class="form-control" required name="stok_tiket">
    </div>
    <div class="form-group">
        <label for="harga">Harga Tiket</label>
        <input type="number" class="form-control" required name="harga">
    </div>
    <div class="form-group d-flex">
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <a class="btn btn-secondary" href="<?= BASEURL ?>/admin/tiket">Kembali</a>
    </div>
</form>