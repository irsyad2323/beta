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
    <title>WO Admin - IKR</title>

    <!-- Custom fonts for this template-->

<link rel="icon" type="image/x-icon" href="../img/icons/kaptennaratel.png" />
    <link href="../asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="../css/select2.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
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

                                <a class="dropdown-item" href="#">

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

                                <div class="dropdown-divider"></div> >

                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">

                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>

                                    Logout

                                </a>

                            </div>

                        </li>



                    </ul>



                </nav>

                <!-- End of Topbar -->
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">WO Tools Marketing</h1>
            <!--<p class="mb-4">
              DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.
            </p>-->

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                
                  <!-- button -->
               <?php if ( $_SESSION["level_user"] == "kapten" ){ ?>
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_brosur" data-whatever="@who">FORM WO MARKETING</button>
			   <?php } ?>
						
				
			    <!-- modal -->
				<div class="modal fade" id="modal_update" tabindex="-1" role="dialog" aria-labelledby="modal_update" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                         <h5 class="modal-title" id="modal_update">Form Hasil</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form>
							<div class="form-group">
                                <label for="recipient-name" class="col-form-label">Jenis Pekerjaan</label>
                                <input type="teks" class="form-control" name="jenis_pekerjaan" id='jenis_pekerjaan' placeholder="Your answer" readonly>
                            </div>
							
							<div class="form-group">
                                <input type="hidden" class="form-control" name="nama" id='nama' readonly>
                            </div>
							
							<div class="form-group">
                                <label for="recipient-name" class="col-form-label">Keterangan</label>
                                <textarea class="form-control" name="ket" id='ket' placeholder="Daerah Sebaran" ></textarea>
                                <input type="hidden" class="form-control" name="id" id='id' />
                            </div>         

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Jumlah</label>
                                <input type="teks" class="form-control" name="jumlah" id='jumlah' placeholder="Your answer" readonly>
                            </div>
							
							  <p>Status Pekerjaan</br>
                                <select name="status" id='status' class="form-control">
                                    <option value=''></option>
                                    <option value='sudah'>Sudah Dikerjakan</option>
								</select>
                            </p>
							
							 <div class="form-row">
								  </br>
										<h4>Harap isi Lokasi di bawah ini</h4>
										</br>
								  <div class="form-group col-md-6" >
												<button class="btn btn-danger pull-right" type="button" onclick="showPosition();">Show Position</button>
													<span type="hidden" id="get_sinden" name="get_sinden" value="">
											</div>	
												<input class="form-control" type="text" id="get_lokasi" name="get_lokasi" autocomplete="off" placeholder="Tekan Tombool Show Position">   
									</div>
                            
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" id="submit" class="btn btn-primary edit">Submit</button>
                        </div>
                      </div>
                    </div>
                  </div>
				  <!-- end modal --> 

                </br><hr>
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data</h6>
                </div>

              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal Submit</th>
						
                        <th>Jenis Pekerjaan</th>
                        <th>Keterangan</th>
                        <th>Kelurahan</th>
                        <th>Jumlah</th>
						<th>Status</th>
						<th>Lokasi</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="table">
                    <?php 
					  include('../controller/controller_mysqli.php');
					  // $acces_user_log = $_SESSION["username"];
					  $table = mysqli_query($koneksi,"SELECT b.nama_provinsi, c.nama_kabkota, d.nama_kec, e.nama_kel ,a.*, DATE_FORMAT(a.tgl_pekerjaan,'%d-%m-%Y') as waktu FROM tbl_marketing a
																		LEFT JOIN tb_provinsi b
																		on a.prov = b.kd_provinsi
																		LEFT JOIN tb_kabkota c
																		on a.kab = c.kd_kabkota
																		LEFT JOIN tb_kecamatan d
																		on a.kec = d.kd_kec
																		LEFT JOIN tb_kelurahan e
																		on a.kel =  e.kd_kel
																		WHERE a.status='belum' and a.nama='".$acces_user_log."' and a.kab = d.kd_kabkota AND d.kd_kec = e.kd_kec and c.kd_kabkota = e.kd_kabkota and a.layanan like '".$kota."' GROUP BY a.id DESC;");
                      if ($table === FALSE) {
                        die(mysqli_error($koneksi));
                      }
                     /* $data = mysqli_fetch_assoc($table);
                      return $data; */
					  $i=1;
					  $no=1;
                      while ($row = mysqli_fetch_assoc($table)){ 
										  $i=0;
										  
										 
										   if($row['status'] == 'sudah'){
											$row['type_status'] = '<small class="badge badge-success">'. strtoupper($row['status']).'</small>';
											}elseif($row['status'] == 'belum'){
												$row['type_status'] = '<small class="badge badge-danger">'. strtoupper($row['status']).'</small>';
											}else{
												$row['type_status'] = $data[$i]['status'];
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
											
											if($row['jenis_pekerjaan'] == 'sebar_brosur'){
												if($row['level'] == 'teknisi'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 0);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($row['level'] == 'pkl'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 300);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($row['level'] == 'vendor'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 300);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}
											}elseif($row['jenis_pekerjaan'] == 'pasang_banner'){
												if($row['level'] == 'teknisi'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 0);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($row['level'] == 'pkl'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 5000);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($row['level'] == 'vendor'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 5000);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}
											}elseif($row['jenis_pekerjaan'] == 'pasang_spanduk'){
												if($row['level'] == 'teknisi'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 0);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($row['level'] == 'pkl'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 50000);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($row['level'] == 'vendor'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 50000);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}
											}
											
										  ?>
										  <tr id="<?php echo $row['id']; ?>">
											<td data-target="no"> <?php echo $no;?></td>
                                            <td data-target="waktu"> <?php echo $row['waktu'];?></td>
											<td data-target="jns_pkrjan"> <?php echo $row['jns_pkrjan'];?></td>
                                            <td data-target="ket"> <?php echo $row['ket_daerah'];?></td>
                                            <td data-target="nama_kel"> <?php echo $row['nama_kel'];?></td>
                                            <td data-target="jumlah"> <?php echo $row['jumlah'];?></td>
                                            <td data-target="type_status"> <?php echo $row['type_status'];?></td>
                                            <td data-target="lokasi_sign"> <?php echo $row['lokasi_sign'];?></td>
                                            <td> <div class="btn-group">	 
                                              <button type="button" name="edit" data-id="<?php echo $row['id'];?>"
                                              id="<?php echo $row['id'];?>"
                                              ket="<?php echo $row['ket_daerah'];?>"
                                              jumlah="<?php echo $row['jumlah'];?>"
                                              jenis_pekerjaan="<?php echo $row['jenis_pekerjaan'];?>"
                                              nama="<?php echo $row['nama'];?>"
                                              class="btn btn-info btn-sm mr-2 edit_ts">Edit</button>
											  <a type="button" href="<?php echo $row['lokasi_sign'];?>" target="_blank"
                                              class="btn btn-info btn-sm mr-2">Lokasi</a>
                                              
                                            </div></td>
										
											
											
										</div></td>
										  </tr>
										  <?php	
										  $i++;
										  $no++;
										  }
										  ?>
                    </tbody>
                  </table>
                </div>
                
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Your Website 2020</span>
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
	<script src="../js/sweetalert2.all.min.js"></script>
    <script src="../asset/js/bootstrap-datepicker.min.js"></script>
    <script src="../asset/locales/bootstrap-datepicker.id.min.js"></script>
	<script src="../js/select2.min.js"></script>
	<script>
    var result;
    function showPosition() {   

        // Store the element where the page displays the result

        result = document.getElementById("get_sinden");
        lokasi = document.getElementById("get_lokasi");
	
        

        // If geolocation is available, try to get the visitor's position

        if(navigator.geolocation) {

            navigator.geolocation.getCurrentPosition(successCallback, errorCallback);

            result.innerHTML = "ERROR Harap Hubungi team software";

        } else {

            alert("Sorry, your browser does not support HTML5 geolocation.");

        }

    };

    

    // Define callback function for   attempt

    function successCallback(position) {

        result.innerHTML = position.coords.latitude + "#" + position.coords.longitude;
        lokasi.value = position.coords.latitude + "#" + position.coords.longitude;
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

</script>
	<script>
	
	$('#provinsi').on('change', function(){
		//var a = $('.js-example-basic-multiple').val();
		var prov = $(this).val();
		//alert(prov);
		if(prov){
			$.ajax({
				type:'POST',
				url : "control/list_kabupaten.php",
				data:'prov_id='+prov,
					success:function(html){
						//alert(html);
						$('#kabupaten').html(html);
						//$('#city').html('<option value="">Select state first</option>'); 
					}
			}); 
		}else{
			$('#provinsi').html('<option value="">Select Provinsi dulu</option>');
			//$('#city').html('<option value="">Select state first</option>'); 
		}
    });		
	
		//add kec
	$('#kabupaten').on('change', function(){
		var kab = $(this).val();
		//alert(kab);
		if(kab){
			$.ajax({
				type:'POST',
				url : "control/list_kecamatan.php",
				data:'kab_id='+kab,
					success:function(html){
						$('#kecamatan').html(html);
						//$('#city').html('<option value="">Select state first</option>'); 
					}
			}); 
		}else{
			$('#kecamatan').html('<option value="">Select kecamatan dulu</option>');
			//$('#city').html('<option value="">Select state first</option>'); 
		}
	});
	
	//add kel
	$('#kecamatan').on('change', function(){
		var kec = $(this).val();
		//alert(kec);
		if(kec){
			$.ajax({
				type:'POST',
				url : "control/list_kelurahan.php",
				data:'kec_id='+kec,
					success:function(html){
						$('#kelurahan').html(html);
						//$('#city').html('<option value="">Select state first</option>'); 
					}
			}); 
		}else{
			$('#kelurahan').html('<option value="">Select kelurahan dulu</option>');
			//$('#city').html('<option value="">Select state first</option>'); 
		}
	});
	
	//add kel
	$('#kelurahan').on('change', function(){
		var kelurahan = $(this).val();
		 var result = kelurahan.split("|");
		 var result2 = kelurahan.split("|");
		 var result3 = kelurahan.split("|");
			kab = result[result.length - 2];
			kec = result2[result2.length - 1];
			kel = result3[result3.length - 3];
			
			 var value = {  
						  kab:kab,
						  kec:kec,
						  kel:kel,
						  }; 
		
		//alert(kel); return;
		
		if(kelurahan){
			$.ajax({
				type:'POST',
				url : "control/kd_layanan.php",
				data: value,
					success:function(html){
						$('#layanan').html(html);
						//$('#city').html('<option value="">Select state first</option>'); 
					}
			}); 
		}else{
			$('#kelurahan').html('<option value="">Select kelurahan dulu</option>');
			//$('#city').html('<option value="">Select state first</option>'); 
		}
	});
	
// In your Javascript (external .js resource or <script> tag)
/* $(document).ready(function() {
    $('.js-example-basic-single').select2();
}); */
	</script>

    <script> 
    
    //UPDATE
    $(document).ready(function() {
		var table = $('#dataTable').DataTable({

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
              //get data value sinden
    $(document).on('click', '.edit_ts', function(){

        
        var id = $(this).attr('id');
        var daerah = $(this).attr('daerah');
        var respon_wa = $(this).attr('respon_wa');
        var fal = $(this).attr('fal');
        var get_lokasi = $(this).attr('get_lokasi');
        var ket = $(this).attr('ket');
        var jenis_pekerjaan = $(this).attr('jenis_pekerjaan');
        var jumlah = $(this).attr('jumlah');
        var nama = $(this).attr('nama');
        
        //alert(nama2);
        
        
        $('#modal_update').modal('show');
        $('#id').val(id);
        $('#ket').val(ket);
        $('#respon_wa').val(respon_wa);
        $('#fal').val(fal);
        $('#get_lokasi').val(get_lokasi);
        $('#jenis_pekerjaan').val(jenis_pekerjaan);
        $('#jumlah').val(jumlah);
        $('#nama').val(nama);
      });
    });

    $(".edit").click(function() {

          var id = $("#id").val();
          var daerah = $("#daerah").val();
          var daerah2 = $("#daerah2").val();
          var daerah3 = $("#daerah3").val();
          var daerah4 = $("#daerah4").val();
          var daerah5 = $("#daerah5").val();
          var respon_wa = $("#respon_wa").val();
          var fal = $("#fal").val();
          var get_lokasi = $("#get_lokasi").val();
          var status = $("#status").val();
          var jenis_pekerjaan = $("#jenis_pekerjaan").val();
          var ket = $("#ket").val();
          var jumlah = $("#jumlah").val();
          var nama = $("#nama").val();
		  
		  //alert (jenis_pekerjaan); return;
		  
		    if(daerah == ''){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Daerah Belum Terisi!',
				  
				}) 
				return false
			}
		  
		    if(status == ''){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Status Belum Terisi!',
				  
				}) 
				return false
			}
		  
		    if(get_lokasi == ''){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Lokasi Belum Terisi!',
				  
				}) 
				return false
			}
			
			if(get_lokasi == 'ERROR Harap Hubungi team software'){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Error Lokasi Hubungi Admin',
				  
				}) 
				return false
			}
			
			if(get_lokasi == 'ERROR Harap Hubungi team software'){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Error Lokasi Hubungi Admin',
				  
				}) 
				return false
			}
			
			if(get_lokasi == 'Sorry, your browser does not support HTML5 geolocation.'){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Error Lokasi Coba Ganti Browser',
				  
				}) 
				return false
			}
          
          //alert (nama2); return;
          $.ajax({
            type: "POST",
            url: "../controller/update_marketing_ts.php",
            data: {
                id: id,
                daerah: daerah,
                daerah2: daerah2,
                daerah3: daerah3,
                daerah4: daerah4,
                daerah5: daerah5,
                respon_wa: respon_wa,
                fal: fal,
                get_lokasi: get_lokasi,
                status: status,
                ket: ket,
                jumlah: jumlah,
                nama: nama,
                jenis_pekerjaan: jenis_pekerjaan,
                
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

     $(document).on('click', '.hapusdata', function(){

                var id = $(this).attr("id");
				
				//alert (id); return;

                if(confirm('Hapus id '+id+'?'))
                {
                    $.ajax({
                        url:"../controller/delete_marketing.php",
                        method:"POST",
                        data:{id:id},
                        success:function(data){
						//alert(data);
						Swal.fire(
							  'Good job!',
							  'You clicked the button!',
							  'success'
							).then(function(success){
								//if (data == 'succes') {
									//alert('a');
							window.location.reload(true);
								//}
							})
						}
                    })

                }

            });
    
    
    </script>
  </body>
</html>