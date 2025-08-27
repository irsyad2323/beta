<?php
// Include file koneksi
include('../controller/controller_mysqli.php');

// Periksa apakah permintaan menggunakan metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form POST
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $kode_user = isset($_POST['kode_user']) ? $_POST['kode_user'] : null;
    $status_pekerjaan = isset($_POST['status_pekerjaan']) ? $_POST['status_pekerjaan'] : null;
    $input_number = isset($_POST['input_number']) ? $_POST['input_number'] : null;

    // Fungsi untuk normalisasi nomor telepon
    function normalizePhoneNumber($phone) {
        // Jika input berupa array, gabungkan menjadi string
        if (is_array($phone)) {
            $phone = implode('', $phone);
        }

        // Hilangkan spasi, tanda strip, atau karakter non-numerik
        $phone = preg_replace('/[^0-9]/', '', $phone);

        // Jika diawali dengan "0", ubah menjadi "62"
        if (substr($phone, 0, 1) === '0') {
            $phone = '62' . substr($phone, 1);
        }

        return $phone;
    }

    // Proses nomor telepon
    $normalized_number = normalizePhoneNumber($input_number);

    // Validasi data
    if (empty($id) || empty($kode_user) || empty($status_pekerjaan) || empty($input_number)) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Semua field harus diisi.'
        ]);
        exit;
    }

    // Periksa koneksi
    if (!$koneksi) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Koneksi database gagal: ' . mysqli_connect_error()
        ]);
        exit;
    }

    // Mulai transaksi
    mysqli_autocommit($koneksi, FALSE);

    // Query untuk memperbarui data
    $query1 = mysqli_query($koneksi, "UPDATE tbl_log_combo SET status_wo='$status_pekerjaan', no_combo='$normalized_number' WHERE id='$id'");
    $query2 = mysqli_query($koneksi, "UPDATE tb_gundala SET no_combo='$normalized_number' WHERE kode_user='$kode_user'");
    $query3 = mysqli_query($koneksi, "UPDATE tbl_upload_byu SET status='y' WHERE number='$input_number[0]'");

    // Periksa keberhasilan setiap query
    if (!$query1 || !$query2 || !$query3) {
        mysqli_rollback($koneksi); // Rollback jika ada query yang gagal
        echo json_encode([
            'status' => 'error',
            'message' => 'Gagal memperbarui data: ' . mysqli_error($koneksi)
        ]);
    } else {
        if (mysqli_commit($koneksi)) { // Commit jika semua berhasil
            echo json_encode([
                'status' => 'success',
                'message' => 'Data berhasil diperbarui.'
            ]);
        } else {
            mysqli_rollback($koneksi); // Rollback jika commit gagal
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal menyimpan perubahan: ' . mysqli_error($koneksi)
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
