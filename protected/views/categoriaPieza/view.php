<?php
/* @var $this CategoriaPiezaController */
/* @var $model CategoriaPieza */

$this->breadcrumbs=array(
	'Categoria Piezas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CategoriaPieza', 'url'=>array('index')),
	array('label'=>'Create CategoriaPieza', 'url'=>array('create')),
	array('label'=>'Update CategoriaPieza', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CategoriaPieza', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CategoriaPieza', 'url'=>array('admin')),
);
?>

<h1>View CategoriaPieza #<?php echo $model->id; ?></h1>

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
