<?php
include "controller.php";
$sql_data_all = "SELECT COUNT(r.kode_user) as kabeh FROM tb_gundala r;";
$sql_data_aktif = "SELECT COUNT(r.username) as aktif FROM tbl_user_recharges r WHERE r.`status` = 'on';";
//$sql_data_aktif = "SELECT COUNT(r.kode_user) as aktif FROM tb_gundala r WHERE r.status_log = 'y';";
$sql_data_dcp = "SELECT COUNT(r.kode_user) as dcp FROM tb_gundala r WHERE r.status_log = 'n';";
$sql_data_off = "SELECT COUNT(g.kode_user) as disable FROM tb_gundala g , tbl_user_recharges r
				 WHERE g.kode_user = r.username AND g.status_log = 'y' AND r.`status` = 'off';";//"SELECT COUNT(r.username) as disable FROM tbl_user_recharges r WHERE r.`status` = 'off';";

$sql_data_off_mlg = "SELECT COUNT(g.kode_user) as disable_mlg FROM tb_gundala g , tbl_user_recharges r
				 WHERE g.kode_user = r.username AND g.status_log = 'y' AND r.`status` = 'off' and g.kd_layanan = 'mlg';";//"SELECT COUNT(r.username) as disable FROM tbl_user_recharges r WHERE r.`status` = 'off';";

$sql_data_off_pas = "SELECT COUNT(g.kode_user) as disable_pas FROM tb_gundala g , tbl_user_recharges r
				 WHERE g.kode_user = r.username AND g.status_log = 'y' AND r.`status` = 'off' and g.kd_layanan = 'pas';";//"SELECT COUNT(r.username) as disable FROM tbl_user_recharges r WHERE r.`status` = 'off';";


$sql_gratis = "SELECT COUNT(k.kode_user) as user_gratis FROM tb_gundala k WHERE k.nominal = '0.00';";


$query_data_all = mysqli_query($koneksi, $sql_data_all);
$query_data_aktif = mysqli_query($koneksi, $sql_data_aktif);
$query_data_dcp = mysqli_query($koneksi, $sql_data_dcp);
$query_data_off = mysqli_query($koneksi, $sql_data_off);
$query_data_gratis = mysqli_query($koneksi, $sql_gratis);
$query_data_off_pas = mysqli_query($koneksi, $sql_data_off_pas);
$query_data_off_mlg = mysqli_query($koneksi, $sql_data_off_mlg);

$d_all = mysqli_fetch_assoc($query_data_all);
$d_aktif = mysqli_fetch_assoc($query_data_aktif);
$d_dcp = mysqli_fetch_assoc($query_data_dcp);
$d_off = mysqli_fetch_assoc($query_data_off);
$d_gratis = mysqli_fetch_assoc($query_data_gratis);
$d_off_mlg = mysqli_fetch_assoc($query_data_off_mlg);
$d_off_pas = mysqli_fetch_assoc($query_data_off_pas);

$kapten_all['kabeh'] = $d_all['kabeh'];
$kapten_aktif['aktif'] = $d_aktif['aktif'];
$kapten_disable['disable'] = $d_off['disable'];
$kapten_disable_mlg['disable_mlg'] = $d_off_mlg['disable_mlg'];
$kapten_disable_pas['disable_pas'] = $d_off_pas['disable_pas'];

$kapten_dcp['dcp'] = $d_dcp['dcp'];
$user_berbayar['berbayar'] = ($d_all['kabeh'] - ($d_gratis['user_gratis'] + $d_dcp['dcp']));

$sql_data_all_mlg = "SELECT COUNT(r.kode_user) as kabeh_mlg FROM tb_gundala r where r.kd_layanan = 'mlg';";// and r.status_log = 'y';";
$sql_data_all_pas = "SELECT COUNT(r.kode_user) as kabeh_pas FROM tb_gundala r where r.kd_layanan = 'pas';";// and r.status_log = 'y';";
$query_data_all_mlg = mysqli_query($koneksi, $sql_data_all_mlg);
$query_data_all_pas = mysqli_query($koneksi, $sql_data_all_pas);
$d_all_mlg = mysqli_fetch_assoc($query_data_all_mlg);
$d_all_pas = mysqli_fetch_assoc($query_data_all_pas);

$sql_gratis_mlg = "SELECT COUNT(k.kode_user) as user_gratis_mlg FROM tb_gundala k WHERE k.nominal = '0.00' and k.kd_layanan = 'mlg' and k.status_log = 'y';";
$sql_gratis_pas = "SELECT COUNT(k.kode_user) as user_gratis_pas FROM tb_gundala k WHERE k.nominal = '0.00' and k.kd_layanan = 'pas' and k.status_log = 'y';";
$query_data_gratis_mlg = mysqli_query($koneksi, $sql_gratis_mlg);
$query_data_gratis_pas = mysqli_query($koneksi, $sql_gratis_pas);
$d_gratis_mlg = mysqli_fetch_assoc($query_data_gratis_mlg);
$d_gratis_pas = mysqli_fetch_assoc($query_data_gratis_pas);

