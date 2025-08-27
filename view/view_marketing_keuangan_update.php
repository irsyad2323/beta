<?php

session_start();
$level_user = $_SESSION["level_user"];
$acces_user_log = $_SESSION["username"];
$level_kantor = $_SESSION["kantor"];
$kota = $_SESSION["level_kantor"];

if(!isset($_SESSION["logingundala"])){
    header("location:login.php");
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
	<!-- iCheck for checkboxes and radio inputs -->
	<link rel="stylesheet" href="../asset/plugins/iCheck/all.css">


  

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



                            <a href="controller/export_jenis_pembayaran.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">

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

                       			
				
            </div>

            <!-- End of Main Content -->
			
			
			 	<!-- Begin Page Content -->
						<div class="container-fluid">
						  <div class="card shadow mb-4">
							 <div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary">Data Not Verified</h6>
							</div>
			  <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="tabel_sudah" width="100%" cellspacing="0">
                    <thead>
                      <tr>
						<th></th>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Jenis Pekerjaan</th>
                        <th>Jumlah Brosur</th>
                        <th>Total Biaya</th>
                        <th>Diskon</th>
                        <th>Total Akhir</th>
						<th>Aproval Marketing</th>
						<th>Tanggal Solved</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="table">
                    
                    </tbody>
                  </table>
				  <div class="d-sm-flex align-items-center justify-content-between mb-4">
									<button type="submit" id="set" name="set" class="btn btn-success margin pull-right">Proses Invoice</button>
								</div>
                </div>
						  </div>
						</div>
						


			 	<!-- Begin Page Content -->
						<div class="container-fluid">
						  <div class="card shadow mb-4">
							 <div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary">Detail WO Marketing Verified</h6>
							</div>
			  <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="tabel_sudah2" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Jenis Pekerjaan</th>
                        <th>Jumlah Brosur</th>
                        <th>Total Biaya</th>
                        <th>Diskon</th>
                        <th>Total Akhir</th>
						<th>Approval Keuangan</th>
						<th>Admin Keuangan</th>
                      </tr>
                    </thead>
                    <tbody id="table">
                    <?php 
					  include('../controller/controller_mysqli.php');
					  // $acces_user_log = $_SESSION["username"];
					  $table = mysqli_query($koneksi,"SELECT b.nama_provinsi, c.nama_kabkota, d.nama_kec, e.nama_kel ,a.*, DATE_FORMAT(a.tgl_pekerjaan,'%d-%m-%Y') as waktu, DATE_FORMAT(a.tgl_solved,'%d-%m-%Y') as solvedtgl FROM tbl_marketing a
																		LEFT JOIN tb_provinsi b
																		on a.prov = b.kd_provinsi
																		LEFT JOIN tb_kabkota c
																		on a.kab = c.kd_kabkota
																		LEFT JOIN tb_kecamatan d
																		on a.kec = d.kd_kec
																		LEFT JOIN tb_kelurahan e
																		on a.kel =  e.kd_kel
																		WHERE a.verified_fls='verified' and a.level in ('Vendor','Outsourcing') and a.status='Sudah' and a.kab = d.kd_kabkota AND d.kd_kec = e.kd_kec and c.kd_kabkota = e.kd_kabkota and a.layanan like '".$kota."' GROUP BY a.id DESC;");
                      if ($table === FALSE) {
                        die(mysqli_error($koneksi));
                      }
                     /* $data = mysqli_fetch_assoc($table);
                      return $data; */
					  $i=1;
                      while ($row = mysqli_fetch_assoc($table)){ 
										  
										  
										 
										if($row['status'] == 'sudah'){
											$row['type_status'] = '<small class="badge badge-success">'. strtoupper($row['status']).'</small>';
											}elseif($row['status'] == 'belum'){
												$row['type_status'] = '<small class="badge badge-danger">'. strtoupper($row['status']).'</small>';
											}else{
												$row['type_status'] = $data[$i]['status'];
											} 
											
										if($row['verified'] == 'approve'){
											$row['type_verified'] = '<small class="badge badge-success">'. strtoupper($row['verified']).'</small>';
											}elseif($row['verified'] == 'not-approve'){
												$row['type_verified'] = '<small class="badge badge-danger">'. strtoupper($row['verified']).'</small>';
											}else{
												$row['type_verified'] = $data[$i]['verified'];
											} 

										if($row['verified_fls'] == 'verified'){
											$row['type_aprof'] = '<small class="badge badge-success">'. strtoupper($row['verified_fls']).'</small>';
											}elseif($row['verified_fls'] == 'not_verified'){
												$row['type_aprof'] = '<small class="badge badge-danger">'. strtoupper($row['verified_fls']).'</small>';
											}else{
												$row['type_aprof'] = $data[$i]['verified_fls'];
											} 
											
										if($row['jenis_pekerjaan'] == 'pasang_spanduk'){
											$row['jns_pkrjan'] = '<small class="badge badge-dark">'. strtoupper($row['jenis_pekerjaan']).'</small>';
											}elseif($row['jenis_pekerjaan'] == 'sebar_brosur'){
												$row['jns_pkrjan'] = '<small class="badge badge-light text-dark">'. strtoupper($row['jenis_pekerjaan']).'</small>';
											}elseif($row['jenis_pekerjaan'] == 'pasang_banner'){
												$row['jns_pkrjan'] = '<small class="badge badge-info">'. strtoupper($row['jenis_pekerjaan']).'</small>';
											}elseif($row['jenis_pekerjaan'] == 'open_booth'){
												$row['jns_pkrjan'] = '<small class="badge badge-success">'. strtoupper($row['jenis_pekerjaan']).'</small>';
											}elseif($row['jenis_pekerjaan'] == 'banner_60x160'){
												$row['jns_pkrjan'] = '<small class="badge badge-secondary">'. strtoupper($row['jenis_pekerjaan']).'</small>';
											}elseif($row['jenis_pekerjaan'] == 'pasang_banner_wifi_gratis'){
												$row['jns_pkrjan'] = '<small class="badge badge-primary">'. strtoupper($row['jenis_pekerjaan']).'</small>';
											}else{
												$row['type_status'] = $data[$i]['status'];
											}
											
											$total_harga = '<small class="badge badge-primary">'. strtoupper($row['nominal']).'</small>';
											$diskon2 = "Rp " . number_format($row['diskon'],2,',','.');
											$ttl = ($row['nominal'] - $row['diskon']); 
											$hasil =  '<small class="badge badge-success">'. strtoupper($ttl).'</small>';
											
										  ?>
										  <tr id="<?php echo $row['id']; ?>">
											<td data-target="urutan"> <?php echo $i;?></td>
											<td data-target="nama"> <?php echo $row['nama'];?></td>
                                            <td data-target="level"> <?php echo $row['level'];?></td>
                                            <td data-target="jns_pkrjan"> <?php echo $row['jns_pkrjan'];?></td>
                                            <td data-target="jumlah"> <?php echo $row['jumlah'];?></td>
                                            <td data-target="total_harga"> <?php echo $total_harga;?></td>
											<td data-target="diskon"> <?php echo '<small class="badge badge-danger">'. strtoupper($diskon2).'</small>'?></td>
                                            <td data-target="ttl"> <?php echo $hasil;?></td>
                                            <td data-target="type_aprof"> <?php echo $row['type_aprof'];?></td>
											<td data-target="solvedtgl"> <?php echo $row['log_user'];?></td>
											
                                           
                                            
                                            <!-- td> <div class="btn-group">	 
                                              <button type="button" name="edit" data-id="<?php echo $row['id'];?>"
											  id="<?php echo $row['id'];?>"
                                              nama="<?php echo $row['nama'];?>"
                                              jenis_pekerjaan="<?php echo $row['jenis_pekerjaan'];?>"
                                              jumlah="<?php echo $row['jumlah'];?>"
                                              verified="<?php echo $row['verified'];?>"
                                              total="<?php echo $row['total'];?>"
                                              diskon="<?php echo $row['diskon'];?>"
                                              totalakhir="<?php echo $row['totalakhir'];?>"
                                              nama="<?php echo $row['nama'];?>"
                                              tgl_solved="<?php echo $row['tgl_solved'];?>"
                                              verified_fls="<?php echo $row['verified_fls'];?>"
                                              log_user="<?php echo $row['log_user'];?>"
                                              pembayaran="<?php echo $row['pembayaran'];?>"
                                              id_transaksi="<?php echo $row['id_transaksi'];?>"
                                              ket_fls="<?php echo $row['ket_fls'];?>"
                                              verified_fls="<?php echo $row['verified_fls'];?>"
                                              ket_daerah="<?php echo $row['ket_daerah'];?>"
                                              class="btn btn-info btn-sm mr-2 editverifiedmar">Edit</button -->

                                              <!-- button type="button" name="delete" data-id="<?php echo $row['id'];?>"
                                              id="<?php echo $row['id'];?>"			
                                              class="btn btn-danger btn-sm mr-2 hapusdata">Delete</button -->
                                              
                                            </div></td>

										</div></td>
										  </tr>
										  <?php	
										  $i++;
										  }
										  ?>
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
				<div class="modal fade bd-example-modal-lg" id="modal_up_mar" tabindex="-1" role="dialog" aria-labelledby="modal_update" aria-hidden="true">
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
                                <input type="hidden" class="form-control" name="id" id='id' placeholder="" />
                            </div> 
							<div class="row">
							
							<div class="col-sm-4">
                                <label for="recipient-name" class="col-form-label">TANGGAL INSTALASI</label>
                                <input type="date" class="form-control" name="tgl_solved" id='tgl_solved' placeholder="" readonly>
                            </div>  
							
							<div class="col-sm-4">
                                <label for="recipient-name" class="col-form-label">PIC</label>
                                <input type="text" class="form-control" name="pic" id='pic' placeholder="" readonly>
                            </div>
							
							<div class="col-sm-4">
                                <label for="recipient-name" class="col-form-label">LOG USER</label>
                                <input type="text" class="form-control" name="log_user" id='log_user' placeholder="" readonly>
                            </div>
							
							<div class="col-sm-4">
                                <label for="recipient-name" class="col-form-label">Jenis Pekerjaan</label>
                                <input type="text" class="form-control" name="jenis_pekerjaan" id='jenis_pekerjaan' placeholder="" readonly>
                            </div>
							
							<div class="col-sm-4">
                                <label for="recipient-name" class="col-form-label">TOTAL PEKERJAAN</label>
                                <input type="text" class="form-control" name="total" id='total' placeholder="" readonly>
                            </div>
							
							<div class="col-sm-4">
                                <label for="recipient-name" class="col-form-label">TOTAL NOMINAL</label>
                                <input type="text" class="form-control" name="nominal" id='nominal' placeholder="" readonly>
                            </div>
							
							<div class="col-sm-4">
                                <label for="recipient-name" class="col-form-label">TOTAL DISKON</label>
                                <input type="text" class="form-control" name="total_diskon" id='total_diskon' placeholder="" readonly>
                            </div>
							
							<div class="col-sm-4">
                                <label for="recipient-name" class="col-form-label">METODE PEMBAYARAN</label>
                                <input type="text" class="form-control" name="metode_bayar" id='metode_bayar' placeholder="" readonly>
                            </div>
							
							<div class="col-sm-4">
                                <label for="recipient-name" class="col-form-label">NO REKENING</label>
                                <input type="text" class="form-control" name="no_rek" id='no_rek' placeholder="" readonly>
                            </div>
							
							<div class="col-sm-4">
                                <label for="recipient-name" class="col-form-label">AN REKENING</label>
                                <input type="text" class="form-control" name="ats_rek" id='ats_rek' placeholder="" readonly>
                            </div>
							
							<div class="col-sm-4">
                                <label for="recipient-name" class="col-form-label">TOTAL AKHIR</label>
                                <input type="text" class="form-control" name="totalakhir" id='totalakhir' placeholder="" readonly>
                            </div>
							
							<div class="col-sm-4">
                                <label for="recipient-name" class="col-form-label">DAERAH SEBARAN</label>
								<textarea class="form-control"  name="ket_daerah" id="ket_daerah" rows="3" readonly></textarea>
                            </div>
							</div>
							<br/><hr/>
							
							<div class="row">
								
								<div class="col-sm-6">
									<label for="recipient-name" class="col-form-label">JENIS PEMBAYARAN</label>
									<select name="pembayaran" id='pembayaran' class="form-control">
                                   <option value=""></option>
                                   <option value="Tunai">Tunai</option>
                                   <option value="Transfer">Transfer</option>
                                </select>
								</div>
							
							<div class="col-sm-12">
                                <label for="recipient-name" class="col-form-label">ID TRANSAKSI JURNAL</label>
                                <input type="longtext" class="form-control" name="id_transaksi" id='id_transaksi' placeholder="">
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
									<select name="verified_fls" id='verified_fls' class="form-control">
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
	
	<div class="modal fade" id="modal_set_blasting" role="dialog">
  <div class="modal-dialog">
	<div class="modal-content">	 
	<div class="modal-body">		
	  <div class="box-header with-border">
            <h3 class="box-title">Insert Info Blasting</h3>
      </div>	
		<div class="form-row">
			<input class="form-control" type="text" name="all_id" id="all_id" readonly>
		</div>
		 <div class="form-row">
                                <label for="rang">Yang Menerima</label>                
								<select class="form-control" type="text" id="pihak1" name="pihak1" autocomplete="off" required>								
								<option></option>					
								<option value='Abdur Rozak'>ABDUR ROZAK</option>					
								<option value='Kiki Rekananda'>KIKI REKANANDA</option>					
								<option value='DEDDY YUSTIAN'>DEDDY YUSTIAN</option>				
								<option value='FERDY FAUZI'>FERDY FAUZI</option>																	
								</select>
                            </div> 
		<div class="form-row">
                                <label for="rang">Yang Menyerahkan</label>                
								<select class="form-control" type="text" id="pihak2" name="pihak2" autocomplete="off" required>								
								<option></option>					
								<option value='REZA MAULANA YAHYA'>REZA MAULANA YAHYA</option>								
								
								</select>
                            </div> 
							<br/>
								
		<div class="box-footer">            
		   <button type="button" id="reset_kelas" class="btn btn-danger btn-flat" data-dismiss="modal">Cancel</button>
		   <button type="button" id="submit_select_client" class="btn btn-success btn-flat pull-right"><span class="fa fa-save"></span> Save</button>
		</div>						
	</div>
		
	</div>
	<!-- /.modal-content -->
 </div>
	  <!-- /.modal-dialog -->
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
	<!-- iCheck 1.0.1 -->
	<script src="../asset/plugins/iCheck/icheck.min.js"></script>
	<script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>


    <script src="../asset/js/bootstrap-datepicker.min.js"></script>

    <script src="../asset/locales/bootstrap-datepicker.id.min.js"></script>
	<script>
	$(document).ready(function() {
		var table = $('#tabel_sudah').DataTable({

                "responsive": true,

                "processing": true,

                "language": {

                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'

                }, 

                "ajax": {

                    "url":"../models/modal_marketing.php",

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

                    { mData: 'targets'},
                    
					{ mData: 'id'},

                    { mData: 'nama'},

                    { mData: 'level'},

                    { mData: 'jns_pkrjan'} , 
					
                    { mData: 'jumlah'} ,                  

                    { mData: 'ttl'} ,

					{ mData: 'ttl_disk'} ,
					
					{ mData: 'ttl_alll'} ,
					
					{ mData: 'type_verified'} , 
					
					{ mData: 'solvedtgl'} , 
					
					{ mData: 'action'} ,        

                ],
				
					'drawCallback': function(){
				$('input[type="checkbox"]').iCheck({
					checkboxClass: 'icheckbox_minimal-red',
					radioClass   : 'iradio_flat-green'
				});
			},
				
					 'columnDefs': [
							{
								'targets': 0,
								'checkboxes': {
									'selectRow': true,
									'selectCallback': function(nodes, selected){
										$('input[type="checkbox"]', nodes).iCheck('update');
									},
									'selectAllCallback': function(nodes, selected, indeterminate){
										$('input[type="checkbox"]', nodes).iCheck('update');
									}
								}
							}
						],
				  'select': {
					 'style': 'multi'
				  },
				  'order': [[1, 'asc']]
   });
   
	// Handle iCheck change event for "select all" control
	var table = $('#tabel_sudah').DataTable();
	$(table.table().container()).on('ifChanged', '.dt-checkboxes-select-all input[type="checkbox"]', function(event){
		var col = table.column($(this).closest('th'));
		col.checkboxes.select(this.checked);
	});

	// Handle iCheck change event for checkboxes in table body
	var table = $('#tabel_sudah').DataTable();
	$(table.table().container()).on('ifChanged', '.dt-checkboxes', function(event){
	  var cell = table.cell($(this).closest('td'));
	  cell.checkboxes.select(this.checked);
	});	
	
	// Remove the checked state from "All" if any checkbox is unchecked
	$('.check').on('ifUnchecked', function (event) {
		$('#check-all').iCheck('uncheck');		
	});

	// Make "All" checked if all checkboxes are checked
	$('.check').on('ifChecked', function (event) {
		if ($('.check').filter(':checked').length == $('.check').length) {
			$('#check-all').iCheck('check');			
		}
	});
	
	$("#set").click(function(event){
		//event.stopPropagation();
		//event.preventDefault();
		//event.stopImmediatePropagation();		
		var pilih_id = [];
		//alert (pilih_id); return;
		//var lognya = this;
		var otable = $('#tabel_sudah').DataTable();

			var rows_selected = otable.column(0).checkboxes.selected();
			//var rows_selected = otable.$(".minimal:checked",{"page":"all"});
			$.each(rows_selected, function(index, rowId){
			
				paijo = rowId.replace(/<\/?label>/g, '');
				
				var dataId = $(paijo).attr('value');
				pilih_id.push(dataId);	
			
			});
			
		event.preventDefault();		
		//alert(pilih_id);
		//console.log(pilih_id);
		// $(".modal-body #all_id").val(pilih_id);			
		// $("#modal_set_blasting").modal("show");
		var all_id = pilih_id;
		//var select_user = all_id.length;
	/* 	if(select_user ==  0 || select_user == null || select_user == undefined){
		Swal.fire(
										  'Good job!',
										  data,
										  'success'
										);			
			return;
		} */
	
		var value = {all_id:all_id};
		$.ajax({

                    type: "POST",
					async: false,
                    url: "../controller/action_invoice_mark.php",
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
		
$('#submit_select_client').click(function(event){
    event.stopPropagation();
	event.preventDefault();	
	event.stopImmediatePropagation();
	//var info_blasting = $("#info_blasting").val();
	var all_id		= $("#all_id").val();
	var pihak1		= $("#pihak1").val();
	var pihak2		= $("#pihak2").val();
	//var select_user = all_id.length;
	var value = { all_id:all_id, pihak1:pihak1, pihak2:pihak2,}; 
	 
	
	//alert (value); return;
	
	//alert(all_id); return;
	 $.ajax({       type: "POST",
					async: false,
                    url: "../controller/laporan-cetak.php",
                    data: value,
                    dataType: 'html',					
                }).done(function(data) {
					printWindow = window.open();
					printWindow.document.write(data);
					printWindow.print();
				});
		});
	});
	</script>
	<script src="../js/sweetalert2.all.min.js"></script>
	<script>
		$(document).ready(function() {
						  
              //get data value sinden
   //get data value sinden
    $(document).on('click', '.editverifiedmar', function(){

        
        var id = $(this).attr('id');
        var verified = $(this).attr('verified');
        var total = $(this).attr('total');
        var total_diskon = $(this).attr('diskon');
        var nominal = $(this).attr('nominal');
        var totalakhir = $(this).attr('totalakhir');
        var jenis_pekerjaan = $(this).attr('jenis_pekerjaan');
        var pic = $(this).attr('nama');
        var tgl_solved = $(this).attr('tgl_solved');
        var log_user = $(this).attr('log_user');
        var pembayaran = $(this).attr('pembayaran');
        var id_transaksi = $(this).attr('id_transaksi');
        var verified_fls = $(this).attr('verified_fls');
        var ket_fls = $(this).attr('ket_fls');
        var metode_bayar = $(this).attr('metode_bayar');
        var ats_rek = $(this).attr('ats_rek');
        var no_rek = $(this).attr('no_rek');
        var ket_daerah = $(this).attr('ket_daerah');
        
		//alert (total); return;
		
        $('#modal_up_mar').modal('show');
        $('#id').val(id);
        $('#verified').val(verified);
        $('#total').val(total);
        $('#total_diskon').val(total_diskon);
        $('#nominal').val(nominal);
        $('#totalakhir').val(totalakhir);
        $('#jenis_pekerjaan').val(jenis_pekerjaan);
        $('#pic').val(pic);
        $('#tgl_solved').val(tgl_solved);
        $('#log_user').val(log_user);
        $('#pembayaran').val(pembayaran);
        $('#id_transaksi').val(id_transaksi);
        $('#verified_fls').val(verified_fls);
        $('#keterangan').val(ket_fls);
        $('#metode_bayar').val(metode_bayar);
        $('#ats_rek').val(ats_rek);
        $('#no_rek').val(no_rek);
        $('#ket_daerah').val(ket_daerah);
        
      });
	  
	  $(".update_fls_mrk").click(function() {

          var id = $("#id").val();
          var pembayaran = $("#pembayaran").val();
          var id_transaksi = $("#id_transaksi").val();
          var keterangan = $("#keterangan").val();
          var verified_fls = $("#verified_fls").val();
          
          //alert (nama2); return;
          $.ajax({
            type: "POST",
            url: "../controller/update_fls.php",
            data: {
                id: id,
                pembayaran: pembayaran,
                id_transaksi: id_transaksi,
                keterangan: keterangan,
                verified_fls: verified_fls,
                
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
			
			/* var table = $('#tabel_sudah').DataTable({

                "responsive": true,

                "processing": true,

                "language": {

                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'

                }, 

                "ajax": {

                    "url":"../models/modal_marketing.php",

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

                    { mData: 'targets'},
                    
					{ mData: 'id'},

                    { mData: 'nama'},

                    { mData: 'level'},

                    { mData: 'jns_pkrjan'} , 
					
                    { mData: 'jumlah'} ,                  

                    { mData: 'ttl'} ,

					{ mData: 'ttl_disk'} ,
					
					{ mData: 'ttl_alll'} ,
					
					{ mData: 'type_verified'} , 
					
					{ mData: 'solvedtgl'} , 
					
					{ mData: 'action'} ,        

                ],
				
					'drawCallback': function(){
				$('input[type="checkbox"]').iCheck({
					checkboxClass: 'icheckbox_minimal-red',
					radioClass   : 'iradio_flat-green'
				});
			},
				
					 'columnDefs': [
							{
								'targets': 0,
								'checkboxes': {
									'selectRow': true,
									'selectCallback': function(nodes, selected){
										$('input[type="checkbox"]', nodes).iCheck('update');
									},
									'selectAllCallback': function(nodes, selected, indeterminate){
										$('input[type="checkbox"]', nodes).iCheck('update');
									}
								}
							}
						],
				  'select': {
					 'style': 'multi'
				  },
				  'order': [[1, 'asc']]

            });
			
			// Handle iCheck change event for "select all" control
	var table = $('#tabel_sudah').DataTable();
	$(table.table().container()).on('ifChanged', '.dt-checkboxes-select-all input[type="checkbox"]', function(event){
		var col = table.column($(this).closest('th'));
		col.checkboxes.select(this.checked);
	});

	// Handle iCheck change event for checkboxes in table body
	var table = $('#tabel_sudah').DataTable();
	$(table.table().container()).on('ifChanged', '.dt-checkboxes', function(event){
	  var cell = table.cell($(this).closest('td'));
	  cell.checkboxes.select(this.checked);
	});	
	
	// Remove the checked state from "All" if any checkbox is unchecked
	$('.check').on('ifUnchecked', function (event) {
		$('#check-all').iCheck('uncheck');		
	});

	// Make "All" checked if all checkboxes are checked
	$('.check').on('ifChecked', function (event) {
		if ($('.check').filter(':checked').length == $('.check').length) {
			$('#check-all').iCheck('check');			
		}
	});
	
	$("#sets").click(function(event){
		//event.stopPropagation();
		//event.preventDefault();
		//event.stopImmediatePropagation();		
		var pilih_id = [];
		//alert (pilih_id); return;
		//var lognya = this;
		var otable = $('#tabel_sudah').DataTable();

			var rows_selected = otable.column(0).checkboxes.selected();
			//var rows_selected = otable.$(".minimal:checked",{"page":"all"});
			$.each(rows_selected, function(index, rowId){
			
				paijo = rowId.replace(/<\/?label>/g, '');
				
				var dataId = $(paijo).attr('value');
				pilih_id.push(dataId);	
			
			});
			
		event.preventDefault();		
		alert(pilih_id);
		console.log(pilih_id);
		$(".modal-body #all_id").val(pilih_id);			
		$("#modal_set_blasting").modal("show");
			
		}); */

			var table = $('#tabel_sudah2').DataTable({

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

                    "url":"../models/datapengguna_ts.php",

                    "type":"POST",

                },

                "paging": true,

                "lengthChange": true,

                "searching": true,

                "ordering": false,

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

                ],

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
			
			var kategori_maintenance = $("#kategori_maintenance").val();

            var password_fal = $("#password_fal").val();

            var lain_lain = $("#lain_lain").val();

            var status_wo = $("#status_wo").val();

            var ket_user = $("#lain_lain").val();
			
			var verified = $("#verified").val();
			
			var total_diskon = $("#total_diskon").val();
			
			var angsuran1 = $("#angsuran1").val();
			
			var angsuran2 = $("#angsuran2").val();
			
			var status_angsuran = $("#status_angsuran").val();
			
			var pembayaran = $("#pembayaran").val();
			
			var verif1 = $("#verif1").val();
			
			var verif2 = $("#verif2").val();

            var k = $("#b").text();
			
			if(verified == ''){
				alert("DATA ANDA TIDAK LENGKAP"); 
				return
			}



            //alert(karyawan);



            var value = { action:action, 
						  nama_fal:nama_fal, 
						  kd_layanan:kd_layanan, 
						  pic_ikr:pic_ikr,
						  alamat_fal:alamat_fal,
						  rt:rt,
						  rw:rw,
						  kelurahan:kelurahan,
						  tlp_fal:tlp_fal,
						  pic:pic , 
						  status:status, 
						  kategori_maintenance:kategori_maintenance,
						  status2:status2, 
						  jenis_wo:jenis_wo,
						  produk:produk,
						  modem:modem,
						  kabel1:kabel1,
						  kabel2:kabel2,
						  kabel3:kabel3,
						  pembayaran:pembayaran,
						  paket_fal:paket_fal,
						  tgl_fal:tgl_fal,
						  verified:verified,
						  total_diskon:total_diskon,
						  angsuran1:angsuran1,
						  angsuran2:angsuran2,
						  verif1:verif1,
						  verif2:verif2,
						  status_angsuran:status_angsuran,
						  username_fal:username_fal,
						  password_fal:password_fal, status_wo:status_wo,lain_lain:lain_lain, ket:k }; 



                $.ajax({

                    type: "POST",

                    url: "../controller/action_kapten_keuangan.php",

                    data: value,

                    success: function(data) {

                        $('#tabel_pengguna').DataTable().ajax.reload();

                    }

                });  

            });



            $(document).on('click', '.editpengguna', function(){

                var id = $(this).attr("id");

                $.ajax({

                    url:"../controller/get_data.php",

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

                        $("#password_fal").val(data.password_fal);

                        $("#lain_lain").val(data.lain_lain);
						
						$("#pembayaran").val(data.pembayaran);
						
						$("#total_diskon").val(data.total_diskon);
						
						$("#angsuran1").val(data.angsuran1);
						
						$("#angsuran2").val(data.angsuran2);
						
						$("#status_angsuran").val(data.status_angsuran);

                        $("#latitude").val(data.latitude);

                        $("#longitude").val(data.longitude);  

						$("#kategori_maintenance").val(data.kategori_maintenance);
						 
						$("#verified").val(data.verified);
						
						$("#verif1").val(data.verif1);
						
						$("#verif2").val(data.verif2);

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