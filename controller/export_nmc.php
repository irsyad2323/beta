<?php
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
  $sheet->setCellValue('D1', 'Nama');
  $sheet->setCellValue('E1', 'Keterangan'); 
  $sheet->setCellValue('F1', 'PIC'); 


  // menampilkan data users
  $query = "SELECT * FROM tbl_report_nmc WHERE YEAR(tanggal_instalasi)='2022' and jenis_wo='REPORT_NMC' ORDER BY tanggal_instalasi DESC";

  $statement = $conn->prepare($query);
  
  $statement->execute();
  
  if($statement->rowCount() > 0) {
	  $no= 1;
	  $i = 2;
	  while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
		  $sheet->setCellValue('A'.$i , $no);
      $sheet->setCellValue('B'.$i , $row['kd_layanan']);
      $sheet->setCellValue('C'.$i , $row['tanggal_instalasi']);
	  $sheet->setCellValue('D'.$i , $row['username_Maintenance']);      
      $sheet->setCellValue('E'.$i , $row['lain_lain']);
	  $sheet->setCellValue('F'.$i , $row['pic_ikr']);
      
		  $i++;
		  $no++;
	  }
  }

  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Disposition: attachment;filename="report NMC.xlsx"');
  $data = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
  $data->save('php://output');
  exit;
