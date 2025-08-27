<div class="modal fade" id="modaltambahdata"  role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-user">Tambah Data</h4>

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
                                <label for="rang">OLT</label>                
                     <select class='form-control' id="OLT" name="OLT" >
					    <option></option>				
						<option value="KT">OLT JONI</option>
						<option value="KI">OLT IMA</option>
						<option value="KN">OLT KANTOR</option>						
						<option value="KP">OLT PASURUAN</option>
						<option value="JT">OLT JALANTRA</option>						
						<option value="KD">OLT BATU</option>
						<option value="EDKM">Edubiz Pasuruan</option>
						<option value="EDKN">Edubiz Kantor</option>
						<option value="EDKJ">Edubiz Joni</option>
						<option value="EDKI">Edubiz Ima</option>
						<option value="EDKD">Edubiz Batu</option>						
						<option value="EDJT">Edubiz Jalantra</option>
						</select> &nbsp
                            </div> 
						<br/>
						
							<div class="form-row">
								<label for="rang">ID User</label>
								<input class="form-control" type="text" id="username_fal" name="username_fal" autocomplete="off"  >
							</div>
						<br/>
                            <div class="form-row">
                                <label for="fname">Nama</label>
                                <input class="form-control" type="text" id="nama_fal" name="nama_fal" placeholder="nama..." >
                            </div>
						<br/>				
					
                            <div class="form-row">
                                <label for="halaman">NO. Telepon</label>
                                <input class="form-control" type="number" id="no_wa" name="no_wa" placeholder="telepon.." autocomplete="off" >
                            </div>  
						<br/>
							
							<div class="form-row">
								<label for="rang">Password</label>
								<input class="form-control" type="text" id="password_fal" name="password_fal" placeholder="password" autocomplete="off" >
							</div>   
						<br/>
							
                            <div class="form-row">
                                <label for="rang">Paket</label>                
									<select class="form-control" type="text" id="paket_fal" name="paket_fal" autocomplete="off" readonly>
									<option>-</option>
									<option>5</option>
									<option>10</option>
									<option>15</option>
									<option>20</option>
									<option>30</option> 
									<option>50</option>                     
									<option>60</option>                     
									<option>100</option>									
									<option>Edubiz-5-100</option>                    
									<option>Edubiz-10-100</option>                    
									<option>Edubiz-15-100</option>                    
									<option>Edubiz-20-100</option>                    
									<option>Edubiz-Halfday-100</option> 								
									</select>
                            </div>
						<br/>
						
                            <div class="form-row">
                                <label for="rang">kantor Cabang</label>                
								<select class="form-control" type="text" id="kd_layanan" name="kd_layanan" autocomplete="off" required>								
								<option></option>					
								<option value='mlg'>mlg</option>					
								<option value='pas'>pas</option>
								<option value='mlg1'>batu</option>
								<option value='mlg1'>Jalantra</option>
								</select>
                            </div> 
						<br/>
						
                            
                                                 
                            <div class="form-row">
								<label for="lname">Alamat</label>
								<input class="form-control" type="text" id="alamat_fal" name="alamat" placeholder="alamat..." autocomplete="off" >
							</div>
						<br/>
							
							<div class="form-row">
                               <input class="form-control" type="hidden" id="key_fal" name="key_fal" placeholder="rt..." autocomplete="off" >
                               <input class="form-control" type="hidden" id="rt" name="rt" placeholder="rt..." autocomplete="off" >
                               <input class="form-control" type="hidden" id="rw" name="rw" placeholder="rw..." autocomplete="off" >
                               <input class="form-control" type="hidden" id="kelurahan" name="kelurahan" placeholder="kelurahan..." autocomplete="off" >
                               <input class="form-control" type="hidden" id="kecamatan" name="kecamatan" placeholder="kelurahan..." autocomplete="off" >
                               <input class="form-control" type="hidden" id="kabupaten" name="kabupaten" placeholder="kelurahan..." autocomplete="off" >              
                               <input class="form-control" type="hidden" id="provinsi" name="provinsi" placeholder="kelurahan..." autocomplete="off" >                            
                               <input class="form-control" type="hidden" id="lokasi" name="lokasi" placeholder="kelurahan..." autocomplete="off" >                          
                               <input class="form-control" type="hidden" id="foto_rumah" name="foto_rumah" placeholder="kelurahan..." autocomplete="off" >                             
                               <input class="form-control" type="hidden" id="status_lokasi" name="status_lokasi" placeholder="kelurahan..." autocomplete="off" >                          
                               <input class="form-control" type="hidden" id="tahu_layanan" name="tahu_layanan" placeholder="kelurahan..." autocomplete="off" >                       
                               <input class="form-control" type="hidden" id="alasan" name="alasan" placeholder="kelurahan..." autocomplete="off" >                            
                               <input class="form-control" type="hidden" id="foto_ktp" name="foto_ktp" placeholder="kelurahan..." autocomplete="off" >                              
                               <input class="form-control" type="hidden" id="no_wa2" name="no_wa2" placeholder="kelurahan..." autocomplete="off" >                  
                               <input class="form-control" type="hidden" id="no_wa3" name="no_wa3" placeholder="kelurahan..." autocomplete="off" >                              
                               <input class="form-control" type="hidden" id="no_wa4" name="no_wa4" placeholder="kelurahan..." autocomplete="off" >                         
                               <input class="form-control" type="hidden" id="nama_sobat" name="nama_sobat" placeholder="kelurahan..." autocomplete="off" >                         
                               <input class="form-control" type="hidden" id="metode_pembayaran" name="metode_pembayaran" placeholder="kelurahan..." autocomplete="off" >                              
                               <input class="form-control" type="hidden" id="no_rekening" name="no_rekening" placeholder="kelurahan..." autocomplete="off" >                             
                               <input class="form-control" type="hidden" id="tgl_fal" name="tgl_fal">
                               <input class="form-control" type="hidden" id="tgl_fal_datetime_ikr" name="tgl_fal_datetime_ikr">
                               <input class="form-control" type="hidden" id="mgm" name="mgm">
                               <input class="form-control" type="hidden" id="layanan" name="layanan">
                            </div>

							<div class="form-row">
								<label for="rang">Keterangan</label>
								<input class="form-control" type="text" id="lain_lain" name="lain_lain" placeholder="keterangan" autocomplete="off">
							</div>
						<br/>
						
						<div class="form-row">
                                <label for="rang">Perlakuan Khusus</label>                
								 <select class='form-control' id="perlakuan" name="perlakuan" onclick='test()'>
									<option></option>
									<option value="Diskon Biaya Instalasi">Diskon Biaya Instalasi</option>
									<option value="Angsuran Biaya Instalasi">Angsuran Biaya Instalasi</option>						
									<option value="Free Biaya Instalasi & Free Biaya Bulanan">Free Biaya Instalasi & Free Biaya Bulanan</option>
									<option value="Pindah Alamat">Pindah Alamat</option>
									<option value="Pindah Alamat">Promo 17 Agustus</option>
									</select> &nbsp
                            </div> 
						<br/>
					
							<div class="form-row">
						
							</div>
							
						<div class="form-row">
							<label for="rang"></label> 
                            <input class="form-control" type="number" id="total_diskon" name="total_diskon" placeholder="total diskon" style="display: none" >
							
							<select class="form-control" type="number" id="free" name="free" autocomplete="off" style="display: none" >
							<option></option>
							<option>340000</option>
							<option>395000</option>
							<option>455000</option> 
							<option>545000</option> 					
							</select>

							<input class="form-control" type="number" id="keterangan_angsuran" name="keterangan_angsuran" placeholder="angsuran pertama" style="display: none" >
							<input class="form-control" type="number" id="pindah_alamat" name="pindah_alamat" placeholder="tarif pindah alamat" style="display: none" >
                        </div>
					<br/>
						<hr>
                            <button type="button" class="btn btn-success  pull-right action_post_ikr">Insert</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            
                        </form>

							<?php
						}
					?>
					
					<!-- END ISIAN DATA ADMIN -->
						
					
                      </div>
					  
            </div>

        </div>

    </div>