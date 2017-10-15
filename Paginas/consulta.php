<?php
session_start();
include_once( "cnxsiniiga.php" );

$sql = "SELECT 	* FROM tala_siniiga order by id_rege desc LIMIT 1";
$result = $conn->query( $sql );


?>

<!DOCTYPE html>
<html>

<head>
    <title>Registro</title>.
    <meta charset="UTF-8">
    <link rel="stylesheet prefetch" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css" type="text/css" media="all">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
    <div id="contenedor_general" class="container-fluid">
        <?php
        if ( $result->num_rows > 0 ) {
            // Salida de los datos en la tabla
            while ( $row = $result->fetch_assoc() ) {
                ?>

        <div class="col-xs-12" id="caja_1">   
          <!--Tabla donde estab los logos-->
            <br>
            <table id="tbLogos" style="width:100%">
                <tbody>
                    <tr>
                        <td class="col-xs-4 col-sm-4 col-md-4" align="center"><img src="img/SEMARNAT_logo_2012.png" width="237" height="75">
                        </td>
                        <td class="col-xs-4 col-sm-4 col-md-4" align="center"><img id="logo" width="121" height="105" src="img/logo_SINIIGA.gif">
                        </td>
                        <td class="col-xs-4 col-sm-4 col-md-4" align="center"><img src="img/9507288logo-cng.jpg" alt="" width="139" height="87" class="">
                        </td>
                    </tr>
              </tbody>
          </table>

            <!--Tabla donde estan los datos personales-->
            <h4>CEDULA DE IDENTIFICAION ESPECIE (BOVINA, OVINA Y CAPRINA)</h4>
            <table id="tb1" style="width:100%">
                <tbody>
                    <tr>
                        <td><label>CLAVE UPP: </label><br>
                            <?php echo $row["Clave_UPP"]?>
                        </td>
                        <td><label>NOMBRE DEL PRODUCTOR: </label><br>
                            <?php echo $row["Nombre_del_productor"]?>
                        </td>
                        <td>
                            <LABEL>FECHA DE ARETADO:</LABEL><br>
                            <?php echo $row["Fecha_de_aretado"]?>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><label>NOMBRE DEL PREDIO:</label><br>
                            <?php echo $row["Nombre_del_predio"]?> </td>
                        <td><label>NOMBRE DEL TÉCNICO:</label><br>
                            <?php echo $row["Nombre_del_Tecnico"]?> </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><label>SERIE: </label><br>
                            <?php echo $row["Serie_del"]?>
                        </td>
                        <td><label>AL: </label><br>
                            <?php echo $row["Al"]?>
                        </td>
                        <td><label>TOTAL DE PAQUETES COMPLETOS: </label><br>
                            <?php echo $row["Total_de_paquetes_Comp"]?>
                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <br>
            <!--tabla de los datos de el ganado -->
            <table id="tb2" style="width:100%" border="1">
                <tbody>
                    <tr>
                        <th></th>
                        <th>NO SINIIGA</th>
                        <th>ARETE DE<br>CAMPAÑA</th>
                        <th>FECHA DE<br>NACIMIENTO</th>
                        <th>SEXO</th>
                        <th>RAZA</th>
                        <th>ESPECIFICA<br>RAZA/CRUZA</th>
                        <td>EMPADRE</td>
                        <td>PADRE</td>
                        <td>MADRE</td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $row["id_rege"]?> </td>
                        <td>
                            <?php echo $row["No_SINIIGA"]?> </td>
                        <td>
                            <?php echo $row["Arete_Campa"]?>
                        </td>
                        <td>
                            <?php echo $row["Fecha_de_Nac"]?>
                        </td>
                        <td>
                            <?php echo $row["Sexo"]?>
                        </td>
                        <td>
                            <?php echo $row["Raza"]?>
                        </td>
                        <td>
                            <?php echo $row["Especificar_Cruza"]?>
                        </td>
                        <td>
                            <?php echo $row["Empadre"]?>
                        </td>
                        <td>
                            <?php echo $row["Padre"]?>
                        </td>
                        <td>
                            <?php echo $row["Madre"]?>
                        </td>
                    </tr>
                </tbody>
                <?php  }
    } else {
        echo "0 results";
    }?>
                </tbody>
            </table>
            <br>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <!--caja del boton guardar-->
                <div class="form-group">
                    <a href="tabmodificar.php" class="btn btn-success" role="button">Modificar</a>
                    <a href="" class="btn btn-danger" role="button" onClick="confirmation()">Eliminar</a>
                    <a href="index.html" class="btn btn-primary" role="button" >Regresar</a>
                </div>
            </div>


      </div>
        <!--pertenece a la caja_1-->
    </div>
    <!--pertenece al div general-->
    
    <script type="text/javascript"> 
function confirmation() {
	var answer = confirm("¿Deseas eliminar este resgitro?")
	if (answer){
		alert("Borrado")
		window.location = "eliminar.php";
	}
	else{
        window.location = "consulta.php";
	}
}
</script>
</body>
<?php $conn->close(); ?>

</html>