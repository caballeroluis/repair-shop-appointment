<?php

/* @var $this CalendarioController */

$this->breadcrumbs=array(
	'Calendario',
);
?>

<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-11 col-lg-11">
      <form>
        <input type="text" placeholder="Usuario" />
        <input type="password" placeholder="Contraseña" />
        <span tabindex="3" id="btn-acceder" style="margin-top: -11px" class="btn btn-small btn-success">Acceder</span>
        <span tabindex="4" id="btn-formulario-registro" style="margin-top: -11px" class="btn btn-small btn-primary">Formulario de registro</span>
        <div id="div-registro" style="display: none">
          <input type="password" placeholder="Repite contraseña" /><br />
          <input type="text" placeholder="Nombre" /><br />
          <input type="text" placeholder="Apellido" /><br />
          <input type="text" placeholder="Segundo apellido" /> *<br />
          <input type="text" placeholder="Teléfono" /> *<br />
          <input type="text" placeholder="Código postal" /><br />
          <input type="email" placeholder="Correo electrónico" /><br />
          <span tabindex="5" id="btn-registrarse" style="margin-top: -11px" class="btn btn-small btn-success">Registrarse</span><br />
          * campos opcionales.
          
          
        </div>
      </form>
    </div>
  </div>
  
  <div class="row">
    <div class="span6 "><div class="caja-gris">Box 1</div></div>
    <div class="span6 "><div class="caja-gris">Box 2</div></div>
    <div class="span6 "><div class="caja-gris">Box 3</div></div>
    <div class="span6 "><div class="caja-gris">Box 4</div></div>
  </div>
</div>


<script type="text/javascript">
  $(document).ready(function(){
  });

  $('#btn-formulario-registro').click(function(){
    $('#div-registro').slideToggle();
    $('#btn-formulario-registro').slideUp();
  });

  $('#btn-registrarse').click(function(){
    $.ajax({ 
      data: { 'field1' : email  },
      type: 'POST', 
      dataType: 'JSON',
      url: '/calendario/registro',
      beforeSend : function(){alert('beforeSend') },
      success: function(obj){alert(obj)},
      error: function(obj){alert(obj)}
    });  
  });
  
  $('#btn-acceder').click(function(){
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
</script>