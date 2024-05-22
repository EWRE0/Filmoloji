<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş/Kayıt</title>
    <link rel="stylesheet" href="CSS/styles.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Giriş Yap</h2>
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="username">Kullanıcı Adı:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Şifre:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Giriş Yap</button>
            </form>
        </div>
        <div class="form-container">
            <h2>Kayıt Ol</h2>
            <form action="register.php" method="POST">
                <div class="form-group">
                    <label for="new_username">Kullanıcı Adı:</label>
                    <input type="text" id="new_username" name="new_username" required>
                </div>
                <div class="form-group">
                    <label for="new_password">Şifre:</label>
                    <input type="password" id="new_password" name="new_password" required>
                </div>
                <button type="submit">Kayıt Ol</button>
            </form>
        </div>
    </div>
</body>
</html>
