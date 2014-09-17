<?php
/* @var $this ProjectController */
/* @var $model Project */

$this->breadcrumbs=array(
	'Projects'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Project', 'url'=>array('index')),
	array('label'=>'Create Project', 'url'=>array('create')),
        array('label'=>'Manage Users', 'url'=>array('/user/admin'), 'visible'=>Yii::app()->user->isVisibleForAdmins()),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#project-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Projects</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'project-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                'Name',
                'Description',
                'Website',
		array(
                    'name'=>'Client_ID',
                    'value'=>function($data){
                        return $data->Client->getFullName();
                    },
                ),
		array(
                    'name'=>'Active',
                    'value'=>function($data){
                        return $data->getActivationOption($data->Active);
                    },
                ),
                array(
                    'name'=>'CreatedBy_User_ID',
                    'value'=>function($data){
                        return $data->CreatedBy->UserName;
                    },
                ),
                array(
                    'name'=>'UpdatedBy_User_ID',
                    'value'=>function($data){
                        return $data->UpdatedBy->UserName;
                    },
                ),
		'Date_Added',
		'Date_Modified',
		'Date_Expired',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>