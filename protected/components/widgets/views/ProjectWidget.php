<!--<?php if(isset($models)): ?>
<ul>
    <?php foreach($models as $model): ?>
    <li><?php echo $model->Name; ?></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>-->


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'client-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
                array(
                    'name'=>'Client_ID',
                    'value'=>function($data){
                        return $data->Client->FullName;
                    },
                ),
		'Name',
                'Description',
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
		array(
                    'class'=>'CButtonColumn',
                    'template'=>'{view} {update} {delete}',
                    'buttons'=>array(
                        'view'=>array(
                            'label'=>'View',
                            'url'=> 'Yii::app()->createUrl("project/$data->Project_ID")',
                        ),
                        'update'=>array(
                            'label'=>'Update',
                            'url'=> 'Yii::app()->createUrl("project/update/$data->Project_ID")',
                        ),
                        'delete'=>array(
                            'label'=>'delete',
                            'url'=> 'Yii::app()->createUrl("project/delete/$data->Project_ID")',
                        ),
                       
                    ),
               ),
	),
)); ?>

