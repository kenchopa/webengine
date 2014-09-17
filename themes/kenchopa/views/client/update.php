<?php
/* @var $this ClientController */
/* @var $model Client */

$this->breadcrumbs=array(
	'Clients'=>array('index'),
	$model->FirstName . ' ' . $model->LastName => array('view','id'=>$model->Client_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'<i class="icon-th-list"></i> ' .  Yii::t('dictionary','List Clients'), 'url'=>array('index')),
	array('label'=>'<i class="icon-plus-sign"></i> ' . Yii::t('dictionary','Create Client'), 'url'=>array('create')),
	array('label'=>'<i class="icon-user"></i> ' .  Yii::t('dictionary','View Client'), 'url'=>array('view', 'id'=>$model->Client_ID)),
	array('label'=>'<i class="icon-edit"></i> ' . Yii::t('dictionary','Manage Clients'), 'url'=>array('admin')),
        array('label'=>'<i class="icon-edit"></i> ' .  Yii::t('dictionary','Manage Users'), 'url'=>array('/user/admin'), 'visible'=>Yii::app()->user->isVisibleForAdmins()),
        array('label'=>'<i class="icon-edit"></i> ' . Yii::t('dictionary','Manage Projects'), 'url'=>array('/project/admin'), 'visible'=>Yii::app()->user->isVisibleForSuperAdmin()),
);
?>


<?php
    $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>"Update Client " . $model->FirstName . ' ' . $model->LastName
    ));

?>  

    <?php $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endWidget(); ?>