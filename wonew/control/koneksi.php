<?php
	date_default_timezone_set("Asia/Jakarta");
	$host="117.103.69.22";
	$user="kocak";
	$pass="gaming";	
	$database="billkapten";
	/*$host="localhost:3307";
	$user="root";
	$pass="";	
	$database="my_kapten";*/
	$koneksi= mysqli_connect($host,$user,$pass,$database);	
	if (mysqli_connect_errno()) {
	  trigger_error('Koneksi ke database gagal: '  . mysqli_connect_error(), E_USER_ERROR); 
	}
?>