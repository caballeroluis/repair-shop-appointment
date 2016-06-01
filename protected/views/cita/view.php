<?php
/* @var $this CitaController */
/* @var $model Cita */

$this->breadcrumbs=array(
	'Citas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Cita', 'url'=>array('index')),
	array('label'=>'Create Cita', 'url'=>array('create')),
	array('label'=>'Update Cita', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Cita', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cita', 'url'=>array('admin')),
);
?>

<h1>View Cita #<?php echo $model->id; ?></h1>

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
		'comentarios_cliente',
	),
)); ?>
