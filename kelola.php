<!DOCTYPE html>

<?php
  include 'koneksi.php';
  session_start();


  $id_siswa = '';
  $nisn = '';
  $nama_siswa = '';
  $tanggal_lahir = '';
  $jenis_kelamin = '';
  $alamat ='';

  if(isset($_GET['ubah'])){
    $id_siswa = $_GET['ubah'];

    $query = "SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa';";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    $nisn = $result['nisn'];
    $nama_siswa = $result['nama_siswa'];
    $tanggal_lahir =$result['tanggal_lahir'];
    $jenis_kelamin = $result['jenis_kelamin'];
    $alamat =$result['alamat'];

  }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- BOOSTRAP -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>belajar_awal</title>
</head>
<body>
    <nav class="navbar bg-body-tertiary bg-lighnt mb-4">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            CRUD - BS5
          </a>
        </div>
    </nav>
      <div class="container">
        <form method="POST" action="proses.php">
          <input type="hidden" value= "<?php  echo $id_siswa; ?>" name = "id_siswa">
          <div class="mb-3 row">
              <label for="NISN" class="col-sm-2 col-form-label">NISN</label>
              <div class="col-sm-10">
                <input required type="text"  name="nisn" class="form-control" id="NISN" placeholder="Ex:006688" value = "<?php echo $nisn; ?>">
              </div>
          </div>

          <div class="mb-3 row">
              <label for="nama siswa" class="col-sm-2 col-form-label">Nama Siswa</label>
              <div class="col-sm-10">
                <input required type="text" name="nama_siswa" class="form-control" id="nama siswa" placeholder="Ex:shofiatun" value = "<?php echo $nama_siswa; ?>">
              </div>
          </div>

          <div class="mb-3 row">
              <label for="tanggal lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
              <div class="col-sm-10">
                <input required type="text" name="tanggal_lahir" class="form-control" id="tanggal lahir" placeholder="Ex:03 juli 2006" value = "<?php echo $tanggal_lahir; ?>">
              </div>
          </div>

          <div class="mb-3 row">
              <label for="jenis kel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
              <div class="col-sm-10">
                  <select required id="jenis kel" name="jenis_kelamin" class="form-select">
                      <option <?php if($jenis_kelamin == 'laki-laki'){echo "selected";}?> value="laki-laki">Laki-laki</option>
                      <option <?php if($jenis_kelamin == 'perempuan'){echo "selected";}?> value="perempuan">Perempuan</option>
                  </select>
              </div>
          </div>

          <div class="mb-3 row">
              <label for="Alamat" class="col-sm-2 col-form-label">Alamat Lengkap</label>
              <div class="col-sm-10">
                <textarea required class="form-control" id="alamat" name="alamat" rows="3"><?php echo $alamat; ?></textarea>
          </div>
          
          <div class="mb-3 row mt-4">
            <div class="col">
              <?php 
                if(isset($_GET['ubah'])){
              ?>
                <button type="submit"  name="aksi" value="edit" class=" btn btn-primary">Simpan Perubahan</button>
              <?php 
                } else {
              ?>
                <button type="submit" name="aksi" value="add" class=" btn btn-primary">Tambahkan</button>
              <?php
                }
              ?>
                <a href="index.php" type="button" class="btn btn-danger">
                  Batal
              </a>
            </div>
          </div>
        </form>
      </div>
</body>
</html>