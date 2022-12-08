<!-- conectar sesiones -->
<?php include("sesiones.php") ?>

<!-- Insertar header, estilos, js -->
<?php include("componentes/header.php") ?>
<nav>

    <!-- Menu responsive -->
    <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fa-solid fa-bars menu"></i>
        </label>
        <!-- imagen del logo -->
        <img class="img-logo-catalogo" src="../img/utd_logo.png" alt="">
                
        <!--categorias header y script -->
        <li><a href="inicio.php" id="inicio">Inicio</a></li>
        <li><a href="catalogo.php" id="catalogo">Catalogo</a></li>
        <li><a href="solicitudes_usuarios.php" id="usuarios">Notificaciones<script>window.onload = function() {
        document.getElementById("usuarios").style.color= '#EF9001';
        // document.getElementById("inicio").style.text-shadow= '2px 4px 3px rgba(0,0,0,0.3)';
        }</script></a></li>
        </ul>

        <!-- boton cerrar sesion -->
        <div><a href="login.php"><i class="fa-solid fa-arrow-right-from-bracket" title="Cerrar sesión"></i></a></div>
</nav>

<div class="contenedor-principal">
<div class="contenido">
<table class="width200">
    
    <h2>TUS SOLICITUDES</h2>
        <thead>
    <!-- campos de la tabla -->
            <th>No. SERIE</th>
            <th>EQUIPO</th>
            <th>CONDICIONES</th>
            <th>STATUS</th>
            <th>COMENTARIOS</th>
            <th>FECHA ENTREGA</th>
            <th>ACCIONES</th>
        
        </thead>
        <?php
        //conexion a la bd
        include_once("conexion.php");
        //consulta SELECT a la db
        $query="SELECT id, no_serie, usuario, nombre, condiciones, status, comentarios, DATE_FORMAT(fecha_limite, '%d-%m-%y %h:%m:%s') as fecha_limite, DATE_FORMAT(fecha, '%d-%m-%y %h:%m:%s') as fecha FROM solicitud_respuesta WHERE usuario='$rfc'";
        
        //variable consulta
        $result=mysqli_query($conn, $query);

        //condicion a realizar segun la consulta
            if (mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result))
                       {
                    
                    ?>
        <tbody>

        <!-- datos que se muestra en la tabla -->
        <tr>
        <td> <?php echo $row['no_serie'] ?></td>
        <td> <?php echo $row['nombre'] ?></td>
        <td> <?php echo $row['condiciones'] ?></td>
        <td> <?php echo $row['status'] ?></td>
        <td> <?php echo $row['comentarios'] ?></td>
        <td> <?php echo $row['fecha_limite'] ?></td>
        <td>
        <?php 
        //condicion para el status aceptado de la solicitud
        if($row['status']=="Aceptada"){
             ?>
             
             <!-- Boton imprimir -->
        <a href="imprimir_solicitud.php?id_solicitud=<?php echo $row['id']?>" target="_blank"><i class="fa-solid fa-print solicitud"></i></a>
        <!-- <a href=""><i class="fa-solid fa-file-pdf solicitud"></i></a> -->
        <?php } ?>
        
        <?php if($row['status']=="Rechazada"){  //condicion para el status rechazada de la solicitud?>
            
            <!-- Boton para borrar -->
        <a href="delete.php?id_solicitud_rechazada=<?php echo $row['id'] ?>"><i class="fa-solid fa-trash-can"></i></a>
        <?php } ?>
        
        <?php if($row['status']=="Aceptada"){ //condicion para el status aceptado de la solicitud ?>

            <!-- boton para actualizar -->
        <a href="update.php?entregar_solcitud=<?php echo $row['no_serie'] ?> && id=<?php echo $row['id'] ?> && rfc=<?php echo $row['usuario'] ?> && fecha=<?php echo $row['fecha'] ?>"><i class="fa-solid fa-envelope-circle-check entrega"></i></a>
        <?php } ?>
        </td>

                          
                          </tr> 
                       <?php
                      }
                    }

              ?>
        </tbody>
    </table>
    
</div>
</div>



<?php include("componentes/footer.php") ?>



  
