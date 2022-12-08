<?php include("sesiones.php") ?>
<?php include("componentes/header.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/perfil/perfil.css">
    <title>Document</title>
</head>
<body>
 
                    
 <div class="contenedorp">
      <div class="contactop">
      <!-- <img src="../img/perfil.png" alt="" class="foto"> -->
        <h3 align="center">Actualizar información</h3>

        <!-- Formulario del perfil -->
        <form class="formulariop">
          <p>
            <label>Nombre</label>
            <input type="text" name="nombre" required class="bloque">
          </p>
          <p>
            <label>RFC</label>
            <input type="text" name="RFC" class="bloque">
          </p>
          <p>
            <label>Contraseña</label>
            <input type="text" name="Contraseña" class="bloque">
          </p>
          <p>
            <label>Teléfono</label>
            <input type="text" name="teléfono" required class="bloque">
          </p>
        
          <!-- Boton para enviar -->
          <p class="full">
            <button class="boton-enviar">Actualizar</button>
          </p>
        </form>
      </div>
    </div>
  </div>
</body>
<script src="https://kit.fontawesome.com/e7ff5a9d5d.js" crossorigin="anonymous"></script>
</html>