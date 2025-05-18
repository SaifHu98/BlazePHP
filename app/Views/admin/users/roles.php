<?php
\$title = "Manage Roles";
ob_start(); ?>
<h2>Roles</h2>
<form method="POST" action="/admin/roles/store">
  <input type="text" name="name" placeholder="New role name" required>
  <button type="submit">Add Role</button>
</form>
<table border="1" cellpadding="5" cellspacing="0">
<tr><th>ID</th><th>Name</th><th>Change</th></tr>
<?php foreach (\$roles as \$role): ?>
<tr>
  <td><?= \$role['id'] ?></td>
  <td><?= \$role['name'] ?></td>
  <td>
    <form method="POST" action="/admin/roles/update">
      <input type="hidden" name="id" value="<?= \$role['id'] ?>">
      <input type="text" name="name" value="<?= \$role['name'] ?>" required>
      <button type="submit">Update</button>
    </form>
  </td>
</tr>
<?php endforeach; ?>
</table>
<?php
\$content = ob_get_clean();
include __DIR__ . '/../../layouts/master.php';