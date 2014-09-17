<?php
/* @var $this ClientController */
/* @var $data Client */
?>

<div class="view">
        
        <h2> <?php echo CHtml::link(CHtml::encode($data->FirstName . ' ' . $data->LastName . ' - ' . $data->Company), array('view', 'id'=>$data->Client_ID)); ?></h2>

	<b><?php echo CHtml::encode($data->getAttributeLabel('FirstName')); ?>:</b>
	<?php echo CHtml::encode($data->FirstName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LastName')); ?>:</b>
	<?php echo CHtml::encode($data->LastName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Email')); ?>:</b>
	<?php echo CHtml::encode($data->Email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Telephone')); ?>:</b>
	<?php echo CHtml::encode($data->Telephone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Company')); ?>:</b>
	<?php echo CHtml::encode($data->Company); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Country_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Country->Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Region')); ?>:</b>
	<?php echo CHtml::encode($data->Region); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('City')); ?>:</b>
	<?php echo CHtml::encode($data->City); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Street')); ?>:</b>
	<?php echo CHtml::encode($data->Street); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('StreetNumber')); ?>:</b>
	<?php echo CHtml::encode($data->StreetNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fax')); ?>:</b>
	<?php echo CHtml::encode($data->Fax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Mobile')); ?>:</b>
	<?php echo CHtml::encode($data->Mobile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VAT')); ?>:</b>
	<?php echo CHtml::encode($data->VAT); ?>
	<br />
</div>