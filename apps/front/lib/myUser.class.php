<?php

class myUser extends sfBasicSecurityUser
{

	public function getSubmissionStatus()
	{
		return $this->getAttribute('status', NULL, 'submission') ;
	}
	public function setSubmissionStatus($status)
	{
		return $this->setAttribute('status', true, 'submission') ;
	}
	
	public function getWebsite()
	{
		return $this->getAttribute('website', NULL, 'submission') ;
	}
	public function setWebsite($id)
	{
		return $this->setAttribute('website', $id, 'submission') ;
	}
}
