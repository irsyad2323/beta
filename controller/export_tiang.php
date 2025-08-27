<?php
session_start();
$level_user = $_SESSION["level_user"];
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
  $sheet->setCellValue('B1', 'NAMA TIANG');
  $sheet->setCellValue('C1', 'TANGGAL');
  $sheet->setCellValue('D1', 'JENIS TIANG');
  $sheet->setCellValue('E1', 'ID TIANG'); 
  $sheet->setCellValue('F1', 'ALAMAT');
  $sheet->setCellValue('G1', 'KABUPATEN / KOTA');
  $sheet->setCellValue('H1', 'KECAMATAN');
  $sheet->setCellValue('I1', 'KELURAHAN');
  $sheet->setCellValue('J1', 'RT');
  $sheet->setCellValue('K1', 'RW');
  $sheet->setCellValue('L1', 'KETERANGAN');
  $sheet->setCellValue('M1', 'LAYANAN');
  $sheet->setCellValue('N1', 'PIC');
  $sheet->setCellValue('O1', 'LATITUDE');
  $sheet->setCellValue('P1', 'LONGITUDE');
  $sheet->setCellValue('Q1', 'STATUS');

  // menampilkan data users
  $query = "SELECT a.*, b.nama_provinsi, c.nama_kabkota, d.nama_kec, e.nama_kel FROM tbl_instalasi_tiang a
LEFT JOIN tb_provinsi b
on a.provinsi = b.kd_provinsi
LEFT JOIN tb_kabkota c
on a.kabkota = c.kd_kabkota
LEFT JOIN tb_kecamatan d
on a.kecamatan = d.kd_kec
LEFT JOIN tb_kelurahan e
on a.kelurahan =  e.kd_kel
WHERE a.kabkota = d.kd_kabkota AND d.kd_kec = e.kd_kec and c.kd_kabkota = e.kd_kabkota and a.kd_layanan='".$kota."' GROUP BY a.`key`;";

  $statement = $conn->prepare($query);
  
  $statement->execute();
  
  if($statement->rowCount() > 0) {
	  $no= 1;
	  $i = 2;
	  while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
		  $sheet->setCellValue('A'.$i , $no);
      $sheet->setCellValue('B'.$i , $row['nama_tiang']);
	  
      ///////////////////////////////////////////FORMAT DATE
$dateValue = PHPExcel_Shared_Date::PHPToExcel( strtotime($row['tanggal_instalasi']) );
$excel->getActiveSheet()
    ->setCellValue('C'.$i, $dateValue);
$excel->getActiveSheet()
    ->getStyle('C'.$i)
    ->getNumberFormat()
    ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
	
	/////////////////////////////////////////////////
      $sheet->setCellValue('D'.$i , $row['jenis_tiang']);
      $sheet->setCellValue('E'.$i , $row['id_tiang']);
      $sheet->setCellValue('F'.$i , $row['alamat']);
      $sheet->setCellValue('G'.$i , $row['nama_kabkota']);
      $sheet->setCellValue('H'.$i , $row['nama_kec']);
      $sheet->setCellValue('I'.$i , $row['nama_kel']);
      $sheet->setCellValue('J'.$i , $row['rw']);
      $sheet->setCellValue('K'.$i , $row['rt']);
      $sheet->setCellValue('L'.$i , $row['keterangan']);
	  $sheet->setCellValue('M'.$i , $row['kd_layanan']);
	  $sheet->setCellValue('N'.$i , $row['pic_vendor']);
	  $sheet->setCellValue('O'.$i , $row['latitude']);
	  $sheet->setCellValue('P'.$i , $row['longitude']);
	  $sheet->setCellValue('Q'.$i , $row['status']);
     
     
      
		  $i++;
		  $no++;
	  }
  }

  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Disposition: attachment;filename="INTALASI_TIANG.xlsx"');
  $data = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
  $data->save('php://output');
  exit;
