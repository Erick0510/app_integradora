<?php 
include_once('sesiones.php');
require_once 'dompdf/autoload.inc.php';

// Inicializar dompdf
use Dompdf\Dompdf;
$dompdf = new Dompdf();

// Preparar el contenido html
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/tablas.css">
    <!-- estilos del reporte -->
    <style>
    h1{

		text-align: center;
	}
	h2 {
		font-size:1.5rem;
		text-align: center;
		margin-bottom: 1em;
		color: rgb(125, 125, 125);
		margin-top: 1em;
		
	}
	table.width200,table.rwd_auto {border:1px solid black;width:100%;margin:0 0 50px 0; border-collapse: collapse; box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;}
		.width200 th,.rwd_auto th {background:#02a282;border:1px solid black;padding:5px;text-align:center;   font-family: 'Comfortaa', cursive;  color: white;}
		.width200 td,.rwd_auto td {border-bottom:1px solid rgb(0, 0, 0);padding:5px;text-align:center;   font-family: 'Comfortaa', cursive; background-color: #e5f1f4; color:black;}
		.width200 tr:last-child td, .rwd_auto tr:last-child td{border:1px solid}
	td a .fa-solid{color: #EF9001; transition: .4s ease-out;}
	td a .solicitud{color: #EF9001; transition: .4s ease-out;}
	td a .solicitud:hover{color: #b16a00;}
	td a .entrega{color: #EF9001; transition: .4s ease-out;}
	td a .entrega:hover{color: #02a282;}
	td a .fa-ban:hover{color: rgb(249, 72, 72);}
	td a .fa-trash-can:hover{color: rgb(249, 72, 72);}
	td a .fa-pen-to-square:hover{color: #02a282;}	
	.rwd {width:100%;overflow:auto;}
		.rwd table.rwd_auto {width:auto;min-width:100%}
			.rwd_auto th,.rwd_auto td {white-space: nowrap;}
        </style>
    <title>Reporte</title>

</head>
<body>
<h2>HISTORIAL SOLICITUDES</h2>
<!-- Tabla donde se genera el historial -->
<table class="width200">

        <!-- campos de la tabla -->
        <thead>
            <th>No. SERIE</th>
            <th>EQUIPO</th>
            <th>CONDICIONES</th>
            <th>FECHA</th>
            <th>STATUS</th>
            <th>USUARIO</th>
        
        
        </thead>
        <?php
        //conexion a la base de datos
        include_once("conexion.php");

        //variable del id de historial
        $id_historial= $_REQUEST['id_historial'];   
        

        //consulta para mostrar la informacion en la tabla
        $query="SELECT * from solicitud_respuesta_copia";    

        //variable de la condicion
        $result=mysqli_query($conn, $query);
        
        //condicion dependiendo del resultado de la consulta
                if (mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result))
                       {
                        ?>
        <tbody>
            <!-- Datos de la bd ingresados en la tabla -->
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

<?php

// Obteniendo el buffer del archivo
$html=ob_get_clean();
// NOTA: "echo $html;" para comprobar si se ve o no el html

// Configurando opciones de Dompdf
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadhtml($html);

// Tamaño de el reporte
$dompdf->setPaper('letter');

// Renderizando el archivo
$dompdf->render();
$dompdf->stream("reporte.pdf", array('Attachment' => false));

?>