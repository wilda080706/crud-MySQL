<?php
    include 'koneksi.php';
    session_start();

    $query = "SELECT * FROM tb_siswa;";
    $sql = mysqli_query($conn, $query);
    $no = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- BOOSTRAP -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>belajar_awal</title>
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            CRUD - BS5
          </a>
        </div>
      </nav>

      <!-- judul -->
      <div class="container">
        <figure>
            <h2 class="mt-3">Data Siswa</h2>
            <blockquote class="blockquote">
              <p>Berisi data yang di simpan di database.</p>
            </blockquote>
            <figcaption class="blockquote-footer">
            CRUD <cite title="Source Title">Create Read Update Delete</cite>
            </figcaption>
        </figure>
            <a href="kelola.php" type="button" class="btn btn-primary mb-3">Tambah Data</a>

            <?php
                if(isset($_SESSION['lolos'])): 
            ?>
                   <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>
                            <?php
                                echo $_SESSION['lolos'];
                            ?>
                        </strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            <?php
            session_destroy();
                endif;
            ?>

            <div>
                <table class="table align-middle table-bordered table-hover">
                    <thead>
                    <tr>
                        <th><center>NO.</center></th>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while($result = mysqli_fetch_assoc($sql)){
                ?>
                    <tr>
                        <td><center>
                            <?php echo ++$no; ?>.
                        </center></td>
                        <td>
                            <?php echo $result['nisn'];?>
                        </td>
                        <td>
                            <?php echo $result['nama_siswa']; ?>
                        </td>
                        <td>
                            <?php echo $result['tanggal_lahir']; ?>
                        </td>
                        <td>
                            <?php echo $result['jenis_kelamin']; ?>
                        </td>
                        <td>
                            <?php echo $result['alamat']; ?>
                        </td>
                        <td>
                            <a href="kelola.php?ubah=<?php echo $result['id_siswa']; ?>" type="button" class="btn btn-success btn-sm">Ubah</a>
                            <a href="proses.php?hapus=<?php echo $result['id_siswa']; ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah anda yakin untuk menghapus data tersebut?')">Hapus</a>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
                </table>
            </div>
        </div>
</body>
</html>