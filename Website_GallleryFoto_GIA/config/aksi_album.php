<?php
session_start();
include 'koneksi.php';

if (isset($_POST['tambah'])) {
              $nama_album = $_POST['nama_album'];
              $deskripsi = $_POST['deskripsi'];
              $tanggal_dibuat = date('Y-m-d');
              $user_id = $_SESSION['id'];

              $sql = mysqli_query($koneksi, "INSERT INTO album VALUES('','$nama_album','$deskripsi','$tanggal_dibuat','$user_id')");

              echo "<script>
              alert('Data berhasil disimpan!');
              location.href='../admin/album.php';
              </script>";
}

if (isset($_POST['edit'])) {
              $album_id = $_POST['id'];
              $nama_album = $_POST['nama_album'];
              $deskripsi = $_POST['deskripsi'];
              $tanggal_dibuat = date('Y-m-d');
              $user_id = $_SESSION['id'];

              $sql = mysqli_query($koneksi, "UPDATE album SET nama_album='$nama_album',deskripsi='$deskripsi',tanggal_dibuat='$tanggal_dibuat' WHERE id='$album_id' ");

              echo "<script>
              alert('Data berhasil diperbaharui!');
              location.href='../admin/album.php';
              </script>";
}


if (isset($_POST['hapus'])) {
              $album_id = $_POST['id'];
              $sql = mysqli_query($koneksi, "DELETE FROM album WHERE id='$album_id'");

              echo "<script>
              alert('Data berhasil dihapus!');
              location.href='../admin/album.php';
              </script>";
}

?>