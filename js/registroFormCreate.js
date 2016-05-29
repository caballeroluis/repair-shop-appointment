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
  var regEx = /^.*(?=.{8,16})(?=.*[a-zA-Z])(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[!#$%&? |\'\/"çªº`@^*_+=-¿¡;:,.\<\>\{\}\[\]]).*$/;
  
  if (pass1 === pass2) {
    if (pass1.match(regEx)) {
        if (pass2.match(regEx)) {
          $('input[type=submit]').prop('disabled', false);
          $('#div-validar-pass').slideUp();
          $('#miPassword').css({'background-color': '#E6EFC2', 'border-color': '#C6D880'});
          $('#repetirMiPassword').css({'background-color': '#E6EFC2', 'border-color': '#C6D880'});
          $('#RegistroForm_password').val(encriptar($('#miPassword').val()));
          $('#RegistroForm_repetir_password').val(encriptar($('#repetirMiPassword').val()));
          $('#miPassword').val(encriptar($('#miPassword').val()));
          $('#repetirMiPassword').val(encriptar($('#repetirMiPassword').val()));
          $('#repetirMiPassword').prop('disabled', true);
          $('#miPassword').prop('disabled', true);
        } else {
          alerta('El campo Repetir contraseña debe tener letras, números, alguna mayúscula y algún símbolo', duracionGlobal);
        }
    } else {
      alerta('El campo Contraseña debe tener letras, números, alguna mayúscula y algún símbolo', duracionGlobal);
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

var duracionGlobal = 6000;

function alerta(texto, duracion) { //funcion para hacer los alerts bonitos
  $('.alerta').html(texto + '<a class="close" title="close">x</a>');
  $('.alerta').slideDown('fast');
  $('.alerta').click(function(){
    $(this).slideUp(100);
  });
  setTimeout(function() {
    $('.alerta').slideUp('slow');
  }, duracion);
}