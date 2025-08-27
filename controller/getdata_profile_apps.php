<?php
include_once("koneksi.php");
$username_mitra = $_SESSION['username'];
$mitra_depart = $_SESSION['mitra_depart'];
$kode_layanan = $_SESSION['level'];
?>
<style type="text/css">
	label {display:block; width:x; height:y; text-align:right;}
	.tunggu {
	  border: 10px solid #f3f3f3;
	  border-radius: 50%;
	  border-top: 10px solid blue;
	  border-right: 10px solid green;
	  border-bottom: 10px solid red;
	  width: 50px;
	  height: 50px;
	  -webkit-animation: spin 2s linear infinite;
	  animation: spin 2s linear infinite;
	  margin:auto;
	  left:0;
	  right:0;
	  top:0;
	  bottom:0;
	  position:fixed;
	}

	@-webkit-keyframes spin {
	  0% { -webkit-transform: rotate(0deg); }
	  100% { -webkit-transform: rotate(360deg); }
	}

	@keyframes spin {
	  0% { transform: rotate(0deg); }
	  100% { transform: rotate(360deg); }
	}
</style> 
<!-- Modal -->
    <div class="modal fade" id="modal-scan" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="modalLabel">Scan QR Code</h4>
          </div>
          <div class="modal-body">
            <select id="camera-select" class="form-control"></select>
            <div id="reader"></div>
            <div id="result">Menunggu hasil scan...</div>
          </div>
        </div>
      </div>
    </div>
<div class="modal-body">
 <div class="form-group">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-scan">
        Scan QR
      </button>
	<label>Kode Uniq</label>
	<select class="form-control select2" multiple="multiple" style="width: 100%;" id="kode_apps" name="kode_apps" data-placeholder=" Select a Profile Kapten">
	</select>
	<input type="hidden" id="kode_mitra" name="kode_mitra" value="<?= $username_mitra;?>">
	<input type="hidden" id="mitra_depart" name="mitra_depart" value="<?= $mitra_depart;?>">
	<input type="hidden" id="kode_layanan" name="kode_layanan" value="<?= $kode_layanan;?>">
	<input type="hidden" id="code_akses" name="code_akses" value="<?= $_SESSION ['akses_mitra'];?>">
	<input type="hidden" id="id_radcheck" name="id_radcheck">
	<input type="hidden" id="id_pkt" name="id_pkt">
	<input type="hidden" id="user_expiration" name="user_expiration">
	<input type="hidden" id="nama_user" name="nama_user">
	<input type="hidden" id="username_ow" name="username_ow">
	<input type="hidden" id="nominal_inet_ori" name="nominal_inet_ori">
	<input type="hidden" id="ow_status" name="ow_status">
	<input type="hidden" id="tgl_aktivasi" name="tgl_aktivasi">
	<input type="hidden" id="type_paket" name="type_paket">
	<input type="hidden" id="filterBayar" name="filterBayar">
 </div>
  <span class="tunggu" style="display: none"></span>
  <div class="red" style="display: none">
	<div class="form-group">
		<label>
        <input type="checkbox" class="minimal check" id="status_updown" name="status_updown" value="0"><span class="label-text">  <code> ubah Paket - Layanan</code><span class="icon-check"></span></span></label>
        <!--label>Paket</label>
        <input type="text" class="form-control paket" placeholder="Enter ..." readonly-->
		<select class="form-control paket" id='select_paket' disabled>
        	<option value="k@5">Kapten 5 Mbps</option>
            <option value="k@10">Kapten 10 Mbps</option>
            <option value="k@15">Kapten 15 Mbps</option>
            <option value="k@20">Kapten 20 Mbps</option> 
			<option value="k@30">Kapten 30 Mbps</option> 
			<option value="k@50">Kapten 50 Mbps</option> 
			<option value="k@60">Kapten 60 Mbps</option>
			<option value="k@100">Kapten 100 Mbps</option>			
			<option value="a@30">Naratel Corporate 30 Mbps</option> 
			<option value="c@6">Combo 6 Mbps + Paket Data 7 Gb</option> 
			<option value="c@11">Combo 11 Mbps + Paket Data 7 Gb</option> 
			<option value="c@16">Combo 16 Mbps + Paket Data 7 Gb</option> 
			<option value="e@5">Edubiz 5 - 100 Mbps</option> 
			<option value="e@10">Edubiz 10 - 100 Mbps</option> 
			<option value="e@15">Edubiz 15 - 100 Mbps</option> 
			<option value="e@20">Edubiz 20 - 100 Mbps</option> 
			<option value="e@30">Edubiz 30 - 100 Mbps</option> 
			<option value="e@100">Edubiz Halfday 100 Mbps</option>			
			<?php
				if($_SESSION['akses_mitra'] == 'all'){
			?>			
			<option value="a@10">AuraTech 10 Mbps</option>
            <option value="a@15">AuraTech 15 Mbps</option>
            <option value="a@20">AuraTech 20 Mbps</option> 
			<?php
				}
			?>
        </select>
    </div>
	
	<div class="pilihan_bayar" style="display:none;">
	<?php
	if($_SESSION ['akses_mitra'] == 'all'){
	?>
		<div class="form-group">
			<label>Pilihan Bayar</label>			
				<select class="form-control select2 bayar_by" style="width: 100%;">				 
                  <option value="tunai" selected="selected">Tunai</option>
                  <option value="virtual_account">Transfer</option>                 
                </select>
		</div>
	
	<?php
	}else{
	?>
		<input type="hidden" class="form-control bayar_by" value="tunai" disabled />	
	<?php
	}
	?>
	</div>
	
	<div class="form-group">
        <label>Satuan</label>
        <input type="text" class="form-control satuan" placeholder="Enter ..." readonly>
    </div>
    <div class="form-group">
        <label>Biaya Pelanggan + <code>PPN 12%</code></label>
        <input type="text" class="form-control nominal" placeholder="Enter ..." readonly>
		<input type="hidden" class="nominal_inet">
    </div>
	<!--div class="jatuhTempo" style="display:none;">
	<div class="form-group">
        <label>Masa Aktif Internet</label>
        <input type="text" class="form-control masaAktif" placeholder="Enter ..." readonly>
    </div>
	</div-->
	
  </div>
