<!DOCTYPE html>
<html lang="en">
<head>
	<title>LOGIN WO</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="asset/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="asset/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="asset/css/util.css">
	<link rel="stylesheet" type="text/css" href="asset/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-35 p-b-20">
				<form class="login100-form validate-form" method="POST" action="">
					<!-- img width='200px' src="https://wo.naraya.co.id/img/soni.jpg" alt="Italian Trulli" controller/login.php -->
					<span class="login100-form-title p-b-70">
						Welcome
					</span>
				
					<input class="form-control" type="hidden" id="lokasi" name="lokasi" autocomplete="off" required> 
					<div class="wrap-input100 validate-input m-t-50 m-b-35" data-validate = "Enter username">
						<input class="input100" type="text" name="username" id="username" autocomplete="off">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100" type="password" name="pass" id="pass">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<button type="button" name="login" class="login100-form-btn tes">LOGIN</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
	
	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		
	 <script type="text/javascript">
	$(document).on('click', '.tes', function(){
		//alert ('tes'); return;
		
      $.ajax({
        url: 'https://api.ipdetective.io/ip?info=true',
        headers: {
          'x-api-key': '63b1b184-f940-4219-99fd-fd4dc7690194' // Your IPDetective API key
        },
        type: 'GET',
        dataType: 'json',
        success: function(ip) {
		  var username= $("#username").val();
		  var pass= $("#pass").val();
		  var lokasi= $("#lokasi").val();
		  //alert (username+pass); return;
          var data = {
            lokasi: lokasi,
            username: username,
            pass: pass,
            ip: ip.ip,
            bot: ip.bot,
            country: ip.country_name,
            asn: ip.asn,
            asndescription: ip.asn_description
          };
		  
          $.ajax({
            url: 'controller/login.php',
            type: 'POST',
            data: data,
            success: function(response) {
				console.log(response);
				 if (response == "success") {

                  Swal.fire({
                    type: 'success',
                    title: 'Login Berhasil!',
                    text: 'Anda akan di arahkan dalam 3 Detik',
                    timer: 3000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                  .then (function() {
                    window.location.href = "index.php";
                  });

                } else {

                  Swal.fire({
                    type: 'error',
                    title: 'Login Gagal!',
                    text: 'silahkan coba lagi!'
                  });

                }

                //console.log(response);
            
            }
          }); 
        }
      });
	  
	}); 
    </script>
	<script>
		const lokasi = document.getElementById("lokasi");
	
	function getLocation() {
	  if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(showPosition);
	  } else { 
		x.innerHTML = "Geolocation is not supported by this browser.";
	  }
	}

	function showPosition(position) {	
	  lokasi.value = 'https://www.google.com/maps/search/?api=1&query=' + position.coords.latitude + "," + position.coords.longitude;
	}
	getLocation();
	</script>
<!--===============================================================================================-->
	<script src="asset/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="asset/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="asset/vendor/bootstrap/js/popper.js"></script>
	<script src="asset/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="asset/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="asset/vendor/daterangepicker/moment.min.js"></script>
	<script src="asset/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="asset/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="asset/js/main.js"></script>

</body>
</html>
<?php
require 'controller/controller_mysqli.php';

if(isset($_POST["ip"])){
  $ip = $_POST["ip"];
  $bot = $_POST["bot"];
  $country = $_POST["country"];
  $asn = $_POST["asn"];
  $asndescription = $_POST["asndescription"];
  $username = $_POST["username"];
  //$pass = md5($_POST['pass']);
  $lokasi = $_POST["lokasi"];


  $query = "INSERT INTO tb_data VALUES('', '$ip', '$bot', '$country', '$asn', '$asndescription', '$username', '$lokasi')";
  mysqli_query($koneksi, $query);
}
?>
