<?php
session_start();



if(!isset($_SESSION["logingundala"])){

    header("location:login.php");

    exit;

}
include('controller.php');

   $action=$_POST['action'];
   
   $username_fal=$_POST['username_fal'];      
   
   $verified=$_POST['verified'];
   
   $angsuran1=$_POST['angsuran1'];
   
   $angsuran2=$_POST['angsuran2'];   
     
   $status_angsuran=$_POST['status_angsuran'];
   
   $pembayaran=$_POST['pembayaran'];
   
   $total_diskon=$_POST['total_diskon'];
   
   $verif1=$_POST['verif1'];
   
   $verif2=$_POST['verif2'];
   $keterangan=$_POST['keterangan'];
   
   
    


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
       $query="INSERT INTO tbl_fal_correctiv (verified, angsuran1, angsuran2, paket_fal, pembayaran, status_angsuran, total_diskon, verif1, verif2, ket_fulus) 
	   VALUES ('$verified', '$angsuran1', '$angsuran2', '$paket_fal', '$pembayaran', '$status_angsuran','$total_diskon','$verif1','$verif2','$keterangan')";
		//echo$query;
	}
	if($action == "edit")
	{
		$query = "UPDATE tbl_fal_correctiv SET verified='$verified', total_diskon='$total_diskon', angsuran1='$angsuran1', angsuran2='$angsuran2', status_angsuran='$status_angsuran', paket_fal='$paket_fal', verif1='$verif1', verif2='$verif2', pembayaran='$pembayaran', keterangan='$ket_fulus', log_user_verified='".$_SESSION['username']."', tgl_verified=CURRENT_TIMESTAMP() WHERE username_fal='$username_fal'";
		
	}

   $statement = $conn->prepare($query);
   $statement->execute();




