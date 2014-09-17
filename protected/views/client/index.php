<?php
/* @var $this ClientController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Clients',
);

$this->menu=array(
	array('label'=> Yii::t('dictionary','Create Client'), 'url'=>array('create')),
	array('label'=> Yii::t('dictionary','Manage Clients'), 'url'=>array('admin')),
        array('label'=> Yii::t('dictionary','Manage Users'), 'url'=>array('/user/admin'), 'visible'=>Yii::app()->user->isVisibleForAdmins()),
        array('label'=> Yii::t('dictionary','Manage Projects'), 'url'=>array('/project/admin'), 'visible'=>Yii::app()->user->isVisibleForSuperAdmin()),
);
?>

<h1>Clients</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
