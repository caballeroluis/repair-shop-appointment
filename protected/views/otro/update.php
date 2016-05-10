<?php
/* @var $this OtroController */
/* @var $model Otro */

$this->breadcrumbs=array(
	'Otros'=>array('index'),
	$model->nombre=>array('view','id'=>$model->nombre),
	'Update',
);

$this->menu=array(
	array('label'=>'List Otro', 'url'=>array('index')),
	array('label'=>'Create Otro', 'url'=>array('create')),
	array('label'=>'View Otro', 'url'=>array('view', 'id'=>$model->nombre)),
	array('label'=>'Manage Otro', 'url'=>array('admin')),
);
?>

<h1>Update Otro <?php echo $model->nombre; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>