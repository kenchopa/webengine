<?php
/* @var $this CountryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Countries',
);

$this->menu=array(
	array('label'=>'Create Country', 'url'=>array('create'), 'visible' => Yii::app()->user->isAdminPrivileged()),
	array('label'=>'Manage Country', 'url'=>array('admin'),'visible' => Yii::app()->user->isAdminPrivileged()),
);
?>

<h1>Countries</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
