<?php getLoginAccount();?>
<h1>Welcome back "<?= $_SESSION['user']['nama'] ?>"</h1>
<?php foreach ($data['coment'] as $item) : ?>
    <h3><?= $item['name'] ?></h3>
    <p><?= $item['email'] ?></p>
    <p><?= $item['message'] ?></p>
<?php endforeach; ?>


<!-- sidebar nanti ini -->
<a href="<?= BASEURL ?>/admin/destination">kelola destinasi</a>
<br>
<a href="<?= BASEURL ?>/admin/tiket">kelola tiket</a>
