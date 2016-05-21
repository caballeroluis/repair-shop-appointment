<?php
/* @var $this RegistroController */
/* @var $model Registro */

if (!Yii::app()->user->isGuest) {
  $this->redirect('/web');
}

$this->breadcrumbs=array(
	'Registro',
	'Crear',
);

//$this->menu=array(
//	array('label'=>'List Registro', 'url'=>array('index')),
//	array('label'=>'Manage Registro', 'url'=>array('admin')),
//);
?>

<h1>Crear Registro</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>