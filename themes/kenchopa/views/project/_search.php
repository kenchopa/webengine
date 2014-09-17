<?php
/* @var $this ProjectController */
/* @var $model Project */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Project_ID'); ?>
		<?php echo $form->textField($model,'Project_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Client_ID'); ?>
		<?php echo $form->textField($model,'Client_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CreatedBy_User_ID'); ?>
		<?php echo $form->textField($model,'CreatedBy_User_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UpdatedBy_User_ID'); ?>
		<?php echo $form->textField($model,'UpdatedBy_User_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Description'); ?>
		<?php echo $form->textField($model,'Description',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Active'); ?>
		<?php echo $form->textField($model,'Active'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Website'); ?>
		<?php echo $form->textField($model,'Website',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Date_Added'); ?>
		<?php echo $form->textField($model,'Date_Added'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Date_Modified'); ?>
		<?php echo $form->textField($model,'Date_Modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Date_Expired'); ?>
		<?php echo $form->textField($model,'Date_Expired'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->