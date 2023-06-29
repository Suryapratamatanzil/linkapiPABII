<?php
require("koneksi.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $id = $_POST['id'];
   
    $perintah = "DELETE from tb_kampus WHERE id='$id'";
    $eksekusi = mysqli_query($connect, $perintah);
    $cek = mysqli_affected_rows($connect);
   
    if($cek > 0)
    {
        $response["kode"] = 1;
        $response["pesan"] = "Sukses menghapus data";
    }
    else
    {
        $response["kode"] = 0;
        $response["pesan"] = "Gagal menghapus data";
    }
}
else
{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak ada Post Data";
}
echo json_encode($response);
mysqli_close($connect);
