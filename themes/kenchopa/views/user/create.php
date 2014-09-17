<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'<i class="icon-th-list"></i> List User', 'url'=>array('index')),
	array('label'=>'<i class="icon-edit"></i> Manage User', 'url'=>array('admin')),
);
?>

<?php
    $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>"Create User",
    ));

?> 

    <?php $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endWidget(); ?>