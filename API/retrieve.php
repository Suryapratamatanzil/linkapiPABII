<?php
    require('koneksi.php');
    $perintah = "SELECT * FROM tb_kampus";
    $eksekusi = mysqli_query($connect, $perintah);
    $cek = mysqli_affected_rows($connect);
   
    if($cek > 0)
    {
        $response["kode"] = 1;
        $response["pesan"] = "Data Tersedia";
        $response["data"] = array();
       
        while($ambil = mysqli_fetch_object($eksekusi))
        {
            $var["id"] = $ambil->id;
            $var["Nama"] = $ambil->Nama;
            $var["Akreditasi"] = $ambil->Akreditasi;
            $var["Motto"] = $ambil->Motto;
            $var["Alamat"] = $ambil->Alamat;
            $var["Deskripsi_kampus"] = $ambil->Deskripsi_kampus;
           
            array_push($response["data"], $var);
        }
    }
    else
    {
        $response["kode"] = 0;
        $response["pesan"] = "Data tidak tersedia";
       
    }
   
    echo json_encode($response);
    mysqli_close($connect);
?>
