//Inicializando las funnciones para los buscadores
$(obtener_registros());
$(obtener_registros_usuario());
$(obtener_registros_historial());

//Buscador para equipo
function obtener_registros(equipo)
{
    $.ajax({
        url: 'busqueda.php',
        type: 'POST',
        datatype: 'html',
        data: { equipo: equipo }
    })

    .done(function(resultado){
        $("#tabla_resultado").html(resultado);
    })
}

$(document).on('keyup', '#busqueda', function()
{
    let valorBusqueda=$(this).val();
    if(valorBusqueda!="")
    {
        obtener_registros(valorBusqueda);
    }
    else
    {
        obtener_registros();
    }
});

//Buscador para usuarios
function obtener_registros_usuario(usuario)
{
    $.ajax({
        url: 'busqueda_usuario.php',
        type: 'POST',
        datatype: 'html',
        data: { usuario: usuario }
    })

    .done(function(resultado){
        $("#tabla_resultado_usuario").html(resultado);
    })
}

$(document).on('keyup', '#busqueda_usuario', function()
{
    let valorBusqueda=$(this).val();
    if(valorBusqueda!="")
    {
        obtener_registros_usuario(valorBusqueda);
    }
    else
    {
        obtener_registros_usuario();
    }
});

//Buscador para el historial
function obtener_registros_historial(solicitud)
{
    $.ajax({
        url: 'busqueda_historial.php',
        type: 'POST',
        datatype: 'html',
        data: { solicitud: solicitud }
    })

    .done(function(resultado){
        $("#tabla_resultado_historial").html(resultado);
    })
}

$(document).on('keyup', '#busqueda_historial', function()
{
    let valorBusqueda=$(this).val();
    if(valorBusqueda!="")
    {
        obtener_registros_historial(valorBusqueda);
    }
    else
    {
        obtener_registros_historial();
    }
});