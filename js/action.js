$(document).ready(function () {
  //get data value kapten
  $(document).on("click", ".action_edit_list", function () {
    //alert($(this).data('id'));
    var jenis_pekerjaan = $(this).attr("jenis_pekerjaan");
    var username_fal = $(this).attr("username_fal");
    var nama_fal = $(this).attr("nama_fal");
    var password_fal = $(this).attr("password_fal");
    var paket_fal = $(this).attr("paket_fal");
    var kd_layanan = $(this).attr("kd_layanan");
    var tlp_fal = $(this).attr("tlp_fal");
    var pic_ikr = $(this).attr("pic_ikr");
    var alamat_fal = $(this).attr("alamat_fal");
    var rt = $(this).attr("rt");
    var rw = $(this).attr("rw");
    var kelurahan = $(this).attr("kelurahan");
    var tgl_fal_datetime = $(this).attr("tgl_fal_datetime");
    var lain_lain = $(this).attr("lain_lain");
    var total_diskon = $(this).attr("total_diskon");
    var free = $(this).attr("free");
    var pindah_alamat = $(this).attr("pindah_alamat");
    var keterangan_angsuran = $(this).attr("keterangan_angsuran");
    var perlakuan2 = $(this).attr("perlakuan2");

    /* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
				var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
				var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
				var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
				var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
				var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
    //alert (key_odp);

    $("#modaledit_list").modal("show");
    $("#perlakuan2").val(perlakuan2);
    $("#username_fal2").val(username_fal);
    $("#jenis_pekerjaan").val(jenis_pekerjaan);
    $("#nama_fal2").val(nama_fal);
    $("#password_fal2").val(password_fal);
    $("#tlp_fal2").val(tlp_fal);
    $("#paket_fal2").val(paket_fal);
    $("#kd_layanan2").val(kd_layanan);
    $("#pic_ikr2").val(pic_ikr);
    $("#alamat_fal2").val(alamat_fal);
    $("#rt2").val(rt);
    $("#rw2").val(rw);
    $("#kelurahan2").val(kelurahan);
    $("#tgl_fal2").val(tgl_fal_datetime);
    $("#lain_lain2").val(lain_lain);
    $("#total_diskon2").val(total_diskon);
    $("#free2").val(free);
    $("#pindah_alamat2").val(pindah_alamat);
    $("#keterangan_angsuran2").val(keterangan_angsuran);
  });

  $(document).on("click", ".perijinan", function () {
    //alert($(this).data('id'));
    var key_fal = $(this).attr("key_fal");
    var status_wo = $(this).attr("status_wo");
    var lain_lain = $(this).attr("lain_lain");

    $("#modal_perijinan").modal("show");
    $("#key_fal").val(key_fal);
    $("#status_wo").val(status_wo);
    $("#lain_lain_perijinan").val(lain_lain);
  });

  //get data value kapten
  $(document).on("click", ".respro", function () {
    // alert ('tes');
    var jenis_wo = $(this).attr("jenis_wo");
    var username_fal = $(this).attr("username_fal");
    var pic_ikr = $(this).attr("pic_ikr");
    var tgl_fal_datetime = $(this).attr("tgl_fal_datetime");
    var lain_lain = $(this).attr("lain_lain");
    var key_fal = $(this).attr("key_fal");

    /* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
				var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
				var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
				var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
				var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
				var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
    //alert (key_fal); return;

    $("#modalrespro").modal("show");
    $("#username_rescedule").val(username_fal);
    $("#pic_ikr_res").val(pic_ikr);
    $("#jenis_pekerjaan_res").val(jenis_wo);
    $("#tgl_fal_res").val(tgl_fal_datetime);
    $("#keterangan_res").val(lain_lain);
    $("#id_mntn_get").val(key_fal);
  });

  //get data value kapten
  $(document).on("click", ".switchpic", function () {
    //alert($(this).data('id'));
    var jenis_pekerjaan = $(this).attr("jenis_pekerjaan");
    var username_fal = $(this).attr("username_fal");
    var pic_ikr = $(this).attr("pic_ikr");
    var jenis_wo = $(this).attr("jenis_wo");
    var key_fal = $(this).attr("key_fal");
    var tgl_fal_datetime = $(this).attr("tgl_fal_datetime");

    /* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
				var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
				var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
				var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
				var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
				var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
    //alert (key_fal); return;

    $("#modalswitch").modal("show");
    $("#username_s").val(username_fal);
    $("#pic_ikrswitch").val(pic_ikr);
    $("#jenis_wo").val(jenis_wo);
    $("#key_fal_sitch_pic").val(key_fal);
    $("#tgl_fal_switch").val(tgl_fal_datetime);
  });
  //get data value kptn
  $(document).on("click", ".editkapten", function () {
    //alert($(this).data('id'));
    var key_fal = $(this).attr("key_fal");
    var username_fal = $(this).attr("username_fal");
    var nama_fal = $(this).attr("nama_fal");
    var perlakuan = $(this).attr("perlakuan");
    var total = $(this).attr("total");
    var keterangan_angsuran = $(this).attr("keterangan_angsuran");
    var jenis_wo = $(this).attr("jenis_wo");
    var kd_layanan = $(this).attr("kd_layanan");
    var tlp_fal = $(this).attr("tlp_fal");
    var id_fdback = $(this).attr("id_fdback");
    var lain_lain = $(this).attr("lain_lain");
    var tgl_fal_datetime = $(this).attr("tgl_fal_datetime");
    var tgl_fal_date = tgl_fal_datetime.split(" ")[0];
    //console.log(tgl_fal_datetime); return;
    //alert (tgl_fal_datetime); return;

    $("#key_falr").val(key_fal);
    $("#key_odp").val(key_fal);
    $("#key_odp_ins").val(key_fal);
    $("#key_odp_ins_dis").val(key_fal);
    $("#key_mnt_bckbone").val(key_fal);
    $("#id_fdbackr").val(id_fdback);
    $("#kode_ikr").val(username_fal);
    $("#id_odp").val(username_fal);
    $("#id_ins_odp").val(username_fal);
    $("#nama_ikr").val(nama_fal);
    $("#nama_odp").val(nama_fal);
    $("#nama_odp_ins").val(nama_fal);
    $("#nama_ins_dis").val(nama_fal);
    $("#nama_mnt_bckbone").val(nama_fal);
    $("#perlakuan_solved").val(perlakuan);
    $("#total_solved").val(total);
    $("#keterangan_angsuran").val(keterangan_angsuran);
    $("#tanggalsign_wo").val(tgl_fal_date);
    $("#tanggalsign_mntn").val(tgl_fal_date);
    $("#tanggal_modal").val(tgl_fal_date);
    $("#tanggalsign_mntnodp").val(tgl_fal_date);
    $("#nama_fal_mntn").val(nama_fal);
    $("#username_fal_mntn").val(username_fal);
    $("#kd_layanan").val(kd_layanan);
    $("#tlp_fal").val(tlp_fal);
    $("#lain_lain").val(lain_lain);
    /* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
				var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
				var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
				var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
				var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
				var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
    //alert (key_fal); return;
    //alert (jenis_wo); return;
    if (jenis_wo == "INSTALASI") {
      $("#modal_solved_ikr").modal("show");
    } else if (jenis_wo == "MAINTENANCE") {
      //alert (id_fdback); return;
      $("#modalmntn").modal("show");
      //alert (key_fal); return;
    } else if (jenis_wo == "MAINTENANCE_ODP") {
      $("#modalodp").modal("show");
    } else if (jenis_wo == "INSTALASI_ODP") {
      $("#modal_ins_odp").modal("show");
    } else if (jenis_wo == "INSTALASI_DISTRIBUSI") {
      $("#modal_ins_distribusi").modal("show");
    } else if (jenis_wo == "INSTALASI_BACKBONE") {
      $("#modal_ins_backbone").modal("show");
    } else if (jenis_wo == "MAINTENANCE_BACKBONE") {
      //alert ('tes');
      $("#modal_mnt_backbone").modal("show");
    }
  });
  // create
  $(document).on("click", ".saveupdate_odp", function () {
    //var nama_fal = $("#nama_fal").val();
    var key_odp = $("#key_odp").val();
    var id_odp = $("#id_odp").val();
    var nama_odp = $("#nama_odp").val();
    var key_odp = $("#key_odp").val();
    var pic_ins_odp = $("#pic_ins_odp").val();
    var pic_ins_odp2 = $("#pic_ins_odp2").val();
    var spltr = $("#spltr").val();
    var spltr2 = $("#spltr2").val();
    var spltr3 = $("#spltr3").val();
    var kabel_ins_odp = $("#kabel_ins_odp").val();
    var lokasi_kapten_mntn_odp = $("#lokasi_kapten_mntn_odp").val();
    var status_odp = $("#status_odp").val();
    var lain_lainodp = $("#lain_lainodp").val();

    //alert(username_sinden); return;

    var value = {
      nama_sinden: nama_odp,
      id_odp: id_odp,
      key_odp: key_odp,
      username_sinden: id_odp,
      pic_sinden: pic_ins_odp,
      pic_sinden2: pic_ins_odp2,
      lain_lainodp: lain_lainodp,
      kabel_sinden: kabel_ins_odp,
      spltr: spltr,
      spltr2: spltr2,
      spltr3: spltr3,
      get_lokasi: lokasi_kapten_mntn_odp,
      status_sinden: status_odp,
    };

    $.ajax({
      type: "POST",
      async: false,
      url: "controller/action_edit_maintenanceodp_new.php",
      data: value,
      beforeSend: function () {
        Swal.fire({
          title: "Processing...",
          text: "Please wait while we process your request.",
          allowOutsideClick: false,
          showConfirmButton: false,
          didOpen: () => {
            Swal.showLoading();
          }
        });
      },
      success: function (data) {
        Swal.close();
        alert(data);
        window.location.reload(true);
      },
    });
  });

  // create
  $(document).on("click", ".save_solved_ikr", function () {
    //var nama_fal = $("#nama_fal").val();
    var nama_fal = $("#nama_ikr").val();
    var username_fal = $("#kode_ikr").val();
    var status = $("#status").val();
    var status2 = $("#status2").val();
    var modem = $("#modem").val();
    var kabel1 = $("#kabel1").val();
    var kabel2 = $("#kabel2").val();
    var kabel3 = $("#kabel3").val();
    var letak_odp = $("#letak_odp").val();
    var pembayarane = $("#pembayarane").val();
    var lokasi_ins = $("#lokasi_ins").val();
    var status_wo = $("#status_wo_ikr").val();
    var lain_lain = $("#lain_lain").val();
    var tanggalsign = $("#tanggalsign_wo").val();
    var storan = $("#storan").val();
    var input_number = $("#input_number").val();
    var type_paket_read = $("#type_paket_read").val();
    var foto_base64 = $("#foto_base64").val();
    var redaman = $("#redaman").val();
    var rssi = $("#rssi").val();

    if (status_wo == "") {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Pilih Status dulu!",
        });
        return;
      }

    if (status_wo == "Pending") {
    } else if (status_wo == "Sudah Terpasang") {
      if (letak_odp == "") {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Letak ODP Belum Terisi!",
        });
        return;
      }else if (foto_base64 == "") {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Upload Speetest terlebih dahulu!",
        });
        return;
      }else if (letak_odp == "") {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Letak ODP Belum Terisi!",
        });
        return;
      } else if (lokasi_ins == "") {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Lokasi Belum Terisi!",
        });
        return;
      }

      if (pembayarane == "-") {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Jenis Pembayaran Belum Terisi!",
        });
        return;
      } else if (pembayarane == "Tunai") {
        if (storan == "") {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Pilihan setoran akan diserahkan ke admin unit mana ? Belum Terisi!",
          });
          return;
        }
      }
    }

    var value = {
      nama_fal: nama_fal,
      username_fal: username_fal,
      status: status,
      status2: status2,
      modem: modem,
      kabel1: kabel1,
      kabel2: kabel2,
      kabel3: kabel3,
      letak_odp: letak_odp,
      pembayaran: pembayarane,
      lokasi_kapten: lokasi_ins,
      status_wo: status_wo,
      tanggalsign: tanggalsign,
      lain_lain: lain_lain,
      stor: storan,
      type_paket_read: type_paket_read,
      input_number: input_number,
      foto_speedtest: foto_base64,
      redaman: redaman,
      rssi: rssi,
    };

    $.ajax({
      type: "POST",
      async: false,
      url: "controller/action_kapten_update_newversi.php",
      data: value,
      beforeSend: function () {
        $("#loader").show();
        Swal.fire({
          title: "Processing...",
          text: "Please wait while we process your request.",
          allowOutsideClick: false,
          showConfirmButton: false,
          didOpen: () => {
            Swal.showLoading();
          }
        });
      },
      success: function (data) {
        $("#loader").hide();
        Swal.close();

        var a = data;
        if (a == 1) {
          Swal.fire({
            title: "Good job!",
            text: "Sukses Save Work Order",
            icon: "success",
            confirmButtonText: "OK"
          }).then(() => {
            window.location.reload(true);
          });
        } else if (a == 101) {
          Swal.fire({
            title: "Error!",
            text: "Error Query bro!!",
            icon: "error",
            confirmButtonText: "OK"
          });
        } else if (a == "session_expirate") {
          Swal.fire({
            title: "Session Expired!",
            text: "Session Habis!!",
            icon: "error",
            confirmButtonText: "OK"
          }).then(() => {
            window.location.href = "login.php";
          });
        } else {
          Swal.fire({
            title: "Error!",
            text: "Unknown error occurred!",
            icon: "error",
            confirmButtonText: "OK"
          });
        }
      },
      error: function () {
        $("#loader").hide();
        Swal.close();
        Swal.fire({
          title: "Error!",
          text: "Failed to process the request!",
          icon: "error",
          confirmButtonText: "OK"
        });
      }
    });

  });

  // create
  $(document).on("click", ".save_solved_mntn", function () {
    //var nama_fal = $("#nama_fal").val();
    var key_falr = $("#key_falr").val();
    var id_fdbackr = $("#id_fdbackr").val();
    var status_mntn = $("#status_mntn").val();
    var status2_mntn = $("#status2_mntn").val();
    var kategori_maintenance = $("#kategori_maintenance").val();
    var modem_mntn = $("#modem_mntn").val();
    var kabel1_mntn = $("#kabel1_mntn").val();
    var kabel2_mntn = $("#kabel2_mntn").val();
    var kabel3_mntn = $("#kabel3_mntn").val();
    var lain_lain_mntn = $("#lain_lain_mntn").val();
    var status_womntn = $("#status_womntn").val();
    var lokasi_kapten_mntn = $("#lokasi_kapten_mt").val();
    var username_fal_mntn = $("#username_fal_mntn").val();
    var kd_layanan = $("#kd_layanan").val();
    var nama_fal_mntn = $("#nama_fal_mntn").val();
    var tanggalsign_mntn = $("#tanggalsign_mntn").val();
    var slot_teknisi_mntn = "00:00:00";
    //var nama_fal_mntn = $('#nama_fal_mntn').val();

    //alert(status_womntn); return;
    if (lain_lain_mntn == "") {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Keterangan Maintenance isi en bro!",
      });
      return;
    } /* else if(status_womntn == 'Sudah Terpasang'){
				if(lokasi_kapten_mntn == '' ){
					Swal.fire({
					  icon: 'error',
					  title: 'Oops...',
					  text: 'Lokasi isi en bro!',				  
					}) 
					return;
				}
			}else if(status_womntn == 'Rescedule' ){
				if(slot_teknisi_mntn == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Slot dipilih bro!',				  
				}) 
				return;
				}
			} */

    //alert(kategori_maintenance); return;

    var value = {
      key_falr: key_falr,
      id_fdbackr: id_fdbackr,
      status_mntn: status_mntn,
      status2_mntn: status2_mntn,
      kategori_maintenance: kategori_maintenance,
      modem_mntn: modem_mntn,
      kabel1_mntn: kabel1_mntn,
      kabel2_mntn: kabel2_mntn,
      kabel3_mntn: kabel3_mntn,
      lain_lain_mntn: lain_lain_mntn,
      status_womntn: status_womntn,
      lokasi_kapten_mntn: lokasi_kapten_mntn,
      kd_layanan: kd_layanan,
      nama_fal_mntn: nama_fal_mntn,
      username_fal_mntn: username_fal_mntn,
      tanggalsign_mntn: tanggalsign_mntn,
      slot_teknisi_mntn: slot_teknisi_mntn,
    };

    $.ajax({
      type: "POST",
      async: false,
      url: "controller/action_edit_maintenance_new.php",
      data: value,
      beforeSend: function () {
        Swal.fire({
          title: "Processing...",
          text: "Please wait while we process your request.",
          allowOutsideClick: false,
          showConfirmButton: false,
          didOpen: () => {
            Swal.showLoading();
          }
        });
      },
      success: function (data) {
        Swal.close();
        //alert(data);
        var a = data;
        if (a == 1) {
          Swal.fire("Good job!", "Sukses Save Work Order", "success").then(
            function (success) {
              window.location.reload(true);
            }
          );
        } else if (a == "jam1") {
          Swal.fire("Error!", "Slot Jam 6 - 8 penuh!!", "error").then(function (
            success
          ) {
            return;
          });
        } else if (a == "jam2") {
          Swal.fire("Error!", "Slot Jam 8 - 10 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "jam3") {
          Swal.fire("Error!", "Slot Jam 10 - 12 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "jam4") {
          Swal.fire("Error!", "Slot Jam 13 - 15 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "jam5") {
          Swal.fire("Error!", "Slot Jam 15 - 17 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "jam6") {
          Swal.fire("Error!", "Slot Jam 18 - 20 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == 101) {
          Swal.fire("Error!", "Error Query bro!!", "error").then(function (
            success
          ) {
            return;
          });
        }
      },
    });
  });

  $(document).on("click", ".save_solved_insodp", function () {
    const fotoFile = $("#foto_ins_odp")[0]?.files[0];
    const latitude = $("#latitude").val().trim();
    const longitude = $("#longitude").val().trim();
    const status_ins_odp = $("#status_ins_odp").val().trim();
    const nama_odp_ins = $("#nama_odp_ins").val().trim();
    const alamat_odp_ins = $("#autocomplete")
      .val()
      .trim()
      .replace(/[^a-zA-Z0-9\s.]/g, "");
    const pic_ins_odpp = $("#pic_ins_odpp").val().trim();
    const kabel_ins_odpp = $("#kabel_ins_odpp").val().trim(); // jenis kabel
    //const spltr_ins = $("#spltr_ins").val().trim(); // status tiang atau spliter
    // Jika hanya 1 select dengan ID
var valSingle = $('#spltr_ins').val();
// Kalau multiple select:
if (Array.isArray(valSingle)) {
  console.log('Multiple selected:', valSingle);
} else {
  console.log('Single selected:', valSingle);
}

// 1. Ambil semua value select
const allValues = [];
$('select[name="spltr_ins[]"]').each(function(){
  const val = $(this).val();
  if (Array.isArray(val)) {
    allValues.push(...val);
  } else {
    allValues.push(val);
  }
});

// 2. Ubah langsung jadi JSON string
const spltr_json = JSON.stringify(allValues);

// 3. (opsional) Tampilkan di console
console.log("spltr_json:", spltr_json);

// 4. Kalau mau simpan ke hidden input
//$('#spltr_json').val(spltr_json);


    //alert (alamat_odp_ins); return;

    if (!latitude || !longitude) {
      Swal.fire({
        icon: "error",
        title: "Koordinat belum diisi!",
        text: "Latitude dan longitude wajib diisi!",
      });
      return;
    }
    if (!nama_odp_ins) {
      Swal.fire({
        icon: "error",
        title: "Nama ODP Kosong!",
        text: "Isi nama ODP dulu bro!",
      });
      return;
    }
    if (!alamat_odp_ins) {
      Swal.fire({
        icon: "error",
        title: "Alamat belum diisi!",
        text: "Alamat ODP harus diisi lengkap.",
      });
      return;
    }
    if (!pic_ins_odpp) {
      Swal.fire({
        icon: "error",
        title: "PIC Kosong!",
        text: "Masukkan nama PIC instalasi.",
      });
      return;
    }
    if (!kabel_ins_odpp) {
      Swal.fire({
        icon: "error",
        title: "Jenis Kabel belum dipilih!",
        text: "Pilih jenis kabel yang digunakan.",
      });
      return;
    }
    if (!spltr_json || spltr_json === "[]" || spltr_json === null) {
  Swal.fire({
    icon: "error",
    title: "Status spliter belum dipilih!",
    text: "Lengkapi status spliter dulu.",
  });
  return;
}
    if (!status_ins_odp) {
      Swal.fire({
        icon: "error",
        title: "Status Instalasi belum dipilih!",
        text: "Pilih status instalasi ODP.",
      });
      return;
    }
    // Validasi
    if (!fotoFile) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Foto belum dipilih bro!",
      });
      return;
    }

    // Jika lolos semua validasi, lanjut proses file
    const reader = new FileReader();
    reader.onloadend = function () {
      const base64Image = reader.result;

      //alert (spltr_json); 

      const value = {
        key_odp_ins: $("#key_odp_ins").val(),
        id_ins_odp: $("#id_ins_odp").val(),
        nama_odp_ins,
        alamat_odp_ins,
        daerahe: $("#daerahe").val(),
        kd_prov: $("#kd_prov").val(),
        kd_kabkota: $("#kd_kabkota").val(),
        kd_kec: $("#kd_kec").val(),
        kd_kel: $("#kd_kel").val(),
        kd_layanan: $("#kd_layanan").val(),
        pic_ins_odpp,
        pic_ins_odpp2: $("#pic_ins_odpp2").val(),
       // spltr_ins,
        //spltr_ins2: $("#spltr_ins2").val(),
       //spltr_ins3: $("#spltr_ins3").val(),
        kabel_ins_odpp,
        lain_lainodp_ins: $("#lain_lainodp_ins").val(),
        lokasi_kapten_ins_odp: $("#lokasi_kapten_ins_odp").val(),
        status_ins_odp,
        latitude,
        longitude,
        kelurahan: $("#kelurahan").val(),
        kecamatan: $("#kecamatan").val(),
        kabupaten: $("#kabupaten").val(),
        provinsi: $("#provinsi").val(),
        spltr_json: spltr_json,
        foto_base64: base64Image,
      };

      $.ajax({
        type: "POST",
        url: "controller/action_edit_insodp_new.php",
        data: value,
        beforeSend: function () {
          Swal.fire({
            title: "Processing...",
            text: "Please wait while we process your request.",
            allowOutsideClick: false,
            showConfirmButton: false,
            didOpen: () => {
              Swal.showLoading();
            }
          });
        },
        success: function (data) {
          Swal.close();
          if (data == 1) {
            Swal.fire("Good job!", "Sukses Save Work Order", "success").then(
              function () {
                window.location.reload(true);
              }
            );
          } else if (data.startsWith("jam")) {
            let jamSlot = {
              jam1: "Slot Jam 6 - 8 penuh!!",
              jam2: "Slot Jam 8 - 10 penuh!!",
              jam3: "Slot Jam 10 - 12 penuh!!",
              jam4: "Slot Jam 13 - 15 penuh!!",
              jam5: "Slot Jam 15 - 17 penuh!!",
              jam6: "Slot Jam 18 - 20 penuh!!",
            };
            Swal.fire(
              "Error!",
              jamSlot[data] || "Slot tidak tersedia!",
              "error"
            );
          } else if (data == 101) {
            Swal.fire("Error!", "Error Query bro!!", "error");
          } else {
            Swal.fire("Error!", "Terjadi kesalahan tak dikenal!", "error");
          }
        },
      });
    };

    reader.readAsDataURL(fotoFile);
  });

  // create backbone
  $(document).on("click", ".save_solved_bckbn2", function () {
    //var nama_fal = $("#nama_fal").val();
    var key_mnt_bckbone = $("#key_mnt_bckbone").val();
    var pic_mnt_bckbone = $("#pic_mnt_bckbone").val();
    var pic_mnt_bckbone2 = $("#pic_mnt_bckbone2").val();
    var kabel_ins_bckbn = $("#kabel_ins_bckbn").val();
    var lain_lain_bckbn = $("#lain_lain_bckbn").val();
    var lokasi_kapten_mntn_bckbn = $("#lokasi_kapten_mntn_bckbn").val();
    var status_ins_bkbn = $("#status_ins_bkbn").val();
    var nama_mnt_bckbone = $("#nama_mnt_bckbone").val();
    //var nama_fal_mntn = $('#nama_fal_mntn').val();

    //alert(status_womntn); return;
    if (status_ins_odp == "") {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Status WO Maintenance ODP dipilih bro!",
      });
      return;
    } else if (lain_lainodp_ins == "") {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Keterangan Maintenance ODP dipilih bro!",
      });
      return;
    }

    //alert(kategori_maintenance); return;

    var value = {
      key_mnt_bckbone: key_mnt_bckbone,
      pic_mnt_bckbone: pic_mnt_bckbone,
      pic_mnt_bckbone2: pic_mnt_bckbone2,
      kabel_ins_bckbn: kabel_ins_bckbn,
      lain_lain_bckbn: lain_lain_bckbn,
      lokasi_kapten_mntn_bckbn: lokasi_kapten_mntn_bckbn,
      status_ins_bkbn: status_ins_bkbn,
      nama_mnt_bckbone: nama_mnt_bckbone,
    };

    $.ajax({
      type: "POST",
      async: false,
      url: "controller/action_edit_mntnbckbn_new.php",
      data: value,
      beforeSend: function () {
        Swal.fire({
          title: "Processing...",
          text: "Please wait while we process your request.",
          allowOutsideClick: false,
          showConfirmButton: false,
          didOpen: () => {
            Swal.showLoading();
          }
        });
      },
      success: function (data) {
        Swal.close();
        //alert(data);
        var a = data;
        if (a == 1) {
          Swal.fire("Good job!", "Sukses Save Work Order", "success").then(
            function (success) {
              window.location.reload(true);
            }
          );
        } else if (a == "jam1") {
          Swal.fire("Error!", "Slot Jam 6 - 8 penuh!!", "error").then(function (
            success
          ) {
            return;
          });
        } else if (a == "jam2") {
          Swal.fire("Error!", "Slot Jam 8 - 10 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "jam3") {
          Swal.fire("Error!", "Slot Jam 10 - 12 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "jam4") {
          Swal.fire("Error!", "Slot Jam 13 - 15 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "jam5") {
          Swal.fire("Error!", "Slot Jam 15 - 17 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "jam6") {
          Swal.fire("Error!", "Slot Jam 18 - 20 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == 101) {
          Swal.fire("Error!", "Error Query bro!!", "error").then(function (
            success
          ) {
            return;
          });
        }
      },
    });
  });

  // create distribusi
  $(document).on("click", ".save_solved_insdis", function () {
    var key_odp_ins_dis = $("#key_odp_ins_dis").val();
    var nama_ins_dis = $("#nama_ins_dis").val();
    var pic_ins_dis = $("#pic_ins_dis").val();
    var pic_ins_dis2 = $("#pic_ins_dis2").val();
    var jenis_kabel_dis = $("#jenis_kabel_dis").val();
    var kabel_ins_dis = $("#kabel_ins_dis").val();
    var lain_lain_insdis = $("#lain_lain_insdis").val();
    var lokasi_kapten_ins_dis = $("#lokasi_kapten_ins_dis").val();
    var status_ins_dis = $("#status_ins_dis").val();

    // Ambil data latitude dan longitude
    var latitude = $("#latitude").val();
    var longitude = $("#longitude").val();

    // Pastikan data koordinat sudah ada
    if (latitude == "" || longitude == "") {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Lokasi harus dipilih!",
      });
      return;
    }

    if (status_ins_dis == "") {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Status WO Maintenance ODP dipilih bro!",
      });
      return;
    } else if (lokasi_kapten_ins_dis == "") {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Lokasi Belum Aktif!",
      });
      return;
    } else if (lain_lain_insdis == "") {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Keterangan tidak boleh kosong!",
      });
      return;
    }

    // Kirim data ke server
    var value = {
      key_odp_ins_dis: key_odp_ins_dis,
      nama_ins_dis: nama_ins_dis,
      pic_ins_dis: pic_ins_dis,
      pic_ins_dis2: pic_ins_dis2,
      jenis_kabel_dis: jenis_kabel_dis,
      lain_lain_insdis: lain_lain_insdis,
      lokasi_kapten_ins_dis: lokasi_kapten_ins_dis,
      kabel_ins_dis: kabel_ins_dis,
      status_ins_dis: status_ins_dis,
      latitude: latitude, // Kirim data latitude
      longitude: longitude, // Kirim data longitude
    };

    $.ajax({
      type: "POST",
      async: false,
      url: "controller/action_edit_insdis_new.php",
      data: value,
      beforeSend: function () {
        Swal.fire({
          title: "Processing...",
          text: "Please wait while we process your request.",
          allowOutsideClick: false,
          showConfirmButton: false,
          didOpen: () => {
            Swal.showLoading();
          }
        });
      },
      success: function (data) {
        Swal.close();
        var a = data;
        if (a == 1) {
          Swal.fire("Good job!", "Sukses Save Work Order", "success").then(
            function (success) {
              window.location.reload(true);
            }
          );
        } else if (a == "jam1") {
          Swal.fire("Error!", "Slot Jam 6 - 8 penuh!!", "error").then(function (
            success
          ) {
            return;
          });
        } else if (a == "jam2") {
          Swal.fire("Error!", "Slot Jam 8 - 10 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "jam3") {
          Swal.fire("Error!", "Slot Jam 10 - 12 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "jam4") {
          Swal.fire("Error!", "Slot Jam 13 - 15 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "jam5") {
          Swal.fire("Error!", "Slot Jam 15 - 17 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "jam6") {
          Swal.fire("Error!", "Slot Jam 18 - 20 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == 101) {
          Swal.fire("Error!", "Error Query bro!!", "error").then(function (
            success
          ) {
            return;
          });
        }
      },
    });
  });

  $(document).on("click", ".save_solved_bckbn", function () {
    //var nama_fal = $("#nama_fal").val();
    var key_odp_ins_dis = $("#key_odp_ins_dis").val();
    var nama_ins_dis = $("#nama_ins_dis").val();
    var pic_ins_dis = $("#pic_ins_dis").val();
    var pic_ins_dis2 = $("#pic_ins_dis2").val();
    var jenis_kabel_dis = $("#jenis_kabel_dis").val();
    var kabel_ins_dis = $("#kabel_ins_dis").val();
    var lain_lain_insdis = $("#lain_lain_insdis").val();
    var lokasi_kapten_ins_dis = $("#lokasi_kapten_ins_dis").val();
    var status_ins_dis = $("#status_ins_dis").val();

    //alert(status_womntn); return;
    if (status_ins_dis == "") {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Status WO Maintenance ODP dipilih bro!",
      });
      return;
    } else if (lokasi_kapten_ins_dis == "") {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Lokasi Belum Aktif!",
      });
      return;
    }

    //alert(kategori_maintenance); return;

    var value = {
      key_odp_ins_dis: key_odp_ins_dis,
      nama_ins_dis: nama_ins_dis,
      pic_ins_dis: pic_ins_dis,
      pic_ins_dis2: pic_ins_dis2,
      jenis_kabel_dis: jenis_kabel_dis,
      lain_lain_insdis: lain_lain_insdis,
      lokasi_kapten_ins_dis: lokasi_kapten_ins_dis,
      kabel_ins_dis: kabel_ins_dis,
      status_ins_dis: status_ins_dis,
    };

    $.ajax({
      type: "POST",
      async: false,
      url: "controller/action_edit_insdis_new.php",
      data: value,
      success: function (data) {
        //alert(data);
        var a = data;
        if (a == 1) {
          Swal.fire("Good job!", "Sukses Save Work Order", "success").then(
            function (success) {
              window.location.reload(true);
            }
          );
        } else if (a == "jam1") {
          Swal.fire("Error!", "Slot Jam 6 - 8 penuh!!", "error").then(function (
            success
          ) {
            return;
          });
        } else if (a == "jam2") {
          Swal.fire("Error!", "Slot Jam 8 - 10 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "jam3") {
          Swal.fire("Error!", "Slot Jam 10 - 12 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "jam4") {
          Swal.fire("Error!", "Slot Jam 13 - 15 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "jam5") {
          Swal.fire("Error!", "Slot Jam 15 - 17 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "jam6") {
          Swal.fire("Error!", "Slot Jam 18 - 20 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == 101) {
          Swal.fire("Error!", "Error Query bro!!", "error").then(function (
            success
          ) {
            return;
          });
        }
      },
    });
  });

  $(document).on("click", ".addts", function () {
    var date_wo = $(this).attr("tes");
    var start = $(this).attr("start2");
    var end = $(this).attr("end");

    $("#modal_slot_unified").modal("show");

    // Gunakan .find() dalam modal
    var modal = $("#modal_slot_unified");

    modal.find(".date_wo").val(date_wo);
    modal.find(".start").val(start);
    modal.find(".end").val(end);
    
    console.log('VALUES SET:', {
      date_wo_val: modal.find(".date_wo").val(),
      start_val: modal.find(".start").val(),
      end_val: modal.find(".end").val()
    });
  });

  $(document).on("click", ".list_sign", function () {
    //alert ('tes'); return;
    var date_wo = $(this).attr("tanggal");
    var start = $(this).attr("start");
    var end = $(this).attr("end");
    //alert (start);
    $("#date_wo_ts").val(date_wo);
    $("#start").val(start);
    if (start == "06:00:00") {
      $("#modal_sign1").modal("show");
    } else if (start == "08:00:00") {
      $("#modal_sign2").modal("show");
    } else if (start == "10:00:00") {
      $("#modal_sign3").modal("show");
    } else if (start == "13:00:00") {
      $("#modal_sign4").modal("show");
    } else if (start == "15:00:00") {
      $("#modal_sign5").modal("show");
    } else if (start == "18:00:00") {
      $("#modal_sign6").modal("show");
    }
  });

  $(document).on("click", ".list_signp", function () {
    var date_wo = $(this).attr("tanggal");
    var start = $(this).attr("start");
    var end = $(this).attr("end");
    
    console.log('Clicked signp:', {date_wo, start, end});
    
    $("#date_wo_ts").val(date_wo);
    $("#start").val(start);
    
    // Tampilkan modal unified
    $("#modal_sign_pas_unified").modal("show");
    
    // Set slot waktu dan load data setelah modal terbuka
    $("#modal_sign_pas_unified").on('shown.bs.modal', function() {
      var timeSlot = start + "-" + end;
      console.log('Setting timeSlot:', timeSlot);
      $("#sign_pas_time_slot_filter").val(timeSlot);
      loadSignPasTimeSlotData(timeSlot, date_wo);
      $(this).off('shown.bs.modal'); // Remove event after use
    });
  });

  $(document).on("click", ".list_pros", function () {
    var date_wo = $(this).attr("tanggal");
    var start = $(this).attr("start");
    var end = $(this).attr("end");
    
    $("#date_wo_ts").val(date_wo);
    $("#start").val(start);
    
    if (start == "06:00:00") {
      $("#modal_pros1").modal("show");
    } else if (start == "08:00:00") {
      $("#modal_pros2").modal("show");
    } else if (start == "10:00:00") {
      $("#modal_pros3").modal("show");
    } else if (start == "13:00:00") {
      $("#modal_pros4").modal("show");
    } else if (start == "15:00:00") {
      $("#modal_pros5").modal("show");
    } else if (start == "18:00:00") {
      $("#modal_pros6").modal("show");
    }
  });

  $(document).on("click", ".list_pros_pas", function () {
    var date_wo = $(this).attr("tanggal");
    var start = $(this).attr("start");
    var end = $(this).attr("end");
    
    console.log('Clicked pros_pas:', {date_wo, start, end});
    
    $("#date_wo_ts").val(date_wo);
    $("#start").val(start);
    
    // Tampilkan modal unified
    $("#modal_proses_pas_unified").modal("show");
    
    // Set slot waktu dan load data setelah modal terbuka
    $("#modal_proses_pas_unified").on('shown.bs.modal', function() {
      var timeSlot = start + "-" + end;
      console.log('Setting timeSlot:', timeSlot);
      $("#proses_pas_time_slot_filter").val(timeSlot);
      loadProsesPasTimeSlotData(timeSlot, date_wo);
      $(this).off('shown.bs.modal'); // Remove event after use
    });
  });

  $(document).on("click", ".list_solved", function () {
    //alert ('tes'); return;
    var date_wo = $(this).attr("tanggal");
    var start = $(this).attr("start");
    var end = $(this).attr("end");
    //alert (start);
    $("#date_wo_ts").val(date_wo);
    $("#start").val(start);
    if (start == "06:00:00") {
      $("#modal_solv1").modal("show");
    } else if (start == "08:00:00") {
      $("#modal_solv2").modal("show");
    } else if (start == "10:00:00") {
      $("#modal_solv3").modal("show");
    } else if (start == "13:00:00") {
      $("#modal_solv4").modal("show");
    } else if (start == "15:00:00") {
      $("#modal_solv5").modal("show");
    } else if (start == "18:00:00") {
      $("#modal_solv6").modal("show");
    }
  });

  $(document).on("click", ".add", function () {
    var date_wo = $(this).attr("tanggal");
    var start = $(this).attr("start");
    var end = $(this).attr("end");

    $("#modal_post_wo").modal("show");

    // Gunakan .find() dalam modal
    var modal = $("#modal_post_wo");

    modal.find(".date_wo").val(date_wo);
    modal.find(".start").val(start);
    modal.find(".end").val(end);
  });

  $(document).on("click", ".close", function () {
    $("#modaltambahdata").modal("hide");
  });

  $(document).on("click", ".insertmntn", function () {
    $("#modaltambahdatamnt").modal("show");
  });

  $(document).on("click", ".insertmntnodp", function () {
    $("#modaltambahdatamntodp").modal("show");
  });

  $(document).on("click", ".insertmntbckbone", function () {
    $("#modal_backbone").modal("show");
  });

  $(document).on("click", ".insert_gamas", function () {
    $("#modalgamas").modal("show");
  });

  $(document).on("click", ".insertinsodp", function () {
    $("#modaltambahinsodp").modal("show");
  });

  $(document).on("click", ".insertinsdis", function () {
    $("#modaltambahinsdis").modal("show");
  });

  $(document).on("click", ".insertinscor", function () {
    $("#modaltambahinscor").modal("show");
  });

  //get data value kapten
  $(document).on("click", ".editpendaftaran", function () {
    //alert($(this).data('id'));
    var key_fal = $(this).attr("key_fal");
    var nama_lengkap = $(this).attr("nama_lengkap");
    var no_wa = $(this).attr("no_wa");
    var no_wa2 = $(this).attr("no_wa2");
    var no_wa3 = $(this).attr("no_wa3");
    var no_wa4 = $(this).attr("no_wa4");
    var alamat = $(this).attr("alamat");
    var rt1 = $(this).attr("rt1");
    var rw = $(this).attr("rw");
    var provinsi = $(this).attr("provinsi");
    var kabupaten = $(this).attr("kabupaten");
    var kecamatan = $(this).attr("kecamatan");
    var kelurahan = $(this).attr("kelurahan");
    var foto_rumah = $(this).attr("foto_rumah");
    var foto_ktp = $(this).attr("foto_ktp");
    var paket_kapten = $(this).attr("paket_kapten");
    var lokasi = $(this).attr("lokasi");
    var status_lokasi = $(this).attr("status_lokasi");
    var tahu_layanan = $(this).attr("tahu_layanan");
    var alasan = $(this).attr("alasan");
    var metode_pembayaran = $(this).attr("metode_pembayaran");
    var no_rekening = $(this).attr("no_rekening");
    var nama_sobat = $(this).attr("nama_sobat");
    var layanan = $(this).attr("layanan");
    var mgm = $(this).attr("mgm");
    const date_wo = $("#modal_post_wo").find(".date_wo").val();
    //var date_wo_pas = $("#date_wo_pas").val();
    var date_end = $("#end").val();
    //var end_pas = $("#end_pas").val();
    //.alert($(this).data('key'));

    /* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
				var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
				var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
				var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
				var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
				var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
    //alert (status_pendaftaran); return;

    $("#modaltambahdata").modal("show");
    $("#nama_fal").val(nama_lengkap);
    $("#no_wa").val(no_wa);
    $("#no_wa2").val(no_wa2);
    $("#no_wa3").val(no_wa3);
    $("#no_wa4").val(no_wa4);
    $("#paket_fal").val(paket_kapten);
    $("#alamat_fal").val(alamat);
    $("#rt").val(rt1);
    $("#rw").val(rw);
    $("#kelurahan").val(kelurahan);
    $("#kecamatan").val(kecamatan);
    $("#kabupaten").val(kabupaten);
    $("#provinsi").val(provinsi);
    $("#foto_rumah").val(foto_rumah);
    $("#foto_ktp").val(foto_ktp);
    $("#lokasi").val(lokasi);
    $("#key_fal").val(key_fal);
    $("#status_lokasi").val(status_lokasi);
    $("#tahu_layanan").val(tahu_layanan);
    $("#alasan").val(alasan);
    $("#metode_pembayaran").val(metode_pembayaran);
    $("#no_rekening").val(no_rekening);
    $("#nama_sobat").val(nama_sobat);
    $("#tgl_fal_datetime_ikr").val(date_wo);
    //$('#tgl_fal_datetime_ikr').val(date_wo_pas);
    $("#end").val(date_end);
    //$('#end').val(end_pas);
    $("#mgm").val(mgm);
    $("#layanan").val(layanan);
  });

  //get data value kapten
  $(document).on("click", ".postwo", function () {
    //alert($(this).data('id'));
    //alert ('tes'); return;
    var id = $(this).attr("id");
    const date_wo = $("#modal_post_wo").find(".date_wo").val();
    //var date_wo_pas = $("#date_wo_pas").val();
    var date_end = $("#end").val();
    //var date_end_pas = $("#end_pas").val();
    var id_user = $(this).attr("id_user");
    var nama_kom = $(this).attr("nama_kom");
    var tlp_kom = $(this).attr("tlp_kom");
    var kd_kom = $(this).attr("kd_kom");
    var jenis_produk = $(this).attr("jenis_produk");
    var kelurahan = $(this).attr("kelurahan");
    var kategori_kompline = $(this).attr("kategori_kompline");
    var alamat = $(this).attr("alamat");
    var keluhan_deskripsi = $(this).attr("keluhan_deskripsi");
    var handle_kompline = $(this).attr("handle_kompline");
    var keterangan_solving = $(this).attr("keterangan_solving");
    var kategori_solving = $(this).attr("kategori_solving");
    //alert (nama_kom); return;
    /* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
				var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
				var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
				var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
				var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
				var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
    //alert (id); return;

    $("#modal_post_mntn").modal("show");
    $("#idpost").val(id);
    $("#nama_kom_post").val(nama_kom);
    $("#kd_kom_post").val(kd_kom);
    $("#jenis_produk_post").val(jenis_produk);
    $("#tlp_kom_post").val(tlp_kom);
    $("#kelurahan_post").val(kelurahan);
    $("#id_user_post").val(id_user);
    $("#kategori_kompline_post").val(kategori_kompline);
    $("#alamat_post").val(alamat);
    $("#keluhan_deskripsi_post").val(keluhan_deskripsi);
    $("#handle_kompline_post").val(handle_kompline);
    $("#keterangan_solving_post").val(keterangan_solving);
    $("#kategori_solving_post").val(kategori_solving);
    $("#date_wo_post_mntn").val(date_wo);
    //$('#date_wo_post_mntn').val(date_wo_pas);
    $("#date_end_mntn").val(date_end);
    //$('#date_end_mntn').val(date_end_pas);
  });

  $(document).on("click", ".action_post_ikr", function () {
    //alert ('a'); return;
    // Mendapatkan nilai dari elemen HTML
    const key_fal = $("#key_fal").val();
    const nama_fal = $("#nama_fal").val();
    const pic_ikr = $("#pic_ikr").val();
    const kd_layanan = $("#kd_layanan").val();
    const alamat_fal = $("#alamat_fal").val();
    const rt = $("#rt").val();
    const rw = $("#rw").val();
    const kelurahan = $("#kelurahan").val();
    const provinsi = $("#provinsi").val();
    const kabupaten = $("#kabupaten").val();
    const kecamatan = $("#kecamatan").val();
    const lokasi = $("#lokasi").val();
    const foto_rumah = $("#foto_rumah").val();
    const foto_ktp = $("#foto_ktp").val();
    const no_wa = $("#no_wa").val();
    const no_wa2 = $("#no_wa2").val();
    const no_wa3 = $("#no_wa3").val();
    const no_wa4 = $("#no_wa4").val();
    const end = $("#end").val();
    const paket_fal = $("#paket_fal").val();
    const pic = $("#pic").val();
    const status = $("#status").val();
    const status2 = $("#status2").val();
    const jenis_wo = $("#jenis_wo").val();
    const produk = $("#produk").val();
    const username_fal = $("#username_fal").val();
    const password_fal = $("#password_fal").val();
    const lain_lain = $("#lain_lain").val();
    const status_wo = $("#status_wo").val();
    const ket_user = $("#lain_lain").val();
    const pembayaran = $("#pembayaran").val();
    const perlakuan = $("#perlakuan").val();
    const free = $("#free").val();
    const pindah_alamat = $("#pindah_alamat").val();
    const total_diskon = $("#total_diskon").val();
    const keterangan_angsuran = $("#keterangan_angsuran").val();
    const verified = $("#verified").val();
    const letak_odp = $("#letak_odp").val();
    const status_lokasi = $("#status_lokasi").val();
    const tahu_layanan = $("#tahu_layanan").val();
    const alasan = $("#alasan").val();
    const nama_sobat = $("#nama_sobat").val();
    const metode_pembayaran = $("#metode_pembayaran").val();
    const no_rekening = $("#no_rekening").val();
    const mgm = $("#mgm").val();
    const layanan = $("#layanan").val();
    const tgl_fal_datetime_ikr = $("#tgl_fal_datetime_ikr").val();
    const total = free + total_diskon + pindah_alamat;
    //alert (layanan); return;

    // Membuat objek value
    const value = {
      key_fal: key_fal,
      nama_fal: nama_fal,
      kd_layanan: kd_layanan,
      alamat_fal: alamat_fal,
      rt: rt,
      rw: rw,
      pic_ikr: pic_ikr,
      kelurahan: kelurahan,
      provinsi: provinsi,
      kabupaten: kabupaten,
      kecamatan: kecamatan,
      lokasi: lokasi,
      foto_rumah: foto_rumah,
      foto_ktp: foto_ktp,
      no_wa: no_wa,
      no_wa2: no_wa2,
      no_wa3: no_wa3,
      no_wa4: no_wa4,
      end: end,
      paket_fal: paket_fal,
      pic: pic,
      status: status,
      status2: status2,
      jenis_wo: jenis_wo,
      produk: produk,
      username_fal: username_fal,
      password_fal: password_fal,
      lain_lain: lain_lain,
      status_wo: status_wo,
      ket_user: ket_user,
      pembayaran: pembayaran,
      perlakuan: perlakuan,
      free: free,
      pindah_alamat: pindah_alamat,
      total_diskon: total_diskon,
      keterangan_angsuran: keterangan_angsuran,
      verified: verified,
      letak_odp: letak_odp,
      status_lokasi: status_lokasi,
      tahu_layanan: tahu_layanan,
      alasan: alasan,
      nama_sobat: nama_sobat,
      metode_pembayaran: metode_pembayaran,
      no_rekening: no_rekening,
      mgm: mgm,
      tgl_fal_datetime_ikr: tgl_fal_datetime_ikr,
      layanan: layanan,
      total: total,
    };

    // Mengonversi objek value ke string query
    const params = new URLSearchParams(value).toString();

    Swal.fire({
      title: "Detail Aprove Reguler",
      html:
        "<br>ID User : " +
        username_fal +
        "<br>Nama : " +
        nama_fal +
        "<br> Alamat : " +
        alamat_fal,
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, verified it!",
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          title: "Processing...",
          text: "Please wait while we verify the data.",
          allowOutsideClick: false,
          didOpen: () => {
            Swal.showLoading();
          },
        });

        // AJAX request
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "controller/action_post_wo_newversi.php", true);
        xhr.setRequestHeader(
          "Content-Type",
          "application/x-www-form-urlencoded"
        );
        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4) {
            Swal.hideLoading();
            if (xhr.status === 200) {
              const response = xhr.responseText.trim();
              if (response == "1") {
                Swal.fire({
                  title: "Good job!",
                  text: "Sukses Sign Work Order",
                  icon: "success",
                  confirmButtonText: "OK"
                }).then(function () {
                  window.location.reload(true);
                });
              } else if (response == "jam1") {
                Swal.fire({title: "Error!", text: "Slot Jam 6 - 8 penuh!!", icon: "error", confirmButtonText: "OK"});
              } else if (response == "jam2") {
                Swal.fire({title: "Error!", text: "Slot Jam 8 - 10 penuh!!", icon: "error", confirmButtonText: "OK"});
              } else if (response == "jam3") {
                Swal.fire({title: "Error!", text: "Slot Jam 10 - 12 penuh!!", icon: "error", confirmButtonText: "OK"});
              } else if (response == "jam4") {
                Swal.fire({title: "Error!", text: "Slot Jam 13 - 15 penuh!!", icon: "error", confirmButtonText: "OK"});
              } else if (response == "jam5") {
                Swal.fire({title: "Error!", text: "Slot Jam 15 - 17 penuh!!", icon: "error", confirmButtonText: "OK"});
              } else if (response == "jam6") {
                Swal.fire({title: "Error!", text: "Slot Jam 18 - 20 penuh!!", icon: "error", confirmButtonText: "OK"});
              } else if (response == "Error") {
                Swal.fire({title: "Error!", text: "Error Query bro!!", icon: "error", confirmButtonText: "OK"});
              } else if (response == "Error2") {
                Swal.fire({title: "Error!", text: "Error Koneksi bro!!", icon: "error", confirmButtonText: "OK"});
              } else {
                Swal.fire({title: "Error!", text: response, icon: "error", confirmButtonText: "OK"});
              }
            } else {
              Swal.fire("Error!", "Failed to process the request!", "error");
            }
          }
        };
        xhr.send(params); // Kirim data menggunakan string query
      }
    });
  });

  $(document).on("click", ".set_wo", function () {
    // Mendapatkan nilai dari elemen HTML
    const username_fal = $(this).attr("username_fal");
    const date_wo = $("#modal_post_wo").find(".date_wo").val();
    const date_end = $("#end").val();
    const nama_fal = $(this).attr("nama_fal");
    const alamat_fal = $(this).attr("alamat_fal");
    const kd_layanan = $(this).attr("kd_layanan");
    const telp_fal = $(this).attr("telp_fal");

    //alert (date_wo); return;

    // Membuat objek value
    const value = {
      username_fal: username_fal,
      nama_fal: nama_fal,
      kd_layanan: kd_layanan,
      alamat_fal: alamat_fal,
      date_wo: date_wo,
      date_end: date_end,
      telp_fal: telp_fal,
    };

    // Mengonversi objek value ke string query
    const params = new URLSearchParams(value).toString();

    Swal.fire({
      title: "Detail IKR",
      html: `
            <br>ID User: ${username_fal}
            <br>Nama: ${nama_fal}
            <br>Alamat: ${alamat_fal}
            <br>No Telp: ${telp_fal}
            <br>Layanan: ${kd_layanan}
            <br>Tanggal dipasang: ${date_wo}
        `,
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, verify it!!",
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          title: "Processing...",
          text: "Please wait while we verify the data.",
          allowOutsideClick: false,
          didOpen: () => {
            Swal.showLoading();
          },
        });

        // AJAX request
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "controller/action_wo_sign.php", true);
        xhr.setRequestHeader(
          "Content-Type",
          "application/x-www-form-urlencoded"
        );
        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4) {
            Swal.hideLoading();
            if (xhr.status === 200) {
              const response = xhr.responseText.trim();
              if (response === "1") {
                Swal.fire({
                  title: "Good job!",
                  text: "Sukses Sign Work Order",
                  icon: "success",
                  confirmButtonText: "OK"
                }).then(function () {
                  window.location.reload(true);
                });
              } else {
                Swal.fire({
                  title: "Error!",
                  text: response,
                  icon: "error",
                  confirmButtonText: "OK"
                });
              }
            } else {
              Swal.fire("Error!", "Failed to process the request!", "error");
            }
          }
        };
        xhr.send(params); // Kirim data menggunakan string query
      }
    });
  });

  // INSERT
  $(document).on("click", ".actionmntn_odp", function () {
    var jenis_pekerjaan_mntnodp = $("#jenis_pekerjaan_mntnodp").val();
    var kode_odp = $("#kode_odp").val();
    var nama_mntodp = $("#nama_mntodp").val();
    var kd_layanan_mntodp = $("#kd_layanan_mntodp").val();
    var kd_layanan2 = $("#kd_layanan2").val();
    var kelurahan_mntodp = $("#kelurahan_mntodp").val();
    var lain_lain_mntnodp = $("#lain_lain_mntnodp").val();
    const date_wo = $("#modal_post_wo").find(".date_wo").val();

    if (kode_odp == "") {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Kode Odp Belum Terisi!",
      });
      return;
    }

    var value = {
      jenis_pekerjaan_mntnodp: jenis_pekerjaan_mntnodp,
      kode_odp: kode_odp,
      nama_mntodp: nama_mntodp,
      kd_layanan_mntodp: kd_layanan_mntodp,
      kd_layanan2: kd_layanan2,
      kelurahan_mntodp: kelurahan_mntodp,
      lain_lain_mntnodp: lain_lain_mntnodp,
      date_wo: date_wo,
    };

    $.ajax({
      type: "POST",
      async: false,
      url: "controller/action_insert_mntnodp_new.php",
      data: value,
      success: function (data) {
        if (data == 1) {
          Swal.fire("Good job!", "Sukses Sign Work Order", "success").then(function () {
            window.location.reload(true);
          });
        } else {
          Swal.fire("Error!", data, "error");
        }
      },
    });
  });

  // INSERT
  $(document).on("click", ".actionmntn_bckbn", function () {
    //alert ('tes'); return;
    var nama_mntbcbon = $("#nama_mntbcbon").val();

    var kd_layanan_mntbckbn = $("#kd_layanan_mntbckbn").val();

    var alamat_mntbckbn = $("#alamat_mntbckbn").val();

    var kelurahan_mntbckbn = $("#kelurahan_mntbckbn").val();

    var lain_lain_mntnbckbn = $("#lain_lain_mntnbckbn").val();
    const date_wo = $("#modal_post_wo").find(".date_wo").val();

    //alert(paket_fal); return;

    if (kd_layanan_mntbckbn == "") {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Kode Layanan Belum Terisi!",
      });
      return;
    } else if (nama_mntbcbon == "") {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Nama Pekerjaan Belum Terisi!",
      });
      return;
    } else if (alamat_mntbckbn == "") {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Alamat Belum Terisi!",
      });
      return;
    } else if (kelurahan == "") {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Kelurahan Belum Terisi!",
      });
      return;
    } else if (lain_lain_mntnbckbn == "") {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Keterangan Belum Terisi!",
      });
      return;
    }

    /*		 
			if(username_Maintenance == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Username Belum Terisi!',				  
				}) 
				return
			} */

    //alert(get_distribusi); return;

    var value = {
      kd_layanan_mntbckbn: kd_layanan_mntbckbn,
      nama_mntbcbon: nama_mntbcbon,
      kelurahan_mntbckbn: kelurahan_mntbckbn,
      lain_lain_mntnbckbn: lain_lain_mntnbckbn,
      alamat_mntbckbn: alamat_mntbckbn,
      date_wo: date_wo,
    };

    $.ajax({
      type: "POST",
      async: false,
      url: "controller/action_insert_mntnbckb_new.php",
      data: value,
      success: function (data) {
        //alert(data);
        Swal.fire("Good job!", data, "success").then(function (success) {
          //if (data == 'succes') {
          //alert('a');
          window.location.reload(true);
          //}
        });
      },
    });
  });

  $(document).on("click", ".action_post_kap_mntn", function () {
    var id = $("#idpost").val();
    var id_user = $("#id_user_post").val();
    var nama_kom = $("#nama_kom_post").val();
    var kd_kom = $("#kd_kom_post").val();
    var tlp_kom = $("#tlp_kom_post").val();
    var kelurahan = $("#kelurahan_post").val();
    var jenis_produk = $("#jenis_produk_post").val();
    var alamat = $("#alamat_post").val();
    var status = $("#status_post").val();
    var kategori_solving = $("#kategori_solving_post").val();
    var keterangan_solving = $("#keterangan_solving_post").val();
    var ktg_ind_mslh = $("#ktg_ind_mslh").val();
    var tanggal_wo = $("#date_wo_post_mntn").val();
    var date_end_mntn = $("#date_end_mntn").val();
    var jadwal = $("#jadwal").val();

    var value = {
      id: id,
      status: status,
      nama_kom: nama_kom,
      tlp_kom: tlp_kom,
      kd_kom: kd_kom,
      alamat: alamat,
      kelurahan: kelurahan,
      jenis_produk: jenis_produk,
      id_user: id_user,
      kategori_solving: kategori_solving,
      keterangan_solving: keterangan_solving,
      ktg_ind_mslh: ktg_ind_mslh,
      tanggal_wo: tanggal_wo,
      jadwal: jadwal,
      date_end_mntn: date_end_mntn,
    };

    $.ajax({
      type: "POST",
      async: false,
      url: "controller/action_post_wo_mntn.php",
      data: value,
      beforeSend: function () {
        Swal.fire({
          title: "Processing...",
          text: "Please wait while we process your request.",
          allowOutsideClick: false,
          didOpen: () => {
            Swal.showLoading();
          },
        });
      },
      success: function (data) {
        var a = data;
        console.log(a);
        if (a == 1) {
          Swal.fire("Good job!", "Sukses Sign Work Order", "success").then(
            function (success) {
              window.location.reload(true);
            }
          );
        } else if (a == "jam1") {
          Swal.fire("Error!", "Slot Jam 6 - 8 penuh!!", "error").then(function (
            success
          ) {
            return;
          });
        } else if (a == "jam2") {
          Swal.fire("Error!", "Slot Jam 8 - 10 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "jam3") {
          Swal.fire("Error!", "Slot Jam 10 - 12 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "jam4") {
          Swal.fire("Error!", "Slot Jam 13 - 15 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "jam5") {
          Swal.fire("Error!", "Slot Jam 15 - 17 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "jam6") {
          Swal.fire("Error!", "Slot Jam 18 - 20 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "Error") {
          Swal.fire("Error!", "Error Query bro!!", "error").then(function (
            success
          ) {
            return;
          });
        } else if (a == "Error2") {
          Swal.fire("Error!", "Error Koneksi bro!!", "error").then(function (
            success
          ) {
            return;
          });
        }
      },
      error: function () {
        Swal.fire("Error!", "Failed to process the request!", "error");
      },
    });
  });

  // INSERT
  $(document).on("click", ".actionmntn", function () {
    var username_Maintenance_mnt1 = $("#username_Maintenance_mnt1").val();
    var nama_mnt1 = $("#nama_mnt1").val();
    var tlp_mnt1 = $("#tlp_mnt1").val();
    var alamat_mnt1 = $("#alamat_mnt1").val();
    var kd_layanan_mnt1 = $("#kd_layanan_mnt1").val();
    var kelurahan_mnt1 = $("#kelurahan_mnt1").val();
    const date_wo = $("#modal_post_wo").find(".date_wo").val();
    //var date_wo = $("#date_wo_pas").val();
    var lain_lain_mnt1 = $("#lain_lain_mnt1").val();
    var produk_mnt1 = $("#produk_mnt1").val();

    //alert(date_wo); return;

    if (lain_lain_mnt1 == "") {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Keterangan Belum Terisi!",
      });
      return;
    } else if (kd_layanan_mnt1 == "") {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Pilih layanan dulu!",
      });
      return;
    }
    /*		 
			if(username_Maintenance == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Username Belum Terisi!',				  
				}) 
				return
			} */

    //alert(get_distribusi); return;

    var value = {
      username_Maintenance_mnt1: username_Maintenance_mnt1,
      nama_mnt1: nama_mnt1,
      tlp_mnt1: tlp_mnt1,
      alamat_mnt1: alamat_mnt1,
      kd_layanan_mnt1: kd_layanan_mnt1,
      kelurahan_mnt1: kelurahan_mnt1,
      date_wo: date_wo,
      lain_lain_mnt1: lain_lain_mnt1,
      produk_mnt1: produk_mnt1,
    };

    $.ajax({
      type: "POST",
      async: false,
      url: "controller/action_insert_mntn_new.php",
      data: value,
      success: function (data) {
        //alert(data);
        var a = data;
        //console.log(a);
        if (a == 1) {
          Swal.fire("Good job!", "Sukses Sign Work Order", "success").then(
            function (success) {
              window.location.reload(true);
            }
          );
        } else if (a == "jam1") {
          Swal.fire("Error!", "Slot Jam 6 - 8 penuh!!", "error").then(function (
            success
          ) {
            return;
          });
        } else if (a == "jam2") {
          Swal.fire("Error!", "Slot Jam 8 - 10 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "jam3") {
          Swal.fire("Error!", "Slot Jam 10 - 12 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "jam4") {
          Swal.fire("Error!", "Slot Jam 13 - 15 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "jam5") {
          Swal.fire("Error!", "Slot Jam 15 - 17 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "jam6") {
          Swal.fire("Error!", "Slot Jam 18 - 20 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "Error") {
          Swal.fire("Error!", "Error Query bro!!", "error").then(function (
            success
          ) {
            return;
          });
        } else if (a == "Error2") {
          Swal.fire("Error!", "Error Koneksi bro!!", "error").then(function (
            success
          ) {
            return;
          });
        }
      },
    });
  });

  // INSERT
  $(document).on("click", ".action_ins_odp", function () {
    //alert ('a'); return;
    var odp = $("#odp").val();
    var id_odp = $("#id_odp").val();
    //var nama_odp = $("#nama_odp").val();
    //var alamat_odp = $("#alamat_odp").val();
    var lain_lain_odp = $("#lain_lain_odp").val();
    //var kelurahan_odp = $("#kelurahan_odp").val();
    const date_wo = $("#modal_post_wo").find(".date_wo").val();
    //  var date_wo = $("#date_wo_pas").val();
    //alert (date_wo); return;

    if (odp == "MLG") {
      var kd_layanan = "mlg";
    } else if (odp == "PAS") {
      var kd_layanan = "pas";
    } else if (odp == "BTU") {
      var kd_layanan = "batu";
    } else if (odp == "JAL") {
      var kd_layanan = "mlg1";
    } else {
      var kd_layanan = "mlg";
    }
    //alert(kd_layanan); return;

    /* 		if(jenis_pekerjaan == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Jenis Pekerjaan Belum Terisi!',				  
				}) 
				return
			} 
			 
			if(username_Maintenance == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Username Belum Terisi!',				  
				}) 
				return
			} */

    //alert(get_distribusi); return;

    var value = {
      kd_layanan: kd_layanan,
      odp: id_odp,
      //nama_odp:nama_odp,
      //alamat_odp:alamat_odp,
      lain_lain_odp: lain_lain_odp,
      //kelurahan_odp:kelurahan_odp,
      date_wo: date_wo,
    };

    $.ajax({
      type: "POST",
      async: false,
      url: "controller/action_insert_insodp_new.php",
      data: value,
      success: function (data) {
        //alert(data);
        var a = data;
        console.log(a);
        if (a == 1) {
          Swal.fire("Good job!", "Sukses Sign Work Order", "success").then(
            function (success) {
              window.location.reload(true);
            }
          );
        } else if (a == "jam1") {
          Swal.fire("Error!", "Slot Jam 6 - 8 penuh!!", "error").then(function (
            success
          ) {
            return;
          });
        } else if (a == "jam2") {
          Swal.fire("Error!", "Slot Jam 8 - 10 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "jam3") {
          Swal.fire("Error!", "Slot Jam 10 - 12 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "jam4") {
          Swal.fire("Error!", "Slot Jam 13 - 15 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "jam5") {
          Swal.fire("Error!", "Slot Jam 15 - 17 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "jam6") {
          Swal.fire("Error!", "Slot Jam 18 - 20 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "Error") {
          Swal.fire("Error!", "Error Query bro!!", "error").then(function (
            success
          ) {
            return;
          });
        } else if (a == "Error2") {
          Swal.fire("Error!", "Error Koneksi bro!!", "error").then(function (
            success
          ) {
            return;
          });
        }
      },
    });
  });

  // INSERT
  $(document).on("click", ".action_ins_dis", function () {
    var jenis_pekerjaan_dis = $("#jenis_pekerjaan_dis").val();
    var odp_induk = $("#odp_induk_dis").val();
    var nama_dis = $("#nama_dis").val();
    var alamat_dis = $("#alamat_dis").val();
    var lain_lain_dis = $("#lain_lain_dis").val();
    const date_wo = $("#modal_post_wo").find(".date_wo").val();
    var kd_layanan2 = $("#kd_layanan2").val();

    var value = {
      jenis_pekerjaan_dis: jenis_pekerjaan_dis,
      odp_induk: odp_induk,
      nama_dis: nama_dis,
      alamat_dis: alamat_dis,
      lain_lain_dis: lain_lain_dis,
      date_wo: date_wo,
      kd_layanan2: kd_layanan2,
    };

    $.ajax({
      type: "POST",
      async: false,
      url: "controller/action_insert_dis_new.php",
      data: value,
      success: function (data) {
        var a = data;
        console.log(a);
        if (a == 1) {
          Swal.fire("Good job!", "Sukses Sign Work Order", "success").then(
            function (success) {
              window.location.reload(true);
            }
          );
        } else if (a == "jam1") {
          Swal.fire("Error!", "Slot Jam 6 - 8 penuh!!", "error");
        } else if (a == "jam2") {
          Swal.fire("Error!", "Slot Jam 8 - 10 penuh!!", "error");
        } else if (a == "jam3") {
          Swal.fire("Error!", "Slot Jam 10 - 12 penuh!!", "error");
        } else if (a == "jam4") {
          Swal.fire("Error!", "Slot Jam 13 - 15 penuh!!", "error");
        } else if (a == "jam5") {
          Swal.fire("Error!", "Slot Jam 15 - 17 penuh!!", "error");
        } else if (a == "jam6") {
          Swal.fire("Error!", "Slot Jam 18 - 20 penuh!!", "error");
        } else if (a == "Error") {
          Swal.fire("Error!", "Error Query bro!!", "error");
        } else if (a == "Error2") {
          Swal.fire("Error!", "Error Koneksi bro!!", "error");
        }
      },
    });
  });

  $(document).on("click", ".action_ins_cor", function () {
    //alert ('a'); return;
    var id_user_cor = $("#id_user_cor").val();
    var nama_cor = $("#nama_cor").val();
    var alamat_cor = $("#alamat_cor").val();
    var lain_lain_cor = $("#lain_lain_cor").val();
    const date_wo = $("#modal_post_wo").find(".date_wo").val();
    //var date_wo = $("#date_wo_pas").val();

    var value = {
      id_user_cor: id_user_cor,
      nama_cor: nama_cor,
      alamat_cor: alamat_cor,
      alamat_dis: alamat_dis,
      lain_lain_cor: lain_lain_cor,
      date_wo: date_wo,
    };

    $.ajax({
      type: "POST",
      async: false,
      url: "controller/action_insert_cor_new.php",
      data: value,
      success: function (data) {
        //alert(data);
        var a = data;
        console.log(a);
        if (a == 1) {
          Swal.fire("Good job!", "Sukses Sign Work Order", "success").then(
            function (success) {
              window.location.reload(true);
            }
          );
        } else if (a == "jam1") {
          Swal.fire("Error!", "Slot Jam 6 - 8 penuh!!", "error").then(function (
            success
          ) {
            return;
          });
        } else if (a == "jam2") {
          Swal.fire("Error!", "Slot Jam 8 - 10 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "jam3") {
          Swal.fire("Error!", "Slot Jam 10 - 12 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "jam4") {
          Swal.fire("Error!", "Slot Jam 13 - 15 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "jam5") {
          Swal.fire("Error!", "Slot Jam 15 - 17 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "jam6") {
          Swal.fire("Error!", "Slot Jam 18 - 20 penuh!!", "error").then(
            function (success) {
              return;
            }
          );
        } else if (a == "Error") {
          Swal.fire("Error!", "Error Query bro!!", "error").then(function (
            success
          ) {
            return;
          });
        } else if (a == "Error2") {
          Swal.fire("Error!", "Error Koneksi bro!!", "error").then(function (
            success
          ) {
            return;
          });
        }
      },
    });
  });

  // create
  $(document).on("click", ".editpros_ikr", function () {
    var key_fal = $(this).attr("key_fal");
    var jenis_wo = $(this).attr("jenis_wo");
    //var pic_ikr = $(this).attr('pic_ikr');
    //alert (jenis_wo); return;

    getLocationikr();
    function getLocationikr() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
        lokasi = "Geolocation is not supported by this browser.";
      }
    }

    function showPosition(position) {
      var lokasi = position.coords.latitude + "," + position.coords.longitude;
      if (lokasi == ",") {
        Swal.fire("Error!", "Selesaikan wo terlebih dahulu!!", "error").then(
          function (success) {
            window.location.reload(true);
          }
        );
        return;
      }

      var value = { key_fal: key_fal, lokasi: lokasi, jenis_wo: jenis_wo };

      $.ajax({
        type: "POST",
        //async: false,
        beforeSend: function () {
          $("#loader").removeClass("hidden");
        },
        url: "controller/action_proses_ikr_newversi.php",
        data: value,
        success: function (data) {
          var a = data;
          console.log(a);
          return;
          if (a == 1) {
            Swal.fire("Good job!", "Sukses ambil Work Order", "success").then(
              function (success) {
                window.location.reload(true);
              }
            );
          } else if (a == 2) {
            Swal.fire(
              "Error!",
              "Selesaikan wo terlebih dahulu!!",
              "error"
            ).then(function (success) {
              window.location.reload(true);
            });
          } else if (a == 3) {
            Swal.fire(
              "Error!",
              "Ada gangguan di sistem simpan3!!",
              "error"
            ).then(function (success) {
              window.location.reload(true);
            });
          } else if (a == 4) {
            Swal.fire(
              "Error!",
              "Ada gangguan di sistem simpan4!!",
              "error"
            ).then(function (success) {
              window.location.reload(true);
            });
          }
        },
        complete: function () {
          $("#loader").addClass("hidden");
        },
      });
    }
  });

  // create
  $(document).on("click", ".edit_odp", function () {
    //var nama_fal = $("#nama_fal").val();
    var key_fal = $(this).attr("key_fal");
    var nama_fal = $(this).attr("nama_fal");
    var username_Maintenance = $(this).attr("username_Maintenance");
    var pic_ikr = $(this).attr("pic_ikr");
    getLocationodp();
    function getLocationodp() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
      }
    }

    function showPosition(position) {
      var lokasi = position.coords.latitude + "," + position.coords.longitude;
      //alert(key_fal); return;

      var value = {
        key_fal: key_fal,
        nama_fal: nama_fal,
        username_fal: username_Maintenance,
        pic_ikr: pic_ikr,
        lokasi: lokasi,
      };

      $.ajax({
        type: "POST",
        beforeSend: function () {
          $("#loader").removeClass("hidden");
        },
        url: "controller/action_proses_odp_newversion.php",
        data: value,
        success: function (data) {
          var a = data;
          //console.log(a); return;
          if (a == 1) {
            Swal.fire("Good job!", "Sukses ambil Work Order", "success").then(
              function (success) {
                window.location.reload(true);
              }
            );
          } else if (a == 2) {
            Swal.fire(
              "Error!",
              "Selesaikan wo terlebih dahulu!!",
              "error"
            ).then(function (success) {
              window.location.reload(true);
            });
          } else if (a == 3) {
            Swal.fire(
              "Error!",
              "Ada gangguan di sistem simpan3!!",
              "error"
            ).then(function (success) {
              window.location.reload(true);
            });
          } else if (a == 4) {
            Swal.fire(
              "Error!",
              "Ada gangguan di sistem simpan4!!",
              "error"
            ).then(function (success) {
              window.location.reload(true);
            });
          }
        },
        complete: function () {
          $("#loader").addClass("hidden");
        },
      });
    }
  });
});

$(document).on("click", ".editproses", function () {
  /// function lokasi ////
  //alert('a'); return;
  var key_fal = $(this).attr("key_fal");
  var nama_fal = $(this).attr("nama_fal");
  var jenis_wo = $(this).attr("jenis_wo");

  getLocation();
  function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
    } else {
      x.innerHTML = "Geolocation is not supported by this browser.";
    }
  }

  function showPosition(position) {
    var lokasi = position.coords.latitude + "," + position.coords.longitude;
    //alert (key_fal); return;

    //var nama_fal = $("#nama_fal").val();

    //
    // alert (lokasi); return;

    /// function lokasi end ////
    var value = {
      key_fal: key_fal,
      nama_fal: nama_fal,
      jenis_wo: jenis_wo,
      lokasi: lokasi,
    };
    //	alert (formData);
    //$('#spinner-div').show();//Load
    $.ajax({
      type: "POST",
      beforeSend: function () {
        Swal.fire({
          title: "Processing...",
          text: "Please wait while we process your request.",
          allowOutsideClick: false,
          didOpen: () => {
            Swal.showLoading();
          },
        });
      },
      url: "controller/action_proses_ikr_newversi.php",
      data: value,
      success: function (data) {
        var a = data;
        Swal.hideLoading();
        if (a == 1) {
          Swal.fire("Good job!", "Sukses ambil Work Order", "success").then(
            function (success) {
              window.location.reload(true);
            }
          );
        } else if (a == 2) {
          Swal.fire("Error!", "Selesaikan wo terlebih dahulu!!", "error").then(
            function (success) {
              window.location.reload(true);
            }
          );
        } else if (a == 3) {
          Swal.fire("Error!", "Ada gangguan di sistem simpan3!!", "error").then(
            function (success) {
              window.location.reload(true);
            }
          );
        } else if (a == 4) {
          Swal.fire("Error!", "Ada gangguan di sistem simpan4!!", "error").then(
            function (success) {
              window.location.reload(true);
            }
          );
        } else {
          Swal.fire("Error!", "Unknown error occurred!", "error");
        }
      },
      error: function () {
        Swal.hideLoading();
        Swal.fire("Error!", "Failed to process the request!", "error");
      },
      complete: function () {
        Swal.hideLoading();
      },
    });
  }
});

// create
// Edit
$(document).on("click", ".actioneditkapten", function () {
  var jenis_pekerjaan = $("#jenis_pekerjaan").val();

  var nama_fal2 = $("#nama_fal2").val();

  var kd_layanan2 = $("#kd_layanan2").val();

  var alamat_fal2 = $("#alamat_fal2").val();

  var rt2 = $("#rt2").val();

  var rw2 = $("#rw2").val();

  var kelurahan2 = $("#kelurahan2").val();

  var tlp_fal2 = $("#tlp_fal2").val();

  var tgl_fal2 = $("#tgl_fal2").val();

  var paket_fal2 = $("#paket_fal2").val();

  var jenis_wo2 = $("#jenis_wo2").val();

  var produk2 = $("#produk2").val();

  var tgl_fal2 = $("#tgl_fal2").val();

  var username_fal2 = $("#username_fal2").val();

  var password_fal2 = $("#password_fal2").val();

  var lain_lain2 = $("#lain_lain2").val();

  var status_wo2 = $("#status_wo2").val();

  var ket_user2 = $("#lain_lain2").val();

  var pembayaran2 = $("#pembayaran2").val();

  var perlakuan2 = $("#perlakuan2").val();

  var free2 = $("#free2").val();

  var pindah_alamat2 = $("#pindah_alamat2").val();

  var total_diskon2 = $("#total_diskon2").val();

  var keterangan_angsuran2 = $("#keterangan_angsuran2").val();

  var total2 = free2 + total_diskon2 + pindah_alamat2;

  //alert(nama_fal2); return;

  if (nama_fal2 == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Nama Belum Terisi!",
    });
    return;
  }

  if (alamat_fal2 == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Alamat ODP Belum Terisi!",
    });
    return;
  }

  if (username_fal2 == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "ID User Belum Terisi!",
    });
    return;
  }

  if (password_fal2 == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Password Belum Terisi!",
    });
    return;
  }

  if (tlp_fal2 == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "No Telfon Belum Terisi!",
    });
    return;
  }

  if (paket_fal2 == "-") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Paket Belum Terisi!",
    });
    return;
  }

  if (rt2 == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "RT Belum Terisi!",
    });
    return;
  }

  if (rw2 == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "RW Belum Terisi!",
    });
    return;
  }

  if (kelurahan2 == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Kelurahan Belum Terisi!",
    });
    return;
  }

  if (tgl_fal2 == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Tgl Fal Belum Terisi!",
    });
    return;
  }

  //alert(get_distribusi); return;

  var value = {
    jenis_pekerjaan: jenis_pekerjaan,
    nama_fal: nama_fal2,
    kd_layanan: kd_layanan2,
    alamat_fal: alamat_fal2,
    rt: rt2,
    rw: rw2,
    kelurahan: kelurahan2,
    tlp_fal: tlp_fal2,
    jenis_wo: jenis_wo2,
    produk: produk2,
    perlakuan: perlakuan2,
    total_diskon: total_diskon2,
    keterangan_angsuran: keterangan_angsuran2,
    free: free2,
    pindah_alamat: pindah_alamat2,
    pembayaran: pembayaran2,
    paket_fal: paket_fal2,
    tgl_fal: tgl_fal2,
    username_fal: username_fal2,
    total: total2,
    password_fal: password_fal2,
    status_wo: status_wo2,
    lain_lain: lain_lain2,
  };

  $.ajax({
    type: "POST",
    async: false,
    url: "controller/action_editadmin_kptn.php",
    data: value,
    success: function (data) {
      //alert(data);
      Swal.fire("Good job!", "You clicked the button!", "success").then(
        function (success) {
          //if (data == 'succes') {
          //alert('a');
          window.location.reload(true);
          //}
        }
      );
    },
  });
});

