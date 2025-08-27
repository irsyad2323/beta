<?php
// Include file koneksi
include('../controller/controller_mysqli.php');

// Periksa apakah permintaan menggunakan metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form POST
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $kode_user = isset($_POST['kode_user']) ? $_POST['kode_user'] : null;
    $pic_byu = isset($_POST['pic_byu']) ? $_POST['pic_byu'] : null;

    // Validasi data (contoh: memastikan semua data wajib ada)
    if (empty($id) || empty($kode_user) || empty($pic_byu)) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Semua field harus diisi.'
        ]);
        exit;
    }

    // Periksa koneksi
    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Mulai transaksi
    mysqli_autocommit($koneksi, FALSE);

    // Query untuk memperbarui data
    $query1 = mysqli_query($koneksi, "UPDATE tbl_log_combo SET pic_ikr='$pic_byu' WHERE id='$id'");

    if (!$query1) {
        // Rollback jika query gagal
        mysqli_rollback($koneksi);
        echo json_encode([
            'status' => 'error',
            'message' => 'Gagal memperbarui data. ' . mysqli_error($koneksi)
        ]);
    } else {
        // Commit transaksi jika sukses
        if (mysqli_commit($koneksi)) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Data berhasil diperbarui.'
            ]);
        } else {
            // Rollback jika commit gagal
            mysqli_rollback($koneksi);
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal menyimpan perubahan. ' . mysqli_error($koneksi)
            ]);
        }
    }

    // Tutup koneksi
    mysqli_close($koneksi);
} else {
    // Jika tidak menggunakan metode POST
    echo json_encode([
        'status' => 'error',
        'message' => 'Metode request tidak valid.'
    ]);
}
?>
