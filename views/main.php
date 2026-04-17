<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?? 'Home' ?></title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-xxl bg-light justify-content-center">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-uppercase" href="<?= BASE_URL ?>"><b>Home</b></a>
            </li>
            <?php if(!empty($_SESSION['user'])): ?>
            <li class="nav-item">
                <a class="nav-link text-uppercase" href="<?= BASE_URL ?>?action=products"><b>Products</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-uppercase" href="<?= BASE_URL ?>?action=categories"><b>Categories</b></a>
            </li>
            <li class="nav-item">
                <span class="nav-link text-muted">Xin chao, <b><?= $_SESSION['user']['name'] ?></b></span>
            </li>
            <li class="nav-item">
                <a class="nav-link text-uppercase text-danger" href="<?= BASE_URL ?>?action=logout"><b>Dang xuat</b></a>
            </li>
            <?php else: ?>
            <li class="nav-item">
                <a class="nav-link text-uppercase" href="<?= BASE_URL ?>?action=login"><b>Dang nhap</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-uppercase" href="<?= BASE_URL ?>?action=register"><b>Dang ky</b></a>
            </li>
            <?php endif; ?>
        </ul>
    </nav>

    <div class="container">
        <h1 class="mt-3 mb-3"><?= $title ?? 'Home' ?></h1>

        <div class="row">
            <?php
            if (isset($view)) {
                require_once PATH_VIEW . $view . '.php';
            }
            ?>
        </div>
    </div>

</body>

</html>