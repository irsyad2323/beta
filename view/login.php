<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login WO</title>
    <link href="../assetnew/css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="../img/icons/kaptennaratel.png" />
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container-xl px-4">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
                            <!-- Social login form-->
                            <div class="card my-5">
                                <hr class="my-0" />
                                <div class="card-body p-5">
                                    <!-- Login form-->
                                    <form>
                                        <div class="card-body p-5 text-center">
                                            <div class="h3 fw-light mb-3">PILIH STATUS MASUK ANDA</div>
                                            <!-- Social login links-->
                                            <select class="form-control" type="text" id="status_pic" name="status_pic" autocomplete="off" required>
                                                <option></option>
                                                <option value="masuk">Masuk</option>
                                                <option value="libur">Libur</option>
                                            </select>
                                        </div>
                                        <input class="form-control" type="hidden" id="lokasi" name="lokasi" autocomplete="off" required>
                                        <!-- Form Group (email address)-->
                                        <div class="mb-3">
                                            <label class="text-gray-600 small" for="emailExample">User</label>
                                            <input class="form-control form-control-solid" type="text" name="username" id="username" aria-label="Email Address" aria-describedby="emailExample" />
                                        </div>
                                        <!-- Form Group (password)-->
                                        <div class="mb-3">
                                            <label class="text-gray-600 small" for="passwordExample">Password</label>
                                            <input class="form-control form-control-solid" type="password" name="pass" id="pass" aria-label="Password" aria-describedby="passwordExample" />
                                        </div>
                                        <!-- Form Group (forgot password link)-->
                                        <div class="mb-3"><a class="small" href="auth-password-social.html">Forgot your password?</a></div>
                                        <!-- Form Group (login box)-->
                                        <div class="d-flex align-items-center justify-content-between mb-0">
                                            <div class="form-check">
                                                <input class="form-check-input" id="checkRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="checkRememberPassword">Remember password</label>
                                            </div>
                                            <a type="button" name="login" class="btn btn-primary tes">Login</a>
                                        </div>
                                    </form>
                                </div>
                                <hr class="my-0" />
                                <div class="card-body px-5 py-4">
                                    <div class="small text-center">
                                        New user?
                                        <a href="auth-register-social.html">Create an account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="footer-admin mt-auto footer-dark">
                <div class="container-xl px-4">
                    <div class="row">
                        <div class="col-md-6 small">Copyright &copy; Kapten Wo 2021</div>
                        <div class="col-md-6 text-md-end small">
                            <a href="#!">Privacy Policy</a>
                            &middot;
                            <a href="#!">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <div id="dropDownSelect1"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).on('click', '.tes', function() {
            //alert ('tes'); return;

            /* $.ajax({
              url: 'https://api.ipdetective.io/ip?info=true',
              headers: {
                'x-api-key': '63b1b184-f940-4219-99fd-fd4dc7690194' // Your IPDetective API key
              },
              type: 'GET',
              dataType: 'json',
              success: function(ip) { */
            var username = $("#username").val();
            var pass = $("#pass").val();
            var lokasi = $("#lokasi").val();
            var status_pic = $("#status_pic").val();
            //alert (status_pic); return;

            var data = {
                lokasi: lokasi,
                username: username,
                pass: pass,
                status_pic: status_pic,
                //ip: ip.ip,
                //bot: ip.bot,
                //country: ip.country_name,
                //asn: ip.asn,
                //asndescription: ip.asn_description
            };

            $.ajax({
                url: '../controller/login.php',
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
                            .then(function() {
                                window.location.href = "../index.php";
                            });

                    } else if (response == 1) {
                        Swal.fire({
                            type: 'error',
                            title: 'GPS di urupno bro..!!',
                            text: 'silahkan coba lagi!'
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
            //}
            //});

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../assetnew/js/scripts.js"></script>
</body>

</html>