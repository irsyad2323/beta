<?php
include('../controller/controller_mysqli.php');


   $keluhan_deskripsi=$_POST['keluhan_deskripsi'];

   $tanggal=$_POST['tanggal'];
   
   $kelurahan=$_POST['kelurahan'];
   
   $pic_ikr=$_POST['pic_ikr'];

   $jenis_produk=$_POST['jenis_produk'];

   $kategori_kompline=$_POST['kategori_kompline'];

   $alamat=$_POST['alamat'];   

   $kd_kom=$_POST['kd_kom']; 
   
   $nama_odp=$_POST['nama_odp']; 
   
   $nama_kom=$_POST['nama_kom']; 
   
   $kom = strtok($nama_kom, '-');
   
   //echo $kom; die();
   
		mysqli_autocommit($koneksi,FALSE);

		// Turn autocommit off
		mysqli_autocommit($koneksi,FALSE);
		
		// Insert some values
		mysqli_query($koneksi,"INSERT INTO keluhan (keluhan_deskripsi, status, tanggal, jenis_produk ,kategori_kompline ,statushandle, alamat, kd_kom, id_user, nama_kom, handle_kompline) 
		  VALUES ('$keluhan_deskripsi', 'Visit', CURRENT_TIMESTAMP(), '$jenis_produk', '$kategori_kompline','n', '$alamat', '$kd_kom','$kom','$nama_odp','$pic_ikr');");
		mysqli_query($koneksi,"INSERT INTO tbl_maintenance_odp (id_odp, nama_fal, alamat_fal, username_fal, lain_lain, kd_layanan, pic_ikr, kelurahan, jenis_wo, produk, kategori_maintenance) 
										  VALUES ('$kom','$nama_odp','$alamat',CURRENT_TIMESTAMP(),'$keluhan_deskripsi','$kd_kom','$pic_ikr','$kelurahan','MAINTENANCE_ODP','$jenis_produk','Maintenance ODP')");

		
		if((!$query1) or (!$query2)){								
					
					echo 'Error';
					mysqli_rollback($koneksi);							
		}else{
				if(!mysqli_commit($koneksi)) {				
					$result['error'] = 'error';
					$result['result'] = 0;
					mysqli_rollback($koneksi);
					
				}else{
					echo 'Success';		
					}
		
		}
  
  ?>	



