<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "siniiga";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Vrificar la connection
if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
}
?>