<?php
header("Content-Type: application/json");
require_once __DIR__ . '/../helpers/response.php';
require_once __DIR__ . '/../middleware/auth.php';

try {
    // 🔹 **Autentikasi Token**
    $user_id = authenticate();

    require_once __DIR__ . '/config/db.php';

    // Ambil parameter ID produk (jika ada)
    $product_id = isset($_GET['id']) ? intval($_GET['id']) : null;

    if ($product_id) {
        // 🔹 **Ambil Detail Produk berdasarkan ID**
        $stmt = $pdo->prepare("SELECT p.id AS product_id, p.name, p.description, p.is_subscription, p.is_installation_required, c.name AS category, pr.price, pr.billing_cycle FROM products p JOIN product_categories c ON p.category_id = c.id LEFT JOIN product_pricing pr ON p.id = pr.product_id AND pr.valid_from = (SELECT MAX(valid_from) FROM product_pricing WHERE product_id = p.id) WHERE p.id = :product_id");
        $stmt->execute(['product_id' => $product_id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$product) {
            sendResponse("error", 404, "Produk tidak ditemukan");
        }

        // 🔹 **Ambil semua gambar produk**
        $stmt_images = $pdo->prepare("SELECT image_url FROM product_images WHERE product_id = :product_id");
        $stmt_images->execute(['product_id' => $product_id]);
        $product['images'] = $stmt_images->fetchAll(PDO::FETCH_COLUMN);

        // 🔹 **Ambil fitur produk**
        $stmt_features = $pdo->prepare("SELECT name, value, time_start, time_end FROM product_features WHERE product_id = :product_id");
        $stmt_features->execute(['product_id' => $product_id]);
        $product['features'] = $stmt_features->fetchAll(PDO::FETCH_ASSOC);

        sendResponse("success", 200, "Detail produk berhasil diambil", $product);
    } else {
        // 🔹 **Ambil Semua Produk**
        $stmt = $pdo->prepare("SELECT p.id AS product_id, p.name, p.is_subscription, p.is_installation_required, c.name AS category, pr.price, pi.image_url AS main_image FROM products p JOIN product_categories c ON p.category_id = c.id LEFT JOIN product_pricing pr ON p.id = pr.product_id AND pr.valid_from = (SELECT MAX(valid_from) FROM product_pricing WHERE product_id = p.id) LEFT JOIN product_images pi ON p.id = pi.product_id AND pi.is_main = TRUE ORDER BY p.created_at ASC");
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        sendResponse("success", 200, "Data produk berhasil diambil", $products);
    }
} catch (Exception $e) {
    sendResponse("error", 500, "Server error: " . $e->getMessage());
}
