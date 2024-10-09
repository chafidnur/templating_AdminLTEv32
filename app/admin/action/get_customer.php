<?php
include('../../config/dbcon.php');

if (isset($_GET['kode_customer'])) {
    $kode_customer = mysqli_real_escape_string($con, $_GET['kode_customer']);
    $query = "SELECT * FROM customer WHERE kode_customer = '$kode_customer'";
    $result = mysqli_query($con, $query);
    
    if ($row = mysqli_fetch_assoc($result)) {
        echo json_encode($row);
    } else {
        echo json_encode(['error' => 'Customer not found']);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
}
?>