</div>
<!--/form-->
<script>
let html5QrCode;
let currentCameraId = null;

$('#modal-scan').on('shown.bs.modal', function () {
  html5QrCode = new Html5Qrcode("reader");

  Html5Qrcode.getCameras().then(cameras => {
    if (cameras && cameras.length) {
      const cameraSelect = $('#camera-select');
      cameraSelect.empty();
      cameras.forEach(camera => {
        const option = $('<option>').val(camera.id).text(camera.label || `Camera ${camera.id}`);
        cameraSelect.append(option);
      });

      // Pilih kamera belakang default
      let backCam = cameras.find(c => c.label.toLowerCase().includes('back')) || cameras[0];
      currentCameraId = backCam.id;
      cameraSelect.val(currentCameraId);

      startScanner(currentCameraId);
    } else {
      $('#result').text('Kamera tidak ditemukan');
    }
  }).catch(err => {
    $('#result').text(`Error: ${err}`);
  });
});

$('#camera-select').on('change', function () {
  if (html5QrCode) {
    html5QrCode.stop().then(() => {
      currentCameraId = $(this).val();
      startScanner(currentCameraId);
    });
  }
});

function startScanner(cameraId) {
  html5QrCode.start(
    cameraId,
    {
      fps: 10,
      qrbox: { width: 250, height: 250 }
    },
   qrCodeMessage => {
	  $('#result').html(`<b>Hasil:</b> ${qrCodeMessage}`);
	  
	  // ISI KE SELECT2 MULTIPLE
	  var newOption = new Option(qrCodeMessage, qrCodeMessage, true, true);
	  $('#kode_apps').append(newOption).trigger('change');

	  html5QrCode.stop();
	  $('#modal-scan').modal('hide');
	}
,
    errorMessage => {
      console.warn(`QR Error: ${errorMessage}`);
    }
  ).catch(err => {
    $('#result').text(`Error saat start scanner: ${err}`);
  });
}

