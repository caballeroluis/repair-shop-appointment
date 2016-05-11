<?php 
if (Yii::app()->user->isGuest) {
  header('Location: http://'. $_SERVER['SERVER_NAME'].':' . $_SERVER['SERVER_PORT']. '/web/index.php/site/login');
  die();
} else {
  
}
?>
<?php
/* @var $this PiezaController */
/* @var $model Pieza */

$this->breadcrumbs=array(
	'Piezas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pieza', 'url'=>array('index')),
	array('label'=>'Manage Pieza', 'url'=>array('admin')),
);
?>

<h1>Create Pieza</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>