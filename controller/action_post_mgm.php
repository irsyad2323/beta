<?php
include('../controller/controller_mysqli.php');

$host       = "103.163.139.36";
$user       = "db_pendaftaran";
$password   = "12nov20IRSD";
$database   = "db_pendaftaran";
$koneksivps    = mysqli_connect($host, $user, $password, $database);

/*   if (isset($_POST['username_sinden'])){
	  $nama_sinden = $_POST['nama_sinden'];
	  $alamat_sinden = $_POST['alamat_sinden'];
	  $tlp_sinden = $_POST['tlp_sinden'];
	  $paket_sinden = $_POST['paket_sinden'];
	  $tanggal_sinden = $_POST['tanggal_sinden'];
	  $username_sinden = $_POST['username_sinden'];
	  
	  $result = mysqli_query($koneksi,"UPDATE tbl_fal SET nama_fal='$nama_sinden', alamat_fal='$alamat_sinden', tgl_fal='$tanggal_sinden',tlp_fal='$tlp_sinden',paket_fal='$paket_sinden' WHERE username_fal='$username_sinden'");
	  if($result){
		  return 'data update'
	}
  } */
   $nama_fal_s= $_POST['nama_fal'];
   function clean($string){
		$string = str_replace(' ', ' ', $string); // Replaces all spaces with hyphens.
		return preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Removes special chars.
	}
	
   $nama_fal = clean($nama_fal_s);
   $key_fal=$_POST['key_fal'];
   $kd_layanan=$_POST['kd_layanan'];
   $alamat_fal=$_POST['alamat_fal'];
   $rt=$_POST['rt'];
   $rw=$_POST['rw'];
   $kelurahan=$_POST['kelurahan'];
   $kecamatan=$_POST['kecamatan'];
   $kabupaten=$_POST['kabupaten'];
   $provinsi=$_POST['provinsi'];
   $pic_ikr=$_POST['pic_ikr'];
   $no_wa=$_POST['no_wa'];   
   $status=$_POST['status'];
   $pic = strtok($status, '#');
    $status = substr($status, strpos($status, '#')+1);

    $status2=$_POST['status2'];
   $pic2 = strtok($status2, '#');
    $status2 = substr($status2, strpos($status2, '#')+1);
   $jenis_wo=$_POST['jenis_wo'];
   $tgl_fal=$_POST['tgl_fal'];
   $produk=$_POST['produk'];
   $modem=$_POST['modem'];
   $kabel1=$_POST['kabel1'];
   $kabel2=$_POST['kabel2'];
   $kabel3=$_POST['kabel3'];  
   //$tgl_fal=date('Y-m-d', strtotime($_POST['tgl_fal']));
   $paket_fal=$_POST['paket_fal']; 
   $username_fal=$_POST['username_fal'];      
   $kategori_maintenance=$_POST['kategori_maintenance'];
   $keterangan_angsuran=$_POST['keterangan_angsuran'];
   $password_fal=$_POST['password_fal'];
   $lain_lain=$_POST['lain_lain'];
   $pembayaran=$_POST['pembayaran'];
   $status_wo=$_POST['status_wo'];
   $foto_rumah=$_POST['foto_rumah'];
   $lokasi=$_POST['lokasi'];
   $perlakuan=$_POST['perlakuan'];
   $total_diskon=$_POST['total_diskon'];
   $verified=$_POST['verified'];
   $total=$_POST['total'];
   $letak_odp=$_POST['letak_odp'];
      $status_lokasi=$_POST['status_lokasi'];
   $tahu_layanan=$_POST['tahu_layanan'];
   $alasan=$_POST['alasan'];
   $metode_pembayaran=$_POST['metode_pembayaran'];
   $nama_sobat=$_POST['nama_sobat'];
   $no_rekening=$_POST['no_rekening'];
   
   if( $paket_fal == '5'){
	$biaya_instalasi = '220000';
	$harga_paket = '120000';
	} elseif ( $paket_fal == '10'){
	$biaya_instalasi = '220000';
	$harga_paket = '175000';
	} elseif ( $paket_fal == '15'){
    $biaya_instalasi = '220000';
	$harga_paket = '235000';
    } elseif ( $paket_fal == '20'){
    $biaya_instalasi = '220000';
	$harga_paket = '325000';
    } elseif ( $paket_fal == '60'){
    $biaya_instalasi = '220000';
	$harga_paket = '1030000';
    }


// Turn autocommit off
		mysqli_autocommit($koneksi,FALSE);
		mysqli_autocommit($koneksivps,FALSE);
		
		// Insert some values
		$query1 = mysqli_query($koneksi,"INSERT INTO tbl_fal (nama_fal, alamat_fal, tlp_fal, paket_fal, tgl_fal, tgl_fal_datetime, username_fal, password_fal, lain_lain, kd_layanan, pic_ikr, kelurahan, kecamatan, kabupaten, provinsi, rt, rw, jenis_wo, foto_dpn_rmh, lokasi, produk, pembayaran, perlakuan, total_diskon, angsuran1, verified, letak_odp, hrg_ins, hrg_pkt, status_lokasi, tahu_layanan, alasan, metode_pembayaran, no_rekening, nama_sobat, mgm) 
	   VALUES ('$nama_fal','$alamat_fal','$no_wa','$paket_fal','$tgl_fal',CURRENT_TIMESTAMP(),'$username_fal','$password_fal','$lain_lain','$kd_layanan','$pic_ikr','$kelurahan','$kecamatan','$kabupaten','$provinsi','$rt','$rw','INSTALASI','Foto_Rumah/$foto_rumah','$lokasi','Kapten Naratel','$pembayaran','$perlakuan','$total','$keterangan_angsuran','not_verified','$letak_odp[0]','$biaya_instalasi','$harga_paket','$status_lokasi','$tahu_layanan','$alasan','$metode_pembayaran','$no_rekening','$nama_sobat','mgm');");
		$query2 = mysqli_query($koneksivps,"UPDATE tb_mgm SET `status` = 'y' WHERE key_fal = '$key_fal';");

		
		if((!$query1) or (!$query2)){								
					
					echo 'Error';
					mysqli_rollback($koneksi);							
					mysqli_rollback($koneksivps);							
		}else{
				if((!mysqli_commit($koneksi)) or (!mysqli_commit($koneksivps)) ) {				
					$result['error'] = 'error';
					$result['result'] = 0;
					mysqli_rollback($koneksi);
					mysqli_rollback($koneksivps);
					
					
				}else{
					echo 'Success';		
					
					}
		
		}
  
  ?>	



