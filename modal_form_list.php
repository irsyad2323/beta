<div class="modal fade" id="modaledit_list"  role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-user">Edit Data</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span></button>

                    

                </div>

                 <div class="modal-body">
                    <form role="form" method="post" data-id="formdatapengguna">
					
					<!-- FORM ISIAN DATA ADMIN -->
					
                            <div class="form-row">
                                <label for="rang">Pekerjaan</label>                
									<select class="form-control" type="text" id="jenis_pekerjaan" name="jenis_pekerjaan" autocomplete="off" >
									<option></option>
									<option>jobdesk</option>
									<option>wo</option>									                   
									</select>
                            </div>
						<br/>
						
							<div class="form-row">
								<label for="rang">ID User</label>
								<input class="form-control" type="text" id="username_fal2" name="username_fal2" autocomplete="off" disabled>
							</div>
						<br/>
                            <div class="form-row">
                                <label for="fname">Nama</label>
                                <input class="form-control" type="text" id="nama_fal2" name="nama_fal2" placeholder="nama..." >
                            </div>
						<br/>				
					
                            <div class="form-row">
                                <label for="halaman">NO. Telepon</label>
                                <input class="form-control" type="number" id="tlp_fal2" name="tlp_fal2" placeholder="telepon.." autocomplete="off" >
                            </div>  
						<br/>
							
							<div class="form-row">
								<label for="rang">Password</label>
								<input class="form-control" type="text" id="password_fal2" name="password_fal2" placeholder="password" autocomplete="off" >
							</div>   
						<br/>
						
                            <div class="form-row">
                                <label for="rang">Paket</label>                
									<select class="form-control" type="text" id="paket_fal2" name="paket_fal2" autocomplete="off" >
									<option>-</option>
									<option>5</option>
									<option>10</option>
									<option>15</option>
									<option>20</option>
									<option>30</option>                     
									<option>60</option>                     
									</select>
                            </div>
						<br/>
						
                            <div class="form-row">
								<label for="lname">Alamat</label>
								<input class="form-control" type="text" id="alamat_fal2" name="alamat_fal2" placeholder="alamat..." autocomplete="off" >
							</div>
						<br/>
              		
							<div class="form-row">
								<label>Tanggal FAL</label>
								<input type="datetime-local" name="tgl_fal2" id="tgl_fal2" class="form-control" ="true" >
								<p class="text-danger" id="err_tanggal_masuk"></p>
							</div>
						<br/>

							<div class="form-row">
								<label for="rang">Keterangan</label>
								<input class="form-control" type="text" id="lain_lain2" name="lain_lain2" placeholder="keterangan" autocomplete="off">
							</div>
						<br/>                  
							
						<div class="form-row">
                                <label for="rang">Perlakuan Khusus</label>                
								 <select class='form-control' id="perlakuan2" name="perlakuan2" onclick='test()'>
									<option></option>
									<option value="Diskon Biaya Instalasi">Diskon Biaya Instalasi</option>
									<option value="Angsuran Biaya Instalasi">Angsuran Biaya Instalasi</option>						
									<option value="Free Biaya Instalasi & Free Biaya Bulanan">Free Biaya Instalasi & Free Biaya Bulanan</option>
									<option value="Pindah Alamat">Pindah Alamat</option>
									</select> &nbsp
                            </div> 
						<br/>
					
							<div class="form-row">
						
							</div>
							
						<div class="form-row">
							<label for="rang">Perlakuan Khusus</label> 
                            <input class="form-control" type="number" id="total_diskon2" name="total_diskon2" placeholder="total diskon" >
						</div>
					<br/>	
						
						<div class="form-row">
							<label for="rang">Free</label> 
							<select class="form-control" type="number" id="free2" name="free2" autocomplete="off">
							<option></option>
							<option>340000</option>
							<option>395000</option>
							<option>455000</option> 
							<option>545000</option> 					
							</select>
						</div>
					<br/>					
						<div class="form-row">
							<label for="rang">Angsuran Pertama</label> 
							<input class="form-control" type="number" id="keterangan_angsuran2" name="keterangan_angsuran2" >
						</div>
					<br/>
						<div class="form-row">
							<label for="rang">Pindah Alamat</label> 
							<input class="form-control" type="number" id="pindah_alamat2" name="pindah_alamat2">
                        </div>
					<br/>
			

                   				
						<hr>
                            <button type="button" class="btn btn-success  pull-right actioneditkapten">edit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            
                        </form>

					
					<!-- END ISIAN DATA ADMIN -->
						
					
                      </div>
					  
            </div>

        </div>

    </div>
	
	<div class="modal fade" id="modal_perijinan"  role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-user">Kendala</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span></button>

                    

                </div>

                 <div class="modal-body">
                    <form role="form" method="post" data-id="formdatapengguna">
					
					<!-- FORM ISIAN DATA ADMIN -->
					
					<?php 
                        if ($_SESSION["level_user"] != "ikr"){
                       ?>
						<input class="form-control" type="hidden" id="key_fal" name="key_fal" autocomplete="off">
						<div class="form-row">
								<label for="rang">Keterangan</label>
								<input class="form-control" type="text" id="lain_lain_perijinan" name="lain_lain_perijinan" placeholder="keterangan" autocomplete="off">
							</div>
						<br/>  

						<div class="form-row">
                                <label for="rang">PIC</label>                
									<select class="form-control" type="text" id="pic_kendala" name="pic_kendala" autocomplete="off" >
									<option></option>
									<option value="ivan_permit">ivan_permit</option>                   
									<option value="yani">Bu Yani Sales</option>                   
									</select>
                            </div>
						<br/> 

						<div class="form-row">
                                <label for="rang">Status Pelanggan</label>                
									<select class="form-control" type="text" id="status_wo" name="status_wo" autocomplete="off" >
									<option></option>
									<option value="Masalah Perijinan">Masalah Perijinan</option>                   
									<option value="Pending">Pending</option>                   
									</select>
                            </div>
						<br/>
						
						<div class="form-row">
								<select class="form-control" type="text" name="pending" id="pending" autocomplete="off" >
									<option>Kategori Pending</option>
									<option value="uang">Uang</option>                   
									<option value="unscedule_panding">Unscedule Pending</option>                   
									</select>
							</div>
						<br/>  
                                                 
                   				
						<hr>
                            <button type="button" class="btn btn-success  pull-right actionperijinan">Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            
                        </form>

							<?php
						}
					?>
					
					<!-- END ISIAN DATA ADMIN -->
						
					
                      </div>
					  
            </div>

        </div>

    </div>
	
		<div class="modal fade" id="modalrespro"  role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-user">Rescedule</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span></button>

                    

                </div>

                 <div class="modal-body">
                    <form role="form" method="post" data-id="formdatapengguna">
					
					<!-- FORM ISIAN DATA ADMIN -->
					
					<?php 
                        if ($_SESSION["level_user"] != "ikr"){
                       ?>
							<input class="form-control" type="text" id="pic_ikr_res" name="pic_ikr_res" autocomplete="off" readonly>
							<input class="form-control" type="text" id="jenis_pekerjaan_res" name="jenis_pekerjaan_res" autocomplete="off" readonly>
							<input class="form-control" type="text" id="id_mntn_get" name="id_mntn_get" autocomplete="off" readonly>
							<div class="form-row">
								<label for="rang">ID User</label>
								<input class="form-control" type="text" id="username_rescedule" name="username_rescedule" autocomplete="off" readonly>
							</div>
						<br/>
						<div class="form-row">
								<label>Tanggal FAL</label>
								<input type="text" name="tgl_res_pros" id="tgl_res_pros" class="form-control" placeholder="YYYY-MM-DD HH:MM:SS">
							</div>
						<br/>
							<div class="form-row">
								<label for="rang">Keterangan</label>
								<input class="form-control" type="text" id="keterangan_res" name="keterangan_res" autocomplete="off">
							</div>
						<br/>
                   				
						<hr>
                            <button type="button" class="btn btn-success  pull-right actionrespro">edit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            
                        </form>

							<?php
						}
					?>
					
					<!-- END ISIAN DATA ADMIN -->
						
					
                      </div>
					  
            </div>

        </div>

    </div>
	
	<div class="modal fade" id="modalswitch"  role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-user">Switch PIC</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                 <div class="modal-body">
                    <form role="form" method="post" data-id="formdatapengguna">					
					<!-- FORM ISIAN DATA ADMIN -->					
					<?php 
                        if ($_SESSION["level_user"] != "ikr"){
                       ?>						
							<div class="form-row">
								<label for="rang">ID User</label>
								<input class="form-control" type="text" id="username_s" name="username_s" autocomplete="off" disabled>
							</div>
						<br/>
							<input class="form-control" type="text" id="pic_ikrswitch" name="pic_ikrswitch" autocomplete="off" disabled>
							<input class="form-control" type="text" id="jenis_wo" name="jenis_wo" autocomplete="off" disabled>
							<input class="form-control" type="text" id="key_fal_sitch_pic" name="key_fal_sitch_pic" autocomplete="off">
                            <div class="form-row">
                                <label for="rang">Pic IKR</label>                
									<select class="form-control" type="text" id="pic_ikrs" name="pic_ikrs" autocomplete="off" >
									<option value="-">-</option>
									<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan='Karyawan'");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value="'.$data_user['user'].'">'.$data_user['nama_panggilan'].'</option>';
											  } 
											?>   </option> 
					<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan='Outsourcing'");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value="'.$data_user['user'].'">'.$data_user['nama_panggilan'].'</option>';
											  } 
											?>   </option>  
									</select>
                            </div> 
						<div class="form-row">
								<label>Tanggal FALl</label>
								<input class="form-control" type="text" name="tgl_fal_switch" id="tgl_fal_switch" placeholder="YYYY-MM-DD HH:MM:SS">
							</div>
						<br/>
						<br/>
                   				
						<hr>
                            <button type="button" class="btn btn-success  pull-right actionswitch">edit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            
                        </form>

							<?php
						}
					?>				
					<!-- END ISIAN DATA ADMIN -->
                      </div>  
            </div>
        </div>
    </div>
	