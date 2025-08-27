<!DOCTYPE html>
<?php

session_start();
$level_user = $_SESSION["level_user"];
$acces_user_log = $_SESSION["username"];
$level_kantor = $_SESSION["kantor"];
$leveladmin = $_SESSION["level_admin"];

if(!isset($_SESSION["logingundala"])){

header("location:login.php");

exit;

}

if($level_user =='kapten' or $level_user =='vendor_marketing' or $level_user =='ikr' or $level_user =='adminwo_fulus' or $level_user =='permit' or $level_user =='vendor' or $level_user =='psg_dcp'){
$kota = $_SESSION["level_kantor"];
if( $kota == 'mlg'){
$hasil = '<small class="badge badge-success">NARATEL</small>';
} elseif ( $kota == 'pas'){
$hasil = '<small class="badge badge-success">SBM</small>';
} elseif ( $kota == '%%%'){
$hasil = '<small class="badge badge-success">ALL CABANG</small>';
} elseif ( $kota == 'batu'){
$hasil = '<small class="badge badge-success">JALIBAR</small>';
} elseif ( $kota == 'mlg1'){
$hasil = '<small class="badge badge-success">JALANTRA</small>';
}
}else{
echo ('Session Berakhir Login Kembali??');
header("location:login.php");
die();
}


