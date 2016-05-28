<?php
/* @var $this RegistroFormController */
/* @var $model RegistroForm */

$this->breadcrumbs=array(
	'Registro Forms'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RegistroForm', 'url'=>array('index')),
	array('label'=>'Create RegistroForm', 'url'=>array('create')),
	array('label'=>'Update RegistroForm', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RegistroForm', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RegistroForm', 'url'=>array('admin')),
);
?>

<h1>View RegistroForm #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'apellido1',
		'apellido2',
		'telefono',
		'codigo_postal',
		'email',
		'fecha_creacion',
		'fecha_modificacion',
		'password',
		'vivo',
		'imagen',
		'codigo_activacion',
		'activado',
		'username',
		'observaciones',
	),
)); ?>
