<?php
session_start();
$error = array();
require "mail.php";
include('conexion.php');

    $mode = "enter-email";
    if(isset($_GET['mode']))
    {
        $mode = $_GET['mode'];
    }
    //Algo fue enviado por POST
    if(count($_POST) > 0)
    {
        switch($mode)
        {
            case 'enter_email':
                $email = $_POST['email'];
                //Validar email
                if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    $error[]="Porfavor ingrese un email valido";
                }elseif(!valid_email($email))
                {
                    $error[]="El email no fue encontrado"; 
                }
                else
                {
                    $_SESSION['email'] = $email;
                    send_email($email);
                    header("Location: recuperar_contraseña.php?mode=enter_code");
                    die;
                }
            break;

            case 'enter_code':
                $code = $_POST['code'];
                $result = is_code_correct($code);
                if($result == "El codigo es correcto")
                {
                    header("Location: recuperar_contraseña.php?mode=enter_password");
                    die;
                }
                else
                {
                    $error[] = $result;
                }
            break;

            case 'enter_password':
                $password = $_POST['password'];
                $password2 = $_POST['password2'];
                if($password !== $password2)
                {
                    $error[] = "Las contraseñas no coinciden";
                }else
                {
                save_password($password);
                header("Location: login.php");
                die;
                }               
            break;

            default:
            break;
        }
    }

    //Declarando funciones para validar los correos
    function send_email($email){
        global $conn;
        $expire = time() + (60 * 2);
        $code = rand(10000, 99999);
        $email = addslashes($email);

        $query = "insert into codigos(email, code, expire) values('$email', '$code', '$expire')";
        mysqli_query($conn, $query);
        
        if(send_mail($email, "Codigo de verificacion", "Su codigo es: " . $code)){
            echo "exito";
        }     
}

    function valid_email($email){
        global $conn;
        $email = addslashes($email);

        $query = "select * from usuario where correo = '$email' limit 1";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {    
                return True; 
            }
        }
        return false;
    }

    function save_password($password){
        global $conn;
        $email = addslashes($_SESSION['email']);

        $query = "update usuario set password=hex(AES_ENCRYPT('$password', 'passForEncrypt')) where correo = '$email' limit 1";
        mysqli_query($conn, $query);
    }

    function is_code_correct($code){
        global $conn;
        $code = addslashes($code);
        $expire = time();
        $email = addslashes($_SESSION['email']);

        $query = "select * from codigos where code = '$code' && email = '$email' order by id desc limit 1";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
                $row = mysqli_fetch_assoc($result);
                if($row['expire'] > $expire){
                    return "El codigo es correcto";
                }else{
                    return "Su codigo ha expirado, intente de nuevo";
                }
            }
        }
        return "El codigo es incorrecto";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="../css/contraseñas.css">
</head>
<body>
<div class="container">
    <div class="main">
        <?php
            switch($mode)
            {
                case 'enter_email':
        ?>
        <div class="texto">
        <h2>¿Olvidó su constraseña?</h2>
        <h1>Ingrese su correo debajo</h1>
        </div>
        <div class="formulario-password">
        <form action="recuperar_contraseña.php?mode=enter_email" method="POST">
        <span style="font-size: 12px; color:red;">
            <?php
            foreach($error as $err){
                echo $err . "<br>";
            }
            ?>
        </span>
        
        <div class="input-container">
        <input type="text" placeholder="Email" name="email">
        </div>
        <input type="submit" value="SIGUIENTE" class="btn-recoverpass">
        <br>
        <a href="login.php">Iniciar Sesion</a>
        </form>
        <?php
                break;

                case 'enter_code':
        ?>
        <div class="texto">
        <h2>Le hemos enviado un correo con un codigo de verificación</h2>
        <h1>Ingrese el codigo enviado a su correo</h1>
        </div>
        <form action="recuperar_contraseña.php?mode=enter_code" method="POST">
            <span style="font-size: 12px; color:red;">
            <?php
            foreach($error as $err){
                echo $err . "<br>";
            }
            ?>
            </span>  
        <div class="input-container">
        <input type="text" placeholder="12345" name="code">
        </div> 
        <input type="submit" value="SIGUIENTE" class="btn-recoverpass">
        <a href="recuperar_contraseña.php?mode=enter_email">
        <input type="button" value="REENVIAR" class="btn-recoverpass">
        </a>
        
        <br>
        <a href="login.php">Iniciar Sesion</a>
        </form>
        <?php
                break;

                case 'enter_password':
        ?>
        <div class="texto">
        <h2>¿Olvidó su constraseña?</h2>
        <h1>Ingrese su nueva contraseña</h1>
        </div>
        <form action="recuperar_contraseña.php?mode=enter_password" method="POST">
        <span style="font-size: 12px; color:red;">
            <?php
            foreach($error as $err){
                echo $err . "<br>";
            }
            ?>
        </span>
        <!-- Campo de contraseña e iconos para visualizar contraseña -->
        <div class="input-container">
            <input type="password" placeholder="Contraseña" name="password" id="password-field">
            <div class="password-toggle">
            <i class="fa-regular fa-eye"></i>
            <i class="fa-regular fa-eye-slash"></i>
            </div>

            <div id="password-strength"></div>

            <!-- Requisitos para la contraseña -->
            <div class="password-policies">
              <div class="policy-uppercase">
                Contiene mayúsculas
              </div>
              <div class="policy-number">
                Contiene numeros
              </div>
              <div class="policy-special">
                Contiene carácteres especiales
              </div>
              <div class="policy-length">
                8 carácteres
              </div>
            </div>
        </div>
        <div class="input-container">
        <input type="password" placeholder="Confirmar Contraseña" name="password2"> 
        </div>
        
        <br>
        <input type="submit" value="ENVIAR" class="btn-recoverpass">
        <a href="recuperar_contraseña.php?mode=enter_email">
        <input type="button" value="REGRESAR" class="btn-recoverpass">
        </a>
        <br>
        <a href="login.php">Iniciar Sesion</a>
        </form>
        </div>
        
        <?php
                break;

                default:
                break;
            }
        ?>
    </div>
</div>
    
<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/e7ff5a9d5d.js" crossorigin="anonymous"></script>

<!-- Librería de jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<!-- Validación de contraseñas JS -->
<script src="../js/password.js"></script>

<!-- Validación de contraseñas JS -->
<script src="../js/password-validation.js"></script>
    
</body>
</html>