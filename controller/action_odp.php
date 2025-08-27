<?php


include('controller.php');

   $action=$_POST['action'];

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
   $sp=$_POST['sp'];
   $sp2=$_POST['sp2'];
   $sp3=$_POST['sp3']; 
   //$tgl_fal=date('Y-m-d', strtotime($_POST['tgl_fal']));
   $paket_fal=$_POST['paket_fal']; 
   $username_fal=$_POST['username_fal'];
   $password_fal=$_POST['password_fal'];
   $lain_lain=$_POST['lain_lain'];
   $status_wo=$_POST['status_wo'];
   $foto_dpn_rmh=$_POST['foto_dpn_rmh'];

  
      $ket = $_POST ['ket'];
    $latitude = strtok($ket, '#');
    $longitude = substr($ket, strpos($ket, '#')+1);

      //echo $Spliter; die();

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
       $query="INSERT INTO tbl_fal (nama_fal, alamat_fal, username_fal, lain_lain, kd_layanan, pic_ikr, kelurahan, jenis_wo, produk, pic, pic2, status, status2, ket,latitude,longitude, tanggal_instalasi, spliter, spliter2, spliter3, status_wo) VALUES ('$nama_fal','$alamat_fal',CURRENT_TIMESTAMP(),'$lain_lain', '$kd_layanan','$pic_ikr',  '$kelurahan','INSTALASI_ODP','Kapten Naratel','$pic','$pic2', '$status', '$status2', '$ket', '$latitude','$longitude',CURRENT_TIMESTAMP(), '$kabel1','$kabel2','$kabel3', '$status_wo');";
  }
  if($action == "edit")
  {
    $query = "UPDATE tbl_fal SET nama_fal='$nama_fal', alamat_fal='$alamat_fal', pic='$pic' ,pic2='$pic2',status='$status', status2='$status2', spliter='$kabel1', spliter2='$kabel2',spliter3='$spliter3', pic_ikr='$pic_ikr', tanggal_instalasi= CURRENT_TIMESTAMP(), lain_lain='$lain_lain',  status_wo='$status_wo',ket='$ket', latitude='$latitude', longitude='$longitude' WHERE username_fal='$username_fal'";
    
  }

   $statement = $conn->prepare($query);
   $statement->execute();




