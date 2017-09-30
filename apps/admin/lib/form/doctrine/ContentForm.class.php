<?php 

class ContentForm extends BaseContentForm
{
	protected $websites = array();
	 /**
	  * configure Function
	  * Sets up the Form
	  */
	public function configure()
	{
		parent::setup();
		
		unset($this['created_at'],$this['updated_at']);

		$this->setWidget('published', new sfWidgetFormSelectRadio(array('choices' => $this->getPublishedChoices())));
		$this->setWidget('stylesheets', new sfWidgetFormSelect(array('choices' => $this->getLocalStylesheets(true))));
		$this->setWidget('javascripts', new sfWidgetFormSelect(array('choices' => $this->getLocalJavascripts(true))));
		$this->setWidget('layout', new sfWidgetFormSelect(array('choices' => $this->getLocalLayouts(true))));
	}
	
	 /**
	  * setWebsites
	  * Set the Websites Available
	  * @param array or doctrine_collection $websites
	  */
	public function setWebsites($websites)
	{
		$this->websites = $websites;
	}
	 /**
	  * getWebsites
	  * Get the Set Websites Available
	  */
	public function getWebsites()
	{
		return $this->websites;
	}
 /**
  * getPublishedChoices Function
  * Gets an array of chioces for Published Field
  * @return array 
  */
	public function getPublishedChoices()
	{
		return array(1=>'Published',0=>'Unpublished');
	}
 /**
  * getStylesheets Function
  * Gets all files located in the web/css folder for stylesheets field
  * @return array 
  */
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
 /**
  * getJavascripts Function
  * Gets all files located in the web/js folder for javascripts field
  * @return array 
  */
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
   /**
   * doSave Function
   */
	protected function doSave($con = null)
	{
		
 		if (null === $con)
		{
	      $con = $this->getConnection();
	    }
	    
	    $taintedValues = $this->getTaintedValues();

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

	}
	
	public function getLocalLayouts($withNULL=false)
	{
		$_dir = sfConfig::get('sf_apps_dir').'/front/templates';
		
		$handle = opendir($_dir);
		$files = array();
		
		if( $withNULL )
		{
			$files[NULL] = NULL;
		}
		
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
}