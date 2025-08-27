<div class="modal fade" id="modal_post_mntn" role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-text="true">

	<div class="modal-dialog" role="document">

		<div class="modal-content">

			<div class="modal-header">

				<h4 class="modal-user">Tambah Data</h4>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">

					<span aria-text="true">&times;</span></button>



			</div>

			<div class="modal-body">
				<form role="form" method="post" id="formdatapengguna">

					<!-- FORM ISIAN DATA ADMIN -->

					<?php
					if ($_SESSION["level_user"] != "ikr") {
					?>

						<div class="form-row">
							<input class="form-control" type="hidden" id="idpost" name="idpost" autocomplete="off" readonly>
						</div>
						<br />

						<div class="form-row">
							<label for="rang">ID USER</label>
							<input class="form-control" type="text" id="id_user_post" name="id_user_post" autocomplete="off" readonly>
						</div>
						<br />

						<div class="form-row">
							<label for="rang">Alamat</label>
							<input class="form-control" type="text" id="nama_kom_post" name="nama_kom_post" autocomplete="off" readonly>
						</div>
						<br />

						<div class="form-row">
							<label for="rang">Telpon</label>
							<input class="form-control" type="number" id="tlp_kom_post" name="tlp_kom_post" autocomplete="off" readonly>
						</div>
						<br />

						<div class="form-row">
							<label for="rang">Kategori</label>
							<input class="form-control" type="text" id="alamat_post" name="alamat_post" autocomplete="off" readonly>
						</div>
						<br />

						<div class="form-row">
							<input class="form-control" type="hidden" id="kelurahan_post" name="kelurahan_post" autocomplete="off" readonly>
						</div>
						<br />

						<div class="form-row">
							<input class="form-control" type="hidden" id="kd_kom_post" name="kd_kom_post" autocomplete="off" readonly>
						</div>
						<br />

						<div class="form-row">
							<input class="form-control" type="hidden" id="jenis_produk_post" name="jenis_produk_post" autocomplete="off" readonly>
						</div>
						<br />

						<div class="form-row">
							<label for="rang">Keterangan Komplain</label>
							<input class="form-control" type="text" id="keluhan_deskripsi_post" name="keluhan_deskripsi_post" autocomplete="off" readonly>
						</div>
						<br />

						<div class="form-row">
							<label for="rang">Kategori Komplain</label>
							<input class="form-control" type="text" id="kategori_kompline_post" name="kategori_kompline_post" autocomplete="off" readonly>
						</div>
						<br />

						<div class="form-row">
							<label for="lname">Date</label>
							<input type="datetime-local" name="date_wo_post_mntn" id="date_wo_post_mntn" class="form-control"="true" readonly>
						</div>
						<br />

						<div class="form-row">
							<input type="text" name="date_end_mntn" id="date_end_mntn" class="form-control"="true" readonly>
						</div>

						<div class="form-row">
							<label for="rang">Keterangan</label>
							<input class="form-control" type="text" id="keterangan_solving_post" name="keterangan_solving_post" autocomplete="off">
						</div>
						<br />

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-success  pull-right action_post_kap_mntn">Insert</button>
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

<div class="modal fade" id="modaltambahdatamnt" role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

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
					if ($_SESSION["level_user"] != "ikr") {
					?>
						<form>
							<div class="form-group mb-3">
								<label for="kode_user">ID USER</label>
								<select class="form-control js-example-basic-multiple" id="kode_user" name="kode_user[]" multiple="multiple" style="width: 100%;">
								</select>
							</div>

							<div class="form-group mb-3">
								<label for="nama_mnt1">Nama</label>
								<input type="text" class="form-control" id="nama_mnt1" name="nama_mnt1" placeholder="Nama...">
							</div>

							<div class="form-group mb-3">
								<label for="tlp_mnt1">No. Telepon</label>
								<input type="number" class="form-control" id="tlp_mnt1" name="tlp_mnt1" placeholder="Telepon..." autocomplete="off">
							</div>

							<div class="form-group mb-3">
								<label for="produk_mnt1">Nama Produk</label>
								<select class="form-control" id="produk_mnt1" name="produk_mnt1" autocomplete="off">
									<option>-</option>
									<option>Kapten Naratel</option>
									<option>Sinden</option>
									<option>Omah Wifi</option>
									<option>Dedicated</option>
									<option>Broadband</option>
								</select>
							</div>

							<div class="form-group mb-3">
								<label for="username_Maintenance_mnt1">Username</label>
								<input type="text" class="form-control" id="username_Maintenance_mnt1" name="username_Maintenance_mnt1" placeholder="Username..." autocomplete="off">
							</div>

							<div class="form-group mb-3">
								<label for="kd_layanan_mnt1">Kantor Cabang</label>
								<select class="form-control" id="kd_layanan_mnt1" name="kd_layanan_mnt1" required>
									<option value=""></option>
									<option value="mlg">Naratel</option>
									<option value="mlg1">Jalantra</option>
									<option value="batu">Batu</option>
									<option value="pas">SBM</option>
								</select>
							</div>

							<div class="form-group mb-3">
								<label for="alamat_mnt1">Alamat</label>
								<input type="text" class="form-control" id="alamat_mnt1" name="alamat_mnt1" placeholder="Alamat..." autocomplete="off">
							</div>

							<div class="form-group mb-3">
								<label for="kelurahan_mnt1">Kelurahan</label>
								<input type="text" class="form-control" id="kelurahan_mnt1" name="kelurahan_mnt1" placeholder="Kelurahan..." autocomplete="off">
							</div>

							<div class="form-group mb-4">
								<label for="lain_lain_mnt1">Keterangan</label>
								<input type="text" class="form-control" id="lain_lain_mnt1" name="lain_lain_mnt1" placeholder="Keterangan..." autocomplete="off">
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-success actionmntn">Insert</button>
								<button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i> Reset</button>
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