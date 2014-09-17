<?php
/* @var $this TypeController */
/* @var $model Type */

$this->breadcrumbs=array(
	'Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Type', 'url'=>array('index')),
	array('label'=>'Manage Type', 'url'=>array('admin')),
);
?>

<h1>Create Type</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>