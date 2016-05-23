<?php
/* @var $this OtroController */
/* @var $model Otro */

$this->breadcrumbs=array(
	'Otros'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Otro', 'url'=>array('index')),
	array('label'=>'Create Otro', 'url'=>array('create')),
	array('label'=>'Update Otro', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Otro', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Otro', 'url'=>array('admin')),
);
?>

<h1>View Otro #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nombre',
		'valor',
		'vivo',
		'fecha_creacion',
		'fecha_modificacion',
		'id',
	),
)); ?>