$('#modal-scan').on('hidden.bs.modal', function () {
  if (html5QrCode) {
    html5QrCode.stop().catch(err => {
      console.warn('Gagal stop QR scanner:', err);
    });
  }
});
</script>
<script>
//Initialize Select2 Elements
$(document).ready(function(){
	$('#kode_apps').select2({
		maximumSelectionLength: 1,		
        placeholder: 'Select an profil',
        ajax: {
            url: './controler/find_profile_extend_apps.php',
            dataType: 'json',
            delay: 250,
            data: function (data) {
                return {
                    searchTerm: data.term // search term
                };
            },
            processResults: function (response) {
                return {
                    results:response
                };
            },
               cache: true
        }
    });
	
    $("#kode_apps").change(function(){
		if ($(this).val() != "") {
				var profil_ow = $(this).val();				
				var value = {
					profil_ow: profil_ow       
				}; 
				$.ajax({
					url : "controler/get_detail_profile_rad.php",
					type: "POST",
					data : value,
					beforeSend: function () {						
						$(".tunggu").show(100);
						$('#tombole').attr("disabled", true);
					},
					  complete: function () {
						$(".tunggu").hide(100);
						$('#tombole').attr("disabled", false);
					},	
					success: function(data, textStatus, jqXHR)
					{
						var data = jQuery.parseJSON(data);
						if(data.kosong ==='profil not found' ){
							swal("error! User not found" , 'gagal', "error");
						}else{									
							$(".nominal").val(data.nominal);
							$(".nominal_inet").val(data.nominal_inet);
							$("#tgl_aktivasi").val(data.tgl_aktivasi);
							
							var a = $(".paket").val(data.paket);					
							$('.paket option[value=a]').attr("selected", "selected"); 
							$(".satuan").val(data.satuan);
							$("#id_radcheck").val(data.id_radcheck);
							$("#id_pkt").val(data.id_pkt);
							$("#user_expiration").val(data.expiration);	
							//$(".masaAktif").val(data.expiration);	
							$("#nama_user").val(data.nama_user);
							$('#username_ow').val(data.username);	
							$('#ow_status').val(data.ow_status);
							$('#type_paket').val(data.type_paket);
							$('#nominal_inet_ori').val(data.nominal_inet_ori);
							$("#filterBayar").val('notupdown');
							if(data.alertnya != 'aman'){
								swal("warning! User "+data.alertnya+" sudah di Requestkan" , textStatus, "warning");					
							}
							if(data.alert_rad != 'aktif'){
								swal("warning! User "+data.alert_rad+" disabled" , 'Warning!!!', "error");					
							}
							$(".red").show();	
							$(".nominal").focus();
						}
					},
					error: function(jqXHR, textStatus, errorThrown)
					{
					  swal("Error!", textStatus, "error");
					}
				});
            } else {
                $(".red").hide();
				$('#status_updownVA').val(0);
				$('#status_updown').val(0);
				$('input').iCheck('uncheck');
            }
    }).change();
	
    $('input').iCheck({
	  checkboxClass: 'icheckbox_square-red',
	  radioClass: 'iradio_square-red',
	  increaseArea: '20%' // optional,	
	});
	
	$('input').on('ifChecked', function (event){
	    $(this).closest("input").attr('checked', true);  
	    $(".paket").attr("disabled", false);	   
	    $('#status_updown').val(1);
		$(".pilihan_bayar").show();
		$(".jatuhTempo").show();		
	});
	
	$('input').on('ifUnchecked', function (event){
	    $(this).closest("input").attr('checked', false);
	    $(".paket").attr("disabled", true);
	    $('#status_updown').val(0);
	    var get_profil_user = $('#kode_apps').val();	   
	    var value = {
				profil_reset: get_profil_user       
			}; 
		$.ajax({
			url : "controler/get_detail_profile_reset_rad.php",
			type: "POST",
			data : value,
			beforeSend: function () {						
				$(".tunggu").show(100);
				$('#tombole').attr("disabled", true);
			},
			complete: function () {
				$(".tunggu").hide(100);
				$('#tombole').attr("disabled", false);
			},	
			success: function(data, textStatus, jqXHR)
			{ 
				var data = jQuery.parseJSON(data);		 
				$(".nominal").val(data.nominal);
				var a = $(".paket").val(data.paket);
				var b = $(".bayar_by").val('tunai');				
				$('.paket option[value=a]').attr("selected", "selected");
				$(".jatuhTempo").hide();				
				$(".pilihan_bayar").hide();
				$("#filterBayar").val('notupdown');	
			},
			error: function(jqXHR, textStatus, errorThrown)
				{
				  swal("Error!", textStatus, "error");
				}
		});	    
	});

	$('#select_paket').on('change', function(){
	  	var change_paket = $(this).val();
		var tgl_aktivasi = $('#tgl_aktivasi').val();
		var username_ow = $('#username_ow').val();
		var user_expiration = $('#user_expiration').val();	    
		var type_paket = $('#type_paket').val();
		var nominal_inetOri = $('#nominal_inet_ori').val();	
		//alert(nominal_inetOri);
	  	var value = {
			change_paket: change_paket,
			username_ow : username_ow,
			user_expiration : user_expiration,
			type_paket : type_paket,
			tgl_aktivasi : tgl_aktivasi,
			nominal_inet_ori : nominal_inetOri
		}; 
	  	$.ajax({
			url : "controler/get_list_paket_rad.php",
			type: "POST",
			data : value,
			beforeSend: function () {						
				$(".tunggu").show(100);
				$('#tombole').attr("disabled", true);
			},
			
			complete: function () {
				$(".tunggu").hide(100);
				$('#tombole').attr("disabled", false);
			},	
			success: function(data, textStatus, jqXHR)
			{ 
				var data = jQuery.parseJSON(data);		 
				$(".nominal").val(data.nominal);
				$(".nominal_inet").val(data.nominal_inet);	
				$("#filterBayar").val(data.margin);				
				swal(data.status_notice, data.status_changePaket, data.status_alert);
			},
			error: function(jqXHR, textStatus, errorThrown)
				{
				  swal("Error!", textStatus, "error");
				}
		});
	  	//===============
	});
	
});
</script>