?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Account Settings - Profile - SB Admin Pro</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" crossorigin="anonymous"></script>
		<style>
        .baris {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }
        .waktu {
            width: 150px;
            text-align: right;
            margin-right: 10px;
            font-weight: bold;
        }
        .kotak-container {
            flex-grow: 1;
            display: flex;
            flex-wrap: wrap;
        }
        .kotak {
            width: 50px;
            height: 50px;
            display: inline-block;
            margin: 2px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            border-radius: 5px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            font-weight: bold;
            color: white;
            cursor: pointer;
        }
        .kotak:hover {
            transform: translateY(-5px);
        }
        .hijau { background-color: #4CAF50; }
        .kuning { background-color: #FFEB3B; }
        .merah { background-color: #F44336; }
        .abu { background-color: #9E9E9E; }
        .biru { background-color: #3e2ef9; }
        .inactive {
            cursor: default;
            opacity: 0.5;
        }

     #overlay, #popup {
            display: none;
            position: fixed;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            top: 0;
            left: 0;
            z-index: 999;
        }
        #popup {
            width: 300px;
			height:auto;
            padding: 20px;
            background: white;
            border: 1px solid #ccc;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
        }
</style>

<style> body {
background: #ececec;
}
.lds-dual-ring.hidden { 
display: none;
}
.lds-dual-ring {
display: inline-block;
width: 80px;
height: 80px;
}
.lds-dual-ring:after {
content: " ";
display: block;
width: 64px;
height: 64px;
margin: 5% auto;
border-radius: 50%;
border: 6px solid #fff;
border-color: #fff transparent #fff transparent;
animation: lds-dual-ring 1.2s linear infinite;
}
@keyframes lds-dual-ring {
0% {
transform: rotate(0deg);
}
100% {
transform: rotate(360deg);
}
}


.overlay {
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100vh;
background: rgba(0,0,0,.8);
z-index: 999;
opacity: 1;
transition: all 0.5s;
}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
} </style>
	</head>
    <body class="nav-fixed">
        <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">
            <!-- Sidenav Toggle Button-->
            <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i data-feather="menu"></i></button>
            <!-- Navbar Brand-->
            <!-- * * Tip * * You can use text or an image for your navbar brand.-->
            <!-- * * * * * * When using an image, we recommend the SVG format.-->
            <!-- * * * * * * Dimensions: Maximum height: 32px, maximum width: 240px-->
            <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="index.php">SB Admin Pro</a>
            <!-- Navbar Search Input-->
            <!-- * * Note: * * Visible only on and above the lg breakpoint-->
            <form class="form-inline me-auto d-none d-lg-block me-3">
                <div class="input-group input-group-joined input-group-solid">
                    <input class="form-control pe-0" type="search" placeholder="Search" aria-label="Search" />
                    <div class="input-group-text"><i data-feather="search"></i></div>
                </div>
            </form>
            <!-- Navbar Items-->
            <ul class="navbar-nav align-items-center ms-auto">
                <!-- Documentation Dropdown-->
                <li class="nav-item dropdown no-caret d-none d-md-block me-3">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownDocs" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="fw-500">Documentation</div>
                        <i class="fas fa-chevron-right dropdown-arrow"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end py-0 me-sm-n15 me-lg-0 o-hidden animated--fade-in-up" aria-labelledby="navbarDropdownDocs">
                        <a class="dropdown-item py-3" href="https://docs.startbootstrap.com/sb-admin-pro" target="_blank">
                            <div class="icon-stack bg-primary-soft text-primary me-4"><i data-feather="book"></i></div>
                            <div>
                                <div class="small text-gray-500">Documentation</div>
                                Usage instructions and reference
                            </div>
                        </a>
                        <div class="dropdown-divider m-0"></div>
                        <a class="dropdown-item py-3" href="https://docs.startbootstrap.com/sb-admin-pro/components" target="_blank">
                            <div class="icon-stack bg-primary-soft text-primary me-4"><i data-feather="code"></i></div>
                            <div>
                                <div class="small text-gray-500">Components</div>
                                Code snippets and reference
                            </div>
                        </a>
                        <div class="dropdown-divider m-0"></div>
                        <a class="dropdown-item py-3" href="https://docs.startbootstrap.com/sb-admin-pro/changelog" target="_blank">
                            <div class="icon-stack bg-primary-soft text-primary me-4"><i data-feather="file-text"></i></div>
                            <div>
                                <div class="small text-gray-500">Changelog</div>
                                Updates and changes
                            </div>
                        </a>
                    </div>
                </li>
                <!-- Navbar Search Dropdown-->
                <!-- * * Note: * * Visible only below the lg breakpoint-->
                <li class="nav-item dropdown no-caret me-3 d-lg-none">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="searchDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="search"></i></a>
                    <!-- Dropdown - Search-->
                    <div class="dropdown-menu dropdown-menu-end p-3 shadow animated--fade-in-up" aria-labelledby="searchDropdown">
                        <form class="form-inline me-auto w-100">
                            <div class="input-group input-group-joined input-group-solid">
                                <input class="form-control pe-0" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                                <div class="input-group-text"><i data-feather="search"></i></div>
                            </div>
                        </form>
                    </div>
                </li>
                <!-- Alerts Dropdown-->
                <li class="nav-item dropdown no-caret d-none d-sm-block me-3 dropdown-notifications">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownAlerts" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="bell"></i></a>
                    <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownAlerts">
                        <h6 class="dropdown-header dropdown-notifications-header">
                            <i class="me-2" data-feather="bell"></i>
                            Alerts Center
                        </h6>
                        <!-- Example Alert 1-->
                        <a class="dropdown-item dropdown-notifications-item" href="#!">
                            <div class="dropdown-notifications-item-icon bg-warning"><i data-feather="activity"></i></div>
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-details">December 29, 2021</div>
                                <div class="dropdown-notifications-item-content-text">This is an alert message. It's nothing serious, but it requires your attention.</div>
                            </div>
                        </a>
                        <!-- Example Alert 2-->
                        <a class="dropdown-item dropdown-notifications-item" href="#!">
                            <div class="dropdown-notifications-item-icon bg-info"><i data-feather="bar-chart"></i></div>
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-details">December 22, 2021</div>
                                <div class="dropdown-notifications-item-content-text">A new monthly report is ready. Click here to view!</div>
                            </div>
                        </a>
                        <!-- Example Alert 3-->
                        <a class="dropdown-item dropdown-notifications-item" href="#!">
                            <div class="dropdown-notifications-item-icon bg-danger"><i class="fas fa-exclamation-triangle"></i></div>
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-details">December 8, 2021</div>
                                <div class="dropdown-notifications-item-content-text">Critical system failure, systems shutting down.</div>
                            </div>
                        </a>
                        <!-- Example Alert 4-->
                        <a class="dropdown-item dropdown-notifications-item" href="#!">
                            <div class="dropdown-notifications-item-icon bg-success"><i data-feather="user-plus"></i></div>
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-details">December 2, 2021</div>
                                <div class="dropdown-notifications-item-content-text">New user request. Woody has requested access to the organization.</div>
                            </div>
                        </a>
                        <a class="dropdown-item dropdown-notifications-footer" href="#!">View All Alerts</a>
                    </div>
                </li>
                <!-- Messages Dropdown-->
                <li class="nav-item dropdown no-caret d-none d-sm-block me-3 dropdown-notifications">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownMessages" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="mail"></i></a>
                    <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownMessages">
                        <h6 class="dropdown-header dropdown-notifications-header">
                            <i class="me-2" data-feather="mail"></i>
                            Message Center
                        </h6>
                        <!-- Example Message 1  -->
                        <a class="dropdown-item dropdown-notifications-item" href="#!">
                            <img class="dropdown-notifications-item-img" src="assets/img/illustrations/profiles/profile-2.png" />
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                                <div class="dropdown-notifications-item-content-details">Thomas Wilcox · 58m</div>
                            </div>
                        </a>
                        <!-- Example Message 2-->
                        <a class="dropdown-item dropdown-notifications-item" href="#!">
                            <img class="dropdown-notifications-item-img" src="assets/img/illustrations/profiles/profile-3.png" />
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                                <div class="dropdown-notifications-item-content-details">Emily Fowler · 2d</div>
                            </div>
                        </a>
                        <!-- Example Message 3-->
                        <a class="dropdown-item dropdown-notifications-item" href="#!">
                            <img class="dropdown-notifications-item-img" src="assets/img/illustrations/profiles/profile-4.png" />
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                                <div class="dropdown-notifications-item-content-details">Marshall Rosencrantz · 3d</div>
                            </div>
                        </a>
                        <!-- Example Message 4-->
                        <a class="dropdown-item dropdown-notifications-item" href="#!">
                            <img class="dropdown-notifications-item-img" src="assets/img/illustrations/profiles/profile-5.png" />
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                                <div class="dropdown-notifications-item-content-details">Colby Newton · 3d</div>
                            </div>
                        </a>
                        <!-- Footer Link-->
                        <a class="dropdown-item dropdown-notifications-footer" href="#!">Read All Messages</a>
                    </div>
                </li>
                <!-- User Dropdown-->
                <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="assets/img/illustrations/profiles/profile-1.png" /></a>
                    <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                        <h6 class="dropdown-header d-flex align-items-center">
                            <img class="dropdown-user-img" src="assets/img/illustrations/profiles/profile-1.png" />
                            <div class="dropdown-user-details">
                                <div class="dropdown-user-details-name">Valerie Luna</div>
                                <div class="dropdown-user-details-email">vluna@aol.com</div>
                            </div>
                        </h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#!">
                            <div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                            Account
                        </a>
                        <a class="dropdown-item" href="#!">
                            <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
           <div id="layoutSidenav_nav">
                <nav class="sidenav shadow-right sidenav-light">
                    <div class="sidenav-menu">
                        <div class="nav accordion" id="accordionSidenav">
                            <!-- Sidenav Menu Heading (Account)-->
                            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                            <div class="sidenav-menu-heading d-sm-none">Account</div>
                            <!-- Sidenav Link (Alerts)-->
                            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                            <a class="nav-link d-sm-none" href="#!">
                                <div class="nav-link-icon"><i data-feather="bell"></i></div>
                                Alerts
                                <span class="badge bg-warning-soft text-warning ms-auto">4 New!</span>
                            </a>
                            <!-- Sidenav Link (Messages)-->
                            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                            <a class="nav-link d-sm-none" href="#!">
                                <div class="nav-link-icon"><i data-feather="mail"></i></div>
                                Messages
                                <span class="badge bg-success-soft text-success ms-auto">2 New!</span>
                            </a>
                            <!-- Sidenav Menu Heading (Core)-->
                            <div class="sidenav-menu-heading">Core</div>
                            <!-- Sidenav Accordion (Dashboard)-->
                            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
                                <div class="nav-link-icon"><i data-feather="activity"></i></div>
                                Score Board
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseDashboards" data-bs-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                                    <a class="nav-link" href="scoreboard.php">
                                        Teknisi
                                        <span class="badge bg-primary-soft text-primary ms-auto">Teknisi</span>
                                    </a>
                                    <a class="nav-link" href="scoreboard_cs.php">Customer Service</a>
                                    <a class="nav-link" href="scoreboard_diskon.php">Perlakuan Diskon</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- Sidenav Footer-->
                    <div class="sidenav-footer">
                        <div class="sidenav-footer-content">
                            <div class="sidenav-footer-subtitle">Logged in as:</div>
                            <div class="sidenav-footer-title">Valerie Luna</div>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
                        <div class="container-xl px-4">
                            <div class="page-header-content">
                                <div class="row align-items-center justify-content-between pt-3">
                                    <div class="col-auto mb-3">
                                        <h1 class="page-header-title">
                                            <div class="page-header-icon"><i data-feather="user"></i></div>
                                            masya allah laa quwata illa billah (al kahfi 39)
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- Main page content-->
                    <div class="container-xl px-4 mt-4">
					<div class="col-xl-8 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary">SCORE BOT WORKING ORDER</h6>
							</div>
								<div class="card-body">
                                    <div class="row no-gutters align-items-center">
										
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Teknisi Aktif</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php

												include('control/koneksi.php');

												if (mysqli_connect_errno())

												  {

												  echo "Failed to connect to MySQL: " . mysqli_connect_error();

												  }

												$sql="SELECT jumlah_hijau FROM baris_kotak WHERE baris_no ='1' AND YEAR(tanggal) = YEAR(NOW()) and MONTH(tanggal) = MONTH(NOW()) and DAY(tanggal) = DAY(NOW());";

												$result=mysqli_query($koneksi,$sql);

												$row=mysqli_fetch_array($result);

												echo "$row[0]";

												mysqli_close($koneksi);

												?></div>
                                        </div>
										
										<div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">ENTRY  
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php

												include('control/koneksi.php');

												if (mysqli_connect_errno())

												  {

												  echo "Failed to connect to MySQL: " . mysqli_connect_error();

												  }

												$sql="SELECT ((SELECT COUNT(*) as total_9 FROM keluhan WHERE `status` in ('Visit') and YEAR(tanggal) = YEAR(NOW()) and MONTH(tanggal) = MONTH(NOW()) and DAY(tanggal) = DAY(NOW())) + 
													(SELECT COUNT(*) as total_9 FROM tbl_odp WHERE status_wo in ('Belum Terpasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
													(SELECT COUNT(*) as total_9 FROM tbl_distribusi WHERE status_wo in ('Belum Terpasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
													(SELECT COUNT(*) as total_9 FROM tbl_backbone WHERE status_wo in ('Belum Terpasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
													(SELECT COUNT(*) as total_9 FROM tbl_maintenance_odp WHERE status_wo in ('Belum Terpasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW()))) as hasil;";
												$result=mysqli_query($koneksi,$sql);
												$row=mysqli_fetch_array($result);
												//echo "$row[0]";
												
												$sql_daf="SELECT ((SELECT COUNT(*) as total_9 FROM tb_daf_copy WHERE status = 'n' and YEAR(tanggal) = YEAR(NOW()) and MONTH(tanggal) = MONTH(NOW()) and DAY(tanggal) = DAY(NOW())) + 
													(SELECT COUNT(*) as total_9 FROM tb_mgm_copy WHERE status = 'n' and YEAR(tanggal) = YEAR(NOW()) and MONTH(tanggal) = MONTH(NOW()) and DAY(tanggal) = DAY(NOW()))) as hasil;";
												$result_daf=mysqli_query($koneksi_daf,$sql_daf);
												$row_daf=mysqli_fetch_array($result_daf);
												$hasile = $row['hasil'] + $row_daf['hasil']; 
												echo "$hasile";

												mysqli_close($koneksi);
												mysqli_close($koneksi_daf);

												?></div>
                                                </div>
                                                
                                            </div>
                                        </div>
										
										<div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">POST WO 
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php

												include('control/koneksi.php');

												if (mysqli_connect_errno())

												  {

												  echo "Failed to connect to MySQL: " . mysqli_connect_error();

												  }

												$sql="SELECT ((SELECT COUNT(*) as total_9 FROM tbl_fal WHERE status_wo in ('Belum Terpasang') and YEAR(tgl_fal_datetime) = YEAR( NOW()) and MONTH(tgl_fal_datetime) = MONTH(NOW()) and DAY(tgl_fal_datetime) = DAY(NOW())) + 
(SELECT COUNT(*) as total_9 FROM tbl_maintenance WHERE status_wo in ('Belum Terpasang') and YEAR(tgl_date_time) = YEAR(NOW()) and MONTH(tgl_date_time) = MONTH(NOW()) and DAY(tgl_date_time) = DAY(NOW())) + 
(SELECT COUNT(*) as total_9 FROM tbl_odp WHERE status_wo in ('Belum Terpasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
(SELECT COUNT(*) as total_9 FROM tbl_distribusi WHERE status_wo in ('Belum Terpasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
(SELECT COUNT(*) as total_9 FROM tbl_backbone WHERE status_wo in ('Belum Terpasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
(SELECT COUNT(*) as total_9 FROM tbl_maintenance_odp WHERE status_wo in ('Belum Terpasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW()))) as hasil;";

												$result=mysqli_query($koneksi,$sql);

												$row=mysqli_fetch_array($result);

												echo "$row[0]";

												mysqli_close($koneksi);

												?></div>
                                                </div>
                                                
                                            </div>
                                        </div>
										
										 <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Process 
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php

												include('control/koneksi.php');

												if (mysqli_connect_errno())

												  {

												  echo "Failed to connect to MySQL: " . mysqli_connect_error();

												  }

												$sql="SELECT ((SELECT COUNT(*) as total_9 FROM tbl_fal WHERE status_wo in ('Proses Pengerjaan') and YEAR(tgl_fal_datetime) = YEAR( NOW()) and MONTH(tgl_fal_datetime) = MONTH(NOW()) and DAY(tgl_fal_datetime) = DAY(NOW())) + 
(SELECT COUNT(*) as total_9 FROM tbl_maintenance WHERE status_wo in ('Proses Pengerjaan') and YEAR(tgl_date_time) = YEAR(NOW()) and MONTH(tgl_date_time) = MONTH(NOW()) and DAY(tgl_date_time) = DAY(NOW())) + 
(SELECT COUNT(*) as total_9 FROM tbl_odp WHERE status_wo in ('Proses Pengerjaan') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
(SELECT COUNT(*) as total_9 FROM tbl_distribusi WHERE status_wo in ('Proses Pengerjaan') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
(SELECT COUNT(*) as total_9 FROM tbl_backbone WHERE status_wo in ('Proses Pengerjaan') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
(SELECT COUNT(*) as total_9 FROM tbl_maintenance_odp WHERE status_wo in ('Proses Pengerjaan') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW()))) as hasil;";

												$result=mysqli_query($koneksi,$sql);

												$row=mysqli_fetch_array($result);

												echo "$row[0]";

												mysqli_close($koneksi);

												?></div>
                                                </div>
                                                
                                            </div>
                                        </div>
										
										<div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Solved
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php

												include('control/koneksi.php');

												if (mysqli_connect_errno())

												  {

												  echo "Failed to connect to MySQL: " . mysqli_connect_error();

												  }

												$sql="SELECT ((SELECT COUNT(*) as total_9 FROM tbl_fal WHERE status_wo in ('Sudah Terpasang') and YEAR(tgl_fal_datetime) = YEAR( NOW()) and MONTH(tgl_fal_datetime) = MONTH(NOW()) and DAY(tgl_fal_datetime) = DAY(NOW())) + 
(SELECT COUNT(*) as total_9 FROM tbl_maintenance WHERE status_wo in ('Sudah Terpasang') and YEAR(tgl_date_time) = YEAR(NOW()) and MONTH(tgl_date_time) = MONTH(NOW()) and DAY(tgl_date_time) = DAY(NOW())) + 
(SELECT COUNT(*) as total_9 FROM tbl_odp WHERE status_wo in ('Sudah Terpasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
(SELECT COUNT(*) as total_9 FROM tbl_distribusi WHERE status_wo in ('Sudah Terpasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
(SELECT COUNT(*) as total_9 FROM tbl_backbone WHERE status_wo in ('Sudah Terpasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
(SELECT COUNT(*) as total_9 FROM tbl_maintenance_odp WHERE status_wo in ('Sudah Terpasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW()))) as hasil;";

												$result=mysqli_query($koneksi,$sql);

												$row=mysqli_fetch_array($result);

												echo "$row[0]";

												mysqli_close($koneksi);

												?></div>
                                                </div>
                                                
                                            </div>
                                        </div>
										
										<div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pending
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php

												include('control/koneksi.php');

												if (mysqli_connect_errno())

												  {

												  echo "Failed to connect to MySQL: " . mysqli_connect_error();

												  }

												$sql="SELECT ((SELECT COUNT(*) as total_9 FROM tbl_fal WHERE status_wo in ('Pending') and YEAR(tgl_fal) = YEAR( NOW()) and MONTH(tgl_fal) = MONTH(NOW()) and DAY(tgl_fal) = DAY(NOW())) + 
													(SELECT COUNT(*) as total_9 FROM tbl_maintenance WHERE status_wo in ('Pending') and YEAR(tgl_fal) = YEAR(NOW()) and MONTH(tgl_fal) = MONTH(NOW()) and DAY(tgl_fal) = DAY(NOW())) + 
													(SELECT COUNT(*) as total_9 FROM tbl_odp WHERE status_wo in ('Pending') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
													(SELECT COUNT(*) as total_9 FROM tbl_distribusi WHERE status_wo in ('Pending') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
													(SELECT COUNT(*) as total_9 FROM tbl_backbone WHERE status_wo in ('Pending') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
													(SELECT COUNT(*) as total_9 FROM tbl_maintenance_odp WHERE status_wo in ('Pending') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW()))) as hasil;";

												$result=mysqli_query($koneksi,$sql);

												$row=mysqli_fetch_array($result);

												echo "$row[0]";

												mysqli_close($koneksi);

												?></div>
                                                </div>
                                                
                                            </div>
                                        </div>
										
										<div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Rescedule
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php

												include('control/koneksi.php');

												if (mysqli_connect_errno())

												  {

												  echo "Failed to connect to MySQL: " . mysqli_connect_error();

												  }

												$sql="SELECT ((SELECT COUNT(*) as total_9 FROM tbl_fal WHERE rscd_stts = 'y' and status_wo in ('Belum Terpasang') and YEAR(tgl_fal) = YEAR( NOW()) and MONTH(tgl_fal) = MONTH(NOW()) and DAY(tgl_fal) = DAY(NOW())) + 
													(SELECT COUNT(*) as total_9 FROM tbl_maintenance WHERE rscd_stts = 'y' and status_wo in ('Belum Terpasang') and YEAR(tgl_fal) = YEAR(NOW()) and MONTH(tgl_fal) = MONTH(NOW()) and DAY(tgl_fal) = DAY(NOW()))) as hasil;";

												$result=mysqli_query($koneksi,$sql);

												$row=mysqli_fetch_array($result);

												echo "$row[0]";

												mysqli_close($koneksi);

												?></div>
                                                </div>
                                                
                                            </div>
                                        </div>
										
										<div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Batal
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php

												include('control/koneksi.php');

												if (mysqli_connect_errno())

												  {

												  echo "Failed to connect to MySQL: " . mysqli_connect_error();

												  }

												$sql="SELECT ((SELECT COUNT(*) as total_9 FROM tbl_fal WHERE status_wo in ('Batal Pasang') and YEAR(tgl_fal_datetime) = YEAR( NOW()) and MONTH(tgl_fal_datetime) = MONTH(NOW()) and DAY(tgl_fal_datetime) = DAY(NOW())) + 
(SELECT COUNT(*) as total_9 FROM tbl_maintenance WHERE status_wo in ('Batal Pasang') and YEAR(tgl_date_time) = YEAR(NOW()) and MONTH(tgl_date_time) = MONTH(NOW()) and DAY(tgl_date_time) = DAY(NOW())) + 
(SELECT COUNT(*) as total_9 FROM tbl_odp WHERE status_wo in ('Batal Pasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
(SELECT COUNT(*) as total_9 FROM tbl_distribusi WHERE status_wo in ('Batal Pasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
(SELECT COUNT(*) as total_9 FROM tbl_backbone WHERE status_wo in ('Batal Pasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
(SELECT COUNT(*) as total_9 FROM tbl_maintenance_odp WHERE status_wo in ('Batal Pasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW()))) as hasil;";

												$result=mysqli_query($koneksi,$sql);

												$row=mysqli_fetch_array($result);

												echo "$row[0]";

												mysqli_close($koneksi);

												?></div>
                                                </div>
                                                
                                            </div>
                                        </div>
										
										 <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                All WO</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php

												include('control/koneksi.php');

												if (mysqli_connect_errno())

												  {

												  echo "Failed to connect to MySQL: " . mysqli_connect_error();

												  }
												  
												if($kota == 'mlg' or $kota == 'batu' or $kota == 'mlg1'){
													$sql="SELECT ((SELECT COUNT(*) as total_9 FROM tbl_fal WHERE kd_layanan in ('mlg','batu','mlg1') and YEAR(tgl_fal_datetime) = YEAR( NOW()) and MONTH(tgl_fal_datetime) = MONTH(NOW()) and DAY(tgl_fal_datetime) = DAY(NOW())) + 
													(SELECT COUNT(*) as total_9 FROM tbl_maintenance WHERE kd_layanan in ('mlg','batu','mlg1') and YEAR(tgl_date_time) = YEAR(NOW()) and MONTH(tgl_date_time) = MONTH(NOW()) and DAY(tgl_date_time) = DAY(NOW())) + 
													(SELECT COUNT(*) as total_9 FROM tbl_maintenance_odp WHERE kd_layanan in ('mlg','batu','mlg1') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW()))+
													(SELECT COUNT(*) as total_9 FROM tbl_odp WHERE kd_layanan in ('mlg','batu','mlg1') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW()))+
													(SELECT COUNT(*) as total_9 FROM tbl_distribusi WHERE kd_layanan in ('mlg','batu','mlg1') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW()))+
													(SELECT COUNT(*) as total_9 FROM tbl_backbone WHERE kd_layanan_backbone in ('mlg','batu','mlg1') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW()))
) as hasil;";
												}elseif($kota == 'pas'){
													$sql="SELECT ((SELECT COUNT(*) as total_9 FROM tbl_fal WHERE kd_layanan in ('pas') and YEAR(tgl_fal_datetime) = YEAR( NOW()) and MONTH(tgl_fal_datetime) = MONTH(NOW()) and DAY(tgl_fal_datetime) = DAY(NOW())) + 
													(SELECT COUNT(*) as total_9 FROM tbl_maintenance WHERE kd_layanan in ('pas') and YEAR(tgl_date_time) = YEAR(NOW()) and MONTH(tgl_date_time) = MONTH(NOW()) and DAY(tgl_date_time) = DAY(NOW())) + 
													(SELECT COUNT(*) as total_9 FROM tbl_maintenance_odp WHERE kd_layanan in ('pas') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW()))+
													(SELECT COUNT(*) as total_9 FROM tbl_odp WHERE kd_layanan in ('pas') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW()))+
													(SELECT COUNT(*) as total_9 FROM tbl_distribusi WHERE kd_layanan in ('pas') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW()))+
													(SELECT COUNT(*) as total_9 FROM tbl_backbone WHERE kd_layanan_backbone in ('pas') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW()))
) as hasil;";
												}
												$result=mysqli_query($koneksi,$sql);

												$row=mysqli_fetch_array($result);

												echo "$row[0]";

												mysqli_close($koneksi);

												?></div>
                                                </div>
                                                
                                            </div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
                    <div class="container-xl px-4 mt-4">
                        <!-- Account page navigation-->
                        <nav class="nav nav-borders">
                            <a class="nav-link active ms-0" href="account-profile.php">Profile</a>
                            <a class="nav-link" href="account-billing.php">Billing</a>
                            <a class="nav-link" href="account-security.php">Security</a>
                            <a class="nav-link" href="account-notifications.php">Notifications</a>
                        </nav>
                        <hr class="mt-0 mb-4" />
                        <div class="row">
							
                            <div class="col-xl-4">
                                <!-- Profile picture card-->
                                <div class="card mb-4 mb-xl-0">
                                    <div class="card-header">Profile Picture</div>
                                    <div class="card-body text-center">
                                        <!-- Profile picture image-->
                                        <img class="img-account-profile rounded-circle mb-2" src="assets/img/illustrations/profiles/profile-1.png" alt="" />
                                        <!-- Profile picture help block-->
                                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                                        <!-- Profile picture upload button-->
                                        <button class="btn btn-primary" type="button">Upload new image</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card-header">Account Details</div>
                                    <div class="card-body">
                                        <form>
                                            <!-- Form Group (username)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputUsername">Username (how your name will appear to other users on the site)</label>
                                                <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="username" />
                                            </div>
                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (first name)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputFirstName">First name</label>
                                                    <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="Valerie" />
                                                </div>
                                                <!-- Form Group (last name)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputLastName">Last name</label>
                                                    <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="Luna" />
                                                </div>
                                            </div>
                                            <!-- Form Row        -->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (organization name)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputOrgName">Organization name</label>
                                                    <input class="form-control" id="inputOrgName" type="text" placeholder="Enter your organization name" value="Start Bootstrap" />
                                                </div>
                                                <!-- Form Group (location)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputLocation">Location</label>
                                                    <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location" value="San Francisco, CA" />
                                                </div>
                                            </div>
                                            <!-- Form Group (email address)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                                <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="name@example.com" />
                                            </div>
                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (phone number)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputPhone">Phone number</label>
                                                    <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="555-123-4567" />
                                                </div>
                                                <!-- Form Group (birthday)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputBirthday">Birthday</label>
                                                    <input class="form-control" id="inputBirthday" type="text" name="birthday" placeholder="Enter your birthday" value="06/10/1988" />
                                                </div>
                                            </div>
                                            <!-- Save changes button-->
                                            <button class="btn btn-primary" type="button">Save changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="footer-admin mt-auto footer-light">
                    <div class="container-xl px-4">
                        <div class="row">
                            <div class="col-md-6 small">Copyright &copy; Your Website 2021</div>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
