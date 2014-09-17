<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
        
        /*************************************************
        * User Level Expressions ************************
        *************************************************
        * Allow only the super admin to do the action
        * @return boolean whether the user is super admin
        */
        public function allowOnlySuperAdmin()
        {
                return Yii::app()->user->isSuperAdmin();
        }
        
        /*
        * Allow only the admin to do the action
        * @return boolean whether the user is admin
        */
        public function allowOnlyAdmin()
        {
                return Yii::app()->user->isAdmin();
        }
        
        /*
        * Allow only the member to do the action
        * @return boolean whether the user is member
        */
        public function allowOnlyMember()
        {
            return Yii::app()->user->isMember();
        }
        
        /*
        * Allow only the admins to do the action
        * @return boolean whether the user is in the admin group
        */
        public function allowAdminRights(){ 
            return Yii::app()->user->isAdminPrivileged();
        }
}