$(document).ready(function(){
//  alert('asdf');
});

$('#terminos').click(function(){
  $('#div-terminos').slideToggle('fast');
});

//$('#registro-form-form').submit(function(){ //funcion que encripta la pass en cliente
//  var passCruda = document.getElementById('RegistroForm_password').value;
//  var objetoSha = new jsSHA(passCruda, 'ASCII');
//  var passEncriptada = objetoSha.getHash('SHA-512', 'HEX');
//  document.getElementById('RegistroForm_password').value = passEncriptada;
//});



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



