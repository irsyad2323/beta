<div class="modal fade" id="modaltambahdatamntodp"  role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-user">Tambah Data</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span></button>

                    

                </div>

                 <div class="modal-body">
                    <form role="form" method="post" id="formdatapengguna">
					
					<!-- FORM ISIAN DATA ADMIN -->
					
					<?php 
                        if ($_SESSION["level_user"] != "ikr"){
                       ?>
						
							<div class="form-row">
								<label for="rang">Nama ODP</label>                
								<select class='js-example-basic-multiple' id="kode_odp" name="kode_odp" multiple="multiple" style='width: 250px;' >
					     <option> <?php
											  include('controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_odp where kd_layanan='".$kota."'");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value="'.$data_user['id_odp'].'">'.$data_user['nama_odp'].' </option>';
											  } 
											?>   </option>				
						
						</select> &nbsp
							</div>
						<br/>
						
						<div class="form-row">
                                <label for="rang">Pekerjaan</label>                
									<select class="form-control" type="text" id="jenis_pekerjaan_mntnodp" name="jenis_pekerjaan_mntnodp" autocomplete="off" >
									<option></option>
									<option>jobdesk</option>
									<option>wo</option>									                   
									</select>
                            </div> 
						<br/>
						
                            <div class="form-row">
                                <label for="rang">kantor Cabang</label>                
								<select class="form-control" type="text" id="kd_layanan_mntodp" name="kd_layanan_mntodp" autocomplete="off" required>
								<option value=""></option>					
								<option value="mlg">Naratel</option>					
								<option value="mlg1">Jalantra</option>	
								<option value="batu">Batu</option>				
								<option value="pas">SBM</option>
								</select>
                            </div> 
						<br/>

							<div class="form-row">
								<label for="rang">Keterangan</label>
								<input class="form-control" type="text" id="lain_lain_mntnodp" name="lain_lain_mntnodp" autocomplete="off">
							</div>
						<br/>
                            <div class="form-row">
                                <label for="fname">Nama</label>
                                <input class="form-control" type="text" id="nama_mntodp" name="nama_fal" placeholder="nama..." readonly>
                            </div>
						<br/>	
							
							<div class="form-row">
								<label for="fname">ID odp</label>
                                <input class="form-control" type="text" id="id_mntnodp" name="id_mntnodp" readonly>
							</div>   
						<br/>
                                                 
                            <div class="form-row">
								<label for="lname">Alamat</label>
								<input class="form-control" type="text" id="alamat_mntodp" name="alamat_mntodp" readonly>
							</div>
						<br/>
							
                            <div class="form-row">
                                <label for="rang">Kelurahan</label>
                               <input class="form-control" type="text" id="kelurahan_mntodp" name="kelurahan_mntodp" readonly>
                            </div>
						<br/>
							
      				
						<div class="modal-footer">
                            <button type="button" class="btn btn-success  pull-right actionmntn_odp">Insert</button>
                            <button type="reset" class="btn btn-danger pull-right"><i class="fa fa-times fa-fw"></i>Reset</button>
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
	
	<div class="modal fade" id="modal_backbone"  role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-user">Tambah Data</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span></button>

                    

                </div>

                 <div class="modal-body">
                    <form role="form" method="post" id="formdatapengguna">
					
					<!-- FORM ISIAN DATA ADMIN -->
					
					<?php 
                        if ($_SESSION["level_user"] != "ikr"){
                       ?>
                            <div class="form-row">
                                <label for="rang">kantor Cabang</label>                
								<select class="form-control" type="text" id="kd_layanan_mntbckbn" name="kd_layanan_mntbckbn" autocomplete="off" required>
								<option value=""></option>					
								<option value="mlg">Naratel</option>					
								<option value="mlg1">Jalantra</option>	
								<option value="batu">Batu</option>				
								<option value="pas">SBM</option>
								</select>
                            </div> 
						<br/>

							
                            <div class="form-row">
                                <label for="fname">Nama Pekerjaan</label>
                                <input class="form-control" type="text" id="nama_mntbcbon" name="nama_mntbcbon" placeholder="nama..." >
                            </div>
						<br/>	
                                                 
                            <div class="form-row">
								<label for="lname">Alamat</label>
								<input class="form-control" type="text" id="alamat_mntbckbn" name="alamat_mntbckbn" >
							</div>
						<br/>
							
                            <div class="form-row">
                                <label for="rang">Kelurahan</label>
                               <input class="form-control" type="text" id="kelurahan_mntbckbn" name="kelurahan_mntbckbn" >
                            </div>
						<br/>
						
						<div class="form-row">
								<label for="rang">Keterangan</label>
								<input class="form-control" type="text" id="lain_lain_mntnbckbn" name="lain_lain_mntnbckbn" autocomplete="off">
							</div>
						<br/>
							
      				
						<div class="modal-footer">
                            <button type="button" class="btn btn-success  pull-right actionmntn_bckbn">Insert</button>
                            <button type="reset" class="btn btn-danger pull-right"><i class="fa fa-times fa-fw"></i>Reset</button>
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
	
	<div class="modal fade" id="modaltambahinsodp"  role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-user">Tambah Data</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span></button>

                    

                </div>

                 <div class="modal-body">
                    <form role="form" method="post" id="formdatapengguna">
					
					<!-- FORM ISIAN DATA ADMIN -->
					
					<?php 
                        if ($_SESSION["level_user"] != "ikr"){
                       ?>
						
						
							<div class="form-row">
								<label for="rang">Kode ODP</label>                
								<select class="form-control" id="odp" name="odp" >
									<option></option>
									<option value="MLG">ODP Malang</option>
									<option value="JAL">ODP Jalantra</option>
									<option value="PAS">ODP Pasuruan</option>
									<option value="BTU">ODP Batu</option>												
									
								</select> 
							</div>
						<br/>
							<!-- div class="form-group>
						  <label for="odp">Kelurahan</label> <br/>
						<select class="selectpicker" id="daerahe" name="daerahe" data-live-search="true" style='width: 350px;' required>
						  <option> <?php 
							include('koneksi.php');
							$sql_user = mysqli_query($koneksi, "SELECT a.kd_kel, a.kd_kec, a.kd_kabkota, b.nama_provinsi, c.nama_kabkota, d.nama_kec, a.nama_kel 
																FROM tb_kelurahan a
																LEFT JOIN tb_provinsi b ON a.kd_prov = b.kd_provinsi
																LEFT JOIN tb_kabkota c ON a.kd_kabkota = c.kd_kabkota
																LEFT JOIN tb_kecamatan d ON a.kd_kec = d.kd_kec
																WHERE a.status='y'");
							while ($data_user = mysqli_fetch_array($sql_user)) {
								echo '<option value="'.$data_user['kd_kel'].'|'.$data_user['kd_kec'].'|'.$data_user['kd_kabkota'].'">'.
										$data_user['nama_kel'].', '.$data_user['nama_kec'].', '.$data_user['nama_kabkota'].', '.$data_user['nama_provinsi'].
									 '</option>';
							}
							?>   </option> 
												</select>
											</div -->
						
                            <div class="form-row">
                                <label for="rang">ID ODP</label>
                            <input class="form-control" type="text" id="id_odp" name="id_odp" autocomplete="off"  disabled>
                            </div>
						<br/>												
					
                            <div class="form-row">
                                <label for="rang">Keterangan</label>
								<input class="form-control" type="text" id="lain_lain_odp" name="lain_lain_odp" placeholder="keterangan" autocomplete="off">
                            </div>  
						<br/>
      				
						<div class="modal-footer">
                            <button type="reset" class="btn btn-danger pull-right"><i class="fa fa-times fa-fw"></i>Reset</button>
							<button type="button" class="btn btn-success  pull-right action_ins_odp">Insert</button>
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
	
	<div class="modal fade" id="modalgamas"  role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-user">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    
                </div>
                <div class="modal-body">
                    <form role="form" method="post" id="formdatapengguna">
					
					<!-- FORM ISIAN DATA ADMIN -->
						 
				<div class="form-row">				  
                     <label for="rang">Kategori Maintenance</label>                
						<select class='form-control' id="kategori_gamas" name="kategori_gamas" required>
					    <option></option>
						<option value="Gangguan_ODP">Gangguan_ODP</option>
						<option value="Gangguan_OLT">Gangguan_OLT</option>
						<option value="Gangguan Server">Gangguan Server</option>
						<option value="Gangguan UPSTREAM">Gangguan UPSTREAM</option>						
						</select>
                   </div> <br/>
					
					<!-- div class="form-group col-md-2">
					 <label for="rang">Kategori MAINTENANCE</label>
						<select class='form-control' id="kategori_maintenance" name="kategori_maintenance">							
							<option>Gangguan_ODP</option>
                    <option>Gangguan_PortOLT</option>
					<option>Gangguan_OLT</option>
					<option>Gangguan Server</option>
					<option>Gangguan Server</option>   
						</select>
					</div -->
					<div id="odp_select">
					<div class="form-row">
						<label for="odp"></label><br/>
						<select class="js-example-basic-multiple" id="odp_pilih" name="odp_pilih" multiple="multiple" style='width: 350px;'>
						  <option> <?php
											  include('controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_odp where kd_layanan='".$kota."'");
											  
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												//echo '<option value"'.$data_user['nama_odp'].'">'.$data_user['nama_odp'].' </option>';
												echo '<option value="'.$data_user['id_odp'].'">'.$data_user['nama_odp'].'</option>';
											  } 
											?>   </option> 
						</select>
					</div>
					</div>
					
					<div class="form-row">
					 <label for="gangguan_olt"></label>
						<select class='form-control' id="gangguan_olt" name="gangguan_olt" style='width: 350px;'>							
							<option>-</option>
							<option>OLT IMA</option>
							<option>OLT JONI</option>
							<option>OLT KANTOR</option>
							<option>OLT PASURUAN</option>
							<option>OLT ALL KAPTEN</option>
						</select>
					</div>
					
					<div class="form-row">
					 <label></label>
										
						<input class="form-control" type="text" id="gangguan_server" name="gangguan_server"  autocomplete="off" style='width: 350px;'>
						<input class="form-control" type="text" id="gangguan_upstream" name="gangguan_upstream" autocomplete="off" style='width: 350px;'>
					</div><br/>
                                                   
                       <div class="form-row">
                                <label for="rang">Layanan</label>                
                    <select class="form-control" type="text" id="kd_gamas" name="kd_gamas" autocomplete="off" required>
					        <option><?php echo $kota ?></option>                                     
                    </select>
                            </div><br/>
						
                        <div class="form-row">
                            <label for="lname">Nama</label>
                            <input class="form-control" type="text" id="nama_gamas" name="nama_gamas" placeholder="Nama..." autocomplete="off" required>
                        </div> <br/>
						
						<div class="form-row">
                            <label for="lname">Alamat</label>
                            <input class="form-control" type="text" id="alamat_gamas" name="alamat_gamas" placeholder="alamat..." autocomplete="off" required>
                        </div> <br/>

						<div class="form-row">
                            <label for="lname">Kelurahan</label>
                            <input class="form-control" type="text" id="kelurahan_gamas" name="kelurahan_gamas" placeholder="Kelurahan..." autocomplete="off" required>
                        </div>  <br/>
                            
                            <!-- div class="form-group col-md-2">
                                <label for="rang">kantor Cabang</label>                
                    <select class="form-control" type="text" id="kd_layanan" name="kd_layanan" autocomplete="off" required>
					<option></option>
                    <option>mlg</option>
                    <option>pas</option>                                   
                    </select>
                            </div --> 

                                      
                      <div class="form-row">
                            <label for="rang">Keterangan Gangguan</label>
                            <input class="form-control" type="text" id="keluhan_gamas" name="keluhan_gamas" placeholder="keterangan" autocomplete="off">
                        </div><br/>

                        

                   
              			
						<div class="modal-footer">
                            <button type="button" class="btn btn-success  pull-right save_gamas">Insert</button>
                            <button type="reset" class="btn btn-danger pull-right"><i class="fa fa-times fa-fw"></i>Reset</button>
                        </div>   
                        </form> 
				</div>
					</div>
            </div>
        </div>
    </div>	
    </div>	
	
	