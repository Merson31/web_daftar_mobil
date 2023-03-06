<?php
include 'proses.php';
if (isset($_POST['simpan']))
{
    $id = $_POST['id'];
    $nama_mobil = $_POST['nama_mobil'];
    $harga = $_POST['harga'];

    $gambar = $_POST['gambar'];
    $file_tmp = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($file_tmp, 'file_gambar/'.$gambar);

    $proses = new Proses();
    $proses->ubah_data($id, $nama_mobil, $harga, $gambar);
    header('location:index.php');
}
?>