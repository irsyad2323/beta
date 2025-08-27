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
  $sheet->setCellValue('Z1', 'Jenis Pekerjaan');
  $sheet->setCellValue('AA1', 'Tanggal Fal Datetime');
  $sheet->setCellValue('AB1', 'Tanggal Proses Datetime');
  $sheet->setCellValue('AC1', 'Tanggal Instalasi Datetime');
  $sheet->setCellValue('AD1', 'Status Lokasi');
  $sheet->setCellValue('AE1', 'SOI');
  $sheet->setCellValue('AF1', 'Alasan');
  $sheet->setCellValue('AG1', 'Letak ODP');
  
   


  // menampilkan data users
  $query = "SELECT a.*, b.nama_provinsi, c.nama_kabkota, d.nama_kec, e.nama_kel FROM tbl_fal a
LEFT JOIN tb_provinsi b
on a.provinsi = b.kd_provinsi
LEFT JOIN tb_kabkota c
on a.kabupaten = c.kd_kabkota
LEFT JOIN tb_kecamatan d
on a.kecamatan = d.kd_kec
LEFT JOIN tb_kelurahan e
on a.kelurahan =  e.kd_kel
WHERE a.status_wo = 'Sudah Terpasang' and a.kabupaten = d.kd_kabkota AND d.kd_kec = e.kd_kec and c.kd_kabkota = e.kd_kabkota and produk='Kapten Naratel' and a.kd_layanan like '$kota' and a.jenis_wo='INSTALASI' GROUP BY a.username_fal ORDER BY a.tanggal_instalasi ASC";

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
	
	
	 // $sheet->setCellValue('C'.$i , $row['tanggal_instalasi']);
      $sheet->setCellValue('D'.$i , $row['username_fal']);
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
      $sheet->setCellValue('S'.$i , $row['nama_kel']);
      $sheet->setCellValue('T'.$i , $row['rt']);
      $sheet->setCellValue('U'.$i , $row['rw']);
///////////////////////////////////////////FORMAT DATE
$dateValue = PHPExcel_Shared_Date::PHPToExcel( strtotime($row['tgl_fal']) );
$excel->getActiveSheet()
    ->setCellValue('V'.$i, $dateValue);
$excel->getActiveSheet()
    ->getStyle('V'.$i)
    ->getNumberFormat()
    ->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
	
	  //$sheet->setCellValue('V'.$i , $row['tgl_fal']);		  
	  $sheet->setCellValue('W'.$i , $row['password_fal']);		  
      $sheet->setCellValue('X'.$i , $row['ket']);
      $sheet->setCellValue('Y'.$i , $row['status_wo']);
      $sheet->setCellValue('Z'.$i , $row['jenis_pekerjaan']);
      $sheet->setCellValue('AA'.$i , $row['tgl_fal_datetime']);
      $sheet->setCellValue('AB'.$i , $row['tgl_proses_teknis']);
      $sheet->setCellValue('AC'.$i , $row['tgl_ins_datetime']);
      $sheet->setCellValue('AD'.$i , $row['status_lokasi']);
      $sheet->setCellValue('AE'.$i , $row['tahu_layanan']);
      $sheet->setCellValue('AF'.$i , $row['alasan']);
      $sheet->setCellValue('AG'.$i , $row['letak_odp']);
     
      
		  $i++;
		  $no++;
	  }
  }

  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Disposition: attachment;filename="Intalasi_Kapten.xlsx"');
  $data = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
  $data->save('php://output');
  exit;
