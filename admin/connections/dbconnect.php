<?php
$servername = "localhost";
$username = "Sanghamitra_User1";
$password = "Z$A$rFq3*KE]";
$database = "Sanghamitra";
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "vdc";


// Create a connection
$con = new mysqli($servername, $username, $password, $database);

// Check connection
if ($con->connect_error) {
    header("Location: ../error/dberror.php");
    die();
    // die("Connection failed: " . $con->connect_error);
}
?>
