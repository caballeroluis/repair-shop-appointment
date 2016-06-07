<?php
/* @var $this CalendarioFormController */
/* @var $model CalendarioForm */

$this->breadcrumbs=array(
	'Calendario Forms'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CalendarioForm', 'url'=>array('index')),
	array('label'=>'Create CalendarioForm', 'url'=>array('create')),
	array('label'=>'Update CalendarioForm', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CalendarioForm', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CalendarioForm', 'url'=>array('admin')),
);
?>

<h1>View CalendarioForm #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'fecha_cita',
		'fecha_creacion',
		'fecha_modificacion',
		'vivo',
		'fecha_cal_recogida',
		'fecha_gusto_recogida',
		'precio_cal',
		'observaciones',
		'estado_id',
		'cliente_id',
		'id',
		'prioridad',
	),
)); ?>
