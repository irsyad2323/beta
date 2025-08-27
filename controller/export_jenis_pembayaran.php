<?php
session_start();
$kota = $_SESSION["level_kantor"];
  // memanggil koneksi
  require_once 'controller.php';

  // memanggil class PHPExcel
  require_once '../asset/PHPExcel/PHPExcel.php';

  // object excel
  $excel = new PHPExcel();
  $excel->setActiveSheetIndex(0);
  $sheet = $excel->getActiveSheet()->setTitle('data');

  // set title kolom
  $sheet->setCellValue('A1', 'NO');
  $sheet->setCellValue('B1', 'Jenis Pekerjaan');
  $sheet->setCellValue('C1', 'Nama');
  $sheet->setCellValue('D1', 'Status');
  $sheet->setCellValue('E1', 'Keterangan');
  $sheet->setCellValue('F1', 'Kelurahan');
  $sheet->setCellValue('G1', 'Verified Marketing');
  $sheet->setCellValue('H1', 'Layanan');
  $sheet->setCellValue('I1', 'Tanggal Solved');
  $sheet->setCellValue('J1', 'Jumlah');
  $sheet->setCellValue('K1', 'Nominal');
  
   


  // menampilkan data users
  $query = "SELECT b.nama_provinsi, c.nama_kabkota, d.nama_kec, e.nama_kel ,a.*, DATE_FORMAT(a.tgl_pekerjaan,'%d-%m-%Y') as waktu, DATE_FORMAT(a.tgl_solved,'%d-%m-%Y') as solvedtgl FROM tbl_marketing a
																		LEFT JOIN tb_provinsi b
																		on a.prov = b.kd_provinsi
																		LEFT JOIN tb_kabkota c
																		on a.kab = c.kd_kabkota
																		LEFT JOIN tb_kecamatan d
																		on a.kec = d.kd_kec
																		LEFT JOIN tb_kelurahan e
																		on a.kel =  e.kd_kel
																		WHERE a.verified_fls='not-verified' and a.level in ('Vendor','Outsourcing') and a.status='Sudah' and a.kab = d.kd_kabkota AND d.kd_kec = e.kd_kec and c.kd_kabkota = e.kd_kabkota and a.layanan like '$kota' GROUP BY a.id DESC;";

  $statement = $conn->prepare($query);
  
  $statement->execute();
  
  if($statement->rowCount() > 0) {
	  $no= 1;
	  $i = 2;
	  while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
		  $sheet->setCellValue('A'.$i , $no);
      $sheet->setCellValue('B'.$i , $row['jenis_pekerjaan']);
      $sheet->setCellValue('C'.$i , $row['nama']);
      $sheet->setCellValue('D'.$i , $row['level']);
      $sheet->setCellValue('E'.$i , $row['ket_daerah']);
      $sheet->setCellValue('F'.$i , $row['kelurahan']);
      $sheet->setCellValue('G'.$i , $row['verified']);
      $sheet->setCellValue('H'.$i , $row['layanan']);
      $sheet->setCellValue('I'.$i , $row['tgl_solved']);
      $sheet->setCellValue('J'.$i , $row['jumlah']);
      $sheet->setCellValue('K'.$i , $row['nominal']);
     
      
		  $i++;
		  $no++;
	  }
  }

  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Disposition: attachment;filename="View Jenis Pembayaran.xlsx"');
  $data = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
  $data->save('php://output');
  exit;
