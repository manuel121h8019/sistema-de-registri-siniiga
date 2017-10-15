<?php
session_start();
 include_once( "../conexion_siniiga/cnxsiniiga.php" );

$claveUpp= $_POST['claveUpp'];
$nombrePro = $_POST['nombrePro'];
$nombrePred = $_POST['nombrePred'];
$nombreTec = $_POST['nombreTec'];
$seriedel = $_POST['seriedel'];
$al = $_POST['al'];
$totalPaq = $_POST['totalPaq'];
$fechaAre = $_POST['fechaAre'];
$numSiniiga = $_POST['numSiniiga'];
$areteCam= $_POST['areteCam'];
$fechaNac = $_POST['fechaNac'];
$sexo = $_POST['sexo'];
$raza = $_POST['raza'];
$cruza = $_POST['cruza'];
$empadre= $_POST['empadre'];
$razapadre = $_POST['razapadre'];
$razamadre= $_POST['razamadre'];


$sql = "INSERT INTO tala_siniiga (Clave_UPP, Nombre_del_productor, Nombre_del_predio, Nombre_del_Tecnico,
Serie_del, Al, Total_de_paquetes_Comp, Fecha_de_aretado, No_SINIIGA, Arete_Campa, Fecha_de_Nac, Sexo, Raza, Especificar_Cruza,
Empadre, Padre, Madre)
VALUES ('$claveUpp', '$nombrePro', '$nombrePred', '$nombreTec', '$seriedel', '$al', '$totalPaq', '$fechaAre', '$numSiniiga', '$areteCam', '$fechaNac', '$sexo', '$raza', '$cruza', '$empadre', '$razapadre', '$razamadre')";

if ($conn->query($sql) === TRUE) {
     header("Location:../Paginas/consultageneral.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


