<?php
   session_start();

   if (isset($_SESSION))
   {
       session_destroy();
   }

   $alertas = "";

   if ($_SERVER["REQUEST_METHOD"]=="POST")
   {
    $rfc=$_POST['rfc'];
    $pass=$_POST['password'];

    include_once('conexion.php');

    $query="SELECT * from usuario WHERE rfc='$rfc' AND password=hex(AES_ENCRYPT('$pass', 'passForEncrypt'))";

    $result = $conn->query($query);

      if ($result->num_rows>0)
      {
        if ($row=$result->fetch_assoc())
          {
              $usuario=$row['nombre'];
              $rol=$row['rol'];

              session_start();
              $_SESSION['rfc']=$rfc;
              $_SESSION['password']=$password;
              $_SESSION['nombre']=$usuario;
              $_SESSION['rol']=$rol;
    
            if($rol=="admin"){
                $alertas="admin";
            } 
            elseif($rol=="estandar"){
                $alertas="estandar";
            }
          }
      }
      else
      {
        $alertas="error_login";
      }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/nuevo_login.css">
    <link href="https://blogfonts.com/css/aWQ9MTUyMjkzJnN1Yj0yOTMmYz1nJnR0Zj1HYWxhbm8rR3JvdGVzcXVlK0FsdCtCbGFjaytJdGFsaWMub3RmJm49Z2FsYW5vZ3JvdGVzcXVlYWx0LWJsYWNraXRhbGlj/GalanoGrotesqueAlt-BlackItalic.otf" rel="stylesheet" type="text/css"/>
    <title>Iniciar Sesion</title>
</head>
<body>
   <div class="container-newLogin">
    <div class="main-newLogin">

      <div class="img-newLogin">
          <img src="../img/UTD_blanco.png" alt="Universidad Tecnologica de durango" loading="lazy">
          <h2>¡Bienvenido al sistema! <br>
          Administre Documentos, Horarios e Inventario
          </h2>
      </div>

      <div class="formulario-newLogin">
        <h1>Sistema de Gestión Integral UTD</h1>

        <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

          <!-- Campo de contraseña e iconos para visualizar contraseña -->
          <div class="input-container">
            <input type="text" placeholder="Ingrese su Usuario" name="rfc">
          </div>

          <!-- Campo de contraseña e iconos para visualizar contraseña -->
          <div class="input-container">
            <input type="password" placeholder="Contraseña" name="password" id="password-field">
            <div class="password-toggle">
            <i class="fa-regular fa-eye"></i>
            <i class="fa-regular fa-eye-slash"></i>
            </div>
          </div>

          <!-- Botón de recuérdame -->
          <input type="checkbox" name="remember-me" id="checkbox-login" checked>
          <label for="remember-me">Recuérdame</label>
          <br>

          <!-- Enlace para la recuperación de contraseñas -->
          <a href="recuperar_contraseña.php?mode=enter_email">¿Olvidó su contraseña?</a>
          <br>
          <input type="submit" value="ENTRAR" class="btn-login">
        </form>
      </div>
    </div>
   </div>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/e7ff5a9d5d.js" crossorigin="anonymous"></script>

<!-- Librería de jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<!-- Validación de contraseñas JS -->
<script src="../js/password.js"></script>


</body>
</html>
<?php include('alertas.php'); ?>
