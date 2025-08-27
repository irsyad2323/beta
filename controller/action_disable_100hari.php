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
   $status_log=$_POST['status_log'];
   $total_diskon=$_POST['total_diskon'];
   $off_total=$_POST['off_total'];
   $off_tgl=$_POST['off_tgl'];
   $kategori_pelanggan=$_POST['kategori_pelanggan'];
  
  //print_r($username_fal);
  
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

   if($action == "insert")
	{
//       $cekinsert="SELECT id_user FROM pengguna WHERE id_user ='$id'";
//       $cek = $conn->prepare($cekinsert);
//       $cek->execute();
//   \

//       if($cek->fetch(PDO::FETCH_ASSOC)){
//        echo "<div style='color:red'>Data gagal disimpan!</div>";
//       }



      /* $query="INSERT INTO tbl_fal VALUES ('','$nama','$alamat','$telepon','$paket_fal','$tgl_fal','$username_fal','$password_fal','$lain_lain','$kd_layananan','$latitude','$latitude','$longitude')"; */
          $query="INSERT INTO tbl_disable_noconfirm (nama_fal, alamat_fal, tlp_fal, username_fal, lain_lain, kd_layanan, pic_ikr, kategori_pelanggan, off_tgl, off_total, tgl_progres, status_log) 
	   VALUES ('$nama_fal','$alamat_fal','$tlp_fal','$username_fal','$lain_lain','$kd_layanan','$pic_ikr', '$kategori_pelanggan', '$off_tgl','$off_total', CURRENT_TIMESTAMP(),'y')";
		//echo$query;
		$statement = $conn->prepare($query);
		$statement->execute();
	}
	if($action == "edit")
	{
		$query = "UPDATE tbl_disable_noconfirm SET nama_fal='$nama_fal', alamat_fal='$alamat_fal', tlp_fal='$tlp_fal', pic_ikr='$pic_ikr',status_log='$status_log',
      lain_lain='$lain_lain', kategori_pelanggan='$kategori_pelanggan', off_total='$off_total', off_tgl='$off_tgl', tgl_progres= CURRENT_DATE() WHERE username_fal='$username_fal'";
	  //echo$query; die();
	   $statement = $conn->prepare($query);
		$statement->execute();
		
		$queryx = "UPDATE tb_gundala SET status='off' WHERE kode_user ='$username_fal'";
	  //echo$query; die();
	   $statementx = $conn->prepare($queryx);
		$statementx->execute();
		
	}

  




