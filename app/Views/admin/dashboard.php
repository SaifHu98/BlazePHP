<?php
\$title = "Admin Dashboard";
ob_start(); ?>
<h1>Welcome to BlazePHP Admin Panel</h1>
<p>Manage users, settings, and more.</p>
<?php
\$content = ob_get_clean();
include __DIR__ . '/../layouts/master.php';