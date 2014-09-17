<?php
/* @var $this CountryController */
/* @var $model Country */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'country-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
        
    <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
                'title'=>"Countries",
        ));

    ?>  
        
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'Name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ISO_short'); ?>
		<?php echo $form->textField($model,'ISO_short',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'ISO_short'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ISO_long'); ?>
		<?php echo $form->textField($model,'ISO_long',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'ISO_long'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Code'); ?>
		<?php echo $form->textField($model,'Code',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'Code'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
    <?php $this->endWidget(); ?>
<?php $this->endWidget(); ?>

</div><!-- form -->