<?php
/* @var $this ClientController */
/* @var $model Client */

$this->breadcrumbs=array(
	'Clients'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=> Yii::t('dictionary','List Clients'), 'url'=>array('index')),
	array('label'=> Yii::t('dictionary','Manage Clients'), 'url'=>array('admin')),
        array('label'=> Yii::t('dictionary','Manage Users'), 'url'=>array('/user/admin'), 'visible'=>Yii::app()->user->isVisibleForAdmins()),
        array('label'=> Yii::t('dictionary','Manage Projects'), 'url'=>array('/project/admin'), 'visible'=>Yii::app()->user->isVisibleForSuperAdmin()),
);
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>