$sql_data_dcp_mlg = "SELECT COUNT(r.kode_user) as dcp_mlg FROM tb_gundala r WHERE r.status_log = 'n' and r.kd_layanan = 'mlg';";
$sql_data_dcp_pas = "SELECT COUNT(r.kode_user) as dcp_pas FROM tb_gundala r WHERE r.status_log = 'n' and r.kd_layanan = 'pas';";
$query_data_dcp_mlg = mysqli_query($koneksi, $sql_data_dcp_mlg);
$query_data_dcp_pas = mysqli_query($koneksi, $sql_data_dcp_pas);
$d_dcp_mlg = mysqli_fetch_assoc($query_data_dcp_mlg);
$d_dcp_pas = mysqli_fetch_assoc($query_data_dcp_pas);
/* $kapten_all_mlg['kabeh_mlg'] = $d_all_mlg['kabeh_mlg'];
$kapten_all_pas['kabeh_pas'] = $d_all_pas['kabeh_pas']; */

$user_connect['aktif_inet'] = (($d_all['kabeh'] - $d_gratis['user_gratis'] - $d_dcp['dcp']) - $d_off['disable']);
$user_connect_mlg['aktif_inet_mlg'] = (($d_all_mlg['kabeh_mlg'] - $d_gratis_mlg['user_gratis_mlg'] - $d_dcp_mlg['dcp_mlg']) - $d_off_mlg['disable_mlg']);
$user_connect_pas['aktif_inet_pas'] = (($d_all_pas['kabeh_pas'] - $d_gratis_pas['user_gratis_pas'] - $d_dcp_pas['dcp_pas']) - $d_off_pas['disable_pas']);
//user berbayar
$user_berbayar_mlg['user_berbayar_mlg'] = ($d_all_mlg['kabeh_mlg'] - ($d_gratis_mlg['user_gratis_mlg'] + $d_dcp_mlg['dcp_mlg']));// - $d_off_mlg['disable_mlg']);
$user_berbayar_pas['user_berbayar_pas'] = ($d_all_pas['kabeh_pas'] - ($d_gratis_pas['user_gratis_pas'] + $d_dcp_pas['dcp_pas']));// - $d_off_pas['disable_pas']);
$total_user_berbayar['total_user_berbayar'] = ($user_berbayar_mlg['user_berbayar_mlg'] + $user_berbayar_pas['user_berbayar_pas']);

$user_gratis['user_gratis'] = $d_gratis['user_gratis'];
$persen_aktif['persen_aktif'] = round(($d_aktif['aktif']/$d_all['kabeh']) * 100);
$persen_non_aktif['persen_non_aktif'] = round(($d_off['disable']/$d_aktif['aktif']) * 100);
$persen_gratis['persen_gratis'] = round(($d_gratis['user_gratis']/$d_aktif['aktif']) * 100);
//get paket data
$sql_p_all = "SELECT COUNT(r.username) as paket_all FROM tbl_user_recharges r, tb_gundala g 
					WHERE g.kode_user = r.username;";
$sql_p_5 = "SELECT COUNT(r.username) as paket_5 FROM tbl_user_recharges r, tb_gundala g 
					WHERE g.kode_user = r.username AND  g.paket = '5';";
$sql_p_10 = "SELECT COUNT(r.username) as paket_10 FROM tbl_user_recharges r, tb_gundala g 
					WHERE g.kode_user = r.username AND  g.paket = '10';";
$sql_p_15 = "SELECT COUNT(r.username) as paket_15 FROM tbl_user_recharges r, tb_gundala g 
					WHERE g.kode_user = r.username AND  g.paket = '15';";
$sql_p_20 = "SELECT COUNT(r.username) as paket_20 FROM tbl_user_recharges r, tb_gundala g 
					WHERE g.kode_user = r.username AND  g.paket = '20';";

$query_p_all = mysqli_query($koneksi, $sql_p_all);
$query_p_5 = mysqli_query($koneksi, $sql_p_5);
$query_p_10 = mysqli_query($koneksi, $sql_p_10);
$query_p_15 = mysqli_query($koneksi, $sql_p_15);
$query_p_20 = mysqli_query($koneksi, $sql_p_20);
$d_p_all = mysqli_fetch_assoc($query_p_all);
$d_p_5 = mysqli_fetch_assoc($query_p_5);
$d_p_10 = mysqli_fetch_assoc($query_p_10);
$d_p_15 = mysqli_fetch_assoc($query_p_15);
$d_p_20 = mysqli_fetch_assoc($query_p_20);
$kapten_5['paket_5'] = $d_p_5['paket_5'];
$kapten_10['paket_10'] = $d_p_10['paket_10'];
$kapten_15['paket_15'] = $d_p_15['paket_15'];
$kapten_20['paket_20'] = $d_p_20['paket_20'];
$persen_5['persen_5'] = round(($d_p_5['paket_5']/$d_p_all['paket_all'])*100);
$persen_10['persen_10'] = round(($d_p_10['paket_10']/$d_p_all['paket_all'])*100);
$persen_15['persen_15'] = round(($d_p_15['paket_15']/$d_p_all['paket_all'])*100);
$persen_20['persen_20'] = round(($d_p_20['paket_20']/$d_p_all['paket_all'])*100);


$result = array_merge($kapten_all, $d_all_mlg, $d_all_pas, $kapten_aktif, $user_berbayar, $kapten_disable, $kapten_disable_mlg, $kapten_disable_pas, $user_connect, $user_connect_mlg, $user_connect_pas, $kapten_dcp, $d_dcp_mlg, $d_dcp_pas, $user_gratis, $d_gratis_mlg, $d_gratis_pas, $persen_aktif, $persen_non_aktif, 
					  $persen_gratis, $kapten_5, $kapten_10, $kapten_15, $kapten_20, $persen_5, $persen_10, $persen_15, $persen_20, $user_berbayar_mlg, $user_berbayar_pas, $total_user_berbayar);
echo json_encode($result);
?>