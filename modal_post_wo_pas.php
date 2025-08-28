<div class="modal fade" id="modal_post_wo_pas" role="dialog" tabindex="-1">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-user">Tambah Data</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form role="form" method="post" id="form_post_wo_pas" data-id="formdatapengguna_pas">
					<input class="form-control" type="text" id="date_wo_pas" name="date_wo_pas">
					<input class="form-control" type="text" id="end_pas" name="end_pas">
					<div class="form-row col-md-4">
						<label for="rang">Jenis WO</label>
						<select class="form-control" id="kategori_pas" name="kategori_pas" onclick='test()'>
							<option></option>
							<option value="ikr_pas">Instalasi Kapten</option>
							<option value="mntn_pas">Maintennace Kapten</option>
						</select> &nbsp
					</div>
					<br />
					<div id="ikr_pas"><?php include 'modal_form_ikr_pas.php'; ?></div>
					<div id="mntn_pas"><?php include 'modal_mntn_pas.php'; ?></div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>