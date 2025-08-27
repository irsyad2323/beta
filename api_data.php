<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION["logingundala"])) {
    echo json_encode(['data' => [], 'recordsTotal' => 0, 'recordsFiltered' => 0]);
    exit;
}

try {
    include('controller/controller_mysqli.php');
    
    $start = isset($_POST['start']) ? intval($_POST['start']) : 0;
    $length = isset($_POST['length']) ? intval($_POST['length']) : 10;
    $search = isset($_POST['search']['value']) ? $_POST['search']['value'] : '';
    
    // Query dengan pagination
    $where = "WHERE pic_ikr IS NOT NULL";
    if (!empty($search)) {
        $where .= " AND pic_ikr LIKE '%$search%'";
    }
    
    $query = "SELECT pic_ikr as user_pic FROM tbl_fal $where GROUP BY pic_ikr LIMIT $start, $length";
    $result = mysqli_query($koneksi, $query);
    
    // Count total records
    $countQuery = "SELECT COUNT(DISTINCT pic_ikr) as total FROM tbl_fal WHERE pic_ikr IS NOT NULL";
    $countResult = mysqli_query($koneksi, $countQuery);
    $totalRecords = mysqli_fetch_assoc($countResult)['total'];
    
    $data = [];
    $no = $start + 1;
    
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = [
            $no++,
            htmlspecialchars($row['user_pic']),
            '<small class="badge badge-success">Idle</small>',
            '0',
            '0'
        ];
    }
    
    echo json_encode([
        'draw' => isset($_POST['draw']) ? intval($_POST['draw']) : 1,
        'recordsTotal' => $totalRecords,
        'recordsFiltered' => $totalRecords,
        'data' => $data
    ]);
    
} catch (Exception $e) {
    echo json_encode(['data' => [], 'recordsTotal' => 0, 'recordsFiltered' => 0]);
}
?>