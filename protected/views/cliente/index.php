<?php 
if (Yii::app()->user->isGuest) {
  header('Location: http://'. $_SERVER['SERVER_NAME'].':' . $_SERVER['SERVER_PORT']. '/web/index.php/site/login');
  die();
} else {
  
}
?>
<?php
/* @var $this ClienteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Clientes',
);

$this->menu=array(
	array('label'=>'Create Cliente', 'url'=>array('create')),
	array('label'=>'Manage Cliente', 'url'=>array('admin')),
);
?>

<h1>Clientes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
