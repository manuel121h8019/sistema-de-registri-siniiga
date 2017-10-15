<?php
session_start();
include_once( "../conexion_siniiga/cnxsiniiga.php" );

$sql = "SELECT 	* FROM tala_siniiga";
$result = $conn->query( $sql );
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Consulta general</title>
    <link rel="stylesheet prefetch" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/style.css" type="text/css" media="all">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<div class="container" id="contenedor_general"> 
  <div id="caja_1" class="col-md-12 col-lg12">
   <br>
    <table id="tbLogos" style="width:100%">
      <tbody>
        <tr>
          <td class="col-xs-4 col-sm-4 col-md-4" align="center"><img src="../img/SEMARNAT_logo_2012.png" width="237" height="75">
          </td>
          <td class="col-xs-4 col-sm-4 col-md-4" align="center"><img id="logo" width="121" height="105" src="../img/logo_SINIIGA.gif">
          </td>
          <td class="col-xs-4 col-sm-4 col-md-4" align="center"><img src="../img/9507288logo-cng.jpg" alt="" width="139" height="87" class="">
          </td>
        </tr>
      </tbody>
    </table>
    <h4>CEDULA DE IDENTIFICAION ESPECIE (BOVINA, OVINA Y CAPRINA)</h4>
    <div class="table-responsive">
      <table width="100%" border="1" class="" id="tb2">       
        <tbody>
          <tr style="text-align: center">
            <th scope="col">#</th>
            <th scope="col">Clave upp</th>
            <th scope="col">Nombre del <br>productor</th>
            <th scope="col">Fecha de <br>aretado</th>
            <th scope="col">Nombre del <br>predio</th>
            <th scope="col">Nombre del <br>técnico</th>
            <th scope="col">Serie del</th>
            <th scope="col">Al</th>
            <th scope="col">Total de paquetes <br>completos</th>
            <th scope="col">Numbreo de <br>SINIIGA</th>
            <th scope="col">Arete de <br>campaña</th>
            <th scope="col">Fecha de <br>Nacimiento</th>
            <th scope="col">Sexo</th>
            <th scope="col">Raza</th>
            <th scope="col">Espesificar <br>Raza/Cruza</th>
            <th scope="col">Empadre</th>
            <th scope="col">Padre</th>
            <th scope="col">Madre</th>
            <th scope="col">Modificar</th>
            <th scope="col">Borrar</th>
          </tr>
           <?php
        if ( $result->num_rows > 0 ) {
            // Salida de los datos en la tabla
            while ( $fila = $result->fetch_assoc() ) {
                ?>
          <tr>
            <td><?php echo $fila["id_rege"]?></td>   
            <td><?php echo $fila["Clave_UPP"]?></td>
            <td><?php echo $fila["Nombre_del_productor"]?></td>
            <td><?php echo $fila["Fecha_de_aretado"]?></td>
            <td><?php echo $fila["Nombre_del_predio"]?></td>
            <td><?php echo $fila["Nombre_del_Tecnico"]?></td>
            <td><?php echo $fila["Serie_del"]?></td>
            <td><?php echo $fila["Al"]?></td>
            <td><?php echo $fila["Total_de_paquetes_Comp"]?></td>
            <td><?php echo $fila["No_SINIIGA"]?></td>
            <td><?php echo $fila["Arete_Campa"]?></td>
            <td><?php echo $fila["Fecha_de_Nac"]?></td>
            <td><?php echo $fila["Sexo"]?></td>
            <td><?php echo $fila["Raza"]?></td>
            <td><?php echo $fila["Especificar_Cruza"]?></td>
            <td> <?php echo $fila["Empadre"]?></td>
            <td><?php echo $fila["Padre"]?></td>
            <td><?php echo $fila["Madre"]?></td>
            <form action="tabmodificar.php" method="post">
            <input type="hidden" value="<?php echo $fila["id_rege"]?>" name="numfila"> 
            <td>         
            <input type="submit"  class="btn btn-success" role="button"  value="Modificar">
            </td>
            </form>
            <form action="../Acciones/eliminar.php" method="post">
            <input type="hidden" value="<?php echo $fila["id_rege"]?>" name="numfila"> 
            <td>
            <input type="submit" class="btn btn-danger" role="button" onClick="confirmation()" value="Borrar">
            </td>
             </form>
          </tr>
          <?php  }
    } else {
        echo "0 resultados";
    }?>
       <?php $conn->close(); ?>
        </tbody>
      </table>
      <br>    
      <a href="../index.html" class="btn btn-primary" role="button" >Regresar</a>
      </div>    
  </div>
 </div>
<script type="text/javascript">
    function confirmation() {
        var answer = confirm( "¿Deseas eliminar este resgitro?" )
        if ( answer ) {
            alert( "Borrado" )
            window.location = "../Acciones/eliminar.php";
        } else {
            window.location = "consultageneral.php";
        }
    }
</script>
</body>

</html>