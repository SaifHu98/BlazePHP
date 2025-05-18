<?php
\$title = "Permission Management";
ob_start(); ?>
<h2>Assign Permissions</h2>
<?php foreach (\$roles as \$role): ?>
<h3><?= \$role['name'] ?></h3>
<form method="POST" action="/admin/permissions/assign">
  <input type="hidden" name="role_id" value="<?= \$role['id'] ?>">
  <select name="action">
    <option value="view_users">View Users</option>
    <option value="edit_users">Edit Users</option>
    <option value="delete_users">Delete Users</option>
    <option value="manage_roles">Manage Roles</option>
  </select>
  <button type="submit">Assign</button>
</form>
<form method="POST" action="/admin/permissions/revoke">
  <input type="hidden" name="role_id" value="<?= \$role['id'] ?>">
  <input type="text" name="action" placeholder="Action to revoke">
  <button type="submit">Revoke</button>
</form>
<?php endforeach; ?>
<?php
\$content = ob_get_clean();
include __DIR__ . '/../../layouts/master.php';