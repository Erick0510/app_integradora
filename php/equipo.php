<?php 
//conexion a las sesiones y bd
include("sesiones.php");
include("conexion.php"); 
?>
<?php 
//manda a llamar los estilos del header
include("componentes/header.php") 
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

<!-- botones de administrar o agregar un equipo -->
<ul class="list-new">
  <li class="li-contenido"><a href="administrar_equipo.php">ADMINISTRAR</a></li>
  <li class="li-contenido"><a href="equipo.php" id="nuevo_equipo">NUEVO</a></li>
</ul>


<!--Formulario para agregar un equipo -->
<div class="contenedorp">
  <div class="contactop">
  <h2>NUEVO EQUIPO</h2>
<form action="insert.php" method="POST" class="formulariop">
         
          <input type="hidden" name="id" >
          <input type="hidden" name="ubicacion">
      
          <p>
          <label>No. Serie</label>
          <input type="text" name="id" required autocomplete="off" autofocus>
          </p>
            

          <p>
          <label>Nombre</label>
          <input type="text" name="nombre" required autocomplete="off" autofocus>
          </p>
            
          
          <p>
          <label>Descripcion</label>
          <input type="text" name="descripcion" required autocomplete="off">
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
          <label>Nombre Del Salon</label>
          <input type="text" name="nombre_salon" required autocomplete="off">
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
            
        
          <p class="full">
          <input type="submit" name="equipo"  value="ENVIAR" class="boton-enviar">
          </p>
          <p class="full">
          <input type="reset" value="BORRAR" class="boton-enviar">
          </p> 
        </form>
  </div>
</div>
</div>



</div>
</div>

<!-- Footer -->
<?php include("componentes/footer.php") ?>