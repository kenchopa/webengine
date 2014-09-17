<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
<div class="page-header">
        <h1><?php echo Yii::t('dictionary','Login') ?> <small><?php echo Yii::t('dictionary','to your account') ?></small></h1>
</div>
<div class="row-fluid">
	
    <div class="span6 offset3">
    <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                    'title'=> Yii::t('dictionary','Private access'),
            ));

    ?>

        <p><?php echo Yii::t('dictionary','Please fill out the following form with your login credentials'); ?>:</p>

        <div class="form">
            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'login-form',
                'enableClientValidation'=>true,
                'clientOptions'=>array(
                    'validateOnSubmit'=>true,
                ),
            )); ?>

                <p class="note"><?php echo Yii::t('dictionary','Field with a') ?> <span class="required">*</span> <?php echo Yii::t('dictionary','are required') ?></p>

                <div class="row">
                    <?php echo $form->labelEx($model,'username'); ?>
                    <?php echo $form->textField($model,'username'); ?>
                    <?php echo $form->error($model,'username'); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model,'password'); ?>
                    <?php echo $form->passwordField($model,'password'); ?>
                    <?php echo $form->error($model,'password'); ?>
                    <p class="hint">
                        <?php echo Yii::t('dictionary','Hint: You may login with') ?> <kbd>admin</kbd>/<kbd>azerty123</kbd>.
                    </p>
                </div>

                <div class="row rememberMe">
                    <?php echo $form->checkBox($model,'rememberMe'); ?>
                    <?php echo $form->label($model,'rememberMe'); ?>
                    <?php echo $form->error($model,'rememberMe'); ?>
                </div>

                <div class="row buttons">
                    <?php echo CHtml::submitButton('Login',array('class'=>'btn btn btn-primary')); ?>
                </div>

             <?php $this->endWidget(); ?>
        </div><!-- form -->

    <?php $this->endWidget();?>

    </div>

</div>