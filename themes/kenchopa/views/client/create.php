<?php
/* @var $this ClientController */
/* @var $model Client */

$this->breadcrumbs=array(
	'Clients'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=> '<i class="icon-th-list"></i> '. Yii::t('dictionary','List Clients'), 'url'=>array('index')),
	array('label'=> '<i class="icon-edit"></i> ' .Yii::t('dictionary','Manage Clients'), 'url'=>array('admin')),
        array('label'=> '<i class="icon-edit"></i> ' . Yii::t('dictionary','Manage Users'), 'url'=>array('/user/admin'), 'visible'=>Yii::app()->user->isVisibleForAdmins()),
        array('label'=> '<i class="icon-edit"></i> ' . Yii::t('dictionary','Manage Projects'), 'url'=>array('/project/admin'), 'visible'=>Yii::app()->user->isVisibleForSuperAdmin()),
);
?>

<?php
    $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>"Create Client",
    ));
?>  

    <?php $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endWidget(); ?>