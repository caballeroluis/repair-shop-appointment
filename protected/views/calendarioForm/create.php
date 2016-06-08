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

//$pieza = Yii::app()->db->createCommand(
//        "SELECT id, nombre, precio, precio_instalar, marca_pieza_id, imagen, minutos_instalacion, informacion, categoria_pieza_id "
//        . "FROM pieza "
//        . "WHERE vivo = 1"
//)->query();

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

//$cita = Yii::app()->db->createCommand(
//        "SELECT id, fecha_cita, fecha_cal_recogida, comentarios_cliente, datediff(fecha_cita, fecha_cal_recogida) AS duracion "
//        . "FROM cita "
//        . "WHERE vivo = 1"
//)->query();
?>
<div id="alerta-info2" class="alert alert-info alerta" style="background-color: #E6EFC2; color: black"></div>

<div class="container">
  <div class="row">
    
    <div id="box1" class="span6 ">
      <div class="caja-gris"><!-- box 1 -->
        <fieldset>
          <label for="select-mano">¿Qué desea hacer?</label>
          <select id="select-mano">
            <?php
            foreach($mano as $i => $campo){
              echo '<option value="'.($i + 1).'" data-informacion="'.$campo['informacion'].'" data-imagen="'.$campo['imagen'].'">'.$campo['nombre'].' '.$campo['coste'].'€</option>';
            }
            ?>
          </select>
          <a href="#" onclick="alerta3(
            $('#select-mano > option').eq(
              $('#select-mano').prop('selectedIndex')
            ).html() + ' : ' +
            $('#select-mano > option').eq(
              $('#select-mano').prop('selectedIndex')
            ).attr('data-informacion')
          );" class="btn">?</a>
          
          <label for="select-handicap">¿Qué características tiene su bicicleta?</label>
          <select id="select-handicap"></select>  
          <a href="#" onclick="alerta3(
            $('#select-handicap > option').eq(
              $('#select-handicap').prop('selectedIndex')
            ).html() + ' : ' +
            $('#select-handicap > option').eq(
              $('#select-handicap').prop('selectedIndex')
            ).attr('data-informacion')
          );" class="btn">?</a>
          <br />
          <div class="img-polaroid">
            <img id="img-mano" />
          </div>
          <div class="img-polaroid">
            <img id="img-handicap" />
          </div>
      </div>
    </div>
    
    <div id="box2" class="span6 ">
      <div class="caja-gris"><!-- box 1 -->
        <fieldset>
          <label for="select-categoria_pieza">¿Necesita algo más?</label>
          <select id="select-categoria_pieza">
            <?php
            foreach($categoria_pieza as $i => $campo){
              echo '<option value="'.($i + 1).'">'.$campo['nombre'].'</option>';
            }
            ?>
          </select>
          
          <label for="select-pieza">¿Qué tipo de pieza necesita?</label>
          <select id="select-pieza" style="width: 80%">
            <!--<option>(id) nombre marca() precioInstalada() (imagen) (minutos_instalacion) (informacion)</option>-->
          </select>
          <a href="#" onclick="alerta3(
            $('#select-pieza > option').eq(
              $('#select-pieza').prop('selectedIndex')
            ).html() + ' : ' +
            $('#select-pieza > option').eq(
              $('#select-pieza').prop('selectedIndex')
            ).attr('data-informacion')
          );" class="btn">?</a>
          <br />
          <div class="img-polaroid">
            <img id="img-pieza" />
          </div>
          <br />
          Cantidad: <input id="cantidad" type="number" value="1" />
          <a href="#" id="aniadir" class="btn btn-primary">Añadir</a>
          <br />
          Lista de añadidos:
          <select id="select-aniadir" multiple style="width: 100%"></select>
          </div>
      <a href="#" id="limpiar" class="btn btn-primary">Limpiar lista</a>
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