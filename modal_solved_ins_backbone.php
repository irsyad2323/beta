<style>
  .custom-map-control-button {
    background-color: #fff;
    border: 2px solid #fff;
    border-radius: 3px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, .3);
    margin: 10px;
    padding: 8px 16px;
    font-size: 14px;
    font-weight: bold;
    color: #5f6368;
    text-align: center;
    outline: none;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
  }

  .custom-map-control-button:hover {
    background-color: #4285f4;
    color: #fff;
  }
</style>

<div class="modal fade" id="modal_mnt_backbone" role="dialog" tabindex="-1">

  <div class="modal-dialog modal-xl" role="document">

    <div class="modal-content">


      <div class="modal-body">
        <form role="form" method="post" id="form_edit_sinden">


          <div class="form-row">
            <input type="hidden" class="form-control" type="text" id="key_mnt_bckbone" name="key_mnt_bckbone" autocomplete="off" disabled>


            <div class="form-group col-md-2">
              <label for="rang">Nama Backbone</label>
              <input class="form-control" type="text" id="nama_mnt_bckbone" name="nama_mnt_bckbone" autocomplete="off" disabled>
            </div>

            <div class="form-group col-md-2">
              <label for="rang">IKR Backbone</label>
              <input class="form-control" type="text" id="pic_mnt_bckbone" name="pic_mnt_bckbone" value="<?php
                                                                                                          include('../controller/controller_mysqli.php');
                                                                                                          $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE user='" . $acces_user_log . "' and kantor_cabang='" . $kota . "' and status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan in ('Karyawan','Outsourcing');");
                                                                                                          //$data_user = mysqli_fetch_array($sql_user);
                                                                                                          //print_r($data_user);
                                                                                                          while ($data_user = mysqli_fetch_array($sql_user)) {
                                                                                                            echo $data_user['nama_panggilan'] . '#' . $data_user['status_karyawan'];
                                                                                                          }
                                                                                                          ?>" readonly>
            </div>

            <div class="form-group col-md-2">
              <label for="rang">PIC Backbone</label>
              <select class="form-control" type="text" id="pic_mnt_bckbone2" name="pic_mnt_bckbone2" autocomplete="off">
                <option> <?php
                          include('../controller/controller_mysqli.php');
                          $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE kantor_cabang='" . $kota . "' and status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan='Karyawan'");
                          //$data_user = mysqli_fetch_array($sql_user);
                          //print_r($data_user);
                          while ($data_user = mysqli_fetch_array($sql_user)) {
                            echo '<option value"' . $data_user['nama_panggilan'] . '">' . $data_user['nama_panggilan'] . '#' . $data_user['status_karyawan'] . '</option>';
                          }
                          ?> </option>
                <option> <?php
                          include('../controller/controller_mysqli.php');
                          $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE kantor_cabang='" . $kota . "' and status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan='Outsourcing'");
                          //$data_user = mysqli_fetch_array($sql_user);
                          //print_r($data_user);
                          while ($data_user = mysqli_fetch_array($sql_user)) {
                            echo '<option value"' . $data_user['nama_panggilan'] . '">' . $data_user['nama_panggilan'] . '#' . $data_user['status_karyawan'] . '</option>';
                          }
                          ?> </option>
              </select>
            </div>

            <div class="form-group col-md-6">
              <label for="rang">Keterangan</label>
              <input class="form-control" type="text" id="lain_lain_bckbn" name="lain_lain_bckbn" placeholder="keterangan" autocomplete="off">
            </div>
            <input type="hidden" class="form-control" type="text" id="lokasi_kapten_mntn_bckbn" name="lokasi_kapten_mntn_bckbn" autocomplete="off" readonly>

          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="rang">Status</label>
              <select class="form-control" type="text" id="status_ins_bkbn" name="status_ins_bkbn" autocomplete="off">
                <option></option>
                <option>Sudah Terpasang</option>
              </select>
            </div>

            <div class="form-group col-md-12">
              <label for="lokasi_mnt_backbone">Lokasi Backbone</label>
              <div id="map3" style="height: 400px; width: 100%;"></div>
            </div>

            <input type="hidden" id="latitude" name="latitude">
            <input type="hidden" id="longitude" name="longitude">
          </div>

          <hr>
          <button type="button" class="btn btn-success  pull-right save_solved_bckbn2">Update</button>
          <button type="reset" class="btn btn-danger pull-right"><i class="fa fa-times fa-fw"></i>Reset</button>

        </form>

        <!-- END ISIAN DATA ADMIN -->


      </div>

    </div>

  </div>

</div>

<script>
  let map3;
  let marker3;

  function initMapForModalBackbone(lat = -7.981894, lng = 112.630114) {
    const lokasiAwal = {
      lat: parseFloat(lat),
      lng: parseFloat(lng)
    };
    const mapElement = document.getElementById("map3");

    if (!mapElement) {
      console.error("Element #map3 tidak ditemukan!");
      return;
    }

    map3 = new google.maps.Map(mapElement, {
      center: lokasiAwal,
      zoom: 15,
    });

    marker3 = new google.maps.Marker({
      position: lokasiAwal,
      map: map3,
      draggable: true,
    });

    updateInputKoordinat(lokasiAwal.lat, lokasiAwal.lng);

    marker3.addListener("dragend", function(event) {
      const lat = event.latLng.lat();
      const lng = event.latLng.lng();
      updateInputKoordinat(lat, lng);
    });

    map3.addListener("click", function(event) {
      const lat = event.latLng.lat();
      const lng = event.latLng.lng();
      marker3.setPosition(event.latLng);
      updateInputKoordinat(lat, lng);
    });

    const locationButton = document.createElement("button");
    locationButton.textContent = "Get My Location";
    locationButton.classList.add("custom-map-control-button");
    locationButton.type = "button";

    locationButton.addEventListener("click", function(event) {
      event.preventDefault();
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          function(position) {
            const pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude,
            };
            map3.setCenter(pos);
            map3.setZoom(18);
            marker3.setPosition(pos);
            updateInputKoordinat(pos.lat, pos.lng);
          },
          function(error) {
            alert("Geolocation error: " + error.message);
          }, {
            enableHighAccuracy: true,
            timeout: 10000,
            maximumAge: 0
          }
        );
      } else {
        alert("Geolocation tidak didukung oleh browser ini.");
      }
    });

    map3.controls[google.maps.ControlPosition.TOP_RIGHT].push(locationButton);
  }

  function updateInputKoordinat(lat, lng) {
    const latInput = document.getElementById("latitude");
    const lngInput = document.getElementById("longitude");

    if (latInput && lngInput) {
      latInput.value = lat;
      lngInput.value = lng;
    }
  }

  $(document).ready(function() {
    $("#modal_mnt_backbone").on("shown.bs.modal", function() {
      initMapForModalBackbone(); // Panggil fungsi untuk inisialisasi peta pada modal_mnt_backbone
      setTimeout(function() {
        const mapElement = document.getElementById("map3");
        if (mapElement) {
          google.maps.event.trigger(mapElement, "resize");
          map3.setCenter({
            lat: -7.981894,
            lng: 112.630114
          }); // Set default center after resize
        }
      }, 500); // Pastikan waktu cukup untuk render modal
    });
  });
</script>