<?php
    include('functions.php');
    $pdo = pdo_connect_mysql();
    $query = $pdo->prepare('SELECT * FROM admin_table');
    $query->execute();
    $admins = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<?= navbar(); ?>
<a href="" class="btn btn-success">Add New Admin</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Full name</th>
            <th scope="col">Username</th>
            <th scope="col">action</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($admins as $item) : ?>
            <tr>
                <th scope="row"><?= $item['id'] ?></th>
                <th><?= $item['full_name'] ?></th>
                <th><?= $item['username'] ?></th>
                <th>
                    <a href="delete_admin.php?id=<?= $item['id'] ?>" class="btn btn-danger">delete</a>
                </th>
            </tr>
        <?php endforeach; ?>

        <?php footer() ?>