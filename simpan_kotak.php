<?php
include('controller/controller_mysqli.php');
// Memeriksa koneksi
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['baris']) && isset($_POST['tanggal']) && isset($_POST['kota'])) {
    $tanggal = $_POST['tanggal'];
    $kota = $_POST['kota'];
    $koneksi->autocommit(FALSE); // Mulai transaksi

    try {
        // Periksa apakah data dengan tanggal sudah ada
        $checkSql = "SELECT COUNT(*) AS count FROM baris_kotak WHERE tanggal = ? AND area = ?";
        $checkStmt = $koneksi->prepare($checkSql);
        if (!$checkStmt) {
            throw new Exception($koneksi->error);
        }
        $checkStmt->bind_param("ss", $tanggal, $kota);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();
        $row = $checkResult->fetch_assoc();
        $checkStmt->close();

        if ($row['count'] > 0) {
            // Tampilkan alert jika data sudah ada
            echo "<script>
                alert('Data dengan tanggal $tanggal untuk kota $kota sudah ada di database.');
                window.location.href = 'index.php'; // Redirect ke halaman sebelumnya
            </script>";
            exit;
        }

        // Jika tidak ada data, lakukan insert
        foreach ($_POST['baris'] as $baris_no => $jumlah) {
            $sql = "INSERT INTO baris_kotak (baris_no, jumlah_hijau, tanggal, area) VALUES (?, ?, ?, ?)";
            $stmt = $koneksi->prepare($sql);
            if (!$stmt) {
                throw new Exception($koneksi->error);
            }
            $stmt->bind_param("iiss", $baris_no, $jumlah, $tanggal, $kota);
            if (!$stmt->execute()) {
                throw new Exception("Error inserting data: " . $stmt->error);
            }
            $stmt->close();
        }
        $koneksi->commit(); // Commit transaksi jika semua berjalan lancar
    } catch (Exception $e) {
        $koneksi->rollback(); // Rollback transaksi jika ada kesalahan
        echo "<script>
            alert('Terjadi kesalahan: " . $e->getMessage() . "');
            window.location.href = 'index.php'; // Redirect ke halaman sebelumnya
        </script>";
        exit;
    }

    // Tutup koneksi
    $koneksi->close();

    // Redirect ke halaman tampilan
    header("Location: index.php");
    exit();
} else {
    echo "<script>
        alert('Tidak ada data untuk disimpan.');
        window.location.href = 'index.php';
    </script>";
    $koneksi->close();
}
?>
