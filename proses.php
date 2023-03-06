<?php
include 'database.php';
class Proses extends Database
{
    public function __construct()
    {
        $this->connect = $this->koneksi();
    }

    public function tampil_data()
    {
        $sql = "SELECT * FROM daftar_mobil";
        $bind = $this->connect->query($sql);
        while ($obj = $bind->fetch_object()) {
            $baris[] = $obj;
        }
        if (!empty($baris)) {
            return $baris;
        }
    }

    public function tambah_data($nama_mobil, $harga, $gambar)
    {
        $sql = "INSERT INTO daftar_mobil (nama_mobil,harga,gambar) VALUES ('$nama_mobil', '$harga', '$gambar')";
        $this->connect->query($sql);
    }

    public function ubah($id)
    {
        $sql = "SELECT * FROM daftar_mobil WHERE id = '$id'";
        $bind = $this->connect->query($sql);
        while ($obj = $bind->fetch_object()) {
            $baris[] = $obj;
        }
        if (!empty($baris)) {
            return $baris;
        }
    }

    public function ubah_data($id, $nama_mobil, $harga, $gambar)
    {
        $sql = "UPDATE daftar_mobil SET nama_mobil = '$nama_mobil', harga = '$harga', gambar= '$gambar' WHERE id = '$id'";
        $this->connect->query($sql);
    }

    public function hapus($id)
    {
        $sql = "DELETE FROM daftar_mobil WHERE id = '$id'";
        $this->connect->query($sql);
    }
}
?>