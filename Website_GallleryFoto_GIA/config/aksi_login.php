<?php //AKSI_LOGIN.PHP
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($sql);

if ($cek > 0) {
              $data = mysqli_fetch_array($sql);
              $_SESSION['username'] = $data['username'];
              $_SESSION['id'] = $data['id'];
              $_SESSION['status'] = 'login';

              echo "<script>
              alert('Berhasil masuk');
              location.href='../admin/home.php';
              </script>";

}else{
              echo "<script>
              alert('Nama pengguna atau kata sandi salah!');
              location.href='../login.php';
              </script>";
}
?>