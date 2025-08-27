<?php
	session_start();
	$level_kantor = $_SESSION["kantor"];
	$kota = $_SESSION["level_kantor"];
	
    include('../controller/controller_mysqli.php');
 
    $id = $_POST['id'];
    $jenis_pekerjaan = $_POST['jenis_pekerjaan'];
    $nama = $_POST['nama'];
    $jumlah_brosur = $_POST['jumlah_brosur'];
	
	$nama1 = strtok($nama, '|');
    $level1 = substr($nama, strpos($nama, '|')+1);

    if(mysqli_query($koneksi, "UPDATE tbl_marketing set nama='$nama1', level='$level1', nama='$nama1', jenis_pekerjaan='$jenis_pekerjaan', jumlah='$jumlah_brosur' where id='$id';"))
	{   
     echo 'Berhasil diupdate!';
    } else {
       echo "Error: " . $sql . "" . mysqli_error($koneksi);
    }
 
    mysqli_close($koneksi);
 
?>