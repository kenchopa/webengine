<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </a>

              <!-- Be sure to leave the brand out there if you want it shown -->
              <a class="brand" href="#">Kenchopa <small>&times; Webengine</small></a>
            <div  id="language-selector" class="pull-right">
                 <?php 
                     $this->widget('application.components.widgets.LanguageSelector');
                 ?>
             </div>
              

              
              
              
              <div class="nav-collapse">
                    <?php $this->widget('zii.widgets.CMenu',array(
                        'htmlOptions'=>array('class'=>'nav'),
                        'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
                                                    'itemCssClass'=>'item-test',
                        'encodeLabel'=>false,
                        'items'=>array(
                            array('label'=> Yii::t('dictionary','About'), 'url'=>array('/site/page', 'view'=>'about'),'visible'=>Yii::app()->user->isGuest),
                            array('label'=> Yii::t('dictionary','Contact'), 'url'=>array('/site/contact'),'visible'=>Yii::app()->user->isGuest),
                            array('label'=> Yii::t('dictionary','Dashboard'), 'url'=>array('/site/index'),'items'=>array(
                                                array('label'=> Yii::t('dictionary','Clients'),'url'=>array('/client/admin'),'visible'=>Yii::app()->user->isVisibleForSuperAdmin()),
                                                array('label'=> Yii::t('dictionary','Users'), 'url'=>array('/user/admin'), 'visible'=>Yii::app()->user->isVisibleForAdmins()),
                                                array('label'=> Yii::t('dictionary','Projects'), 'url'=>array('/project'), 'visible'=>Yii::app()->user->isVisibleForAdmin()),
                                                array('label'=> Yii::t('dictionary','Projects'), 'url'=>array('/project/admin'), 'visible'=>Yii::app()->user->isVisibleForSuperAdmin()),
                                             ), 'visible'=>Yii::app()->user->isVisibleForAdmins()),
                            array('label'=> Yii::t('dictionary','Resources'), 'url'=>array('#'),'items'=>array(
                                                array('label'=> Yii::t('dictionary','Project Types'), 'url'=>array('/type/admin'), 'visible'=>Yii::app()->user->isVisibleForSuperAdmin()),
                                                array('label'=> Yii::t('dictionary','Countries'), 'url'=>array('/country/admin'),'visible'=>Yii::app()->user->isVisibleForSuperAdmin()),  
                                             ), 'visible'=>Yii::app()->user->isVisibleForSuperAdmin()),
                            array('label'=> Yii::t('dictionary','Structures'), 'url'=>array('#'),'items'=>array(
                                                array('label'=> Yii::t('dictionary','Graphs & Charts') , 'url'=>array('/site/page', 'view'=>'graphs')),
                                                array('label'=> Yii::t('dictionary','Forms'), 'url'=>array('/site/page', 'view'=>'forms')),
                                                array('label'=> Yii::t('dictionary','Typography'), 'url'=>array('/site/page', 'view'=>'typography')),
                                                array('label'=> Yii::t('dictionary','Tables'), 'url'=>array('/site/page', 'view'=>'tables')),
                                                array('label'=> Yii::t('dictionary','Interface'), 'url'=>array('/site/page', 'view'=>'interface')),  
                                             ), 'visible'=>Yii::app()->user->isVisibleForSuperAdmin()),
                            //array('label'=>'My Account <span class="caret"></span>', 'url'=>'#','dtemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                            //'items'=>array(
                            /*array('label'=>'My Messages <span class="badge badge-warning pull-right">26</span>', 'url'=>'#'),
                            				array('label'=>'My Tasks <span class="badge badge-important pull-right">112</span>', 'url'=>'#'),
                            				array('label'=>'My Invoices <span class="badge badge-info pull-right">12</span>', 'url'=>'#'),
                            				array('label'=>'Separated link', 'url'=>'#'),
                            				array('label'=>'One more separated link', 'url'=>'#'),
                            //)),*/
                            array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                            array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                        ),
                    )); ?>
            </div>
        </div>
    </div>
</div>

<!--<div class="subnav navbar navbar-fixed-top">
    <div class="navbar-inner">
    	<div class="container">
        	<div class="style-switcher pull-left">
                <a href="javascript:chooseStyle('none', 60)" checked="checked"><span class="style" style="background-color:#0088CC;"></span></a>
                <a href="javascript:chooseStyle('style2', 60)"><span class="style" style="background-color:#7c5706;"></span></a>
                <a href="javascript:chooseStyle('style3', 60)"><span class="style" style="background-color:#468847;"></span></a>
                <a href="javascript:chooseStyle('style4', 60)"><span class="style" style="background-color:#4e4e4e;"></span></a>
                <a href="javascript:chooseStyle('style5', 60)"><span class="style" style="background-color:#d85515;"></span></a>
                <a href="javascript:chooseStyle('style6', 60)"><span class="style" style="background-color:#a00a69;"></span></a>
                <a href="javascript:chooseStyle('style7', 60)"><span class="style" style="background-color:#a30c22;"></span></a>
          	</div>
            
                <form class="navbar-search pull-right" action="">	 
                    <input type="text" class="search-query span2" placeholder="Search">
                </form>
    	</div>
    </div>
</div>-->