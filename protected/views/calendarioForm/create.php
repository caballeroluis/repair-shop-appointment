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

$cita = Yii::app()->db->createCommand(
        "SELECT id, fecha_cita, fecha_cal_recogida, comentarios_cliente, datediff(fecha_cita, fecha_cal_recogida) AS duracion "
        . "FROM cita "
        . "WHERE vivo = 1"
)->query();
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
              echo '<option value="'.($i + 1).'" data-coste="'.$campo['coste'].'" data-minutos_duracion="'.$campo['minutos_duracion'].'" data-informacion="'.$campo['informacion'].'" data-imagen="'.$campo['imagen'].'">'.$campo['nombre'].' '.$campo['coste'].'€</option>';
            }
            ?>
          </select>
          <button onclick="alerta3(
            $('#select-mano > option').eq(
              $('#select-mano').prop('selectedIndex')
            ).html() + ' : ' +
            $('#select-mano > option').eq(
              $('#select-mano').prop('selectedIndex')
            ).attr('data-informacion')
          );" class="btn">?</button>
          
          <label for="select-handicap">¿Qué características tiene su bicicleta?</label>
          <select id="select-handicap"></select>  
          <button onclick="alerta3(
            $('#select-handicap > option').eq(
              $('#select-handicap').prop('selectedIndex')
            ).html() + ' : ' +
            $('#select-handicap > option').eq(
              $('#select-handicap').prop('selectedIndex')
            ).attr('data-informacion')
          );" class="btn">?</button>
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
          <label for="select-categoria_pieza">¿Necesita añadir algo más?</label>
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
          <button onclick="alerta3(
            $('#select-pieza > option').eq(
              $('#select-pieza').prop('selectedIndex')
            ).html() + ' : ' +
            $('#select-pieza > option').eq(
              $('#select-pieza').prop('selectedIndex')
            ).attr('data-informacion')
          );" class="btn">?</button>
          <br />
          <div class="img-polaroid">
            <img id="img-pieza" />
          </div>
          <br />
          Cantidad: <input id="cantidad" min="1" max="999" type="number" value="1" />
          <button id="aniadir" class="btn btn-primary">Añadir</button>
          <br />
          Lista de añadidos:
          <select id="select-aniadir" multiple style="width: 100%"></select>
          <button id="limpiar" class="btn btn-primary">Limpiar lista</button>
        </div>
      </div>
  </div>
    
  <div class="row">
    <div id="box3" class="span6 ">
      <div class="caja-gris"><!-- box 3 -->
        <fieldset>
          <div id="cita">
          <label for="datepicker-cita">Seleccione fecha de la cita</label>
          <?php
          $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'fechaFin',
            'language' => 'es',
            'value' => date('Y-m-d'),
            'options' => array(
              'showAnim' => 'fold',
              'dateFormat' => 'yy-mm-dd',
            ),
            'htmlOptions' => array(
              'style' => 'width: 90px',
              'id' => 'datepicker-cita',
            ),
          ));
          ?>
          a las
          <input id="datepicker-cita-hora" type="number" value="10" min="9" max="19" style="width: 50px" /> : 
          <input id="datepicker-cita-minutos" type="number" value="00" min="0" max="30" step="30" style="width: 50px" />
          H
          </div>
          <div id="recogida">
          <label for="datepicker-recogida">Seleccione fecha de recogida</label>
          <?php
          $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'fechaFin',
            'language' => 'es',
            'value' => date('Y-m-d'),
            'options' => array(
              'showAnim' => 'fold',
              'dateFormat' => 'yy-mm-dd',
            ),
            'htmlOptions' => array(
              'style' => 'width: 90px',
              'id' => 'datepicker-recogida',
            ),
          ));
          ?>
          a las
          <input id="datepicker-recogida-hora" type="number" value="10" min="9" max="20" style="width: 50px" /> : 
          <input id="datepicker-recogida-minutos" type="number" value="00" min="0" max="30" step="30" style="width: 50px" />
          H
          </div>
        </fieldset>
        <button id="consultar-fecha" class="btn btn-primary">Consultar fechas</button>
        <br />
        <br />
        <label for="comentario" title="máximo 200 caractéres">Aquí puede dejar un comentario al técnico:</label>
        <textarea title="máximo 200 caractéres" maxlength="200" id="comentario" style="width: 90%" rows="6"></textarea>
      </div>
    </div>
    <div id="box4" class="span6 ">
      <div class="caja-gris"><!-- box 4 -->
        Precio total reparación y/o istalación: <input id="precio-total" type="text" />
        <br />
        Duración reparación: <input id="duracion-total" type="text" />
        <br />
        <button id="enviar-solicitud" class="btn btn-primary" title="Debe consultar primero las fechas">Enviar solicitud de cita</button>
      </div>
    </div>
  </div>
  
<!--  <div class="row">
    <div id="box5" class="span6 ">
      <div class="caja-gris"> box 5 
        
      </div>
    </div>
  </div>
   -->
</div>


<script src="/web/js/calendarioFormCreate.js" type="text/javascript"></script>