<?php
require("koneksi.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $Nama = $_POST["Nama"];
    $Akreditasi = $_POST["Akreditasi"];
    $Motto = $_POST["Motto"];
    $Alamat = $_POST["Alamat"];
    $Deskripsi_kampus = $_POST["Deskripsi_kampus"];
       
   
    $perintah = "INSERT INTO tb_kampus(Nama, Akreditasi, Motto, Alamat, Deskripsi_kampus) VALUES('$Nama','$Akreditasi', '$Motto', '$Alamat', '$Deskripsi_kampus')";
    $eksekusi = mysqli_query($connect, $perintah);
    $cek = mysqli_affected_rows($connect);
   
    if($cek>0)
    {
        $response["kode"] = 1;
        $response["pesan"] = "Sukses menyimpan data";
    }
    else
    {
        $response["kode"] = 0;
        $response["pesan"] = "gagal menyimpan data";
    }
}

else
{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak ada Post Data";
}
echo json_encode($response);
mysqli_close($connect);
