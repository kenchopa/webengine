<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users',
);

$this->menu=array(
	array('label'=>'<i class="icon-plus-sign"></i> Create User', 'url'=>array('create')),
	array('label'=>'<i class="icon-edit"></i> Manage User', 'url'=>array('admin')),
);
?>

<?php
    $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>"Users",
    ));

?>  

    <?php $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'_view',
            'sortableAttributes'=>array(
                    'UserName'=>'Username',
                    'Level'   => "Level",
                    'Email'   => "Email",
                    'Active'  => "Active",
                    'Client_ID' => "Client",

            ),
    )); ?>

<?php $this->endWidget(); ?>