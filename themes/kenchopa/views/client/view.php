<?php
/* @var $this ClientController */
/* @var $model Client */

$this->breadcrumbs=array(
	'Clients'=>array('index'),
	$model->FirstName . ' ' . $model->LastName,
);

$this->menu=array(
	array('label'=> '<i class="icon-th-list"></i> ' . Yii::t('dictionary','List Clients'), 'url'=>array('index')),
	array('label'=> '<i class="icon-plus-sign"></i> '. Yii::t('dictionary','Create Client'), 'url'=>array('create')),
	array('label'=> '<i class="icon-pencil"></i> ' . Yii::t('dictionary','Update Client'), 'url'=>array('update', 'id'=>$model->Client_ID)),
	array('label'=> '<i class="icon-trash"></i> '. Yii::t('dictionary','Delete Client'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Client_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=> '<i class="icon-edit"></i> ' . Yii::t('dictionary','Manage Clients'), 'url'=>array('admin')),
        array('label'=> '<i class="icon-edit"></i> ' . Yii::t('dictionary','Manage Users'), 'url'=>array('/user/admin'), 'visible'=>Yii::app()->user->isVisibleForAdmins()),
);
?>

<?php
    $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=> $model->FirstName . ' ' . $model->LastName . ' - ' . $model->Company,
    ));

?>  
        <?php $this->widget('zii.widgets.CDetailView', array(
                'data'=>$model,
                'htmlOptions'=>array('class'=>'table table-striped table-bordered table-hover'),
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

<?php $this->endWidget(); ?>
