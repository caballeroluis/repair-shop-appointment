<?php
/* @var $this CitaController */
/* @var $model Cita */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'fecha_cita'); ?>
		<?php echo $form->textField($model,'fecha_cita'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_creacion'); ?>
		<?php echo $form->textField($model,'fecha_creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_modificacion'); ?>
		<?php echo $form->textField($model,'fecha_modificacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vivo'); ?>
		<?php echo $form->textField($model,'vivo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_cal_recogida'); ?>
		<?php echo $form->textField($model,'fecha_cal_recogida'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_gusto_recogida'); ?>
		<?php echo $form->textField($model,'fecha_gusto_recogida'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'precio_cal'); ?>
		<?php echo $form->textField($model,'precio_cal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'observaciones'); ?>
		<?php echo $form->textField($model,'observaciones',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado_id'); ?>
		<?php echo $form->textField($model,'estado_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cliente_id'); ?>
		<?php echo $form->textField($model,'cliente_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prioridad'); ?>
		<?php echo $form->textField($model,'prioridad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comentarios_cliente'); ?>
		<?php echo $form->textField($model,'comentarios_cliente',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->