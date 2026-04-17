<?php
$error = $_SESSION['error'] ?? null;
unset($_SESSION['error']);
?>
<div class="col-md-6 mx-auto">
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
            <form action="<?= BASE_URL ?>?action=register/process" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Ho ten</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nhap ho ten">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Nhap email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mat khau</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Nhap mat khau (it nhat 6 ky tu)">
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Xac nhan mat khau</label>
                    <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Nhap lai mat khau">
                </div>
                <button type="submit" class="btn btn-success w-100">Dang ky</button>
            </form>
            <hr>
            <p class="text-center mb-0">Da co tai khoan?
                <a href="<?= BASE_URL ?>?action=login">Dang nhap</a>
            </p>
        </div>
    </div>
</div>