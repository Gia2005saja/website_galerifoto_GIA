<!DOCTYPE html> //HALAMAN REGISTER
<html lang="en">
<head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title>photo gallery website</title>
              <link rel="stylesheet" href="assets/css/style_login.css">
</head>
<body>
              <div class="container">
              <h2>Registrasi</h2>
              <form action="config/aksi_register.php" method="POST" enctype="multipart/form-data">
                            <label for="username">Nama pengguna</label>
                            <input type="text" id="username" name="username" required>
                            <label for="email">Alamat email</label>
                            <input type="email" id="email" name="email" required>
                            <label for="password">Kata sandi</label>
                            <input type="password" id="password" name="password" required>
                            <label for="nama lengkap">Nama lengkap</label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap" required>
                            <label for="alamat">Alamat</label>
                            <input type="text" id="alamat" name="alamat" required>
                            <input type="submit" value="Daftar">
              </form>
              <div class="signin-link">
                            <p>Sudah memiliki akun? <a href="login.php">Masuk</a></p>
              </div>
              </div>
</body>
</html>