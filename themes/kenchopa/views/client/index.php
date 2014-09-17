<?php
/* @var $this ClientController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Clients',
);

$this->menu=array(
	array('label'=> '<i class="icon-plus-sign"></i> ' . Yii::t('dictionary','Create Client'), 'url'=>array('create')),
	array('label'=> '<i class="icon-edit"></i> ' . Yii::t('dictionary','Manage Clients'), 'url'=>array('admin')),
        array('label'=> '<i class="icon-edit"></i> ' . Yii::t('dictionary','Manage Users'), 'url'=>array('/user/admin'), 'visible'=>Yii::app()->user->isVisibleForAdmins()),
        array('label'=> '<i class="icon-edit"></i> ' . Yii::t('dictionary','Manage Projects'), 'url'=>array('/project/admin'), 'visible'=>Yii::app()->user->isVisibleForSuperAdmin()),
);
?>

<?php
    $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>"Clients",
    ));

?>  

    <?php $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'_view',
            'sortableAttributes'=>array(
                    'FirstName'=>'Firstname',
                    'LastName'   => "Lastname",
                    'Email'   => "Email",
                    'Company' => "Company",
                    'City'    => "City"
            ),
    )); ?>

<?php $this->endWidget(); ?>
