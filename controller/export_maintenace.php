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
  $sheet->setCellValue('D1', 'ID-USER');
  $sheet->setCellValue('E1', 'Nama User');
  $sheet->setCellValue('F1', 'Alamat');
  $sheet->setCellValue('G1', 'Kategori Maintenance');
  $sheet->setCellValue('H1', 'Jenis WO');
  $sheet->setCellValue('I1', 'Produk');
  $sheet->setCellValue('J1', 'pic');
  $sheet->setCellValue('K1', 'status');
  $sheet->setCellValue('L1', 'pic2');
  $sheet->setCellValue('M1', 'status2');
  $sheet->setCellValue('N1', 'Tanggal Create');
  $sheet->setCellValue('O1', 'Tanggal Instalasi Datetime'); 
  $sheet->setCellValue('P1', 'Status WO');
  $sheet->setCellValue('Q1', 'Jenis Pekerjaan');
  $sheet->setCellValue('R1', 'Modem');
  $sheet->setCellValue('S1', 'Kabel 1');
  $sheet->setCellValue('T1', 'Kabel 2');
  $sheet->setCellValue('U1', 'Kabel 3');
  
   


  // menampilkan data users
  $query = "SELECT * FROM tbl_maintenance WHERE jenis_wo='MAINTENANCE' and kd_layanan like '%%%' and status_wo='Sudah Terpasang' ORDER BY tanggal_instalasi ASC ";

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
      $sheet->setCellValue('D'.$i , $row['username_Maintenance']);
      $sheet->setCellValue('E'.$i , $row['nama_fal']);   
      $sheet->setCellValue('F'.$i , $row['alamat_fal']);
	  $sheet->setCellValue('G'.$i , $row['kategori_maintenance']);
      $sheet->setCellValue('H'.$i , $row['jenis_wo']);
	  $sheet->setCellValue('I'.$i , $row['produk']);
      $sheet->setCellValue('J'.$i , $row['pic']);
      $sheet->setCellValue('K'.$i , $row['status']);
      $sheet->setCellValue('L'.$i , $row['pic2']);
      $sheet->setCellValue('M'.$i , $row['status2']);
	  $sheet->setCellValue('N'.$i , $row['tgl_date_time']);
      $sheet->setCellValue('O'.$i , $row['tgl_ins_datetime']);     
      $sheet->setCellValue('P'.$i , $row['status_wo']);
      $sheet->setCellValue('Q'.$i , $row['jenis_pekerjaan']);
      $sheet->setCellValue('R'.$i , $row['modem']);
      $sheet->setCellValue('S'.$i , $row['kabel1']);
      $sheet->setCellValue('T'.$i , $row['kabel2']);
      $sheet->setCellValue('U'.$i , $row['kabel3']);
     
      
		  $i++;
		  $no++;
	  }
  }

  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Disposition: attachment;filename="Maintenance.xlsx"');
  $data = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
  $data->save('php://output');
  exit;
