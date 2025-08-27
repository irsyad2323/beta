<?php


include('controller.php');

   $action=$_POST['action'];
   $key_fal=$_POST['key_fal'];
   $nama_fal=$_POST['nama_fal'];
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
   $username_Maintenance=$_POST['username_Maintenance'];
   $kategori_maintenance=$_POST['kategori_maintenance'];
   $password_fal=$_POST['password_fal'];
   $lain_lain=$_POST['lain_lain'];
   $status_wo=$_POST['status_wo'];
   $foto_dpn_rmh=$_POST['foto_dpn_rmh'];
   $jenis_pekerjaan=$_POST['jenis_pekerjaan'];
  
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
       $query="INSERT INTO tbl_maintenance_odp (nama_fal, alamat_fal, username_fal, lain_lain, kd_layanan, pic_ikr, kelurahan, rt, rw, jenis_wo, produk, username_Maintenance, kategori_maintenance) VALUES ('$nama_fal[0]','$alamat_fal',CURRENT_TIMESTAMP(),'$lain_lain','$kd_layanan','$pic_ikr','$kelurahan','$rt','$rw','MAINTENANCE_ODP','$produk','$username_Maintenance','Maintenance ODP')";
	}
	if($action == "edit")
	{
		/* $query = "UPDATE tbl_fal SET nama_fal='$nama_fal', alamat_fal='$alamat_fal', tgl_fal='$tgl_fal',tlp_fal='$tlp_fal', pic='$pic', pic2='$pic2',status='$status', status2='$status2',jenis_wo='$jenis_wo',produk='$produk',modem='$modem',kabel1='$kabel1',kabel2='$kabel2',kabel3='$kabel3',paket_fal='$paket_fal', pic_ikr='$pic_ikr',
      password_fal='$password_fal', tanggal_instalasi= CURRENT_TIMESTAMP(),lain_lain='$lain_lain',  status_wo='$status_wo',ket='$ket', latitude='$latitude', longitude='$longitude', username_Maintenance='$username_Maintenance' WHERE key_fal='$key_fal'"; */

      $query = "UPDATE tbl_maintenance_odp SET username_Maintenance='$username_Maintenance', jenis_pekerjaan='$jenis_pekerjaan', nama_fal='$nama_fal', alamat_fal='$alamat_fal', tlp_fal='$tlp_fal', pic='$pic', pic2='$pic2',status='$status', status2='$status2', modem='$modem',kabel1='$kabel1',kabel2='$kabel2',kabel3='$kabel3', pic_ikr='$pic_ikr', tanggal_instalasi= CURRENT_TIMESTAMP(),lain_lain='$lain_lain',  status_wo='$status_wo',ket='$ket', latitude='$latitude', longitude='$longitude' ,produk='$produk' WHERE username_fal='$username_fal'";
		
	}

   $statement = $conn->prepare($query);
   $statement->execute();




