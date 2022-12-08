<?php
//conexion a la bd
include("conexion.php");

//manda a llamar los estilos del header
if(isset($_GET['id_usuario'])) {
  $id = $_GET['id_usuario'];
  $pass = $_GET['password'];
  $query = "SELECT * FROM usuario WHERE rfc= '$id' AND password='$pass'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);

    $nombre = $row['nombre'];
    $apellidos = $row['apellidos'];
    $correo = $row['correo'];
    $telefono = $row['telefono'];
    $rol = $row['rol'];
    $password = $row['password'];
    
    

  }
}
  ?>
  

<?php include("componentes/header.php") //manda a llamar los estilos del header
?>
<nav>
             <!-- menu responsive    -->
   
    <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fa-solid fa-bars menu"></i>
        </label>
                <!-- Imagen del Logo -->

        <img class="img-logo-catalogo" src="../img/utd_logo.png" alt="">
                
                <!-- Secciones del menu del sistema -->
        <ul>
        <li><a href="solicitudes.php" id="solicitud">Solicitudes</a></li>
        <li><a href="administrar_equipo.php" id="equipo">Equipo</a></li>
        <li><a href="administrar_usuarios.php" id="usuarios">Usuarios<script>window.onload = function() {
        document.getElementById("usuarios").style.color= '#EF9001';
        document.getElementById("administrar_usuarios").style.background= 'rgb(191, 120, 14)';
        document.getElementById("administrar_usuarios").style.color= '#fff';
        }</script></a></li>
        </ul>

        <!-- boton para cerrar sesion -->
        <div><a href="login.php"><i class="fa-solid fa-arrow-right-from-bracket" title="Cerrar sesión"></i></a></div>
</nav>
<div class="contenedor-principal">
  <div class="contenido">
    
      <!-- botones de administrar o agregar un equipo -->
  <ul class="list-new">
      <li class="li-contenido"><a href="administrar_usuarios.php" id="administrar_usuarios">ADMINISTRAR</a></li>
      <li class="li-contenido"><a href="usuarios.php">NUEVO</a></li>
    </ul>

    <div class="contenedorp">
      <div class="contactop">
        
      <!-- Aquí va el formulario para actualizar el usuario -->
      <form action="update.php" method="POST" class="formulariop">
        <input type="hidden" name="rfc" value="<?php echo $id ?>">
      <p>
      <label>Nombre</label> 
      <input name="nombre" type="text" value="<?php echo $nombre; ?>" required autofocus class="bloque">
      </p> 
      <p>
      <label>Apelldos</label>
      <input name="apellidos" value="<?php echo $apellidos;?>" required class="bloque">
      </p>
      <p>
      <label>Correo</label>
      <input name="correo" type="text" value="<?php echo $correo; ?>" required class="bloque">
      </p>
       <p>
       <label>Telefono</label> 
      <input name="telefono" type="text" value="<?php echo $telefono; ?>" required class="bloque">
       </p>
       <p>

       <!-- Roles -->
    <select name="rol">
                        <option value="admin">Admin</option>
                        <option value="estandar">Estandar</option>
    </select>
    </p>
      <p>
      <label>Constraseña</label>  
      <input name="password" type="text" value="<?php echo $password; ?>" required class="bloque">
      </p>
      
      <p class="full">
      <input type="submit" name="usuario-update" class="boton-enviar" value="ENVIAR">
      </p>
      
      </form>
      </div>
    </div>
  </div>
</div>
    

