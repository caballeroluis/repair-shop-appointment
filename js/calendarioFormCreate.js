$(document).ready(function(){
  $('#select-mano').change();
  $('#select-categoria_pieza').change();
  $('#enviar-solicitud').attr('disabled', true);
  $('#recogida').hide(); // este servicio pretende no tener que almacenar bicicletas asquí que deshabilito esta opción temporalmente
  
});

var duracionGlobal = 9000;

function alerta(texto, duracion) { //funcion para hacer los alerts bonitos
  $('.alert-danger').html(texto + '<a class="close" title="close">x</a>');
  $('.alert-danger').slideDown('fast');
  $('.alert-danger').click(function(){
    $(this).slideUp(100);
  });
  setTimeout(function() {
    $('.alert-danger').slideUp('slow');
  }, duracion);
}

function alerta3(texto) { //funcion para hacer los alerts bonitos
  $('#alerta-info2').html(texto + '<a class="close" title="close">x</a>');
  $('#alerta-info2').slideDown('fast');
  $('#alerta-info2').click(function(){
    $(this).slideUp(100);
  });
}

$('#select-handicap').change(function(){
  var ruta = $('#select-handicap > option').eq(
    $('#select-handicap').prop('selectedIndex')
  ).attr('data-imagen');
  if (ruta == undefined || ruta == null) {
    $('#img-handicap').attr('src', '');
  } else {
    $('#img-handicap').attr('src', ruta);
  }
  calculo();
});

$('#select-mano').change(function(){
  var sI = $('#select-mano').val();
  $.ajax({
      data: {'sI': sI},
      dataType: 'JSON',
      url: 'calendarioForm/refrescarHandicap',
      type: 'POST',
      submit: function(){
        $('#select-handicap').change();
      },
      success: function (obj) {
        //actualizo dropdown handicap
        $('#select-handicap').html('');
        $.each(obj, function(i, tupla){
          $('#select-handicap').html(
            $('#select-handicap').html() +
            '<option value="'+(i + 1)+'" data-id="'+tupla.id+'" data-minutos_duracion="'+tupla.minutos_duracion+'" data-imagen="'
            +tupla.imagen+'" data-mano_id="'+tupla.mano_id+'" data-informacion="'+tupla.informacion+'" data-recargo="'+tupla.recargo+'">'
            +tupla.nombre+' '+tupla.recargo+'€</option>'
          );
        });
        //actualizo imagen mano
        var ruta = $('#select-mano > option').eq(
          $('#select-mano').prop('selectedIndex')
        ).attr('data-imagen');
        $('#img-mano').attr('src', ruta);
        ruta = '';
        $('#select-handicap').change();
        calculo();
      },
      error: function (e) {
        alert('error en la petición');
        $('#select-handicap').change();
      }
  });
  
});

$('#select-categoria_pieza').change(function(){
  var sI = $('#select-categoria_pieza').val();
  $.ajax({
      data: {'sI': sI},
      dataType: 'JSON',
      url: 'calendarioForm/refrescarPieza',
      type: 'POST',
      success: function (obj) {
        //actualizo dropdown pieza
        $('#select-pieza').html('');
        $.each(obj, function(i, tupla){
          $('#select-pieza').html(
            $('#select-pieza').html() +
            '<option value="'+(i + 1)+'" data-id="'+tupla.id+'" data-minutos_instalacion="'+tupla.minutos_instalacion+'" data-imagen="'
            +tupla.imagen+'" data-informacion="'+tupla.informacion+'" data-precio_instalado="'+tupla.precio_instalado+'">'
            +tupla.nombre+' '+tupla.marca+' '+tupla.precio_instalado+'€</option>'
          );
        });
        //actualizo imagen pieza
        var ruta = $('#select-pieza > option').eq(
          $('#select-pieza').prop('selectedIndex')
        ).attr('data-imagen');
        $('#img-pieza').attr('src', ruta);
        ruta = '';
        $('#select-pieza').change();
        calculo();
      },
      error: function (e) {
        alert('error en la petición');
      }
  });
});

$('#select-pieza').change(function(){
  var ruta = $('#select-pieza > option').eq(
    $('#select-pieza').prop('selectedIndex')
  ).attr('data-imagen');
  if (ruta == undefined || ruta == null) {
    $('#img-pieza').attr('src', '');
  } else {
    $('#img-pieza').attr('src', ruta);
  }
  calculo();
});


function contarPiezasAniadidas(num){//pide id y dice cuántas veces lo encuentra
  var contador = 0;
  $.each($('#select-aniadir > option[data-id='+num+']'), function(i, opt){
    contador++;
  });
  return contador;
}

$('#aniadir').click(function(){// función que agrega items a la lista de añadidos
  var piezaElegida = $('#select-pieza > option').eq(
    $('#select-pieza').prop('selectedIndex')
  ).attr('data-id');
  
  if (contarPiezasAniadidas(piezaElegida) > 0) {//si hay más de una no te deja meter más, te dice que uses las cantidades
    alerta3('No puede volver a añadir esta pieza. Utilice el campo \"Cantidad\" para agregar más de una pieza del mismo tipo');
  } else {
    $('#select-aniadir').append(
    $('#select-pieza > option').eq(
      $('#select-pieza').prop('selectedIndex')
    ).clone().attr('data-cantidad', $('#cantidad').val()).html(//añado...
      
      //lo que ya tenía
      $('#select-pieza > option').eq(
        $('#select-pieza').prop('selectedIndex')
      ).clone().attr('data-cantidad', $('#cantidad').val()).html()
      
      //más la cantidad
      + ' Cant: ' + $('#cantidad').val()
    )
    );
  }
  calculo();
  
});

