<?php
/* @var $this ProjectController */
/* @var $data Project */
?>

<div class="view">
    
        <h2> <?php echo CHtml::link(CHtml::encode($data->Name), array('view', 'id'=>$data->Project_ID)); ?></h2>

	<b><?php echo CHtml::encode($data->getAttributeLabel('Client_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Client->getFullName()); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<?php echo CHtml::encode($data->Name); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('Description')); ?>:</b>
	<?php echo CHtml::encode($data->Description); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('Website')); ?>:</b>
	<?php echo CHtml::encode($data->Website); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('Active')); ?>:</b>
	<?php echo CHtml::encode($data->Active); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('CreatedBy_User_ID')); ?>:</b>
	<?php echo CHtml::encode($data->CreatedBy->UserName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UpdatedBy_User_ID')); ?>:</b>
	<?php echo CHtml::encode($data->UpdatedBy->UserName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Date_Added')); ?>:</b>
	<?php echo CHtml::encode($data->Date_Added); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Date_Modified')); ?>:</b>
	<?php echo CHtml::encode($data->Date_Modified); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Date_Expired')); ?>:</b>
	<?php echo CHtml::encode($data->Date_Expired); ?>
	<br />
</div>