<?php

session_start();
$level_user = $_SESSION["level_user"];
$acces_user_log = $_SESSION["username"];
$level_kantor = $_SESSION["kantor"];
$kota = $_SESSION["level_kantor"];

if(!isset($_SESSION["logingundala"])){
    header("location:../login.php");
    exit;
}



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

                        <h1 class="h3 mb-0 text-gray-800">View Jenis Pembayaran Not Verified </br> <?php echo $acces_user_log; ?> </br> <?php echo $kota; ?> </h1>
					
                        <?php 

                            if ( $_SESSION["level_user"] != "Admin" && $_SESSION["level_user"] != "ikr" ){ 

                        ?>

                        <div>        

                        </div>

                    <?php } ?>

                    </div>
					
					<div class="d-sm-flex align-items-center justify-content-between mb-4">

                        
                        <?php 

                            if ( $_SESSION["level_user"] != "Admin" && $_SESSION["level_user"] != "kapten" && $_SESSION["level_user"] != "ts"  ){ 

                        ?>


                    <?php } ?>

                    </div>

                       			
				
            </div>

            <!-- End of Main Content -->
			
			
			<div class="container-fluid">
						

						  <!-- Page Heading 
						  <h1 class="h3 mb-2 text-gray-800">Tables Instalasi Kapten</h1>
						  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
							-->
						  <!-- DataTales Example -->
						  <div class="card shadow mb-4">
							<div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary">Data Not-Verified</h6>
							</div>
							<div class="card-body">
							  <div class="table-responsive">
								<table class="table table-bordered" id="tabel_hasil" width="100%" cellspacing="0">
								  <thead>
									<tr>
									<th>No</th>
									  <th>Item</th>
									  <th>Devisi</th>	
									  <th>Total</th>	
									  <th>Harga</th>	
									  <th>Priode</th>
									  <th>Keterangan</th>		
									  <th>Link</th>		
									  <th>Date</th>		
									  <th>User</th>		
									  <th>Status Approved</th>		
									  <th>Status Transfer</th>		
									  <th>Status Pekerjaan</th>		
									  <th>Action</th>
									</tr>
								  </thead>
								  <tfoot>
									<tr>
									<th>No</th>
									  <th>Item</th>
									  <th>Devisi</th>	
									  <th>Total</th>	
									  <th>Harga</th>	
									  <th>Priode</th>
									  <th>Keterangan</th>		
									  <th>Link</th>		
									  <th>Date</th>		
									  <th>User</th>		
									  <th>Status Approved</th>		
									  <th>Status Transfer</th>		
									  <th>Status Pekerjaan</th>		
									  <th>Action</th>    
									</tr>
								  </tfoot>
								  <tbody>
									
								  </tbody>
								</table>
							  </div>
							</div>
						  </div>

						</div>


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

	<!-- modal -->
				<div class="modal fade bd-example-modal-lg" id="modal_update" tabindex="-1" role="dialog" aria-labelledby="modal_update" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                         <h5 class="modal-title" id="modal_update">Form Verifikasi Keuangan Marketing</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form>
							<div class="form-group">

                            <div class="form-group">
                                <input type="hidden" class="form-control" name="key_fal" id='key_fal' placeholder="" />
                            </div> 
							<div class="row">
							<div class="col-md-4">
                                <label for="recipient-name" class="col-form-label">USERNAME</label>
                                <input type="text" class="form-control" name="username_fal" id='username_fal' placeholder="" readonly>
                            </div>
							
							<div class="col-sm-4">
                                <label for="recipient-name" class="col-form-label">TANGGAL INSTALASI</label>
                                <input type="date" class="form-control" name="tanggal_instalasi" id='tanggal_instalasi' placeholder="" readonly>
                            </div>  
							
							<div class="col-sm-4">
                                <label for="recipient-name" class="col-form-label">PIC</label>
                                <input type="text" class="form-control" name="pic" id='pic' placeholder="" readonly>
                            </div>
							
							<div class="col-sm-4">
                                <label for="recipient-name" class="col-form-label">PIC2</label>
                                <input type="text" class="form-control" name="pic2" id='pic2' placeholder="" readonly>
                            </div>
							
							<div class="col-sm-4">
                                <label for="recipient-name" class="col-form-label">TOTAL</label>
                                <input type="text" class="form-control" name="total" id='total' placeholder="" readonly>
                            </div>
							
							<div class="col-sm-4">
                                <label for="recipient-name" class="col-form-label">LOG USER</label>
                                <input type="text" class="form-control" name="log_user_verified" id='log_user_verified' placeholder="" readonly>
                            </div>
							
							<div class="col-sm-4">
                                <label for="recipient-name" class="col-form-label">TANGGAL VERIFIED</label>
                                <input type="text" class="form-control" name="tgl_verified" id='tgl_verified' placeholder="" readonly>
                            </div>
							</div>
							<br/><hr/>
							
							<div class="row">
								
							<div class="col-sm-6">
                                <label for="recipient-name" class="col-form-label">PERLAKUAN</label>
                                <select name="perlakuan" id='perlakuan' class="form-control">
									   <option value=""></option>
									   <option value="Diskon Biaya Instalasi">Diskon Biaya Instalasi</option>
									   <option value="Angsuran Biaya Instalasi">Angsuran Biaya Instalasi</option>
									   <option value="Pindah Alamat">Pindah Alamat</option>
									   <option value="Free Biaya Instalasi & Free Biaya Bulanan">Free Biaya Instalasi & Free Biaya Bulanan</option>
									   <option value="Promo Merdeka">Promo Merdeka</option>
									   <option value="Promo 17 Agustus">Promo 17 Agustus</option>
									</select>
                            </div>
							
							<div class="col-sm-6">
                                <label for="recipient-name" class="col-form-label">TOTAL DISKON</label>
                                <input type="text" class="form-control" name="total_diskon" id='total_diskon' placeholder="">
                            </div>
								
								<div class="col-sm-6">
									<label for="recipient-name" class="col-form-label">PAKET FAL</label>
									<select name="paket_fal" id='paket_fal' class="form-control">
									   <option value="5">5</option>
									   <option value="10">10</option>
									   <option value="15">15</option>
									   <option value="20">20</option>
									   <option value="60">60</option>
									</select>
								</div>
								
								<div class="col-sm-6">
									<label for="recipient-name" class="col-form-label">JENIS BAYAR</label>
									<select name="pembayaran" id='pembayaran' class="form-control">
                                   <option value="Tunai">Tunai</option>
                                   <option value="Transfer">Transfer</option>
                                   <option value="Mitra Bayar">Mitra Bayar</option>
                                </select>
								</div>
								
							<div class="col-sm-4">
                                <label for="recipient-name" class="col-form-label">ANGSURAN 1</label>
                                <input type="number" class="form-control" name="angsuran1" id='angsuran1' placeholder="" >
								<input type="date" class="form-control" name="verif1" id='verif1' placeholder="" >
                            </div>
							
							<div class="col-sm-4">
                                <label for="recipient-name" class="col-form-label">ANGSURAN 2</label>
                                <input type="number" class="form-control" name="angsuran2" id='angsuran2' placeholder="">
								<input type="date" class="form-control" name="verif2" id='verif2' placeholder="">
                            </div>
							
							<div class="col-sm-4">
									<label for="recipient-name" class="col-form-label">STATUS ANGSURAN</label>
									<select name="status_angsuran" id='status_angsuran' class="form-control">
                                   <option value=""></option>
                                   <option value="Sudah Lunas">Sudah Lunas</option>
                                   <option value="Belum Lunas">Belum Lunas</option>
                                </select>
								</div>
							
							<div class="col-sm-12">
                                <label for="recipient-name" class="col-form-label">KETERANGAN</label>
                                <input type="longtext" class="form-control" name="keterangan" id='keterangan' placeholder="">
                            </div>
							</div>
							</br><hr/>
							<div class="row">
								<div class="col-sm-6">
									<label for="recipient-name" class="col-form-label">Verified</label>
									<select name="verified1" id='verified1' class="form-control">
										<option value=""></option>
										<option value="verified">verified</option>
										<option value="not_verified">not_verified</option>
									</select>
								</div>
							</div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary update_fls_mrk">Submit</button>
                        </div>
                      </div>
                    </div>
                  </div>
				  <!-- end modal --> 
				  </br><hr>
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data</h6>
                </div>



	<div class="modal fade" id="modal_upload_bukti"  role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-user">Edit Data</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span></button>

                    

                </div>

                 <div class="modal-body">
					<?php 
                        if ($_SESSION["level_user"] != "ikr"){
                       ?>
                           
						
						 <form id="file-form" method="post">
						 <div class="form-row">
                                <label for="fname">Keterangan</label>
                                <input class="form-control" type="text" id="ket" name="ket" placeholder="nama..." readonly>
                            </div>
						<br/>	
						
						<div class="form-group">
									<label for="recipient-name" class="col-form-label">Status Bukti</label>
									<select name="status_bukti" id="status_bukti" class="form-control">
                                   <option value=""></option>
                                   <option value="sudah">Sudah ditransfer</option>
                                   <option value="belum">Belum ditransfer</option>
                                </select>
								</div>
						
						<div class="form-group">
                            <label for="exampleFormControlFile1">Upload Bukti</label>
                            <input type="file" name="file" class="form-control-file input-design" id="file">
                            <span id="error" class="text-danger"></span><br>
                        </div>	
						

							<input type="hidden" id="key_fal_bukti" name="key_fal_bukti" readonly> 	
						 
                        
						
						<input type="submit" class="btn btn-success pull-right">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </form>

							<?php
						}
					?>
					
					<!-- END ISIAN DATA ADMIN -->
						
					
                      </div>
					  
            </div>

        </div>

    </div>
	
	<div class="modal fade" id="modal_approved"  role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-user">Edit Data</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span></button>

                    

                </div>

                 <div class="modal-body">
					<?php 
                        if ($_SESSION["level_user"] != "ikr"){
                       ?>
                           
						
						 <form method="post">
						
						<div class="form-group">
									<label for="recipient-name" class="col-form-label">Status Aprroved</label>
									<select name="status_approved" id="status_approved" class="form-control">
                                   <option value=""></option>
                                   <option value="y">Approved</option>
                                   <option value="n">Not Approved</option>
                                </select>
								</div>
							<input type="hidden" id="key_fal_approved" name="key_fal_approved" readonly> 	
						 
                        
						
						<div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary approved_action">Submit</button>
                        </div>
                    </form>

							<?php
						}
					?>
					
					<!-- END ISIAN DATA ADMIN -->
						
					
                      </div>
					  
            </div>

        </div>

    </div>
	
	
    <div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <form action="controller/import.php" method="post" enctype="multipart/form-data">

                    <div class="input-group">

                        <div class="custom-file">

                            <input type="file" name="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">

                            <label class="custom-file-label" for="inputGroupFile04">Choose file</label>

                        </div>

                    </div>

               



            

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                <button name="upload" type="submit" class="btn btn-success">Import</button>

            </div>

            </form>

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
	<script>
		$(document).ready(function() {
						  
              //get data value sinden
    $(document).on('click', '.upload_bukti', function(){

        
        var key_fal = $(this).attr('key_fal');
        
			//alert(key_fal); return;
        
        
        $('#modal_upload_bukti').modal('show');
        $('#key_fal_bukti').val(key_fal);
      });
	  
	$(document).on('click', '.approved', function(){

        
        var key_fal = $(this).attr('key_fal');
        
			//alert(key_fal); return;
        
        
        $('#modal_approved').modal('show');
        $('#key_fal_approved').val(key_fal);
      });
	  
	 $('#file-form').on('submit',(function(e) {
            e.preventDefault();
			
			//alert ('tes'); return;
			/* var form = document.getElementById('file-form');
			var formData = new FormData(form); */
			
            var fd = new FormData();
            var files = $('#file')[0].files[0];
            var ket = $("#ket").val();
            var status_bukti = $("#status_bukti").val();
            var key_fal_bukti = $("#key_fal_bukti").val();
            fd.append('file',files);
            fd.append('ket',ket);
            fd.append('status_bukti',status_bukti);
            fd.append('key_fal_bukti',key_fal_bukti);

            $.ajax({
                type:'POST',
                url: '../controller/action_editor_bukti.php',
                data:fd,
                cache:false,
                contentType: false,
                processData: false,
                success:function(data){
										//alert(data);
										Swal.fire(
											  'Good job!',
											  'Status :' + data ,
											  'success'
											).then(function(success){
												//if (data == 'succes') {
													//alert('a');
											var table = $('#tabel_hasil').DataTable(); 
													table.ajax.reload( null, false );
													$("#modal_upload_bukti").modal("hide");	
												//}
										})
										},
            });
        }));
		
		$(".approved_action").click(function() {

          var key_fal_approved = $("#key_fal_approved").val();
          var status_approved = $("#status_approved").val();
          
          //alert (nama2); return;
          $.ajax({
            type: "POST",
            url: "../controller/update_approved.php",
            data: {
                key_fal_approved: key_fal_approved,
                status_approved: status_approved,
                
            },
            cache: false,
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
	});
	
	
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

                "ajax": {

                    "url":"../models/datapengguna_ikr_keuangan.php",

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
					
					{ mData: 'tanggal_instalasi'}, 

					{ mData: 'username_fal'},			
					
					{ mData: 'pembayaran'},			
					
					{ mData: 'pic'},			
					
					{ mData: 'pic2'},			
					
					{ mData: 'total_diskon',  render: $.fn.dataTable.render.number( ',', '.', 2, 'Rp. ' )} ,
					
					{ mData: 'angsuran1',  render: $.fn.dataTable.render.number( ',', '.', 2, 'Rp. ' )} ,
					
					{ mData: 'angsuran2',  render: $.fn.dataTable.render.number( ',', '.', 2, 'Rp. ' )} ,
					
					{ mData: 'total',  render: $.fn.dataTable.render.number( ',', '.', 2, 'Rp. ' )} ,
					
					{ mData: 'status_angs'},
					
					{ mData: 'ket_fulus'},
					
					{ mData: 'action'},
					
					{ mData: 'type_verified'} ,
                                     

                ],

            });



             $('#tabel_hasil').DataTable({
			  //"stripeClasses": [],
			  "paging": true,
			  "lengthChange": true,
			  "searching": true,
			  "ordering": true,      
			  "info": true,
			  "autoWidth": true,
			  'responsive': true,
			  "ajax": {
			  "url": "../models/modal_hasil.php",
			  "type": "POST"
				},
				"columns": [	
				{'data': 'urutan'},
				{'data': 'item'},
				{'data': 'devisi'},	
				{'data': 'total'},
				//{'data': 'price', render: $.fn.dataTable.render.number( '.', ',', 2 )},
				{'data': 'harga'},
				{'data': 'priode'},
				{'data': 'keterangan'},
				{'data': 'link'},
				{'data': 'date'},
				{'data': 'user'},
				{'data': 'type_aproved'},
				{'data': 'type_status'},
				{'data': 'type_hasil'},
				{'data': 'action'}
				//{'data': 'hasil', render: $.fn.dataTable.render.number( '.', ',', 2 )},
				],
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

        });

    </script>

     <script>

    // Set up global variable

    var result;

    

    function showPosition() {   

        // Store the element where the page displays the result

        result = document.getElementById("b");

        

        // If geolocation is available, try to get the visitor's position

        if(navigator.geolocation) {

            navigator.geolocation.getCurrentPosition(successCallback, errorCallback);

            result.innerHTML = "Getting the position information...";

        } else {

            alert("Sorry, your browser does not support HTML5 geolocation.");

        }

    };

    

    // Define callback function for   attempt

    function successCallback(position) {

        result.innerHTML = position.coords.latitude + "#" + position.coords.longitude;

    }

    

    // Define callback function for failed attempt

    function errorCallback(error) {

        if(error.code == 1) {

            result.innerHTML = "You've decided not to share your position, but it's OK. We won't ask you again.";

        } else if(error.code == 2) {

            result.innerHTML = "The network is down or the positioning service can't be reached.";

        } else if(error.code == 3) {

            result.innerHTML = "The attempt timed out before it could get the location data.";

        } else {

            result.innerHTML = "Geolocation failed due to unknown error.";

        }

    }

</script>

<script>

  $('#pic').change(function() {

    $('.select-default-hidden').hide();

    $('.select-default-shown').show();

      //var a = $(this).val();

      //alert (a);

    $('.select-' + $(this).val() + '-shown').show();

    $('.select-' + $(this).val() + '-hidden').hide();

}).change();

</script>

</body>



</html>