// Edit
$(document).on("click", ".actionperijinan", function () {
  //alert ('work');

  var key_fal = $("#key_fal").val();
  var lain_lain_perijinan = $("#lain_lain_perijinan").val();
  var status_wo = $("#status_wo").val();
  var pending = $("#pending").val();
  var pic_kendala = $("#pic_kendala").val();

  //alert(pending); return;

  if (lain_lain_perijinan == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Keterangan Belum Terisi!",
    });
    return;
  }

  if (status_wo == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Alamat ODP Belum Terisi!",
    });
    return;
  }

  if (pic_kendala == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Pic Kendala Pending Belum Terisi!",
    });
    return;
  }

  //alert(get_distribusi); return;

  var value = {
    lain_lain_perijinan: lain_lain_perijinan,
    status_wo: status_wo,
    key_fal: key_fal,
    pending: pending,
    pic_kendala: pic_kendala,
  };

  $.ajax({
    type: "POST",
    async: false,
    url: "controller/action_mslh_perijinan.php",
    data: value,
    success: function (data) {
      //alert(data);
      Swal.fire("Good job!", "You clicked the button!", "success").then(
        function (success) {
          //if (data == 'succes') {
          //alert('a');
          window.location.reload(true);
          //}
        }
      );
    },
  });
});

