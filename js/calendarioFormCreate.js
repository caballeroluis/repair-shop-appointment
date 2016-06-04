$(document).ready(function(){
  traerDatosIniciales();
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
  $('.alert-info').html(texto + '<a class="close" title="close">x</a>');
  $('.alert-info').slideDown('fast');
  $('.alert-info').click(function(){
    $(this).slideUp(100);
  });
}

var datosIniciales = {};

function traerDatosIniciales(){
  $.ajax({
      url: 'calendarioForm/traerDatosIniciales',
      type: 'POST',
      success: function (obj) {
        datosIniciales = obj;
      },
      error: function (e) {
        console.log(e);
      }
  });
}

function pintarDatosIniciales(){
  $.each(JSON.parse(datosIniciales), function(i, tabla){
    console.log(i );
    return false;
  });
}