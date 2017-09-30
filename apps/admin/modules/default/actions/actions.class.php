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
  * Executes My_account action
  *
  * @param sfRequest $request A request object
  */
  public function executeMy_account(sfWebRequest $request)
  {
   	$this->form = new MyAccountForm;
   	
   	$this->form->setDefaults(array(
   		'first_name' => $this->getUser()->getGuardUser()->getFirstName(),
   	    'last_name' => $this->getUser()->getGuardUser()->getLastName(),
   	    'email_address' => $this->getUser()->getGuardUser()->getEmailAddress(),
   	));
   	
   	if( $request->isMethod('post') && $request->hasParameter('my_account'))
   	{
   		$this->form->bind($request->getParameter('my_account'));
   		
   		if($this->form->isValid())
   		{
   			$user = $this->getUser()->getGuardUser();
   			$values = $this->form->getValues();
   			
   			$user->first_name = $values['first_name'];
   			$user->last_name = $values['last_name'];
   			$user->email_address = $values['email_address'];
   			$user->save();
   			
   			$this->getUser()->setFlash('notice','Profile Updated');
   			$this->redirect('default/my_account');
   		} else
   		{
   			$this->getUser()->setFlash('error','Please Correct the Problem');
   		}
   	}
   	

	$this->websites = Doctrine::getTable('Websites')->getAll();
	$this->states = Doctrine::getTable('States')->getAll();
   	

  }
}
