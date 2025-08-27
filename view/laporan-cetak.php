<?php  
session_start();
$server="117.103.69.22";
$user="kocak";
$pass="gaming";
$db="billkapten";

//Koneksi dan Menentukan Database Di Server
$konek=mysql_connect($server,$user,$pass) or die ("KONEKSI GAGAL");
$konek_database=mysql_select_db($db) or die ("DATABASE TIDAK BISA DIBUKA");
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>

	<script type="text/javascript">
	window.print() 
	</script>
    
	<style type="text/css">
	#print {
		margin:auto;
		text-align:center;
		font-family:"Calibri", Courier, monospace;
		width:1200px;
		font-size:14px;
	}
	#print .title {
		margin:20px;
		text-align:right;
		font-family:"Calibri", Courier, monospace;
		font-size:12px;
	}
	#print span {
		text-align:center;
		font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;	
		font-size:18px;
	}
	#print table {
		border-collapse:collapse;
		width:100%;
		margin:10px;
	}
	#print .table1 {
		border-collapse:collapse;
		width:90%;
		text-align:center;
		margin:10px;
	}
	#print table hr {
		border:3px double #000;	
	}
	#print .ttd {
		float:right;
		width:250px;
		background-position:center;
		background-size:contain;
	}
	#print table th {
		color:#000;
		font-family:Verdana, Geneva, sans-serif;
		font-size:12px;
	}
	#logo{
		width:111px;
		height:90px;
		padding-top:10px;	
		margin-left:10px;
	}

	h2,h3{
		margin: 0px 0px 0px 0px;
	}
	</style>

	<title>Laporan Cetak</title>
    <div id="print">
	<table class='table1'>
			<tr>
<td><img src='cetak_laporan/logoq.png' height="70" width="100"></td>
				<td>
<h2>PT. JALANTRA INTERNUSA</h2>
<h2>Jl. Danau Jonge</h2>
<p style="font-size:14px;"><i> Jl. 	</i></p>
	</td>
	</tr>
</table>
	
<table class='table'>	
<td><hr /></td>

</table>
<td><h3>LAPORAN DATA CONTOH</h3></td>
<tr>
<td>
<table border='1' class='table' width="90%">
<tr>
<th width="30">No.</th>
<th>ID Tiang</th>
<th>Nama Tiang</th>
<th>PIC</th>
<th>Tanggal Instalasi</th>
<th>Status</th>

</tr>
<?php 

$data = mysql_query("SELECT CONCAT(a.provinsi,'.',a.kabkota,'.',a.kecamatan,'.',a.kelurahan,'.',a.id_tiang) as id , a.* FROM tbl_instalasi_tiang a WHERE a.status='Sudah Dikerjakan' and a.kd_layanan like 'mlg1'");
$q=0;
while ($row = mysql_fetch_array($data)) {
$q++;?> 
<tr>
<td><center><?php echo $q; ?></center></td>
<td>&nbsp;&nbsp;<?php echo $row['id']; ?></td>
<td>&nbsp;&nbsp;<?php echo $row['nama_tiang'] ?></td>
<td>&nbsp;&nbsp;<?php echo $row['pic_vendor'] ?></td>
<td>&nbsp;&nbsp;<?php echo $row['tanggal_instalasi'] ?></td>
<td>&nbsp;&nbsp;<?php echo $row['status'] ?></td>

</tr>
<?php } ?>
</table>
</tr>
</table>
</div>
<div id="print">
<table width="450" align="right" class="ttd">
<tr>
<td width="100px" style="padding:20px 20px 20px 20px;" align="center">
<strong>Pimpinan,</strong>
      <br><br><br><br>
<strong><u>Joko H Prasetyo</u><br></strong><small></small>
</td>
</tr>
</table>
</div>
