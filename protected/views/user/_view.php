<?php
/* @var $this UserController */
/* @var $data User */
?>


<div class="view">
    <div class="view_list">
            <h2> <?php echo CHtml::link(CHtml::encode($data->UserName), array('view', 'id'=>$data->User_ID)); ?></h2>
            
            <div class="view_list_item">
                <b><?php echo CHtml::encode($data->getAttributeLabel('Level')); ?>:</b>
                <?php echo CHtml::encode($data->getLevelOption($data->Level)); ?>
                <br />
            </div>
        
            <div class="view_list_item">
                <b><?php echo CHtml::encode($data->getAttributeLabel('UserName')); ?>:</b>
                <?php echo CHtml::encode($data->UserName); ?>
                <br />
            </div>

            <div class="view_list_item">
                <b><?php echo CHtml::encode($data->getAttributeLabel('Email')); ?>:</b>
                <?php echo CHtml::encode($data->Email); ?>
                <br />
            </div>
            
            <div class="view_list_item">
                <b><?php echo CHtml::encode($data->getAttributeLabel('Client_ID')); ?>:</b>
                <?php echo CHtml::encode($data->Client->getFullName()); ?>
                <br />
            </div>
        
            <div class="view_list_item">
                <b><?php echo CHtml::encode($data->getAttributeLabel('IP_Adress')); ?>:</b>
                <?php echo CHtml::encode($data->IP_Adress); ?>
                <br />
            </div>
            
            <div class="view_list_item">
                <b><?php echo CHtml::encode($data->getAttributeLabel('Active')); ?>:</b>
                <?php echo CHtml::encode($data->getActivationOption($data->Active)); ?>
                <br />
            </div>
            
            <div class="view_list_item">
                <b><?php echo CHtml::encode($data->getAttributeLabel('Suspend')); ?>:</b>
                <?php echo CHtml::encode($data->getSuspendOption($data->Suspend)); ?>
                <br />
            </div>
            
    </div>
</div>