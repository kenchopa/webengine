<?php
/* @var $this ProjectController */
/* @var $model Project */

$this->breadcrumbs=array(
	'Projects'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Project', 'url'=>array('index'), 'visible'=>Yii::app()->user->isVisibleForAdmins()),
	array('label'=>'Manage Project', 'url'=>array('admin'), 'visible'=>Yii::app()->user->isVisibleForSuperAdmin()),
        array('label'=>'Manage Users', 'url'=>array('/user/admin'), 'visible'=>Yii::app()->user->isVisibleForAdmins()),
);
?>

<h1>Create Project</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>