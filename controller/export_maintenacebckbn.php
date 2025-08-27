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
  $sheet->setCellValue('E1', 'Nama Backbone');
  $sheet->setCellValue('F1', 'Tanggal WO');
  $sheet->setCellValue('G1', 'Alamat');
  $sheet->setCellValue('H1', 'Produk');
  $sheet->setCellValue('I1', 'Status WO');
  $sheet->setCellValue('J1', 'pic');
  $sheet->setCellValue('K1', 'status');
  $sheet->setCellValue('L1', 'pic2');
  $sheet->setCellValue('M1', 'status2');
 

  // menampilkan data users
  $query = "SELECT * FROM tbl_backbone WHERE YEAR(tanggal_instalasi)= '2023' ORDER BY tanggal_instalasi ASC ";

  $statement = $conn->prepare($query);
  $statement->execute();
  if($statement->rowCount() > 0) {
	  $no= 1;
	  $i = 2;
	  while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
		  $sheet->setCellValue('A'.$i , $no);
      $sheet->setCellValue('B'.$i , $row['kd_layanan_backbone']);
      ///////////////////////////////////////////FORMAT DATE
$dateValue = PHPExcel_Shared_Date::PHPToExcel( strtotime($row['tanggal_instalasi']) );
$excel->getActiveSheet()
    ->setCellValue('C'.$i, $dateValue);
$excel->getActiveSheet()
    ->getStyle('C'.$i)
    ->getNumberFormat()
    ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
	
	/////////////////////////////////////////////////
      $sheet->setCellValue('E'.$i , $row['nama_backbone']);
      $sheet->setCellValue('F'.$i , $row['tanggal']);
      $sheet->setCellValue('G'.$i , $row['alamat_fal_backbone']);
      $sheet->setCellValue('H'.$i , $row['produk_backbone']);
      $sheet->setCellValue('I'.$i , $row['status_wo']);
      $sheet->setCellValue('J'.$i , $row['pic']);
      $sheet->setCellValue('K'.$i , $row['status']);
      $sheet->setCellValue('L'.$i , $row['pic2']);
      $sheet->setCellValue('M'.$i , $row['status2']);
	 
     
      
		  $i++;
		  $no++;
	  }
  }

  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Disposition: attachment;filename="Maintenance_Backbone.xlsx"');
  $data = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
  $data->save('php://output');
  exit;
