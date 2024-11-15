<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.css'); ?>">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?= session()->getFlashdata('error') ? '<div class="error">' . session()->getFlashdata('error') . '</div>' : ''; ?>
        
        <form method="post" action="<?= route_to('login') ?>">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?= old('email') ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <div class="register-link">
            <p>Don't have an account? <a href="<?= route_to('register') ?>">Register here</a></p>
        </div>
    </div>
</body>
</html>
