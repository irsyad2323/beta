<?php
header("Content-Type: application/json");

// Baca body JSON
$json_input = file_get_contents('php://input');
$data = json_decode($json_input, true);

// Cek apakah JSON valid
if (!$data) {
    echo json_encode(["status" => "error", "message" => "Invalid JSON"]);
    exit;
}

// Ambil user_id dari JSON
$user_id = $data['user_id'] ?? null;
$kode_user = $data['kode_user'] ?? null;
$phone = $data['phone'] ?? null;

if (!$user_id) {
    echo json_encode(["status" => "error", "message" => "Invalid input: user_id is required"]);
    exit;
}

// Koneksi PostgreSQL
$pg_host = '103.163.139.36';
$pg_dbname = 'db_kapten';
$pg_user = 'vps_postgress';
$pg_password = '231215';
$pg_dsn = "pgsql:host=$pg_host;dbname=$pg_dbname";

try {
    $pdo = new PDO($pg_dsn, $pg_user, $pg_password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => "PostgreSQL Connection failed: " . $e->getMessage()]);
    exit;
}

// Koneksi MySQL
$mysql_host = "117.103.69.22";
$mysql_user = "kocak";
$mysql_password = "gaming";
$mysql_dbname = "billkapten";

$conn = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_dbname);
if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "MySQL Connection failed: " . $conn->connect_error]);
    exit;
}

try {
    // 1️⃣ Ambil data user dari PostgreSQL (users + user_customers)
    $stmt = $pdo->prepare("
        SELECT d.*, b.customer_id 
        FROM users d
        JOIN user_customers b ON d.id = b.user_id
        WHERE d.id = :user_id
    ");
    $stmt->execute(['user_id' => $user_id]);
    $users = $stmt->fetchAll();

    if (!$users) {
        echo json_encode(["status" => "error", "message" => "User not found in PostgreSQL"]);
        exit;
    }

    $result_data = [];

    // 2️⃣ Loop setiap customer_id untuk mengambil data MySQL
    foreach ($users as $user) {
        $customer_id = $user['customer_id'];

        // Query MySQL: Ambil data dari tb_gundala berdasarkan customer_id
        $stmt_mysql_gundala = $conn->prepare("SELECT * FROM tb_gundala WHERE id_log = ?");
        $stmt_mysql_gundala->bind_param("i", $customer_id);
        $stmt_mysql_gundala->execute();
        $result_gundala = $stmt_mysql_gundala->get_result();
        
        $data_gundala = [];
        $kode_user = null; // Inisialisasi variabel kode_user
        $id_log = null;
        $paket = null;
        $expiration = null;

        while ($row = $result_gundala->fetch_assoc()) {
            $data_gundala[] = $row;
            if (!$kode_user && isset($row['kode_user'])) {
                $kode_user = $row['kode_user'];
                $id_log = $row['id_log'];
                $paket = $row['paket'];
            }
        }
        $stmt_mysql_gundala->close();

        // Jika kode_user tidak ditemukan, skip radcheck query
        $data_radcheck = [];
        if ($kode_user) {
            $stmt_mysql_radcheck = $conn->prepare("
                SELECT * FROM radcheck 
                WHERE attribute = 'Expiration' 
                AND username = ?
            ");
            $stmt_mysql_radcheck->bind_param("s", $kode_user);
            $stmt_mysql_radcheck->execute();
            $result_radcheck = $stmt_mysql_radcheck->get_result();

            while ($row = $result_radcheck->fetch_assoc()) {
                $data_radcheck[] = $row;
                $expiration = $row['value'];
            }
            $stmt_mysql_radcheck->close();
        }

        // Tambahkan hasil dari setiap iterasi ke array result
        $result_data[] = [
            "customer_id" => $id_log,
            "kode" => $kode_user,
            "paket_internet" => $paket ? $paket . " Mbps" : null,
            "expiration" => $expiration
        ];
    }

    // 4️⃣ Kirim hasil dalam format JSON
    echo json_encode([
        "status" => "success",
        "data" => $result_data
    ]);
} catch (Exception $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}

// Tutup koneksi MySQL
$conn->close();
?>
