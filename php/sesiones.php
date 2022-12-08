<?php
   session_start();

   if (!isset($_SESSION['rfc']))
   {
    header("location:login.php");
   }
   else{

    $rfc=$_SESSION['rfc'];
    $password=$_SESSION['password'];
    $usuario=$_SESSION['nombre'];
    $rol=$_SESSION['rol'];
   
}
?>