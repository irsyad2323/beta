<?php

header("Content-Type: application/json");

$servername = "117.103.69.22";
$username = "kocak";
$password = "gaming";
$dbname = "billkapten";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

/* function verifyBearerToken() {
    $headers = getallheaders();
    if (isset($headers['Authorization'])) {
        $token = str_replace('Bearer ', '', $headers['Authorization']);
        // Here, you would validate the token, e.g., checking it against a database or using a JWT library
        if ($token === '01d7b68e37e97e2abf8a00bfd481882524ca8cbc9174bfca92c9c7662a203c22') { // Replace 'your_secure_token' with your actual token validation logic
            return true;
        }
    }
    return false;
}

if (!verifyBearerToken()) {
    echo json_encode(["error" => "Unauthorized"]);
    http_response_code(401);
    exit;
} */


switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (isset($_GET['id_cus'])) {
            $id_cus = $conn->real_escape_string($_GET['id_cus']);
            $sql = "SELECT a.key_fal, a.type_daf, a.alamat_fal, a.tlp_fal, a.tgl_fal_datetime, a.tgl_proses_teknis ,a.tgl_ins_datetime, a.username_fal, a.pic_ikr, a.latitude, a.longitude, a.letak_odp FROM tbl_fal a
					join tb_gundala b
					on a.username_fal = b.kode_user
					WHERE b.status_log='y' and a.status_wo='Sudah Terpasang' and a.letak_odp= '$id_cus'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo json_encode($result->fetch_assoc());
            } else {
                echo json_encode(["error" => "Record not found"]);
            }
        } else {
            $sql = "SELECT a.key_fal, a.type_daf, a.alamat_fal, a.tlp_fal, a.tgl_fal_datetime, a.tgl_proses_teknis ,a.tgl_ins_datetime, a.username_fal, a.pic_ikr, a.latitude, a.longitude, a.letak_odp FROM tbl_fal a
					join tb_gundala b
					on a.username_fal = b.kode_user
					WHERE b.status_log='y' and a.status_wo='Sudah Terpasang';";
            $result = $conn->query($sql);

            $records = [];
            while ($row = $result->fetch_assoc()) {
                $records[] = $row;
            }
            echo json_encode($records);
        }
        break;

    /* case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $sql = "INSERT INTO tb_gundala (id_log, nama_user, ...) VALUES ('" . $data['id_cus'] . "', '" . $data['nama_user'] . "', ...)";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(["message" => "Record created successfully"]);
        } else {
            echo json_encode(["error" => "Error: " . $sql . "\n" . $conn->error]);
        }
        break;

    case 'PUT':
        $id_cus = $conn->real_escape_string($_GET['id_cus']);
        $data = json_decode(file_get_contents('php://input'), true);
        $sql = "UPDATE tb_gundala SET nama_user = '" . $data['nama_user'] . "', ... WHERE id_log = '$id_cus'";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(["message" => "Record updated successfully"]);
        } else {
            echo json_encode(["error" => "Error updating record: " . $conn->error]);
        }
        break;

    case 'DELETE':
        $id_cus = $conn->real_escape_string($_GET['id_cus']);
        $sql = "DELETE FROM tb_gundala WHERE id_log = '$id_cus'";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(["message" => "Record deleted successfully"]);
        } else {
            echo json_encode(["error" => "Error deleting record: " . $conn->error]);
        }
        break; */

    default:
        echo json_encode(["error" => "Invalid request method"]);
        break;
}

$conn->close();
?>
