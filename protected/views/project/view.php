<?php
/* @var $this ProjectController */
/* @var $model Project */

$this->breadcrumbs=array(
	'Projects'=>array('index'),
	$model->Name,
);

$this->menu=array(
	array('label'=>'List Project', 'url'=>array('index')),
	array('label'=>'Create Project', 'url'=>array('create'),'visible'=>Yii::app()->user->isVisibleForSuperAdmin()),
	array('label'=>'Update Project', 'url'=>array('update', 'id'=>$model->Project_ID),'visible'=>Yii::app()->user->isVisibleForSuperAdmin()),
	array('label'=>'Delete Project', 'url'=>'#','visible'=>Yii::app()->user->isVisibleForSuperAdmin(), 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Project_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Project', 'url'=>array('admin'),'visible'=>Yii::app()->user->isVisibleForSuperAdmin()),
        array('label'=>'Manage Users', 'url'=>array('/user/admin'), 'visible'=>Yii::app()->user->isVisibleForAdmins()),
);
?>

<h1>View <?php echo $model->Name; ?> - <?php echo $model->Client->getFullName(); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
                'Name',
		'Description',
                'Website',
                array(
                      'name'=>'Client_ID',                 
                      'value' => CHtml::encode($model->Client->getFullName()),
                ),
                array(
                      'name'=>'Active',                 
                      'value' => CHtml::encode($model->getActivationOption($model->Active)),
                ),
                array(
                      'name'=>'CreatedBy_User_ID',                 
                      'value' => CHtml::encode($model->CreatedBy->UserName),
                ),
                array(
                      'name'=>'UpdatedBy_User_ID',                 
                      'value' => CHtml::encode($model->UpdatedBy->UserName),
                ),
		'Date_Added',
		'Date_Modified',
		'Date_Expired',
	),
)); ?>
