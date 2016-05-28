<?php
/* @var $this RegistroFormController */
/* @var $model RegistroForm */

$this->breadcrumbs=array(
	'Registro Forms'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RegistroForm', 'url'=>array('index')),
	array('label'=>'Manage RegistroForm', 'url'=>array('admin')),
);
?>

<h1>Create RegistroForm</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>