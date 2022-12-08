<!-- Libreria de Sweet Alerts JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.22/dist/sweetalert2.all.min.js" ></script>

<?php if ($alertas=="admin") { ?>
<script>
  //alerta bienvenida admin
  function mensaje(){
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: '¡ B I E N V E N I D O !', 
      text: 'al sistema ... <?php echo $_SESSION['nombre']  ?> ',
      showConfirmButton: false,
      timer:2000
     }).then(function(){
         location.href='solicitudes.php';
     });
	}
  mensaje();
</script>
<?php } elseif ($alertas=="estandar") { ?>
<script>
  //alerta bienvenida estandar
  function mensaje(){
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: '¡ B I E N V E N I D O !', 
      text: 'al sistema ... <?php echo $_SESSION['nombre']  ?> ',
      showConfirmButton: false,
      timer:2000
     }).then(function(){
         location.href='inicio.php';
     });
	}
  mensaje();
</script>

<!-- alerta error al iniciar sesion -->
<?php } elseif ($alertas=="error_login") {  ?>
<script>
  function mensaje(){
    Swal.fire({
      position: 'center',
      icon: 'warning',
      title: 'Usuario y contraseña incorrectas ', 
      text: 'por favor verifica ... ',
      showConfirmButton: false,
      timer:2000
     }).then(function(){
         location.href='login.php';
     });
	}
  mensaje();
</script>
<?php  } ?>


<!-- Alertas para las solicitudes -->
<?php if ($alertas=="solicitud_enviada") { ?>
<script>
  function mensaje(){
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'SOLICITUD ENVIADA', 
      text: 'Su solicitud ha sido enviada, espere por la repsuesta',
      showConfirmButton: true
     }).then(function(){
         location.href='catalogo.php';
     });
	}
  mensaje();
</script>
<?php } elseif ($alertas=="error_cantidad") { ?>
<script>
  function mensaje(){
    Swal.fire({
      position: 'center',
      icon: 'warning',
      title: 'SE HA ACABADO EL STOCK', 
      text: 'No hay equipo disponible por el momento',
      showConfirmButton: false,
      timer:2000
     });.then(function(){
         location.href='catalogo.php';
     });
	}
  mensaje();
</script>
<?php  } ?>

<!-- alerta solicitud aceptada -->
<?php if ($alertas=="solicitud_aceptada") { ?>
<script>
  function mensaje(){
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'SOLICITUD ACEPTADA', 
      text: 'Se han aceptado nuevas solicitudes',
      showConfirmButton: true
     }).then(function(){
         location.href='solicitudes.php';
     });
	}
  mensaje();
</script>

<!-- Alerta error de solicitud -->
<?php } elseif ($alertas=="error_solicitud") { ?>
<script>
  function mensaje(){
    Swal.fire({
      position: 'center',
      icon: 'warning',
      title: 'SOLICITUD NO ACEPTADA', 
      text: 'Ha ocurrido algun error, por favor verifique',
      showConfirmButton: false,
      timer:2000
     });.then(function(){
         location.href='solicitudes.php';
     });
	}
  mensaje();
</script>
<?php  } ?>

<!-- Alerta solicitud rechazada -->
<?php if ($alertas=="solicitud_rechazada") { ?>
<script>
  function mensaje(){
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'SOLICITUD RECHAZADA', 
      text: 'Se ha rechazado la solicitud',
      showConfirmButton: true
     }).then(function(){
         location.href='solicitudes.php';
     });
	}
  mensaje();
</script>

<!-- alerta de solicitud rechazada con error -->
<?php } elseif ($alertas=="solicitud_rechazada_error") { ?>
<script>
  function mensaje(){
    Swal.fire({
      position: 'center',
      icon: 'warning',
      title: 'SOLICITUD NO RECHAZADA', 
      text: 'Ha ocurrido algun error, por favor verifique',
      showConfirmButton: false,
      timer:2000
     }).then(function(){
         location.href='solicitudes.php';
     });
	}
  mensaje();
</script>
<?php  } ?>

