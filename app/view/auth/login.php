<!DOCTYPE html>
<html>
<head>
    <title>Fortal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    <form action="<?= URL ?>auth/login" method="post">
        <?php
        if ($error): ?>
            <span>Username atau Password anda salah!</span>
        <?php endif ?>
        <div>
            <label for="username">Username</label>
            <div>
                <input type="text" name="username">
            </div>
        </div>
        <div>
            <label for="userName">Password</label>
            <div>
                <input type="password" name="password">
            </div>
        </div>
        <div>
            <button type="submit">Login</button>
            <a href="<?= URL ?>auth/forgot">Lupa Password</a>
        </div>
    </form>
</body>
</html>
