<?php
/* @var $this ManoController */
/* @var $model Mano */

$this->breadcrumbs=array(
	'Manos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Mano', 'url'=>array('index')),
	array('label'=>'Create Mano', 'url'=>array('create')),
	array('label'=>'Update Mano', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Mano', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Mano', 'url'=>array('admin')),
);
?>

<h1>View Mano #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'coste',
		'minutos_duracion',
		'fecha_creacion',
		'fecha_modificacion',
		'vivo',
		'imagen',
		'observaciones',
		'informacion',
	),
)); ?>
