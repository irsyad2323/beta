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
  $sheet->setCellValue('D1', 'ID-USER');
  $sheet->setCellValue('E1', 'Nama');
  $sheet->setCellValue('F1', 'Alamat');
  $sheet->setCellValue('G1', 'pic');
  $sheet->setCellValue('H1', 'Kategori Pelanggan');
  $sheet->setCellValue('I1', 'Jenis WO');
  $sheet->setCellValue('J1', 'Modem');
  $sheet->setCellValue('K1', 'Status My Kapten'); 
  $sheet->setCellValue('L1', 'Kelurahan'); 
  $sheet->setCellValue('M1', 'Kecamatan'); 
  $sheet->setCellValue('N1', 'Status Modem'); 


  // menampilkan data users
  $query = "SELECT a.*, b.kelurahan, b.kecamatan, c.kategori_pelanggan FROM tbl_disable_noconfirm a 
JOIN tb_gundala b
on a.username_fal = b.kode_user
JOIN tbl_disable_noconfirm c
on a.username_fal = c.username_fal
WHERE YEAR(a.tgl_progres)= '2024' or '2025' ORDER BY a.tgl_progres ASC";

  $statement = $conn->prepare($query);
  
  $statement->execute();
  
  if($statement->rowCount() > 0) {
	  $no= 1;
	  $i = 2;
	  while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
		  $sheet->setCellValue('A'.$i , $no);
      $sheet->setCellValue('B'.$i , $row['kd_layanan']);
      $sheet->setCellValue('C'.$i , $row['tgl_progres']);
	  $sheet->setCellValue('D'.$i , $row['username_fal']);
	  $sheet->setCellValue('E'.$i , $row['nama_fal']);
	  $sheet->setCellValue('F'.$i , $row['alamat_fal']);
	  $sheet->setCellValue('G'.$i , $row['pic_ikr']);
	  $sheet->setCellValue('H'.$i , $row['kategori_pelanggan']);
	  $sheet->setCellValue('I'.$i , $row['status_wo']);
	  $sheet->setCellValue('J'.$i , $row['lain_lain']);
      $sheet->setCellValue('K'.$i , $row['status_log']);
      $sheet->setCellValue('L'.$i , $row['kelurahan']);
      $sheet->setCellValue('M'.$i , $row['kecamatan']);
      $sheet->setCellValue('N'.$i , $row['kategori_pelanggan']);
      
		  $i++;
		  $no++;
	  }
  }

  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Disposition: attachment;filename="report Dismantle.xlsx"');
  $data = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
  $data->save('php://output');
  exit;
