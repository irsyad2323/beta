
	
	
	<div class="modal fade" id="modalodp"  role="dialog" tabindex="-1">

        <div class="modal-dialog modal-xl" role="document">

            <div class="modal-content">


                 <div class="modal-body">
                    <form role="form" method="post" id="form_edit_sinden">
					
                   
                    <div class="form-row">
                            <input class="form-control" type="text" id="key_odp" name="key_odp" autocomplete="off"  disabled>
                       
						
					<div class="form-group col-md-2">
                            <label for="rang">ID ODP</label>
                            <input class="form-control" type="text" id="id_odp" name="id_odp" autocomplete="off"  disabled>
                        </div>
						
					<div class="form-group col-md-2">
                            <label for="rang">Nama User</label>
                            <input class="form-control" type="text" id="nama_odp" name="nama_odp" autocomplete="off"  disabled>
                        </div>
						
				  <div class="form-group">
                    <label for="rang" >Teknisi</label>  
					<input class="form-control" type="text" id="pic_ins_odp" name="pic_ins_odp" value="<?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE user='".$acces_user_log."' and kantor_cabang='".$kota."' and status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan='Karyawan';");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo $data_user['nama_panggilan'].'#'.$data_user['status_karyawan'];
											  } 
											?>" readonly>  
                  </div>

                         <div class="form-group col-md-2">
                    <label for="rang">Teknisi 2</label>                
                    <select class="form-control" type="text" id="pic_ins_odp2" name="pic_ins_odp2" autocomplete="off">
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
                        
                       
					<div class="form-group col-md-4">
                    <label for="rang">Spliter 1</label>                
                    <select class="form-control" type="text" id="spltr" name="spltr" autocomplete="off">
                    <option>-</option>
                    <option>1/4</option>
                    <option>1/8</option>
                    <option>1/16</option>                    
                    </select>
                  </div>
                        <div class="form-group col-md-4">
                    <label for="rang">Spliter 2</label>                
                    <select class="form-control" type="text" id="spltr2" name="spltr2" autocomplete="off">
                    <option>-</option>
                    <option>1/4</option>
                    <option>1/8</option>
                    <option>1/16</option>                    
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="rang">Spliter 3</label>                
                    <select class="form-control" type="text" id="spltr3" name="spltr3" autocomplete="off">
                    <option>-</option>
                    <option>1/4</option>
                    <option>1/8</option>
                    <option>1/16</option>                    
                    </select>
                  </div> 
					
                       <div class="form-group col-md-2">
                    <label for="lname">Panjang Kabel</label>
                    <input class="form-control" type="number" id="kabel_ins_odp" name="kabel_ins_odp" autocomplete="off" required>                    
						</div>
						
					<div class="form-group col-md-6">
                            <label for="rang">Keterangan</label>
                            <input class="form-control" type="text" id="lain_lainodp" name="lain_lainodp" placeholder="keterangan" autocomplete="off">
                        </div>  
				<input class="form-control" type="hidden" id="lokasi_kapten_mntn_odp" name="lokasi_kapten_mntn_odp" autocomplete="off" readonly> 				
             
              </div>
			 
                <div class="form-row">
               <div class="form-group col-md-6">
                    <label for="rang">Status</label>                
                    <select class="form-control" type="text" id="status_odp" name="status_odp" autocomplete="off">
                    <option>Belum Terpasang</option>
                    <option>Sudah Terpasang</option>                                                  
                    </select>
                  </div>                     
                           
                        
                        </div>
				
						<hr>
                            <button type="button" class="btn btn-success  pull-right saveupdate_odp">Update</button>
                            <button type="reset" class="btn btn-danger pull-right"><i class="fa fa-times fa-fw"></i>Reset</button>
                            
                        </form>
			
					<!-- END ISIAN DATA ADMIN -->
						
		
                      </div>
					  					  
            </div>

        </div>

    </div>