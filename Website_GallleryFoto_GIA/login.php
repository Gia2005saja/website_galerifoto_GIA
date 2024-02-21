<!DOCTYPE html> //HALAMAN HOME
<html lang="en">
<head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title>photo gallery website</title>
              <link rel="stylesheet" href="assets/css/style_login.css">
</head>
<body>
              <div class="container">
              <h2>Masuk</h2>
              <form action="config/aksi_login.php" method="POST" enctype="multipart/form-data">
                            <label for="username">Nama pengguna</label>
                            <input type="text" id="username" name="username" required>
                            <label for="password">Kata sandi</label>
                            <input type="password" id="password" name="password" required>
                            <input type="submit" value="masuk sekarang">
              </form>
              <div class="signin-link">
                            <p>Tidak memiliki akun? <a href="register.php">Daftar sekarang!</a></p>
              </div>
              </div>
</body>
</html>