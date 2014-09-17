<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

  <div class="row-fluid">
	<div class="span3">
            
		<div class="sidebar-nav">
        
		  <?php $this->widget('zii.widgets.CMenu', array(
			/*'type'=>'list',*/
			'encodeLabel'=>false,
			'items'=>array(
				//array('label'=>'<i class="icon icon-home"></i>  Dashboard <span class="label label-info pull-right">BETA</span>', 'url'=>array('/site/index'),'itemOptions'=>array('class'=>'')),
				//array('label'=>'<i class="icon icon-envelope"></i> Messages <span class="badge badge-success pull-right">12</span>', 'url'=>'#'),
				// Include the operations menu
				array('label'=>'OPERATIONS','items'=>$this->menu),
			),
			));?>
		</div>
        <br>
        <!--
        <table class="table table-striped table-bordered">
          <tbody>
            <tr>
              <td width="50%">Bandwith Usage</td>
              <td>
              	<div class="progress progress-danger">
                  <div class="bar" style="width: 80%"></div>
                </div>
              </td>
            </tr>
            <tr>
              <td>Disk Space C:/</td>
              <td>
             	<div class="progress progress-warning">
                  <div class="bar" style="width: <?php echo disk_free_space("C:") / disk_total_space("C:")  * 100; ?>%"></div>
                </div>
              </td>
            </tr>
            <tr>
              <td>Conversion Rate</td>
              <td>
             	<div class="progress progress-success">
                  <div class="bar" style="width: 40%"></div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        -->
        <?php if(!Yii::app()->user->isGuest): ?>
            <div class="well">
                <?php if(Yii::app()->user->getLastLoginDate() !== null): ?>
                    <div class="well-data">
                         <div class="label">
                            Last login
                        </div>
                        <div class="text">
                            <?php echo Yii::app()->user->getLastLoginDate(); ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php if(Yii::app()->user->getModifiedDate() !== null): ?>
                    <div class="well-data">
                        <div class="label">
                            Modified User Date
                        </div>
                        <div class="text">
                            <?php echo Yii::app()->user->getModifiedDate(); ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php if(Yii::app()->user->getCreatedDate() !== null): ?>
                    <div class="well-data">
                        <div class="label">
                            Created User Date
                        </div>
                        <div class="text">
                            <?php echo Yii::app()->user->getCreatedDate(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
		
    </div><!--/span-->
    <div class="span9">
    
    <?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
            'links'=>$this->breadcrumbs,
			'homeLink'=>CHtml::link('Dashboard'),
			'htmlOptions'=>array('class'=>'breadcrumb')
        )); ?><!-- breadcrumbs -->
    <?php endif?>
    
    <!-- Include content pages -->
    <?php echo $content; ?>

	</div><!--/span-->
  </div><!--/row-->


<?php $this->endContent(); ?>