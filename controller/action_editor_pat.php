<?php

    include "../controller/controller_mysqli.php";
	session_start();
	$kota = $_SESSION['mitra_depart'];
    if($koneksi == true){
		
		
		$id_pat=$_POST['id_pat'];
		$jalan=$_POST['jalan'];
		$id_tiang=$_POST['id_tiang'];
		$id_kabel=$_POST['id_kabel'];
		$id_odp=$_POST['id_odp'];
		$pic_maintenace=$_POST['pic_maintenace'];
		$lain_lain=$_POST['lain_lain'];
		$lokasi=$_POST['ba'];
		$status_wo=$_POST['status_wo'];
		
		$acak = rand(1,999);
        $filetiang = $_FILES['tiang_file']['name'];
		$foto_tiang = str_replace(' ', '', $filetiang);
        @$file_size = $_FILES['tiang_file']['size'];
        @$file_tiang_tmp = $_FILES['tiang_file']['tmp_name'];
        @$file_type = $_FILES['tiang_file']['type'];
        @$file_tiang_ext=strtolower(end(explode('.',$file_tiang)));
		$tujuan_tiang = "../img/foto_kondisi/" . $acak. $foto_tiang . $file_tiang_ext;
		$patch_tiang = "img/foto_kondisi/" . $acak . $foto_tiang . $file_tiang_ext;
		
		$filekabel = $_FILES['kabel_file']['name'];
		$foto_kabel = str_replace(' ', '', $filekabel);
        @$file_size = $_FILES['kabel_file']['size'];
        @$file_kabel_tmp = $_FILES['kabel_file']['tmp_name'];
        @$file_type = $_FILES['kabel_file']['type'];
        @$foto_kabel_ext=strtolower(end(explode('.',$file_kabel)));
		$tujuan_kabel= "../img/foto_kondisi/" . $acak. $foto_kabel . $foto_kabel_ext;
		$patch_kabel = "img/foto_kondisi/" . $acak . $foto_kabel . $foto_kabel_ext;
		//$path_kondisi = $patch;
		
		$fileodp = $_FILES['odp_file']['name'];
		$foto_odp = str_replace(' ', '', $fileodp);
        @$file_size = $_FILES['odp_file']['size'];
        @$file_odp_tmp = $_FILES['odp_file']['tmp_name'];
        @$file_type = $_FILES['odp_file']['type'];
        @$foto_odp_ext=strtolower(end(explode('.',$file_kabel)));
		$tujuan_odp= "../img/foto_kondisi/" . $acak. $foto_odp . $foto_odp_ext;
		$patch_odp = "img/foto_kondisi/" . $acak . $foto_odp . $foto_odp_ext;
		//$path_kondisi = $patch;
		
		// echo ($patch_tiang); die();

        if (!$koneksi) {
			  die("Connection failed: " . mysqli_connect_error());
			}

			$sql = "";
			
			if (mysqli_query($koneksi, $sql)) {
				 move_uploaded_file($file_tiang_tmp, $tujuan_tiang);
				 move_uploaded_file($file_kabel_tmp, $tujuan_kabel);
				 move_uploaded_file($file_odp_tmp, $tujuan_odp);
			  echo "New record created successfully";
			} else {
			  echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
			}

			mysqli_close($koneksi);

    }
?>



