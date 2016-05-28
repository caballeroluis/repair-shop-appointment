<?php
/* @var $this RegistroFormController */
/* @var $model RegistroForm */

$this->breadcrumbs=array(
	'Registro Forms'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RegistroForm', 'url'=>array('index')),
	array('label'=>'Create RegistroForm', 'url'=>array('create')),
	array('label'=>'View RegistroForm', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RegistroForm', 'url'=>array('admin')),
);
?>

<h1>Update RegistroForm <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>