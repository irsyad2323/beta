<?php
date_default_timezone_set('Asia/Jakarta');
$host="117.103.69.22";
$user="kocak";
$pass="gaming";	
$database="billkapten";	
$koneksi= mysqli_connect($host,$user,$pass,$database);
if (mysqli_connect_errno()) {
  trigger_error('Koneksi ke database gagal: '  . mysqli_connect_error(), E_USER_ERROR); 
}

$username_fal=$_POST['username_fal'];
$nama_fal=$_POST['nama_fal'];
$tanggal_instalasi=$_POST['tanggal_instalasi'];
$paket_fal=$_POST['paket_fal'];
$total=$_POST['total'];
$total_diskon=$_POST['total_diskon'];

	//echo$nama_user;
	//echo$alamat_user;
//echo json_encode($username_fal);	
	//print_r ($id_user);

//echo"$kode_olt$x";
?>  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>receipt</title>
  <link rel="stylesheet" href="../asset/dist/css/normalize.css">
  <link rel="stylesheet" href="../asset/dist/css/paper.css">  
  <style>
    @page { size: 58mm 110mm } /* output size */
    body.receipt .sheet { width: 58mm; height: 110mm } /* sheet size */
    @media print { body.receipt { width: 58mm } } /* fix for Chrome */
  </style>
  <style>
div.a {
  font-size: 4px;
}
  </style>
  <script type="text/javascript">
		window.onload = function(){
		  //window.print();			  
			setTimeout(function () { window.print(); }, 300);
			window.onfocus = function () { 
				setTimeout(function () { 
					window.close(); 
				}, 300); 
			}
		}		
</script>
  </script>
</head>



<body class="receipt">
  <section class="sheet padding-10mm">
		<table>	 
			<tr>
			<td  align ='center'><font color='000000' size='2' face='Tahoma'>INVOICE KAPTEN NARATEL</font></td></tr>
            <tr>
			<td  align='center'><font color='000000' size='1'  face='Tahoma'>Jl. Puncak Borobudur No.1 Mojolangu, Kec. Lowokwaru Kota Malang 65142</font> </td>
			</tr>
		</table>					
		<hr/>
		<table width='100%'>												
			<tr>
				<td width='40%'><font color='000000' size='1' face='Tahoma'>Nama Pelanggan</font></td>
				<td width='2%'><font color='000000' size='1' face='Tahoma'>:</font></td>
				<td width='40%'><font color='000000' size='1' face='Tahoma'><?= $nama_fal;?></font></td>
			</tr> 
			<tr> 
				<td><font color='000000' size='1' face='Tahoma'>ID Pelanggan</font></td>
				<td><font color='000000' size='1' face='Tahoma'>:</font></td>
				<td><font color='000000' size='1' face='Tahoma'><?= $username_fal;?></font></td>
			</tr>
			<tr>
				<td><font color='000000' size='1' face='Tahoma'>Tanggal Pemasangan</font></td>
				<td><font color='000000' size='1' face='Tahoma'>:</font></td>
				<td><font color='000000' size='1' face='Tahoma'><?= $tanggal_instalasi;?></font></td>
			</tr>
			<tr>
				<td><font color='000000' size='1' face='Tahoma'>Paket</font></td>
				<td><font color='000000' size='1' face='Tahoma'>:</font></td>
				<td><font color='000000' size='1' face='Tahoma'><?= $paket_fal?></font></td>
			</tr>
									
					
		</table> 
		<hr/>
		
        <table width='20%' cellpadding='1' cellspacing='1' align="right"> 
			<tr align='right'>  
				
                <td align='right' width='5%'><font color='000000' size='1' face='Tahoma'>Diskon</font></td>
				<td align='center' width='5%'><font color='000000' size='1' face='Tahoma'>:</font></td>
                <td align='right' width='50%'><font color='000000' size='1'  face='Tahoma'>
					<?= number_format($total_diskon,2,',','.');?></font></td>
			</tr>
            <tr align='right'>  
				
                <td align='right' width='25%'><font color='000000' size='1' face='Tahoma'>Total</font></td>
				<td align='center' width='5%'><font color='000000' size='1' face='Tahoma'>:</font></td>
                <td align='right' width='50%'><font color='000000' size='1'  face='Tahoma'>
					<?= number_format($total,2,',','.');?></font></td>
			</tr>
			
	 
                                    
        </table>
		<hr/>
        
		</br>
		</br>		
		<table>	 
			<tr>
			<td  align ='center'><font color='000000' size='2' face='Tahoma'></font></td></tr>
            <tr>
			<td  align='left'><font color='000000' size='1'  face='Tahoma'>Pembayaran Hanya dapat dilakukan melalui:</font> </td>			
			</tr>
			<tr>			
			<td  align='left'><font color='000000' size='1'  face='Tahoma'>1. Transfer kenomor Rekening <b>BCA 81619020 a/n PT Naraya Telematika<b/></font> </td>
			</tr>
			<tr>			
			<td  align='left'><font color='000000' size='1'  face='Tahoma'>2. Transfer kenomor Rekening <b>BRI 03440 11 8888 33 04 a/n PT Naraya Telematika<b/></font> </td>
			</tr>
		</table> 	
		<table>	 
			<tr>
			<td  align ='center'><font color='000000' size='2' face='Tahoma'></font></td></tr>
            <tr>
			<td  align='left'><font color='000000' size='1'  face='Tahoma'><b>Note:<b/></font> </td>			
			</tr>
			<tr>			
			<td  align='left'><font color='000000' size='1'  face='Tahoma'>Segera Konfirmasi setelah melakukan <b>pembayaran<b/> ke nomor WhatsApp <b>0882 1226 6666<b/></font> </td>
			</tr>
			<tr>			
			<td  align='left'><font color='000000' size='1'  face='Tahoma'>Pembayaran dan perpanjangan masa aktif hanya dilayani jam oprasional kantor</font> </td>
			</tr>
			
		</table>  
		
  </section>
</body>
</html>
