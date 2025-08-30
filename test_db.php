<?php
include('controller/controller_mysqli.php');

if (mysqli_connect_errno()) {
    echo "Database connection failed: " . mysqli_connect_error();
} else {
    echo "Database connected successfully";
    
    // Test simple query
    $result = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM tbl_fal LIMIT 1");
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        echo "<br>Test query successful. Count: " . $row['total'];
    } else {
        echo "<br>Test query failed: " . mysqli_error($koneksi);
    }
}
?>