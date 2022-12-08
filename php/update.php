<?php
//conexion a la base de datos y sesiones
include("sesiones.php");
include("conexion.php");
$alertas="";

//mandar a llamar la el formulario usuario-update
if (isset($_POST['usuario-update'])) {
  //variables
  $rfc = $_POST['rfc'];  
  $nombre = $_POST['nombre'];
  $apellidos = $_POST['apellidos'];
  $correo = $_POST['correo'];
  $telefono = $_POST['telefono'];
  $rol = $_POST['rol'];
  $pass = $_POST['password'];
//consulta
  $query = "UPDATE usuario set nombre = '$nombre', apellidos = '$apellidos', rol ='$rol', correo = '$correo', telefono = '$telefono', password=hex(AES_ENCRYPT('$pass', 'passForEncrypt'))  WHERE rfc= '$rfc'";
  $result = mysqli_query($conn, $query);
  //alerta
  if($result){
    $alertas="usuario_actualizado";
  }else{
    $alertas="usuario_no_actualizado";
  }
}
//mandar a llamar la el formulario equipo-update

if(isset($_POST['equipo-update'])){
  //variables
  $id_equipo = $_REQUEST['id_equipo'];
  $id_ubicacion = $_REQUEST['id_ubicacion'];
  $id = $_POST['id'];
  $nombre = $_POST['nombre'];
  $descripcion = $_POST['descripcion'];
  $condiciones = $_POST['condiciones'];
  $edificio = $_POST['edificio'];
  $nombre_salon = $_POST['nombre_salon'];
  $area = $_POST['area'];

//consulta
  $query= "UPDATE ubicacion SET edificio='$edificio', nombre_salon='$nombre_salon', area='$area' WHERE id_ubicacion='$id_ubicacion'";
  $result= mysqli_query($conn,$query);

  if($result){
      $query="UPDATE equipo SET nombre_equipo='$nombre', descripcion='$descripcion', condiciones='$condiciones', no_serie='$id' WHERE no_serie='$id_equipo'";
      $result= mysqli_query($conn,$query);

      //alerta
      if($result){
        $alertas="equipo_actualizado";
      }else{
        $alertas="equipo_actualizado_error";
      }
      
  }


}
//mandar a llamar la el formulario solicitud copia

if(isset($_REQUEST['id_solicitud_copia']))
{
  //variable
  $id = $_REQUEST['id_solicitud_copia'];
  $no_serie = $_REQUEST['no_serie'];
  $rfc = $_REQUEST['rfc'];
  
//consulta
  $query = "UPDATE solicitud_respuesta_copia SET status= 'Entregado' WHERE id='$id'";
  $result= mysqli_query($conn,$query);

  if($result)
  {
    //consulta
    $query = "UPDATE equipo SET cantidad= cantidad + 1 WHERE no_serie='$no_serie'";
    $result= mysqli_query($conn,$query);
//alerta
    $alertas="Entregado";
  }

}
//mandar a llamar la el formulario entregar solicitud
if(isset($_REQUEST['entregar_solcitud']))
{
  //variables
  $no_serie= $_REQUEST['entregar_solcitud'];
  $rfc = $_REQUEST['rfc'];
  $id = $_REQUEST['id'];
  $fecha = $_REQUEST['fecha'];
//consulta eliminar
  $query = "DELETE FROM solicitud_respuesta WHERE id= '$id'";
  $result= mysqli_query($conn,$query);

  if($result)
  {
    //consulta actualizar
  $query2 = "UPDATE solicitud_respuesta_copia SET status='Pendiente' WHERE id='$id'";
  $result2= mysqli_query($conn,$query2);
//alerta
  $alertas="Devuelto";
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


