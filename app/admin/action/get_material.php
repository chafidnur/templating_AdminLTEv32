<?php
include('../../config/dbcon.php');

header('Content-Type: application/json');

if (isset($_GET['kode_material'])) {
    // Get specific material
    $kode_material = mysqli_real_escape_string($con, $_GET['kode_material']);
    $query = "SELECT * FROM material WHERE kode_material = '$kode_material'";
    $result = mysqli_query($con, $query);
    
    if ($row = mysqli_fetch_assoc($result)) {
        echo json_encode($row);
    } else {
        echo json_encode(['error' => 'Material not found']);
    }
} else {
    // Get all materials
    $query = "SELECT kode_material, nama_bahanbaku, stock, satuan, harga FROM material ORDER BY nama_bahanbaku ASC";
    $result = mysqli_query($con, $query);

    if (!$result) {
        echo json_encode(['error' => 'Database query failed']);
        exit;
    }

    $materials = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $materials[] = $row;
    }

    echo json_encode($materials);
}
?>