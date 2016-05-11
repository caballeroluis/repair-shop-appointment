<?php
/* @var $this HandicapController */
/* @var $model Handicap */

$this->breadcrumbs=array(
	'Handicaps'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Handicap', 'url'=>array('index')),
	array('label'=>'Manage Handicap', 'url'=>array('admin')),
);
?>

<h1>Create Handicap</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>