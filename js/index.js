$(document).ready(function () {
	$(".js-example-basic-multiple").select2({
	  maximumSelectionLength: 1,
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
  
  document.getElementById("input_number").addEventListener("input", function () {
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
  
  $("#kode_odp")
	.select2()
	.on("change", function () {
	  //var a = $('.js-example-basic-multiple').val();
	  var a = $("#kode_odp").val();
	  //alert (a);
	  $.ajax({
		url: "create/create_user_maintenance_odp.php",
		data: { value: $("#kode_odp").val() },
		//data: { "value": a },
		//dataType:"html",
		type: "post",
		success: function (data) {
		  //alert(data);
		  var hasil = JSON.parse(data);
		  $("#id_mntnodp").val(hasil.id_odp);
		  $("#nama_mntodp").val(hasil.nama_odp);
		  $("#alamat_mntodp").val(hasil.alamat_odp);
		  $("#kd_layanan_mntodp").val(hasil.kd_layanan);
		  $("#kelurahan_mntodp").val(hasil.kelurahan);
		},
	  });
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
  });
  
  $(function () {
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
  });
  
  $(function () {
	$("#solved_ikr").hide();
	$("#resceduleid_ikr").hide();
	$("#status_wo_ikr").change(function () {
	  var a = $("#status_wo_ikr").val();
	  //alert(a);
	  if (a == "Sudah Terpasang") {
		$("#solved_ikr").show();
		$("#resceduleid_ikr").hide();
	  } else if (a == "Rescedule") {
		$("#solved_ikr").hide();
		$("#resceduleid_ikr").show();
	  } else if (a == "Pending") {
		$("#solved_ikr").hide();
		$("#resceduleid_ikr").show();
	  } else {
		$("#solved_ikr").hide();
		$("#resceduleid_ikr").hide();
	  }
	});
  });
  
  $(function () {
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
  });
  
  $(function () {
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
  });
  
  $(function () {
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
  });
  
  $(function () {
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
  });
  
  $(function () {
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
  });
  
  $(function () {
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
  
  $(document).ready(function () {
	$(".js-example-basic-multiple").select2({
	  placeholder: "Pilih ODP",
	  allowClear: true,
	});
  });
  






