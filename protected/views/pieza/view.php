<?php
/* @var $this PiezaController */
/* @var $model Pieza */

$this->breadcrumbs=array(
	'Piezas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Pieza', 'url'=>array('index')),
	array('label'=>'Create Pieza', 'url'=>array('create')),
	array('label'=>'Update Pieza', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Pieza', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pieza', 'url'=>array('admin')),
);
?>

<h1>View Pieza #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'precio',
		'precio_instalar',
		'fecha_creacion',
		'fecha_modificacion',
		'vivo',
		'marca_pieza_id',
		'imagen',
		'observaciones',
		'minutos_instalacion',
		'informacion',
	),
)); ?>
