<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->UserName=>array('view','id'=>$model->User_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'View User', 'url'=>array('view', 'id'=>$model->User_ID)),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<?php
    $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>"Update User " . $model->UserName,
    ));

?>  
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endWidget(); ?>