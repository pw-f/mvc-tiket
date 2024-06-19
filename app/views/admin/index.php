<?php getLoginAccount();?>



    <div class="content-wrap">
      <div class="main">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-8 p-r-0 title-margin-right">
              <div class="page-header">
                <div class="page-title">
                  <h1>Hello, <span>Welcome Here <?= $_SESSION['user']['nama'] ?></span></h1>
                </div>
              </div>
            </div>
            <!-- /# column -->
            <div class="col-lg-4 p-l-0 title-margin-left">
              <div class="page-header">
                <div class="page-title">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">UI-Blank</li>
                  </ol>
                </div>
              </div>
            </div>
            <!-- /# column -->
          </div>
          <!-- /# row -->
          <section id="main-content">
            <div class="row">
              <div class="col-lg-12">
              <div class="card">
                    <div class="card-title">
                        <h4>Semua Pesan dari User </h4>
                        
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Telfon</th>
                                        <th>Messeges</th>
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>