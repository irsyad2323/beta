	 <?php

session_start();
$level_user = $_SESSION["level_user"];
$acces_user_log = $_SESSION["username"];
$level_kantor = $_SESSION["kantor"];
$marketing = $_SESSION["marketing"];




if(!isset($_SESSION["logingundala"])){

    header("location:login.php");

    exit;

}

$kota = $_SESSION["level_kantor"];

?>
	<?php if ( $kota == "mlg"){ ?>
	 <!-- div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                RAFIF</div><div class="font-weight-bold "> Status Pegawai <?php $conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="select status_pic from user where username='rafif'";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												
												if($row['status_pic'] == 'libur'){
													$hasil = '<small class="badge badge-danger">'. strtoupper($row['status_pic']).'</small>';
												}elseif($row['status_pic'] == 'masuk'){
													$hasil = '<small class="badge badge-success">'. strtoupper($row['status_pic']).'</small>';
												}
												
												echo "$hasil";
												mysqli_close($conn); ?> </small></div>
											<div class="font-weight-bold "> IKR &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <small class="badge badge-success"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_fal WHERE pic_ikr='rafif' and status_wo in ('Belum Terpasang','Proses Pengerjaan') and jenis_wo='INSTALASI' ;";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
											<div class="font-weight-bold "> MAINTENANCE &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <small class="badge badge-warning"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_maintenance WHERE pic_ikr='rafif' and status_wo in ('Belum Terpasang','Proses Pengerjaan')  and jenis_wo='MAINTENANCE';";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
											<div class="font-weight-bold "> MAINTENANCE ODP &nbsp&nbsp&nbsp&nbsp <small class="badge badge-danger"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_maintenance_odp WHERE pic_ikr='rafif' and status_wo in ('Belum Terpasang','Proses Pengerjaan')  and jenis_wo='MAINTENANCE_ODP';";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div -->
						
						<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                RINO</div><div class="font-weight-bold "> Status Pegawai <?php $conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="select status_pic from user where username='rino'";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												
												if($row['status_pic'] == 'libur'){
													$hasil = '<small class="badge badge-danger">'. strtoupper($row['status_pic']).'</small>';
												}elseif($row['status_pic'] == 'masuk'){
													$hasil = '<small class="badge badge-success">'. strtoupper($row['status_pic']).'</small>';
												}
												
												echo "$hasil";
												mysqli_close($conn); ?> </small></div> <div class="font-weight-bold "> IKR &nbsp&nbsp&nbsp <small class="badge badge-success"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_fal WHERE pic_ikr='rino' and status_wo in ('Belum Terpasang','Proses Pengerjaan') and jenis_wo='INSTALASI' ;";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
											<div class="font-weight-bold "> MAINTENANCE &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <small class="badge badge-warning"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_maintenance WHERE pic_ikr='rino' and status_wo in ('Belum Terpasang','Proses Pengerjaan')  and jenis_wo='MAINTENANCE';";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
											<div class="font-weight-bold "> MAINTENANCE ODP &nbsp&nbsp&nbsp&nbsp <small class="badge badge-danger"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_maintenance_odp WHERE pic_ikr='rino' and status_wo in ('Belum Terpasang','Proses Pengerjaan')  and jenis_wo='MAINTENANCE_ODP';";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
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
                                                FAUZI</div> <div class="font-weight-bold "> Status Pegawai <?php $conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="select status_pic from user where username='fauzi'";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												
												if($row['status_pic'] == 'libur'){
													$hasil = '<small class="badge badge-danger">'. strtoupper($row['status_pic']).'</small>';
												}elseif($row['status_pic'] == 'masuk'){
													$hasil = '<small class="badge badge-success">'. strtoupper($row['status_pic']).'</small>';
												}
												
												echo "$hasil";
												mysqli_close($conn); ?> </small></div><div class="font-weight-bold "> IKR &nbsp&nbsp&nbsp <small class="badge badge-success"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_fal WHERE pic_ikr='fauzi' and status_wo in ('Belum Terpasang','Proses Pengerjaan') and jenis_wo='INSTALASI' ;";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
											<div class="font-weight-bold "> MAINTENANCE &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <small class="badge badge-warning"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_maintenance WHERE pic_ikr='fauzi' and status_wo in ('Belum Terpasang','Proses Pengerjaan')  and jenis_wo='MAINTENANCE';";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
											<div class="font-weight-bold "> MAINTENANCE ODP &nbsp&nbsp&nbsp&nbsp <small class="badge badge-danger"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_maintenance_odp WHERE pic_ikr='fauzi' and status_wo in ('Belum Terpasang','Proses Pengerjaan') and jenis_wo='MAINTENANCE_ODP';";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
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
                                                FIO</div><div class="font-weight-bold "> Status Pegawai <?php $conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="select status_pic from user where username='fio'";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												
												if($row['status_pic'] == 'libur'){
													$hasil = '<small class="badge badge-danger">'. strtoupper($row['status_pic']).'</small>';
												}elseif($row['status_pic'] == 'masuk'){
													$hasil = '<small class="badge badge-success">'. strtoupper($row['status_pic']).'</small>';
												}
												
												echo "$hasil";
												mysqli_close($conn); ?> </small></div> <div class="font-weight-bold "> IKR &nbsp&nbsp&nbsp <small class="badge badge-success"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_fal WHERE pic_ikr='fio' and status_wo in ('Belum Terpasang','Proses Pengerjaan') and jenis_wo='INSTALASI' ;";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
											<div class="font-weight-bold "> MAINTENANCE &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <small class="badge badge-warning"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_maintenance WHERE pic_ikr='fio' and status_wo in ('Belum Terpasang','Proses Pengerjaan') and jenis_wo='MAINTENANCE';";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
											<div class="font-weight-bold "> MAINTENANCE ODP &nbsp&nbsp&nbsp&nbsp <small class="badge badge-danger"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_maintenance_odp WHERE pic_ikr='fio' and status_wo in ('Belum Terpasang','Proses Pengerjaan') and jenis_wo='MAINTENANCE_ODP';";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
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
                                                SONNY</div><div class="font-weight-bold "> Status Pegawai <?php $conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="select status_pic from user where username='sonny'";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												
												if($row['status_pic'] == 'libur'){
													$hasil = '<small class="badge badge-danger">'. strtoupper($row['status_pic']).'</small>';
												}elseif($row['status_pic'] == 'masuk'){
													$hasil = '<small class="badge badge-success">'. strtoupper($row['status_pic']).'</small>';
												}
												
												echo "$hasil";
												mysqli_close($conn); ?> </small></div> <div class="font-weight-bold "> IKR &nbsp&nbsp&nbsp <small class="badge badge-success"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_fal WHERE pic_ikr='sonny' and status_wo in ('Belum Terpasang','Proses Pengerjaan') and jenis_wo='INSTALASI' ;";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
											<div class="font-weight-bold "> MAINTENANCE &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <small class="badge badge-warning"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_maintenance WHERE pic_ikr='sonny' and status_wo in ('Belum Terpasang','Proses Pengerjaan') and jenis_wo='MAINTENANCE';";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
											<div class="font-weight-bold "> MAINTENANCE ODP &nbsp&nbsp&nbsp&nbsp <small class="badge badge-danger"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_maintenance_odp WHERE pic_ikr='sonny' and status_wo in ('Belum Terpasang','Proses Pengerjaan') and jenis_wo='MAINTENANCE_ODP';";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
	
    <!-- End of Sidebar -->
<?php } ?>

