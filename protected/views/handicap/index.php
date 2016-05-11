<?php 
if (Yii::app()->user->isGuest) {
  header('Location: http://'. $_SERVER['SERVER_NAME'].':' . $_SERVER['SERVER_PORT']. '/web/index.php/site/login');
  die();
} else {
  
}
?>
<?php
/* @var $this HandicapController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Handicaps',
);

$this->menu=array(
	array('label'=>'Create Handicap', 'url'=>array('create')),
	array('label'=>'Manage Handicap', 'url'=>array('admin')),
);
?>

<h1>Handicaps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
