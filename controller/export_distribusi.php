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
  $sheet->setCellValue('B1', 'Kantor Cabang');
  $sheet->setCellValue('C1', 'Tanggal Instalasi');
  $sheet->setCellValue('D1', 'Nama ODP');
  $sheet->setCellValue('E1', 'ODP Induk'); 
  $sheet->setCellValue('F1', 'Alamat ODP');
  $sheet->setCellValue('G1', 'Kelurahan');
  $sheet->setCellValue('H1', 'Keterangan');
  $sheet->setCellValue('I1', 'pic');
  $sheet->setCellValue('J1', 'status');
  $sheet->setCellValue('K1', 'pic2');
  $sheet->setCellValue('L1', 'status2');
  $sheet->setCellValue('M1', 'Status WO');
  $sheet->setCellValue('N1', 'Jenis Pekerjaan');

  // menampilkan data users
  $query = "SELECT * FROM tbl_distribusi WHERE produk='Kapten Naratel' ORDER BY tanggal_instalasi ASC ";

  $statement = $conn->prepare($query);
  
  $statement->execute();
  
  if($statement->rowCount() > 0) {
	  $no= 1;
	  $i = 2;
	  while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
		  $sheet->setCellValue('A'.$i , $no);
      $sheet->setCellValue('B'.$i , $row['kd_layanan']);
	  
      ///////////////////////////////////////////FORMAT DATE
$dateValue = PHPExcel_Shared_Date::PHPToExcel( strtotime($row['tanggal_instalasi']) );
$excel->getActiveSheet()
    ->setCellValue('C'.$i, $dateValue);
$excel->getActiveSheet()
    ->getStyle('C'.$i)
    ->getNumberFormat()
    ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
	
	/////////////////////////////////////////////////
      $sheet->setCellValue('D'.$i , $row['nama_odp']);
      $sheet->setCellValue('E'.$i , $row['odp_induk']);
      $sheet->setCellValue('F'.$i , $row['alamat_odp']);
      $sheet->setCellValue('G'.$i , $row['kelurahan']);
      $sheet->setCellValue('H'.$i , $row['lain_lain']);
      $sheet->setCellValue('I'.$i , $row['pic']);
      $sheet->setCellValue('J'.$i , $row['status']);
      $sheet->setCellValue('K'.$i , $row['pic2']);
      $sheet->setCellValue('L'.$i , $row['status2']);
	  $sheet->setCellValue('M'.$i , $row['status_wo']);
	  $sheet->setCellValue('N'.$i , $row['jenis_pekerjaan']);
     
     
      
		  $i++;
		  $no++;
	  }
  }

  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Disposition: attachment;filename="Maintenance_odp.xlsx"');
  $data = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
  $data->save('php://output');
  exit;
