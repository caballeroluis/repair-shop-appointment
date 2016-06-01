<?php
$this->breadcrumbs = array(
    'Calendario',
);
?>


<div class="container">
  <div class="row">
    
    <div id="box1" class="span6 ">
      <div class="caja-gris"><!-- box 1 -->
        <fieldset>
          <label for="select-mano">¿Qué desea hacer?</label>
          <select id="select-mano">
            <option>revision completa</option>
            <option>revision estandar</option>
            <option>ajuste de frenos</option>
          </select>
          <a href="#" class="btn">?</a>
          
          <label for="select-handicap">¿Qué tipo de xxx tiene?</label>
          <select id="select-handicap">
            <option>Freno tampor</option>
            <option>Freno hidráulico</option>
            <option>Freno zapata</option>
          </select>  
          <a href="#" class="btn">?</a>
          <br />
          <div id="img-mano" class="img-polaroid">imagen<br />imagen<br />imagen<br />  imagen<br />imagen<br /></div>
          <div id="img-handicap" class="img-polaroid">imagen<br />imagen<br />imagen<br />  imagen<br />imagen<br /></div>
      </div>
    </div>
    
    <div id="box2" class="span6 ">
      <div class="caja-gris"><!-- box 1 -->
        <fieldset>
          <label for="select-familia">¿Necesita algo más?</label>
          <select id="select-familia">
            <option>Cable</option>
            <option>Zapata</option>
            <option>Cadena</option>
          </select>
          
          <label for="select-pieza">¿Qué tipo de xxx necesita?</label>
          <select id="select-pieza">
            <option>Cadena estandar 7 €</option>
            <option>Cadena1  2 €</option>
            <option>Cadena2  4 €</option>
          </select>
          <a href="#" class="btn">?</a>
          <br />
          <div class="img-polaroid">imagen<br />imagen<br />imagen<br />  imagen<br />imagen<br /></div>
          <br />
          Cantidad: <input type="number" value="1" />
          <a href="#" class="btn btn-primary">Añadir</a>
          <br />
          Lista de añadidos: <div class="img-polaroid">pieza<br />pieza<br />pieza<br /></div>
          <a href="#" class="btn btn-primary">Limpiar lista</a>
      </div>
    </div>
    
  </div>
  <div class="row">
    
    <div id="box3" class="span6 ">
      <div class="caja-gris"><!-- box 3 -->
        <input  type="datetime" />
        <a href="#" class="btn btn-primary">Seleccione fecha disponible</a>
        <a href="#" class="btn btn-primary">Solicitar cita</a>
      </div>
    </div>
    
    <div id="box4" class="span6 ">
      <div class="caja-gris"><!-- box 4 -->
        CALENDARIO
      </div>
    </div>
        
  </div>
  <div class="row">
    
    <div id="box5" class="span6 ">
      <div class="caja-gris"><!-- box 5 -->
        Precio total: <input type="number" />
        <br />
        Duración reparación: <input type="number" />
      </div>
    </div>
    
  </div>
</div>


<script src="/web/js/registroFormCreate.js" type="text/javascript"></script>