<?php if ( $kota == "pas"){ ?>
	 <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Ricky</div><div class="font-weight-bold "> Status Pegawai <?php $conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="select status_pic from user where username='ricky'";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												
												if($row['status_pic'] == 'libur'){
													$hasil = '<small class="badge badge-danger">'. strtoupper($row['status_pic']).'</small>';
												}elseif($row['status_pic'] == 'masuk'){
													$hasil = '<small class="badge badge-success">'. strtoupper($row['status_pic']).'</small>';
												}
												
												echo "$hasil";
												mysqli_close($conn); ?> </small></div>
											<div class="font-weight-bold "> IKR &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <small class="badge badge-success"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_fal WHERE pic_ikr='ricky' and status_wo in ('Belum Terpasang','Proses Pengerjaan') and jenis_wo='INSTALASI' ;";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
											<div class="font-weight-bold "> MAINTENANCE &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <small class="badge badge-warning"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_maintenance WHERE pic_ikr='ricky' and status_wo in ('Belum Terpasang','Proses Pengerjaan')  and jenis_wo='MAINTENANCE';";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
											<div class="font-weight-bold "> MAINTENANCE ODP &nbsp&nbsp&nbsp&nbsp <small class="badge badge-danger"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_maintenance_odp WHERE pic_ikr='ricky' and status_wo in ('Belum Terpasang','Proses Pengerjaan')  and jenis_wo='MAINTENANCE_ODP';";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
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
                                                Lukman</div><div class="font-weight-bold "> Status Pegawai <?php $conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="select status_pic from user where username='lukman'";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												
												if($row['status_pic'] == 'libur'){
													$hasil = '<small class="badge badge-danger">'. strtoupper($row['status_pic']).'</small>';
												}elseif($row['status_pic'] == 'masuk'){
													$hasil = '<small class="badge badge-success">'. strtoupper($row['status_pic']).'</small>';
												}
												
												echo "$hasil";
												mysqli_close($conn); ?> </small></div> <div class="font-weight-bold "> IKR &nbsp&nbsp&nbsp <small class="badge badge-success"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_fal WHERE pic_ikr='lukman' and status_wo in ('Belum Terpasang','Proses Pengerjaan') and jenis_wo='INSTALASI' ;";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
											<div class="font-weight-bold "> MAINTENANCE &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <small class="badge badge-warning"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_maintenance WHERE pic_ikr='lukman' and status_wo in ('Belum Terpasang','Proses Pengerjaan')  and jenis_wo='MAINTENANCE';";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
											<div class="font-weight-bold "> MAINTENANCE ODP &nbsp&nbsp&nbsp&nbsp <small class="badge badge-danger"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_maintenance_odp WHERE pic_ikr='lukman' and status_wo in ('Belum Terpasang','Proses Pengerjaan')  and jenis_wo='MAINTENANCE_ODP';";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
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
                                                Bayu</div> <div class="font-weight-bold "> Status Pegawai <?php $conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="select status_pic from user where username='bayu'";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												
												if($row['status_pic'] == 'libur'){
													$hasil = '<small class="badge badge-danger">'. strtoupper($row['status_pic']).'</small>';
												}elseif($row['status_pic'] == 'masuk'){
													$hasil = '<small class="badge badge-success">'. strtoupper($row['status_pic']).'</small>';
												}
												
												echo "$hasil";
												mysqli_close($conn); ?> </small></div><div class="font-weight-bold "> IKR &nbsp&nbsp&nbsp <small class="badge badge-success"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_fal WHERE pic_ikr='bayu' and status_wo in ('Belum Terpasang','Proses Pengerjaan') and jenis_wo='INSTALASI' ;";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
											<div class="font-weight-bold "> MAINTENANCE &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <small class="badge badge-warning"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_maintenance WHERE pic_ikr='bayu' and status_wo in ('Belum Terpasang','Proses Pengerjaan')  and jenis_wo='MAINTENANCE';";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
											<div class="font-weight-bold "> MAINTENANCE ODP &nbsp&nbsp&nbsp&nbsp <small class="badge badge-danger"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_maintenance_odp WHERE pic_ikr='bayu' and status_wo in ('Belum Terpasang','Proses Pengerjaan') and jenis_wo='MAINTENANCE_ODP';";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
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
                                                Yusuf</div><div class="font-weight-bold "> Status Pegawai <?php $conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="select status_pic from user where username='yusufpas'";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												
												if($row['status_pic'] == 'libur'){
													$hasil = '<small class="badge badge-danger">'. strtoupper($row['status_pic']).'</small>';
												}elseif($row['status_pic'] == 'masuk'){
													$hasil = '<small class="badge badge-success">'. strtoupper($row['status_pic']).'</small>';
												}
												
												echo "$hasil";
												mysqli_close($conn); ?> </small></div> <div class="font-weight-bold "> IKR &nbsp&nbsp&nbsp <small class="badge badge-success"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_fal WHERE pic_ikr='yusufpas' and status_wo in ('Belum Terpasang','Proses Pengerjaan') and jenis_wo='INSTALASI' ;";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
											<div class="font-weight-bold "> MAINTENANCE &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <small class="badge badge-warning"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_maintenance WHERE pic_ikr='yusufpas' and status_wo in ('Belum Terpasang','Proses Pengerjaan') and jenis_wo='MAINTENANCE';";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
											<div class="font-weight-bold "> MAINTENANCE ODP &nbsp&nbsp&nbsp&nbsp <small class="badge badge-danger"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_maintenance_odp WHERE pic_ikr='yusufpas' and status_wo in ('Belum Terpasang','Proses Pengerjaan') and jenis_wo='MAINTENANCE_ODP';";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
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
                                                Satria</div><div class="font-weight-bold "> Status Pegawai <?php $conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="select status_pic from user where username='satria'";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												
												if($row['status_pic'] == 'libur'){
													$hasil = '<small class="badge badge-danger">'. strtoupper($row['status_pic']).'</small>';
												}elseif($row['status_pic'] == 'masuk'){
													$hasil = '<small class="badge badge-success">'. strtoupper($row['status_pic']).'</small>';
												}
												
												echo "$hasil";
												mysqli_close($conn); ?> </small></div> <div class="font-weight-bold "> IKR &nbsp&nbsp&nbsp <small class="badge badge-success"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_fal WHERE pic_ikr='satria' and status_wo in ('Belum Terpasang','Proses Pengerjaan') and jenis_wo='INSTALASI' ;";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
											<div class="font-weight-bold "> MAINTENANCE &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <small class="badge badge-warning"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_maintenance WHERE pic_ikr='satria' and status_wo in ('Belum Terpasang','Proses Pengerjaan') and jenis_wo='MAINTENANCE';";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
											<div class="font-weight-bold "> MAINTENANCE ODP &nbsp&nbsp&nbsp&nbsp <small class="badge badge-danger"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_maintenance_odp WHERE pic_ikr='satria' and status_wo in ('Belum Terpasang','Proses Pengerjaan') and jenis_wo='MAINTENANCE_ODP';";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
	
    <!-- End of Sidebar -->
<?php } ?>

