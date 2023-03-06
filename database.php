<?php
class Database
{
    public function koneksi()
    {
        $host = "localhost";
        $database = "db_daftar_mobil";
        $username = "root";
        $password = "";
    
        $connect = new mysqli($host, $username, $password, $database);
        return $connect;
    }
}
?>