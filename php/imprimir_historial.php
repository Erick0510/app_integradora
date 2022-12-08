<?php 
include("sesiones.php");  //mandar a llamar las sesiones
include("conexion.php"); //conexion a la base de datos
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

<!-- campos de la tabla que se mostrará -->
<table class="width200">
    <h2>HISTORIAL SOLICITUDES</h2>
        <thead>
            <th>No. SERIE</th>
            <th>EQUIPO</th>
            <th>CONDICIONES</th>
            <th>FECHA</th>
            <th>STATUS</th>
            <th>USUARIO</th>
        
        
        </thead>
        <?php
       $id_historial= $_REQUEST['id_historial'];
        $query="SELECT DATE_FORMAT(fecha, '%d-%m-%y %h:%m:%s') as fecha, nombre_equipo, condiciones, usuario, status, no_serie, id, rfc FROM solicitud_respuesta_copia where id='$id_historial'";    
        $result=mysqli_query($conn, $query);
                if (mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result))
                       {
                        ?>
        <tbody>

        <!-- datos que se mostrará en la tabla -->
        <tr>
        <td> <?php echo $row['no_serie'] ?></td>
        <td> <?php echo $row['nombre_equipo'] ?></td>
        <td> <?php echo $row['condiciones'] ?></td>
        <td> <?php echo $row['fecha'] ?></td>
        <td> <?php echo $row['status'] ?></td>
        <td> <?php echo $row['usuario'] ?></td>
        

                          
                          </tr> 
                       <?php
                      }
                    }

              ?>
        </tbody>
    </table>
    
</body>
</html>