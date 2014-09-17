<?php 
class ProjectWidget extends CWidget {

    public function run() 
    {
        
        /*** get project data ***/
        if(yii::app()->user->isVisibleForSuperAdmin()){
            $dataProvider=new CActiveDataProvider('Project');
            
        }else{
            $dataProvider = new CActiveDataProvider('Project', array('data'=>yii::app()->user->getProjects()));  
        }
        
        /*** render view projectwidget with the dataprovider for project ***/
        $this->render('ProjectWidget',array(
                    'dataProvider'=>$dataProvider,
            ));
    }
}

