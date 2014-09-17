<?php
/* @var $this ClientController */
/* @var $model Client */

$this->breadcrumbs=array(
	'Clients'=>array('index'),
	$model->FirstName . ' ' . $model->LastName => array('view','id'=>$model->Client_ID),
	'Update',
);

$this->menu=array(
	array('label'=> Yii::t('dictionary','List Clients'), 'url'=>array('index')),
	array('label'=> Yii::t('dictionary','Create Client'), 'url'=>array('create')),
	array('label'=> Yii::t('dictionary','View Client'), 'url'=>array('view', 'id'=>$model->Client_ID)),
	array('label'=> Yii::t('dictionary','Manage Clients'), 'url'=>array('admin')),
        array('label'=> Yii::t('dictionary','Manage Users'), 'url'=>array('/user/admin'), 'visible'=>Yii::app()->user->isVisibleForAdmins()),
        array('label'=> Yii::t('dictionary','Manage Projects'), 'url'=>array('/project/admin'), 'visible'=>Yii::app()->user->isVisibleForSuperAdmin()),
);
?>

<h1>Update <?php echo $model->FirstName . ' ' . $model->LastName; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>