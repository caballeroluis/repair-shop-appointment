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
        <button id="btn-acceder" style="margin-top: -11px" class="btn-success">Acceder</button>
        <button id="btn-registro" style="margin-top: -11px" class="btn-info">Registro</button>
        <div id="div-registro" style="display: none">
          <input type="password" placeholder="Repite contraseña" />
          <input type="email" placeholder="Correo electrónico" />
          
          
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

$('#btn-registro').click(function(){
  $('#div-registro').slideToggle();
});


</script>