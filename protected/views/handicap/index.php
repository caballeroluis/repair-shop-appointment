<?php 
if (Yii::app()->user->isGuest) {
  $this->redirect(array('site/login'));
  Yii::app()->end();
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
