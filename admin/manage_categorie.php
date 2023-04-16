<?php
    include('functions.php');
    $pdo = pdo_connect_mysql();
    $query = $pdo->prepare('SELECT * FROM categorie_table');
    $query->execute();
    $categories = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<?= navbar(); ?>
<div class="container">
<a href="../admin/add_categorie.php" class="btn btn-success">Add New categorie</a>
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
        <?php foreach ($categories as $item) : ?>
            <tr>
                <th scope="row"><?= $item['id'] ?></th>
                <th><?= $item['title'] ?></th>
                <th> <img src="../admin/images/categorie/<?= $item['image_name'] ?>" width="50px" height="50px" alt=""></th>
                <th><?= $item['featured'] ?></th>
                <th><?= $item['active'] ?></th>
                <th>
                    <a href="delete_admin.php?id=<?= $item['id'] ?>" class="btn btn-danger">delete</a>
                </th>
            </tr>
    </tbody>
</div>
        <?php endforeach; ?>

        <?php footer() ?>