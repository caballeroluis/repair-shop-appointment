<?php 
if (Yii::app()->user->isGuest) {
  $this->redirect(array('site/login'));
  Yii::app()->end();
}
?>
<?php
/* @var $this HandicapController */
/* @var $model Handicap */

$this->breadcrumbs=array(
	'Handicaps'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Handicap', 'url'=>array('index')),
	array('label'=>'Create Handicap', 'url'=>array('create')),
	array('label'=>'View Handicap', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Handicap', 'url'=>array('admin')),
);
?>

<h1>Update Handicap <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>