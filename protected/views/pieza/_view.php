<?php
/* @var $this PiezaController */
/* @var $data Pieza */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precio')); ?>:</b>
	<?php echo CHtml::encode($data->precio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precio_instalar')); ?>:</b>
	<?php echo CHtml::encode($data->precio_instalar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_modificacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_modificacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vivo')); ?>:</b>
	<?php echo CHtml::encode($data->vivo); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('marca_pieza_id')); ?>:</b>
	<?php echo CHtml::encode($data->marca_pieza_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('imagen')); ?>:</b>
	<?php echo CHtml::encode($data->imagen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observaciones')); ?>:</b>
	<?php echo CHtml::encode($data->observaciones); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('minutos_instalacion')); ?>:</b>
	<?php echo CHtml::encode($data->minutos_instalacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('informacion')); ?>:</b>
	<?php echo CHtml::encode($data->informacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('categoria_pieza_id')); ?>:</b>
	<?php echo CHtml::encode($data->categoria_pieza_id); ?>
	<br />

	*/ ?>

</div>