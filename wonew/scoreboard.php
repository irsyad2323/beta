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
		 <style>
        .loader {
            display: inline-block;
            width: 180px;
            height: 180px;
            position: relative;
        }

        .loader .spinner {
            width: 100%;
            height: 100%;
            border: 10px solid rgba(0, 0, 0, 0.1);
            border-left-color: #000;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            box-sizing: border-box;
        }

        .loader img {
            width: 120px;
            height: 100px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation: blurEffect 2s infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes blurEffect {
            0%, 100% {
                filter: blur(0px);
            }
            50% {
                filter: blur(5px);
            }
        }
    </style>
    </head>
    <body class="nav-fixed">
        <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">
            <!-- Sidenav Toggle Button-->
            <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i data-feather="menu"></i></button>
            <!-- Navbar Brand-->
            <!-- * * Tip * * You can use text or an image for your navbar brand.-->
            <!-- * * * * * * When using an image, we recommend the SVG format.-->
            <!-- * * * * * * Dimensions: Maximum height: 32px, maximum width: 240px-->
            <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="index.php">ScoreBoard Naratel</a>
            <!-- Navbar Search Input-->
            <!-- * * Note: * * Visible only on and above the lg breakpoint-->
            <form class="form-inline me-auto d-none d-lg-block me-3">
                <div class="input-group input-group-joined input-group-solid">
                    <input class="form-control pe-0" type="search" placeholder="Search" aria-label="Search" />
                    <div class="input-group-text"><i data-feather="search"></i></div>
                </div>
            </form>
            <!-- Navbar Items-->
            
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
                    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                        <div class="container-xl px-4">
                            <div class="page-header-content pt-4">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-auto mt-4">
                                        <h1 class="page-header-title">
                                            <div class="page-header-icon"><i data-feather="activity"></i></div>
                                            ScoreBoard
                                        </h1>
                                        <div class="page-header-subtitle">Example dashboard overview and content summary</div>
                                    </div>
                                    <div class="col-12 col-xl-auto mt-4">
                                        <div class="input-group input-group-joined border-0" style="width: 20.5rem">
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
                     <!-- Main page content-->
                    <div class="container-xll px-4 mt-n10">
                        <div class="row">
                            <div class="col-xxl-3 col-xl-12 mb-4">
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
                            <div class="col-xxl-3 col-xl-12 mb-4">
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
                            <div class="col-xxl-3 col-xl-12 mb-4">
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
                            <div class="col-xxl-3 col-xl-12 mb-4">
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
                            <div class="col-xxl-3 col-xl-12 mb-4">
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
                            <div class="col-xxl-3 col-xl-12 mb-4">
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
                        </div>
                        <!-- Example Colored Cards for Dashboard Demo-->
                       
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
		
		// Fungsi untuk reload DataTable setiap 5 menit (300000 ms)
    setInterval(function() {
        location.reload();
    }, 300000); // 300000 ms = 5 menit
		
    var table = $('#datatablesSimple').DataTable({
				"responsive": true,
                "processing": true,
				//$('#loader').show();//Load
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
	 // $('#loader').show();//Load
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
		},
            /* complete: function () {
                $('#loader').hide();//Request is complete so hide spinner
            } */
      });
});</script>
    </body>
</html>
