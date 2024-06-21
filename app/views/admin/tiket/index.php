<div class="row">
    <?php Flasher::flash() ?>
    <?php foreach ($data['destination'] as $item) : ?>
        <div class="col-xl-4 col-xxl-6 col-lg-6 col-sm-6">
            <div class="card mb-3">
                <img class="card-img-top img-fluid" src="<?= $item['url_img'] ?>" alt="Card image cap">
                <div class="card-header">
                    <h5 class="card-title"><?= $item['nama_destinasi'] ?></h5>
                </div>
                <div class="card-body text-dark">
                    <p class="card-text">Tiket yang tersedia pada destinasi : <?= $item['nama_destinasi'] ?></p>
                    <?php $tiket_ada = false; ?>
                    <?php foreach ($data['tiket'] as $items) : ?>
                        <?php if ($items['id_destinasi'] == $item['id']) : ?>
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    var hargajs = <?= $items['harga'] ?>;
                                    const rupiah = new Intl.NumberFormat("id", {
                                        style: "currency",
                                        currency: "IDR",
                                        minimumFractionDigits: 0
                                    }).format(hargajs);

                                    var hargaElement = document.getElementById('harga-tiket-<?= $items['id'] ?>');
                                    if (hargaElement) {
                                        hargaElement.innerText = rupiah;
                                    }
                                });
                            </script>
                            <div class="text-white alert alert-secondary solid d-flex align-items-center justify-content-between">
                                <p class="card-text"><?= $items['nama_tiket'] ?></p>
                                <p class="card-text badge badge-primary" id="harga-tiket-<?= $items['id'] ?>"></p>
                            </div>
                            <?php $tiket_ada = true; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <?php if (!$tiket_ada) : ?>
                        <p class="card-text">Belum tersedia tiket pada destinasi ini...</p>
                    <?php endif; ?>
                </div>
                <div class="card-footer">
                    <!-- <p class="card-text d-inline">Card footer</p> -->
                    <a href="<?= BASEURL ?>/admin/tiket_detail/<?= $item['id'] ?>" class="card-link float-right">Lihat Detail pada Destinasi ini</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
