$(document).ready(function(){
  traerDatos();
});

function traerDatos(){

  $.ajax({
      url: 'calendarioForm/traerDatos',
      type: 'POST',
      beforeSend: function () {
        
      },
      success: function (datos) {
        console.log(datos);
      },
      error: function (e) {
        console.log(e);
      }
  });
  
}