// Edit
$(document).on("click", ".actionrespro", function () {
  var username_rescedule = $("#username_rescedule").val();
  var keterangan_res = $("#keterangan_res").val();
  var jenis_pekerjaan_res = $("#jenis_pekerjaan_res").val();
  var pic_ikr_res = $("#pic_ikr_res").val();
  var tgl_res_pros = $("#tgl_res_pros").val();
  var id_mntn_get = $("#id_mntn_get").val();

  //alert(jenis_pekerjaan_res); return;

  var value = {
    username_rescedule: username_rescedule,
    keterangan_res: keterangan_res,
    jenis_pekerjaan_res: jenis_pekerjaan_res,
    pic_ikr_res: pic_ikr_res,
    tgl_fal_res: tgl_res_pros,
    id_mntn_get: id_mntn_get,
  };

  $.ajax({
    type: "POST",
    async: false,
    url: "controller/action_respro.php",
    data: value,
    success: function (data) {
      //alert(data);
      Swal.fire("Good job!", data, "success").then(function (success) {
        //if (data == 'succes') {
        //alert('a');
        window.location.reload(true);
        //}
      });
    },
  });
});

// Edit
$(document).on("click", ".actionswitch", function () {
  var pic_ikrs = $("#pic_ikrs").val();
  var pic_ikrswitch = $("#pic_ikrswitch").val();
  var username_s = $("#username_s").val();
  var jenis_wo = $("#jenis_wo").val();
  var key_fal_switch = $("#key_fal_sitch_pic").val();
  var tgl_fal_switch = $("#tgl_fal_switch").val();

  //alert(username_s); return;

  var value = {
    pic_ikr: pic_ikrs,
    pic_ikrswitch: pic_ikrswitch,
    username_s: username_s,
    jenis_wo: jenis_wo,
    key_fal_switch: key_fal_switch,
    tgl_fal_switch: tgl_fal_switch,
  };

  $.ajax({
    type: "POST",
    async: false,
    url: "controller/action_switch_new.php",
    data: value,
    success: function (data) {
      //alert(data);
      Swal.fire("Good job!", data, "success").then(function (success) {
        //if (data == 'succes') {
        //alert('a');
        window.location.reload(true);
        //}
      });
    },
  });
});

