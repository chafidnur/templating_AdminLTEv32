<?php
// Include database connection
require_once '../../config/dbcon.php';

// Set header untuk JSON response
header('Content-Type: application/json');

// Check if the request is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit;
}

// Get and sanitize input
$kode_produk = isset($_POST['kode_produk']) ? mysqli_real_escape_string($con, $_POST['kode_produk']) : '';
$materials = isset($_POST['materials']) ? $_POST['materials'] : [];

// Validate input
if (empty($kode_produk) || empty($materials)) {
    echo json_encode(['status' => 'error', 'message' => 'Missing required data']);
    exit;
}

// Start transaction
mysqli_begin_transaction($con);

try {
    // Delete existing materials for this product
    $query = "DELETE FROM product_materials WHERE kode_produk = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $kode_produk);
    if (!mysqli_stmt_execute($stmt)) {
        throw new Exception("Error deleting existing materials");
    }

    // Prepare insert statement
    $insert_query = "INSERT INTO product_materials (kode_produk, kode_material, jumlah, satuan) VALUES (?, ?, ?, ?)";
    $insert_stmt = mysqli_prepare($con, $insert_query);

    // Insert new materials
    foreach ($materials as $item) {
        $kode_material = isset($item['kode_material']) ? $item['kode_material'] : '';
        $jumlah = isset($item['jumlah']) ? $item['jumlah'] : '';
        $satuan = isset($item['satuan']) ? $item['satuan'] : '';

        if (empty($kode_material) || empty($jumlah) || empty($satuan)) {
            throw new Exception("Invalid material data");
        }

        mysqli_stmt_bind_param($insert_stmt, "ssds", $kode_produk, $kode_material, $jumlah, $satuan);
        if (!mysqli_stmt_execute($insert_stmt)) {
            throw new Exception("Error inserting new material");
        }
    }

    // Commit transaction
    mysqli_commit($con);

    echo json_encode(['status' => 'success', 'message' => 'Product materials saved successfully']);
} catch (Exception $e) {
    // Rollback transaction on error
    mysqli_rollback($con);
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
} finally {
    // Close prepared statements
    if (isset($stmt)) mysqli_stmt_close($stmt);
    if (isset($insert_stmt)) mysqli_stmt_close($insert_stmt);
    
    // Close database connection
    mysqli_close($con);
}
?>