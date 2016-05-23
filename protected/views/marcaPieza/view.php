<?php
/* @var $this MarcaPiezaController */
/* @var $model MarcaPieza */

$this->breadcrumbs=array(
	'Marca Piezas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MarcaPieza', 'url'=>array('index')),
	array('label'=>'Create MarcaPieza', 'url'=>array('create')),
	array('label'=>'Update MarcaPieza', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MarcaPieza', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MarcaPieza', 'url'=>array('admin')),
);
?>

<h1>View MarcaPieza #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'imagen',
		'vivo',
		'fecha_creacion',
		'fecha_modificacion',
		'observaciones',
	),
)); ?>
