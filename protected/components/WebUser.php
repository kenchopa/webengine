<?php

// this file must be stored in:
// protected/components/WebUser.php
 
class WebUser extends CWebUser
{
    private $_model;
    
    // Load user model
    private function getUserModel() {
        if($this->_model===null)
        {
            if($this->id!==null)
            $this->_model=User::model()->findByPk($this->id);
        }
        return $this->_model;
    }
    
    protected function afterLogin($fromCookie)
    {
        $this->updateUserDataOnLoginSuccess($fromCookie);
        return parent::afterLogin($fromCookie);
    }

    private function updateUserDataOnLoginSuccess($fromCookie)
    {
        $user = $this->getUserModel();
        $attributes = array('Current_Login_Date' => date("Y-m-d H:i:s", time()),'Last_Login_Date' => $user->Current_Login_Date);
        User::model()->updateByPk($this->id, $attributes);
    }
    
    /*
     * Check Roles
     */
    public function isSuperAdmin()
    {
        return ($this->getLevel()== User::LEVEL_SUPERADMIN ? true : false);
    }
    
    public function isAdmin()
    {
        return ($this->getLevel() == User::LEVEL_ADMIN ? true : false);
    }
    
    public function isMember()
    {
        return ($this->getLevel() == User::LEVEL_MEMBER ? true : false);
    }
    
    public function isAdminPrivileged(){
        return ($this->isSuperAdmin() || $this->isAdmin() ? true : false);
    }
    
    public function isVisibleForSuperAdmin(){
        if(!Yii::app()->user->isGuest)
        {
            if($this->isSuperAdmin()){
                return true;
            }
        }
        
        return false;    
    }
    
    public function isVisibleForAdmin()
    {
        if(!Yii::app()->user->isGuest)
        {
            if($this->isAdmin()){
                return true;
            }
        }
        
        return false;    
    }
    
    public function isVisibleForAdmins(){
        if(!Yii::app()->user->isGuest)
        {
            if($this->isAdminPrivileged()){
                return true;
            }
        }
        
        return false;    
    }
        
    /*
     * Date information
     */
    public function getLastloginDate()
    {
        return ($this->getUserModel()->Last_Login_Date);
    }
    
    public function getCurrentLoginDate()
    {
        return ($this->getUserModel()->Current_Login_Date);
    }
    
    public function getCreatedDate()
    {
        return ($this->getUserModel()->Date_Added);
    }
    
    public function getModifiedDate()
    {
        return ($this->getUserModel()->Date_Modified);
    }
    
    public function getLevel()
    {
        return ($this->getUserModel()->Level);
    }
    
    public function getLevelOptions()
    {
        return ($this->getUserModel()->getLevelOptions());
    }
    
    public function getClientID()
    {
        return ($this->getUserModel()->Client_ID);
    }
    
    public function getUserID()
    {
        return ($this->id);
    }
    
    public function getProjects(){
        return ($this->getUserModel()->Projects);
    }
    
    /* get acceslevels by type 
     * type null => array with key and value string notation
     * type string => accesslevels in string notation for criteria   
     */
    public function getAccessLevels($type = null)
    {  
       $accessLevels = $this->getUserModel()->getLevelOptions(Yii::app()->user->getLevel());
       if($type === 'string' ){
            $result = '';
            $i = 0;
            foreach (array_keys($accessLevels) as $key){
                $result .= $key;
                if ($i !== count($accessLevels) - 1) {
                    $result .= ', ';
                }
                $i++;
                
            }
            return $result;
       }
       
       return $accessLevels;
    }
 
}
?>
