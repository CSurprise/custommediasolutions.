<?php

require_once dirname(__FILE__).'/../lib/contentGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/contentGeneratorHelper.class.php';

/**
 * content actions.
 *
 * @package    models
 * @subpackage content
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contentActions extends autoContentActions
{

	public function executeNew(sfWebRequest $request)
	{
		
		parent::executeNew($request);
		$this->form->setWebsites(Doctrine::getTable('Websites')->getAll());
	}
	
	public function executeEdit(sfWebRequest $request)
	{
		
		parent::executeEdit($request);
		$this->form->setWebsites(Doctrine::getTable('Websites')->getAll());
	}
	
	public function executeCreate(sfWebRequest $request)
	{
		
		parent::executeCreate($request);
		$this->form->setWebsites(Doctrine::getTable('Websites')->getAll());
	}
	
	public function executeUpdate(sfWebRequest $request)
	{
		
		parent::executeUpdate($request);
		$this->form->setWebsites(Doctrine::getTable('Websites')->getAll());
	}
}
