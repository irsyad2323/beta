<?php
include('controller.php');

if (isset($_POST["id"])) {
    $query = "SELECT * FROM tbl_fal WHERE key_fal = :key_fal";
    $statement = $conn->prepare($query);
    $statement->bindParam(':key_fal', $_POST["id"]);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $output = array(
            'letak_odpne'     => $result['letak_odp'],
            'alamat_odp'    => $result['alamat_fal'],
            'kd_layanan'    => $result['kd_layanan'],
            'kelurahan'     => $result['kelurahan'],
            'lain_lain'     => $result['lain_lain'],
            'latitude'      => $result['latitude'],
            'longitude'     => $result['longitude'],
            'tgl_list'      => $result['tgl_list']
        );
    } else {
        $output = array('error' => 'Data tidak ditemukan');
    }

    echo json_encode($output);
} else {
    echo json_encode(array('error' => 'ID tidak dikirim'));
}
