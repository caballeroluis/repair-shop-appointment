$(document).ready(function(){
  $('input[type=submit]').prop('disabled', true);
  if ($('#RegistroForm_password').val() != '') { //esto hace que no se pierda la pass encriptada si no valida el formulario y el usuario no tenga que volver a menterla
    $('#miPassword').val($('#RegistroForm_password').val());
    $('#repetirMiPassword').val($('#RegistroForm_password').val());
    $('#div-validar-pass').show();
    $('#miPassword').css("background-color", "#C6D880");
    $('#repetirMiPassword').css("background-color", "#C6D880");
    $('input[type=submit]').prop('disabled', false);
    $('#RegistroForm_password').val($('#miPassword').val());
    $('#RegistroForm_repetir_password').val($('#repetirMiPassword').val());
  }
});

$('#terminos').click(function(){
  $('#div-terminos').slideToggle('fast');
});

$('#validar-pass').click(function(){ //funcion que valida las pass crudas
  var pass1 = document.getElementById('miPassword').value;
  var pass2 = document.getElementById('repetirMiPassword').value;
  var regEx = /^.*(?=.{8,16})(?=.*[a-zA-Z])(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[!#$%&? |\'\/"çªº`@^*_+=-¿¡;:,.\<\>\{\}\[\]]).*$/;
  
  if (pass1 === pass2) {
    if (pass1.match(regEx)) {
        if (pass2.match(regEx)) {
          $('input[type=submit]').prop('disabled', false);
          $('#div-validar-pass').slideUp();
          $('#miPassword').css("background-color", "#C6D880");
          $('#repetirMiPassword').css("background-color", "#C6D880");
          $('#RegistroForm_password').val(encriptar($('#miPassword').val()));
          $('#RegistroForm_repetir_password').val(encriptar($('#repetirMiPassword').val()));
        } else {
          alert('El campo Repetir contraseña debe tener letras, números, alguna mayúscula y algún símbolo');
        }
    } else {
      alert('El campo Contraseña debe tener letras, números, alguna mayúscula y algún símbolo');
    }
  } else {
      alert('Las contraseñas no coinciden');
  }
});

function encriptar(pass){ //funcion que encripta una pass en SHA-512 en cliente con js
  var passCruda = pass;
  var objetoSha = new jsSHA(passCruda, 'ASCII');
  var passEncriptada = objetoSha.getHash('SHA-512', 'HEX');
  return passEncriptada;
}



//$('#btn-registro').click(function(){
//  $('#div-registro').slideToggle();
//  $('#btn-registro').slideUp();
//});
//
//function validarEmail() {
//  //si coincide con expresi'on regular devuelve true :hacer
//  return true
//}
//
//function validarCp() {
//  //si coincide con expresi'on regular devuelve true :hacer
//  return true
//}
//
//function validarRegistro() {
//  var passCruda1 = document.getElementById('password1').value;
//  var passCruda2 = document.getElementById('password2').value;
//  //si los datos est'an bien retorna true
//  if(
//    passCruda1 === passCruda2 &&
//    $('#usuario').val() != '' && $('#nombre').val() != '' &&
//    $('#apellido1').val() != '' && $('#cp').val() != '' &&
//    $('#email').val() != '' && validarEmail() && validarCp()  
//  ){
//    //borro rastro de pass cruda
//    passCruda1 = passCruda2 = 'asdfasdfasdfasdf';
//    return true;
//  }  else {
//    //borro rastro de pass cruda
//    passCruda1 = passCruda2 = 'asdfasdfasdfasdf';
//    alert('Datos incorrectos');
//    return false;
//  }
//}
//
//$('#btn-registrarse').click(function(){
//  if (validarRegistro()) {
//    //encripto en sha512 la pass del cliente antes de enviarla
//    var passCruda = document.getElementById('password2').value;
//    var objetoSha = new jsSHA(passCruda, 'ASCII');
//    var passEncriptada = objetoSha.getHash('SHA-512', 'HEX');
//    
//    //borro rastro de pass cruda
//    passCruda = 'asdfasdfasdfasdf';
//    objetoSha = {asdf: 'asdfasdfasdf'};
//    $('#password1').val('asdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdf');
//    $('#password2').val('asdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdf');
//    
//    //declaro los datos a enviar
//    var datos = {datos: {
//      usuario: $('#usuario').val(),
//      passEncriptada: passEncriptada,
//      nombre: $('#nombre').val(),
//      apellido1: $('#apellido1').val(),
//      apellido2: $('#apellido2').val(),
//      telefono: $('#telefono').val(),
//      cp: $('#cp').val(),
//      email: $('#email').val(),
//    }};
//    
//    //env'io los datos al controlador y proceso respuesta
//    $.ajax({ 
//      url: '/calendario/registro',
//      type: 'POST', 
//      dataType: 'JSON',
//      data: datos,
//      beforeSend : function(){
//        $('#div-registro').fadeTo(100, 0.5);
////        alert('beforeSend');
//      },
//      success: function(obj){
//        $('#div-registro').slideUp();
////        alert(obj);
//      },
//      error: function(obj){
//        $('#div-registro').fadeTo(100, 1);
////        alert(obj)
//      }
//    });
//  }
//});
//
//$('#btn-acceso').click(function(){
//  $.ajax({ 
//    data: { 'field1' : email  },
//    type: 'POST', 
//    dataType: 'JSON',
//    url: '/calendario/acceder',
//    beforeSend : function(){alert('beforeSend') },
//    success: function(obj){alert(obj)},
//    error: function(obj){alert(obj)}
//  });  
//});
//
//$('#btn-admin').click(function(){
//  
//});



