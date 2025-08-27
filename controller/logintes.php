<?php

session_start();

include('controller.php');
if(isset($_POST["ip"])){
$ip = $_POST["ip"];
$bot = $_POST["bot"];
$country = $_POST["country"];
$asn = $_POST["asn"];
$asndescription = $_POST["asndescription"];
$username = $_POST["username"];
$password = md5($_POST['pass']);
$lokasi = $_POST["lokasi"];
$log = "INSERT INTO tb_data VALUES('', '$ip', '$bot', '$country', '$asn', '$asndescription', '$username', '$lokasi')";
$logstetme = $conn->prepare($log);
$logstetme->execute();

$query="SELECT * FROM user WHERE username = '$username'";
$statement = $conn->prepare($query);
$statement->execute();
   

    if($statement->rowCount() == 1){
        $data = $statement->fetch(PDO::FETCH_ASSOC);
        
        if($password==$data["password"]){
            $_SESSION["logingundala"]=true;
            $_SESSION["username"]=$username;
            $_SESSION["level_user"]=$data["level_wo"];
			$_SESSION["level_kantor"]=$data["mitra_depart"];
			$_SESSION["marketing"]=$data["level_marketing"];
       
            //header("location:../index.php");
            
			echo "success";
			
        }else{
            echo "error";
        }
         
    }else{
        echo "<script>alert('User tidak terdaftar');
            document.location.href='../login.php';</script>";
    }
}