// INSERT
$(document).on("click", ".save_gamas", function () {
  var kategori_gamas = $("#kategori_gamas").val();
  var gangguan_olt = $("#gangguan_olt").val();
  var gangguan_server = $("#gangguan_server").val();
  var gangguan_upstream = $("#gangguan_upstream").val();
  var odp_pilih = $("#odp_pilih").val();
  var nama_gamas = $("#nama_gamas").val();
  var alamat_gamas = $("#alamat_gamas").val();
  var kelurahan_gamas = $("#kelurahan_gamas").val();
  var tanggal_gamas = $("#tanggal_gamas").val();
  var keluhan_gamas = $("#keluhan_gamas").val();
  var kd_kom = $("#kd_kom").val();
  const date_wo = $("#modal_post_wo").find(".date_wo").val();
  //alert (nama_kom); return;

  if (kategori_gamas == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Kategori Gangguan Belum Terisi!",
    });
    return;
  }

  if (alamat_gamas == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Alamat Belum Terisi!",
    });
    return;
  }

  //alert(odp_pilih); return;

  var value = {
    nama_gamas: nama_gamas,
    kelurahan_gamas: kelurahan_gamas,
    alamat_gamas: alamat_gamas,
    kategori_gamas: kategori_gamas,
    odp_pilih: odp_pilih,
    gangguan_olt: gangguan_olt,
    gangguan_server: gangguan_server,
    gangguan_upstream: gangguan_upstream,
    keluhan_gamas: keluhan_gamas,
    date_wo: date_wo,
  };

  $.ajax({
    type: "POST",
    async: false,
    url: "controller/action_insert_gamas.php",
    data: value,
    success: function (data) {
      //alert(data);
      Swal.fire("Good job!", data, "success").then(function (success) {
        //if (data == 'succes') {
        //alert('a');
        window.location.reload(true);
        //}
      });
    },
  });
});

