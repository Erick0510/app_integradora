<?php
//conexion a las sesiones y bd
include("sesiones.php");
include("conexion.php");

//variable alertas
$alertas="";
//Condición que llama al id_usuario
if(isset($_REQUEST['id_usuario'])) {
  $rfc = $_REQUEST['id_usuario'];

  //consulta para eliminar
  $query = "DELETE from usuario WHERE rfc = '$rfc'";
  $result = mysqli_query($conn, $query);

  //condicion del resultado de la consulta
  if($result) {

    //alerta
    $alertas="usuario_eliminado";
  }else{

  echo "<script>alert(Usuario Eliminado)</script>";
  header('location:usuarios.php');
}

  }
  
//Condición que llama al id_solicitud
if(isset($_REQUEST['id_solicitud'])) {
  $id_solicitud = $_REQUEST['id_solicitud'];
  $id_equipo = $_REQUEST['id_equipo'];
    //consulta para eliminar solicitud
  $query = "DELETE from solicitud WHERE id = '$id_solicitud'";
  $result = mysqli_query($conn, $query);
  if($result) {
    try{
      //consulta para actualizar la cantidad del equipo
      $queryCantidad="UPDATE equipo SET cantidad= cantidad + 1 WHERE id='$id_equipo'";
      $resultCantidad = mysqli_query($conn, $queryCantidad);
      if($resultCantidad){
        //alerta de rechazo con exito
          $alertas="solicitud_rechazada";
      }else{
        // alerta de error 
          $alertas="solicitud_rechazada_error";
      }
  }catch(e){
    // alerta de error 
      $alertas="solicitud_rechazada_error";
  }
}
}
//Condición que llama al id para eliminar un material
if(isset($_REQUEST['id_equipo_delete'])){
  $id_equipo = $_REQUEST['id_equipo_delete'];
  $id_ubicacion = $_REQUEST['id_ubicacion'];
//consulta para eliminar equipo
  $query="DELETE FROM equipo WHERE no_serie='$id_equipo'";
  $result=mysqli_query($conn, $query);
//condicion si la consulta es correcta
      if($result){
        //alerta se elimino con exito
        $alertas="equipo_eliminado";
      }else{
        //alerta de error
        $alertas="equipo_eliminado_error";
      }
  }
//Condición que llama al id de solicitud rechazada
  if(isset($_REQUEST['id_solicitud_rechazada']))
  {
  $id= $_REQUEST['id_solicitud_rechazada'];
//consulta
  $query="DELETE FROM solicitud_respuesta WHERE id='$id'";
  $result=mysqli_query($conn, $query);
//condicion si la consulta es correcta
if($result)
  {
//alerta de que se borro con exito
    $alertas="solicitud_rechazada_borrada";
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

<?php 
//mandar llamar archivo alertas
include('alertas.php') 
?>
