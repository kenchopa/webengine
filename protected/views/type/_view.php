<?php
/* @var $this TypeController */
/* @var $data Type */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Type_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Type_ID), array('view', 'id'=>$data->Type_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<?php echo CHtml::encode($data->Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Description')); ?>:</b>
	<?php echo CHtml::encode($data->Description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Active')); ?>:</b>
	<?php echo CHtml::encode($data->Active); ?>
	<br />


</div>