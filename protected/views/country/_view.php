<?php
/* @var $this CountryController */
/* @var $data Country */
?>

<div class="view">
        
        <h2> <?php echo CHtml::link(CHtml::encode($data->Name), array('view', 'id'=>$data->Country_ID)); ?></h2>
    
	<b><?php echo CHtml::encode($data->getAttributeLabel('ISO_short')); ?>:</b>
	<?php echo CHtml::encode($data->ISO_short); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ISO_long')); ?>:</b>
	<?php echo CHtml::encode($data->ISO_long); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Code')); ?>:</b>
	<?php echo CHtml::encode($data->Code); ?>
	<br />


</div>