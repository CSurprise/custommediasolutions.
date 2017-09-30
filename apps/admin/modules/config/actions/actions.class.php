<?php

/**
 * config actions.
 *
 * @package    models
 * @subpackage config
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class configActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->form = new ConfigForm;
    
    if($request->isMethod('post') && $request->hasParameter('config'))
    {
    	$this->form->bind($request->getParameter('config'));
    	
    	if($this->form->isValid())
    	{
    		
    		$_config['all'] = $this->form->getValues();
    		$_config = sfYaml::dump($_config);
    		
    		file_put_contents(sfConfig::get('sf_apps_dir').'/admin/config/app.yml', $_config);
    		file_put_contents(sfConfig::get('sf_apps_dir').'/front/config/app.yml', $_config);
		    
    		chdir(sfConfig::get('sf_root_dir'));
		    
		  	$task = new sfCacheClearTask($this->getContext()->getInstance()->getEventDispatcher(), new sfFormatter());
		         
		  	$task->run(array(), array());
    		
		  	$this->getUser()->setFlash('notice','Application Configuration Updated');
		  	$this->redirect('config/index');
    	} else
    	{
    		$this->getUser()->setFlash('error','Please Correct the Form to Save the Configuration');
    	}
    	
    } else
    {
	    $appConfig = sfYaml::load(sfConfig::get('sf_app_config_dir').'/app.yml');
	    
	    $this->form->bind($appConfig['all']);
    }
  }
 /**
  * 
  *
  * @param sfRequest $request A request object
  */
  public function executeRebuild_permissions(sfWebRequest $request)
  {
  	$this->websites = Doctrine::getTable('Websites')->getAll();
  	$this->states = Doctrine::getTable('States')->getAll();
  	
  	Doctrine_Query::create()->delete()->from('sfGuardPermission p')->where('p.description != ?','Core Permission')->execute();
  	Doctrine_Query::create()->delete()->from('sfGuardGroup g')->where('g.description != ?','Core Group')->execute();
  	
  	foreach($this->websites as $website )
  	{
		$permission = new sfGuardGroup;
		$permission->created_at = date('Y-m-d H:i:s');
		$permission->updated_at = date('Y-m-d H:i:s');
		$permission->name = $this->cleanName('W'.$website->getId());
		$permission->description = 'Website Submission Access for '.$website->getName().' http://www.'.$website->getUrl();
		$permission->save();
  	}
    
  	foreach($this->states as $state )
  	{
		$permission = new sfGuardPermission;
		$permission->created_at = date('Y-m-d H:i:s');
		$permission->updated_at = date('Y-m-d H:i:s');
		$permission->name = $this->cleanName('L'.$state->getAbbreviation());
		$permission->description = 'Location Access Permission for '.$state->getState();
		$permission->save();
  	}
  	
  	$this->getUser()->setFlash('notice','Permission List Successfully Rebuilt');
  	$this->redirect('config/index');
  }
 /**
  * 
  *
  * @param sfRequest $request A request object
  */
  public function executeClear_cache(sfWebRequest $request)
  {
     chdir(sfConfig::get('sf_root_dir'));
    
  	 $task = new sfCacheClearTask($this->getContext()->getInstance()->getEventDispatcher(), new sfFormatter());
         
  	 $task->run(array(), array());
  	 
  	 $this->getUser()->setFlash('notice', 'Cache Cleared Successfully');
  	 $this->redirect('config/index');
  }
 /**
  * 
  *
  * @param sfRequest $request A request object
  */
  public function executeImport(sfWebRequest $request)
  {
  	set_time_limit(0);
  	$imported = Doctrine::getTable('SubmissionsImported')->createQuery('s')->execute();
  	
  	foreach($imported as $import)
  	{
  		$_interests = array(
  			$import->getModeling() == 1 ? 'Modeling' : '',
  			$import->getActing() == 1 ? 'Acting' : '',
  			$import->getTheater() == 1 ? 'Theater' : '',
  		);
  		
  		foreach($_interests as $_i)
  		{
  			if( $_i != '')
  			{
  				$interests[] = $_i;
  			}
  		}
  		  		
  		$submission = new Submissions;
  		$submission->website_id = 1;
  		$submission->created_at = date('Y-m-d H:i:s',strtotime($import->getDate()));
  		$submission->updated_at = date('Y-m-d H:i:s',strtotime($import->getDate()));
  		$submission->first_name = $import->getFname();
  		$submission->last_name  = $import->getLname();
  		$submission->age 	= $import->getAge();
  		$submission->gender 	= $import->getGender() == 'm' ? 1 : 0;
  		$submission->phone 	= $import->getPhone();
  		$submission->cell 	= $import->getCellphone();
  		$submission->height 	= $import->getHeight();
  		$submission->weight 	= $import->getWeight();
  		$submission->email 	= $import->getEmail();
  		$submission->address 	= $import->getAddress();
  		$submission->city 	= $import->getCity();
  		$submission->state 	= $import->getState();
  		$submission->zipcode 	= $import->getZipcode();
  		$submission->interests 	= implode(',',$interests);
  		$submission->submitters_ip 	= '';
  		$submission->comments= $import->getComments();
  		try{
  			$submission->save();
  		} catch(Exception $e)
  		{
  			echo $e->getMessage()."\n";
  		}
  		unset($interests);
  	}
  }
  
  protected function cleanName($name)
  {
	return preg_replace('/[^A-Za-z0-9-]/','',$name);
  }
  
 
}
