$(document).ready(function(){
  alert(sha1('1234'));
});

$('#btn-registro').click(function(){
  $('#div-registro').slideToggle();
  $('#btn-registro').slideUp();
});

function validarEmail() {
  //si coincide con expresi'on regular devuelve true :hacer
  return true
}

function validarCp() {
  //si coincide con expresi'on regular devuelve true :hacer
  return true
}

function validarRegistro() {
  //si los datos est'an bien retorna true
  if(
    document.getElementById('password1').value == document.getElementById('password2').value &&
    $('#usuario').val() != '' && $('#nombre').val() != '' &&
    $('#apellido1').val() != '' && $('#cp').val() != '' &&
    $('#email').val() != '' && validarEmail() && validarCp()  
  ){
    return true;
  }  else {
    alert('Datos incorrectos');
    return false;
  }
}

$('#btn-registrarse').click(function(){
  if (validarRegistro()) {
    var datos = {
      usuario: sha1(document.getElementById('password1').value),
      password1: $('#password1').val(),
      nombre: $('#nombre').val(),
      apellido1: $('#apellido1').val(),
      apellido2: $('#apellido2').val(),
      cp: $('#cp').val(),
      email: $('#email').val(),
    };
    
    $.ajax({ 
      data: datos,
      type: 'POST', 
      dataType: 'JSON',
      url: '/calendario/registro',
      beforeSend : function(){alert('beforeSend') },
      success: function(obj){
        alert(obj);
      },
      error: function(obj){
        alert(obj)
      }
    });  
  }
});

$('#btn-acceso').click(function(){
  $.ajax({ 
    data: { 'field1' : email  },
    type: 'POST', 
    dataType: 'JSON',
    url: '/calendario/acceder',
    beforeSend : function(){alert('beforeSend') },
    success: function(obj){alert(obj)},
    error: function(obj){alert(obj)}
  });  
});

$('#btn-admin').click(function(){
  
});



