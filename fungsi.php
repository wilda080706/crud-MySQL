<?php
    include 'koneksi.php';

    function tambah_data($data){
        $nisn = $data['nisn'];
        $nasis = $data['nama_siswa'];
        $tanggal = $data['tanggal_lahir'];
        $jeniskel = $data['jenis_kelamin'];
        $alamat = $data['alamat'];

        $query = "INSERT INTO tb_siswa VALUES(null, '$nisn', '$nasis', '$tanggal', '$jeniskel', '$alamat')";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

     function ubah_data($data){
        $id_siswa = $data['id_siswa'];
            $nisn = $data['nisn'];
            $nasis = $data['nama_siswa'];
            $tanggal = $data['tanggal_lahir'];
            $jeniskel = $data['jenis_kelamin'];
            $alamat = $data['alamat'];

            $query = "UPDATE tb_siswa SET nisn='$nisn', nama_siswa='$nasis', tanggal_lahir='$tanggal', jenis_kelamin='$jeniskel', alamat='$alamat' WHERE id_siswa='$id_siswa';";
            $sql = mysqli_query($GLOBALS['conn'], $query);

            return true;
     }

     function hapus_data($data){
        $id_siswa = $data['hapus'];
        $query = "DELETE FROM tb_siswa WHERE id_siswa = '$id_siswa';";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
     }
?>
