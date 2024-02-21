<?php
session_start();
include '../config/koneksi.php';
if ($_SESSION['status'] != 'login') {
  echo "<script>
    alert('Anda belum Login!');
    location.href='../admin/home.php';
    </script>";
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" conctent="width=device-width, initial-scale=1">
  <title>photo gallery website</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    body {
      background-color: white;
    }
  </style>
</head>

<body>
<input type="checkbox" id="nav-tonggle">
<div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="bi bi-camera-fill"></span> Website Galeri Foto</h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href ="index.php"><span class="bi bi-box2-heart"></span>
                    <span>Album saya</span></a>
                </li>
                <li>
                    <a href ="home.php"><span class="bi bi-house-heart"></span>
                    <span>Home</span></a>
                </li>
                <li>
                    <a href ="foto.php"><span class="bi bi-images"></span>
                    <span>Foto</span></a>
                </li>
                <li>
                    <a href ="album.php" class="active"><span class="bi bi-image-alt"></span>
                    <span>Album</span></a>
                </li>
          
            </ul>
        
        </div>
    </div>
      <div class="main-content">
        <header>
            <h2>
                <label for="nav-tonggle">
                    <span class="bi bi-justify"></span>
                </label>
                Buat Album
            </h2>
            
            <div class="user-wrapper">
                <div>
                <a href="../config/aksi_logout.php" class="btn btn-light m-1">Keluar</a>
                </div>
            </div>
        </header>
    </div>
    <!-- kolom tambah album -->
  <div class="container"> 
    <div class="row">
      <div class="col-md-9">
        <div class="card mt-6">
          <div class="card-header">Tambah Album</div>
          <div class="card-body">
            <form action="../config/aksi_album.php" method="POST">
              <label class="form-label">Nama Album</label>
              <input type="text" name="nama_album" class="form-control" required>
              <label class="form-label">Deskripsi</label>
              <textarea class="form-control" name="deskripsi" required></textarea>
              <button type="submit" class="btn btn-primary mt-2" name="tambah">Tambah Data</button>
            </form>
          </div>
        </div>
      </div>
      <!-- tabel data album -->
      <div class="col-md-9">
        <div class="card mt-4">
          <div class="card-header">Data Album</div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Album</th>
                  <th>Deskripsi</th>
                  <th>Tanggal</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <!-- perintah untuk menampilkan data album pada tabel data album -->
                <?php
                $no = 1;
                $user_id = $_SESSION['id'];
                $sql = mysqli_query($koneksi, "SELECT * FROM album WHERE user_id='$user_id'");
                // perulangan
                while ($data = mysqli_fetch_array($sql)) { 
                ?>
                
                <!-- looping data -->
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $data['nama_album'] ?></td>
                    <td><?php echo $data['deskripsi'] ?></td>
                    <td><?php echo $data['tanggal_dibuat'] ?></td>
                    <td>
                     

                      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="
                              #edit<?php echo $data['id'] ?>"> 
                        Edit
                      </button>
                        <!-- modal -->
                      <div class="modal fade" id="edit<?php echo $data['id'] ?>" tabindex="-1" aria-labelledby="
                              exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="../config/aksi_album.php" method="POST">
                              <input type="hidden" name="id"value="<?php echo $data['id']?>">
                                  <label class="form-label">Nama Album</label>
                                      <input type="text" name="nama_album" value="<?php echo $data['nama_album'] ?>" class="form-control"required>
                                    <label class="form-label">Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" required>
                                      <?php echo $data['deskripsi']?>
                                    </textarea>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" name="edit" class="btn btn-success">Edit Data
                              </button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="
                              #hapus<?php echo $data['id'] ?>">
                        Hapus
                      </button>

                      <div class="modal fade" id="hapus<?php echo $data['id'] ?>" tabindex="-1" aria-labelledby="
                              exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="../config/aksi_album.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                                <input type="hidden" name="album" value="<?php echo $data['nama_album'] ?>">
                                Apakah anda yakin akan menghapus data <strong> <?php echo $data['nama_album'] ?> </strong>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" name="hapus" class="btn btn-danger">Hapus Data
                              </button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>