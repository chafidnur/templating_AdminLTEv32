<?php 
//BASE URL & PATH Configuration
define('BASE_URL', 'http://localhost:8049/ecatering_v2/'); 
define('BASE_PATH', 'C:/xampp8/htdocs/ecatering_v2/');

//Database Configuration
$host = "localhost";
$username = "root";
$password = "";
$database = "setuplte2";

//Connection
$con = mysqli_connect ("$host", "$username", "$password", "$database");

//Check Connection
if(!$con)
    {
//    header("Location: ../errors/db.php");
//        die(mysqli_connect_error ($con));
            die();    
    }
//else {
//    echo "Database Connected !";
//    }
?>
