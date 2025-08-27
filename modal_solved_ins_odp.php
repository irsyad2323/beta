<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="modal fade" id="modal_ins_odp" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form role="form" method="post" id="form_edit_sinden">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input class="form-control" type="hidden" id="key_odp_ins" name="key_odp_ins"
                                autocomplete="off" disabled>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="id_ins_odp">ID ODP</label>
                            <input class="form-control" type="text" id="id_ins_odp" name="id_ins_odp" autocomplete="off"
                                disabled>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="nama_odp_ins">Nama ODP</label>
                            <input class="form-control" type="text" id="nama_odp_ins" name="nama_odp_ins"
                                autocomplete="off">
                        </div>

                        <div class="form-group col-md-8">
                            <label for="autocomplete">Pencarian Alamat (Ketik alamat lalu enter)</label>
                            <input id="autocomplete" placeholder="Ketik alamat di sini" type="text"
                                class="form-control">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="pic_ins_odpp">Teknisi</label>
                            <input class="form-control" type="text" id="pic_ins_odpp" name="pic_ins_odpp" value="<?php
                            include('../controller/controller_mysqli.php');
                            $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE user='" . $acces_user_log . "' and kantor_cabang='" . $kota . "' and status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan in ('Karyawan','Outsourcing');");
                            while ($data_user = mysqli_fetch_array($sql_user)) {
                                echo $data_user['nama_panggilan'] . '#' . $data_user['status_karyawan'];
                            }
                            ?>" readonly>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="pic_ins_odpp2">Teknisi Pendamping</label>
                            <select class="form-control" id="pic_ins_odpp2" name="pic_ins_odpp2" autocomplete="off">
                                <option></option>
                                <?php
                                include('../controller/controller_mysqli.php');
                                $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE kantor_cabang='" . $kota . "' and status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan IN ('Karyawan','Outsourcing')");
                                while ($data_user = mysqli_fetch_array($sql_user)) {
                                    echo '<option value="' . $data_user['nama_panggilan'] . '">' . $data_user['nama_panggilan'] . '#' . $data_user['status_karyawan'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                            <div id="splitter-container">
                                <div class="input-group mb-2">
                                    <label for="Spliter">Spliter</label>
                                    <select name="spltr_ins[]" class="form-control">
                                        <option value=""></option>
                                        <option value="1/4">1/4</option>
                                        <option value="1/8">1/8</option>
                                        <option value="1/16">1/16</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-outline-primary btn-sm add-splitter">
                                            Tambah Pilihan
                                        </button>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group col-md-4">
                                <label for="spltr_ins3">Jenis Kabel</label>
                                <select class="form-control" id="kabel_ins_odpp" name="kabel_ins_odpp">
                                    <option>-</option>
                                    <option>1CORE</option>
                                    <option>4CORE</option>
                                    <option>12CORE</option>
                                    <option>24CORE</option>
                                    <option>48CORE</option>
                                    <option>96CORE</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="spltr_ins3">Status Tiang 3</label>
                                <select class="form-control" id="status_tiang" name="status_tiang">
                                    <option>-</option>
                                    <option>ADA TIANG</option>
                                    <option>TIDAK ADA TIANG</option>
                                    <option>Tiang P.J.U</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="lain_lainodp_ins">Keterangan</label>
                                <input class="form-control" type="text" id="lain_lainodp_ins" name="lain_lainodp_ins"
                                    placeholder="keterangan" autocomplete="off">
                            </div>

                            <input type="hidden" id="kd_prov" name="kd_prov" readonly>
                            <input type="hidden" id="kd_kabkota" name="kd_kabkota" readonly>
                            <input type="hidden" id="kd_kec" name="kd_kec" readonly>
                            <input type="hidden" id="kd_kel" name="kd_kel" readonly>
                            <input type="hidden" id="kd_layanan" name="kd_layanan" readonly>

                            <div class="form-group col-md-12">
                                <button id="btnLokasiSaya" type="button" class="btn btn-primary btn-sm mb-2">📍 Lokasi
                                    Saya</button>
                            </div>

                            <div class="form-group col-md-12">
                                <div id="map" style="width: 100%; height: 400px;"></div>
                            </div>

                            <div class="form-group col-md-2"><input type="text" id="latitude" name="latitude"
                                    placeholder="Latitude" class="form-control" readonly></div>
                            <div class="form-group col-md-2"><input type="text" id="longitude" name="longitude"
                                    placeholder="Longitude" class="form-control" readonly></div>
                            <div class="form-group col-md-2"><input type="text" id="kelurahan" name="kelurahan"
                                    placeholder="Kelurahan" class="form-control" readonly></div>
                            <div class="form-group col-md-2"><input type="text" id="kecamatan" name="kecamatan"
                                    placeholder="Kecamatan" class="form-control" readonly></div>
                            <div class="form-group col-md-2"><input type="text" id="kabupaten" name="kabupaten"
                                    placeholder="Kabupaten" class="form-control" readonly></div>
                            <div class="form-group col-md-2"><input type="text" id="provinsi" name="provinsi"
                                    placeholder="Provinsi" class="form-control" readonly></div>

                            <div class="form-group col-md-12">
                                <label for="foto_ins_odp">Upload Foto</label>
                                <input type="file" id="foto_ins_odp" accept="image/*" class="form-control">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="status_ins_odp">Status</label>
                                <select class="form-control" id="status_ins_odp" name="status_ins_odp"
                                    autocomplete="off">
                                    <option></option>
                                    <option>Sudah Terpasang</option>
                                </select>
                            </div>
                    </div>

                    <hr>
                    <div class="form-group text-right">
                        <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">
                            <i class="fa fa-times fa-fw"></i>Cancel
                        </button>
                        <button type="button" class="btn btn-success  pull-right save_solved_insodp">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>