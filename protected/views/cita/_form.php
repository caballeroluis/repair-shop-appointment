<?php
/* @var $this CitaController */
/* @var $model Cita */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cita-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_cita'); ?>
		<?php echo $form->textField($model,'fecha_cita'); ?>
		<?php echo $form->error($model,'fecha_cita'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_creacion'); ?>
		<?php echo $form->textField($model,'fecha_creacion'); ?>
		<?php echo $form->error($model,'fecha_creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_modificacion'); ?>
		<?php echo $form->textField($model,'fecha_modificacion'); ?>
		<?php echo $form->error($model,'fecha_modificacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vivo'); ?>
		<?php echo $form->textField($model,'vivo'); ?>
		<?php echo $form->error($model,'vivo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_cal_recogida'); ?>
		<?php echo $form->textField($model,'fecha_cal_recogida'); ?>
		<?php echo $form->error($model,'fecha_cal_recogida'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_gusto_recogida'); ?>
		<?php echo $form->textField($model,'fecha_gusto_recogida'); ?>
		<?php echo $form->error($model,'fecha_gusto_recogida'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'precio_cal'); ?>
		<?php echo $form->textField($model,'precio_cal'); ?>
		<?php echo $form->error($model,'precio_cal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'observaciones'); ?>
		<?php echo $form->textField($model,'observaciones',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'observaciones'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado_id'); ?>
		<?php echo $form->textField($model,'estado_id'); ?>
		<?php echo $form->error($model,'estado_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cliente_id'); ?>
		<?php echo $form->textField($model,'cliente_id'); ?>
		<?php echo $form->error($model,'cliente_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prioridad'); ?>
		<?php echo $form->textField($model,'prioridad'); ?>
		<?php echo $form->error($model,'prioridad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comentarios_cliente'); ?>
		<?php echo $form->textField($model,'comentarios_cliente',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'comentarios_cliente'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

        <div id="cita" style="display: none">
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
          <input id="datepicker-cita-hora" type="number" value="10" min="10" max="19" style="width: 50px" /> : 
          <input id="datepicker-cita-minutos" type="number" value="00" min="0" max="30" step="30" style="width: 50px" />
          H
          </div>
        
        
<?php $this->endWidget(); ?>

</div><!-- form -->