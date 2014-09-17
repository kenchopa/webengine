<?php
/* @var $this ProjectController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Projects',
);

$this->menu=array(
	array('label'=>'Create Project', 'url'=>array('create'),'visible'=>Yii::app()->user->isVisibleForSuperAdmin()),
	array('label'=>'Manage Project', 'url'=>array('admin'),'visible'=>Yii::app()->user->isVisibleForSuperAdmin()),
        array('label'=>'Manage Users', 'url'=>array('/user/admin'), 'visible'=>Yii::app()->user->isVisibleForAdmins()),
);
?>

<h1>Projects</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
