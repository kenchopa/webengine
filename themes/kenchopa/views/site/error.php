<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<div id="error-view">
    <h2 class="title-error">Error <?php echo $code; ?></h2>
    <div class="error">        
        <?php echo CHtml::encode($message); ?>
    </div>
</div>