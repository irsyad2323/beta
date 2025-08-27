<?php
include('controller.php');

   $action=$_POST['action'];
   $nama_fal_s= $_POST['nama_fal'];
   function clean($string){
		$string = str_replace(' ', ' ', $string); // Replaces all spaces with hyphens.
		return preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Removes special chars.
	}
	
   $nama_fal = clean($nama_fal_s);
   $kd_layanan=$_POST['kd_layanan'];
   $alamat_fal=$_POST['alamat_fal'];
   $rt=$_POST['rt'];
   $rw=$_POST['rw'];
   $kelurahan=$_POST['kelurahan'];
   $pic_ikr=$_POST['pic_ikr'];
   $tlp_fal=$_POST['tlp_fal'];   
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
   $foto_dpn_rmh=$_POST['foto_dpn_rmh'];
   $perlakuan=$_POST['perlakuan'];
   $total_diskon=$_POST['total_diskon'];
  
      $ket = $_POST ['ket'];
    $latitude = strtok($ket, '#');
    $longitude = substr($ket, strpos($ket, '#')+1);


   // if($_POST['action']='edit'){
   //    $query=""
   // }else{
   //    $query="INSERT INTO pengguna VALUES ('$nama','$alamat','$telepon','$paket','$tgl','$val','$id','$pass','$ket')";
   //    echo $query;
   //    mysqli_query($conn,$query);
   // }

  	if($action == "edit")
	{
		$query = "UPDATE tbl_fal SET nama_fal='$nama_fal', alamat_fal='$alamat_fal', tgl_fal='$tgl_fal',tlp_fal='$tlp_fal', pic='$pic', pic2='$pic2',status='$status', status2='$status2', modem='$modem',kabel1='$kabel1',kabel2='$kabel2',kabel3='$kabel3',paket_fal='$paket_fal', pic_ikr='$pic_ikr',
      password_fal='$password_fal', tanggal_instalasi= CURRENT_TIMESTAMP(),lain_lain='$lain_lain',  status_wo='$status_wo',ket='$ket', latitude='$latitude', kategori_maintenance='$kategori_maintenance',longitude='$longitude',pembayaran='$pembayaran',perlakuan='$perlakuan',total_diskon='$total_diskon',keterangan_angsuran='$keterangan_angsuran' WHERE username_fal='$username_fal'";
		
	}

   $statement = $conn->prepare($query);
   $statement->execute();




