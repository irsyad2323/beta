<?php
	date_default_timezone_set("Asia/Jakarta");
	$host="117.103.69.22";
	$user="kocak";
	$pass="gaming";	
	$database="billkapten";
	/* $host="103.163.139.36";
	$user="irsyad";
	$pass="231215";	
	$database="updownikr_mitra"; */
	$koneksi= mysqli_connect($host,$user,$pass,$database);	
	$conn = new mysqli($host, $user, $pass, $database);
	if (mysqli_connect_errno()) {
	  trigger_error('Koneksi ke database gagal: '  . mysqli_connect_error(), E_USER_ERROR); 
	}
	
	$api_key = 'AIzaSyCF0F_M6IBOlzYMqrHQXiSBbnvv8npHafs';
?>