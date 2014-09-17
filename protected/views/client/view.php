<?php
/* @var $this ClientController */
/* @var $model Client */

$this->breadcrumbs=array(
	'Clients'=>array('index'),
	$model->FirstName . ' ' . $model->LastName,
);

$this->menu=array(
	array('label'=> Yii::t('dictionary','List Clients'), 'url'=>array('index')),
	array('label'=> Yii::t('dictionary','Create Client'), 'url'=>array('create')),
	array('label'=> Yii::t('dictionary','Update Client'), 'url'=>array('update', 'id'=>$model->Client_ID)),
	array('label'=> Yii::t('dictionary','Delete Client'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Client_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=> Yii::t('dictionary','Manage Clients'), 'url'=>array('admin')),
        array('label'=> Yii::t('dictionary','Manage Users'), 'url'=>array('/user/admin'), 'visible'=>Yii::app()->user->isVisibleForAdmins()),
);
?>

<h1><?php echo $model->FirstName . ' ' . $model->LastName . ' - ' . $model->Company; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'FirstName',
		'LastName',
		'Email',
		'Telephone',
		'Company',
                 array(
                      'name'=>'Country_ID',                 
                      'value' => CHtml::encode($model->Country->Name),
                ),
		'Region',
		'City',
		'Street',
		'StreetNumber',
		'Fax',
		'Mobile',
		'VAT',
	),
)); ?>
