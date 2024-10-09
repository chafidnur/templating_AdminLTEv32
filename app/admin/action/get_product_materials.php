<?php
include('../../config/dbcon.php');

// Set header untuk JSON
header('Content-Type: application/json');

// Aktifkan log error PHP ke file
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL);

function sendJsonResponse($data, $statusCode = 200) {
    http_response_code($statusCode);
    echo json_encode($data);
    exit;
}

try {
    $kode_produk = isset($_GET['kode_produk']) ? $_GET['kode_produk'] : null;
    if (!$kode_produk) {
        throw new Exception("Kode produk tidak ditemukan");
    }

    // Query untuk mendapatkan data produk
    $query = "SELECT nama_produk FROM produk WHERE kode_produk = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $kode_produk);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $product = mysqli_fetch_assoc($result);

    if (!$product) {
        throw new Exception("Produk tidak ditemukan");
    }

    // Query untuk mendapatkan bahan baku
    $query = "SELECT kode_material, nama_bahanbaku, satuan FROM material";
    $result = mysqli_query($con, $query);
    $materials = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Query untuk mendapatkan bahan baku produk yang sudah ada
    $query = "SELECT pm.kode_material, pm.jumlah, pm.satuan, m.nama_bahanbaku 
              FROM product_materials pm
              JOIN material m ON pm.kode_material = m.kode_material
              WHERE pm.kode_produk = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $kode_produk);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $product_materials = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $response = [
        "status" => "success",
        "product" => $product,
        "materials" => $materials,
        "product_materials" => $product_materials
    ];

    sendJsonResponse($response);
} catch (Exception $e) {
    error_log("Error occurred: " . $e->getMessage());
    sendJsonResponse(["status" => "error", "message" => $e->getMessage()], 400);
} finally {
    if (isset($con)) {
        mysqli_close($con);
    }
}

// Kirim respons JSON
echo json_encode($response);
?>