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

<div class="modal fade" id="modal_ins_distribusi" role="dialog" tabindex="-1">

  <div class="modal-dialog modal-xl" role="document">

    <div class="modal-content">


      <div class="modal-body">
        <form role="form" method="post" id="form_edit_sinden">


          <div class="form-row">
            <input class="form-control" type="hidden" id="key_odp_ins_dis" name="key_odp_ins_dis" autocomplete="off" disabled>


            <div class="form-group col-md-2">
              <label for="rang">Nama User</label>
              <input class="form-control" type="text" id="nama_ins_dis" name="nama_ins_dis" autocomplete="off" disabled>
            </div>

            <div class="form-group">
              <label for="rang">Teknisi</label>
              <input class="form-control" type="text" id="pic_ins_dis" name="pic_ins_dis" value="<?php
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
              <label for="rang">Teknisi Pendamping</label>
              <select class="form-control" type="text" id="pic_ins_dis2" name="pic_ins_dis2" autocomplete="off">
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


            <div class="form-group col-md-4">
              <label for="rang">Jenis Kabel</label>
              <select class="form-control" type="text" id="jenis_kabel_dis" name="jenis_kabel_dis" autocomplete="off">
                <option>-</option>
                <option>1 Core</option>
                <option>4 Core</option>
                <option>6 Core</option>
                <option>12 Core</option>
                <option>24 Core</option>
                <option>96 Core</option>
              </select>
            </div>

            <div class="form-group col-md-2">
              <label for="lname">Panjang Kabel</label>
              <input class="form-control" type="number" id="kabel_ins_dis" name="kabel_ins_dis" autocomplete="off" required>
            </div>

            <div class="form-group col-md-6">
              <label for="rang">Keterangan</label>
              <input class="form-control" type="text" id="lain_lain_insdis" name="lain_lain_insdis" placeholder="keterangan" autocomplete="off">
            </div>
            <input class="form-control" type="hidden" id="keterangan" name="keterangan" autocomplete="off" readonly>

          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="rang">Status</label>
              <select class="form-control" type="text" id="status_ins_dis" name="status_ins_dis" autocomplete="off">
                <option></option>
                <option>Sudah Terpasang</option>
              </select>
            </div>

            <div class="form-group col-md-12">
              <label for="lokasi_kapten_ins_dis">Lokasi Distribusi</label>
              <div id="map2" style="height: 400px; width: 100%;"></div>
            </div>

            <input type="hidden" id="latitude" name="latitude">
            <input type="hidden" id="longitude" name="longitude">
          </div>

          <hr>
          <button type="button" class="btn btn-success  pull-right save_solved_insdis">Update</button>
          <button type="reset" class="btn btn-danger pull-right"><i class="fa fa-times fa-fw"></i>Reset</button>

        </form>

        <!-- END ISIAN DATA ADMIN -->


      </div>

    </div>

  </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  let map2;
  let marker2;

  function initMapForModalDistribusi(lat = -7.981894, lng = 112.630114) {
    const lokasiAwal = {
      lat: parseFloat(lat),
      lng: parseFloat(lng)
    };
    const mapElement = document.getElementById("map2");

    if (!mapElement) {
      console.error("Element #map2 tidak ditemukan!");
      return;
    }

    map2 = new google.maps.Map(mapElement, {
      center: lokasiAwal,
      zoom: 15,
    });

    marker2 = new google.maps.Marker({
      position: lokasiAwal,
      map: map2,
      draggable: true,
    });

    updateInputKoordinat(lokasiAwal.lat, lokasiAwal.lng);

    marker2.addListener("dragend", function(event) {
      const lat = event.latLng.lat();
      const lng = event.latLng.lng();
      updateInputKoordinat(lat, lng);
    });

    map2.addListener("click", function(event) {
      const lat = event.latLng.lat();
      const lng = event.latLng.lng();
      marker2.setPosition(event.latLng);
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
            map2.setCenter(pos);
            map2.setZoom(18);
            marker2.setPosition(pos);
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

    map2.controls[google.maps.ControlPosition.TOP_RIGHT].push(locationButton);
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
    $("#modal_ins_distribusi").on("shown.bs.modal", function() {
      initMapForModalDistribusi();
      setTimeout(function() {
        const mapElement = document.getElementById("map2");
        if (mapElement) {
          google.maps.event.trigger(mapElement, "resize");
          map2.setCenter({
            lat: -7.981894,
            lng: 112.630114
          }); // Set default center after resize
        }
      }, 500); // Pastikan waktu cukup untuk render modal
    });
  });
</script>