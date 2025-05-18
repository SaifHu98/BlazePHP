<?php
\$title = "User Management";
ob_start(); ?>
<h2>User List</h2>
<a href="/admin/users/create">Add New User</a>
<table border="1">
<tr><th>ID</th><th>Username</th><th>Role</th><th>Actions</th></tr>
<?php foreach (\$users as \$user): ?>
<tr>
<td><?= \$user['id'] ?></td>
<td><?= \$user['username'] ?></td>
<td><?= \$roles[\$user['role_id']] ?? 'Unknown' ?></td>
<td>
  <form method="POST" action="/admin/users/delete">
    <input type="hidden" name="id" value="<?= \$user['id'] ?>">
    <button type="submit">Delete</button>
  </form>
</td>
</tr>
<?php endforeach; ?>
</table>
<?php
\$content = ob_get_clean();
include __DIR__ . '/../../layouts/master.php';