<!-- Alerta solicitud eliminada con exito -->
<?php if ($alertas=="solicitud_eliminada") { ?>
<script>
  function mensaje(){
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'REGISTRO ELIMINADO', 
      showConfirmButton: false,
      timer:2000
     }).then(function(){
         location.href='inicio.php';
     });
	}
  mensaje();
</script>

<!-- Alerta de error para solicitud eliminada  -->
<?php } elseif ($alertas=="solicitud_eliminada_error") { ?>
<script>
  function mensaje(){
    Swal.fire({
      position: 'center',
      icon: 'warning',
      title: 'ERROR', 
      text: 'No se ha podido concretar la operacion',
      showConfirmButton: false,
      timer:2000
     }).then(function(){
         location.href='inicio.php';
     });
	}
  mensaje();
</script>
<?php  } ?>

<!-- Alerta solicitud copia eliminada -->
<?php if ($alertas=="solicitud_copia_eliminada") { ?>
<script>
  function mensaje(){
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'REGISTRO ELIMINADO', 
      showConfirmButton: false,
      timer:2000
     }).then(function(){
         location.href='bitacora_solicitudes.php';
     });
	}
  mensaje();
</script>

<!-- Alerta de error solicitud eliminada -->
<?php } elseif ($alertas=="solicitud_copia_eliminada_error") { ?>
<script>
  function mensaje(){
    Swal.fire({
      position: 'center',
      icon: 'warning',
      title: 'ERROR', 
      text: 'No se ha podido concretar la operacion',
      showConfirmButton: false,
      timer:2000
     }).then(function(){
         location.href='bitacora_solicitudes.php';
     });
	}
  mensaje();
</script>
<?php  } ?>

<!-- Alerta de devolucion de material -->
<?php if ($alertas=="Devuelto") { ?>
<script>
  function mensaje(){
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'EQUIPO DEVUELTO', 
      text: 'Espere a que verifiquen',
      showConfirmButton: true
     }).then(function(){
         location.href='solicitudes_usuarios.php';
     });
	}
  mensaje();
</script>
<?php  } ?>

<!-- Alerta de material de material entregado -->
<?php if ($alertas=="Entregado") { ?>
<script>
  function mensaje(){
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'EQUIPO ENTREGADO', 
      text: 'El equipo se ha entregado',
      showConfirmButton: true
     }).then(function(){
         location.href='historial.php';
     });
	}
  mensaje();
</script>
<?php  } ?>

<!-- Alerta de solicitud borrada con exito -->
<?php if ($alertas=="solicitud_rechazada_borrada") { ?>
<script>
  function mensaje(){
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'NOTIFICACION BORRADA', 
      text: 'Se ha borrado la notificacion',
      showConfirmButton: true
     }).then(function(){
         location.href='solicitudes_usuarios.php';
     });
	}
  mensaje();
</script>
<?php  } ?>

<!-- Alerta EQUIPO eliminado-->
<?php if ($alertas=="equipo_eliminado") { ?>
<script>
  function mensaje(){
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'EQUIPO ELIMINADO', 
      showConfirmButton: false,
      timer:2000
     }).then(function(){
         location.href='administrar_equipo.php';
     });
	}
  mensaje();
</script>

<!-- Alerta de error para equipo eliminado -->
<?php } elseif ($alertas=="equipo_eliminado_error") { ?>
<script>
  function mensaje(){
    Swal.fire({
      position: 'center',
      icon: 'warning',
      title: 'ERROR', 
      text: 'No se ha podido concretar la operacion',
      showConfirmButton: false,
      timer:2000
     }).then(function(){
         location.href='administrar_equipo.php';
     });
	}
  mensaje();
</script>
<?php  } ?>



<!-- Alertas para la insercion -->
<?php if ($alertas=="usuario_insertado") { ?>
<script>
  function mensaje(){
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'USUARIO REGISTRADO', 
      text: 'El usuario ha sido registrado',
      showConfirmButton: false,
      timer:2000
     }).then(function(){
         location.href='usuarios.php';
     });
	}
  mensaje();
