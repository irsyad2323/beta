<?php
session_start();

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
                        <h1 class="h3 mb-0 text-gray-800">IKR Omah Wifi <?php //echo $_SESSION["level_user"]; ?></h1>
                        <?php 
                            if ( $_SESSION["level_user"] != "Admin" && $_SESSION["level_user"] != "ikr" ){ 
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
                            if ( $_SESSION["level_user"] != "ikr" && $_SESSION["level_user"] != "Admin" ){ 
                        ?>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <button class="btn btn-success add-data">TAMBAH +</button>
                    </div> <?php } ?>



                    <!-- Content Row -->
                    <?php 
                        if ($_SESSION["level_user"] != "ts"){
                       ?>


                          <div class="table-responsive">
                        <table id="tabel_pengguna" class="table table-bordered table-striped">
                        
                          <thead>
                      
                          <tr>
                            
                            
                            <th>NO</th>   
                            <th>Tgl Fal</th>                        
                            <th>Nama</th>                            
                            <th>Alamat</th>
                            <th>NO Telepon</th>
                            <th>Paket</th>
                            <th>Tanggal Instalasi</th>
                            <th>ID-USER</th>                            
                            <th>Password</th>
                            <th>Keterangan</th>
                            <th>Jenis Pekerjaan</th>
                            <th>Teknisi</th>
                            <th>Status WO</th>
                            <th>ACTION</th>
                    
                          
                          </tr>
                          </thead>
                          <tbody></tbody>
          
                        </table>
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

    <div class="modal fade" id="modaltambahdata"  role="dialog" tabindex="-1">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-user">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    
                </div>
                <div class="modal-body">
                    <form action="" id="formdatapengguna">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="fname">Nama</label>
                                <input class="form-control" type="text" id="nama_fal" name="nama_fal" placeholder="nama..." autocomplete="off">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="rang">KODE OMAH WIFI</label>                
                     <select class='form-control' id="OLT" name="OLT" >
					    <option></option>						
						<option value="OW">OMAH WIFI</option>						
						
						</select> &nbsp
                            </div>
							<div class="form-group col-md-2">
                            <label for="rang">ID User</label>
                            <input class="form-control" type="text" id="username_fal" name="username_fal" autocomplete="off"  disabled>
                        </div>
                            <div class="form-group col-md-2">
                                <label for="halaman">NO. Telepon</label>
                                <input class="form-control" type="text" id="tlp_fal" name="tlp_fal" placeholder="telepon.." autocomplete="off">
                            </div>  
                             <div class="form-group col-md-2">
                            <label for="rang">Password</label>
                            <input class="form-control" type="text" id="password_fal" name="password_fal" placeholder="password" autocomplete="off">
                        </div>                          
                            <div class="form-group col-md-2">
                                <label for="rang">Paket</label>                
                    <select class="form-control" type="text" id="paket_fal" name="paket_fal" autocomplete="off">
                    <option>-</option>
                    <option>3</option>
                    <option>5</option>
                    <option>7</option>
                    <option>10</option>                                  
                    </select>
                            </div> 
                            <div class="form-group col-md-2">
                                <label for="rang">kantor Cabang</label>                
                    <select class="form-control" type="text" id="kd_layanan" name="kd_layanan" autocomplete="off">
                    <option>mlg</option>
                    <option>pas</option>                                   
                    </select>
                            </div> 
                            <div class="form-group col-md-2">
                                <label for="rang">Pic IKR</label>                
                    <select class="form-control" type="text" id="pic_ikr" name="pic_ikr" autocomplete="off">
                    <option>-</option>
                    <option>rafif</option>
                    <option>wawan</option>
                    <option>fauzi</option>
                    <option>kiki</option>                    
                    <option>ricky</option>
                    <option>lukman</option>
                    <option>fio</option>
                    <option>rino</option>
                    <option>bayu</option>
                    <option>wahyu</option>
                    <option>yusuf</option>                                     
                    </select>
                            </div>                             
                                                 
                            <div class="form-group col-md-6">
                            <label for="lname">Alamat</label>
                            <input class="form-control" type="text" id="alamat_fal" name="alamat" placeholder="alamat..." autocomplete="off">
                        </div>                           
                            <div class="form-group col-md-2">
                                <label for="rang">RT</label>
                               <input class="form-control" type="text" id="rt" name="rt" placeholder="rt..." autocomplete="off">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="rang">RW</label>
                               <input class="form-control" type="text" id="rw" name="rw" placeholder="rw..." autocomplete="off">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="rang">Kelurahan</label>
                               <input class="form-control" type="text" id="kelurahan" name="kelurahan" placeholder="kelurahan..." autocomplete="off">
                            </div>                                      
                        
               
              		
              		 <div class="form-group col-md-2">
						<label>Tanggal FAL</label>
						<input type="date" name="tgl_fal" id="tgl_fal" class="form-control" required="true">
						<p class="text-danger" id="err_tanggal_masuk"></p>
					</div>

                   <div class="form-group col-md-6">
                            <label for="rang">Keterangan</label>
                            <input class="form-control" type="text" id="lain_lain" name="lain_lain" placeholder="keterangan" autocomplete="off">
                        </div>
                  

                    </div>

                    </br>
                    <h4>Isian Data Teknisi</h4>
                    </br>
                   
                    <div class="form-row">
                        <div class="form-group col-md-2">
                    <label for="rang">Teknisi 1</label>                
                    <select class="form-control" type="text" id="status" name="status" autocomplete="off" required>
                    <option>-#-</option>
                    <option>Deddy#Karyawan</option>
                    <option>Yuni#Karyawan</option>
                    <option>Kiki#Karyawan</option>
                    <option>Decky#Karyawan</option>
                    <option>Wawan#Karyawan</option>
                    <option>Roy#Karyawan</option>                    
                    <option>Ricky#Karyawan</option>
                    <option>Rafif#Karyawan</option>
                    <option>Fauzi#Karyawan</option>
                    <option>Lukman#Karyawan</option>										<option>Wahyu#Karyawan</option>
                    <option>Rino#Outsourcing</option>
                    <option>Fio#Outsourcing</option>
                    <option>Sonny#Outsourcing</option>
                    <option>Novan#Outsourcing</option>
                    <option>Faisal#Outsourcing</option>
                    <option>Bayu#Outsourcing</option>
                    <option>Ucup#Outsourcing</option>                                                   
                    </select>
                  </div>

                         <div class="form-group col-md-2">
                    <label for="rang">Teknisi 2</label>                
                    <select class="form-control" type="text" id="status2" name="status2" autocomplete="off" required>
                    <option>-#-</option>
                    <option>Deddy#Karyawan</option>
                    <option>Yuni#Karyawan</option>
                    <option>Kiki#Karyawan</option>
                    <option>Decky#Karyawan</option>
                    <option>Wawan#Karyawan</option>
                    <option>Roy#Karyawan</option>                    
                    <option>Ricky#Karyawan</option>
                    <option>Rafif#Karyawan</option>
                    <option>Fauzi#Karyawan</option>
                    <option>Lukman#Karyawan</option>										<option>Wahyu#Karyawan</option>
                    <option>Rino#Outsourcing</option>
                    <option>Fio#Outsourcing</option>
                    <option>Sonny#Outsourcing</option>
                    <option>Novan#Outsourcing</option>
                    <option>Faisal#Outsourcing</option>
                    <option>Bayu#Outsourcing</option>
                    <option>Ucup#Outsourcing</option>                                                 
                    </select>
                  </div>                         
                        
                       
                                             
                        <div class="form-group col-md-2">
                    <label for="rang">Modem</label>                
                    <select class="form-control" type="text" id="modem" name="modem" autocomplete="off">
                    <option>-</option>
                    <option>ZTE F609 versi 1</option>
                    <option>ZTE F609 versi 2</option>
                    <option>ZTE F609 versi 3</option>
                    <option>ZTE F663</option>
                    <option>HUAWEI H5</option>
                    <option>HUAWEI H5H</option>                                                                                                      
                    </select>
                  </div>
                        <div class="form-group col-md-2">
                    <label for="rang">Panjang Kabel 1</label>                
                    <select class="form-control" type="text" id="kabel1" name="kabel1" autocomplete="off">
                    <option>-</option>
                    <option>80 M</option>
                    <option>100 M</option>
                    <option>150 M</option>                    
                    </select>
                  </div>
                        <div class="form-group col-md-2">
                    <label for="rang">Panjang Kabel 2</label>                
                    <select class="form-control" type="text" id="kabel2" name="kabel2" autocomplete="off">
                    <option>-</option>
                    <option>80 M</option>
                    <option>100 M</option>
                    <option>150 M</option>                    
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="rang">Panjang Kabel 3</label>                
                    <select class="form-control" type="text" id="kabel3" name="kabel3" autocomplete="off">
                    <option>-</option>
                    <option>80 M</option>
                    <option>100 M</option>
                    <option>150 M</option>                    
                    </select>
                  </div>                               
              </div>
                <div class="form-row">
               <div class="form-group col-md-6">
                    <label for="rang">Status</label>                
                    <select class="form-control" type="text" id="status_wo" name="status_wo" autocomplete="off">
                    <option>Belum Terpasang</option>
                    <option>Sudah Terpasang</option>              
                                                                                     
                    </select>
                  </div>                     
                           
                        
                        </div>

                         <div class="form-group">
                            <button type="button" onclick="showPosition();">Show Position</button>
                                <span type="text" id="b" name="b" value="">   
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="action" id="action" value="insert">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success  pull-right submitdata"  name="submit" data-dismiss="modal" id="actionform">Tambah</button>
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
                    "url":"../models/datapengguna_omahwifi.php",
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
                    { mData: 'tgl_fal'},
                    { mData: 'nama_fal'},
                    { mData: 'alamat_fal'} ,
                    { mData: 'tlp_fal'} ,
                    { mData: 'paket_fal'} ,
                    { mData: 'tanggal_instalasi'} ,                   
                    { mData: 'username_fal'} ,
                    { mData: 'password_fal'} ,
                    { mData: 'lain_lain'} ,
                    { mData: 'jenis_wo'} ,
                    { mData: 'pic_ikr'} ,
                    { mData: 'status_wo'} ,
                    { mData: 'action'},                    
                ],
            });

             var table = $('#tabel_pengguna_ts').DataTable({
                "responsive": true,
                "processing": true,
                "language": {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
                }, 
                "ajax": {
                    "url":"../models/datapengguna_omahwifi.php",
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
            //alert("submit data"); return;
           

            var action= $("#action").val();
			//alert(action); return;
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
            //var username_Maintenance = $("#username_Maintenance").val();
            var password_fal = $("#password_fal").val();
            var lain_lain = $("#lain_lain").val();
            var status_wo = $("#status_wo").val();
            var ket_user = $("#lain_lain").val();
            var k = $("#b").text();

            //alert(karyawan);

            var value = { action:action, nama_fal:nama_fal, kd_layanan:kd_layanan, pic_ikr:pic_ikr,alamat_fal:alamat_fal, rt:rt,rw:rw,kelurahan:kelurahan,tlp_fal:tlp_fal, pic:pic , status:status, status2:status2, jenis_wo:jenis_wo,produk:produk,modem:modem,kabel1:kabel1,kabel2:kabel2,kabel3:kabel3,paket_fal:paket_fal, tgl_fal:tgl_fal, username_fal:username_fal, password_fal:password_fal, status_wo:status_wo,lain_lain:lain_lain, ket:k }; 

                $.ajax({
                    type: "POST",
					async: false,
                    url: "../controller/action_omahwifi.php",
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
                        $("#username_Maintenance").val(data.username_Maintenance);
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
<script> 
/* $(function() {
    $('#KI').hide();
	$('#KJ').hide();
	$('#KN').hide();
    $('#OLT').change(function(){
		var a = $('#OLT').val();
		//alert(a);
       if(a == 'KI'){
            $('#KI').show(); 
			$('#KJ').hide();
			$('#KN').hide();
        else{
			$('#KI').hide();
			$('#KJ').hide();
			$('#KN').hide();
		}
    });
});
 */
$('#OLT').change(function(){ 
 var a = $('#OLT').val();
//alert (a);
    $.ajax({
        url: "../create/create_kode_user_omahwifi.php",
        data: { "value": $("#OLT").val() },
        //dataType:"html",
        type: "post",
        success: function(data){
			//alert(data);
           $('#username_fal').val(data);
        }
    });
});
</script>
</body>

</html>