<?php
/* @var $this PiezaController */
/* @var $model Pieza */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pieza-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'precio'); ?>
		<?php echo $form->textField($model,'precio'); ?>
		<?php echo $form->error($model,'precio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'precio_instalar'); ?>
		<?php echo $form->textField($model,'precio_instalar'); ?>
		<?php echo $form->error($model,'precio_instalar'); ?>
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
		<?php echo $form->labelEx($model,'marca_pieza_id'); ?>
		<?php echo $form->textField($model,'marca_pieza_id'); ?>
		<?php echo $form->error($model,'marca_pieza_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'imagen'); ?>
		<?php echo $form->textField($model,'imagen',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'imagen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'observaciones'); ?>
		<?php echo $form->textField($model,'observaciones',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'observaciones'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'minutos_instalacion'); ?>
		<?php echo $form->textField($model,'minutos_instalacion'); ?>
		<?php echo $form->error($model,'minutos_instalacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'informacion'); ?>
		<?php echo $form->textField($model,'informacion',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'informacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'categoria_pieza_id'); ?>
		<?php echo $form->textField($model,'categoria_pieza_id'); ?>
		<?php echo $form->error($model,'categoria_pieza_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->