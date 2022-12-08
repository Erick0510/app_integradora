<!-- Conexion a la base de datos y sesiones -->
<?php include("sesiones.php") ?>
<?php include('componentes/header.php') ?>


                
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
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="inicio.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <!-- Aqui va el logo -->
        </div>
        <div class="sidebar-brand-text mx-3">
            <img src="../img/utd_logo.png" alt="" style="height: 10vw;">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="inicio.php">
            <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
            <span>Inicio</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="catalogo.php">
            <!-- <i class="fas fa-fw fa-cog"></i> -->
            <span>Catalogo</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="solicitudes_usuarios.php">
            <!-- <i class="fas fa-fw fa-wrench"></i> -->
            <span>Notificaciones</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

     <!-- Boton para cerrar sesión -->
     <div><a href="login.php"><i class="fa-solid fa-arrow-right-from-bracket"  title="Cerrar sesión"></i></a></div>
</ul>
<!-- End of Sidebar -->

<div class="contenedor-principal">
    <div class="contenido">

    <div class="contenedor-bienvenida">
        <!-- INICIO -->
    <H1 class="titulo-bienvnida">¡BIENVENIDO "<?php echo $usuario ?>"!</H1>
    <h2>SISTEMA GESTOR DE INVENTARIO</h2>
    <h2>Pide lo que necesites, Genera e Imprime reportes de TUS solicitudes</h2>

    <!-- Boton solicitar -->
        <div class="contenedor-boton">
            <div class="contenedor-botones">
                <button class="boton tres"><a href="catalogo.php">¡SOLICITAR YA!</a></button>
            
            </div>
        </div>
    

    </div>
    
    </div>
</div>
                  


  


<?php include("componentes/footer.php") ?>