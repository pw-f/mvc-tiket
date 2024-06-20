<div class="row">
    <div class="col">
        <?php Flasher::flash() ?>
    </div>

    <div class="col-lg-12 mt-3">
      <div class="card">
          <div class="card-header">
              <h4 class="card-title">Kelola Destinasi</h4>
              <a class="btn btn-primary" href="<?= BASEURL ?>/admin/destination_create">Tambah Destinasi</a>

          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-responsive-sm">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Nama Destinasi</th>
                              <th>Deskripsi</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php foreach ($data['destination'] as $item) : ?>
                            <tr>
                                <th scope="row"><?= $item['id'] ?></th>
                                <td><?= $item['nama_destinasi'] ?></td>
                                <td><?= $item['deskripsi'] ?></td>
                                <td>
                                    <span class="d-flex">
                                        <a href="<?= BASEURL ?>/admin/destination_edit/<?= $item['id'] ?>" class="mr-2" data-toggle="tooltip"
                                            data-placement="top" title="Edit"><i
                                                class="mdi mdi-pencil color-muted btn btn-sm btn-warning"></i> </a>
                                        <button class="btn btn-danger btn-sm" onclick="klik(<?= $item['id'] ?>)"><i class="mdi mdi-delete"></i></button>
                                    </span>                                    
                                </td>
                            </tr>
                          <?php endforeach; ?>
                          <!-- <tr>
                              <th>1</th>
                              <td>Kolor Tea Shirt For Man</td>
                              <td><span class="badge badge-primary">Sale</span>
                              </td>
                              <td>January 22</td>
                              <td class="color-primary">$21.56</td>
                          </tr> -->
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
</div>

<script>
    function klik(id) {
        if (confirm('Yakin mau hapus?')) {
            window.location.href = '<?= BASEURL ?>/admin/destination_delete/' + id;
        }
    }
</script>