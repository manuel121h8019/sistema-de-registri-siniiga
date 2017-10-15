<?php
session_start();
include_once( "../conexion_siniiga/cnxsiniiga.php" );

$idfila=$_POST["numfila"];

$sql = "SELECT 	* FROM tala_siniiga WHERE id_rege='$idfila'";
$result = $conn->query( $sql );


?>

<!DOCTYPE html>
<html>

<head>
    
    <meta charset="UTF-8">
    <link rel="stylesheet prefetch" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/style.css" type="text/css" media="all">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Registros</title>.
    </head>

<body>
    <div id="contenedor_general" class="container">
        <?php
        if ( $result->num_rows > 0 ) {
            // Salida de los datos en la tabla
            while ( $row = $result->fetch_assoc() ) {
                ?>

        <div class="col-lg-12 col-md-12" style="width:100%" id="caja_1" >   
          <!--Tabla donde estab los logos-->
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

            <!--Tabla donde estan los datos personales-->
            <h4>CEDULA DE IDENTIFICAION ESPECIE (BOVINA, OVINA Y CAPRINA)</h4>
            <form method="post" action="../Acciones/modicar.php"> 
            <table id="tb1" style="width:100%">
                <tbody>
                    <tr>
                      <td width="28%"><label>CLAVE UPP:</label><br>
                            <input id="claveupp" name="claveupp" type="text" size="10px" value="<?php echo $row["Clave_UPP"]?>">
                        </td>
                        <td width="37%"><label>NOMBRE DEL PRODUCTOR:</label><br>
                           <input id="nombrepro" name="nombrepro" type="text" size="30px" value="<?php echo $row["Nombre_del_productor"]?>">
                            
                      </td>
                        <td width="34%">
                          <LABEL>FECHA DE ARETADO:</LABEL><br>
                            <input id="fecharetado" name="fecharetado" type="date" size="10px" value="<?php echo $row["Fecha_de_aretado"]?>">
                            
                      </td>
                        <td width="1%"></td>
                  </tr>
                    <tr>
                        <td><label>NOMBRE DEL PREDIO:</label><br>
                            <input id="nombrepre" name="nombrepre" type="text" size="20px" value="<?php echo $row["Nombre_del_predio"]?>">   
                      </td>
                        <td><label>NOMBRE DEL TÉCNICO:</label><br>
                           <input id="nombretec" name="nombretec" type="text" size="30px" value="<?php echo $row["Nombre_del_Tecnico"]?>">
                      </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><label>SERIE: </label><br>
                           <input id="serie" name="serie" type="text" size="10px" value="<?php echo $row["Serie_del"]?>">
                        </td>
                        <td><label>AL: </label><br>
                           <input id="al" name="al" type="text" size="10px" value="<?php echo $row["Al"]?>">                            
                        </td>
                        <td><label>TOTAL DE PAQUETES COMPLETOS: </label><br>
                         <input id="totalpa" name="totalpa" type="text" size="10px" value="<?php echo $row["Total_de_paquetes_Comp"]?>">    
                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <br>
            <!--tabla de los datos de el ganado -->
            <div class="table-responsive">
            <table  id="tb2"  border="1" style="width:50%">
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
                    <td id="id" name="id">
                      <input name="id" id="id" type="text" value="<?php echo $row["id_rege"]?>" size="1px">
                    <td>
                      <input class="text-capitalize" id="numsiniiga" name="numsiniiga" type="text" size="10px" value="<?php echo $row["No_SINIIGA"]?>"> </td>
                    <td>
                      <input id="aretecamp" name="aretecamp" type="text" size="10px" value="<?php echo $row["Arete_Campa"]?>">
                      </td>
                    <td>
                      <input id="fechnac" name="fechnac" type="month" size="10px" value="<?php echo $row["Fecha_de_Nac"]?>">
                      </td>
                    <td>
                      <select name="sexo" id="sexo">  
                        <option selected><?php echo $idSex=$row["Sexo"]?></option>
                        <option><?php if ($idSex == "Macho"){ echo("Hembra") ;}
                                      elseif($idSex=="Hembra"){echo("Macho");}?></option>
                      </select>
                      </td>
                    <td>
                      <select name="raza" id="raza">  
                        <option selected><?php echo $idRaza=$row["Raza"]?></option>                        
                        <option><?php if ($idRaza=='Pura'){echo("Cruza");} 
                                      elseif($idRaza=="Cruza"){echo("Criollo");}
                                      else{echo("Pura");}?>
                        </option>
                        <option><?php if ($idRaza=='Pura'){echo("Criollo");} 
                                      elseif($idRaza=="Criollo"){echo("Cruza");}
                                      else{echo("Pura");}?>
                        </option>  
                      </select>                            
                      </td>
                    <td >
                      <input name="espesifraza" id="espesifraza" type="text" size="15px" value="<?php echo $row["Especificar_Cruza"]?>">
                      </td>
                    <td>
                      <select name="empadre" id="empadrep">  
                        <option selected><?php echo $idEmp=$row["Empadre"]?></option>
                        
                        <option><?php if ($idEmp=='Monta natural'){echo("Inseminacion artificial");} 
                                      elseif($idEmp=="Inseminacion artificial"){echo("Transferencia embrionaria");}
                                      else{echo("Monta natural");}?></option>
                                      
                        <option><?php if ($idEmp=='Monta natural'){echo("Transferencia embrionaria");} 
                                      elseif($idEmp=="Transferencia embrionaria"){echo("Inseminacion artificial");}
                                      else{echo("Monta natural");}?></option>  
                       </select>
                      </td>
                    <td>
                      <input id="razapadre" name="razapadre" type="text" size="15px" value="<?php echo $row["Padre"]?>">
                      </td>
                    <td>
                      <input id="razamadre" name="razamadre" type="text" size="15px" value="<?php echo $row["Madre"]?>">
                      </td>
                    </tr>
                  </tbody>
                <?php  }
    } else {
        echo "0 results";
    }?>
                </tbody>
              </table>
            </div>
            <br>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <!--caja del boton guardar-->
                <div class="form-group">
                    <input type="submit" class="btn btn-success" role="button" value="Guardar">
                    <a href="../Paginas/consultageneral.php" class="btn btn-primary" role="button">Regresar</a>
                </div>
            </form>
            </div>
        <div class="col-sm-12 col-lg-12">&nbsp;</div>
        

      </div>
        <!--pertenece a la caja_1-->
    </div>
    <!--pertenece al div general-->
</body>
<?php $conn->close(); ?>

</html>