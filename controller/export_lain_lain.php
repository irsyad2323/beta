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
  $sheet->setCellValue('B1', 'Nama');
  $sheet->setCellValue('C1', 'Kantor Cabang');
  $sheet->setCellValue('D1', 'Tanggal WO');
  $sheet->setCellValue('E1', 'Alamat');
  $sheet->setCellValue('F1', 'Keterangan'); 
  $sheet->setCellValue('G1', 'PIC LEVEL'); 
  $sheet->setCellValue('H1', 'PIC'); 
  $sheet->setCellValue('I1', 'STATUS');
  $sheet->setCellValue('J1', 'PIC2'); 
  $sheet->setCellValue('K1', 'STATUS2'); 
  $sheet->setCellValue('L1', 'STATUS WO'); 


  // menampilkan data users
  $query = "SELECT * FROM tbl_lain_lain WHERE YEAR(tanggal_instalasi)= '2022' or '2023' ORDER BY tanggal_wo DESC";

  $statement = $conn->prepare($query);
  
  $statement->execute();
  
  if($statement->rowCount() > 0) {
	  $no= 1;
	  $i = 2;
	  while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
		  $sheet->setCellValue('A'.$i , $no);
		  $sheet->setCellValue('B'.$i , $row['nama']);
		  $sheet->setCellValue('C'.$i , $row['kd_layanan']);
		  $sheet->setCellValue('D'.$i , $row['tanggal_wo']);
		  $sheet->setCellValue('E'.$i , $row['alamat_fal']);      
		  $sheet->setCellValue('F'.$i , $row['lain_lain']);
		  $sheet->setCellValue('G'.$i , $row['pic_ikr']);
		  $sheet->setCellValue('H'.$i , $row['pic']);
		  $sheet->setCellValue('I'.$i , $row['status']);
		  $sheet->setCellValue('J'.$i , $row['pic2']);
		  $sheet->setCellValue('K'.$i , $row['status2']);
		  $sheet->setCellValue('L'.$i , $row['status_wo']);
      
		  $i++;
		  $no++;
	  }
  }

  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Disposition: attachment;filename="report_lain-lain.xlsx"');
  $data = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
  $data->save('php://output');
  exit;
