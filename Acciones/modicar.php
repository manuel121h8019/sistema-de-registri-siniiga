<?php 
session_start();
include_once( "../conexion_siniiga/cnxsiniiga.php" );
$id=$_POST['id'];
$upp=$_POST['claveupp'];
$nombrePro = $_POST['nombrepro'];
$nombrePred = $_POST['nombrepre'];
$nombreTec = $_POST['nombretec'];
$seriedel = $_POST['serie'];
$al = $_POST['al'];
$totalPaq = $_POST['totalpa'];
$fechaAre = $_POST['fecharetado'];
$numSiniiga = $_POST['numsiniiga'];
$areteCam= $_POST['aretecamp'];
$fechaNac = $_POST['fechnac'];
$sexo = $_POST['sexo'];
$raza = $_POST['raza'];
$cruza = $_POST['espesifraza'];
$empadre= $_POST['empadre'];
$razapadre = $_POST['razapadre'];
$razamadre= $_POST['razamadre'];

$sql = "UPDATE tala_siniiga SET Clave_UPP='$upp', Nombre_del_productor='$nombrePro', Nombre_del_predio='$nombrePred', Nombre_del_Tecnico='$nombreTec',  Serie_del='$seriedel',  Al='$al', Total_de_paquetes_Comp='$totalPaq', Fecha_de_aretado='$fechaAre', No_SINIIGA='$numSiniiga', Arete_Campa='$areteCam', Fecha_de_Nac='$fechaNac', Sexo='$sexo', Raza='$raza', Especificar_Cruza='$cruza', Empadre='$empadre', Padre='$razapadre', Madre='$razamadre'   WHERE id_rege='$id'";


if ($conn->query($sql) === TRUE) {
     header("location:../Paginas/consultageneral.php");
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
