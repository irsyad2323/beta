<?php  

//echo $pihak1; return;
?>

	<script type="text/javascript">
	//window.print() 
	</script>
    
	<style type="text/css">
	#print {
		margin:auto;
		text-align:center;
		font-family:"Calibri", Courier, monospace;
		width:1000px;
		font-size:14px;
	}
	@print {
			  size: A4;
			  margin: 0;
			}
	
	#print span {
		text-align:center;
		font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;	
		font-size:18px;
	}
	#print table {
		border-collapse:collapse;
		width:90%;
		margin-left: auto;
		margin-right: auto;
	}
	#print .table1 {
		border-collapse:collapse;
		width:80%;
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
	
	h4{
		margin: 0px 0px 0px 0px;
		text-align: left;
		display: block;
		margin-block-start: 1.33em;
		margin-block-end: 1.33em;
		margin-inline-start: 0px;
		margin-inline-end: 0px;
		font-weight: normal;
		font-family: sans-serif;
		font-size: large;
		margin-left: 30px;
		margin-right: 30px;
	}
	
	
	</style>

	
    <div id="print">
	<table class='table1'>
			<tr>
<td><img src='../img/logoq.png' height="80" width="110"></td>
				<td>
<h2>BERITA ACARA</h2>
<h2>SERAH TERIMA PEKERJAAN</h2>
<h2>PEMASANGAN TIANG</h2>
	</td>
	</tr>
</table>
	
<table class='table'>	
<td><hr /></td>

</table>

<td><h4> &nbsp&nbsp&nbsp&nbsp Pada hari ini,  <b><?php $date=date('Y-m-d'); echo "".format_hari_tanggal($date);?>, Kami yang bertanda tangan dibawah ini: <br/>

</b> </h4></td>
<td><h4> &nbsp&nbsp&nbsp&nbsp Nama &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : &nbsp&nbsp<b><?php echo $pihak1 ?> </b> <br/>
		&nbsp&nbsp&nbsp&nbsp Jabatan &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : &nbsp&nbsp<b>PIC TEKNIS</b> <br/>
		&nbsp&nbsp&nbsp&nbsp Alamat &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : &nbsp&nbspRuko Taman Borobudur Indah Kav. 33 Malang <br/>
		&nbsp&nbsp&nbsp&nbsp Selanjutnya disebut <b>PIHAK PERTAMA</b> <br/>
 </h4></td>
 <td><h4> &nbsp&nbsp&nbsp&nbsp Nama &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : &nbsp&nbsp<b><?php echo $pihak2 ?></b> <br/>
		&nbsp&nbsp&nbsp&nbsp Jabatan &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : &nbsp&nbsp<b>VENDOR</b> <br/>
		&nbsp&nbsp&nbsp&nbsp Alamat &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : &nbsp&nbspPerumahan Buring Indah Regency 6 RT.004 Rw.007 <br/>
		&nbsp&nbsp&nbsp&nbsp Selanjutnya disebut <b>PIHAK KEDUA</b> <br/>
 </h4></td>

<td><h4> &nbsp&nbsp&nbsp&nbsp Dengan ini menerangkan bahwa : <br/>
		 &nbsp&nbsp&nbsp&nbsp PIHAK KEDUA telah menyelesaikan dan menyerahkan hasil pekerjaan kepada PIHAK PERTAMA yaitu Proyek :

</h4></td>
<td><h4> </b> </h4></td>
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

 include('../controller/controller_mysqli.php');
session_start();

$all_id=$_POST['all_id'];
$pihak1=$_POST['pihak1'];
$pihak2=$_POST['pihak2'];
										  $table = mysqli_query($koneksi,"SELECT CONCAT(a.provinsi,'.',a.kabkota,'.',a.kecamatan,'.',a.kelurahan,'.',a.id_tiang) as id , a.* FROM tbl_instalasi_tiang a WHERE `key` in ($all_id) and a.status='Sudah Dikerjakan' and a.kd_layanan like 'mlg1';");
											$q=0;
										  while ($row = mysqli_fetch_assoc($table)){ 
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
<td><h4> &nbsp&nbsp&nbsp&nbsp Garansi Berlaku Selama 2 Bulan Sejak ditandatangan nya berita acara serah terima ini. <br/> 
<td><h4> &nbsp&nbsp&nbsp&nbsp Demikian berita acara serah terima pekerjaan ini dibuat oleh kedua belah pihak, adapun pekerjaan tersebut <br/> 
		 &nbsp&nbsp&nbsp&nbsp dikerjakan dengan baik dan telah dicek oleh <b>Pihak Pertama.</b> <br/> 
</b> </h4></td>
</div>


<table width="350" align="right" class="ttd">
<tr>
<td width="100px" style="padding:20px 20px 20px 20px;" align="center">
<strong>Yang Menerima :<br/></strong>
<strong>PIHAK PERTAMA</strong>
      <br><br><br><br>
<strong><u>( <?php echo $pihak1 ?> )</u><br></strong><small></small>
</td>
</tr>
</table>



<table width="350" align="left" class="ttd">
<tr>
<td width="100px" style="padding:20px 20px 20px 20px;" align="center">
<strong>Yang Menyerahkan :<br/></strong> 
<strong>PIHAK KEDUA</strong>
      <br><br><br><br>
<strong><u>( <?php echo $pihak2 ?> )</u><br></strong><small></small>
</td>
</tr>
</table>
<?php
function format_hari_tanggal($waktu)
{
    $hari_array = array(
        'Minggu',
        'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu'
    );
    $hr = date('w', strtotime($waktu));
    $hari = $hari_array[$hr];
    $tanggal = date('j', strtotime($waktu));
    $bulan_array = array(
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember',
    );
    $bl = date('n', strtotime($waktu));
    $bulan = $bulan_array[$bl];
    $tahun = date('Y', strtotime($waktu));
    $jam = date( 'H:i:s', strtotime($waktu));
    
    //untuk menampilkan hari, tanggal bulan tahun jam
    //return "$hari, $tanggal $bulan $tahun $jam";

    //untuk menampilkan hari, tanggal bulan tahun
    return "$hari, $tanggal $bulan $tahun";
}
?>


