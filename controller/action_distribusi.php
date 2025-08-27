<?php


include('controller.php');

   $action=$_POST['action'];

   $nama_odp=$_POST['nama_odp'];
   $kd_layanan=$_POST['kd_layanan'];
   $alamat_odp=$_POST['alamat_odp'];
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
   $jenis_kabel=$_POST['jenis_kabel'];
   $odp_induk=$_POST['odp_induk'];
   $sp=$_POST['sp'];
   $sp2=$_POST['sp2'];
   $sp3=$_POST['sp3']; 
   //$tgl_fal=date('Y-m-d', strtotime($_POST['tgl_fal']));
   $paket_fal=$_POST['paket_fal']; 
   $id_odp=$_POST['id_odp'];
   $password_fal=$_POST['password_fal'];
   $lain_lain=$_POST['lain_lain'];
   $status_wo=$_POST['status_wo'];
   $foto_dpn_rmh=$_POST['foto_dpn_rmh'];

  
      $ket = $_POST ['ket'];
    $latitude = strtok($ket, '#');
    $longitude = substr($ket, strpos($ket, '#')+1);

      //print_r ($odp_induk); die();

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



      /* $query="INSERT INTO tbl_fal VALUES ('','$nama','$alamat','$telepon','$paket_fal','$tgl_fal','$id_odp','$password_fal','$lain_lain','$kd_layananan','$latitude','$latitude','$longitude')"; */
       $query="INSERT INTO tbl_distribusi (odp_induk ,nama_odp, alamat_odp, lain_lain, kd_layanan, pic_ikr, kelurahan, produk, pic, pic2, status, status2, ket,latitude,longitude, tanggal_instalasi, kabel1, jenis_kabel, status_wo) 
VALUES ('$odp_induk[0]','$nama_odp','$alamat_odp', '$lain_lain', '$kd_layanan','$pic_ikr',  '$kelurahan', 'Kapten Naratel','$pic','$pic2', '$status', '$status2', '$ket', '$latitude','$longitude',CURRENT_TIMESTAMP(), '$kabel1','$jenis_kabel','$status_wo');";
  }
  if($action == "edit")
  {
    $query = "UPDATE tbl_distribusi SET odp_induk='$odp_induk',nama_odp='$nama_odp', alamat_odp='$alamat_odp', pic='$pic' ,pic2='$pic2',status='$status', status2='$status2', spliter='$spltr', spliter2='$spltr2',spliter3='$spltr3', pic_ikr='$pic_ikr', tanggal_instalasi= CURRENT_TIMESTAMP(), lain_lain='$lain_lain',  status_wo='$status_wo' WHERE id_odp='$id_odp'";
    
  }

   $statement = $conn->prepare($query);
   $statement->execute();




