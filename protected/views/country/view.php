<?php
/* @var $this CountryController */
/* @var $model Country */

$this->breadcrumbs=array(
	'Countries'=>array('index'),
	$model->Name,
);

$this->menu=array(
	array('label'=>'List Country', 'url'=>array('index'),'visible' => Yii::app()->user->isAdminPrivileged()),
	array('label'=>'Create Country', 'url'=>array('create'),'visible' => Yii::app()->user->isAdminPrivileged()),
	array('label'=>'Update Country', 'url'=>array('update', 'id'=>$model->Country_ID), 'visible' => Yii::app()->user->isSuperAdmin()),
	array('label'=>'Delete Country', 'url'=>'#', 'visible' => Yii::app()->user->isSuperAdmin(),  'linkOptions'=>array('submit'=>array('delete','id'=>$model->Country_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Country', 'url'=>array('admin'), 'visible' => Yii::app()->user->isAdminPrivileged()),
);
?>

<h1><?php echo $model->Name . ' - ' . $model->ISO_short; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Name',
		'ISO_short',
		'ISO_long',
		'Code',
	),
)); ?>
