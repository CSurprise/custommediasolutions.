<?php

/**
 * default actions.
 *
 * @package    models
 * @subpackage default
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class defaultActions extends sfActions
{
  /*function preExecute
   * 
   */
  public function preExecute()
  {
  
  }
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

  	if( str_replace(array('http://','https://','www.'),'',$_SERVER['SERVER_NAME']) == sfConfig::get('app_admin_domain'))
  	{
  		$this->redirect('http://www.'.sfConfig::get('app_admin_domain').'/admin.php');
  	}
    
  	$this->website = Doctrine::getTable('Websites')->loadWebsiteByServerWithContent($_SERVER['SERVER_NAME']);
    
    $this->redirectUnless($this->website,'default/error');	
  	
  	$this->setLayout($this->website->getLayout());	
  	
  	if( $this->website->getStylesheets() && ! ($this->website->getContent() && $this->website->getContent()->getLayout()) )
  	{
  		$this->_addStylesheets(explode(',',$this->website->getStylesheets()));
  	}
    
  	if( $this->website->getJavascripts() && ! ($this->website->getContent() && $this->website->getContent()->getLayout()) )
  	{
		$this->_addJavascripts(explode(',',$this->website->getJavascripts()));
  	}
  	
  	if( $this->website->getContent() )
  	{
  	  	if( $this->website->getContent()->getLayout() )
  	  	{
  	  		$this->setLayout($this->website->getContent()->getLayout());
  	  	}
  	  	
  	  	if( $this->website->getContent()->getStylesheets() && $this->website->getContent()->getLayout() )
	  	{
	  		$this->_addStylesheets(explode(',',$this->website->getContent()->getStylesheets()));
	  	}
    
	  	if( $this->website->getContent()->getJavascripts() && $this->website->getContent()->getLayout() )
	  	{
	  		$this->_addJavascripts(explode(',',$this->website->getContent()->getJavascripts()));
	  	}
	  	
	  	$this->getResponse()->setTitle($this->website->getName().' - '.$this->website->getContent()->getPageTitle());
	  	
	  	if ( ! $this->getUser()->getWebsite() or $this->getUser()->getWebsite() != $this->website->getId() )
	  	{
	  		$this->getUser()->setWebsite($this->website->getId());
	  	}  	
	  	
	  	$this->getResponse()->addMeta( 
			'description' , 
			( $this->website->getContent()->getMetaDescription() ? $this->website->getContent()->getMetaDescription() : sfConfig::get('app_default_meta_description')));
		$this->getResponse()->addMeta( 
			'keywords' , ( $this->website->getContent()->getMetaKeywords() ? $this->website->getContent()->getMetaKeywords() : sfConfig::get('app_default_meta_keywords')));
			
  	}

  	
  	return sfView::SUCCESS;
  }
 /**
  * Executes submission action
  *
  * @param sfRequest $request A request object
  */
  public function executeSubmission(sfWebRequest $request)
  {
  	
  	
    $this->website = Doctrine::getTable('Websites')->loadWebsiteByServer($_SERVER['SERVER_NAME']);
    
    $this->redirectUnless($this->website,'default/error');	
    
    $this->form = new SubmissionsForm();
    
  	$this->form->bind($request->getParameter('submissions'));
  	if($this->form->isValid())
  	{
  		try{
  			$submission = $this->form->save();
  		} catch(Exception $e)
  		{
  			$this->getUser()->setFlash('error','An error was encountered. Please contact system administrator.');
  			$this->redirect('@homepage');
  		}
  		
  		//$this->getUser()->setFlash('notice','Thank You For Your Submission. We will be contacting you shortly.');
  		$this->getUser()->setSubmissionStatus(true);
  		$this->sendNotification($submission);
  		$this->redirect('thank-you/'.$this->website->getRedirectAfterSubmission());
  	} else
  	{
  		$this->setTemplate('index');
  		$this->getUser()->setFlash('error','Please Correct Your Submission.');
  		$this->getUser()->setSubmissionStatus(false);
  		return $this->executeIndex($request);
  	}
  }
  
 /**
  * Executes complete action
  *
  * @param sfRequest $request A request object
  */
  public function executeComplete(sfWebRequest $request)
  {
    return sfView::SUCCESS;  	
  }
 /**
  * Executes error action
  *
  * @param sfRequest $request A request object
  */
  public function executeError(sfWebRequest $request)
  {
    return sfView::SUCCESS;  	
  }
  
 /**
  * 
  *
  * @param sfRequest $request A request object
  */
  protected function sendNotification(Submissions $submission)
  {

    $message = $this->getMailer()->compose()
      ->setSubject('New Submission for '.$this->website->getName())
      ->setTo(sfConfig::get('app_submission_email_to'))
      ->setFrom(sfConfig::get('app_submission_email_from'))
      ->setBody($this->getPartial('default/email_template',array('submission'=>$submission, 'website' => $this->website)), 'text/html');
    
    $this->getMailer()->send($message);
  }
}
