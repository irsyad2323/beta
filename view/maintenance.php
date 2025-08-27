<?php
session_start();

if(!isset($_SESSION["logingundala"])){
    header("location:login.php");
    exit;
}
$kota = $_SESSION["level_kantor"];
?>	
<!DOCTYPE html>
<html lang="en">

<head>



    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">

    <meta name="author" content="">



    <title>SB Admin 2 - IKR</title>



    <!-- Custom fonts for this template-->

    <link href="../asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	 <link href="../css/select2.min.css" rel="stylesheet" />
    <link

        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"

        rel="stylesheet">

    

    <link rel="stylesheet" href="../asset/vendor/datatables/dataTables.bootstrap4.min.css">



    <!-- Custom styles for this template-->

    <link href="../asset/css/sb-admin-2.css" rel="stylesheet">



  

    <link rel="stylesheet" href="../asset/css/bootstrap-datepicker.min.css">



</head>

<body id="page-top">

    <!-- Page Wrapper -->

    <div id="wrapper">

	<?php include '../sidebar.php'; ?>
	
	

        <!-- Content Wrapper -->

        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

            

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                    

                  

                        

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['username'];?></span>
                                <img class="img-profile rounded-circle"
                                    src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div> -->
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">MAINTENANCE<?php //echo $_SESSION["level_user"]; ?></h1>
                        <?php 
                            if ( $_SESSION["level_user"] != "ikr" && $_SESSION["level_user"] != "Admin" ){ 
                        ?>
                        <div>                          

                            <a href="controller/export.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                <i class="fas fa-download fa-sm text-white-50"></i> Generate Export 
                            </a>        
                        </div>
                    <?php } ?>
                    </div>
					
					<div class="d-sm-flex align-items-center justify-content-between mb-4">

                        
                        <?php 

                            if ( $_SESSION["level_user"] != "Admin" && $_SESSION["level_user"] != "kapten" && $_SESSION["level_user"] != "ts"  ){ 

                        ?>

                        	<div class="my-2"></div>
                                    <a href="index.php" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">HOME</span>
                                    </a>


                    <?php } ?>

                    </div>
					
                        <?php 
                            if ( $_SESSION["level_user"] != "ikr" ){ 
                        ?>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <button class="btn btn-success add-data">TAMBAH +</button>
                    </div> <?php } ?>


                            <?php 
                            if ( $_SESSION["level_user"] != "ikr"){ 
                        ?>
                        <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                MAINTENANCE YUNI</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php
$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$sql="SELECT COUNT(username_fal) FROM tbl_maintenance WHERE pic_ikr='yuni' and status_wo='Belum Terpasang' and jenis_wo='MAINTENANCE' ;";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
echo "$row[0]";
mysqli_close($conn);
?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                MAINTENANCE KIKI</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php
$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$sql="SELECT COUNT(username_fal) FROM tbl_maintenance WHERE pic_ikr='kiki' and status_wo='Belum Terpasang' and jenis_wo='MAINTENANCE' ;";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
echo "$row[0]";
mysqli_close($conn);
?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                MAINTENANCE RAFIF</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php
$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$sql="SELECT COUNT(username_fal) FROM tbl_maintenance WHERE pic_ikr='rafif' and status_wo='Belum Terpasang' and jenis_wo='MAINTENANCE' ;";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
echo "$row[0]";
mysqli_close($conn);
?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                MAINTENANCE WAWAN</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php
$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$sql="SELECT COUNT(username_fal) FROM tbl_maintenance WHERE pic_ikr='wawan' and status_wo='Belum Terpasang'  and jenis_wo='MAINTENANCE' ;";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
echo "$row[0]";
mysqli_close($conn);
?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                MAINTENANCE FIO</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php
$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$sql="SELECT COUNT(username_fal) FROM tbl_maintenance WHERE pic_ikr='fio' and status_wo='Belum Terpasang'  and jenis_wo='MAINTENANCE' ;";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
echo "$row[0]";
mysqli_close($conn);
?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                       <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                MAINTENANCE RINO</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php
$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$sql="SELECT COUNT(username_fal) FROM tbl_maintenance WHERE pic_ikr='rino' and status_wo='Belum Terpasang' and jenis_wo='MAINTENANCE';";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
echo "$row[0]";
mysqli_close($conn);
?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                                   <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                MAINTENANCE Fauzi</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php
$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$sql="SELECT COUNT(username_fal) FROM tbl_maintenance WHERE pic_ikr='fauzi' and status_wo='Belum Terpasang' and jenis_wo='MAINTENANCE';";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
echo "$row[0]";
mysqli_close($conn);
?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
					
						
					<div class='row'>
					

                          <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                MAINTENANCE Bayu PASURUAN</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php
$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$sql="SELECT COUNT(username_fal) FROM tbl_maintenance WHERE pic_ikr='bayu' and status_wo='Belum Terpasang' and jenis_wo='MAINTENANCE';";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
echo "$row[0]";
mysqli_close($conn);
?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                MAINTENANCE Ricky PASURUAN</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php
$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$sql="SELECT COUNT(username_fal) FROM tbl_maintenance WHERE pic_ikr='ricky' and status_wo='Belum Terpasang' and jenis_wo='MAINTENANCE';";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
echo "$row[0]";
mysqli_close($conn);
?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						 <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                MAINTENANCE Wahyu PASURUAN</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php
$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$sql="SELECT COUNT(username_fal) FROM tbl_maintenance WHERE pic_ikr='wahyu' and status_wo='Belum Terpasang' and jenis_wo='MAINTENANCE';";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
echo "$row[0]";
mysqli_close($conn);
?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						 <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                MAINTENANCE Lukman PASURUAN</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php
$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$sql="SELECT COUNT(username_fal) FROM tbl_maintenance WHERE pic_ikr='lukman' and status_wo='Belum Terpasang' and jenis_wo='MAINTENANCE';";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
echo "$row[0]";
mysqli_close($conn);
?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                  

                        <?php } ?>



                    <!-- Content Row -->
                    <?php 
                        if ($_SESSION["level_user"] != "ts"){
                       ?>
						
						
						<!-- Begin Page Content -->
						<div class="container-fluid">

						  <!-- Page Heading 
						  <h1 class="h3 mb-2 text-gray-800">Tables Instalasi Kapten</h1>
						  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
							-->
						  <!-- DataTales Example -->
						  <div class="card shadow mb-4">
							<div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary">BID WO MAINTENANCE</h6>
							</div>
							<div class="card-body">
							  <div class="table-responsive">
								<table class="table table-bordered" id="tabel_pengguna" width="100%" cellspacing="0">
								  <thead>
									<tr>
									<th>NO</th>
									<th>Tanggal</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>NO Telepon</th>
									<th>Keterangan</th>
									<th>Tanggal Instalasi</th>
									<th>ID-USER</th>
									<th>Action</th>
									</tr>
								  </thead>
								  <tfoot>
									<tr>
									<th>NO</th>
									<th>Tanggal</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>NO Telepon</th>
									<th>Keterangan</th>
									<th>Tanggal Instalasi</th>
									<th>ID-USER</th>
									<th>Action</th>
									</tr>
								  </tfoot>
								  <tbody> 
									<?php 
						  include('../controller/controller_mysqli.php');
						$acces_user_log = $_SESSION["username"];
						  $table = mysqli_query($koneksi,"SELECT * FROM tbl_maintenance 
						  WHERE status_wo='Belum Terpasang' and pic_ikr='".$acces_user_log."' 
						  ORDER BY key_fal DESC");
						  while ($row = mysqli_fetch_assoc($table)){ 
						  $i=0;
						  $no=1;
						 
						  ?>
						  <tr id=<?php echo $row['key_fal']; ?>">
							<td> <?php echo $no; ?></td>
							<td data-target="tgl_date_time"> <?php echo $row['tgl_date_time'];?></td>
							<td data-target="nama_fal"> <?php echo $row['nama_fal'];?></td>
							<td data-target="alamat_fal"> <?php echo $row['alamat_fal'];?></td>
							<td data-target="tlp_fal"> <?php echo $row['tlp_fal'];?></td>
							<td data-target="lain_lain"> <?php echo $row['lain_lain'];?></td>
							<td data-target="tanggal_instalasi"> <?php echo $row['tanggal_instalasi'];?></td>
							<td data-target="username_Maintenance"> <?php echo $row['username_Maintenance'];?></td>
							<!-- td data-target="password_fal"> <?php echo $row['password_fal'];?></td>
							<td data-target="lain_lain"> <?php echo $row['lain_lain'];?></td>
							<td data-target="jenis_wo"> <?php echo $row['jenis_wo'];?></td>
							<td data-target="pic_ikr"> <?php echo $row['pic_ikr'];?></td>
							<td data-target="perlakuan"> <?php echo $row['perlakuan'];?></td>
							<td data-target="total_diskon"> <?php echo $row['total_diskon'];?></td>
							<td data-target="keterangan_angsuran"> <?php echo $row['keterangan_angsuran'];?></td>
							<td data-target="status_wo"> <?php echo $row['status_wo'];?></td -->
							<td> <div class="btn-group">	 
							<button type="button" name="edit" data-id="<?php echo $row['username_fal'];?>"
							nama_fal="<?php echo $row['nama_fal'];?>"							
							key_fal="<?php echo $row['key_fal'];?>"
							lain_lain="<?php echo $row['lain_lain'];?>"
							username_fal="<?php echo $row['username_fal'];?>"
							pic_ikr="<?php echo $row['pic_ikr'];?>"
							username_Maintenance="<?php echo $row['username_Maintenance'];?>"
							class="btn btn-warning btn-sm mr-2 editproses">Proses</button>
							</div></td>
						  </tr>
						  <?php	
						  }
						  ?>
								  </tbody>
								</table>
							  </div>
							</div>
							<div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary">BID WO Maintenace ODP</h6>
							</div>
							<div class="card-body">
							  <div class="table-responsive">
								
								<table class="table table-bordered" id="tabel_penggunaodp" width="100%" cellspacing="0">
								  <thead>
									<tr>
									<th>NO</th>
									<th>Tanggal</th>
									<th>Nama</th>
									<th>Keterangan</th>
									<th>ID-ODP</th>
									<th>Action</th>
									</tr>
								  </thead>
								  <tfoot>
									<tr>
									<th>NO</th>
									<th>Tanggal</th>
									<th>Nama</th>
									<th>Keterangan</th>
									<th>ID-ODP</th>
									<th>Action</th>
									</tr>
								  </tfoot>
								  <tbody> 
									<?php 
						  include('../controller/controller_mysqli.php');
						$acces_user_log = $_SESSION["username"];
						  $table = mysqli_query($koneksi,"SELECT * FROM tbl_maintenance_odp
						  WHERE status_wo='Belum Terpasang' and pic_ikr='".$acces_user_log."' 
						  ORDER BY key_fal DESC");
						  while ($row = mysqli_fetch_assoc($table)){ 
						  $i=0;
						  $no=1;
						 
						  ?>
						  <tr id=<?php echo $row['key_fal']; ?>">
							<td> <?php echo $no; ?></td>
							<td data-target="tgl_sign"> <?php echo $row['tgl_sign'];?></td>
							<td data-target="nama_fal"> <?php echo $row['nama_fal'];?></td>
							<td data-target="lain_lain"> <?php echo $row['lain_lain'];?></td>
							<td data-target="id_odp"> <?php echo $row['id_odp'];?></td>
							<!-- td data-target="password_fal"> <?php echo $row['password_fal'];?></td>
							<td data-target="lain_lain"> <?php echo $row['lain_lain'];?></td>
							<td data-target="jenis_wo"> <?php echo $row['jenis_wo'];?></td>
							<td data-target="pic_ikr"> <?php echo $row['pic_ikr'];?></td>
							<td data-target="perlakuan"> <?php echo $row['perlakuan'];?></td>
							<td data-target="total_diskon"> <?php echo $row['total_diskon'];?></td>
							<td data-target="keterangan_angsuran"> <?php echo $row['keterangan_angsuran'];?></td>
							<td data-target="status_wo"> <?php echo $row['status_wo'];?></td -->
							<td> <div class="btn-group">	 
							<button type="button" name="edit" data-id="<?php echo $row['username_fal'];?>"
							nama_fal="<?php echo $row['nama_fal'];?>"							
							key_fal="<?php echo $row['key_fal'];?>"
							lain_lain="<?php echo $row['lain_lain'];?>"
							username_fal="<?php echo $row['username_fal'];?>"
							pic_ikr="<?php echo $row['pic_ikr'];?>"
							username_Maintenance="<?php echo $row['username_Maintenance'];?>"
							class="btn btn-warning btn-sm mr-2 edit_odp">Proses</button>
							</div></td>
						  </tr>
						  <?php	
						  }
						  ?>
								  </tbody>
								</table>
							  </div>
							</div>
						  </div>

						</div> 
						
						<!-- Begin Page Content -->
						<div class="container-fluid">

						  <!-- Page Heading 
						  <h1 class="h3 mb-2 text-gray-800">Tables Instalasi Kapten</h1>
						  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
							-->
						  <!-- DataTales Example -->
						  <div class="card shadow mb-4">
							<div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary">Hasil Proses Pekerjaan Maintenance</h6>
							</div>
							<div class="card-body">
							  <div class="table-responsive">
								<table class="table table-bordered" id="tabel_pengguna2" width="100%" cellspacing="0">
								  <thead>
									<tr>
									<th>NO</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>NO Telepon</th>
									<th>Keterangan</th>
									<th>Tanggal Instalasi</th>
									<th>ID-USER</th>
									<th>Action</th>
									</tr>
								  </thead>
								  <tfoot>
									<tr>
									<th>NO</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>NO Telepon</th>
									<th>Keterangan</th>
									<th>Tanggal Instalasi</th>
									<th>ID-USER</th>
									<th>Action</th>
									</tr>
								  </tfoot>
								  <tbody> 
									<?php 
						  include('../controller/controller_mysqli.php');
						$acces_user_log = $_SESSION["username"];
						  $table = mysqli_query($koneksi,"SELECT a.*, b.*, DATE_FORMAT(b.tanggal,'%d-%M-%Y') as tanggal_kom FROM tbl_maintenance a, keluhan b
						  WHERE a.username_fal=b.id and a.status_wo='Proses Pengerjaan' and a.pic_ikr='".$acces_user_log."' 
						  ORDER BY a.key_fal DESC");
						  while ($row = mysqli_fetch_assoc($table)){ 
						  $i=0;
						  $no=1;
						  ?>
						  <tr id=<?php echo $row['key_fal']; ?>">
							<td> <?php echo $no; ?></td>
							<td data-target="nama_fal"> <?php echo $row['nama_fal'];?></td>
							<td data-target="alamat_fal"> <?php echo $row['alamat_fal'];?></td>
							<td data-target="tlp_fal"> <?php echo $row['tlp_fal'];?></td>
							<td data-target="lain_lain"> <?php echo $row['lain_lain'];?></td>
							<td data-target="tanggal_instalasi"> <?php echo $row['tanggal_instalasi'];?></td>
							<td data-target="username_Maintenance"> <?php echo $row['username_Maintenance'];?></td>
							<!-- td data-target="password_fal"> <?php echo $row['password_fal'];?></td>
							<td data-target="lain_lain"> <?php echo $row['lain_lain'];?></td>
							<td data-target="jenis_wo"> <?php echo $row['jenis_wo'];?></td>
							<td data-target="pic_ikr"> <?php echo $row['pic_ikr'];?></td>
							<td data-target="perlakuan"> <?php echo $row['perlakuan'];?></td>
							<td data-target="total_diskon"> <?php echo $row['total_diskon'];?></td>
							<td data-target="keterangan_angsuran"> <?php echo $row['keterangan_angsuran'];?></td>
							<td data-target="status_wo"> <?php echo $row['status_wo'];?></td -->
							<td> <div class="btn-group">	 
							<button type="button" name="edit" data-id="<?php echo $row['username_fal'];?>"
							nama_fal="<?php echo $row['nama_fal'];?>"							
							key_fal="<?php echo $row['key_fal'];?>"
							lain_lain="<?php echo $row['lain_lain'];?>"
							username_fal="<?php echo $row['username_fal'];?>"
							username_Maintenance="<?php echo $row['username_Maintenance'];?>"
							kd_layanan="<?php echo $row['kd_layanan'];?>"
							tlp_fal="<?php echo $row['tlp_fal'];?>"
							tanggal_kom="<?php echo $row['tanggal_kom'];?>"
							class="btn btn-success btn-sm mr-2 editmaintenance">Edit</button>
							
						</div></td>
						  </tr>
						  <?php	
						  }
						  ?>
								  </tbody>
								</table>
							  </div>
							</div>
							<div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary">Hasil Proses Pekerjaan Maintenance ODP</h6>
							</div>
							<div class="card-body">
							  <div class="table-responsive">
								<table class="table table-bordered" id="tabel_pengguna_odp" width="100%" cellspacing="0">
								  <thead>
									<tr>
									<th>NO</th>
									<th>id odp</th>
									<th>Nama</th>
									<th>Tanggal Instalasi</th>
									<th>ID ODP</th>
									<th>Action</th>
									</tr>
								  </thead>
								  <tfoot>
									<tr>
									<th>NO</th>
									<th>id odp</th>
									<th>Nama</th>
									<th>Tanggal Instalasi</th>
									<th>ID ODP</th>
									<th>Action</th>
									</tr>
								  </tfoot>
								  <tbody> 
									<?php 
						  include('../controller/controller_mysqli.php');
						  $acces_user_log = $_SESSION["username"];
						  $table = mysqli_query($koneksi,"SELECT * FROM tbl_maintenance_odp 
						  WHERE status_wo='Proses Pengerjaan' and pic_ikr='".$acces_user_log."' 
						  ORDER BY key_fal DESC");
						  while ($row = mysqli_fetch_assoc($table)){ 
						  $i=0;
						  $no=1;
						  ?>
						  <tr id=<?php echo $row['username_fal']; ?>">
							<td> <?php echo $no; ?></td>
							<td data-target="id_odp"> <?php echo $row['id_odp'];?></td>
							<td data-target="nama_fal"> <?php echo $row['nama_fal'];?></td>
							<td data-target="tgl_sign"> <?php echo $row['tgl_sign'];?></td>
							<td data-target="id_odp"> <?php echo $row['id_odp'];?></td>
							<!-- td data-target="password_fal"> <?php echo $row['password_fal'];?></td>
							<td data-target="lain_lain"> <?php echo $row['lain_lain'];?></td>
							<td data-target="jenis_wo"> <?php echo $row['jenis_wo'];?></td>
							<td data-target="pic_ikr"> <?php echo $row['pic_ikr'];?></td>
							<td data-target="perlakuan"> <?php echo $row['perlakuan'];?></td>
							<td data-target="total_diskon"> <?php echo $row['total_diskon'];?></td>
							<td data-target="keterangan_angsuran"> <?php echo $row['keterangan_angsuran'];?></td>
							<td data-target="status_wo"> <?php echo $row['status_wo'];?></td -->
							<td> <div class="btn-group">	 
							<button type="button" name="edit" data-id="<?php echo $row['username_fal'];?>"
							nama_fal="<?php echo $row['nama_fal'];?>"							
							username_fal="<?php echo $row['username_fal'];?>"
							id_odp="<?php echo $row['id_odp'];?>"
							class="btn btn-info btn-sm mr-2 editsinden">Edit</button>
							
						</div></td>
						  </tr>
						  <?php	
						  }
						  ?>
								  </tbody>
								</table>
							  </div>
							</div>
							<div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary">Data Maintenance Backbone </h6>
							</div>
							<div class="card-body">
							  <div class="table-responsive">
								<table class="table table-bordered" id="tabel_pengguna_bckbn" width="100%" cellspacing="0">
								  <thead>
									<tr>
									<th>NO</th>
									<th>ID Backbone</th>
									<th>Nama Backbone</th>
									<th>Alamat</th>
									<th>Keterangan</th>
									<th>Layanan </th>
									<th>PIC</th>
									<th>Status</th>
									<th>Action</th>
									</tr>
								  </thead>
								  <tfoot>
									<tr>
									<th>NO</th>
									<th>ID Backbone</th>
									<th>Nama Backbone</th>
									<th>Alamat</th>
									<th>Keterangan</th>
									<th>Layanan </th>
									<th>PIC</th>
									<th>Status</th>
									<th>Action</th>
									</tr>
								  </tfoot>
								  <tbody> 
									<?php 
						  include('../controller/controller_mysqli.php');
						$acces_user_log = $_SESSION["username"];
						  $table = mysqli_query($koneksi,"SELECT * FROM tbl_backbone 
						  WHERE status_wo='Belum Terpasang' and pic_ikr_backbone='".$acces_user_log."' 
						  ORDER BY key_backbone DESC");
						  while ($row = mysqli_fetch_assoc($table)){ 
						  $i=0;
						  $no=1;
						  
						  if($row['status_wo'] == 'Sudah Terpasang'){
											$row['type_status'] = '<small class="badge badge-success">'. strtoupper($row['status_wo']).'</small>';
											}elseif($row['status_wo'] == 'Proses Pengerjaan'){
												$row['type_status'] = '<small class="badge badge-warning">'. strtoupper($row['status_wo']).'</small>';
											}elseif($row['status_wo'] == 'Belum Terpasang'){
												$row['type_status'] = '<small class="badge badge-danger">'. strtoupper($row['status_wo']).'</small>';
											}else{
												$row['type_status'] = $data[$i]['status_wo'];
											}
						  ?>
						  <tr id=<?php echo $row['key_backbone']; ?>">
							<td> <?php echo $no; ?></td>
							<td data-target="key_backbone"> <?php echo $row['key_backbone'];?></td>
							<td data-target="nama_backbone"> <?php echo $row['nama_backbone'];?></td>
							<td data-target="alamat_fal_backbone"> <?php echo $row['alamat_fal_backbone'];?></td>
							<td data-target="lain_lain_backbone"> <?php echo $row['lain_lain_backbone'];?></td>
							<td data-target="kd_layanan_backbone"> <?php echo $row['kd_layanan_backbone'];?></td>
							<td data-target="pic_ikr_backbone"> <?php echo $row['pic_ikr_backbone'];?></td>
							<td data-target="type_status"> <?php echo $row['type_status'];?></td>
							<!-- td data-target="password_fal"> <?php echo $row['password_fal'];?></td>
							<td data-target="lain_lain"> <?php echo $row['lain_lain'];?></td>
							<td data-target="jenis_wo"> <?php echo $row['jenis_wo'];?></td>
							<td data-target="pic_ikr"> <?php echo $row['pic_ikr'];?></td>
							<td data-target="perlakuan"> <?php echo $row['perlakuan'];?></td>
							<td data-target="total_diskon"> <?php echo $row['total_diskon'];?></td>
							<td data-target="keterangan_angsuran"> <?php echo $row['keterangan_angsuran'];?></td>
							<td data-target="status_wo"> <?php echo $row['status_wo'];?></td -->
							<td> <div class="btn-group">	 
							<button type="button" name="edit" data-id="<?php echo $row['key_backbone'];?>"
							nama_backbone="<?php echo $row['nama_backbone'];?>"							
							key_backbone="<?php echo $row['key_backbone'];?>"
							id_odp="<?php echo $row['id_odp'];?>"
							lain_lain="<?php echo $row['lain_lain'];?>"
							class="btn btn-info btn-sm mr-2 editbckbone">Edit</button>
							
						</div></td>
						  </tr>
						  <?php	
						  }
						  ?>
								  </tbody>
								</table>
							  </div>
							</div>
						  </div>

						</div>   
					  

                       <?php     
                        } else {

                        ?>
                        
                          <div class="table-responsive">
                        <table id="tabel_pengguna_ts" class="table table-bordered table-striped">
                        
                          <thead>
                      
                          <tr>
                           
                            <th>NO</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Username</th>
                            <th>Modem</th>
                            <th>Kabel 1</th>
                            <th>Kabel 2</th>                            
                            <th>Kabel 3</th>
                            <th>Produk</th>
                            <th>pic</th>
                            <th>pic2</th>
                            <th>status</th>
                            <th>status2</th>
							<th>ACTION</th>
                    
                          
                          </tr>
                          </thead>
                          <tbody></tbody>
          
                        </table>
                      </div>

                        <?php    
                        }
                    ?>
                                  
                  

                    

              

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="../controller/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
	
	<!-- form selain kapten -->
	
	 <div class="modal fade" id="modalupdatesinden"  role="dialog" tabindex="-1">

        <div class="modal-dialog modal-xl" role="document">

            <div class="modal-content">


                 <div class="modal-body">
                    <form role="form" method="post" id="form_edit_sinden">
					
                   
                    <div class="form-row">
					<div class="form-group col-md-2">
                            <label for="rang">ID User</label>
                            <input class="form-control" type="text" id="username_sinden" name="username_sinden" autocomplete="off"  disabled>
                        </div>
						
					<div class="form-group col-md-2">
                            <label for="rang">ID ODP</label>
                            <input class="form-control" type="text" id="id_odp" name="id_odp" autocomplete="off"  disabled>
                        </div>
						
					<div class="form-group col-md-2">
                            <label for="rang">Nama User</label>
                            <input class="form-control" type="text" id="nama_sinden" name="nama_sinden" autocomplete="off"  disabled>
                        </div>
					
                        <div class="form-group col-md-2">
                    <label for="rang">Teknisi 1</label>                
                    <select class="form-control" type="text" id="pic_sinden" name="pic_sinden" autocomplete="off" >
                    <option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE kantor_cabang='".$kota."' and status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan='Karyawan'");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['nama_panggilan'].'">'.$data_user['nama_panggilan'].'#'.$data_user['status_karyawan'].'</option>';
											  } 
											?>   </option> 
					<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE kantor_cabang='".$kota."' and status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan='Outsourcing'");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['nama_panggilan'].'">'.$data_user['nama_panggilan'].'#'.$data_user['status_karyawan'].'</option>';
											  } 
											?>   </option>                                                       
                    </select>
                  </div>

                         <div class="form-group col-md-2">
                    <label for="rang">Teknisi 2</label>                
                    <select class="form-control" type="text" id="pic_sinden2" name="pic_sinden2" autocomplete="off">
                    <option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE kantor_cabang='".$kota."' and status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan='Karyawan'");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['nama_panggilan'].'">'.$data_user['nama_panggilan'].'#'.$data_user['status_karyawan'].'</option>';
											  } 
											?>   </option> 
					<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE kantor_cabang='".$kota."' and status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan='Outsourcing'");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['nama_panggilan'].'">'.$data_user['nama_panggilan'].'#'.$data_user['status_karyawan'].'</option>';
											  } 
											?>   </option>                                                     
                    </select>
                  </div>                         
                        
                       
					<div class="form-group col-md-4">
                    <label for="rang">Spliter 1</label>                
                    <select class="form-control" type="text" id="spltr" name="spltr" autocomplete="off">
                    <option>-</option>
                    <option>1/4</option>
                    <option>1/8</option>
                    <option>1/16</option>                    
                    </select>
                  </div>
                        <div class="form-group col-md-4">
                    <label for="rang">Spliter 2</label>                
                    <select class="form-control" type="text" id="spltr2" name="spltr2" autocomplete="off">
                    <option>-</option>
                    <option>1/4</option>
                    <option>1/8</option>
                    <option>1/16</option>                    
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="rang">Spliter 3</label>                
                    <select class="form-control" type="text" id="spltr3" name="spltr3" autocomplete="off">
                    <option>-</option>
                    <option>1/4</option>
                    <option>1/8</option>
                    <option>1/16</option>                    
                    </select>
                  </div> 
					
                       <div class="form-group col-md-2">
                    <label for="lname">Panjang Kabel</label>
                    <input class="form-control" type="number" id="kabel_sinden" name="kabel_sinden" autocomplete="off" required>                    
						</div>
						
					<div class="form-group col-md-6">
                            <label for="rang">Keterangan</label>
                            <input class="form-control" type="text" id="lain_lainodp" name="lain_lainodp" placeholder="keterangan" autocomplete="off">
                        </div>
                        
				
				 				
              </div>
			  
			 
			  
                 <div class=form-row">
			  </br>
                    <h4>Harap isi Lokasi di bawah ini</h4>
                    </br>
			  <div class="form-group col-md-6" >
                            <button class="btn btn-danger pull-right" type="button" onclick="showPosition();">Show Position</button>
                                <span type="text" id="b" name="b" value="">
                                  
                        </div>	
                        <div class="form-group col-md-6" >
							<label for="rang">Tekan Tombool Show Position</label>  
                            <input class="form-control" type="text" id="get_lokasi" name="get_lokasi" autocomplete="off" required>   
                        </div>
				</div>
			  
			 
			  
                <div class="form-row">
               <div class="form-group col-md-6">
                    <label for="rang">Status</label>                
                    <select class="form-control" type="text" id="status_sinden" name="status_sinden" autocomplete="off">
                    <option>Belum Terpasang</option>
                    <option>Sudah Terpasang</option>              
                                                                                     
                    </select>
                  </div>                     
                           
                        
                        </div>
				
						<hr>
                            <button type="button" class="btn btn-success  pull-right saveupdate9">Update</button>
                            <button type="reset" class="btn btn-danger pull-right"><i class="fa fa-times fa-fw"></i>Reset</button>
                            
                        </form>
			
					<!-- END ISIAN DATA ADMIN -->
						
		
                      </div>
					  					  
            </div>

        </div>

    </div>
	
	<!-- form selain kapten -->
	
	 <div class="modal fade" id="modalbckbn"  role="dialog" tabindex="-1">

        <div class="modal-dialog modal-xl" role="document">

            <div class="modal-content">


                 <div class="modal-body">
                    <form role="form" method="post" id="form_edit_sinden">
					
                   
                    <div class="form-row">
				
					<div class="form-group col-md-2">
                            <label for="rang">ID</label>
                            <input class="form-control" type="text" id="key_backbone" name="key_backbone" autocomplete="off"  disabled>
                        </div>
						
						<div class="form-group col-md-2">
                            <label for="rang">Nama Bacakbone</label>
                            <input class="form-control" type="text" id="nama_backbone" name="nama_backbone" autocomplete="off"  disabled>
                        </div>
					
                        <div class="form-group col-md-2">
                    <label for="rang">Teknisi 1</label>                
                    <select class="form-control" type="text" id="pic_bckbn" name="pic_bckbn" autocomplete="off" >
                    <option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE kantor_cabang='".$kota."' and status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan='Karyawan'");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['nama_panggilan'].'">'.$data_user['nama_panggilan'].'#'.$data_user['status_karyawan'].'</option>';
											  } 
											?>   </option> 
					<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE kantor_cabang='".$kota."' and status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan='Outsourcing'");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['nama_panggilan'].'">'.$data_user['nama_panggilan'].'#'.$data_user['status_karyawan'].'</option>';
											  } 
											?>   </option>                                                       
                    </select>
                  </div>

                         <div class="form-group col-md-2">
                    <label for="rang">Teknisi 2</label>                
                    <select class="form-control" type="text" id="pic_bckbn2" name="pic_bckbn2" autocomplete="off">
                    <option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE kantor_cabang='".$kota."' and status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan='Karyawan'");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['nama_panggilan'].'">'.$data_user['nama_panggilan'].'#'.$data_user['status_karyawan'].'</option>';
											  } 
											?>   </option> 
					<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE kantor_cabang='".$kota."' and status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan='Outsourcing'");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['nama_panggilan'].'">'.$data_user['nama_panggilan'].'#'.$data_user['status_karyawan'].'</option>';
											  } 
											?>   </option>                                                     
                    </select>
                  </div>                         
	
						
					<div class="form-group col-md-6">
                            <label for="rang">Keterangan</label>
                            <input class="form-control" type="text" id="lain_lain_backbone" name="lain_lain_backbone" placeholder="keterangan" autocomplete="off">
                        </div>
                        
				
				 				
              </div>
			  
			 
			  
                 <div class=form-row">
			  </br>
                    <h4>Harap isi Lokasi di bawah ini</h4>
                    </br>
			  <div class="form-group col-md-6" >
                            <button class="btn btn-danger pull-right" type="button" onclick="showPosition();">Show Position</button>
                                <span type="text" id="b" name="b" value="">
                                  
                        </div>	
                        <div class="form-group col-md-6" >
							<label for="rang">Tekan Tombool Show Position</label>  
                            <input class="form-control" type="text" id="bckbn" name="bckbn" autocomplete="off" required>   
                        </div>
				</div>
			  
			 
			  
                <div class="form-row">
               <div class="form-group col-md-6">
                    <label for="rang">Status</label>                
                    <select class="form-control" type="text" id="status_bckbn" name="status_bckbn" autocomplete="off">
                    <option>Belum Terpasang</option>
                    <option>Sudah Terpasang</option>              
                                                                                     
                    </select>
                  </div>                     
                           
                        
                        </div>
				
						<hr>
                            <button type="button" class="btn btn-success  pull-right savebckbn">Save</button>
                            <button type="reset" class="btn btn-danger pull-right"><i class="fa fa-times fa-fw"></i>Reset</button>
                            
                        </form>
			
					<!-- END ISIAN DATA ADMIN -->
						
		
                      </div>
					  					  
            </div>

        </div>

    </div>
	
	<!-- form selain kapten -->
	
	 <div class="modal fade" id="modalupdatmaintenance"  role="dialog" tabindex="-1">

        <div class="modal-dialog modal-xl" role="document">

            <div class="modal-content">


                 <div class="modal-body">
                    <form role="form" method="post" id="form_edit_sinden">
					
                   
                    <div class="form-row">
					
					<div class="form-group col-md-2">
                            <input class="form-control" type="hidden" id="key_fal" name="key_fal" autocomplete="off"  disabled>
                        </div>
						
					<div class="form-group col-md-2">
                            <input class="form-control" type="hidden" id="kd_layanan" name="kd_layanan" autocomplete="off"  disabled>
                        </div>
						
					<div class="form-group col-md-2">
                            <input class="form-control" type="hidden" id="mntn" name="mntn" autocomplete="off"  disabled>
                        </div>
						
					<div class="form-group col-md-2">
                            <input class="form-control" type="hidden" id="tlp_fal" name="tlp_fal" autocomplete="off"  disabled>
                        </div>
						
					<div class="form-group col-md-2">
                            <input class="form-control" type="hidden" id="nama_fal" name="nama_fal" autocomplete="off"  disabled>
                        </div>
						
					<div class="form-group col-md-2">
                            <input class="form-control" type="hidden" id="tanggal_kom" name="tanggal_kom" autocomplete="off"  disabled>
                        </div>
						
					<div class="form-group col-md-2">
                            <input class="form-control" type="hidden" id="username_Maintenance" name="username_Maintenance" autocomplete="off"  disabled>
                        </div>
						
                    <div class="form-group col-md-4">
							<label for="rang">Teknisi 1</label>                
							<select class="form-control" type="text" id="pic_maintenace" name="pic_maintenace" autocomplete="off" required>
							<option> <?php
													  include('../controller/controller_mysqli.php');
													  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE kantor_cabang='".$kota."' and status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan='Karyawan'");
													  //$data_user = mysqli_fetch_array($sql_user);
													  //print_r($data_user);
													 while ($data_user = mysqli_fetch_array($sql_user)) {
														echo '<option value"'.$data_user['nama_panggilan'].'">'.$data_user['nama_panggilan'].'#'.$data_user['status_karyawan'].'</option>';
													  } 
													?>   </option> 
							<option> <?php
													  include('../controller/controller_mysqli.php');
													  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE kantor_cabang='".$kota."' and status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan='Outsourcing'");
													  //$data_user = mysqli_fetch_array($sql_user);
													  //print_r($data_user);
													 while ($data_user = mysqli_fetch_array($sql_user)) {
														echo '<option value"'.$data_user['nama_panggilan'].'">'.$data_user['nama_panggilan'].'#'.$data_user['status_karyawan'].'</option>';
													  } 
													?>   </option>                                                     
							</select>
					</div>

                         <div class="form-group col-md-4">
                    <label for="rang">Teknisi 2</label>                
                    <select class="form-control" type="text" id="pic_maintenace2" name="pic_maintenace2" autocomplete="off">
                    <option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE kantor_cabang='".$kota."' and status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan='Karyawan'");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['nama_panggilan'].'">'.$data_user['nama_panggilan'].'#'.$data_user['status_karyawan'].'</option>';
											  } 
											?>   </option> 
					<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE kantor_cabang='".$kota."' and status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan='Outsourcing'");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['nama_panggilan'].'">'.$data_user['nama_panggilan'].'#'.$data_user['status_karyawan'].'</option>';
											  } 
											?>   </option>                                                   
                    </select>
                  </div>          

                  <!-- div class="form-group col-md-2">
                    <label for="rang">Kategori Maintenance</label>                
                    <select class="form-control" type="text" id="kategori_maintenance" name="kategori_maintenance" autocomplete="off" required>
                    <option>-</option>
                    <option>Splicing</option>
                    <option>Ganti Modem</option>
                    <option>Setting Modem</option>
                    <option>Tarik Kabel</option> 
                    <option>Maintenance ODP</option>                    
                    </select>
                  </div -->   
				</div>

				<div class="form-row">				  

				  <div class="form-group col-md-2">
                                <label for="rang">Kategori Maintenance</label>                
                     <select class='form-control' id="kategori_maintenance" name="kategori_maintenance" required>
					    <option></option>
						<option value="Splicing">Splicing</option>
						<option value="Banding Kabel">Banding Kabel</option>
						<option value="Ganti Modem">Ganti Modem</option>
						<option value="Setting Modem">Setting Modem</option>
						<option value="Tarik Kabel">Tarik Kabel</option>
						
						</select> &nbsp
                            </div> 
					
					<!-- div class="form-group col-md-2">
					 <label for="rang">Kategori MAINTENANCE</label>
						<select class='form-control' id="kategori_maintenance" name="kategori_maintenance">							
							<option value="Splicing">Splicing</option>
							<option value="Banding Kabel">Banding Kabel</option>
							<option value="Ganti Modem">Ganti Modem</option>
							<option value="Setting Modem">Setting Modem</option>
							<option value="Tarik Kabel">Tarik Kabel</option>
							<option value="Maintenance ODP">Maintenance ODP</option>
						</select>
					</div -->
					
					<div class="form-group col-md-2" autocomplete="off">
					  <label for="modem">Modem</label>
					  <select class="form-control" id="modem" name="modem">
							<option>-</option>
							<option>XPON</option>
							<option>ZTE F609 versi 1</option>
							<option>ZTE F609 versi 2</option>
							<option>ZTE F609 versi 3</option>
							<option>ZTE F663</option>
							<option>HUAWEI H5</option>
							<option>HUAWEI H5H</option>  
						</select>
							</div>
					<div class="form-group col-md-2" autocomplete="off">
					 <label for="kabel1">Kabel</label>
						<select class='form-control' id="kabel1" name="kabel1">							
							<option>-</option>
							<option>80 M</option>
							<option>100 M</option>
							<option>150 M</option>							
						</select>
					</div>
					
					<div class="form-group col-md-2" autocomplete="off">
					 <label for="kabel1">Kabel 2</label>
						<select class='form-control' id="kabel2" name="kabel2">							
							<option>-</option>
							<option>80 M</option>
							<option>100 M</option>
							<option>150 M</option>							
						</select>
					</div>
					
					<div class="form-group col-md-2" autocomplete="off">
					 <label for="kabel1">Kabel 3</label>
						<select class='form-control' id="kabel3" name="kabel3">							
							<option>-</option>
							<option>80 M</option>
							<option>100 M</option>
							<option>150 M</option>							
						</select>
					</div>
					
					<div class="form-group col-md-6">
                            <label for="rang">Keterangan</label>
                            <input class="form-control" type="text" id="lain_lain" name="lain_lain" placeholder="keterangan" autocomplete="off">
                        </div>
            </div>             
                      
       
                         <div class=form-row">
			  </br>
                    <h4>Harap isi Lokasi di bawah ini</h4>
                    </br>
			  <div class="form-group col-md-6" >
                            <button class="btn btn-danger pull-right" type="button" onclick="showPosition();">Show Position</button>
                                <span type="text" id="b" name="b" value="">
                                  
                        </div>	
                        <div class="form-group col-md-6" >
							<label for="rang">Tekan Tombool Show Position</label>  
                            <input class="form-control" type="text" id="ba" name="ba" autocomplete="off" required>   
                        </div>
				</div>
			  
			 
			  
                <div class="form-row">
               <div class="form-group col-md-6">
                    <label for="rang">Status</label>                
                    <select class="form-control" type="text" id="status_wo" name="status_wo" autocomplete="off">
                    <option></option>              
                    <option>Sudah Terpasang</option>              
                                                                                     
                    </select>
                  </div>                  
                    </div>
                            <hr>
                            <button type="button" class="btn btn-success  pull-right updatemaintenace">Update</button>
                            <button type="reset" class="btn btn-danger pull-right"><i class="fa fa-times fa-fw"></i>Reset</button>
 
                        </form>
			
					<!-- END ISIAN DATA ADMIN -->
						
		
                      </div>
					  					  
            </div>

        </div>

    </div>
	
	
	


	
    <!-- Bootstrap core JavaScript-->
    <script src="../asset/vendor/jquery/jquery.min.js"></script>
    <script src="../asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../asset/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../asset/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../asset/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../asset/js/demo/chart-area-demo.js"></script>
    <script src="../asset/js/demo/chart-pie-demo.js"></script>

    <script src="../asset/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="../js/bs-custom-file-input.js"></script>

   


    <!-- datepicker bootstrap -->

    <script src="../asset/js/bootstrap-datepicker.min.js"></script>
    <script src="../asset/locales/bootstrap-datepicker.id.min.js"></script>
	<script src="../js/sweetalert2.all.min.js"></script>
	<script src="../js/select2.min.js"></script>
	<script>
	$(document).ready(function() {
    $('.js-example-basic-multiple').select2({
		maximumSelectionLength: 1
	});
});
	$('#kode_user').select2().on('change', function(){
		//var a = $('.js-example-basic-multiple').val();
		var a = $('#kode_user').val();
alert (a);
    $.ajax({
        url: "../create/create_user_dismantle_byrequest.php",
        data: { "value": $("#kode_user").val() },
		//data: { "value": a },
        //dataType:"html",
        type: "post",
        success: function(data){
			//alert(data);
		var hasil = JSON.parse(data);
		   $('#username_Maintenance').val(hasil.kode_user);
           $('#nama_fal').val(hasil.nama_user);
		   $('#alamat_fal').val(hasil.alamat_user);
		   $('#tlp_fal').val(hasil.telp_user);
		   $('#kd_layanan').val(hasil.kd_layanan);		   
		   $('#kelurahan').val(hasil.kelurahan);
        }
    });		
	});
