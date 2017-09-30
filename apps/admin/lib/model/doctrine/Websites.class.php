<?php 

class Websites extends BaseWebsites{
	
	public function __toString()
	{
		return $this->getName();
	}
	
	public function getUrlAsReal()
	{
		return 'http://www.'.$this->getUrl();
	}
	
	public function getContentTitle()
	{
		return $this->getContent()->getTitle();
	}
}