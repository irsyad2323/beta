<?php
/* include "koneksi.php";

  
   $foto_rmh=$_POST['foto_rmh'];
   $ktp=$_POST['ktp'];
   
    
	$file_ktp = $_FILES['ktp']['name'];
	$foto_rmh = $_FILES['foto_rmh']['name'];
	
	echo ($file_ktp); die();

	$ext = explode(".", $file);
	$ext = end($ext);
	$ext = strtolower($ext);
	$ext_ktp = explode(".", $file_ktp);
	$ext_ktp = end($ext_ktp);
	$ext_ktp = strtolower($ext_ktp);
	$ext_boleh = array('jpg','jpeg','png','gif','bmp');
	$sumber = $_FILES['foto_rmh']['tmp_name'];
	$sumber2 = $_FILES['ktp']['tmp_name'];
	$tujuan = "../Foto_Rumah/" . $foto_rmh . "." . $ext;
	$tujuan_ktp = "../Foto_KTP/" . $file_ktp . "." . $ext_ktp;
	$path = "Foto_Rumah/" . $foto_rmh . "." . $ext;
	$path_ktp = "Foto_KTP/" . $file_ktp . "." . $ext_ktp;
	
	//echo ($sumber); die();
	
	if( in_array($ext_ktp, $ext_boleh) === true ) {
		move_uploaded_file($sumber2, $tujuan_ktp);
	} elseif {
		echo 'error upload ktp';
	}
	
	if( in_array($ext, $ext_boleh) === true ) {
		move_uploaded_file($sumber, $tujuan);
	} elseif {
		echo 'error upload foto rumah';
	} */
   
  
 /*  if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = mysqli_query($conn,"INSERT INTO tb_daf (tanggal2,tanggal,nama_lengkap,no_wa,alamat,rt,rw,provinsi,kabupaten,kecamatan,kelurahan,lokasi_sales) 
	   VALUES (CURRENT_TIMESTAMP(), CURRENT_DATE(), '$nama_user', '$telp_user', '$alamat_user', '$rt', '$rw', '$prov','$kab', '$kec', '$kel','$lokasi')");

if($sql > 1) {
        echo "Record updated successfully";
    } else {
  echo "Error updating record: " . mysqli_error($conn);
} */

/* // Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO tb_daf (tanggal2,tanggal,nama_lengkap,no_wa,alamat,rt,rw,provinsi,kabupaten,kecamatan,kelurahan,lokasi_sales) 
	   VALUES (CURRENT_TIMESTAMP(), CURRENT_DATE(), '$nama_user', '$telp_user', '$alamat_user', '$rt', '$rw', '$prov','$kab', '$kec', '$kel','$lokasi')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn); */

    include "../controller/controller_mysqli.php";
	session_start();
	$kota = $_SESSION['mitra_depart'];
    if($koneksi == true){
		
		
		$ket=$_POST['ket'];
		$status_hasil=$_POST['status_hasil'];
		$key_fal_bukti=$_POST['key_fal_bukti'];
		$tgl_exp=$_POST['tgl_exp'];
		//echo ($key_fal); die();
		//$angka_acak = rand(1,999);
		//echo ($angka_acak); die();
        $filename = $_FILES['file']['name'];
        @$file_name = $_FILES['file']['name'];
        @$file_size = $_FILES['file']['size'];
        @$file_tmp = $_FILES['file']['tmp_name'];
        @$file_type = $_FILES['file']['type'];
        @$file_ext=strtolower(end(explode('.',$file_name)));
		$acak = rand(1,999);
		$tujuan_ktp = "../img/foto_hasil/" . $acak. $nama_user1 . "." . $file_ext;
		$patch = "img/foto_hasil/" . $acak . $nama_user1 . "." . $file_ext;
		$path_ktp = $patch;

        if (!$koneksi) {
			  die("Connection failed: " . mysqli_connect_error());
			}

			$sql = "update tbl_pengajuan set status_hasil='$status_hasil', file_hasil='".$patch."', tgl_hasil=CURRENT_TIMESTAMP(), tgl_exp='$tgl_exp' where key_fal='$key_fal_bukti';";
			
			if (mysqli_query($koneksi, $sql)) {
			  move_uploaded_file($file_tmp, $tujuan_ktp);
			  echo "New record created successfully";
			} else {
			  echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
			}

			mysqli_close($koneksi);

    }
?>



