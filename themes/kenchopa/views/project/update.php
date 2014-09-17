<?php
/* @var $this ProjectController */
/* @var $model Project */

$this->breadcrumbs=array(
	'Projects'=>array('index'),
	$model->Name=>array('view','id'=>$model->Project_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Project', 'url'=>array('index'),'visible'=>Yii::app()->user->isVisibleForAdmins()),
	array('label'=>'Create Project', 'url'=>array('create'),'visible'=>Yii::app()->user->isVisibleForSuperAdmin()),
	array('label'=>'View Project', 'url'=>array('view', 'id'=>$model->Project_ID),'visible'=>Yii::app()->user->isVisibleForAdmins()),
	array('label'=>'Manage Project', 'url'=>array('admin'),'visible'=>Yii::app()->user->isVisibleForSuperAdmin()),
        array('label'=>'Manage Users', 'url'=>array('/user/admin'), 'visible'=>Yii::app()->user->isVisibleForAdmins()),
);
?>

<h1>Update <?php echo $model->Name; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>