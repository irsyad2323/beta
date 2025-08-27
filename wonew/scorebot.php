<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin Pro</title>
		 <link rel="stylesheet" href="assets/vendor/datatables/dataTables.bootstrap4.min.css">
		 <link rel="stylesheet" href="assets/vendor/datatables/dataTables.bootstrap4.css">
        <link href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="nav-fixed">
        
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                        <div class="container-xl px-4">
                            <div class="page-header-content pt-4">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-auto mt-4">
                                        <h1 class="page-header-title">
                                            <div class="page-header-icon"><i data-feather="activity"></i></div>
                                            Dashboard
                                        </h1>
                                        <div class="page-header-subtitle">Example dashboard overview and content summary</div>
                                    </div>
                                    <div class="col-12 col-xl-auto mt-4">
                                        <div class="input-group input-group-joined border-0" style="width: 16.5rem">
                                            <span class="input-group-text"><i class="text-primary" data-feather="calendar"></i></span>
                                            <input class="form-control ps-0 pointer" id="litepickerRangePlugin" placeholder="Select date range..." />
											<span class="input-group-btn">
											  <button type="button" class="btn btn-danger filter btn-flat pull-left">Go!</button>
											</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- Main page content-->
                    <div class="container-xl px-4 mt-n10">
                        <div class="row">
                            <div class="col-xxl-4 col-xl-12 mb-4">
                                <div class="card mb-2">
														<div class="card-header">IKR</div>
														<div class="card-body">
															<div class="table-responsive">
															<table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
																<thead>
																<tr>				 
																  <th>No.</th>
																  <th>PIC</th>
																  <th>Total</th>
																</tr>
																</thead>
																<tbody> 
																  <tr>
																  </tr>	
															  </tbody>
															</table>
															</div>
														</div>
													</div>
                            </div>
                            <div class="col-xxl-4 col-xl-12 mb-4">
                                <div class="card mb-2">
														<div class="card-header">Maintenance</div>
														<div class="card-body">
															<div class="table-responsive">
															<table class="table table-bordered" id="datatablesmntn" width="100%" cellspacing="0">
																<thead>
																<tr>				 
																  <th>No.</th>
																  <th>PIC</th>
																  <th>Total</th>
																</tr>
																</thead>
																<tbody> 
																  <tr>
																  </tr>	
															  </tbody>
															</table>
															</div>
														</div>
													</div>
                            </div>
                            <div class="col-xxl-4 col-xl-12 mb-4">
                                <div class="card mb-2">
														<div class="card-header">Maintenance ODP</div>
														<div class="card-body">
															<div class="table-responsive">
															<table class="table table-bordered" id="datatablesmntnodp" width="100%" cellspacing="0">
																<thead>
																<tr>				 
																  <th>No.</th>
																  <th>PIC</th>
																  <th>Total</th>
																</tr>
																</thead>
																<tbody> 
																  <tr>
																  </tr>	
															  </tbody>
															</table>
															</div>
														</div>
													</div>
                            </div>
                            <div class="col-xxl-4 col-xl-12 mb-4">
                                <div class="card mb-2">
														<div class="card-header">Instalasi ODP</div>
														<div class="card-body">
															<div class="table-responsive">
															<table class="table table-bordered" id="datatablesinsodp" width="100%" cellspacing="0">
																<thead>
																<tr>				 
																  <th>No.</th>
																  <th>PIC</th>
																  <th>Total</th>
																</tr>
																</thead>
																<tbody> 
																  <tr>
																  </tr>	
															  </tbody>
															</table>
															</div>
														</div>
													</div>
                            </div>
                            <div class="col-xxl-4 col-xl-12 mb-4">
                                <div class="card mb-2">
														<div class="card-header">Instalasi Distribusi</div>
														<div class="card-body">
															<div class="table-responsive">
															<table class="table table-bordered" id="datatablesinsdis" width="100%" cellspacing="0">
																<thead>
																<tr>				 
																  <th>No.</th>
																  <th>PIC</th>
																  <th>Total</th>
																</tr>
																</thead>
																<tbody> 
																  <tr>
																  </tr>	
															  </tbody>
															</table>
															</div>
														</div>
													</div>
                            </div>
                            <div class="col-xxl-4 col-xl-12 mb-4">
                                <div class="card mb-2">
														<div class="card-header">Total all WO</div>
														<div class="card-body">
															<div class="table-responsive">
															<table class="table table-bordered" id="datatablesall" width="100%" cellspacing="0">
																<thead>
																<tr>				 
																  <th>No.</th>
																  <th>PIC</th>
																  <th>Total</th>
																</tr>
																</thead>
																<tbody> 
																  <tr>
																  </tr>	
															  </tbody>
															</table>
															</div>
														</div>
													</div>
                            </div>
                            <div class="col-xxl-4 col-xl-6 mb-4">
                                <div class="card card-header-actions h-100">
                                    <div class="card-header">
                                        Recent Activity
                                        <div class="dropdown no-caret">
                                            <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="dropdownMenuButton" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="text-gray-500" data-feather="more-vertical"></i></button>
                                            <div class="dropdown-menu dropdown-menu-end animated--fade-in-up" aria-labelledby="dropdownMenuButton">
                                                <h6 class="dropdown-header">Filter Activity:</h6>
                                                <a class="dropdown-item" href="#!"><span class="badge bg-green-soft text-green my-1">Commerce</span></a>
                                                <a class="dropdown-item" href="#!"><span class="badge bg-blue-soft text-blue my-1">Reporting</span></a>
                                                <a class="dropdown-item" href="#!"><span class="badge bg-yellow-soft text-yellow my-1">Server</span></a>
                                                <a class="dropdown-item" href="#!"><span class="badge bg-purple-soft text-purple my-1">Users</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="timeline timeline-xs">
                                            <!-- Timeline Item 1-->
                                            <div class="timeline-item">
                                                <div class="timeline-item-marker">
                                                    <div class="timeline-item-marker-text">27 min</div>
                                                    <div class="timeline-item-marker-indicator bg-green"></div>
                                                </div>
                                                <div class="timeline-item-content">
                                                    New order placed!
                                                    <a class="fw-bold text-dark" href="#!">Order #2912</a>
                                                    has been successfully placed.
                                                </div>
                                            </div>
                                            <!-- Timeline Item 2-->
                                            <div class="timeline-item">
                                                <div class="timeline-item-marker">
                                                    <div class="timeline-item-marker-text">58 min</div>
                                                    <div class="timeline-item-marker-indicator bg-blue"></div>
                                                </div>
                                                <div class="timeline-item-content">
                                                    Your
                                                    <a class="fw-bold text-dark" href="#!">weekly report</a>
                                                    has been generated and is ready to view.
                                                </div>
                                            </div>
                                            <!-- Timeline Item 3-->
                                            <div class="timeline-item">
                                                <div class="timeline-item-marker">
                                                    <div class="timeline-item-marker-text">2 hrs</div>
                                                    <div class="timeline-item-marker-indicator bg-purple"></div>
                                                </div>
                                                <div class="timeline-item-content">
                                                    New user
                                                    <a class="fw-bold text-dark" href="#!">Valerie Luna</a>
                                                    has registered
                                                </div>
                                            </div>
                                            <!-- Timeline Item 4-->
                                            <div class="timeline-item">
                                                <div class="timeline-item-marker">
                                                    <div class="timeline-item-marker-text">1 day</div>
                                                    <div class="timeline-item-marker-indicator bg-yellow"></div>
                                                </div>
                                                <div class="timeline-item-content">Server activity monitor alert</div>
                                            </div>
                                            <!-- Timeline Item 5-->
                                            <div class="timeline-item">
                                                <div class="timeline-item-marker">
                                                    <div class="timeline-item-marker-text">1 day</div>
                                                    <div class="timeline-item-marker-indicator bg-green"></div>
                                                </div>
                                                <div class="timeline-item-content">
                                                    New order placed!
                                                    <a class="fw-bold text-dark" href="#!">Order #2911</a>
                                                    has been successfully placed.
                                                </div>
                                            </div>
                                            <!-- Timeline Item 6-->
                                            <div class="timeline-item">
                                                <div class="timeline-item-marker">
                                                    <div class="timeline-item-marker-text">1 day</div>
                                                    <div class="timeline-item-marker-indicator bg-purple"></div>
                                                </div>
                                                <div class="timeline-item-content">
                                                    Details for
                                                    <a class="fw-bold text-dark" href="#!">Marketing and Planning Meeting</a>
                                                    have been updated.
                                                </div>
                                            </div>
                                            <!-- Timeline Item 7-->
                                            <div class="timeline-item">
                                                <div class="timeline-item-marker">
                                                    <div class="timeline-item-marker-text">2 days</div>
                                                    <div class="timeline-item-marker-indicator bg-green"></div>
                                                </div>
                                                <div class="timeline-item-content">
                                                    New order placed!
                                                    <a class="fw-bold text-dark" href="#!">Order #2910</a>
                                                    has been successfully placed.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-6 mb-4">
                                <div class="card card-header-actions h-100">
                                    <div class="card-header">
                                        Progress Tracker
                                        <div class="dropdown no-caret">
                                            <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="dropdownMenuButton" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="text-gray-500" data-feather="more-vertical"></i></button>
                                            <div class="dropdown-menu dropdown-menu-end animated--fade-in-up" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#!">
                                                    <div class="dropdown-item-icon"><i class="text-gray-500" data-feather="list"></i></div>
                                                    Manage Tasks
                                                </a>
                                                <a class="dropdown-item" href="#!">
                                                    <div class="dropdown-item-icon"><i class="text-gray-500" data-feather="plus-circle"></i></div>
                                                    Add New Task
                                                </a>
                                                <a class="dropdown-item" href="#!">
                                                    <div class="dropdown-item-icon"><i class="text-gray-500" data-feather="minus-circle"></i></div>
                                                    Delete Tasks
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="small">
                                            Server Migration
                                            <span class="float-end fw-bold">20%</span>
                                        </h4>
                                        <div class="progress mb-4"><div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div></div>
                                        <h4 class="small">
                                            Sales Tracking
                                            <span class="float-end fw-bold">40%</span>
                                        </h4>
                                        <div class="progress mb-4"><div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div></div>
                                        <h4 class="small">
                                            Customer Database
                                            <span class="float-end fw-bold">60%</span>
                                        </h4>
                                        <div class="progress mb-4"><div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div></div>
                                        <h4 class="small">
                                            Payout Details
                                            <span class="float-end fw-bold">80%</span>
                                        </h4>
                                        <div class="progress mb-4"><div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div></div>
                                        <h4 class="small">
                                            Account Setup
                                            <span class="float-end fw-bold">Complete!</span>
                                        </h4>
                                        <div class="progress"><div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div></div>
                                    </div>
                                    <div class="card-footer position-relative">
                                        <div class="d-flex align-items-center justify-content-between small text-body">
                                            <a class="stretched-link text-body" href="#!">Visit Task Center</a>
                                            <i class="fas fa-angle-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Example Colored Cards for Dashboard Demo-->
                        <div class="row">
                            <div class="col-lg-6 col-xl-3 mb-4">
                                <div class="card bg-primary text-white h-100">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="me-3">
                                                <div class="text-white-75 small">Earnings (Monthly)</div>
                                                <div class="text-lg fw-bold">$40,000</div>
                                            </div>
                                            <i class="feather-xl text-white-50" data-feather="calendar"></i>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between small">
                                        <a class="text-white stretched-link" href="#!">View Report</a>
                                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-3 mb-4">
                                <div class="card bg-warning text-white h-100">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="me-3">
                                                <div class="text-white-75 small">Earnings (Annual)</div>
                                                <div class="text-lg fw-bold">$215,000</div>
                                            </div>
                                            <i class="feather-xl text-white-50" data-feather="dollar-sign"></i>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between small">
                                        <a class="text-white stretched-link" href="#!">View Report</a>
                                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-3 mb-4">
                                <div class="card bg-success text-white h-100">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="me-3">
                                                <div class="text-white-75 small">Task Completion</div>
                                                <div class="text-lg fw-bold">24</div>
                                            </div>
                                            <i class="feather-xl text-white-50" data-feather="check-square"></i>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between small">
                                        <a class="text-white stretched-link" href="#!">View Tasks</a>
                                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-3 mb-4">
                                <div class="card bg-danger text-white h-100">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="me-3">
                                                <div class="text-white-75 small">Pending Requests</div>
                                                <div class="text-lg fw-bold">17</div>
                                            </div>
                                            <i class="feather-xl text-white-50" data-feather="message-circle"></i>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between small">
                                        <a class="text-white stretched-link" href="#!">View Requests</a>
                                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Example Charts for Dashboard Demo-->
                        <div class="row">
                            <div class="col-xl-6 mb-4">
                                <div class="card card-header-actions h-100">
                                    <div class="card-header">
                                        Earnings Breakdown
                                        <div class="dropdown no-caret">
                                            <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="areaChartDropdownExample" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="text-gray-500" data-feather="more-vertical"></i></button>
                                            <div class="dropdown-menu dropdown-menu-end animated--fade-in-up" aria-labelledby="areaChartDropdownExample">
                                                <a class="dropdown-item" href="#!">Last 12 Months</a>
                                                <a class="dropdown-item" href="#!">Last 30 Days</a>
                                                <a class="dropdown-item" href="#!">Last 7 Days</a>
                                                <a class="dropdown-item" href="#!">This Month</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#!">Custom Range</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart-area"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 mb-4">
                                <div class="card card-header-actions h-100">
                                    <div class="card-header">
                                        Monthly Revenue
                                        <div class="dropdown no-caret">
                                            <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="areaChartDropdownExample" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="text-gray-500" data-feather="more-vertical"></i></button>
                                            <div class="dropdown-menu dropdown-menu-end animated--fade-in-up" aria-labelledby="areaChartDropdownExample">
                                                <a class="dropdown-item" href="#!">Last 12 Months</a>
                                                <a class="dropdown-item" href="#!">Last 30 Days</a>
                                                <a class="dropdown-item" href="#!">Last 7 Days</a>
                                                <a class="dropdown-item" href="#!">This Month</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#!">Custom Range</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart-bar"><canvas id="myBarChart" width="100%" height="30"></canvas></div>
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
		 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script> 
		<script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
		<script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js" crossorigin="anonymous"></script>
        <script src="js/litepicker.js"></script>
		<!-- Masukkan JavaScript DataTables -->
		<script> 
		
    var table = $('#datatablesSimple').DataTable({
				"responsive": true,
                "processing": true,
                "ajax": {
							"url": "model/list_count_entry.php", // Path menuju skrip PHP
							"type": "POST",
							/* "data": {"data_customer": "<?= $x['kelas_key'];?>"} */ // Buka komentar jika diperlukan
						},

                "paging": true,
                "lengthChange": true,
				"pageLength": 3,  // Menambahkan ini untuk mengatur jumlah entri per halaman
                "searching": true,
                "ordering": false,
                "info": false,
                "autoWidth": true,			
				"columns": [
					{ "data": "urutan" },
					{ "data": "pic_ikr" },
					{ "data": "alert_nya" }
				]
    });
		
    var table = $('#datatablesmntn').DataTable({
				"responsive": true,
                "processing": true,
                "ajax": {
							"url": "model/list_count_mntn.php", // Path menuju skrip PHP
							"type": "POST",
							/* "data": {"data_customer": "<?= $x['kelas_key'];?>"} */ // Buka komentar jika diperlukan
						},

                "paging": true,
                "lengthChange": true,
				"pageLength": 3,  // Menambahkan ini untuk mengatur jumlah entri per halaman
                "searching": true,
                "ordering": false,
                "info": false,
                "autoWidth": true,			
				"columns": [
					{ "data": "urutan" },
					{ "data": "pic_ikr" },
					{ "data": "alert_nya" }
				]
    });
		
    var table = $('#datatablesmntnodp').DataTable({
				"responsive": true,
                "processing": true,
                "ajax": {
							"url": "model/list_count_mntn_odp.php", // Path menuju skrip PHP
							"type": "POST",
							/* "data": {"data_customer": "<?= $x['kelas_key'];?>"} */ // Buka komentar jika diperlukan
						},

                "paging": true,
                "lengthChange": true,
				"pageLength": 3,  // Menambahkan ini untuk mengatur jumlah entri per halaman
                "searching": true,
                "ordering": false,
                "info": false,
                "autoWidth": true,			
				"columns": [
					{ "data": "urutan" },
					{ "data": "pic_ikr" },
					{ "data": "alert_nya" }
				]
    });
		
    var table = $('#datatablesinsodp').DataTable({
				"responsive": true,
                "processing": true,
                "ajax": {
							"url": "model/list_count_ins_odp.php", // Path menuju skrip PHP
							"type": "POST",
							/* "data": {"data_customer": "<?= $x['kelas_key'];?>"} */ // Buka komentar jika diperlukan
						},

                "paging": true,
                "lengthChange": true,
				"pageLength": 3,  // Menambahkan ini untuk mengatur jumlah entri per halaman
                "searching": true,
                "ordering": false,
                "info": false,
                "autoWidth": true,			
				"columns": [
					{ "data": "urutan" },
					{ "data": "pic_ikr" },
					{ "data": "alert_nya" }
				]
    });
		
    var table = $('#datatablesinsdis').DataTable({
				"responsive": true,
                "processing": true,
                "ajax": {
							"url": "model/list_count_ins_dis.php", // Path menuju skrip PHP
							"type": "POST",
							/* "data": {"data_customer": "<?= $x['kelas_key'];?>"} */ // Buka komentar jika diperlukan
						},

                "paging": true,
                "lengthChange": true,
				"pageLength": 3,  // Menambahkan ini untuk mengatur jumlah entri per halaman
                "searching": true,
                "ordering": false,
                "info": false,
                "autoWidth": true,			
				"columns": [
					{ "data": "urutan" },
					{ "data": "pic_ikr" },
					{ "data": "alert_nya" }
				]
    });
		
    var table = $('#datatablesall').DataTable({
				"responsive": true,
                "processing": true,
                "ajax": {
							"url": "model/list_count_all.php", // Path menuju skrip PHP
							"type": "POST",
							/* "data": {"data_customer": "<?= $x['kelas_key'];?>"} */ // Buka komentar jika diperlukan
						},

                "paging": true,
                "lengthChange": true,
				"pageLength": 3,  // Menambahkan ini untuk mengatur jumlah entri per halaman
                "searching": true,
                "ordering": false,
                "info": false,
                "autoWidth": true,			
				"columns": [
					{ "data": "urutan" },
					{ "data": "user" },
					{ "data": "alert_nya" }
				]
    });
		
	$(document).on("click",".filter",function(event){
	//alert ('a'); return;
	event.stopPropagation();
	event.preventDefault();
	event.stopImmediatePropagation();
	
	$("#bar-chart-cabang").html("");
	$("#bar-chart-line").html("");
	$("#bar-chart-cabang_fol").html("");
	
	const dateRangeStr = $('#litepickerRangePlugin').val();
	//const dateRangeStr = "Jul 11, 2024 - Jul 11, 2024";

	// Split the date range string into two date strings
	const [startDateStr, endDateStr] = dateRangeStr.split(" - ");

	// Function to convert a date string to "Y-m-d" format
	function formatDate(dateStr) {
		const dateObj = new Date(dateStr);
		const year = dateObj.getFullYear();
		const month = String(dateObj.getMonth() + 1).padStart(2, '0');
		const day = String(dateObj.getDate()).padStart(2, '0');
		return `${year}-${month}-${day}`;
	}

	// Convert both start and end dates
	const formattedStartDate = formatDate(startDateStr);
	const formattedEndDate = formatDate(endDateStr);

	console.log(`Start Date: ${formattedStartDate}`); // Output: 2024-07-11
	console.log(`End Date: ${formattedEndDate}`);     // Output: 2024-07-11
	
	//alert (formattedEndDate); return;
	/* var start_tgl = $('#pilih_bln_thn').data('daterangepicker').startDate.format('YYYY-MM-DD');
	var end_tgl = $('#pilih_bln_thn').data('daterangepicker').endDate.format('YYYY-MM-DD');		 */
	var value ={
		formattedStartDate : formattedStartDate,
		formattedEndDate : formattedEndDate
	} 
	  //alert(awal);
      $(document).ajaxStart(function(){
			$("#wait").css("display", "block");
	  });
	  $(document).ajaxComplete(function(){
			$("#wait").css("display", "none");
	  }); 
	  
      $.ajax(
      {
        url : "model/tahun_bulan_sales.php",
        type: "POST",
        data : value,
		dataType: 'JSON',
        success: function(data, textStatus, jqXHR)
        {        		
			var start_tgl = data.start_tgl;
			var end_tgl = data.end_tgl;
			//alert (start_tgl + end_tgl); return;
			var data = {
            mulai: start_tgl,
            akhir: end_tgl
			};
		  function ShowGrpah(data) {
            }
			
				$('#datatablesSimple').DataTable().clear().destroy();
				var table = $('#datatablesSimple').DataTable({
				"responsive": true,
                "processing": true,
                "ajax": {
							"url": "model/list_count_entry.php", // Path menuju skrip PHP
							"type": "POST",
							"data": data,
						},

                "paging": true,
                "lengthChange": true,
				"pageLength": 3,  // Menambahkan ini untuk mengatur jumlah entri per halaman
                "searching": true,
                "ordering": false,
                "info": false,
                "autoWidth": true,			
				"columns": [
					{ "data": "urutan" },
					{ "data": "pic_ikr" },
					{ "data": "alert_nya" }
				]
				});
				
				$('#datatablesmntn').DataTable().clear().destroy();
				var table = $('#datatablesmntn').DataTable({
							"responsive": true,
							"processing": true,
							"ajax": {
										"url": "model/list_count_mntn.php", // Path menuju skrip PHP
										"type": "POST",
										"data": data,
									},

							"paging": true,
                "lengthChange": true,
				"pageLength": 3,  // Menambahkan ini untuk mengatur jumlah entri per halaman
							"searching": true,
							"ordering": false,
							"info": false,
							"autoWidth": true,			
							"columns": [
								{ "data": "urutan" },
								{ "data": "pic_ikr" },
								{ "data": "alert_nya" }
							]
				});
				
				$('#datatablesmntnodp').DataTable().clear().destroy();
				var table = $('#datatablesmntnodp').DataTable({
							"responsive": true,
							"processing": true,
							"ajax": {
										"url": "model/list_count_mntn_odp.php", // Path menuju skrip PHP
										"type": "POST",
										"data": data,
									},

							"paging": true,
                "lengthChange": true,
				"pageLength": 3,  // Menambahkan ini untuk mengatur jumlah entri per halaman
							"searching": true,
							"ordering": false,
							"info": false,
							"autoWidth": true,			
							"columns": [
								{ "data": "urutan" },
								{ "data": "pic_ikr" },
								{ "data": "alert_nya" }
							]
				});
				
				$('#datatablesinsodp').DataTable().clear().destroy();
				var table = $('#datatablesinsodp').DataTable({
							"responsive": true,
							"processing": true,
							"ajax": {
										"url": "model/list_count_ins_odp.php", // Path menuju skrip PHP
										"type": "POST",
										"data": data,
									},

							"paging": true,
                "lengthChange": true,
				"pageLength": 3,  // Menambahkan ini untuk mengatur jumlah entri per halaman
							"searching": true,
							"ordering": false,
							"info": false,
							"autoWidth": true,			
							"columns": [
								{ "data": "urutan" },
								{ "data": "pic_ikr" },
								{ "data": "alert_nya" }
							]
				});
				
				$('#datatablesinsdis').DataTable().clear().destroy();
				var table = $('#datatablesinsdis').DataTable({
							"responsive": true,
							"processing": true,
							"ajax": {
										"url": "model/list_count_ins_dis.php", // Path menuju skrip PHP
										"type": "POST",
										"data": data,
									},

							"paging": true,
                "lengthChange": true,
				"pageLength": 3,  // Menambahkan ini untuk mengatur jumlah entri per halaman
							"searching": true,
							"ordering": false,
							"info": false,
							"autoWidth": true,			
							"columns": [
								{ "data": "urutan" },
								{ "data": "pic_ikr" },
								{ "data": "alert_nya" }
							]
				});
				
				$('#datatablesall').DataTable().clear().destroy();
				var table = $('#datatablesall').DataTable({
							"responsive": true,
							"processing": true,
							"ajax": {
										"url": "model/list_count_all.php", // Path menuju skrip PHP
										"type": "POST",
										"data": data,
									},

							"paging": true,
                "lengthChange": true,
				"pageLength": 3,  // Menambahkan ini untuk mengatur jumlah entri per halaman
							"searching": true,
							"ordering": false,
							"info": false,
							"autoWidth": true,			
							"columns": [
								{ "data": "urutan" },
								{ "data": "user" },
								{ "data": "alert_nya" }
							]
				});
		}
      });
});</script>
      
    </body>
</html>
