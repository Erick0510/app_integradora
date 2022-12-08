<?php

include_once("conexion.php");
include("sesiones.php");


///////////// VARIABLES DE CONSULTA ///////////////
$where="";
$xno_serie="";
$xnombre="";
$xcondiciones="";
$limit="";

///////////////// CAPTURANDO EL EVENTO DE LA BUSQUEDA //////////////////////
if(isset($_POST['buscar']))
{
////////// CAPTURAR LAS LOS VALORES DEL FORMUALRIO EN VARIABLES ///////
$xno_serie=$_POST['no-serie'];
$xnombre=$_POST['nombre'];
$xcondiciones=$_POST['condiciones'];
$limit=$_POST['registros'];
 
////////////////////// CONDICIONALES DE BUSQUEDA //////////////////////////
    if(empty($_POST['nombre']))
    {
        $where="where no_serie like '".$xno_serie."%' and condiciones ='$xcondiciones'";

        if(empty($_POST['condiciones']))
        {
            $where="where no_serie like '".$xno_serie."%'";
        }
    }

    else if(empty($_POST['no-serie']))
    {
        $where="where nombre_equipo like '".$xnombre."%' and condiciones ='$xcondiciones'";
        
        if(empty($_POST['condiciones']))
        {
            $where="where nombre_equipo like '".$xnombre."%'";
        }
        else if(empty($_POST['nombre']))
        {
            $where="where condiciones ='$xcondiciones'";
        }
    }

    else if(empty($_POST['condiciones']))
    {
        $where="where nombre_equipo like '".$xnombre."%' and no_serie like '".$xno_serie."%'";

    }

    else
    {
        $where="where nombre_equipo like '".$xnombre."%' and no_serie like '".$xno_serie."%' and condiciones ='$xcondiciones'";
    }
}

//////////////////// CONSULTA //////////////////////
$query="SELECT * FROM equipo $where $limit";
$result=$conn->query($query);
   
?>

<?php include('componentes/header.php') ?>
<nav>
            <!-- Menu responsive     -->
     <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
    <i class="fa-solid fa-bars menu"></i>
    </label>
    <!-- Imagen del Logo -->
    <img class="img-logo-catalogo" src="../img/utd_logo.png" alt="">
        
    <!-- Secciones del menu del sistema -->       
         <ul>
         <li><a href="inicio.php" id="inicio">Inicio</a></li>
         <li><a href="catalogo.php" id="catalogo">Catalogo<script>window.onload = function() {
             document.getElementById("catalogo").style.color= '#EF9001';
            }</script></a></li>
        <li><a href="solicitudes_usuarios.php" id="usuarios">Notificaciones</a></li>
        </ul>
            <!-- boton para cerrar sesion -->
        <div><a href="login.php"><i class="fa-solid fa-arrow-right-from-bracket" title="Cerrar sesión"></i></a></div>
</nav>

    
<div class="contenedor-principal">
    <div class="contenido">

    <h2>SOLICITAR EQUIPO</h2>

    <!-- Formulario equipo -->
        <form class="busqueda" method="POST">
            <input type="text" placeholder="No. Serie..." name="no-serie">

            <input type="text" placeholder="Nombre..." name="nombre">

            <select name="condiciones">
                
                <option value="buenas">Buenas</option>
                <option value="malas">Malas</option>
                <option value="regulares">Regulares</option>
                <option value="" selected>Condiciones</option>

            </select>

            <select name="registros">
                
                <option value="limit 3">3</option>
                <option value="limit 5">5</option>
                <option value="limit 10">10</option>
                <option value="" selected>No. Registros</option>

            </select>
            <button name="buscar" type="submit">BUSCAR</button>
        </form>

    <table class="width200">
    
        <thead>
    <!-- Campos de la tabla -->
            <th>No. SERIE</th>
            <th>NOMBRE</th>
            <th>DESCRIPCION</th>
            <th>CONDICIONES</th>
    
            
            <th>ACCIONES</th>
           
        
        </thead>
        <?php
        
                if (mysqli_num_rows($result)>0){
                
                while($row=mysqli_fetch_assoc($result))
                {
    
                ?>
        <tbody>

        <!-- datos que muestra de la bd -->
        <tr>
        <?php if($row['cantidad']>0){ ?>
        <td> <?php echo $row['no_serie'] ?></td>
        <td> <?php echo $row['nombre_equipo'] ?></td>
        <td> <?php echo $row['descripcion'] ?></td>
	    <td> <?php echo $row['condiciones'] ?></td>
        <?php } ?>

        <?php if($row['cantidad']>0){ ?>
            <td>
            <a class="btn-acciones" href="solicitar.php?no_serie=<?php echo $row['no_serie'] ?>">Pedir</a>
            </td>
        <?php } ?>

            
                          
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

