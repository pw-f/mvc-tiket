<div class="row">
    <?php Flasher::flash() ?>
    <?php foreach ($data['destination'] as $item) : ?>
        <div class="col-xl-4 col-xxl-6 col-lg-6 col-sm-6">
            <div class="card mb-3">
                <img class="card-img-top img-fluid" src="<?= $item['url_img'] ?>" alt="Card image cap">
                <div class="card-header">
                    <h5 class="card-title"><?= $item['nama_destinasi'] ?></h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Tiket yang tersedia pada destinasi : <?= $item['nama_destinasi'] ?></p>
                    <?php foreach ($data['tiket'] as $items) : ?>
                        <?php if ($items['id_destinasi'] == $item['id']) : ?>
                            <div class="alert alert-primary">
                                <p class="card-text"><?= $items['nama_tiket'] ?></p>
                                <p class="card-text"5><?= $items['harga'] ?></p>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="card-footer">
                    <!-- <p class="card-text d-inline">Card footer</p> -->
                    <a href="<?= BASEURL ?>/admin/tiket_detail/<?= $item['id'] ?>" class="card-link float-right">Lihat Tiket pada Destinasi ini</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>