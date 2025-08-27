<?php
include "controller_mysqli.php";
$username = mysqli_real_escape_string($koneksi,htmlentities($_POST['username']));
$password = mysqli_real_escape_string($koneksi,htmlentities($_POST['password']));
$check    = mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$username' AND password = md5('$password')") or die(mysqli_error());
if(mysqli_num_rows($check) >= 1){
while($row = mysqli_fetch_array($check)){
session_start();
$_SESSION['id_admin'] = $row['username'];
$_SESSION['nama'] = $row['nama'];
$_SESSION["level_user"]=$data["level_wo"];
$_SESSION["level_kantor"]=$data["mitra_depart"];
$_SESSION['depart'] = $row['depart'];

?>
<script>alert("Selamat Datang <?= $row['username']; ?> <?= $row['nama']; ?> Kamu Telah Login Ke Halaman Admin !!!");
window.location.href="../index.php"</script>
<?php
}
}else{
echo '<script>alert("Masukan Username dan Password dengan Benar !!!");
window.location.href="login.php"</script>';
}
?>