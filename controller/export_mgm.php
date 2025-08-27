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
  $sheet->setCellValue('B1', 'Tanggal Instalasi');
  $sheet->setCellValue('C1', 'ID-USER');
  $sheet->setCellValue('D1', 'Nama User');
  $sheet->setCellValue('E1', 'NO Telepon');
  $sheet->setCellValue('F1', 'Paket');
  $sheet->setCellValue('G1', 'Alamat');
  $sheet->setCellValue('H1', 'Nama Sobat');
  $sheet->setCellValue('I1', 'Metode Pembayaran');
  $sheet->setCellValue('J1', 'No Rekening');
  $sheet->setCellValue('K1', 'Status Marketing');
  $sheet->setCellValue('L1', 'Status Keuangan');
  
   


  // menampilkan data users
  $query = "SELECT * FROM tbl_fal WHERE mgm='mgm' and produk='Kapten Naratel' and kd_layanan like '".$kota."' and jenis_wo='INSTALASI' ORDER BY tanggal_instalasi ASC ";

  $statement = $conn->prepare($query);
  
  $statement->execute();
  
  if($statement->rowCount() > 0) {
	  $no= 1;
	  $i = 2;
	  while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
		  $sheet->setCellValue('A'.$i , $no);
	  
	  ///////////////////////////////////////////FORMAT DATE
$dateValue = PHPExcel_Shared_Date::PHPToExcel( strtotime($row['tanggal_instalasi']) );
$excel->getActiveSheet()
    ->setCellValue('B'.$i, $dateValue);
$excel->getActiveSheet()
    ->getStyle('B'.$i)
    ->getNumberFormat()
    ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
	
	/////////////////////////////////////////////////
	
	
	 // $sheet->setCellValue('C'.$i , $row['tanggal_instalasi']);
      $sheet->setCellValue('C'.$i , $row['username_fal']);
      $sheet->setCellValue('D'.$i , $row['nama_fal']);
      $sheet->setCellValue('E'.$i , $row['tlp_fal']);
      $sheet->setCellValue('F'.$i , $row['paket_fal']);
      $sheet->setCellValue('G'.$i , $row['alamat_fal']);
      $sheet->setCellValue('H'.$i , $row['nama_sobat']);
      $sheet->setCellValue('I'.$i , $row['metode_pembayaran']);
      $sheet->setCellValue('J'.$i , $row['no_rekening']);
      $sheet->setCellValue('K'.$i , $row['verified_mgm']);
      $sheet->setCellValue('L'.$i , $row['verified_fls']);
      
		  $i++;
		  $no++;
	  }
  }

  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Disposition: attachment;filename="export_mgm.xlsx"');
  $data = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
  $data->save('php://output');
  exit;
