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
  $sheet->setCellValue('B1', 'Nama ODP');
  $sheet->setCellValue('C1', 'Alamat ODP');
  $sheet->setCellValue('D1', 'ID ODP');
  $sheet->setCellValue('E1', 'Keterangan');
  $sheet->setCellValue('F1', 'Layanan');
  $sheet->setCellValue('G1', 'PIC IKR');
  $sheet->setCellValue('H1', 'PIC');
  $sheet->setCellValue('I1', 'Status');
  $sheet->setCellValue('J1', 'PIC2');
  $sheet->setCellValue('K1', 'Status 2');
  $sheet->setCellValue('L1', 'Longitude&latitude');
  $sheet->setCellValue('M1', 'latitude');
  $sheet->setCellValue('N1', 'longitude');
  $sheet->setCellValue('O1', 'Status WO');
  $sheet->setCellValue('P1', 'Tanggal di Instalasi');
  $sheet->setCellValue('Q1', 'Spliter');
  $sheet->setCellValue('R1', 'Spliter2');  
  $sheet->setCellValue('S1', 'Spliter3');
  $sheet->setCellValue('T1', 'kelurahan');
  $sheet->setCellValue('U1', 'Maps');
  $sheet->setCellValue('V1', 'Jenis Pekerjaan');
  // menampilkan data users
  $query = "SELECT CONCAT('https://www.google.com/maps/search/?api=1&query=',a.latitude,',',a.longitude) as maps, a.* FROM tbl_odp a WHERE a.status_wo='Sudah Terpasang'; ";

  $statement = $conn->prepare($query);
  
  $statement->execute();
  
  if($statement->rowCount() > 0) {
	  $no= 1;
	  $i = 2;
	  while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
		  $sheet->setCellValue('A'.$i , $no);
      $sheet->setCellValue('B'.$i , $row['nama_odp']);
      $sheet->setCellValue('C'.$i , $row['alamat_odp']);
      $sheet->setCellValue('D'.$i , $row['id_odp']);
      $sheet->setCellValue('E'.$i , $row['lain_lain']);
      $sheet->setCellValue('F'.$i , $row['kd_layanan']);
      $sheet->setCellValue('G'.$i , $row['pic_ikr']);
      $sheet->setCellValue('H'.$i , $row['pic']);
      $sheet->setCellValue('I'.$i , $row['status']);
      $sheet->setCellValue('J'.$i , $row['pic2']);
      $sheet->setCellValue('K'.$i , $row['status2']);
      $sheet->setCellValue('L'.$i , $row['ket']);
      $sheet->setCellValue('M'.$i , $row['latitude']);
	  $sheet->setCellValue('N'.$i , $row['longitude']);
      $sheet->setCellValue('O'.$i , $row['status_wo']);
      ///////////////////////////////////////////FORMAT DATE
$dateValue = PHPExcel_Shared_Date::PHPToExcel( strtotime($row['tanggal_instalasi']) );
$excel->getActiveSheet()
    ->setCellValue('C'.$i, $dateValue);
$excel->getActiveSheet()
    ->getStyle('C'.$i)
    ->getNumberFormat()
    ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
	
	/////////////////////////////////////////////////
      $sheet->setCellValue('Q'.$i , $row['spliter']);
      $sheet->setCellValue('R'.$i , $row['spliter2']);
      $sheet->setCellValue('S'.$i , $row['spliter3']);
	  $sheet->setCellValue('T'.$i , $row['kelurahan']);	  
	  $sheet->setCellValue('U'.$i , $row['maps']);	  
	  $sheet->setCellValue('V'.$i , $row['jenis_pekerjaan']);	  
      
		  $i++;
		  $no++;
	  }
  }

  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Disposition: attachment;filename="Intalasi_ODP.xlsx"');
  $data = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
  $data->save('php://output');
  exit;
