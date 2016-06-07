$(document).ready(function(){
  $('#select-mano').change();
  $('#select-categoria_pieza').change();
  
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
            '<option value="'+(i + 1)+'" data-minutos_duracion="'+tupla.minutos_duracion+'" data-imagen="'
            +tupla.imagen+'" data-mano_id="'+tupla.mano_id+'" data-informacion="'+tupla.informacion+'">'
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
      },
      error: function (e) {
        console.log(e);
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
            '<option value="'+(i + 1)+'" data-minutos_duracion="'+tupla.minutos_duracion+'" data-imagen="'
            +tupla.imagen+'" data-mano_id="'+tupla.mano_id+'" data-informacion="'+tupla.informacion+'">'
            +tupla.nombre+' '+tupla.recargo+'€</option>'
          );
        });
        //actualizo imagen mano
        var ruta = $('#select-pieza > option').eq(
          $('#select-pieza').prop('selectedIndex')
        ).attr('data-imagen');
        $('#img-pieza').attr('src', ruta);
        ruta = '';
        $('#select-pieza').change();
      },
      error: function (e) {
        console.log(e);
      }
  });
});