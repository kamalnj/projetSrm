<!-- app/Views/supplier/dashboard.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.css'); ?>">
</head>
<body>
    <div class="dashboard-container">
        <h2>Welcome, Supplier!</h2>
        <p>View your contract details and manage your profile.</p>
        
        <h3>Your Contracts</h3>
        <ul>
            <?php foreach ($contracts as $contract): ?>
                <li><?= $contract->title ?> - <?= $contract->status ?></li>
            <?php endforeach; ?>
        </ul>
        <a href="<?= route_to('logout') ?>">Logout</a>
    </div>
</body>
</html>
