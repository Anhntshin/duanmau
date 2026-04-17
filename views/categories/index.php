<?php
// Doc va xoa thong bao
$success = $_SESSION['success'] ?? null;
$error = $_SESSION['error'] ?? null;
unset($_SESSION['success'], $_SESSION['error']);
?>
<!-- Hien thi thong bao -->
<?php if($success): ?>
    <div class="alert alert-success"><?= $success ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>
<?php if($error): ?>
    <div class="alert alert-danger"><?= $error ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>
<div class="col-12">
    <div>
        <a href="<?= BASE_URL ?>?action=category/create" class="btn btn-primary">Them danh muc</a>
    </div>
    <!-- Danh sach danh muc -->
     <div class="table-responsive">
         <h2>Danh sach danh muc</h2>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($categories)): ?>
                    <tr>
                        <td colspan="3" class="text-center">Khong co danh muc nao</td>
                    </tr>
                <?php else: ?>
                <?php foreach($categories as $category): ?>
                <tr>
                    <td><?= $category['id'] ?></td>
                    <td><?= $category['name'] ?></td>
                    <td>
                        <a href="<?= BASE_URL ?>?action=category/edit&id=<?= $category['id'] ?>"
                        class="btn btn-warning">Sua</a>
                        <form method="POST"
                        action="<?= BASE_URL ?>?action=category/delete" class="d-inline">
                            <input type="hidden" name="id" value="<?= $category['id'] ?>">
                             <button type="submit"
                             class="btn btn-danger"
                             onclick="return confirm('Ban co chac chan muon xoa danh muc <?= $category['name'] ?>?')">Xoa</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
     </div>
</div>