$(document).on("click", ".edt_jadwal", function () {
  //alert('a'); return;
  var id = $(this).attr("id");
  var jumlah_hijau = $(this).attr("jumlah_hijau");
  var tanggal_jdwl = $(this).attr("tanggal");
  var slot = $(this).attr("slot");

  /* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
				var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
				var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
				var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
				var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
				var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
  //alert (slot); return;

  $("#modal_slot_jdwl_2").modal("show");
  $("#id").val(id);
  $("#jumlah_hijau").val(jumlah_hijau);
  $("#tanggal_jdwl").val(tanggal_jdwl);
  $("#slot").val(slot);
});

// INSERT
$(document).on("click", ".save_updt_slot", function () {
  var id = $("#id").val();
  var jumlah_hijau = $("#jumlah_hijau").val();
  if (jumlah_hijau == "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Kategori Gangguan Belum Terisi!",
    });
    return;
  }
  var value = {
    id: id,
    jumlah_hijau: jumlah_hijau,
  };
  $.ajax({
    type: "POST",
    async: false,
    url: "controller/action_picslot_edit.php",
    data: value,
    success: function (data) {
      //alert(data); return;
      if (data == 1) {
        Swal.fire("Good job!", "Sukses Update", "success").then(function (
          success
        ) {
          //if (data == 'succes') {
          //alert('a');
          window.location.reload(true);
          //}
        });
      } else {
        Swal.fire("Error!", "Error Script", "error").then(function (success) {
          //if (data == 'succes') {
          //alert('a');
          window.location.reload(true);
          //}
        });
      }
    },
  });
});

$(document).on("click", ".deletepengguna", function () {
  var jenis_wo = $(this).attr("jenis_wo");
  if (jenis_wo == "INSTALASI") {
    alert("fitur delete hanya maintenacne");
    return;
  } else if (jenis_wo == "MAINTENANCE") {
    var key_fal = $(this).attr("key_fal");
    //$('#modalmntn').modal('show');
    //alert (key_fal); return;
  } else if (jenis_wo == "MAINTENANCE_ODP") {
    alert("fitur delete hanya maintenacne");
    return;
    //$('#modalodp').modal('show');
  } else if (jenis_wo == "INSTALASI_ODP") {
    alert("fitur delete hanya maintenacne");
    return;
    //$('#modal_ins_odp').modal('show');
  } else if (jenis_wo == "INSTALASI_DISTRIBUSI") {
    alert("fitur delete hanya maintenacne");
    return;
    //$('#modal_ins_distribusi').modal('show');
  } else if (jenis_wo == "INSTALASI_BACKBONE") {
    alert("fitur delete hanya maintenacne");
    return;
    //$('#modal_ins_backbone').modal('show');
  } else if (jenis_wo == "MAINTENANCE_BACKBONE") {
    alert("fitur delete hanya maintenacne");
    return;
  }

  //alert (username_fal); return;

  if (confirm("Hapus id " + key_fal + "?")) {
    $.ajax({
      url: "../controller/delete_mntn.php",

      method: "POST",

      data: { key_fal: key_fal },

      success: function (data) {
        //alert(data);
        Swal.fire("Good job!", "You clicked the button!", "success").then(
          function (success) {
            //if (data == 'succes') {
            //alert('a');
            window.location.reload(true);
            //}
          }
        );
      },
    });
  }
});

$(document).on("click", ".start_time_proses", function () {
  // Mendapatkan atribut dari tombol yang diklik
  var key_fal = $(this).attr("key_fal");
  var nama_fal = $(this).attr("nama_fal");
  var jenis_wo = $(this).attr("jenis_wo");

  // Konfirmasi SweetAlert sebelum memulai pekerjaan
  Swal.fire({
    title: "Konfirmasi Mulai Pekerjaan",
    text: `Apakah Anda yakin ingin memulai pekerjaan ini? \n\nWO: ${jenis_wo} \nNama: ${nama_fal}`,
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Mulai",
    cancelButtonText: "Batal",
    reverseButtons: true,
  }).then((result) => {
    if (result.isConfirmed) {
      getLocation(); // Jika pengguna menekan "Mulai", jalankan fungsi lokasi
    }
  });

  function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
    } else {
      Swal.fire(
        "Error!",
        "Geolocation tidak didukung oleh browser ini.",
        "error"
      );
    }
  }

  function showPosition(position) {
    var lokasi = position.coords.latitude + "," + position.coords.longitude;
    var value = {
      key_fal: key_fal,
      nama_fal: nama_fal,
      jenis_wo: jenis_wo,
      lokasi: lokasi,
    };

    $.ajax({
      type: "POST",
      beforeSend: function () {
        Swal.fire({
          title: "Processing...",
          text: "Harap tunggu, sedang memproses permintaan...",
          allowOutsideClick: false,
          didOpen: () => {
            Swal.showLoading();
          },
        });
      },
      url: "controller/action_start_time.php",
      data: value,
      success: function (data) {
        Swal.hideLoading();
        if (data == 1) {
          Swal.fire("Sukses!", "Pekerjaan berhasil dimulai!", "success").then(
            () => {
              window.location.reload(true);
            }
          );
        } else if (data == 2) {
          Swal.fire(
            "Error!",
            "Selesaikan pekerjaan sebelumnya terlebih dahulu!",
            "error"
          ).then(() => {
            window.location.reload(true);
          });
        } else if (data == 3) {
          Swal.fire(
            "Error!",
            "Gangguan sistem, coba lagi nanti (Kode: simpan3)!",
            "error"
          ).then(() => {
            window.location.reload(true);
          });
        } else if (data == 4) {
          Swal.fire(
            "Error!",
            "Gangguan sistem, coba lagi nanti (Kode: simpan4)!",
            "error"
          ).then(() => {
            window.location.reload(true);
          });
        } else {
          Swal.fire(
            "Error!",
            "Terjadi kesalahan yang tidak diketahui!",
            "error"
          );
        }
      },
      error: function () {
        Swal.hideLoading();
        Swal.fire("Error!", "Gagal memproses permintaan!", "error");
      },
      complete: function () {
        Swal.hideLoading();
      },
    });
  }
});

var inputNumberElement = document.getElementById("input_number");
if (inputNumberElement) {
  inputNumberElement.addEventListener("input", function () {
    let input = this.value;

    // Hanya izinkan format nomor 628xxxxxxxxxx
    if (!/^628\d{8,12}$/.test(input)) {
      this.setCustomValidity(
        "Nomor harus dimulai dengan 628 dan diikuti 8-12 digit angka."
      );
    } else {
      this.setCustomValidity("");
    }
  });
}

$(".dropdown-item.editkapten").on("click", function () {
  $(document).ready(function () {
    var a = $("#kode_ikr").val();
    //alert(a); // Menampilkan nilai input untuk memastikan

    $.ajax({
      url: "create/read_data.php",
      data: { value: a },
      type: "post",
      success: function (data) {
        // Parsing hasil response dari server
        var hasil = JSON.parse(data);

        // Mengisi nilai ke form input lain berdasarkan hasil response
        $("#type_paket_read").val(hasil.type_paket);
        $("#pembayaran_ikr_read").val(hasil.pembayaran_ikr);
      },
    });

    $(function () {
      $("#form_nomer").hide();
      $("#type_paket_read").change(function () {
        var a = $("#type_paket_read").val();
        if (a == "combo") {
          $("#form_nomer").show();
        } else {
          $("#form_nomer").hide();
        }
      });
    });
  });
});

$(document).ready(function() {
  if (typeof $.fn.select2 !== 'undefined') {
    $("#kode_odp")
      .select2()
      .on("change", function () {
        var a = $("#kode_odp").val();
        $.ajax({
          url: "create/create_user_maintenance_odp.php",
          data: { value: $("#kode_odp").val() },
          type: "post",
          success: function (data) {
            var hasil = JSON.parse(data);
            $("#id_mntnodp").val(hasil.id_odp);
            $("#nama_mntodp").val(hasil.nama_odp);
            $("#alamat_mntodp").val(hasil.alamat_odp);
            $("#kd_layanan_mntodp").val(hasil.kd_layanan);
            $("#kelurahan_mntodp").val(hasil.kelurahan);
          },
        });
      });
  }
});

$("#odp").change(function () {
  var a = $("#odp").val();
  //alert (a);
  $.ajax({
    url: "create/create_kode_odp.php",
    data: { value: $("#odp").val() },
    //dataType:"html",
    type: "post",
    success: function (data) {
      //alert(data);
      $("#id_odp").val(data);
    },
  });
});

$("#OLT").change(function () {
  var a = $("#OLT").val();
  //alert (a);
  $.ajax({
    url: "create/create_kode_user.php",
    data: { value: $("#OLT").val() },
    //dataType:"html",
    type: "post",
    success: function (data) {
      //alert(data);
      $("#username_fal").val(data);
    },
  });
});

$(function () {
  $("#ikr_pas").hide();
  $("#ikr").hide();
  $("#mntn").hide();
  $("#mntn_odp").hide();
  $("#intalasi_distribusi").hide();
  $("#intalasi_odp").hide();
  $("#kategori").change(function () {
    var a = $("#kategori").val();
    //alert(a);
    if (a == "ikr") {
      $("#ikr").show();
      $("#mntn").hide();
      $("#mntn_odp").hide();
      $("#intalasi_distribusi").hide();
      $("#intalasi_odp").hide();
    } else if (a == "ikr_pas") {
      $("#ikr").hide();
      $("#mntn").hide();
      $("#ikr_pas").show();
      $("#mntn_odp").hide();
      $("#intalasi_distribusi").hide();
      $("#intalasi_odp").hide();
    } else if (a == "mntn") {
      $("#ikr").hide();
      $("#mntn").show();
      $("#mntn_odp").hide();
      $("#intalasi_distribusi").hide();
      $("#intalasi_odp").hide();
    } else if (a == "mntn_odp") {
      $("#ikr").hide();
      $("#mntn").hide();
      $("#mntn_odp").show();
      $("#intalasi_distribusi").hide();
      $("#intalasi_odp").hide();
    } else if (a == "intalasi_distribusi") {
      $("#ikr").hide();
      $("#mntn").hide();
      $("#mntn_odp").hide();
      $("#intalasi_distribusi").show();
      $("#intalasi_odp").hide();
    } else if (a == "instalasi_odp") {
      $("#ikr").hide();
      $("#mntn").hide();
      $("#mntn_odp").hide();
      $("#intalasi_distribusi").hide();
      $("#intalasi_odp").show();
    } else {
      $("#ikr").hide();
      $("#mntn").hide();
      $("#mntn_odp").hide();
      $("#intalasi_distribusi").hide();
      $("#intalasi_odp").hide();
      $("#ikr_pas").hide();
    }
  });

  $("#ikr_pas").hide();
  $("#mntn_pas").hide();
  $("#kategori_pas").change(function () {
    var a = $("#kategori_pas").val();
    //alert(a);
    if (a == "ikr_pas") {
      $("#ikr_pas").show();
      $("#mntn_pas").hide();
    } else if (a == "mntn_pas") {
      $("#ikr_pas").hide();
      $("#mntn_pas").show();
    } else {
      $("#ikr_pas").hide();
      $("#mntn_pas").hide();
    }
  });

  $("#modem_id").hide();
  $("#kabel_id").hide();
  $("#kategori_maintenance").change(function () {
    var a = $("#kategori_maintenance").val();
    //alert(a);
    if (a == "Ganti Modem") {
      $("#modem_id").show();
      $("#kabel_id").hide();
    } else if (a == "Tarik Kabel") {
      $("#modem_id").hide();
      $("#kabel_id").show();
    } else {
      $("#modem_id").hide();
      $("#kabel_id").hide();
    }
  });

  $("#solved").hide();
  $("#resceduleid").hide();
  $("#status_wo").change(function () {
    var a = $("#status_wo").val();
    //alert(a);
    if (a == "Sudah Terpasang") {
      $("#solved").show();
      $("#resceduleid").hide();
    } else if (a == "Rescedule") {
      $("#solved").hide();
      $("#resceduleid").show();
    } else {
      $("#solved").hide();
      $("#resceduleid").hide();
    }
  });

  $("#solved_mntn").hide();
  $("#resceduleid_mntn").hide();
  $("#status_womntn").change(function () {
    var a = $("#status_womntn").val();
    //alert(a);
    if (a == "Sudah Terpasang") {
      $("#solved_mntn").show();
      $("#resceduleid_mntn").hide();
    } else if (a == "Rescedule") {
      $("#solved_mntn").hide();
      $("#resceduleid_mntn").show();
    } else if (a == "Pending") {
      $("#solved_mntn").hide();
      $("#resceduleid_mntn").show();
    } else {
      $("#solved_mntn").hide();
      $("#resceduleid_mntn").hide();
    }
  });

  $("#modem_id").hide();
  $("#kabel_id").hide();
  $("#kategori_maintenance").change(function () {
    var a = $("#kategori_maintenance").val();
    //alert(a);
    if (a == "Ganti Modem") {
      $("#modem_id").show();
      $("#kabel_id").hide();
    } else if (a == "Tarik Kabel") {
      $("#modem_id").hide();
      $("#kabel_id").show();
    } else {
      $("#modem_id").hide();
      $("#kabel_id").hide();
    }
  });

  $("#odp_select").hide();
  $("#gangguan_olt").hide();
  $("#port_select").hide();
  $("#gangguan_server").hide();
  $("#gangguan_upstream").hide();
  $("#kategori_gamas").change(function () {
    var a = $("#kategori_gamas").val();
    //alert(a);
    if (a == "Gangguan_ODP") {
      $("#odp_select").show();
      $("#gangguan_olt").hide();
      $("#port_select").hide();
      $("#gangguan_server").hide();
      $("#gangguan_upstream").hide();
    } else if (a == "Gangguan_OLT") {
      $("#port_select").hide();
      $("#gangguan_server").hide();
      $("#gangguan_upstream").hide();
      $("#odp_select").hide();
      $("#gangguan_olt").show();
    } else if (a == "Gangguan_PortOLT") {
      $("#gangguan_olt").hide();
      $("#gangguan_server").hide();
      $("#gangguan_upstream").hide();
      $("#odp_select").hide();
      $("#port_select").show();
    } else if (a == "Gangguan Server") {
      $("#gangguan_olt").hide();
      $("#port_select").hide();
      $("#gangguan_upstream").hide();
      $("#odp_select").hide();
      $("#gangguan_server").show();
    } else if (a == "Gangguan UPSTREAM") {
      $("#gangguan_olt").hide();
      $("#port_select").hide();
      $("#gangguan_server").hide();
      $("#odp_select").hide();
      $("#gangguan_upstream").show();
    } else {
      $("#odp_select").hide();
      $("#gangguan_olt").hide();
      $("#port_select").hide();
      $("#gangguan_server").hide();
      $("#gangguan_upstream").hide();
    }
  });

  $("#stor").hide();
  $("#pembayarane").change(function () {
    var a = $("#pembayarane").val();
    //alert(a);
    if (a == "Tunai") {
      $("#stor").show();
    } else {
      $("#stor").hide();
    }
  });
});

$("#odp_pilih")
  .select2()
  .on("change", function () {
    //var a = $('.js-example-basic-multiple').val();
    var a = $("#odp_pilih").val();
    alert(a);
    $.ajax({
      url: "create/create_user_odp.php",
      data: { value: $("#odp_pilih").val() },
      //data: { "value": a },
      //dataType:"html",
      type: "post",
      success: function (data) {
        //alert(data);
        var hasil = JSON.parse(data);
        $("#id_odp").val(hasil.id_odp);
        $("#nama_gamas").val(hasil.nama_odp);
        $("#alamat_gamas").val(hasil.alamat_odp);
        $("#kelurahan_gamas").val(hasil.kelurahan);
      },
    });
  });

$(document).on("click", ".detail", function (event) {
  event.stopPropagation();
  event.preventDefault();
  event.stopImmediatePropagation();
  var id = $(this).attr("uniq_daf");
  //alert (id); return;
  //$("#loading_waiting_va").modal('show');
  //$(".loader_data_user").fadeIn("slow");
  (function () {
    var value = {
      id_key: id,
    };

    $("#komponen_va").load(
      "reload_detail.php",
      { push_value: value },
      function () {
        $("#modal_detail_ikr").modal({
          show: true,
        });
        //$(".loader_data_user").fadeOut();
      }
    );
  })();
});

$(document).ready(function () {
  $("#id_user_cor").select2({
    maximumSelectionLength: 1,
    placeholder: "Select a profile",
    ajax: {
      url: "controller/find_profile_extend.php", // Adjust the path to your PHP script
      dataType: "json",
      delay: 250,
      data: function (params) {
        return {
          searchTerm: params.term, // Pass the search term
        };
      },
      processResults: function (data) {
        return {
          results: data,
        };
      },
      cache: true,
    },
  });
});

$(document).ready(function () {
  $("#kode_user").select2({
    maximumSelectionLength: 1,
    placeholder: "Select a profile",
    ajax: {
      url: "controller/find_profile_extend.php", // Adjust the path to your PHP script
      dataType: "json",
      delay: 250,
      data: function (params) {
        return {
          searchTerm: params.term, // Pass the search term
        };
      },
      processResults: function (data) {
        return {
          results: data,
        };
      },
      cache: true,
    },
  });
});

$("#kode_user")
  .select2()
  .on("change", function () {
    //var a = $('.js-example-basic-multiple').val();
    var a = $("#kode_user").val();
    alert(a);
    $.ajax({
      url: "create/create_user_dismantle_byrequest.php",
      data: { value: $("#kode_user").val() },
      //data: { "value": a },
      //dataType:"html",
      type: "post",
      success: function (data) {
        //alert(data);
        var hasil = JSON.parse(data);
        $("#username_Maintenance_mnt1").val(hasil.kode_user);
        $("#nama_mnt1").val(hasil.nama_user);
        $("#alamat_mnt1").val(hasil.alamat_user);
        $("#tlp_mnt1").val(hasil.telp_user);
        $("#kd_layanan_mnt1").val(hasil.kd_layanan);
        $("#kelurahan_mnt1").val(hasil.kelurahan);
      },
    });
  });

$(document).ready(function () {
  $(".selectpicker").selectpicker();
});

$(document).ready(function () {
  $("#daerahe").selectpicker();

  console.log(
    $.fn.selectpicker
      ? "Bootstrap Select is loaded"
      : "Bootstrap Select is not loaded"
  );
  console.log($ ? "jQuery is loaded" : "jQuery is not loaded");

  $("#daerahe").on("changed.bs.select", function () {
    var daerah = $(this).val();
    var result = daerah.split("|");
    var kec = result[1];
    var kab = result[2];
    var kel = result[0];

    var value = {
      kab: kab,
      kec: kec,
      kel: kel,
    };

    if (daerah) {
      $.ajax({
        type: "POST",
        url: "controller/list_daerah.php",
        data: value,
        success: function (data) {
          var hasil = JSON.parse(data);
          $("#kd_prov").val(hasil.kd_prov);
          $("#kd_kec").val(hasil.kd_kec);
          $("#kd_kel").val(hasil.kd_kel);
          $("#kd_kabkota").val(hasil.kd_kabkota);
          $("#kd_layanan").val(hasil.kd_layanan);
        },
      });
    }
  });
});

// Perbaikan kode JavaScript
$(document).ready(function() {
    $(document).on("click", ".detail_teknis", function (event) {
        var kode_ikr = $("#kode_ikr").val();
        if (kode_ikr) {
            $.ajax({
                url: "https://bandwidth.naratel.net.id/moniolt/control/tr069/tr069_auth_baru.php",
                type: "GET",
                data: {
                    username: kode_ikr,
                    id_ssid: 1
                },
                dataType: "json",
                beforeSend: function() {
                    Swal.fire({
                        title: "Loading...",
                        text: "Mengambil data detail",
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                },
                success: function(response) {
                    Swal.close();
                    console.log(response);
                    if (response) {
                        $("#redaman").val(response.RXPower);
                        if (response.Devices && response.Devices.length > 0 && response.Devices[0].RSSI) {
                            $("#rssi").val(response.Devices[0].RSSI);
                        } else {
                            $("#rssi").val("N/A");
                        }
                    } else {
                        Swal.fire("Error", "Data tidak ditemukan", "error");
                    }
                },
                error: function(xhr, status, error) {
                    Swal.close();
                    console.log(xhr.responseText);
                    Swal.fire("Error", "Gagal mengambil data dari API: " + error, "error");
                }
            });
        } else {
            Swal.fire("Error", "ID User tidak boleh kosong", "error");
        }
    });
});


              
var fotoInstalasiElement = document.getElementById('foto_instalasi');
if (fotoInstalasiElement) {
    fotoInstalasiElement.addEventListener('change', function(e) {
        var file = e.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(event) {
                var fotoBase64Element = document.getElementById('foto_base64');
                var previewImgElement = document.getElementById('preview_img');
                if (fotoBase64Element) {
                    fotoBase64Element.value = event.target.result;
                }
                if (previewImgElement) {
                    previewImgElement.src = event.target.result;
                    previewImgElement.style.display = 'block';
                }
            };
            reader.readAsDataURL(file);
        }
    });
}