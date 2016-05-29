function encriptar(pass){ //funcion que encripta una pass en SHA-512 en cliente con js
  var passCruda = pass;
  var objetoSha = new jsSHA(passCruda, 'ASCII');
  var passEncriptada = objetoSha.getHash('SHA-512', 'HEX');
  return passEncriptada;
}

$('#login-form').submit(function(){
  passCruda = $('#miLoginPassword').val();
  passEncriptada = encriptar(passCruda);
  $('#LoginForm_password').val(passEncriptada);
});