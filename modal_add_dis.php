<div class="modal fade" id="modaltambahinsdis" role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

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
                    if ($_SESSION["level_user"] != "ikr") {
                    ?>

                        <div class="form-row">
                            <label for="rang">ODP Induk &nbsp&nbsp&nbsp&nbsp</label>
                            <select class="selectpicker" id="odp_induk_dis" name="odp_induk_dis" data-live-search="true" data-width="350px">
                                <?php
                                include('controller/controller_mysqli.php');
                                $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_odp");

                                while ($data_user = mysqli_fetch_array($sql_user)) {
                                    echo '<option value="' . $data_user['id_odp'] . '">' . $data_user['nama_odp'] . ' - ' . $data_user['kd_layanan'] . '</option>';
                                }
                                ?>
                            </select>

                        </div><br />

                        <!-- input hidden kd_layanan -->
                        <input type="hidden" id="kd_layanan2" name="kd_layanan2" value="" readonly>

                        <div class="form-row">
                            <label for="fname">Nama Distribusi</label>
                            <input class="form-control" type="text" id="nama_dis" name="nama_dis" placeholder="nama..." autocomplete="off" required>
                        </div>
                        <br />
                        <div class="form-row">
                            <label for="lname">Alamat</label>
                            <input class="form-control" type="text" id="alamat_dis" name="alamat_dis" placeholder="alamat..." autocomplete="off" required>
                        </div>
                        <br />

                        <div class="form-row">
                            <label for="rang">Keterangan</label>
                            <input class="form-control" type="text" id="lain_lain_dis" name="lain_lain_dis" placeholder="keterangan" autocomplete="off">
                        </div>
                        <br />

                        <hr>
                        <button type="submit" class="btn btn-success  pull-right action_ins_dis">Insert</button>
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

<script>
    $(document).ready(function() {
        // Inisialisasi Bootstrap Select
        $('#odp_induk_dis').selectpicker({
            liveSearch: true,
            size: 10
        });

        // Event handler untuk perubahan select
        $('#odp_induk_dis').on('changed.bs.select', function() {
            const selectedText = $(this).find('option:selected').text();
            const separator = selectedText.lastIndexOf('-');
            
            if (separator !== -1) {
                const kdLayanan = selectedText.substring(separator + 1).trim();
                $('#kd_layanan2').val(kdLayanan);
            } else {
                $('#kd_layanan2').val('');
            }
        });
    });
</script>