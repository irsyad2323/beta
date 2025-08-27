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
    $sql = "SELECT * FROM tbl_instalasi_tiang";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_all(MYSQLI_ASSOC));
    } else {
        echo json_encode([]);
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
