<?php 
//conexion a la base de datos y sesiones
include("sesiones.php"); 
include_once("conexion.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/tablas.css">
    <title>Document</title>
</head>
<body onload="window.print();">
<!-- campos de la tabla -->
<table class="width200">
    <h2>TUS SOLICITUDES</h2>
        <thead>
    
            <th>No. SERIE</th>
            <th>EQUIPO</th>
            <th>CONDICIONES</th>
            <th>STATUS</th>
            <th>COMENTARIOS</th>
            <th>FECHA ENTREGA</th>
        
        </thead>
        <?php
        $id = $_REQUEST['id_solicitud'];
        //consulta
        $query="SELECT id, no_serie, usuario, nombre, condiciones, status, comentarios, DATE_FORMAT(fecha_limite, '%d-%m-%y %h:%m:%s') as fecha_limite, DATE_FORMAT(fecha, '%d-%m-%y %h:%m:%s') as fecha FROM solicitud_respuesta WHERE id='$id'";
        $result=mysqli_query($conn, $query);
            if (mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result))
                       {
                    
                    ?>
        <tbody>
        <!-- datos de la tabla que se mostrará -->
        <tr>
        <td> <?php echo $row['no_serie'] ?></td>
        <td> <?php echo $row['nombre'] ?></td>
        <td> <?php echo $row['condiciones'] ?></td>
        <td> <?php echo $row['status'] ?></td>
        <td> <?php echo $row['comentarios'] ?></td>
        <td> <?php echo $row['fecha_limite'] ?></td>


                          
                          </tr> 
                       <?php
                      }
                    }

              ?>
        </tbody>
    </table>
    
</body>
</html>
