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
  $sheet->setCellValue('E1', 'Nama User');
  $sheet->setCellValue('F1', 'NO Telepon');
  $sheet->setCellValue('G1', 'Paket');
  $sheet->setCellValue('H1', 'Alamat');
  $sheet->setCellValue('I1', 'Jenis WO');
  $sheet->setCellValue('J1', 'pic');
  $sheet->setCellValue('K1', 'status');
  $sheet->setCellValue('L1', 'pic2');
  $sheet->setCellValue('M1', 'status2');
  $sheet->setCellValue('N1', 'Modem');
  $sheet->setCellValue('O1', 'Kabel 1');
  $sheet->setCellValue('P1', 'Kabel 2');
  $sheet->setCellValue('Q1', 'Kabel 3');
  $sheet->setCellValue('R1', 'Keterangan');  
  $sheet->setCellValue('S1', 'Kelurahan');
  $sheet->setCellValue('T1', 'RT');
  $sheet->setCellValue('U1', 'RW');
  $sheet->setCellValue('V1', 'Tanggal Daftar');  
  $sheet->setCellValue('W1', 'Password');
  $sheet->setCellValue('X1', 'Lokasi');
  $sheet->setCellValue('Y1', 'Status WO');
  $sheet->setCellValue('Z1', 'kategori_maintenance');
  $sheet->setCellValue('AA1', 'username_Maintenance');
  $sheet->setCellValue('AB1', 'jenis_pekerjaan');

  
   


  // menampilkan data users
  $query = "SELECT * FROM tbl_maintenance_odp WHERE produk='Kapten Naratel' and jenis_wo='MAINTENANCE_ODP' ORDER BY tanggal_instalasi ASC ";

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
      $sheet->setCellValue('E'.$i , $row['nama_fal']);
      $sheet->setCellValue('F'.$i , $row['tlp_fal']);
      $sheet->setCellValue('G'.$i , $row['paket_fal']);
      $sheet->setCellValue('H'.$i , $row['alamat_fal']);
      $sheet->setCellValue('I'.$i , $row['jenis_wo']);
      $sheet->setCellValue('J'.$i , $row['pic']);
      $sheet->setCellValue('K'.$i , $row['status']);
      $sheet->setCellValue('L'.$i , $row['pic2']);
      $sheet->setCellValue('M'.$i , $row['status2']);
	  $sheet->setCellValue('N'.$i , $row['modem']);
      $sheet->setCellValue('O'.$i , $row['kabel1']);
      $sheet->setCellValue('P'.$i , $row['kabel2']);
      $sheet->setCellValue('Q'.$i , $row['kabel3']);
      $sheet->setCellValue('R'.$i , $row['lain_lain']);
      $sheet->setCellValue('S'.$i , $row['kelurahan']);
      $sheet->setCellValue('T'.$i , $row['rt']);
      $sheet->setCellValue('U'.$i , $row['rw']);		  
	  $sheet->setCellValue('V'.$i , $row['tgl_fal']);		  
	  $sheet->setCellValue('W'.$i , $row['password_fal']);		  
      $sheet->setCellValue('X'.$i , $row['ket']);
      $sheet->setCellValue('Y'.$i , $row['status_wo']);
	  $sheet->setCellValue('Z'.$i , $row['kategori_maintenance']);
	  $sheet->setCellValue('AA'.$i , $row['username_Maintenance']);
	  $sheet->setCellValue('AB'.$i , $row['jenis_pekerjaan']);
     
      
		  $i++;
		  $no++;
	  }
  }

  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Disposition: attachment;filename="Maintenance_odp.xlsx"');
  $data = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
  $data->save('php://output');
  exit;
