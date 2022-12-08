<?php
include("sesiones.php");
include('conexion.php');
$alertas="";

// Insercion en la tabla de SOLICITUD por parte del usuario
if(isset($_REQUEST['id_equipo'])){
  $condiciones = $_REQUEST['condiciones'];
  $equipo = $_REQUEST['equipo'];
  $rfc =$_REQUEST['rfc'];
  $id_solicitud =$_REQUEST['id'];

  $query="INSERT INTO solicitud_aceptada VALUES(now(), '$equipo', 1, '$condiciones', '$rfc', null)";
  $result = mysqli_query($conn, $query);
  if($result) {
    try{
      $querySolicitud="DELETE FROM solicitud WHERE id='$id_solicitud'";
      $resultSolicitud = mysqli_query($conn, $querySolicitud);
      if($resultSolicitud){
          $alertas="solicitud_aceptada";
      }else{
          $alertas="error_solicitud";
      }
  }catch(e){
      $alertas="error_solicitud";
  }
  }
}

// Insercion en la tabla usuarios
if (isset($_POST['usuario'])) {
  $rfc = $_POST['rfc'];
  $nombre = $_POST['nombre'];
  $apellidos = $_POST['apellidos'];
  $correo = $_POST['correo'];
  $telefono = $_POST['telefono'];
  $rol = $_POST['rol'];
  $pass = $_POST['password'];

  $query = "INSERT INTO usuario(rfc, nombre, apellidos, correo, telefono, rol, password) VALUES ('$rfc', '$nombre', '$apellidos', '$correo', '$telefono', '$rol', hex(AES_ENCRYPT('$pass', 'passForEncrypt')))";
  $result = mysqli_query($conn, $query);
  if($result) {
    $alertas="usuario_insertado";
  }else{
    $alertas="usuario_insertado_error";
  }
    

}

// Insercion en equipo
if (isset($_POST['equipo'])) {
  //campos equipo
  $id = $_POST['id'];
  $nombre = $_POST['nombre'];
  $descripcion = $_POST['descripcion'];
  $condiciones = $_POST['condiciones'];
  $fk_ubicacion = $_POST['ubicacion'];

  //campos ubicacion
  $edificio = $_POST['edificio'];
  $nom_salon = $_POST['nombre_salon'];
  $area = $_POST['area'];

  $query = "INSERT INTO ubicacion Values (NULL, '$edificio', '$nom_salon', '$area')";
  $result=mysqli_query($conn,$query);

  $idubicacion = mysqli_insert_id($conn);

  $query = "INSERT INTO equipo VALUES ('$id','$nombre', '$descripcion', '$condiciones', '$idubicacion', 1)";
  $result=mysqli_query($conn,$query);
  if($result){
    $alertas="equipo_insertado";
  }else{
    $alertas="equipo_insertado_error";
  }

}
if(isset($_REQUEST['id_solicitud_aceptada'])){
  $id_solicitud = $_REQUEST['id_solicitud_aceptada'];
  $nombre_equipo = $_REQUEST['nombre_equipo'];
  $no_serie= $_REQUEST['no_serie'];
  $condiciones = $_REQUEST['condiciones'];
  $rfc = $_REQUEST['rfc'];
  $nombre = $_REQUEST['nombre'];
  
  $query = "delete from solicitud where id_solicitud = '$id_solicitud'";
  $result=mysqli_query($conn, $query);
  if($result){
    $query = "INSERT INTO solicitud_respuesta values (null, '$no_serie', '$rfc', '$nombre_equipo', '$condiciones', 'Aceptada', 'OK', now() + interval + 1 month, now() )";
    $result_insert = mysqli_query($conn, $query);

    $query_copia="INSERT INTO solicitud_respuesta_copia values (null, '$no_serie', '$nombre_equipo', '$condiciones', now(), 'No entregada', null, '$nombre', '$rfc')";
    $result_copia = mysqli_query($conn, $query_copia);

    if($result_insert)
    {
      $query="UPDATE equipo set cantidad= cantidad - 1 where no_serie='$no_serie'";
      $result_update = mysqli_query($conn, $query);
    }
    if($result_update)
    {
      $alertas="solicitud_aceptada";
    } 
  }

}

if(isset($_POST['comentario_rechazado'])){
  $id_solicitud = $_POST['id_solicitud'];
  $nombre_equipo = $_POST['nombre_equipo'];
  $no_serie= $_POST['no_serie'];
  $condiciones = $_POST['condiciones'];
  $rfc = $_POST['rfc'];
  $nombre=$_POST['nombre'];
  $comentario=$_POST['comentario'];
  $query = "delete from solicitud where id_solicitud = '$id_solicitud'";
  $result=mysqli_query($conn, $query);

  if($result){
    $query = "INSERT INTO solicitud_respuesta values (null, '$no_serie', '$rfc', '$nombre_equipo', '$condiciones', 'Rechazada', '$comentario', '/', null )";
    $result_insert = mysqli_query($conn, $query);

    $query_copia="INSERT INTO solicitud_respuesta_copia values (null, '$no_serie', '$nombre_equipo', '$condiciones', now(), 'Rechazada', null, '$nombre', '$rfc')";
    $result_copia = mysqli_query($conn, $query_copia);

    if($result_insert)
    {
      $alertas="solicitud_rechazada";
    } 
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php include('alertas.php') ?>
