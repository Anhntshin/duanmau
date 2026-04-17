<?php
$success = $_SESSION['success'] ?? null;
$error = $_SESSION['error'] ?? null;
unset($_SESSION['success'], $_SESSION['error']);
?>
<div class="col-md-6 mx-auto">
    <?php if($success): ?>
        <div class="alert alert-success"><?= $success ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>
    <?php if(!empty($error)): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach($error as $err): ?>
                    <li><?= $err ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body">
            <form action="<?= BASE_URL ?>?action=login/process" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Nhap email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mat khau</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Nhap mat khau">
                </div>
                <button type="submit" class="btn btn-primary w-100">Dang nhap</button>
            </form>
            <hr>
            <p class="text-center mb-0">Chua co tai khoan?
                <a href="<?= BASE_URL ?>?action=register">Dang ky</a>
            </p>
        </div>
    </div>
</div>