<?php
/* @var $this ManoController */
/* @var $model Mano */

$this->breadcrumbs=array(
	'Manos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Mano', 'url'=>array('index')),
	array('label'=>'Manage Mano', 'url'=>array('admin')),
);
?>

<h1>Create Mano</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>