<?php
/* @var $this OtroController */
/* @var $model Otro */

$this->breadcrumbs=array(
	'Otros'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Otro', 'url'=>array('index')),
	array('label'=>'Manage Otro', 'url'=>array('admin')),
);
?>

<h1>Create Otro</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>