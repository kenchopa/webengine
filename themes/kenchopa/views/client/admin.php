<?php
/* @var $this ClientController */
/* @var $model Client */

$this->breadcrumbs=array(
	'Clients'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=> '<i class="icon-th-list"></i> ' . Yii::t('dictionary','List Clients'), 'url'=>array('index')),
	array('label'=> '<i class="icon-plus-sign"></i> '. Yii::t('dictionary','Create Client'), 'url'=>array('create')),
        array('label'=> '<i class="icon-edit"></i> ' . Yii::t('dictionary','Manage Users'), 'url'=>array('/user/admin'), 'visible'=>Yii::app()->user->isVisibleForAdmins()),
        array('label'=> '<i class="icon-edit"></i> ' . Yii::t('dictionary','Manage Projects'), 'url'=>array('/project/admin'), 'visible'=>Yii::app()->user->isVisibleForSuperAdmin()),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#client-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php
    $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>"Manage Clients",
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
            'id'=>'client-grid',
            'dataProvider'=>$model->search(),
            'itemsCssClass'=>'table table-striped table-bordered table-hover',
            'filter'=>$model,
            'columns'=>array(
                    'FirstName',
                    'LastName',
                    'Email',
                    'Telephone',
                    'Company',
                    array(
                        'name'=>'Country_ID',
                        'value'=>function($data){
                            return $data->Country->Name;
                        },
                    ),
                    'Region',
                    'City',
                    'Street',
                    'StreetNumber',
                    'Fax',
                    'Mobile',
                    'VAT',
                    array(
                            'class'=>'CButtonColumn',
                    ),
            ),
    )); ?>

<?php $this->endWidget(); ?>