
<!DOCTYPE html>
<html lang="<?php echo Yii::app()->language; ?>">
  <head>
    <meta charset="utf-8">
    <?php if (!Yii::app()->user->isGuest) {?>
                <meta http-equiv="refresh" content="<?php echo Yii::app()->params['session_timeout'];?>;"/>
    <?php }?>
    <title>Kenchopa ~ Intelligence Matters ~</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="webengine">
    <meta name="author" content="kengy">
    <link href='http://fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
        <?php
          $baseUrl = Yii::app()->theme->baseUrl; 
          $cs = Yii::app()->getClientScript();
          Yii::app()->clientScript->registerCoreScript('jquery');
        ?>
    <!-- Fav and Touch and touch icons -->
    <link rel="shortcut icon" href="<?php echo $baseUrl;?>/img/icons/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $baseUrl;?>/img/icons/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $baseUrl;?>/img/icons/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo $baseUrl;?>/img/icons/apple-touch-icon-57-precomposed.png">
	<?php  
          //Yii::app()->sass->register(Yii::getPathOfAlias('application.assets.sass') . '/combined.scss');
          $cs->registerCssFile($baseUrl.'/css/bootstrap.min.css');
	  $cs->registerCssFile($baseUrl.'/css/bootstrap-responsive.min.css');
	  $cs->registerCssFile($baseUrl.'/css/kenchopa.css');
	  $cs->registerCssFile($baseUrl.'/css/style-colorsheme.css');
	?>
    
    <!-- styles for style switcher -->
    <!--<link rel="alternate stylesheet" type="text/css" media="screen" title="style2" href="<?php echo $baseUrl;?>/css/style-brown.css" />
    <link rel="alternate stylesheet" type="text/css" media="screen" title="style3" href="<?php echo $baseUrl;?>/css/style-green.css" />
    <link rel="alternate stylesheet" type="text/css" media="screen" title="style4" href="<?php echo $baseUrl;?>/css/style-grey.css" />
    <link rel="alternate stylesheet" type="text/css" media="screen" title="style5" href="<?php echo $baseUrl;?>/css/style-orange.css" />
    <link rel="alternate stylesheet" type="text/css" media="screen" title="style6" href="<?php echo $baseUrl;?>/css/style-purple.css" />
    <link rel="alternate stylesheet" type="text/css" media="screen" title="style7" href="<?php echo $baseUrl;?>/css/style-red.css" />-->
	<?php
	  $cs->registerScriptFile($baseUrl.'/js/bootstrap.min.js');
	  $cs->registerScriptFile($baseUrl.'/js/plugins/jquery.sparkline.js');
	  $cs->registerScriptFile($baseUrl.'/js/plugins/jquery.flot.min.js');
	  $cs->registerScriptFile($baseUrl.'/js/plugins/jquery.flot.pie.min.js');
	  $cs->registerScriptFile($baseUrl.'/js/charts.js');
	  $cs->registerScriptFile($baseUrl.'/js/plugins/jquery.knob.js');
	  $cs->registerScriptFile($baseUrl.'/js/plugins/jquery.masonry.min.js');
	  $cs->registerScriptFile($baseUrl.'/js/styleswitcher.js');
          $cs->registerScriptFile($baseUrl.'/js/jquery_config.js');
	?>
    </head>
    <body>
        <?php
        /*
            $this->widget('application.extensions.socialLink.socialLink', array(
    'style'=>'right', //alignment - left, right
    'top'=>'75',  //in percentage
        'media' => array(
        'facebook'=>array(
            'url'=>'http://facebook.com/',
            'target'=>'_blank',
        ),
        'twitter'=>array(
            'url'=>'http://twitter.com/',
            'target'=>'_blank',
        ),
        'google-plus'=>array(
            'url'=>'https://plus.google.com/',
            'target'=>'_blank',
        ),
        'linkedin'=>array(
            'url'=>'http://linkedin.com/',
            'target'=>'_blank',
        ),
        'rss'=>array(
            'url'=>'http://rss.com/',
            'target'=>'_blank',
        ), 
      )
));
         * */
        ?>
        
        <section id="navigation-main">   
            <!-- Require the navigation -->
            <?php require_once('tpl_navigation.php')?>
        </section><!-- /#navigation-main -->
        
        
        
        <section class="main-body">
            <div class="container-fluid">
                <!-- Include content pages -->
                <?php echo $content; ?>
            </div>
        </section>

        <!-- Require the footer -->
        <?php require_once('tpl_footer.php')?>
  </body>
</html>