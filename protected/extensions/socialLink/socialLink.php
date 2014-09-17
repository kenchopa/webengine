<?php
/**
 *socialLink.php
 *
 * @author Rohit Suthar <rohit.suthar@gmail.com>
 * @copyright 2014 Rohit Suthar
 * @package socialLink
 * @version 1.0
 */
 
 // Thanks to Font Awesome

class socialLink extends CInputWidget
{

	/**
	 * @var string box alignment - left, right
	 */
	public $style='left';
	
	
	/**
	 * @var int the sidebar margin from top in percentage (%)
	 */
	public $top='40';
	
	
	/**
	 * @var array available social media links 
	 */
	
	public $media = array(
		'facebook'=>array(
			'url'=>'http://facebook.com/',  //http://www.facebook.com/fb_page
			'target'=>'_blank',  //_self _target
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
	);


	/**
	 * The extension initialisation
	 *
	 * @return nothing
	 */

	public function init()
	{
		self::registerFiles();
		self::rendersocialLink();
	}


	/**
	 * Register assets file
	 *
	 * @return nothing
	 */
	private function registerFiles()
	{
		$assets = dirname(__FILE__).'/assets';
		$baseUrl = Yii::app()->assetManager->publish($assets);

		if(is_dir($assets)){
			Yii::app()->clientScript->registerCssFile($baseUrl . '/socialLink.css');
		}else
			throw new Exception(Yii::t('socialLink - Error: Couldn\'t find assets folder to publish.'));
			
		Yii::app()->clientScript->registerCssFile('http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css');		
			
	}
	

	/**
	 * Render socialLink extension
	 *
	 * @return nothing <i class="icon icon-google-plus"></i>
	 */
	
	private function rendersocialLink(){
		$rendered = '';
		foreach($this->media as $media => $params)
			$rendered .= CHtml::link('', $params['url'], array('class' => 'icon-'.$media, 'target'=>$params['target']));
		echo $this->render('socialLink', array('rendered'=>$rendered));
	}
}

?>