<?php if ( $kota == "batu"){ ?>
	 <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Decky</div><div class="font-weight-bold "> Status Pegawai <?php $conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="select status_pic from user where username='decky'";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												
												if($row['status_pic'] == 'libur'){
													$hasil = '<small class="badge badge-danger">'. strtoupper($row['status_pic']).'</small>';
												}elseif($row['status_pic'] == 'masuk'){
													$hasil = '<small class="badge badge-success">'. strtoupper($row['status_pic']).'</small>';
												}
												
												echo "$hasil";
												mysqli_close($conn); ?> </small></div>
											<div class="font-weight-bold "> IKR &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <small class="badge badge-success"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_fal WHERE pic_ikr='decky' and status_wo in ('Belum Terpasang','Proses Pengerjaan') and jenis_wo='INSTALASI' ;";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
											<div class="font-weight-bold "> MAINTENANCE &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <small class="badge badge-warning"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_maintenance WHERE pic_ikr='decky' and status_wo in ('Belum Terpasang','Proses Pengerjaan')  and jenis_wo='MAINTENANCE';";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
											<div class="font-weight-bold "> MAINTENANCE ODP &nbsp&nbsp&nbsp&nbsp <small class="badge badge-danger"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_maintenance_odp WHERE pic_ikr='decky' and status_wo in ('Belum Terpasang','Proses Pengerjaan')  and jenis_wo='MAINTENANCE_ODP';";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
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
                                                Wawan</div><div class="font-weight-bold "> Status Pegawai <?php $conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="select status_pic from user where username='wawan'";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												
												if($row['status_pic'] == 'libur'){
													$hasil = '<small class="badge badge-danger">'. strtoupper($row['status_pic']).'</small>';
												}elseif($row['status_pic'] == 'masuk'){
													$hasil = '<small class="badge badge-success">'. strtoupper($row['status_pic']).'</small>';
												}
												
												echo "$hasil";
												mysqli_close($conn); ?> </small></div> <div class="font-weight-bold "> IKR &nbsp&nbsp&nbsp <small class="badge badge-success"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_fal WHERE pic_ikr='wawan' and status_wo in ('Belum Terpasang','Proses Pengerjaan') and jenis_wo='INSTALASI' ;";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
											<div class="font-weight-bold "> MAINTENANCE &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <small class="badge badge-warning"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_maintenance WHERE pic_ikr='wawan' and status_wo in ('Belum Terpasang','Proses Pengerjaan')  and jenis_wo='MAINTENANCE';";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
											<div class="font-weight-bold "> MAINTENANCE ODP &nbsp&nbsp&nbsp&nbsp <small class="badge badge-danger"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_maintenance_odp WHERE pic_ikr='wawan' and status_wo in ('Belum Terpasang','Proses Pengerjaan')  and jenis_wo='MAINTENANCE_ODP';";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
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
                                                Roni</div> <div class="font-weight-bold "> Status Pegawai <?php $conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="select status_pic from user where username='roni'";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												
												if($row['status_pic'] == 'libur'){
													$hasil = '<small class="badge badge-danger">'. strtoupper($row['status_pic']).'</small>';
												}elseif($row['status_pic'] == 'masuk'){
													$hasil = '<small class="badge badge-success">'. strtoupper($row['status_pic']).'</small>';
												}
												
												echo "$hasil";
												mysqli_close($conn); ?> </small></div><div class="font-weight-bold "> IKR &nbsp&nbsp&nbsp <small class="badge badge-success"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_fal WHERE pic_ikr='roni' and status_wo in ('Belum Terpasang','Proses Pengerjaan') and jenis_wo='INSTALASI' ;";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
											<div class="font-weight-bold "> MAINTENANCE &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <small class="badge badge-warning"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_maintenance WHERE pic_ikr='roni' and status_wo in ('Belum Terpasang','Proses Pengerjaan')  and jenis_wo='MAINTENANCE';";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
											<div class="font-weight-bold "> MAINTENANCE ODP &nbsp&nbsp&nbsp&nbsp <small class="badge badge-danger"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_maintenance_odp WHERE pic_ikr='roni' and status_wo in ('Belum Terpasang','Proses Pengerjaan') and jenis_wo='MAINTENANCE_ODP';";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

	
    <!-- End of Sidebar -->
<?php } ?>

