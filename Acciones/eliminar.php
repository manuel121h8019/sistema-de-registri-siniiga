<?php 
session_start();
include_once( "../conexion_siniiga/cnxsiniiga.php" );

$idfila=$_POST["numfila"];
// sql to delete a record
$sql = "DELETE  FROM tala_siniiga WHERE id_rege='$idfila'";

if ($conn->query($sql) === TRUE) {
   header("location:../Paginas/consultageneral.php");
} else {
    echo "Error al borrar los datos: " . $conn->error;
}

$conn->close();
?>