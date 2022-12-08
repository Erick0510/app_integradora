<?php
//conexion a base de datos y sesiones 
include("sesiones.php");
include("conexion.php"); 

//variable alerta
$tabla="";

//consulta mostrar usuarios
$query="SELECT * FROM usuario";

//mandar a llamar el formulario usuario
if(isset($_POST['usuario']))
{
    $q=$conn->real_escape_string($_POST['usuario']);
    $query="SELECT * FROM usuario WHERE 
    rfc LIKE '%".$q."%' OR
    nombre LIKE '%".$q."%' OR
    apellidos LIKE '%".$q."%' OR 
    correo LIKE '%".$q."%' OR
    telefono LIKE '%".$q."%' OR
    rol LIKE '%".$q."%' OR
    password LIKE '%".$q."%'
     "; //consulta
}

$busquedaUsuario=$conn->query($query);
if($busquedaUsuario->num_rows>0)
{
    $tabla.= //campos de la tabla
    '<thead>

    <th>RFC</th>
    <th>Nombre</th>
    <th>Apellidos</th>
    <th>Correo</th>
    <th>Telefono</th>
    <th>Rol</th>
    <th>Contraseña</th>
    <th>Acciones</th>

    </thead>
    ';

    while($row= $busquedaUsuario->fetch_assoc())
{
    $tabla.=
    '
    <tbody>

          // datos de la tabla
    <tr>

    <td>'.$row['rfc'].'</td>
    <td>'.$row['nombre'].'</td>
    <td>'.$row['apellidos'].'</td>
    <td>'.$row['correo'].'</td>
    <td>'.$row['telefono'].'</td>
    <td>'.$row['rol'].'</td>
    <td>'.$row['password'].'</td>


    //botones de actualizar y borrar usuario
    <td>
    <a class="btn-acciones" href="actualizar_usuario.php?id_usuario='.$row['rfc'].' && password='.$row['password'].'"><i class="fa-solid fa-pen-to-square edit-logo"></i></a>
    <a  class="btn-acciones" href="delete.php?id_usuario='.$row['rfc'].'"><i class="fa-solid fa-ban"></i></a>
    </td>
        
                      
    </tr>
    ';
}

//alerta
$tabla.= '</tbody>';

}else
{
    $tabla='<h1 align="center">No se encontraron coincidencias con sus criterios de busqueda</h1>';
}

echo $tabla;
?>