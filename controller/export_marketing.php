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
  $sheet->setCellValue('D1', 'Status Pegawai');
  $sheet->setCellValue('E1', 'Nama PIC');
  $sheet->setCellValue('F1', 'Jenis Pekerjaan');
  $sheet->setCellValue('G1', 'Tanggal Sign WO');
  $sheet->setCellValue('H1', 'Kota');
  $sheet->setCellValue('I1', 'Kecamatan');
  $sheet->setCellValue('J1', 'Kelurahan');
  $sheet->setCellValue('K1', 'Keterangan Daerah');
  $sheet->setCellValue('L1', 'Jumlah');
  $sheet->setCellValue('M1', 'Metode Bayar');
  $sheet->setCellValue('N1', 'Nominal');
  $sheet->setCellValue('O1', 'No Rek');
  $sheet->setCellValue('P1', 'Status');
  $sheet->setCellValue('Q1', 'Verified Keuangan');
  $sheet->setCellValue('R1', 'Admin');  
  $sheet->setCellValue('S1', 'Tanggal Pembayaran');


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
																		WHERE a.status='Sudah' and a.kab = d.kd_kabkota AND d.kd_kec = e.kd_kec and c.kd_kabkota = e.kd_kabkota and a.layanan like '%%%' GROUP BY a.id DESC;";

  $statement = $conn->prepare($query);
  
  $statement->execute();
  
  if($statement->rowCount() > 0) {
	  $no= 1;
	  $i = 2;
	  while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
		  $sheet->setCellValue('A'.$i , $no);
      $sheet->setCellValue('B'.$i , $row['layanan']);
	  
	  ///////////////////////////////////////////FORMAT DATE
$dateValue = PHPExcel_Shared_Date::PHPToExcel( strtotime($row['tgl_solved']) );
$excel->getActiveSheet()
    ->setCellValue('C'.$i, $dateValue);
$excel->getActiveSheet()
    ->getStyle('C'.$i)
    ->getNumberFormat()
    ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
	
	/////////////////////////////////////////////////
	
	
	 // $sheet->setCellValue('C'.$i , $row['tanggal_instalasi']);
      $sheet->setCellValue('D'.$i , $row['level']);
      $sheet->setCellValue('E'.$i , $row['nama']);
      $sheet->setCellValue('F'.$i , $row['jenis_pekerjaan']);
	  ///////////////////////////////////////////FORMAT DATE
$dateValue = PHPExcel_Shared_Date::PHPToExcel( strtotime($row['tgl_pekerjaan']) );
$excel->getActiveSheet()
    ->setCellValue('G'.$i, $dateValue);
$excel->getActiveSheet()
    ->getStyle('G'.$i)
    ->getNumberFormat()
    ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
      $sheet->setCellValue('H'.$i , $row['nama_kabkota']);
      $sheet->setCellValue('I'.$i , $row['nama_kec']);
      $sheet->setCellValue('J'.$i , $row['kelurahan']);
      $sheet->setCellValue('K'.$i , $row['ket_daerah']);
      $sheet->setCellValue('L'.$i , $row['jumlah']);
      $sheet->setCellValue('M'.$i , $row['metode_bayar']);
	  $sheet->setCellValue('N'.$i , $row['nominal']);
      $sheet->setCellValue('O'.$i , $row['no_rek']);
      $sheet->setCellValue('P'.$i , $row['status']);
      $sheet->setCellValue('Q'.$i , $row['verified_fls']);
      $sheet->setCellValue('R'.$i , $row['log_user']);
      $sheet->setCellValue('S'.$i , $row['tgl_verif_fls']);
     
      
		  $i++;
		  $no++;
	  }
  }

  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Disposition: attachment;filename="WO_Marketing.xlsx"');
  $data = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
  $data->save('php://output');
  exit;