<?php if ( $kota == "mlg1"){ ?>
	 <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Yuni</div><div class="font-weight-bold "> Status Pegawai <?php $conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="select status_pic from user where username='yuni'";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												
												if($row['status_pic'] == 'libur'){
													$hasil = '<small class="badge badge-danger">'. strtoupper($row['status_pic']).'</small>';
												}elseif($row['status_pic'] == 'masuk'){
													$hasil = '<small class="badge badge-success">'. strtoupper($row['status_pic']).'</small>';
												}
												
												echo "$hasil";
												mysqli_close($conn); ?> </small></div>
											<div class="font-weight-bold "> IKR &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <small class="badge badge-success"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_fal WHERE pic_ikr='yuni' and status_wo in ('Belum Terpasang','Proses Pengerjaan') and jenis_wo='INSTALASI' ;";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
											<div class="font-weight-bold "> MAINTENANCE &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <small class="badge badge-warning"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_maintenance WHERE pic_ikr='yuni' and status_wo in ('Belum Terpasang','Proses Pengerjaan')  and jenis_wo='MAINTENANCE';";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
											<div class="font-weight-bold "> MAINTENANCE ODP &nbsp&nbsp&nbsp&nbsp <small class="badge badge-danger"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_maintenance_odp WHERE pic_ikr='yuni' and status_wo in ('Belum Terpasang','Proses Pengerjaan')  and jenis_wo='MAINTENANCE_ODP';";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
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
                                                Rozak</div><div class="font-weight-bold "> Status Pegawai <?php $conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="select status_pic from user where username='rozak'";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												
												if($row['status_pic'] == 'libur'){
													$hasil = '<small class="badge badge-danger">'. strtoupper($row['status_pic']).'</small>';
												}elseif($row['status_pic'] == 'masuk'){
													$hasil = '<small class="badge badge-success">'. strtoupper($row['status_pic']).'</small>';
												}
												
												echo "$hasil";
												mysqli_close($conn); ?> </small></div> <div class="font-weight-bold "> IKR &nbsp&nbsp&nbsp <small class="badge badge-success"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_fal WHERE pic_ikr='rozak' and status_wo in ('Belum Terpasang','Proses Pengerjaan') and jenis_wo='INSTALASI' ;";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
											<div class="font-weight-bold "> MAINTENANCE &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <small class="badge badge-warning"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_maintenance WHERE pic_ikr='rozak' and status_wo in ('Belum Terpasang','Proses Pengerjaan')  and jenis_wo='MAINTENANCE';";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
											<div class="font-weight-bold "> MAINTENANCE ODP &nbsp&nbsp&nbsp&nbsp <small class="badge badge-danger"> <?php
												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
												if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
												$sql="SELECT COUNT(username_fal) FROM tbl_maintenance_odp WHERE pic_ikr='rozak' and status_wo in ('Belum Terpasang','Proses Pengerjaan')  and jenis_wo='MAINTENANCE_ODP';";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result);
												echo "$row[0]";
												mysqli_close($conn);
												?></small>
											</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

	
    <!-- End of Sidebar -->
<?php } ?>
