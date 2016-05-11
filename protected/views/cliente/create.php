<?php 
if (Yii::app()->user->isGuest) {
  header('Location: http://'. $_SERVER['SERVER_NAME'].':' . $_SERVER['SERVER_PORT']. '/web/index.php/site/login');
  die();
} else {
  
}
?>
<?php
/* @var $this ClienteController */
/* @var $model Cliente */

$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cliente', 'url'=>array('index')),
	array('label'=>'Manage Cliente', 'url'=>array('admin')),
);
?>

<h1>Create Cliente</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>