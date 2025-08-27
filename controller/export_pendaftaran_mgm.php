<?php
   session_start();
$level_user = $_SESSION["level_user"];
$kota = $_SESSION["level_kantor"];
  // memanggil koneksi
  require_once 'controller_mysqli.php';

  // memanggil class PHPExcel
  require_once '../asset/PHPExcel/PHPExcel.php';

  // object excel
  $excel = new PHPExcel();
  $excel->setActiveSheetIndex(0);
  $sheet = $excel->getActiveSheet()->setTitle('data');

  // set title kolom
  $sheet->setCellValue('A1', 'NO');
  $sheet->setCellValue('B1', 'nama_sobat');
  $sheet->setCellValue('C1', 'metode_pembayaran');
  $sheet->setCellValue('D1', 'no_rekening');
  $sheet->setCellValue('E1', 'nama_lengkap'); 
  $sheet->setCellValue('F1', 'no_wa'); 
  $sheet->setCellValue('G1', 'alamat'); 
  $sheet->setCellValue('H1', 'rt'); 
  $sheet->setCellValue('I1', 'rw'); 
  $sheet->setCellValue('J1', 'nama_provinsi'); 
  $sheet->setCellValue('K1', 'nama_kabkota'); 
  $sheet->setCellValue('L1', 'nama_kec'); 
  $sheet->setCellValue('M1', 'nama_kel'); 
  $sheet->setCellValue('N1', 'patokan'); 
  $sheet->setCellValue('O1', 'nik'); 
  $sheet->setCellValue('P1', 'paket_kapten'); 
  $sheet->setCellValue('Q1', 'status_lokasi'); 
  $sheet->setCellValue('R1', 'tahu_layanan'); 
  $sheet->setCellValue('S1', 'alasan'); 
  $sheet->setCellValue('T1', 'Tanggal'); 


  // menampilkan data users
  $query = "SELECT b.nama_provinsi, c.nama_kabkota, d.nama_kec, e.nama_kel ,a.* FROM tb_mgm a
																		LEFT JOIN tb_provinsi b
																		on a.provinsi = b.kd_provinsi
																		LEFT JOIN tb_kabkota c
																		on a.kabupaten = c.kd_kabkota
																		LEFT JOIN tb_kecamatan d
																		on a.kecamatan = d.kd_kec
																		LEFT JOIN tb_kelurahan e
																		on a.kelurahan =  e.kd_kel
																		WHERE a.kabupaten = d.kd_kabkota AND d.kd_kec = e.kd_kec and c.kd_kabkota = e.kd_kabkota and a.layanan ='".$kota."' ORDER BY a.key_fal DESC ";

  $statement = $conn->prepare($query);
  
  $statement->execute();
  
  if($statement->rowCount() > 0) {
	  $no= 1;
	  $i = 2;
	  while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
		  $sheet->setCellValue('A'.$i , $no);
      $sheet->setCellValue('B'.$i , $row['nama_sobat']);
      $sheet->setCellValue('C'.$i , $row['metode_pembayaran']);
	  $sheet->setCellValue('D'.$i , $row['no_rekening']);      
      $sheet->setCellValue('E'.$i , $row['nama_lengkap']);
	  $sheet->setCellValue('F'.$i , $row['no_wa']);
	  $sheet->setCellValue('G'.$i , $row['alamat']);
	  $sheet->setCellValue('H'.$i , $row['rt']);
	  $sheet->setCellValue('I'.$i , $row['rw']);
	  $sheet->setCellValue('J'.$i , $row['nama_provinsi']);
	  $sheet->setCellValue('K'.$i , $row['nama_kabkota']);
	  $sheet->setCellValue('L'.$i , $row['nama_kec']);
	  $sheet->setCellValue('M'.$i , $row['nama_kel']);
	  $sheet->setCellValue('N'.$i , $row['patokan']);
	  $sheet->setCellValue('O'.$i , $row['nik']);
	  $sheet->setCellValue('P'.$i , $row['paket_kapten']);
	  $sheet->setCellValue('Q'.$i , $row['status_lokasi']);
	  $sheet->setCellValue('R'.$i , $row['tahu_layanan']);
	  $sheet->setCellValue('S'.$i , $row['alasan']);
	  $sheet->setCellValue('T'.$i , $row['tanggal']);
      
		  $i++;
		  $no++;
	  }
  }

  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Disposition: attachment;filename="pendaftaranMGM.xlsx"');
  $data = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
  $data->save('php://output');
  exit;
