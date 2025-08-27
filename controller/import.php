<?php
// Load file koneksi.php
include "controller.php";

if(isset($_POST['upload'])){ // Jika user mengklik tombol Import
  $nama_file_baru = $_FILES['file']['name'];
  if(is_file('../tmp/'.$nama_file_baru)) // Jika file tersebut ada
  unlink('../tmp/'.$nama_file_baru); // Hapus file tersebut

  $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION); // Ambil ekstensi filenya apa
  $tmp_file = $_FILES['file']['tmp_name'];
  // Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
  if($ext == "xlsx"){
    // Upload file yang dipilih ke folder tmp
    move_uploaded_file($tmp_file, '../tmp/'.$nama_file_baru);
    // Load librari PHPExcel nya
    require_once '../asset/PHPExcel/PHPExcel.php';

    $excelreader = new PHPExcel_Reader_Excel2007();
    $loadexcel = $excelreader->load('../tmp/'.$nama_file_baru); // Load file excel yang tadi diupload ke folder tmp
    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

    $numrow = 1;
    foreach($sheet as $row){
      // Ambil data pada excel sesuai Kolom
      $nama = $row['B']; // Ambil data NIS
      $alamat = $row['C']; // Ambil data nama
      $telp = $row['C']; // Ambil data jenis kelamin
      $paket = $row['E']; // Ambil data telepon
      $tgl = $row['F']; // Ambil data alamat
      $val = $row['G'];
      $iduser = $row['H'];
      $pass = $row['I'];
      $ket = $row['J'];

      // Cek jika semua data tidak diisi
     
      if($nama == "" && $alamat = "" && $telp = "" && $paket = "" && $tgl = "" && $val = "" && $iduser = "" && $pass = "" && $ket = "")
        continue;

      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if($numrow > 1){
        // Proses simpan ke Database
        // Buat query Insert
        $sql = $conn->prepare("INSERT INTO pengguna VALUES(:nama_user,:alamat,:no_telepon,:paket,:tanggal_daftar,:val_pasang,:id_user,:pass,:ket)");
        $sql->bindParam(':nama_user', $nama);
        $sql->bindParam(':alamat', $alamat);
        $sql->bindParam(':no_telepon', $telp);
        $sql->bindParam(':paket', $paket);
        $sql->bindParam(':tanggal_daftar', $tgl);
        $sql->bindParam(':val_pasang', $val);
        $sql->bindParam(':id_user', $iduser);
        $sql->bindParam(':pass', $pass);
        $sql->bindParam(':ket', $ket);
        $sql->execute(); // Eksekusi query insert
      }

      $numrow++; // Tambah 1 setiap kali looping
    }
  }
}

header('location: ../index.php'); // Redirect ke halaman awal
?>