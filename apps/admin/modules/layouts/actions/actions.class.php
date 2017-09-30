<?php

/**
 * layouts actions.
 *
 * @package    models
 * @subpackage layouts
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class layoutsActions extends sfActions
{
   public function preExecute()
   {
   		$this->layout_dir = sfConfig::get('sf_apps_dir').'/front/templates';
   }
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->layouts = $this->getLocalLayouts();
    
    if( $request->isMethod('post') && $request->hasParameter('layouts'))
    {
    	$layouts = $request->getParameter('layouts');

    	foreach( $layouts as $filename => $layout)
    	{
    		$_file = $this->layout_dir.'/'.$filename;
    		if( ! file_exists($_file))
    		{
    			$this->getUser()->setFlash('error', 'Layouts Unsuccessfully Updated');
    		} else
    		{
    			if( file_put_contents($_file,$layout) )
    			{
    				$this->getUser()->setFlash('notice', 'Layouts Successfully Updated');
    			}
    		}
    	}
    	$this->redirect('layouts/index');
    }
  }
  
  protected function getLocalLayouts()
  {
 	if( ! isset($this->layout_dir) or ! file_exists($this->layout_dir))
 	{
 		$this->getUser()->setFlash('error','Directory Does Not Exist');
 	}
 	
 	$handle = opendir($this->layout_dir);
		
	while (false !== ($file = readdir($handle))) {
        if($file == '.' or $file == '..' )
        {
        	continue;
        }
        
        $files[$file] = file_get_contents($this->layout_dir.'/'.$file);
    }
    closedir($handle);
    return $files; 
  }
}
