<?php
/* @var $this RegistroController */
/* @var $data Registro */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellido1')); ?>:</b>
	<?php echo CHtml::encode($data->apellido1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellido2')); ?>:</b>
	<?php echo CHtml::encode($data->apellido2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</b>
	<?php echo CHtml::encode($data->telefono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo_postal')); ?>:</b>
	<?php echo CHtml::encode($data->codigo_postal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_modifiacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_modifiacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vivo')); ?>:</b>
	<?php echo CHtml::encode($data->vivo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('imagen')); ?>:</b>
	<?php echo CHtml::encode($data->imagen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo_activacion')); ?>:</b>
	<?php echo CHtml::encode($data->codigo_activacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activado')); ?>:</b>
	<?php echo CHtml::encode($data->activado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	*/ ?>

</div>