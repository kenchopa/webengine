<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->UserName,
);

$this->menu=array(
	array('label'=>'<i class="icon-th-list"></i> List User', 'url'=>array('index')),
	array('label'=>'<i class="icon-plus-sign"></i> Create User', 'url'=>array('create')),
	array('label'=>'<i class="icon-pencil"></i> Update User', 'url'=>array('update', 'id'=>$model->User_ID)),
	array('label'=>'<i class="icon-trash"></i> Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->User_ID),'confirm'=>'Are you sure you want to delete this item?'),'csrf'=>true),
	array('label'=>'<i class="icon-edit"></i> Manage User', 'url'=>array('admin')),
);
?>

<?php
    $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>"View User " . $model->UserName,
    ));

?>  
    <?php $this->widget('zii.widgets.CDetailView', array(
            'data'=>$model,
            'htmlOptions'=>array('class'=>'table table-striped table-bordered table-hover'),
            'attributes'=>array(
                    array(
                          'name'=>'Client_ID',                 
                          'value' => CHtml::encode($model->Client->FirstName . ' ' . $model->Client->LastName),
                    ),
                    'UserName',
                    'Email',
                    'IP_Adress',
                    array(
                          'name'=>'Active',                 
                          'value' => CHtml::encode($model->getActivationOption($model->Active)),
                    ),
                    array(
                          'name'=>'Suspend',                 
                          'value' => CHtml::encode($model->getSuspendOption($model->Suspend)),
                    ),
                    array(
                          'name'=>'Level',                 
                          'value' => CHtml::encode($model->getLevelOption($model->Level)),
                    ),
            ),
    )); ?>
<?php $this->endWidget(); ?>
