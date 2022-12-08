<?php 
// Conexion a la base ve datos y sesiones
include("sesiones.php");
include("conexion.php"); 
if(isset($_REQUEST['id_solicitud_rechazada'])){
  $id_solicitud = $_REQUEST['id_solicitud_rechazada'];
  $nombre_equipo = $_REQUEST['nombre_equipo'];
  $no_serie= $_REQUEST['no_serie'];
  $condiciones = $_REQUEST['condiciones'];
  $rfc = $_REQUEST['rfc'];
  $nombre = $_REQUEST['nombre'];
}
 
?>
<?php include("componentes/header.php") ?>
<nav>
             
<!-- Menu responsive -->
    <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fa-solid fa-bars menu"></i>
        </label>
        <!-- Imagen del logo -->
        <img class="img-logo-catalogo" src="../img/utd_logo.png" alt="">
                
        <!-- Secciones del menu -->
        <ul>
        <li><a href="solicitudes.php" id="solicitud">Solicitudes<script>window.onload = function() {
        document.getElementById("solicitud").style.color= '#EF9001';
        document.getElementById("solicitudes").style.background= 'rgb(191, 120, 14)';
        document.getElementById("solicitudes").style.color= '#fff';
        }</script></a></li>
        <li><a href="administrar_equipo.php" id="equipo">Equipo</a></li>
        <li><a href="administrar_usuarios.php" id="usuarios">Usuarios</a></li>
        </ul>
<!-- Boton cerrar sesion -->
        <div><a href="login.php"><i class="fa-solid fa-arrow-right-from-bracket" title="Cerrar sesión"></i></a></div>
</nav>
<div class="contenedor-principal">
<div class="contenido">

<!-- Botones para administrar e historial -->
<ul class="list-new">
  <li class="li-contenido"><a href="solicitudes.php" id="solicitudes">ADMINISTRAR</a></li>
  <li class="li-contenido"><a href="historial.php" id="historial">HISTORIAL</a></li>
</ul>

<div class="contenedorp">
  <div class="contactop">
  <h2>COMENTARIOS</h2>

  <!-- Formulario -->
<form action="insert.php" method="POST" class="formulariop">
         <input type="hidden" value="<?php echo $id_solicitud ?>" name="id_solicitud">
         <input type="hidden" value="<?php echo $nombre_equipo ?>" name="nombre_equipo">
         <input type="hidden" value="<?php echo $no_serie ?>" name="no_serie">
         <input type="hidden" value="<?php echo $condiciones ?>" name="condiciones">
         <input type="hidden" value="<?php echo $rfc ?>" name="rfc">
         <input type="hidden" value="<?php echo $nombre ?>" name="nombre">


         <!-- Comentarios -->
         <p>
         <textarea name="comentario" placeholder="Escribe un comentario..." ></textarea>
         </p>
         
        
         <!-- Boton enviar -->
          <p>
          <button class="btn-comentario"type="submit" name="comentario_rechazado">ENVIAR</button>
          </p>
          


        </form>
  </div>
</div>
</div>



</div>
</div>

<?php include("componentes/footer.php") ?>