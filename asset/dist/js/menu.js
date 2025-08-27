$(document).ready(function () {
  dashboard_default();
});
$("a#dashboard_default").click(function () {
  dashboard_default();
});
//joko
$("a#dashboard_default_joko").click(function () {
  dashboard_default_joko();
});
//kode soa
$("a#kode_soa").click(function () {
  kode_soa();
});
//kode_coa
$("a#kode_coa").click(function () {
  kode_coa();
});
$("a#jurnal").click(function () {
  jurnal();
});
$("a#buku_besar").click(function () {
  buku_besar();
});
$("a#trial_balance").click(function () {
  trial_balance();
});
$("a#m_user").click(function () {
  m_user();
});

$("a#req_extend").click(function () {
  req_extend();
});
$("a#lap_all").click(function () {
  lap_all();
});
$("a#neraca").click(function () {
  neraca();
});
$("a#customer").click(function () {
  customer();
});
$("a#customer_ts").click(function () {
  customer_ts();
});
$("a#customer_pas").click(function () {
  customer_pas();
});
$("a#gundala").click(function () {
  gundala();
});
$("a#blasting").click(function () {
  blasting();
});
$("a#blasting_ima_kantor").click(function () {
  blasting_ima_kantor();
});
$("a#blasting_joni").click(function () {
  blasting_joni();
});
$("a#blasting_nonkapten").click(function () {
  blasting_nonkapten();
});
$("a#blasting_plgn_disable").click(function () {
  blasting_plgn_disable();
});
$("a#posting_auto").click(function () {
  posting_auto();
});
$("a#laba_rugi").click(function () {
  laba_rugi();
});
$("a#kapten_profile").click(function () {
  kapten_profile();
});

$("a#set_profile_va").click(function () {
  set_profile_va();
});

$("a#cc_invoice").click(function(){
	cc_invoice();
});

$("a#customer_group").click(function(){
	customer_group();
});

$("a#report_ikr").click(function(){
	report_ikr();
});

$("a#peta_customer").click(function(){
	peta_customer();
});

$("a#peta_ODP").click(function(){
	peta_ODP();
});

$("a#customer_nrtl").click(function(){
	customer_nrtl();
});

$("a#list_fal").click(function(){
	list_fal();
});

$("a#ikr_list_pic").click(function(){
	ikr_list_pic();
});

$("a#code_uniq_list").click(function(){
	code_uniq_list();
});

$("a#filter_list_fal").click(function(){
	filter_list_fal();
});

$("a#filter_list_wo").click(function(){
	filter_list_wo();
});

function dashboard_default() {
  $(".loader").fadeIn("slow");
  $('#content_main').load("dashboard_default.php",function(){
	  $(".loader").fadeOut();
  });
};
function dashboard_default_joko() {
  $(".loader").fadeIn("slow");
  $('#content_main').load("dashboard_default_joko.php",function(){
	  $(".loader").fadeOut();
  });
};
function kode_soa() {
	 $(".loader").fadeIn("slow");
  $('#content_main').load("kode_soa.php",function(){
	  $(".loader").fadeOut();
  });
};
function kode_coa() {
	 $(".loader").fadeIn("slow");
  $('#content_main').load("kode_coa.php",function(){
	  $(".loader").fadeOut();
  });
};
function m_user() {
	 $(".loader").fadeIn("slow");
  $('#content_main').load("m_user.php",function(){
	  $(".loader").fadeOut();
  });
};
function req_extend() {
	 $(".loader").fadeIn("slow");
  $('#content_main').load("req_extend.php",function(){
	  $(".loader").fadeOut();
  });
};
function jurnal() {
	 $(".loader").fadeIn("slow");
  $('#content_main').load("jurnal_posting.php",function(){
	  $(".loader").fadeOut();
  });
};
function buku_besar() {
	 $(".loader").fadeIn("slow");
  $('#content_main').load("buku_besar.php",function(){
	  $(".loader").fadeOut();
  });
};
function trial_balance() {
	 $(".loader").fadeIn("slow");
  $('#content_main').load("trial_balance.php",function(){
	  $(".loader").fadeOut();
  });
};
function neraca() {
	 $(".loader").fadeIn("slow");
  $('#content_main').load("neraca.php",function(){
	  $(".loader").fadeOut();
  });
};
function lap_all() {
	 $(".loader").fadeIn("slow");
  $('#content_main').load("laporan_all.php",function(){
	  $(".loader").fadeOut();
  });
};
function customer() {
	 $(".loader").fadeIn("slow");
  $('#content_main').load("customer.php",function(){
	  $(".loader").fadeOut();
  });
};
function customer_ts() {
	 $(".loader").fadeIn("slow");
  $('#content_main').load("customer_ts.php",function(){
	  $(".loader").fadeOut();
  });
};
function customer_pas() {
	 $(".loader").fadeIn("slow");
  $('#content_main').load("customer_pas.php",function(){
	  $(".loader").fadeOut();
  });
};
function gundala() {
	 $(".loader").fadeIn("slow");
  $('#content_main').load("gundala.php",function(){
	  $(".loader").fadeOut();
  });
};
function kapten_profile() {
	 $(".loader").fadeIn("slow");
  $('#content_main').load("piutang_profile.php",function(){
	  $(".loader").fadeOut();
  });
};
function blasting() {
	 $(".loader").fadeIn("slow");
  $('#content_main').load("blasting.php",function(){
	  $(".loader").fadeOut();
  });
};
function blasting_ima_kantor() {
	 $(".loader").fadeIn("slow");
  $('#content_main').load("blasting_ima_kantor.php",function(){
	  $(".loader").fadeOut();
  });
};
function blasting_joni() {
	 $(".loader").fadeIn("slow");
  $('#content_main').load("blasting_joni.php",function(){
	  $(".loader").fadeOut();
  });
};
function blasting_nonkapten() {
	 $(".loader").fadeIn("slow");
  $('#content_main').load("blasting_nonkapten.php",function(){
	  $(".loader").fadeOut();
  });
};
function blasting_plgn_disable() {
	 $(".loader").fadeIn("slow");
  $('#content_main').load("blasting_plgn_disable.php",function(){
	  $(".loader").fadeOut();
  });
};
function posting_auto() {
	 $(".loader").fadeIn("slow");
  $('#content_main').load("user_auto.php",function(){
	  $(".loader").fadeOut();
  });
};
function laba_rugi() {
	 $(".loader").fadeIn("slow");
  $('#content_main').load("laba_rugi.php",function(){
	  $(".loader").fadeOut();
  });
};

