<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>CMS</title>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/article">Articles</a>
                    </li>
                    <?php if (!isset($_SESSION['login'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/register">Register</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/logout">Logout</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>

        <?php if ($this->flashMessages) : ?>
            <?php foreach ($this->flashMessages as $msg) : ?>
            <div class="alert alert-<?= $msg['type'] ?>" role="alert">
                <?= $msg['msg'] ?>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
