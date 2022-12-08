<?php
//conexion a la base de datos y sesiones
include("sesiones.php");
include("conexion.php"); 

//variable alerta
$tabla="";

//Consulta para mostrar datos de la bd
$query="SELECT DATE_FORMAT(fecha, '%d-%m-%y %h:%m:%s') as fecha, nombre_equipo, condiciones, usuario, status, no_serie, id, rfc FROM solicitud_respuesta_copia";

//condicion de la query / llamar formulario solcitud
if(isset($_POST['solicitud']))
{
    $q=$conn->real_escape_string($_POST['solicitud']);
    $query="SELECT * FROM solicitud_respuesta_copia WHERE
    no_serie LIKE '%".$q."%' OR
    nombre_equipo LIKE '%".$q."%' OR
    condiciones LIKE '%".$q."%' OR 
    fecha LIKE '%".$q."%' OR
    status LIKE '%".$q."%' OR
    usuario LIKE '%".$q."%' OR
    rfc LIKE '%".$q."%'
     ";
}

$busquedaSolicitud=$conn->query($query);
if($busquedaSolicitud->num_rows>0)
{
    //campo de la tabla
    $tabla.=
    '<thead>

    <th>No. Serie</th>
    <th>Nombre</th>
    <th>Condiciones</th>
    <th>Fecha</th>
    <th>Status</th>
    <th>Usuario</th>
    <th>Rfc</th>
    <th>Acciones</th>

    </thead>
    ';

    while($row= $busquedaSolicitud->fetch_assoc())
{
    $tabla.=
    '
    <tbody>

    <tr>

             //datos de la tabla
    <td>'.$row['no_serie'].'</td>
    <td>'.$row['nombre_equipo'].'</td>
    <td>'.$row['condiciones'].'</td>
    <td>'.$row['fecha'].'</td>
    <td>'.$row['status'].'</td>
    <td>'.$row['usuario'].'</td>
    <td>'.$row['rfc'].'</td>
    
    <td>

    
    <a class="btn-acciones" href="update.php?id_solicitud_copia='.$row['id'].' && no_serie='.$row['no_serie'].' && rfc= '.$row['rfc'].'"><i class="fa-solid fa-circle-check entrega"></i></a>
        <?php } ?>
        <a href="imprimir_historial.php?id_historial='.$row['id'].'" target="_blank"><i class="fa-solid fa-print solicitud"></i></a>
    </td>
        
                      
    </tr>
    ';
}
$tabla.= '</tbody>';

}else
{
    //alerta
    $tabla='<h1 align="center">No se encontraron coincidencias con sus criterios de busqueda</h1>';
}

echo $tabla;
?>