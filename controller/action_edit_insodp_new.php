<?php
include('../controller/controller_mysqli.php');

function clean($string) {
    return preg_replace('/[^A-Za-z0-9\s]/', '', $string); // Menghapus karakter spesial
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari POST
    $nama_odp_ins = isset($_POST['nama_odp_ins']) ? clean($_POST['nama_odp_ins']) : '';
    $alamat_odp_ins = isset($_POST['alamat_odp_ins']) ? clean($_POST['alamat_odp_ins']) : '';
    $id_ins_odp = $_POST['id_ins_odp'] ?? '';
    $key_odp_ins = $_POST['key_odp_ins'] ?? '';
    $kd_prov = $_POST['kd_prov'] ?? '';
    $kd_kabkota = $_POST['kd_kabkota'] ?? '';
    $kd_kec = $_POST['kd_kec'] ?? '';
    $kd_kel = $_POST['kd_kel'] ?? '';
    $kd_layanan = $_POST['kd_layanan'] ?? '';
    $daerahe = $_POST['daerahe'] ?? '';
    $pic_ins_odpp = $_POST['pic_ins_odpp'] ?? '';
    $pic_ins_odpp2 = $_POST['pic_ins_odpp2'] ?? '';
    $spltr_ins = $_POST['spltr_ins'] ?? '';
    $spltr_ins2 = $_POST['spltr_ins2'] ?? '';
    $spltr_ins3 = $_POST['spltr_ins3'] ?? '';
    $kabel_ins_odpp = $_POST['kabel_ins_odpp'] ?? '';
    $lain_lainodp_ins = $_POST['lain_lainodp_ins'] ?? '';
    $lokasi_kapten_ins_odp = $_POST['lokasi_kapten_ins_odp'] ?? '';
    $status_ins_odp = $_POST['status_ins_odp'] ?? '';
    $latitude = $_POST['latitude'] ?? '';
    $longitude = $_POST['longitude'] ?? '';
    $kelurahan = $_POST['kelurahan'] ?? '';
    $kecamatan = $_POST['kecamatan'] ?? '';
    $kabupaten = $_POST['kabupaten'] ?? '';
    $provinsi = $_POST['provinsi'] ?? '';
    $status_tiang = $_POST['status_tiang'] ?? '';
    $foto_base64 = $_POST['foto_base64'] ?? null;
   $spltr_json = $_POST['spltr_json'] ?? null;
//echo $spltr_json;
//die();


    $hasil_kec = str_replace("Kecamatan ", "", $kecamatan);

    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Update tbl_odp
    $sql = "UPDATE tbl_odp SET 
                pic = '$pic_ins_odpp', 
                nama_odp = '$nama_odp_ins', 
                alamat_odp = '$alamat_odp_ins', 
                pic2 = '$pic_ins_odpp2',
                kabel1 = '$kabel_ins_odpp',
                status_wo = '$status_ins_odp',
                spliter = '$spltr_json',
                kelurahan = '$kelurahan',
                kecamatan = '$hasil_kec',
                kabupaten = '$kabupaten',
                photo = '$foto_base64',
                ket = '$latitude',
                latitude = '$latitude',
                longitude = '$longitude',
                lain_lain = '$lain_lainodp_ins',
                status_tiang = '$status_tiang',
                tanggal_instalasi = CURRENT_TIMESTAMP(),
                tgl_solved = CURRENT_TIMESTAMP()
            WHERE key_odp = '$key_odp_ins'";

    if (mysqli_query($koneksi, $sql)) {
        echo "1";
        // Update keluhan jika diperlukan (gunakan ID yang benar)
        $update_keluhan = mysqli_query($koneksi, "UPDATE keluhan 
            SET status = 'Solved', 
                tanggal_handle = CURRENT_TIMESTAMP(), 
                keterangan_solving = '$lain_lainodp_ins' 
            WHERE id_user = '$id_ins_odp' AND `status` = 'Visit'");
    } else {
        echo "101";
    }

    mysqli_close($koneksi);
} else {
    echo "Method not allowed";
}
?>
