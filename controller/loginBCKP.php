<?php

session_start();

include('controller.php');
if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = md5($_POST['pass']);

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
            
			?>
			<script>alert("Selamat Datang <?= $_SESSION["username"]; ?> Kamu Telah Login Ke Halaman Admin !!!");
window.location.href="../index.php"</script>
			
			<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
			<?php
			exit;
        }else{
            echo "<script>alert('Password Salah');
            document.location.href='../login.php';</script>";
        }
         
    }else{
        echo "<script>alert('User tidak terdaftar');
            document.location.href='../login.php';</script>";
    }
}

