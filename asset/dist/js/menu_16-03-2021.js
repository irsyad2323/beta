$(document).ready(function () {
  dashboard_default();
});
$("a#dashboard_default").click(function () {
  dashboard_default();
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

function dashboard_default() {
  $(".loader").fadeIn("slow");
  $('#content_main').load("dashboard_default.php",function(){
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