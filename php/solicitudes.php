<?php 
// Conexion a la base de datos y sesiones
include("sesiones.php");
include("conexion.php"); 
?>
<!-- Estilos -->

<!-- Custom styles for this template-->

<link rel="stylesheet" href="../css/header.css">
<link rel="stylesheet" href="../css/contenedor.css">    
<link rel="stylesheet" href="../css/tablas.css"> 
<link rel="stylesheet" href="../css/formularios.css">
<link rel="stylesheet" href="../css/botones.css">
<link rel="stylesheet" href="../css/sb-admin-2.css">
<link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">


    <!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
 
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="solicitudes.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <!-- Aqui va el logo -->
        </div>
        <div class="sidebar-brand-text mx-3">
            <img src="../img/utd_logo.png" alt="" style="height: 10vw;">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <!-- <i class="fas fa-fw fa-folder"></i> -->
                    <span>Solicitudes</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Acciones</h6>
                        <a class="collapse-item" href="solicitudes.php">Administrar</a>
                        <a class="collapse-item" href="historial.php">Historial</a>
                    </div>
                </div>
            </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="administrar_equipo.php" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <!-- <i class="fas fa-fw fa-cog"></i> -->
            <span>Equipo</span>
        </a>

        
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Acciones</h6>
                <a class="collapse-item" href="equipo.php">Nuevo</a>
                <a class="collapse-item" href="administrar_equipo.php">Administrar</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="administrar_usuarios.php" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <!-- <i class="fas fa-fw fa-wrench"></i> -->
            <span>Usuarios</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Acciones</h6>
                <a class="collapse-item" href="usuarios.php">Nuevo</a>
                <a class="collapse-item" href="administrar_usuarios.php">Administrar</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

     <!-- Boton para cerrar sesión -->
     <div><a href="login.php"><i class="fa-solid fa-arrow-right-from-bracket"  title="Cerrar sesión"></i></a></div>
</ul>
<!-- End of Sidebar -->
<div class="contenedor-principal">
<div class="contenido">

<!-- Botones para administrar e historial -->
<ul class="list-new">
  <li class="li-contenido"><a href="solicitudes.php" id="solicitudes">ADMINISTRAR</a></li>
  <li class="li-contenido"><a href="historial.php" id="historial">HISTORIAL</a></li>
</ul>
<table class="width200">
  <h2>ADMINISTRAR SOLICITUDES</h2>

     <!-- Campos de la tabla -->
        <thead>
    
            <th>FECHA</th>
            <th>No. SERIE</th>
            <th>EQUIPO</th>
            <th>USUARIO</th>
            <th>ACCIONES</th>
            
        
        </thead>
        <?php
        include_once("conexion.php"); //conexion a la bd
        
        //consulta
        $query="SELECT solicitud.id_solicitud, DATE_FORMAT(solicitud.fecha, '%d-%m-%y %h:%m:%s') as fecha, equipo.no_serie, equipo.nombre_equipo, equipo.condiciones,  usuario.rfc, usuario.nombre FROM solicitud INNER JOIN equipo on solicitud.equipo=equipo.no_serie RIGHT JOIN usuario ON solicitud.usuario=usuario.rfc WHERE rol='estandar'";
           
        $result=mysqli_query($conn, $query);
                if (mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result))
                       {
                        ?>
        <tbody>

        <!-- datos de la bd -->
        <tr>
        <?php if($row['no_serie']!=''){ ?>
        <td> <?php echo $row['fecha'] ?></td>
        <td> <?php echo $row['no_serie'] ?></td>
        <td> <?php echo $row['nombre_equipo'] ?></td>
        <td> <?php echo $row['nombre'] ?></td>
        <?php } ?>
        

        <?php if($row['no_serie']!=''){ ?>

            <!-- Botones de aceptar y rechazar -->
            <td>
            <a class="btn-acciones" href="insert.php?id_solicitud_aceptada=<?php echo $row['id_solicitud'] ?> && nombre_equipo=<?php echo $row['nombre_equipo'] ?> && no_serie=<?php echo $row['no_serie'] ?> && condiciones=<?php echo $row['condiciones'] ?> && rfc=<?php echo $row['rfc'] ?> && nombre=<?php echo $row['nombre'] ?>">Aceptar</a>

            <a class="btn-acciones" href="solicitud_rechazada.php?id_solicitud_rechazada=<?php echo $row['id_solicitud'] ?> && nombre_equipo=<?php echo $row['nombre_equipo'] ?> && no_serie=<?php echo $row['no_serie'] ?> && condiciones=<?php echo $row['condiciones'] ?> && rfc=<?php echo $row['rfc'] ?> && nombre=<?php echo $row['nombre'] ?>">Rechazar</a>
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