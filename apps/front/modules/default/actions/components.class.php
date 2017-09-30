<?php

class defaultComponents extends sfComponents
{
	public function executeForm(sfWebRequest $request)
	{
		$this->form = new SubmissionsForm();
		
		if( $request->hasParameter('submissions'))
		{
			$this->form->bind($request->getParameter('submissions'));
		}

		$this->form->setDefault('website_id', $this->getUser()->getWebsite());
		$this->form->setDefault('submitters_ip',$_SERVER['REMOTE_ADDR']);
	}
	
	public function executeBookings(sfWebRequest $request)
	{
		$this->bookings = Doctrine::getTable('Bookings')->getPublished();
	}
}
