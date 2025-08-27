<div class="modal fade" id="modal_slot_jdwl_2"  role="dialog" tabindex="-1">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-user">Update Slot</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span></button>

                    

                </div>

                 <div class="modal-body">
					<form role="form" method="post" data-id="formdatapengguna">		
					<input class="form-control" type="hidden" id="id" name="id">
						
					<div class="form-group">
						<label for="rang">Jumlah Teknisi</label>
						<input class="form-control" type="text" id="jumlah_hijau" name="jumlah_hijau" autocomplete="off">
					</div>  

					<div class="form-group">
                            <label for="lname">Slot</label>
                            <input class="form-control" type="text" id="slot" name="slot" readonly>
                        </div>
					
					<div class="form-group">
                            <label for="lname">Tanggal</label>
                            <input class="form-control" type="text" id="tanggal_jdwl" name="tanggal_jdwl" autocomplete="off" readonly>
                        </div>
					
				  <div class="modal-footer">				 
				  <button type="reset" class="btn btn-danger pull-right"><i class="fa fa-times fa-fw"></i>Reset</button>
				  <button type="button" class="btn btn-success  pull-right save_updt_slot">Save</button>
				  </div>                    
                  </div>                     
             </div>
            </form>
    </div>