$('#limpiar').click(function(){
  $('#select-aniadir').html('');
  $('#cantidad').val(1);
  calculo();
});



function calculo(){//Calcula precio y tiempo reparación y actualiza los campos correspondientes en la vista
  precioTotal = 0;
  duracionTotal = 0;
//  duracionTotalFormateada = '';  //queda pendiente dar formato hora a la duración de la reparación
  $('#precio-total').val('')
  $('#duracion-total').val('')
  
  
  //precio
  precioTotal += parseInt($('#select-mano > option').eq(
    $('#select-mano').prop('selectedIndex')
  ).attr('data-coste'));
  
  if ($('#select-handicap').html() != '') {// por si una mano no tiene handicaps
    precioTotal += parseInt($('#select-handicap > option').eq(
      $('#select-handicap').prop('selectedIndex')
    ).attr('data-recargo'));
  }
  
  $.each($('#select-aniadir > option'), function(i, opt){
    precioTotal += (
      parseInt($('#select-aniadir > option').eq(i).attr('data-precio_instalado'))
      * parseInt($('#select-aniadir > option').eq(i).attr('data-cantidad'))
    )
  });
  
  $('#precio-total').val(precioTotal + ' €').attr('data-precio_total', precioTotal);
  
  
  //duración
  duracionTotal += parseInt($('#select-mano > option').eq(
    $('#select-mano').prop('selectedIndex')
  ).attr('data-minutos_duracion'));
  
  if ($('#select-handicap').html() != '') { // por si una mano no tiene handicaps
    duracionTotal += parseInt($('#select-handicap > option').eq(
      $('#select-handicap').prop('selectedIndex')
    ).attr('data-minutos_duracion'));
  }
  
  $.each($('#select-aniadir > option'), function(i, opt){
    duracionTotal += (
      parseInt($('#select-aniadir > option').eq(i).attr('data-minutos_instalacion'))
      * parseInt($('#select-aniadir > option').eq(i).attr('data-cantidad'))
    )
  });
  
  $('#duracion-total').val(duracionTotal + ' minutos').attr('data-duracion_total', duracionTotal);
  
    //queda pendiente dar formato hora a la duración de la reparación
//  var date = new Date(duracionTotal * 60 * 1000); //paso a milisegundos
//  if (duracionTotal > 59) {
//    duracionTotalFormateada = date.getHours()+'1:'+date.getMinutes();
//  } else {
//    duracionTotalFormateada = '0:'+date.getMinutes();
//  }
//  $('#duracion-total').val(duracionTotalFormateada + '  Horas:minutos').attr('data-duracion_total', duracionTotalFormateada);
  
}

$('#datepicker-cita, #datepicker-cita, #datepicker-recogida-minutos').focusout(function(){ //esto valida que los minutos no puedan ser 0 sino 00
  if ($(this).val() == 0) {
    $(this).val('00');
  }
});

$('#datepicker-recogida, #datepicker-cita-hora, #datepicker-recogida-hora').focusout(function(){ //esto valida que las horas no puedan ser 9 sino 09
  if ($(this).val().length == 1) {
    $(this).val(
      '0' + $(this).val()
    );
  }
});

$('#datepicker-cita, #datepicker-cita-hora, #datepicker-cita-minutos, #datepicker-recogida, #datepicker-recogida-hora, #datepicker-recogida-minutos').change(function(){ //si se modifica alguno de estos campos, habrá que volver a pulsar en consultar fehcas
  $('#enviar-solicitud').attr('disabled', true);
});


$('#consultar-fecha').click(function(){//envía la fecha del usuario al controlador y el controlador devuelve si está disponible. Formato 2016-12-31 23:59:59
  var fecha = $('#datepicker-cita').val() + ' ' +
    $('#datepicker-cita-hora').val() +  ':' +
    $('#datepicker-cita-minutos').val() + ':00';
    
    fecha = {'fecha': fecha};
    
  $.ajax({
      data: {'fecha': fecha},
      dataType: 'JSON',
      url: 'calendarioForm/consultarFecha',
      type: 'POST',
      success: function (obj) {
        if (obj.estado == 'disponible') {
          alerta3('fecha ' + obj.estado);
          $('#enviar-solicitud').attr('disabled', false);
        } else {
          alerta3('fecha ' + obj.estado);
          $('#enviar-solicitud').attr('disabled', true);
        }
      },
      error: function (e) {
        alert('error en la petición');
      }
  });
});

//hacer
$('#enviar-solicitud').click(function(){
  var fecha_cita = $('#datepicker-cita').val() + ' ' +
    $('#datepicker-cita-hora').val() +  ':' +
    $('#datepicker-cita-minutos').val() + ':00';
    
  var duracion_total = $('#duracion-total').attr('data-duracion_total');
  var precio_cal = $('#precio-total').attr('data-precio_total');
  var nombre_cliente = $('#nombre_cliente').val();
  var comentarios_cliente = $('#comentarios').val();
  
  var consulta = {
    fecha_cita: fecha_cita,
    duracion_total: duracion_total,
    precio_cal: precio_cal,
    nombre_cliente: nombre_cliente,
    comentarios_cliente: comentarios_cliente,    
  };
  
  $.ajax({
      data: consulta,
      dataType: 'JSON',
      url: 'calendarioForm/registrarSolicitud',
      type: 'POST',
      submit: function(){
      },
      success: function (obj) {
        if (obj.estado == 'Cita guardada'){
          alerta3(obj.estado + ' con éxito');
          $('#select-fechas').append('<option selected>'+obj.fecha_cita+'</option>');
        } else {
          alerta3('Error al guardar la cita');
        }
      },
      error: function (e) {
        alert('error en la petición');
      }
  });
});