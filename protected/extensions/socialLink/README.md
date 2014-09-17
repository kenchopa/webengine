socialLink
==========

Yii extension for all top social media links like - facebook, twitter, linkedin etc. with left &amp; right alignment.


Requirements
============

Tested with Yii 1.1.14


Installation
============

- Download the latest release package
- Unpack it in /protected/extensions/ folder


Usage
=====

Paste the code into your main.php page or also you can use this code as per your requirement.

~~~
$this->widget('application.extensions.socialLink.socialLink', array(
    'style'=>'left', //alignment - left, right
	'top'=>'30',  //in percentage
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
~~~


Download
========

https://github.com/rohitsuthar/socialLink



Usual parameters to be adjusted
===============================

- style: social link sidebar alignment (string: left or right).
- top: the sidebar margin from top (in percentage: **30**)
- social media: social network which you must have (facebook, twitter, googleplus, linkedin, rss );
- url: Your social media profile page link (url: http://www.facebook.com/fb_page)
- target: click behaviour (target: **_blank**, _self, _parent)
