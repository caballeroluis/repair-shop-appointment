$(document).ready(function(){
  $('input[type=submit]').prop('disabled', true);
  if ($('#RegistroForm_password').val() != '') { //este if hace que no se pierda la pass encriptada si no valida el formulario para que el usuario no tenga que volver a menterlas
    $('#miPassword').val($('#RegistroForm_password').val());
    $('#repetirMiPassword').val($('#RegistroForm_password').val());
    $('#div-validar-pass').hide();
    $('#miPassword').css({'background-color': '#E6EFC2', 'border-color': '#C6D880'});
    $('#repetirMiPassword').css({'background-color': '#E6EFC2', 'border-color': '#C6D880'});
    $('#miPassword').prop('disabled', true);
    $('#repetirMiPassword').prop('disabled', true);
    $('input[type=submit]').prop('disabled', false);
    $('#RegistroForm_password').val($('#miPassword').val());
    $('#RegistroForm_repetir_password').val($('#repetirMiPassword').val());
  }
});

$('#terminos').click(function(){
  $('#div-terminos').slideToggle('fast');
});

$('#validar-pass').click(function(){ //funcion que valida las pass crudas
  var pass1 = $('#miPassword').val();
  var pass2 = $('#repetirMiPassword').val();
  var regEx = /^.*(?=.{8,128})(?=.*[a-zA-Z])(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[!#$%&? |\'\/"çªº`@^*_+=-¿¡;:,.\<\>\{\}\[\]]).*$/;
  
  if (pass1 === pass2) {
    if (pass1.match(regEx)) {
        if (pass2.match(regEx)) {
          $('input[type=submit]').prop('disabled', false);
          $('#div-validar-pass').slideUp();
          $('#miPassword').css({'background-color': '#E6EFC2', 'border-color': '#C6D880'});
          $('#repetirMiPassword').css({'background-color': '#E6EFC2', 'border-color': '#C6D880'});
          alerta2('Las contraseñas han sido validadas y encriptadas con sha-256', 4000);
          $('#RegistroForm_password').val(encriptar($('#miPassword').val()));
          $('#RegistroForm_repetir_password').val(encriptar($('#repetirMiPassword').val()));
          $('#miPassword').val(encriptar($('#miPassword').val()));
          $('#repetirMiPassword').val(encriptar($('#repetirMiPassword').val()));
          $('#repetirMiPassword').prop('disabled', true);
          $('#miPassword').prop('disabled', true);
        } else {
          alerta('El campo Repetir contraseña debe tener letras, números, alguna mayúscula, algún símbolo un mínimo de 7 caracteres y un máximo de 129', duracionGlobal);
        }
    } else {
      alerta('El campo Repetir contraseña debe tener letras, números, alguna mayúscula, algún símbolo más de 7 caracteres y menos de 129', duracionGlobal);
    }
  } else {
      alerta('Las contraseñas no coinciden', duracionGlobal);
  }
});

function encriptar(pass){ //funcion que encripta una pass en SHA-512 en cliente con js
  var passCruda = pass;
  var objetoSha = new jsSHA(passCruda, 'ASCII');
  var passEncriptada = objetoSha.getHash('SHA-512', 'HEX');
  return passEncriptada;
}

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

function alerta2(texto, duracion) { //funcion para hacer los alerts bonitos
  $('#alerta-info2').html(texto + '<a class="close" title="close">x</a>');
  $('#alerta-info2').slideDown('fast');
  $('#alerta-info2').click(function(){
    $(this).slideUp(100);
  });
  setTimeout(function() {
    $('#alerta-info2').slideUp('slow');
  }, duracion);
}