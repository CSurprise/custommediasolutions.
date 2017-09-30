<?php 

class BookingsForm extends BaseBookingsForm
{
	public function configure()
	{
		parent::setup();
		
		unset($this['created_at'],$this['updated_at']);
		
		$this->setWidget('published', new sfWidgetFormSelectRadio(array('choices' => $this->getPublishedChoices())));
		
		
	}
	
	public function getPublishedChoices()
	{
		return array(1=>'Published',0=>'Unpublished');
	}
	

	
}