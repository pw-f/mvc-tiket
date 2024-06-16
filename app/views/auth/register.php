<?php Flasher::flash();?>
<h1>halaman register mas</h1>
<form action="<?= BASEURL ?>/register/store" method="post">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
        <label for="no_telp" class="form-label">No Telp</label>
        <input type="tel" class="form-control" id="no_telp" name="no_telp">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>