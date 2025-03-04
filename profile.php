<?php

include("vendor/autoload.php");

use Helpers\Auth;

$auth = Auth::check();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body class="text-center bg-info">
    <div class="container mt-4" style="max-width: 600px;">
        <h1 class="mb-5 mt-5">
            <?= $auth->name ?>
            <span class="fw-normal text-muted">
                (<?= $auth->role ?>)
            </span>
        </h1>

        <?php if (isset($_GET['error'])) : ?>
            <div class="alert alert-warning">Cannot upload file</div>
        <?php endif ?>

        <?php if ($auth->photo) : ?>
            <img src="_actions/photos/<?= $auth->photo ?>" class="img-thumbnail mb-3" alt="Profile Photo" style="border-radius: 30px; width: 200px; height: 200px;">
        <?php endif ?>

        <form action="_actions/upload.php" method="post" enctype="multipart/form-data">
            <div class="input-group mb-3">
                <input type="file" name="photo" class="form-control">
                <button class="btn btn-dark">Upload</button>
            </div>
        </form>

        <ul class="list-group">
            <li class="list-group-item"> <b>Email:</b> <?= $auth->email ?> </li>
            <li class="list-group-item"> <b>Phone:</b> <?= $auth->phone ?> </li>
            <li class="list-group-item"> <b>Address:</b> <?= $auth->address ?> </li>
        </ul> <br>

        <a href="admin.php">Manage Users</a>
        <a href="_actions/logout.php" class="text-danger">Logout</a>
    </div>
</body>

</html>