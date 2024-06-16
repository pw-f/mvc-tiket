<?php foreach ($data['coment'] as $item) : ?>
    <h3><?= $item['name'] ?></h3>
    <p><?= $item['email'] ?></p>
    <p><?= $item['message'] ?></p>
<?php endforeach; ?>
