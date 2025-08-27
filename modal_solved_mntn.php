<div class="modal fade" id="modalmntn"  role="dialog" tabindex="-1">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-user">Tambah Data</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span></button>

                    

                </div>

                 <div class="modal-body">
					<form role="form" method="post" data-id="formdatapengguna">
						
					<div class="form-group">
                     <input class="form-control" type="hidden" id="key_falr" name="key_falr">
                     <input class="form-control" type="hidden" id="kd_layanan" name="kd_layanan">
                     <input class="form-control" type="hidden" id="id_fdbackr" name="id_fdbackr">
                     <input class="form-control" type="hidden" id="nama_fal_mntn" name="nama_fal_mntn">
                     <input class="form-control" type="hidden" id="username_fal_mntn" name="username_fal_mntn">
                    </div>
					

                    </br>
                    <h4>Isian Data Teknisi</h4>
                    </br>
					
				<div class="form-group">
                   <label for="rang">Status</label>                
                    <select class="form-control" type="text" id="status_womntn" name="status_womntn" autocomplete="off">
                    <option></option>
                    <option value="Pending">Pending</option>
                    <option value="Rescedule">Rescedule</option>
                    <option value="Sudah Terpasang" >Sudah Terpasang</option>   
                    </select>
                   </div>
				   
				   <div id="resceduleid_mntn">
				   <div class="form-group">
							<label for="fname">Tanggal Rescedule</label>
							<input class="form-control" type="text" name="tanggalsign_mntn" id="tanggalsign_mntn" placeholder="YYYY-MM-DD HH:MM:SS">
					</div> 
				   </div>
				   
                   <div id="solved_mntn">
                        <div class="form-group">
                    <label for="rang" >Teknisi</label>  
					<input class="form-control" type="text" id="status_mntn" name="status_mntn" value="<?php
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
                    <label for="rang">Teknisi 2</label>                
                    <select class="form-control" type="text" id="status2_mntn" name="status2_mntn" autocomplete="off">
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
                        
                    <div class="form-group">
                    <label for="rang">Kategori Maintenance</label>                
                     <select class='form-control' id="kategori_maintenance" name="kategori_maintenance" required>
					    <option></option>
						<option value="Ganti Modem">Ganti Modem</option>
						<option value="Setting Modem">Setting Modem</option>
						<option value="Tarik Kabel">Tarik Kabel</option>
						<option value="Splicing">FO Cut / Splicing</option>						
						</select> &nbsp
                            </div> 
					<div id="modem_id">
					<div class="form-group" autocomplete="off">
					  <label for="modem">Modem</label>
					  <select class="form-control" id="modem_mntn" name="modem_mntn">
							<option>-</option>
							<option>V2 New Import</option>
							<option>XPON</option>
							<option>ZTE F609 versi 1</option>
							<option>ZTE F609 versi 2</option>
							<option>ZTE F609 versi 3</option>
							<option>ZTE F663</option>
							<option>HUAWEI H5</option>
							<option>HUAWEI H5H</option>  
						</select>
					</div>
					</div>
					
					<div id="kabel_id">
					<div class="form-group" autocomplete="off">
					 <label for="kabel1_mntn">Kabel</label>
						<select class='form-control' id="kabel1_mntn" name="kabel1_mntn">							
							<option>-</option>
							<option>80 M</option>
							<option>100 M</option>
							<option>150 M</option>							
						</select>
					</div>
					
					<div class="form-group" autocomplete="off">
					 <label for="kabel2_mntn">Kabel 2</label>
						<select class='form-control' id="kabel2_mntn" name="kabel2_mntn">							
							<option>-</option>
							<option>80 M</option>
							<option>100 M</option>
							<option>150 M</option>							
						</select>
					</div>
					
					<div class="form-group" autocomplete="off">
					 <label for="kabel3_mntn">Kabel 3</label>
						<select class='form-control' id="kabel3_mntn" name="kabel3_mntn">							
							<option>-</option>
							<option>80 M</option>
							<option>100 M</option>
							<option>150 M</option>							
						</select>
					</div>
					</div>
				   
				    <input class="form-control" type="text" id="lokasi_kapten_mt" name="lokasi_kapten_mt" autocomplete="off" readonly> 
				</div>
				
				  
				<div class="form-group">
                            <label for="rang">Keterangan</label>
                            <input class="form-control" type="text" id="lain_lain_mntn" name="lain_lain_mntn" placeholder="keterangan" autocomplete="off">
                        </div>
              </div>
			  </br>
			  
			  <div class="modal-footer">
				 
              <button type="reset" class="btn btn-danger pull-right"><i class="fa fa-times fa-fw"></i>Reset</button>
			  <button type="button" class="btn btn-success  pull-right save_solved_mntn">Save</button>
			  </div>
                    
                  </div>                     
             </div>
            </form>
    </div>