<?php
	session_start();
	$level_kantor = $_SESSION["kantor"];
	$kota = $_SESSION["level_kantor"];
	
    include('../controller/controller_mysqli.php');
 
    $id = $_POST['id'];
    $jenis_pekerjaan = $_POST['jenis_pekerjaan'];
    $nama = $_POST['nama'];
    $jumlah_brosur = $_POST['jumlah_brosur'];

    if(mysqli_query($koneksi, "delete from tbl_marketing where id='$id';"))
	{   
     echo 'Berhasil diupdate!';
    } else {
       echo "Error: " . $sql . "" . mysqli_error($koneksi);
    }
 
    mysqli_close($koneksi);
 
?>