<?php getLoginAccount();?>


<div class="row page-titles mx-0">
  <div class="col-sm-6 p-md-0">
      <div class="welcome-text">
          <h4>Hi, welcome back!</h4>
          <span class="ml-1"><?= $_SESSION['user']['nama'] ?></span>
      </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-12">
      <div class="card">
          <div class="card-header">
              <h4 class="card-title">Semua Pesan dari User</h4>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-responsive-sm table-striped text-dark">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Message</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php foreach ($data['coment'] as $item) : ?>
                            <tr>
                                <th scope="row"><?= $item['id'] ?></th>
                                <td><?= $item['name'] ?></td>
                                <td><?= $item['email'] ?></td>
                                <td><?= $item['phone'] ?></td>
                                <td><?= $item['message'] ?></td>
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