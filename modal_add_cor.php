
	<div class="modal fade" id="modaltambahinscor"  role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

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
								<label for="rang">ID USER</label>   
								<select class='js-example-basic-multiple' id="id_user_cor" name="id_user_cor" multiple="multiple" style='width: 350px;'>								
								 </select>
							</div><br/>
							
						<div class="form-row">
                                <label for="fname">Nama Distribusi</label>
                                <input class="form-control" type="text" id="nama_cor" name="nama_cor" placeholder="nama..." autocomplete="off" required>
                            </div>
						<br/>	
                            <div class="form-row">
                                <label for="lname">Alamat</label>
                            <input class="form-control" type="text" id="alamat_cor" name="alamat_cor" placeholder="alamat..." autocomplete="off" required>
                            </div>
						<br/>				
					
                            <div class="form-row">
                                <label for="rang">Keterangan</label>
								<input class="form-control" type="text" id="lain_lain_cor" name="lain_lain_cor" placeholder="keterangan" autocomplete="off">
                            </div>  
						<br/>
      				
						<hr>
                            <button type="button" class="btn btn-success  pull-right action_ins_cor">Insert</button>
                            <button type="reset" class="btn btn-danger pull-right"><i class="fa fa-times fa-fw"></i>Reset</button>
                            
                        </form>

							<?php
						}
					?>
					
					<!-- END ISIAN DATA ADMIN -->
						
					
                      </div>
					  
            </div>

        </div>

    </div>