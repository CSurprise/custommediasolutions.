<?php 

class WebsitesForm extends BaseWebsitesForm
{
	public function configure()
	{
		parent::setup();
		
		unset($this['created_at'],$this['updated_at'],$this['deleted_at']);
		
		$this->setWidget('javascripts', new sfWidgetFormSelect(array('choices' => $this->getLocalJavascripts(true))));
		$this->setWidget('stylesheets', new sfWidgetFormSelect(array('choices' => $this->getLocalStylesheets(true))));
		$this->setWidget('layout', new sfWidgetFormSelect(array('choices' => $this->getLocalLayouts())));
	}
	
	public function getLocalLayouts()
	{
		$_dir = sfConfig::get('sf_apps_dir').'/front/templates';
		
		$handle = opendir($_dir);
		
		while (false !== ($file = readdir($handle))) {
	        if($file == '.' or $file == '..' )
	        {
	        	continue;
	        }
	        $_file = explode('.',$file);
	        
	        unset($_file[(count($_file) - 1)]);
	        
	        $_file = implode('',$_file);
	        
	        $files[$_file] = $_file;
	    }
    	
	    closedir($handle);
	    return $files; 
	}
	
	public function getLocalStylesheets($withNULL = false)
	{
		
		$_dir = sfConfig::get('sf_web_dir').'/css';
		$files = array();
		
		if( $withNULL )
		{
			$files[NULL] = NULL;
		}
		
		$handle = opendir($_dir);
		
		while (false !== ($file = readdir($handle))) {
	        if($file == '.' or $file == '..' )
	        {
	        	continue;
	        }
	        $files[$file] = $file;
	    }
    	
	    closedir($handle);
	    return $files; 
	}
	
	public function getLocalJavascripts($withNULL = false)
	{
		$_dir = sfConfig::get('sf_web_dir').'/js';
		
		$files = array();
		
		if( $withNULL )
		{
			$files[NULL] = NULL;
		}
		
		$handle = opendir($_dir);
		
		while (false !== ($file = readdir($handle))) {
	        if($file == '.' or $file == '..' )
	        {
	        	continue;
	        }
	        $files[$file] = $file;
	    }
    	
	    closedir($handle);
	    return $files; 
	}
	
	protected function doSave($con = null)
	{
		
 		if (null === $con)
		{
	      $con = $this->getConnection();
	    }
	    
	    $taintedValues = $this->getTaintedValues();
	    
	    $this->values['url'] = str_replace(array('http://','/','www.'),'',$taintedValues['url']);
	    
	    foreach( $taintedValues['javascripts'] as $_js )
	    {
	    	if( ! $_js == '')
	    	{
	    		$js[] = $_js;
	    	}
	    }
		
	    foreach( $taintedValues['stylesheets'] as $_css )
	    {
	    	if( ! $_css == '')
	    	{
	    		$css[] = $_css;
	    	}
	    }
	    
	    $this->values['javascripts'] = implode(',',$js);
	    $this->values['stylesheets'] = implode(',',$css);
		
	    $this->updateObject();
	    
	    $this->getObject()->save($con);
	
	    // embedded forms
	    $this->saveEmbeddedForms($con);
	    
	    Doctrine::getTable('Websites')->setupWebsitePermission($this->getObject());
	    
	    
	}
}