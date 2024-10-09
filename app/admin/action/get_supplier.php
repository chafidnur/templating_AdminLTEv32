<?php
// Include database connection
include('../../config/dbcon.php');

if(isset($_GET['kode_supplier'])) {
    $kode_supplier = mysqli_real_escape_string($con, $_GET['kode_supplier']);
    $query = "SELECT * FROM supplier WHERE kode_supplier = '$kode_supplier'";
    $result = mysqli_query($con, $query);
    
    if($result) {
        if(mysqli_num_rows($result) > 0) {
            $supplier = mysqli_fetch_assoc($result);
            echo json_encode([
                'status' => 'success',
                'kode_supplier' => $supplier['kode_supplier'],
                'nama' => $supplier['nama'],
                'email' => $supplier['email'],
                'telp' => $supplier['telp'],
                'alamat_supplier' => $supplier['alamat_supplier']
            ]);
        } else {
            // Supplier not found
            echo json_encode([
                'status' => 'error',
                'message' => 'Supplier tidak ditemukan.'
            ]);
        }
    } else {
        // Query failed
        echo json_encode([
            'status' => 'error',
            'message' => 'Terjadi kesalahan saat mengambil data supplier.'
        ]);
    }
} else {
    // kode_supplier not provided
    echo json_encode([
        'status' => 'error',
        'message' => 'Kode supplier tidak diberikan.'
    ]);
}

// Close database connection
mysqli_close($con);
?>