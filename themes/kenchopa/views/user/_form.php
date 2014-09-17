<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
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
                        <?php echo $form->labelEx($model,'Client_ID'); ?>
                        <?php echo $form->dropDownList($model,'Client_ID', $this->getClientOptions()); ?>
                        <?php echo $form->error($model,'Client_ID'); ?>
                </div>

                <div class="row">
                        <?php echo $form->labelEx($model,'UserName'); ?>
                        <?php echo $form->textField($model,'UserName',array('size'=>32,'maxlength'=>32)); ?>
                        <?php echo $form->error($model,'UserName'); ?>
                </div>

                <div class="row">
                        <?php echo $form->labelEx($model,'Password'); ?>
                        <?php echo $form->passwordField($model,'Password',array('size'=>32,'maxlength'=>32)); ?>
                        <?php echo $form->error($model,'Password'); ?>
                </div>

                <div class="row">
                        <?php echo $form->labelEx($model,'Password_Repeat'); ?>
                        <?php echo $form->passwordField($model,'Password_Repeat',array('size'=>20,'maxlength'=>64)); ?>
                        <?php echo $form->error($model,'Password_Repeat'); ?>
                </div>

                <div class="row">
                        <?php echo $form->labelEx($model,'Email'); ?>
                        <?php echo $form->textField($model,'Email',array('size'=>60,'maxlength'=>256)); ?>
                        <?php echo $form->error($model,'Email'); ?>
                </div>
            </div>
                
            <div class="span6">

                <?php if(yii::app()->user->isVisibleForAdmins()): ?>
                    <div class="row">
                            <?php echo $form->labelEx($model,'Active'); ?>
                            <?php echo $form->dropDownList($model,'Active', $model->getActivationOptions()); ?>
                            <?php echo $form->error($model,'Active'); ?>
                    </div>
                <?php endif; ?>

                <?php if(Yii::app()->user->isVisibleForAdmins()): ?>
                    <div class="row">
                            <?php echo $form->labelEx($model,'Suspend'); ?>
                            <?php echo $form->dropDownList($model,'Suspend', $model->getSuspendOptions()); ?>
                            <?php echo $form->error($model,'Suspend'); ?>
                    </div>
                <?php endif; ?>

                <?php if(Yii::app()->user->isVisibleForAdmins()): ?>
                    <div class="row">
                            <?php echo $form->labelEx($model,'Level'); ?>
                            <?php echo $form->dropDownList($model,'Level', $model->getLevelOptions(yii::app()->user->getLevel())); ?>
                            <?php echo $form->error($model,'Level'); ?>
                    </div>
                <?php endif; ?>

                <?php if(yii::app()->user->isVisibleForAdmins()): ?>
                    <div class="row">
                            <?php echo $form->labelEx($model,'Projects'); ?>
                            <?php echo $form->dropDownList($model,'Projects', $model->getProjectOptions(), array('multiple'=>'multiple')); ?>
                            <?php echo $form->error($model,'Projects'); ?>
                    </div>
                <?php endif; ?>

                <div class="row buttons">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
                </div>
            </div>
        </div>
<?php $this->endWidget(); ?>

</div><!-- form -->