<!-- Tambahkan CSS Select2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<div class="modal fade" id="modal_solved_ikr"  role="dialog" tabindex="-1">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-user">Solved Data</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span></button>

                    

                </div>

                 <div class="modal-body">
					<form role="form" method="post" data-id="formdatapengguna">
						
					<div class="form-group">
							<label for="fname">Nama</label>
							<input class="form-control" type="text" id="nama_ikr" name="nama_ikr" placeholder="nama..." disabled>
					</div>
						
					<div class="form-group">
              <label for="rang">ID User</label>
              <div class="input-group">
                  <input class="form-control" type="text" id="kode_ikr" name="kode_ikr" placeholder="id..." autocomplete="off" disabled>
                  <div class="input-group-append">
                      <button type="button" class="btn btn-info detail_teknis" >Cek Detail</button>
                  </div>
              </div>
          </div>

          <div class="form-group">
              <label for="redaman">Redaman</label>
              <input class="form-control" type="text" id="redaman" name="redaman" readonly>
          </div>

          <div class="form-group">
              <label for="rssi">RSSI</label>
              <input class="form-control" type="text" id="rssi" name="rssi" readonly>
          </div>
					
					<div class="form-group">
                            <label for="lname">Perlakuan Khusus</label>
                            <input class="form-control" type="text" id="perlakuan_solved" name="perlakuan_solved" autocomplete="off" disabled>
                        </div>

					<div class="form-group">
                            <label for="lname">Total Bayar</label>
                            <input class="form-control" type="text" id="total_solved" name="total_solved" autocomplete="off" disabled>
                        </div>

					<div class="form-group">
                            <label for="lname">Type Paket</label>
                            <input class="form-control" type="text" id="type_paket_read" name="type_paket_read" autocomplete="off" disabled>
                        </div>
						
					<div class="form-group">
                   <label for="rang">Jenis Pembayaran</label>                
                    <select class="form-control" type="text" id="pembayaran_ikr_read" name="pembayaran_ikr_read" autocomplete="off" disabled>
                    <option></option>
                    <option value="pra">Bayar didepan</option>
                    <option value="pasca">Bayar dibelakang</option>                                                                           
                    </select>
                   </div>					

                    </br>
                    <h4>Isian Data Teknisi</h4>
                    </br>
				  
				<div class="form-group">
                   <label for="rang">Status</label>                
                    <select class="form-control" type="text" id="status_wo_ikr" name="status_wo_ikr" autocomplete="off">
                    <option></option>
                    <option value="Pending">Pending</option>
                    <option value="Rescedule">Rescedule</option>
                    <option value="Batal Pasang">Batal Pasang</option>
                    <option value="Masalah Perijinan">Masalah Perijinan</option>
                    <option value="Sudah Terpasang" >Sudah Terpasang</option>                                                                              
                    </select>
                   </div>
				   
				   <div id="resceduleid_ikr">
				   <div class="form-group">
							<label for="fname">Tanggal Rescedule</label>
							<input class="form-control" type="text" name="tanggalsign_wo" id="tanggalsign_wo" placeholder="YYYY-MM-DD HH:MM:SS">
					</div> 
				   </div>
				   
                   <div id="solved_ikr">
                        <div class="form-group">
                    <label for="fname">Teknisi</label>
							<input class="form-control" type="text" id="status" name="status" value="<?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE user='".$acces_user_log."' and kantor_cabang='".$kota."' and status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan in ('Karyawan','Outsourcing');");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo $data_user['nama_panggilan'].'#'.$data_user['status_karyawan'];
											  } 
											?>" readonly>  
                  </div>

					<div class="form-group">
                    <label for="rang">Teknisi Pendamping</label>                
                    <select class="form-control" type="text" id="status2" name="status2" autocomplete="off">
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
                        
                    <div class="form-group>
						  <label for="odp">Letak ODP</label> <br/>
						<select class="selectpicker" id="letak_odp" name="letak_odp" data-live-search="true" style='width: 350px;' required>
						  <option> <?php
											  include('controller/controller_mysqli.php');
                        if ($kota == 'pas' || $kota == 'pas1') {
											    $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_odp where kd_layanan in ('pas','pas1')");
                        }else{
                          $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_odp where kd_layanan = '".$kota."'");
                        } 
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												//echo '<option value"'.$data_user['nama_odp'].'">'.$data_user['nama_odp'].' </option>';
												echo '<option value="'.$data_user['id_odp'].'">'.$data_user['nama_odp'].'</option>';
											  } 
											?>   </option> 
						</select>
					</div>
                                             
                    <div class="form-group">
                    <label for="rang">Modem</label>                
                    <select class="form-control" type="text" id="modem" name="modem" autocomplete="off" required>
						<option>-</option>
						<option>V2 New Import</option>
						<option>XPON</option>
						<option>ZTE F609 versi 1</option>
						<option>ZTE F609 versi 2</option>
						<option>ZTE F609 versi 3</option>
						<option>ZTE F670</option>
						<option>ZTE F663</option>
						<option>HUAWEI H5</option>
						<option>HUAWEI H5H</option>                                                                                                      
                    </select>
                  </div>
				 
                        <div class="form-group">
                    <label for="rang">Panjang Kabel 1</label>                
                    <select class="form-control" type="text" id="kabel1" name="kabel1" autocomplete="off" required>
                    <option>-</option>
                    <option>80 M</option>
                    <option>100 M</option>
                    <option>150 M</option>                    
                    </select>
                  </div>
                        <div class="form-group">
                    <label for="rang">Panjang Kabel 2</label>                
                    <select class="form-control" type="text" id="kabel2" name="kabel2" autocomplete="off">
                    <option>-</option>
                    <option>80 M</option>
                    <option>100 M</option>
                    <option>150 M</option>                    
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="rang">Panjang Kabel 3</label>                
                    <select class="form-control" type="text" id="kabel3" name="kabel3" autocomplete="off">
                    <option>-</option>
                    <option>80 M</option>
                    <option>100 M</option>
                    <option>150 M</option>                    
                    </select>
                  </div> 
				
				 <div class="form-group">
                    <label for="rang">Jenis Pembayaran</label>                
                    <select class="form-control" type="text" id="pembayarane" name="pembayarane" autocomplete="off" required>
                    <option>-</option>
                    <option>Tunai</option>
                    <option>Transfer</option>				
                    </select>
                  </div>
				  
				<div class="form-group" id="stor">
                    <label for="rang">Setoran akan diserahkan ke admin unit mana ?</label>                
                    <select class="form-control" type="text" id="storan" name="storan" autocomplete="off" required>
                    <option value=""></option>					
					<option value="mlg">Naratel</option>				
					<option value="pas">SBM</option>	
					<option value="batu">Jalibar</option>				
					<option value="mlg1">Jalantra</option>					
                    </select>
          </div>				

          

           <div class="form-group">
                        <label for="foto_instalasi">Upload Speedtest</label>
                        <input type="file" class="form-control" id="foto_instalasi" accept="image/*">
                        <input type="hidden" name="foto_base64" id="foto_base64">
                        <div class="mt-2">
                            <img id="preview_img" src="" style="max-width: 200px; max-height: 200px; display: none;">
                        </div>
                    </div>
				  
				<!-- div class="form-group">
					<label for="rang">Input Number Perdana By.u</label>
					<select class="selectpicker" id="input_number" name="input_number" data-live-search="true" style='width: 450px;' required>
						<option> <?php
						  include('../controller/controller_mysqli.php');
						  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_upload_byu where status = 'n'");
						  //$data_user = mysqli_fetch_array($sql_user);
						  //print_r($data_user);
						 while ($data_user = mysqli_fetch_array($sql_user)) {
							echo '<option value"'.$data_user['number'].'">'.$data_user['number'].'</option>';
						  } 
								?>   
						</option> 
					</select>
				</div -->

				   
				    <input class="form-control" type="text" id="lokasi_ins" name="lokasi_ins" autocomplete="off" readonly> 
				</div>
              </div>
			  </br>
			  
			  <div class="modal-footer">
				 
              <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">
            <i class="fa fa-times fa-fw"></i>Cancel
        </button>

			  <button type="button" class="btn btn-success  pull-right save_solved_ikr">Save</button>
			  </div>
                    
                  </div>                     
             </div>
            </form>
    </div>