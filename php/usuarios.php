<?php 
//conexion a la base de datos y sesiones
include("sesiones.php");
include("conexion.php"); 
?>
<?php include("componentes/header.php") ?>
<!-- Estilos -->

<!-- Custom styles for this template-->

<link rel="stylesheet" href="../css/header.css">
<link rel="stylesheet" href="../css/contenedor.css">    
<link rel="stylesheet" href="../css/tablas.css"> 
<link rel="stylesheet" href="../css/formularios.css">
<link rel="stylesheet" href="../css/botones.css">
<link rel="stylesheet" href="../css/sb-admin-2.css">
<link rel="stylesheet" href="../css/errores.css">
<!-- <link rel="stylesheet" href="../css/modal.css"> -->
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

<!-- Boton para administrar y nuevo -->
<ul class="list-new">
    <li class="li-contenido"><a href="administrar_usuarios.php">ADMINISTRAR</a></li>
    <li class="li-contenido"><a href="usuarios.php" id="nuevo_usuario">NUEVO</a></li>
</ul>

     
     <h2>NUEVO USUARIO</h2>

    
        <form action="insert.php" method="POST" class="formulariop" id="form_err">

<p>
<label>RFC</label>
 <input type="text" name="rfc"required autofocus class="bloque">
</p>
<p>
<label>Nombre</label>
<input type="text" name="nombre" required class="bloque">
</p> 
<p>
<label>Apellidos</label>
<input type="text" name="apellidos"required autofocus class="bloque">
</p>
<p>
<label>Correo</label>
<input type="text" name="correo" required class="bloque">
</p> 

<p>
<label>Telefono</label>
<input type="text" name="telefono" required autofocus class="bloque">
</p>

<p>
<select name="rol">
                    <option value="admin">Admin</option>
                    <option value="estandar">Estandar</option>
</select>
</p>
<p>
<label>Contraseña</label>
<input type="password" name="password" required autofocus class="bloque" id="pass1" pattern="(?=.*[a-z])(?=.*[0-9])(?=.*[A-Z])(?=.*[!#@$%&?¿¡*_.+-^/])[a-z-A-Z-0-9!#@$%&?¿¡*_.+-^/]{8,}" oninput="return validacion()">
</p>

<div class="errores">
    <ul id="numero">Debe contener al menos un número</ul>
    <ul id="caracter">Debe contener al menos un caracter especial</ul>
    <ul id="minuscula">Debe contener al menos una letra minuscula</ul>
    <ul id="mayuscula">Debe contener al menos una letra mayuscula</ul>
    <ul id="digitos">Debe contener al menos 8 digitos</ul>
    
    

    <script src="../js/errores.js"></script>

</div>




<!-- Boton enviar -->
<p class="full">
<input type="submit" name="usuario" class="boton-enviar" value="ENVIAR" >
</p>
<!-- Boton borrar -->
<p class="full">
<input type="reset" class="boton-enviar" value="BORRAR">
</p>
</form>

    </div>
    </div>
    </div>
</div>

     <!-- Formulario -->
     





<?php include("componentes/footer.php") ?>

