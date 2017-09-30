<?php

/**
 * content actions.
 *
 * @package    models
 * @subpackage content
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contentActions extends sfActions
{
 /**
  * addJavascripts Function
  * Adds an Array of Javascripts to the Current Page Layout
  * @param array $javascripts Array of javascript filenames to be located in web/js
  */
  protected function _addJavascripts(array $javascripts)
  {
    foreach($javascripts as $javascript )
  	{
  		if( $javascript == '' )
  			continue;
  		$this->getResponse()->addJavascript($javascript);
  	}
  }
 /**
  * addStylesheets Function
  * Adds an Array of Stylesheets to the Current Page Layout
  * @param array $stylesheets Array of stylesheet filenames to be located in web/css
  */
  protected function _addStylesheets(array $stylesheets)
  {
    foreach($stylesheets as $stylesheet )
  	{
  		if( $stylesheet == '' )
  			continue;
  		$this->getResponse()->addStylesheet($stylesheet);
  	}
  }
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->redirect('@homepage');
  }
  
 /**
  * Executes view action
  *
  * @param sfRequest $request A request object
  */
  public function executeView(sfWebRequest $request)
  {
    $this->forward404Unless($request->hasParameter('id'), 'Content Not Found');
    
    $this->content = Doctrine::getTable('Content')->findOneById($request->getParameter('id'));
    
    $this->forward404Unless($this->content, 'Content Not Found');
    
    if($request->isXmlHttpRequest())
    {
    	return sfView::SUCCESS;
    }
    
    $this->website = Doctrine::getTable('Websites')->loadWebsiteByServer($_SERVER['SERVER_NAME']);
    
    $this->redirectUnless($this->website,'default/error');	
  	
  	$this->setLayout($this->website->getLayout());	
  	
  	if( $this->website->getStylesheets() && ! $this->content->getLayout() )
  	{
  		$this->_addStylesheets(explode(',',$this->website->getStylesheets()));
  	}
    
  	if( $this->website->getJavascripts() && ! $this->content->getLayout() )
  	{
		$this->_addJavascripts(explode(',',$this->website->getJavascripts()));
  	}
  	
	if( $this->content->getStylesheets() && $this->content->getLayout() )
	{
		$this->_addStylesheets(explode(',',$this->content->getStylesheets()));
	}
    
	if( $this->content->getJavascripts() && $this->content->getLayout() )
	{
	  		$this->_addJavascripts(explode(',',$this->content->getJavascripts()));
	}
	  	
	$this->getResponse()->setTitle($this->website->getName().' - '.$this->content->getPageTitle());
	  	
	if ( ! $this->getUser()->getWebsite() or $this->getUser()->getWebsite() != $this->website->getId() )
	{
		$this->getUser()->setWebsite($this->website->getId());
	}
	
  	if( $this->content->getLayout())
	{
		$this->setLayout($this->content->getLayout());	
	}
	
	  	$this->getResponse()->addMeta( 
			'description' , 
			( $this->content->getMetaDescription() ? $this->content->getMetaDescription() : sfConfig::get('app_default_meta_description')));
		$this->getResponse()->addMeta( 
			'keywords' , ( $this->content->getMetaKeywords() ? $this->content->getMetaKeywords() : sfConfig::get('app_default_meta_keywords')));
		
  }
  
 /**
  * Executes view action
  *
  * @param sfRequest $request A request object
  */
  public function executeSlug(sfWebRequest $request)
  {
    $this->forward404Unless($request->hasParameter('slug'), 'Content Not Found');

    $this->content = Doctrine::getTable('Content')->findOneByUrlSlug($request->getParameter('slug'));
    
    $this->forward404Unless($this->content, 'Content Not Found');
    
    if($request->isXmlHttpRequest())
    {
    	return sfView::SUCCESS;
    }
    
    $this->website = Doctrine::getTable('Websites')->loadWebsiteByServer($_SERVER['SERVER_NAME']);
    
    $this->redirectUnless($this->website,'default/error');	
  	
  	$this->setLayout($this->website->getLayout());	
  	
  	if( $this->website->getStylesheets() && ! $this->content->getLayout() )
  	{
  		$this->_addStylesheets(explode(',',$this->website->getStylesheets()));
  	}
    
  	if( $this->website->getJavascripts() && ! $this->content->getLayout() )
  	{
		$this->_addJavascripts(explode(',',$this->website->getJavascripts()));
  	}
  	
	if( $this->content->getStylesheets() )
	{
		$this->_addStylesheets(explode(',',$this->content->getStylesheets()));
	}
    
	if( $this->content->getJavascripts() )
	{
	  		$this->_addJavascripts(explode(',',$this->content->getJavascripts()));
	}
	  	
	$this->getResponse()->setTitle($this->website->getName().' - '.$this->content->getPageTitle());
	  	
	if ( ! $this->getUser()->getWebsite() or $this->getUser()->getWebsite() != $this->website->getId() )
	{
		$this->getUser()->setWebsite($this->website->getId());
	}
	
  	if( $this->content->getLayout())
	{
		$this->setLayout($this->content->getLayout());	
	}
  }
}
