<?php
\$title = "Create User";
ob_start(); ?>
<h2>Create New User</h2>
<form method="POST" action="/admin/users/store">
<input type="text" name="username" placeholder="Username" required><br>
<input type="password" name="password" placeholder="Password" required><br>
<select name="role_id">
<?php foreach (\$roles as \$role): ?>
<option value="<?= \$role['id'] ?>"><?= \$role['name'] ?></option>
<?php endforeach; ?>
</select><br>
<button type="submit">Create</button>
</form>
<?php
\$content = ob_get_clean();
include __DIR__ . '/../../layouts/master.php';