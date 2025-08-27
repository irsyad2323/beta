<?php
include('../controller/controller_mysqli.php');
session_start();
$kota = $_SESSION['layanan_wo'];
$id = $_POST['id'];

//echo ($id); die();

$jumlah_hijau = $_POST['jumlah_hijau'];
   //echo $kom; die();
   	mysqli_autocommit($koneksi,FALSE);
	   // Turn autocommit off	
		// Insert some values
		$query1 = mysqli_query($koneksi,"UPDATE baris_kotak SET jumlah_hijau = '$jumlah_hijau' WHERE id = '$id';");
		if(!$query1){									
			echo 'error';
			mysqli_rollback($koneksi);							
		}else{
			if(!mysqli_commit($koneksi)) {				
				echo 'error';
				mysqli_rollback($koneksi);
				
			}else{
				echo '1';		
				}
		
		}
  
  ?>	



