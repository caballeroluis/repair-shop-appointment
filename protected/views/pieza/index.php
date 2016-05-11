<?php 
if (Yii::app()->user->isGuest) {
  header('Location: http://'. $_SERVER['SERVER_NAME'].':' . $_SERVER['SERVER_PORT']. '/web/index.php/site/login');
  die();
} else {
  
}
?>
<?php
/* @var $this PiezaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Piezas',
);

$this->menu=array(
	array('label'=>'Create Pieza', 'url'=>array('create')),
	array('label'=>'Manage Pieza', 'url'=>array('admin')),
);
?>

<h1>Piezas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
