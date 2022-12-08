<?php
include("sesiones.php");
include('conexion.php');
$alertas="";

// Insercion en la tabla de SOLICITUD por parte del usuario
if(isset($_REQUEST['no_serie'])){
  $no_serie=$_REQUEST['no_serie'];

  //consulta 
  $query="INSERT INTO solicitud VALUES(null, now(), '$no_serie', '$rfc')";
  $result = mysqli_query($conn, $query);


//alerta
   if($result){
    $alertas="solicitud_enviada";
   }else{
    $alertas="error_cantidad";
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