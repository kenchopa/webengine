<?php
/* @var $this ClientController */
/* @var $model Client */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'client-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
        
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        
        <div class="row-fluid">
            <div class="span6">
                <div class="row">
                        <?php echo $form->labelEx($model,'FirstName'); ?>
                        <?php echo $form->textField($model,'FirstName',array('size'=>60,'maxlength'=>64)); ?>
                        <?php echo $form->error($model,'FirstName'); ?>
                </div>

                <div class="row">
                        <?php echo $form->labelEx($model,'LastName'); ?>
                        <?php echo $form->textField($model,'LastName',array('size'=>60,'maxlength'=>64)); ?>
                        <?php echo $form->error($model,'LastName'); ?>
                </div>

                <div class="row">
                        <?php echo $form->labelEx($model,'Email'); ?>
                        <?php echo $form->textField($model,'Email',array('size'=>60,'maxlength'=>128)); ?>
                        <?php echo $form->error($model,'Email'); ?>
                </div>

                <div class="row input-prepend">
                    <?php echo $form->labelEx($model,'Telephone'); ?>
                    <span class="add-on">050</span>
                            <?php echo $form->textField($model,'Telephone',array('size'=>32,'maxlength'=>32)); ?>
                </div>
                
                <div class="row input-prepend">
                    <?php echo $form->labelEx($model,'Mobile'); ?>
                    <span class="add-on">+32</span>
                            <?php echo $form->textField($model,'Mobile',array('size'=>32,'maxlength'=>32)); ?>
                </div>
                
                <div class="row">
                        <?php echo $form->labelEx($model,'Fax'); ?>
                        <?php echo $form->textField($model,'Fax',array('size'=>32,'maxlength'=>32)); ?>
                        <?php echo $form->error($model,'Fax'); ?>
                </div>

                <div class="row">
                        <?php echo $form->labelEx($model,'Company'); ?>
                        <?php echo $form->textField($model,'Company',array('size'=>60,'maxlength'=>256)); ?>
                        <?php echo $form->error($model,'Company'); ?>
                </div>
                
                <div class="row">
                            <?php echo $form->labelEx($model,'VAT'); ?>
                            <?php echo $form->textField($model,'VAT'); ?>
                            <?php echo $form->error($model,'VAT'); ?>
                </div>
            </div>
            
            <div class="span6">
                <div class="row">
                        <?php echo $form->labelEx($model,'Country_ID'); ?>
                        <?php echo $form->dropDownList($model,'Country_ID', $this->getCountryOptions()); ?>
                        <?php echo $form->error($model,'Country_ID'); ?>
                </div>

                <div class="row">
                        <?php echo $form->labelEx($model,'Region'); ?>
                        <?php echo $form->textField($model,'Region',array('size'=>60,'maxlength'=>128)); ?>
                        <?php echo $form->error($model,'Region'); ?>
                </div>

                <div class="row">
                        <?php echo $form->labelEx($model,'City'); ?>
                        <?php echo $form->textField($model,'City',array('size'=>60,'maxlength'=>128)); ?>
                        <?php echo $form->error($model,'City'); ?>
                </div>

                <div class="row">
                        <?php echo $form->labelEx($model,'Street'); ?>
                        <?php echo $form->textField($model,'Street',array('size'=>60,'maxlength'=>256)); ?>
                        <?php echo $form->error($model,'Street'); ?>
                </div>

                <div class="row">
                        <?php echo $form->labelEx($model,'StreetNumber'); ?>
                        <?php echo $form->textField($model,'StreetNumber',array('size'=>50,'maxlength'=>50)); ?>
                        <?php echo $form->error($model,'StreetNumber'); ?>
                </div>
                
                <div class="row buttons">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
                </div>
            </div>
        </div>
<?php $this->endWidget(); ?>

</div><!-- form -->