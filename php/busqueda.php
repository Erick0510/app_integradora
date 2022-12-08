<?php
//conexon a la base de datos y sesiones
include("sesiones.php");
include("conexion.php"); 

//alerta tabla
$tabla="";
//consulta inner join para mostrar datos de equipo
$query="SELECT equipo.no_serie, equipo.nombre_equipo, equipo.descripcion, equipo.condiciones, ubicacion.id_ubicacion, ubicacion.edificio, ubicacion.nombre_salon, ubicacion.area FROM equipo INNER JOIN ubicacion ON equipo.ubicacion=ubicacion.id_ubicacion";

//manda a llamar formulario equipo
if(isset($_POST['equipo']))
{
    $q=$conn->real_escape_string($_POST['equipo']);
    $query="SELECT equipo.no_serie, equipo.nombre_equipo, equipo.descripcion, equipo.condiciones, ubicacion.id_ubicacion, ubicacion.edificio, ubicacion.nombre_salon, ubicacion.area FROM equipo INNER JOIN ubicacion ON equipo.ubicacion=ubicacion.id_ubicacion WHERE
    no_serie LIKE '%".$q."%' OR
    nombre_equipo LIKE '%".$q."%' OR
    descripcion LIKE '%".$q."%' OR 
    condiciones LIKE '%".$q."%' OR
    edificio LIKE '%".$q."%' OR
    nombre_salon LIKE '%".$q."%' OR
    area LIKE '%".$q."%'
     "; //consulta
}

$busquedaEquipo=$conn->query($query);
if($busquedaEquipo->num_rows>0)
{
    $tabla.=
    '<thead>
                      //campos de la tabla
    <th>No. Serie</th>
    <th>Nombre</th>
    <th>Descripcion</th>
    <th>Condiciones</th>
    <th>Edificio</th>
    <th>Nombre Salon</th>
    <th>Area</th>
    <th>Acciones</th>

    </thead>
    ';

    while($row= $busquedaEquipo->fetch_assoc())
{
    $tabla.=
    '
    <tbody>

    <tr>
//datos a mostrar a la bd
    <td>'.$row['no_serie'].'</td>
    <td>'.$row['nombre_equipo'].'</td>
    <td>'.$row['descripcion'].'</td>
    <td>'.$row['condiciones'].'</td>
    <td>'.$row['edificio'].'</td>
    <td>'.$row['nombre_salon'].'</td>
    <td>'.$row['area'].'</td>

    //botones de actualizar y eliminar
    <td>
    <a class="btn-acciones" href="actualizar_equipo.php?id_equipo='.$row['no_serie'].' && id_ubicacion='.$row['id_ubicacion'].'"><i class="fa-solid fa-pen-to-square edit-logo"></i></a>
    <a  class="btn-acciones" href="delete.php?id_equipo_delete='.$row['no_serie'].' && id_ubicacion='.$row['id_ubicacion'].'"><i class="fa-solid fa-ban"></i></a>
    </td>
        
                      
    </tr>
    ';
}
$tabla.= '</tbody>';

}else
{
    $tabla='<h1 align="center">No se encontraron coincidencias con sus criterios de busqueda</h1>';
}

echo $tabla;
?>
