<div class="modal fade" id="modal_post_wo" role="dialog" tabindex="-1">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-user">Tambah Data</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form role="form" method="post" id="form_post_wo" data-id="formdatapengguna_post">
					<input class="form-control date_wo" type="text" name="date_wo" readonly>
					<input class="form-control end" type="hidden" name="end">
					<div class="form-row col-md-4">
						<label for="rang">Jenis WO</label>
						<select class="form-control" id="kategori" name="kategori" onclick='test()'>
							<option></option>
							<option value="ikr">Instalasi Kapten</option>
							<option value="mntn">Maintennace Kapten</option>
						</select> &nbsp
					</div>
					<br />
					<div id="ikr"><?php include 'modal_form_ikr.php'; ?></div>
					<div id="mntn"><?php include 'modal_mntn.php'; ?></div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>