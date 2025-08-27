<?php
session_start();
//$level = $_SESSION["level_user"];

include('controller.php');
$x = 1;//$_POST["ip"]
if(isset($x)){
$ip = $_POST["ip"];
$bot = $_POST["bot"];
$country = $_POST["country"];
$asn = $_POST["asn"];
$asndescription = $_POST["asndescription"];
$username = $_POST["username"];
$password = md5($_POST['pass']);
$lokasi = $_POST["lokasi"];
$status_pic = $_POST["status_pic"];


/* elseif(($level == 'adminwo_fulus') or ($level == 'kapten') or ($level == 'vendor_marketing') or ($level == 'psg_dcp') or ($level == 'ts')){
	
} */


$query="SELECT * FROM user WHERE username = '$username'";
$statement = $conn->prepare($query);
$statement->execute();
   

    if($statement->rowCount() == 1){
        $data = $statement->fetch(PDO::FETCH_ASSOC);
        
        if($password==$data["password"]){
			if(($data["level_wo"] == 'adminwo_fulus') or ($data["level_wo"] == 'permit') or ($data["level_wo"] == 'vendor')){
				$_SESSION["logingundala"]=true;
				$_SESSION["username"]=$data["username"];	
				$_SESSION["level_user"]=$data["level_wo"];
				$_SESSION["nama"]=$data["nama"];
				$_SESSION["level_kantor"]=$data["mitra_depart"];
				$_SESSION["marketing"]=$data["level_marketing"];
				$_SESSION["devisi_user"]=$data["devisi"];
				//$_SESSION["layanan_wo"]=$data["depart"];
				$_SESSION["depart"]=$data["depart"];
				$_SESSION["level_admin"]=$data["level_admin"];
				//$_SESSION["marketing"]=$data["username"];
				$log = "UPDATE tbl_pegawai SET status_pic = '$status_pic' WHERE user='$username';";
						$logstetme = $conn->prepare($log);
						$logstetme->execute();
				//header("location:../index.php");
				if($_SESSION["level_user"] == 'ikr'){
					if($lokasi == ''){
						echo '1';
						die();
					}
				}
				echo "success";
				
				$log = "INSERT INTO tb_data VALUES('', '$ip', '$bot', '$country', '$asn', 'webwo', '$username', '$lokasi', CURRENT_TIMESTAMP)";
				$logstetme = $conn->prepare($log);
				$logstetme->execute();
			}else{
				$_SESSION["logingundala"]=true;
				$_SESSION["username"]=$data["username"];
				$_SESSION["level_user"]=$data["level_wo"];
				$_SESSION["nama"]=$data["nama"];
				$_SESSION["level_kantor"]=$data["mitra_depart"];
				$_SESSION["marketing"]=$data["level_marketing"];
				$_SESSION["devisi_user"]=$data["devisi"];
				//$_SESSION["layanan_wo"]=$data["depart"];
				$_SESSION["depart"]=$data["depart"];
				$_SESSION["level_admin"]=$data["level_admin"];
				//$_SESSION["marketing"]=$data["username"];
				$log = "UPDATE tbl_pegawai SET status_pic = '$status_pic' WHERE user='$username';";
						$logstetme = $conn->prepare($log);
						$logstetme->execute();
				//header("location:../index.php");
				if($_SESSION["level_user"] == 'ikr'){
					if($lokasi == ''){
						echo '1';
						die();
					}
				}
				echo "success";
				
				$log = "INSERT INTO tb_data VALUES('', '$ip', '$bot', '$country', '$asn', 'webwo', '$username', '$lokasi', CURRENT_TIMESTAMP)";
				$logstetme = $conn->prepare($log);
				$logstetme->execute();
			}
			
        }else{
            echo "error";
        }
         
    }else{
        echo "<script>alert('User tidak terdaftar');
            document.location.href='../login.php';</script>";
    }
}

