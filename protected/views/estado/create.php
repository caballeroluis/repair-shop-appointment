<?php 
if (Yii::app()->user->isGuest) {
  header('Location: http://'. $_SERVER['SERVER_NAME'].':' . $_SERVER['SERVER_PORT']. '/web/index.php/site/login');
  die();
} else {
  
}
?>
<?php
/* @var $this EstadoController */
/* @var $model Estado */

$this->breadcrumbs=array(
	'Estados'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Estado', 'url'=>array('index')),
	array('label'=>'Manage Estado', 'url'=>array('admin')),
);
?>

<h1>Create Estado</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>