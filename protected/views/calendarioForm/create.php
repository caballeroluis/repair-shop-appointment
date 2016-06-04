<?php
$this->breadcrumbs = array(
    'Calendario',
);

$mano = Yii::app()->db->createCommand(
        "SELECT id, nombre, coste, minutos_duracion, imagen, informacion "
        . "FROM mano "
        . "WHERE vivo = 1"
)->query();

$handicap = Yii::app()->db->createCommand(
        "SELECT id, nombre, recargo, minutos_duracion, imagen, informacion, mano_id "
        . "FROM handicap "
        . "WHERE vivo = 1"
)->query();

$pieza = Yii::app()->db->createCommand(
        "SELECT id, nombre, precio, precio_instalar, marca_pieza_id, imagen, minutos_instalacion, informacion, categoria_pieza_id "
        . "FROM pieza "
        . "WHERE vivo = 1"
)->query();

$categoria_pieza = Yii::app()->db->createCommand(
        "SELECT id, nombre, imagen "
        . "FROM categoria_pieza "
        . "WHERE vivo = 1"
)->query();

$marca_pieza = Yii::app()->db->createCommand(
        "SELECT id, nombre, imagen "
        . "FROM marca_pieza "
        . "WHERE vivo = 1"
)->query();

$cita = Yii::app()->db->createCommand(
        "SELECT id, fecha_cita, fecha_cal_recogida, comentarios_cliente, datediff(fecha_cita, fecha_cal_recogida) AS duracion "
        . "FROM cita "
        . "WHERE vivo = 1"
)->query();
?>
<div class="alert alert-info alerta" style="background-color: #E6EFC2; color: black"></div>

<div class="container">
  <div class="row">
    
    <div id="box1" class="span6 ">
      <div class="caja-gris"><!-- box 1 -->
        <fieldset>
          <label for="select-mano">¿Qué desea hacer?</label>
          <select id="select-mano">
            <?php
            foreach($mano as $i => $campo){
              echo '<option value="'.($i + 1).'" data-info="'.$campo['informacion'].'">'.$campo['nombre'].' '.$campo['coste'].'€</option>';
            }
            ?>
          </select>
          <a href="#" onclick="alerta3(
            $('#select-mano > option').eq(
              document.getElementById('select-mano').selectedIndex
            ).html() + ' : ' +
            $('#select-mano > option').eq(
              document.getElementById('select-mano').selectedIndex
            ).attr('data-info')
          );" class="btn">?</a>
          
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


<script src="/web/js/calendarioFormCreate.js" type="text/javascript"></script>