<?php
include('../../config/dbcon.php');

if (isset($_GET['kode_produk'])) {
    $kode_produk = mysqli_real_escape_string($con, $_GET['kode_produk']);
    $query = "SELECT * FROM produk WHERE kode_produk = '$kode_produk'";
    $result = mysqli_query($con, $query);
    
    if ($row = mysqli_fetch_assoc($result)) {
        echo json_encode($row);
    } else {
        echo json_encode(['error' => 'Produk tidak ditemukan']);
    }
} else {
    echo json_encode(['error' => 'Permintaan tidak valid']);
}
?>