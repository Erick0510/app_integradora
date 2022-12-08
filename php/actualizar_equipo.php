<?php
//Conexion a la base de datos
include("conexion.php");

//Condición que llama al id_equipo
if(isset($_REQUEST['id_equipo'])) {

  //variable 
  $id_equipo = $_REQUEST['id_equipo'];

  //consulta a la base de datos
  $query = "SELECT * FROM equipo WHERE no_serie= '$id_equipo'";
  //variable consulta
  $result = mysqli_query($conn, $query);

  //condicion para realizar la consulta
  if (mysqli_num_rows($result) >0) {
    $row = mysqli_fetch_array($result);
    $no_serie = $row['no_serie'];
    $nombre = $row['nombre_equipo'];
    $descripcion = $row['descripcion'];
    $condiciones = $row['condiciones'];
}

}
//Condición que llama al id_ubicacion 
if(isset($_REQUEST['id_ubicacion'])){
   //variable 
    $id_ubicacion = $_REQUEST['id_ubicacion'];
    
     //consulta a la base de datos
    $queryUbicacion = "SELECT * FROM ubicacion WHERE id_ubicacion='$id_ubicacion'";
    $resultUbicacion = mysqli_query($conn, $queryUbicacion);

//condicion para realizar la consulta
    if (mysqli_num_rows($resultUbicacion) == 1) {
        $rowCantidad = mysqli_fetch_array($resultUbicacion);     
        $edificio = $rowCantidad['edificio'];
        $nombre_salon = $rowCantidad['nombre_salon'];
        $area = $rowCantidad['area'];
     
  }

}
  ?>
  

<?php 
//manda a llamar los estilos del header
include("componentes/header.php") ?>
<nav>
    <!-- menu responsive header-->
    <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fa-solid fa-bars menu"></i>
        </label>

        <!-- Imagen del Logo -->
        <img class="img-logo-catalogo" src="../img/utd_logo.png" alt="">
              
        <!-- Secciones del menu del sistema -->
        <ul>
        <li><a href="solicitudes.php" id="solicitud">Solicitudes</a></li>
        <li><a href="administrar_equipo.php" id="equipo">Equipo<script>window.onload = function() {
        document.getElementById("equipo").style.color= '#EF9001';
        document.getElementById("administrar_equipo").style.background= 'rgb(191, 120, 14)';
        document.getElementById("administrar_equipo").style.color= '#fff';
        }</script></a></li>
        <li><a href="administrar_usuarios.php" id="usuarios">Usuarios</a></li>
        </ul>

        <div><a href="login.php"><i class="fa-solid fa-arrow-right-from-bracket" title="Cerrar sesión"></i></a></div>
</nav>


<div class="contenedor-principal">
  <div class="contenido">
    <!-- botones de administrar o agregar un equipo -->
    <ul class="list-new">
      <li class="li-contenido"><a href="administrar_equipo.php" id="administrar_equipo">ADMINISTRAR</a></li>
      <li class="li-contenido"><a href="equipo.php">NUEVO</a></li>
    </ul>
    
<!--Formulario para actualizar un equipo -->
    <div class="contenedorp">
      <div class="contactop">
      <form  method="POST" class="formulariop" action="update.php?id_equipo=<?php echo $id_equipo ?> && id_ubicacion=<?php echo $id_ubicacion ?>">
      
      <p>
      <label>No. Serie</label> 
      <input name="id" type="text" value="<?php echo $id_equipo; ?>" required autofocus class="bloque">
      </p> 

      <p>
      <label>Nombre</label> 
      <input name="nombre" type="text" value="<?php echo $nombre; ?>" required autofocus class="bloque">
      </p> 
      <p>
      <label>descripcion</label>
      <input name="descripcion" value="<?php echo $descripcion;?>" required class="bloque">
      </p>

      <p>
          <label>Condiciones</label>
          <select name="condiciones">
            <option value="Buenas">Buenas</option>
            <option value="Regulares">Regulares</option>
            <option value="Malas">Malas</option>
          </select>
          </p>

          <p>
          <label>Edificio</label>
          <select name="edificio">
            <option value="A">Edificio A</option>
            <option value="B" selected>Edificio B</option>
            <option value="C">Edificio C</option>
            <option value="D">Edificio D</option>
            <option value="E">Ediciico E</option>
          </select>
          </p>
      <p>
      <label>nombre salon</label>  
      <input name="nombre_salon" type="text" value="<?php echo $nombre_salon; ?>" required class="bloque">
      </p>

      <p>
        <label>Area (Aula, laboratorio, etc)</label>
        <select name="area">
          <option value="Aula">Aula</option>
          <option value="Laboratorio">Laboratorio</option>
          <option value="Sala de conferencias">Sala de Conferencias</option>
          <option value="Cubículo"> Cubículo</option>
        </select>
      </p>
      

      <!-- boton para enviar formulario -->
      <p class="full">
      <input type="submit" name="equipo-update" class="boton-enviar" value="ENVIAR">
      </p>
      
      </form>
      </div>
    </div>
  </div>
</div>