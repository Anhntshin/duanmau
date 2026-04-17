<?php
// Doc va xoa thong bao
$error = $_SESSION['error'] ?? null;
unset($_SESSION['error']);
?>
<div class="col-12">
    <!-- Thong bao loi -->
     <?php if(!empty($error)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach($error as $err): ?>
                    <li><?= $err ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <form action="<?= BASE_URL ?>?action=category/store" method="POST">
        <div class="mb-3">
        <label for="categoryName" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="categoryName" placeholder="Enter category name">
        </div>
        <button type="submit" class="btn btn-primary">Them danh muc</button>
        <a href="<?= BASE_URL ?>?action=categories" class="btn btn-secondary">Quay lai</a>
    </form>
</div>