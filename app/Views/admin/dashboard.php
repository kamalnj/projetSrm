<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.css'); ?>">
</head>
<body>
    <div class="dashboard-container">
        <h2>Welcome, Admin!</h2>
        <p>Manage your suppliers and view details here.</p>
        
        <h3>Supplier List</h3>
        <ul>
            <?php foreach ($suppliers as $supplier): ?>
                <li><?= $supplier->name ?> - <?= $supplier->email ?></li>
            <?php endforeach; ?>
        </ul>
        <a href="<?= route_to('logout') ?>">Logout</a>
    </div>
</body>
</html>