// In your Javascript (external .js resource or <script> tag)
/* $(document).ready(function() {
    $('.js-example-basic-single').select2();
}); */
	</script>
	<script>
		 $(document).ready(function() {
            bsCustomFileInput.init()
            
            var table = $('#tabel_pengguna').DataTable({
                "responsive": true,
                "processing": true,
                "language": {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
                }, 
                
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                
            });
            
            var table = $('#tabel_penggunaodp').DataTable({
                "responsive": true,
                "processing": true,
                "language": {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
                }, 
                
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                
            });
			
			var table = $('#tabel_pengguna2').DataTable({
                "responsive": true,
                "processing": true,
                "language": {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
                }, 
                
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                
            });

             var table = $('#tabel_pengguna_ts').DataTable({
                "responsive": true,
                "processing": true,
                "language": {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
                }, 
                "ajax": {
                    "url":"../models/datapenggunamaintenance.php",
                    "type":"POST",
                },
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                "columns": [
                    { mData: 'no'},
                    { mData: 'nama_fal'} ,
                    { mData: 'alamat_fal'} ,
                    { mData: 'username_fal'},
                    { mData: 'modem'} ,
                    { mData: 'kabel1'} ,
                    { mData: 'kabel2'} ,
                    { mData: 'kabel3'} ,                   
                    { mData: 'produk'} ,                    
                    { mData: 'pic'} ,
                    { mData: 'pic2'} ,
                    { mData: 'status'},
                    { mData: 'status2'},
					{ mData: 'delete'}, 
                ],
            });
			
			var table = $('#tabel_pengguna_odp').DataTable({

                "responsive": true,

                "processing": true,

                "language": {

                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'

                }, 

                

                "paging": true,

                "lengthChange": true,

                "searching": true,

                "ordering": false,

                "info": true,

                "autoWidth": true,

                "responsive": true,

                

            });
			
			var table = $('#tabel_pengguna_bckbn').DataTable({

                "responsive": true,

                "processing": true,

                "language": {

                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'

                }, 

                

                "paging": true,

                "lengthChange": true,

                "searching": true,

                "ordering": false,

                "info": true,

                "autoWidth": true,

                "responsive": true,

                

            });

            $( "#tanggal_user" ).datepicker({
                autoclose:true,
                todayHighlight:true,
                format:'dd-mm-yyyy',
                language: 'id'
            });

            $(document).on('click', '.add-data', function(){
                $('#modaltambahdata').modal('show');
                $("#formdatapengguna").trigger("reset");
                $("#username_fal").attr("disabled",false);
                $('.modal-user').text("Tambah Data");
                $('#action').val('insert');
                $('#actionform').text("Tambah");
            });
            
            $(".submitdata").click(function(){
            // alert("submit data");
           

            var action= $("#action").val();
            var nama_fal = $("#nama_fal").val();
            var pic_ikr = $("#pic_ikr").val();
            var kd_layanan = $("#kd_layanan").val();
            var username_Maintenance = $("#username_Maintenance").val();
            var kategori_maintenance = $("#kategori_maintenance").val();
            var alamat_fal = $("#alamat_fal").val();
            var rt = $("#rt").val();
            var rw = $("#rw").val();
            var kelurahan = $("#kelurahan").val();
            var tlp_fal = $("#tlp_fal").val();
            var tgl_fal = $("#tgl_fal").val();
            var pic = $("#pic").val();
            var status = $("#status").val();
            var status2 = $("#status2").val();
            var jenis_wo = $("#jenis_wo").val();
            var produk = $("#produk").val();
            var modem = $("#modem").val();
            var kabel1 = $("#kabel1").val();
            var kabel2 = $("#kabel2").val();
            var kabel3 = $("#kabel3").val();
            var paket_fal = $("#paket_fal").val();
            var tgl_fal = $("#tgl_fal").val();            
            var username_fal = $("#username_fal").val();
            var password_fal = $("#password_fal").val();
            var lain_lain = $("#lain_lain").val();
            var status_wo = $("#status_wo").val();
            var ket_user = $("#lain_lain").val();
            var k = $("#b").text();
			
			//alert (modem); return;
			
			if(nama_fal == ''){
				alert("DATA ANDA TIDAK LENGKAP"); 
				return
			}

            //alert(karyawan);

            var value = { action:action, nama_fal:nama_fal, kd_layanan:kd_layanan, pic_ikr:pic_ikr,alamat_fal:alamat_fal, rt:rt,rw:rw,kelurahan:kelurahan,tlp_fal:tlp_fal, pic:pic , status:status, status2:status2, username_Maintenance:username_Maintenance, kategori_maintenance:kategori_maintenance, jenis_wo:jenis_wo,produk:produk,modem:modem,kabel1:kabel1,kabel2:kabel2,kabel3:kabel3,paket_fal:paket_fal, tgl_fal:tgl_fal, username_fal:username_fal, password_fal:password_fal, status_wo:status_wo,lain_lain:lain_lain, ket:k }; 

                $.ajax({
                    type: "POST",
                    url: "../controller/action_maintenance.php",
                    data: value,
                    success: function(data) {
                        $('#tabel_pengguna').DataTable().ajax.reload();
                    }
                });  
            });

            $(document).on('click', '.editpengguna', function(){
                var id = $(this).attr("id");
                $.ajax({
                    url:"../controller/get_data_maintenance.php",
                    method:"POST",
                    data:{id:id},
                    dataType:"JSON",
                    success:function(data)
                    {
                        $('#modaltambahdata').modal('show');
                        $("#username_fal").attr("disabled",true);
                        $('.modal-user').text("Edit Data");
                        $('#action').val('edit');
                        $('#actionform').text("Edit");


                        $("#nama_fal").val(data.nama_fal);
                        $("#pic_ikr").val(data.pic_ikr);
                        $("#key_fal").val(data.key_fal);
                        $("#kd_layanan").val(data.kd_layanan);
                        $("#alamat_fal").val(data.alamat_fal);
                        $("#rt").val(data.rt);
                        $("#rw").val(data.rw);
                        $("#kelurahan").val(data.kelurahan);
                        $("#tlp_fal").val(data.tlp_fal);
                        $("#tgl_fal").val(data.tgl_fal);
                        $("#pic").val(data.pic);
                        $("#status").val(data.status);
                        $("#jenis_wo").val(data.jenis_wo);
                        $("#produk").val(data.produk);
                        $("#modem").val(data.modem);
                        $("#kabel1").val(data.kabel1);
                        $("#kabel2").val(data.kabel2);
                        $("#kabel3").val(data.kabel3);
                        $("#status2").val(data.status2);
                        $("#paket_fal").val(data.paket_fal);                      
                        $("#status_wo").val(data.status_wo);
                        $("#username_fal").val(data.username_fal);
                         $("#username_Maintenance").val(data.username_Maintenance);
                         $("#kategori_maintenance").val(data.kategori_maintenance);
                        $("#password_fal").val(data.password_fal);
                        $("#lain_lain").val(data.lain_lain);
                        $("#latitude").val(data.latitude);
                        $("#longitude").val(data.longitude);                    
                     
    
                        
                    }
                });
            });

            $(document).on('click', '.deletepengguna', function(){
                var id = $(this).attr("id");
                if(confirm('Hapus id '+id+'?'))
                {
                    $.ajax({
                        url:"../controller/delete.php",
                        method:"POST",
                        data:{id:id},
                        success:function(data)
                        {
                            $('#tabel_pengguna').DataTable().ajax.reload();
                            
                        }
                    })
                }
            });
			
			//get data value sinden
		$(document).on('click', '.editsinden', function(){
                alert($(this).data('id'));
				var id = $(this).attr('id');
				var username_fal = $(this).attr('username_fal');
				var nama_fal = $(this).attr('nama_fal');
				var id_odp = $(this).attr('id_odp');
				
				/* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
				var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
				var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
				var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
				var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
				var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
				//alert (alamat_fal);
				
				$('#modalupdatesinden').modal('show');
				$('#nama_sinden').val(nama_fal);				
				$('#username_sinden').val(username_fal);
				$('#id_odp').val(id_odp);
				
            });
			
			//get data value sinden
		$(document).on('click', '.editbckbone', function(){
                alert($(this).data('id'));
				var key_backbone = $(this).attr('key_backbone');
				var nama_backbone = $(this).attr('nama_backbone');
				var lain_lain_backbone = $(this).attr('lain_lain');
				
				$('#modalbckbn').modal('show');
				$('#key_backbone').val(key_backbone);				
				$('#nama_backbone').val(nama_backbone);
				$('#lain_lain_backbone').val(lain_lain_backbone);
				
            });
			
			//get data value sinden
		$(document).on('click', '.editmaintenance', function(){
                alert($(this).data('id'));
				var id = $(this).attr('id');
				var key_fal = $(this).attr('key_fal');
				var nama_fal = $(this).attr('nama_fal');
				var lain_lain = $(this).attr('lain_lain');
				var mntn = $(this).attr('username_fal');
				var username_Maintenance = $(this).attr('username_Maintenance');
				var kd_layanan = $(this).attr('kd_layanan');
				var tlp_fal = $(this).attr('tlp_fal');
				var tanggal_kom = $(this).attr('tanggal_kom');
				
				/* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
				var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
				var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
				var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
				var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
				var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
				//alert (lain_lain);
				
				$('#modalupdatmaintenance').modal('show');
				$('#key_fal').val(key_fal);				
				$('#lain_lain').val(lain_lain);				
				$('#mntn').val(mntn);				
				$('#username_Maintenance').val(username_Maintenance);				
				$('#kd_layanan').val(kd_layanan);				
				$('#tlp_fal').val(tlp_fal);				
				$('#tanggal_kom').val(tanggal_kom);				
				$('#nama_fal').val(nama_fal);				
				//$('#username_sinden').val(username_fal);
				
            });	
			
			
			// create 			
		$(document).on('click', '.editproses', function(){
			//var nama_fal = $("#nama_fal").val();
			 var key_fal = $(this).attr('key_fal');
			 var nama_fal = $(this).attr('nama_fal');
			 var username_Maintenance = $(this).attr('username_Maintenance');
			 var pic_ikr = $(this).attr('pic_ikr');
			 
			 //alert(key_fal); return;
			 
			 var value = { key_fal:key_fal,nama_fal:nama_fal,username_fal:username_Maintenance,pic_ikr:pic_ikr,
						 }; 

                $.ajax({

                    type: "POST",
					async: false,
                    url: "../controller/action_proses.php",
                    data: value,
                     success : function(data) {
									//alert(data);
									Swal.fire(
										  'Good job!',
										  data,
										  'success'
										).then(function(success){
											//if (data == 'succes') {
												//alert('a');
										window.location.reload(true);
											//}
									})
									}

                }); 
			 
			});
			
			// create 			
		$(document).on('click', '.edit_odp', function(){
			//var nama_fal = $("#nama_fal").val();
			 var key_fal = $(this).attr('key_fal');
			 var nama_fal = $(this).attr('nama_fal');
			 var username_Maintenance = $(this).attr('username_Maintenance');
			 var pic_ikr = $(this).attr('pic_ikr');
			 
			 //alert(key_fal); return;
			 
			 var value = { key_fal:key_fal,nama_fal:nama_fal,username_fal:username_Maintenance,pic_ikr:pic_ikr,
						 }; 

                $.ajax({

                    type: "POST",
					async: false,
                    url: "../controller/action_proses_odp.php",
                    data: value,
                     success : function(data) {
									//alert(data);
									Swal.fire(
										  'Good job!',
										  data,
										  'success'
										).then(function(success){
											//if (data == 'succes') {
												//alert('a');
										window.location.reload(true);
											//}
									})
									}

                }); 
			 
			});
			
			// create 			
		$(document).on('click', '.saveupdate9', function(){
			//var nama_fal = $("#nama_fal").val();
			 var id_odp = $('#id_odp').val();
			 var nama_sinden = $('#nama_sinden').val();
			 var username_sinden = $('#username_sinden').val();
			 var pic_sinden = $('#pic_sinden').val();
			 var pic_sinden2 = $('#pic_sinden2').val();
			 var spltr = $("#spltr").val();
			 var spltr2 = $("#spltr2").val();
             var spltr3 = $("#spltr3").val();
			 var kabel_sinden = $('#kabel_sinden').val();
			 var get_lokasi = $('#get_lokasi').val();
			 var status_sinden = $('#status_sinden').val();
			 var lain_lainodp = $('#lain_lainodp').val();
			 
			 
			 //alert(username_sinden); return;
			 
			 var value = { nama_sinden:nama_sinden,
						   id_odp:id_odp,
						   username_sinden:username_sinden,
						   pic_sinden:pic_sinden, 
						   pic_sinden2:pic_sinden2,
						   lain_lainodp:lain_lainodp,						   
						   kabel_sinden:kabel_sinden,
						   spltr:spltr,
						   spltr2:spltr2,
						   spltr3:spltr3,
						   get_lokasi:get_lokasi,
						   status_sinden:status_sinden,
						 }; 

                $.ajax({

                    type: "POST",
					async: false,
                    url: "../controller/action_edit_maintenanceodp.php",
                    data: value,
                    success : function(data) {
					alert(data);
					window.location.reload(true);
					}

                }); 
			 
			});
			
			// create 			
		$(document).on('click', '.savebckbn', function(){
			//var nama_fal = $("#nama_fal").val();
			 var key_backbone = $('#key_backbone').val();
			 var lain_lain_backbone = $('#lain_lain_backbone').val();
			 var nama_backbone = $('#nama_backbone').val();
			 var pic_bckbn = $('#pic_bckbn').val();
			 var pic_bckbn2 = $('#pic_bckbn2').val();
			 var bckbn = $('#bckbn').val();
			 var status_bckbn = $('#status_bckbn').val();
			 
			 
			 //alert(username_sinden); return;
			 
			 var value = { key_backbone:key_backbone,
						   lain_lain_backbone:lain_lain_backbone,
						   nama_backbone:nama_backbone,
						   pic_bckbn:pic_bckbn, 
						   pic_bckbn2:pic_bckbn2,
						   bckbn:bckbn,						   
						   status_bckbn:status_bckbn,
						 }; 

                $.ajax({

                    type: "POST",
					async: false,
                    url: "../controller/action_edit_maintenancebckbn.php",
                    data: value,
                    success : function(data) {
					alert(data);
					window.location.reload(true);
					}

                }); 
			 
			});
			
			// create 			
		$(document).on('click', '.updatemaintenace', function(){
			//var nama_fal = $("#nama_fal").val();			 
			 var key_fal = $('#key_fal').val();
			 var mntn = $('#mntn').val();
			 var pic_maintenace = $('#pic_maintenace').val();
			 var pic_maintenace2 = $('#pic_maintenace2').val();
			 var kategori_maintenance = $("#kategori_maintenance").val();
			 var modem = $("#modem").val();
             var kabel1 = $("#kabel1").val();
             var kabel2 = $("#kabel2").val();
             var kabel3 = $("#kabel3").val();
             var lain_lain = $("#lain_lain").val();
			 var status_wo = $('#status_wo').val();
			 var lokasi = $('#ba').val();			
			 var username_Maintenance = $('#username_Maintenance').val();			
			 var kd_layanan = $('#kd_layanan').val();			
			 var tlp_fal = $('#tlp_fal').val();			
			 var nama_fal = $('#nama_fal').val();			
			 var tanggal_kom = $('#tanggal_kom').val();			
			
			//alert(username_Maintenance); return;
			if(pic_maintenace == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'PIC Maintenance isi en bro!',				  
				}) 
				return
			}
			
			if(kategori_maintenance == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Kategori Maintenance isi en bro!',				  
				}) 
				return
			}
			
			if(lokasi == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Lokasi isi en bro!',				  
				}) 
				return
			}
			 //alert(kategori_maintenance); return;
			 
			 var value = { key_fal:key_fal,
						   mntn:mntn,
						   pic_maintenace:pic_maintenace,
						   pic_maintenace2:pic_maintenace2, 
						   kategori_maintenance:kategori_maintenance,
						   modem:modem,						   
						   kabel1:kabel1,
						   kabel2:kabel2,
						   kabel3:kabel3,
						   lain_lain:lain_lain,
						   status_wo:status_wo,
						   username_Maintenance:username_Maintenance,
						   lokasi:lokasi,
						   kd_layanan:kd_layanan,
						   tlp_fal:tlp_fal,
						   nama_fal:nama_fal,
						   tanggal_kom:tanggal_kom,
						 }; 

                $.ajax({

                    type: "POST",
					async: false,
                    url: "../controller/action_edit_maintenance.php",
                    data: value,
                   success : function(data) {
									//alert(data);
									Swal.fire(
										  'Good job!',
										  data,
										  'success'
										).then(function(success){
											//if (data == 'succes') {
												//alert('a');
												/* $.ajax({
													url: 'https://bandwidth.naratel.net.id/moniolt/control/get_solved_wo.php',
													type: 'POST',
													data: value,
													success : function(data) {
														alert(data);
														
													}
												}); */
											//}
											window.location.reload(true);
									})
									}

                }); 
			 
			});
			
		});
		
	</script>
     <script>

    // Set up global variable

    var result;

    

    function showPosition() {   

        // Store the element where the page displays the result

        result = document.getElementById("b");
		getlokasi = document.getElementById("get_lokasi");
        lokasi = document.getElementById("ba");
        bckbn = document.getElementById("bckbn");
		
        

        // If geolocation is available, try to get the visitor's position

        if(navigator.geolocation) {

            navigator.geolocation.getCurrentPosition(successCallback, errorCallback);

            result.innerHTML = "ERROR Harap Hubungi (IRSYAD)";

        } else {

            alert("Sorry, your browser does not support HTML5 geolocation.");

        }

    };

    

    // Define callback function for   attempt

    function successCallback(position) {

        result.innerHTML = position.coords.latitude + "#" + position.coords.longitude;
        lokasi.value = position.coords.latitude + "#" + position.coords.longitude;
		getlokasi.value = position.coords.latitude + "#" + position.coords.longitude;
		bckbn.value = position.coords.latitude + "#" + position.coords.longitude;
    }

    

    // Define callback function for failed attempt

    function errorCallback(error) {

        if(error.code == 1) {

            result.innerHTML = "Harap login melalui Grub Telegram (Grup WO) atau hubungi (IRSYAD)";

        } else if(error.code == 2) {

            result.innerHTML = "The network is down or the positioning service can't be reached.";

        } else if(error.code == 3) {

            result.innerHTML = "The attempt timed out before it could get the location data.";

        } else {

            result.innerHTML = "Geolocation failed due to unknown error.";

        }

    }


  $('#pic').change(function() {
    $('.select-default-hidden').hide();
    $('.select-default-shown').show();
      //var a = $(this).val();
      //alert (a);
    $('.select-' + $(this).val() + '-shown').show();
    $('.select-' + $(this).val() + '-hidden').hide();
}).change();

$(function() {
    $('#modem').hide();
	$('#kabel1').hide();
	$('#kabel2').hide();	
	$('#kabel3').hide();
    $('#kategori_maintenance').change(function(){
		var a = $('#kategori_maintenance').val();
		//alert(a);
       if(a == 'Ganti Modem'){
            $('#modem').show(); 
			$('#kabel1').hide();
			$('#kabel2').hide();
			$('#kabel3').hide();
        }else if(a == 'Tarik Kabel'){
            $('#modem').hide();
			$('#kabel1').show();
			$('#kabel2').show();
			$('#kabel3').show();
        }else{
			$('#modem').hide();
			$('#kabel1').hide();
			$('#kabel2').hide();
			$('#kabel3').hide();
		}
    });
});
</script>
</body>

</html>