function set_profile_va() {
  $(".loader").fadeIn("slow");
  $('#content_main').load("set_profile_va.php",function(){
	  $(".loader").fadeOut();
  });
};

function report_ikr() {
  $(".loader").fadeIn("slow");
  $('#content_main').load("report_ikr.php",function(){
	  $(".loader").fadeOut();
  });
};

function peta_customer() {
  $(".loader").fadeIn("slow");
  $('#content_main').load("peta_customer.php",function(){
	  $(".loader").fadeOut();
  });
};

function peta_ODP() {
  $(".loader").fadeIn("slow");
  $('#content_main').load("peta_odp.php",function(){
	  $(".loader").fadeOut();
  });
};

function customer_group() {
	 $(".loader").fadeIn("slow");
  $('#content_main').load("customer_group.php",function(){
	  $(".loader").fadeOut();
  });
};

function customer_nrtl() {
	 $(".loader").fadeIn("slow");
  $('#content_main').load("customer_nrtl.php",function(){
	  $(".loader").fadeOut();
  });
};

function mlg_fal() {
	$(".loader").fadeIn("slow");
	$('#content_main').load("fal_mlg.php",function(){
		$(".loader").fadeOut();
		
	});
};

function pas_fal() {
	$(".loader").fadeIn("slow");
	$('#content_main').load("fal_pas.php",function(){
		$(".loader").fadeOut();
	});
};

function on_site_mlg() {
	$(".loader").fadeIn("slow");
	$('#content_main').load("on_site_mlg.php",function(){
		$(".loader").fadeOut();
	});
};

function on_site_pas() {
	$(".loader").fadeIn("slow");
	$('#content_main').load("on_site_pas.php",function(){
		$(".loader").fadeOut();
	});
};

function list_fal() {
	$(".loader").fadeIn("slow");
	$('#content_main').load("fal_all.php",function(){
		$(".loader").fadeOut();
	});
};

function ikr_list_pic() {
	$(".loader").fadeIn("slow");
	$('#content_main').load("fal_pic.php",function(){
		$(".loader").fadeOut();
	});
};
function code_uniq_list() {
	$(".loader").fadeIn("slow");
	$('#content_main').load("report_codeuniq.php",function(){
		$(".loader").fadeOut();
	});
};
function filter_list_fal() {
	$(".loader").fadeIn("slow");
	$('#content_main').load("filter_list_fal.php",function(){
		$(".loader").fadeOut();
	});
};

function filter_list_wo() {
	$(".loader").fadeIn("slow");
	$('#content_main').load("filter_list_wo.php",function(){
		$(".loader").fadeOut();
	});
};