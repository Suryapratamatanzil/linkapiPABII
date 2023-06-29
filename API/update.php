<?php
require("koneksi.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $id = $_POST["id"];
    $Nama = $_POST["Nama"];
    $Akreditasi = $_POST["Akreditasi"];
    $Motto = $_POST["Motto"];
    $Alamat = $_POST["Alamat"];
    $Deskripsi_kampus = $_POST["Deskripsi_kampus"];
   
    $perintah = "UPDATE tb_kampus SET Nama = '$Nama', Akreditasi = '$Akreditasi', Motto = '$Motto', Alamat = '$Alamat', Deskripsi_kampus = '$Deskripsi_kampus' WHERE id = '$id'";
    $eksekusi = mysqli_query($connect, $perintah);
    $cek = mysqli_affected_rows($connect);
   
    if($cek>0)
    {
        $response["kode"] = 1;
        $response["pesan"] = "Sukses mengupdate data";
    }
    else
    {
        $response["kode"] = 0;
        $response["pesan"] = "Gagal mengupdate data";
    }
}
else
{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak ada Post Data";
}
echo json_encode($response);
mysqli_close($connect);
