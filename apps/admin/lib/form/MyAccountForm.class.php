<?php 

class MyAccountForm extends BaseForm
{
	public function configure()
	{
		parent::setup();
		$this->setWidgets(array(
		  'first_name' => new sfWidgetFormInput(),
		  'last_name' => new sfWidgetFormInput(),
		  'email_address' => new sfWidgetFormInput(),
		));
		
	    $this->setValidators(array(
	      'first_name' => new sfValidatorString(array('required' => true),array()),
	      'last_name' => new sfValidatorString(array('required' => true),array()),
	      'email_address'       => new sfValidatorEmail(array('required' => true)),
	    ));
    
		$this->widgetSchema->setNameFormat('my_account[%s]');
	}
}

?>