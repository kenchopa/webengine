<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'<i class="icon-th-list"></i> List User', 'url'=>array('index')),
	array('label'=>'<i class="icon-plus-sign"></i> Create User', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php
    $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>"Manage Users",
    ));

?> 

        <p>
        You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
        or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
        </p>
        
        
        <?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
        <div class="search-form" style="display:none">
            <?php
                $this->beginWidget('zii.widgets.CPortlet', array(
                        'title'=>"Advanced Search",
                ));

            ?> 
                <?php $this->renderPartial('_search',array(
                        'model'=>$model,
                )); ?>
            
            <?php $this->endWidget(); ?>
        </div><!-- search-form -->

        <?php $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'user-grid',
                'dataProvider'=>$model->search(),
                'itemsCssClass'=>'table table-striped table-bordered table-hover',
                'filter'=>$model,
                'columns'=>array(
                        'UserName',
                        'Email',
                        array(
                            'name'=>'Client_ID',
                            'value'=>function($data){
                                return $data->Client->getFullName();
                            },
                        ),
                        'IP_Adress',
                        array(
                            'name'=>'Level',
                            'value'=>function($data){
                                return $data->getLevelOption($data->Level);
                            },
                        ),
                        array(
                            'name'=>'Active',
                            'value'=>function($data){
                                return $data->getActivationOption($data->Active);
                            },
                        ),
                        array(
                            'name'=>'Suspend',
                            'value'=>function($data){
                                return $data->getSuspendOption($data->Suspend);
                            },
                        ),
                        'Last_Login_Date',

                        /*
                        'Salt',
                        'Activation_Token',
                        'Forgot_Password_Token',
                        'Active',
                        'Suspend',
                        'Failed_Logins',
                        'Failed_Login_IP',
                        'Failed_Login_Ban_Date',
                        'Last_Login_Date',
                        'Date_Added',
                        'Level',
                        */
                        array(
                                'class'=>'CButtonColumn',
                        ),
                ),
        )); ?>

<?php $this->endWidget(); ?>