</script>
<?php } elseif ($alertas=="usuario_insertado_error") { ?>
<script>
  function mensaje(){
    Swal.fire({
      position: 'center',
      icon: 'warning',
      title: 'OCURRIO ALGUN ERROR', 
      text: 'por favor espera ... ',
      showConfirmButton: false,
      timer:2000
     });.then(function(){
         location.href='usuarios.php';
     });
	}
  mensaje();
</script>
<?php  } ?>

<!-- Alerta USUARIO insertado con exito-->
<?php if ($alertas=="equipo_insertado") { ?>
<script>
  function mensaje(){
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'EQUIPO REGISTRADO', 
      text: 'El equipo ha sido registrado',
      showConfirmButton: false,
      timer:2000
     }).then(function(){
         location.href='equipo.php';
     });
	}
  mensaje();
</script>

<!-- Alerta de error para equipo insertado -->
<?php } elseif ($alertas=="equipo_insertado_error") { ?>
<script>
  function mensaje(){
    Swal.fire({
      position: 'center',
      icon: 'warning',
      title: 'OCURRIO ALGUN ERROR', 
      text: 'por favor espera ... ',
      showConfirmButton: false,
      timer:2000
     });.then(function(){
         location.href='equipo.php';
     });
	}
  mensaje();
</script>
<?php  } ?>


<!-- Alertas para la eliminacion -->
<?php if ($alertas=="usuario_eliminado") { ?>
<script>
  function mensaje(){
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'USUARIO ELIMINADO', 
      text: 'El usuario ha sido eliminado',
      showConfirmButton: false,
      timer:2000
     }).then(function(){
         location.href='administrar_usuarios.php';
     });
	}
  mensaje();
</script>
<?php } elseif ($alertas=="usuario_insertado_error") { ?>
<script>
  function mensaje(){
    Swal.fire({
      position: 'center',
      icon: 'warning',
      title: 'OCURRIO ALGUN ERROR', 
      text: 'por favor espera ... ',
      showConfirmButton: false,
      timer:2000
     });.then(function(){
         location.href='administrar_usuarios.php';
     });
	}
  mensaje();
</script>
<?php  } ?>

<!-- Alertas para la actualizacion -->
<?php if ($alertas=="usuario_actualizado") { ?>
<script>
  function mensaje(){
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'USUARIO ACTUALIZADO', 
      text: 'El usuario ha sido actualizado',
      showConfirmButton: false,
      timer:2000
     }).then(function(){
         location.href='administrar_usuarios.php';
     });
	}
  mensaje();
</script>
<?php } elseif ($alertas=="usuario_no_actualizado") { ?>
<script>
  function mensaje(){
    Swal.fire({
      position: 'center',
      icon: 'warning',
      title: 'OCURRIO ALGUN ERROR', 
      text: 'por favor espera ... ',
      showConfirmButton: false,
      timer:2000
     });.then(function(){
         location.href='administrar_usuarios.php';
     });
	}
  mensaje();
</script>
<?php  } ?>

<!-- Alerta para EQUIPO Actualizado -->
<?php if ($alertas=="equipo_actualizado") { ?>
<script>
  function mensaje(){
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'EQUIPO ACTUALIZADO', 
      text: 'El equipo ha sido actualizado',
      showConfirmButton: false,
      timer:2000
     }).then(function(){
         location.href='administrar_equipo.php';
     });
	}
  mensaje();
</script>

<!-- Alerta de error para actualizar -->
<?php } elseif ($alertas=="equipo_actualizado_error") { ?>
<script>
  function mensaje(){
    Swal.fire({
      position: 'center',
      icon: 'warning',
      title: 'OCURRIO ALGUN ERROR', 
      text: 'por favor espera ... ',
      showConfirmButton: false,
      timer:2000
     });.then(function(){
         location.href='administrar_equipo.php';
     });
	}
  mensaje();
</script>
<?php  } ?>



