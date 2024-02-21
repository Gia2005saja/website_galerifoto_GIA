<?php

session_start();
include 'koneksi.php';

if (isset($_POST['tambah'])) {
              $judul_foto = $_POST['judul_foto'];
              $deskripsi_foto = $_POST['deskripsi_foto'];
              $album_id = $_POST['album_id'];
              $tanggal_unggah = date('Y-m-d');
              $user_id = $_SESSION['id'];
              $foto = $_FILES['lokasi_file']['name'];
              $tmp = $_FILES['lokasi_file']['tmp_name'];
              $lokasi = '../assets/img/';
              $namafoto = rand().'-'.$foto;

              move_uploaded_file($tmp, $lokasi.$namafoto);

              $sql = mysqli_query($koneksi, "INSERT INTO foto VALUES('','$judul_foto','$deskripsi_foto','$tanggal_unggah','$namafoto','$album_id',' $user_id')");

              echo "<script>
              alert('Data berhasil disimpan!');
              location.href='../admin/foto.php';
              </script>";
}
if (isset($_POST['edit'])) {
              $id = $_POST['id'];
              $judul_foto = $_POST['judul_foto'];
              $deskripsi_foto = $_POST['deskripsi_foto'];
              $album_id = $_POST['album_id'];
              $tanggal_unggah = date('Y-m-d');
              $user_id = $_SESSION['id'];
              $foto = $_FILES['lokasi_file']['name'];
              $tmp = $_FILES['lokasi_file']['tmp_name'];
              $lokasi = '../assets/img/';
              $namafoto = rand().'-'.$foto;

              if (isset($foto) && !empty($foto)){
                            $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE id='$id'");
                            $data = mysqli_fetch_array($query);
                            if (is_file('../assets/img/'.$data['lokasi_file'])){
                                          unlink('../assets/img/'.$data['lokasi_file']);
                            }

              move_uploaded_file($tmp, $lokasi.$namafoto);
              $sql = mysqli_query($koneksi, "UPDATE foto SET judul_foto='$judul_foto',deskripsi_foto='$deskripsi_foto',tanggal_unggah='$tanggal_unggah',lokasi_file='$namafoto',album_id='$album_id' WHERE id='$id'");
              }else{
               $sql = mysqli_query($koneksi, "UPDATE foto SET judul_foto='$judul_foto',deskripsi_foto='$deskripsi_foto',tanggal_unggah='$tanggal_unggah',album_id='$album_id' WHERE id='$id'"); 
              }

              echo "<script>
              alert('Data berhasil diperbaharui!');
              location.href='../admin/foto.php';
              </script>";
}
              if (isset($_POST['hapus'])) {
                            $id = $_POST['id'];
                            $fotoid = $_POST['foto'];
                            $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE id=$id");
                            $data = mysqli_fetch_array($query);
                            if (is_file('../assets/img/'.$data['lokasi_file'])){
                                          unlink('../assets/img/'.$data['lokasi_file']);
                            }
              
                            $sql = mysqli_query($koneksi, "DELETE FROM foto WHERE id=$id");
                            echo "<script>
                            alert('Data berhasil dihapus!');
                            location.href='../admin/foto.php';
                            </script>";
              }
