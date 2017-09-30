   
<?php 

class ConfigForm extends BaseFormDoctrine
{
	public function getModelName()
	{
		return 'Websites';
	}
	
	public function configure()
	{
		parent::setup();
		$this->setWidgets(array(
		  'admin_title' => new sfWidgetFormInput(),
		  'submission_email_to' => new sfWidgetFormInput(),
		  'submission_email_from' => new sfWidgetFormInput(),
		  'mail_settings_host' => new sfWidgetFormInput(),
		  'mail_settings_port' => new sfWidgetFormInput(),
		  'mail_settings_encryption' => new sfWidgetFormSelectRadio(array('choices' => array('NULL' => 'No', 1 => 'Yes'))),
		  'mail_settings_username' => new sfWidgetFormInput(),
		  'mail_settings_password' => new sfWidgetFormInput(),
		  'fallback_content_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Content'), 'add_empty' => true)),
		  'default_meta_description' => new sfWidgetFormTextarea(),
		  'default_meta_keywords' => new sfWidgetFormTextarea(),
		  'timezone' => new sfWidgetFormSelect(array('choices' => $this->getTimezones())),
		  'admin_domain' => new sfWidgetFormInput(),
		));
		
	    $this->setValidators(array(
		  'admin_title' => new sfValidatorString(array('required' => true),array()),
		  'submission_email_to' => new sfValidatorEmail(array('required' => true),array()),
	      'submission_email_from' => new sfValidatorEmail(array('required' => true),array()),
		  'mail_settings_host' => new sfValidatorString(array('required' => true),array()),
		  'mail_settings_port' => new sfValidatorString(array('required' => true),array()),
		  'mail_settings_encryption' => new sfValidatorString(array('required' => false),array()),
		  'mail_settings_username' => new sfValidatorString(array('required' => true),array()),
		  'mail_settings_password' => new sfValidatorString(array('required' => true),array()),
		  'fallback_content_id' => new sfValidatorString(array('required' => true),array()),
		  'default_meta_description' => new sfValidatorString(array('required' => false),array()),
		  'default_meta_keywords' => new sfValidatorString(array('required' => false),array()),
	      'timezone' => new sfValidatorString(array('required' => true),array()),
	      'admin_domain' => new sfValidatorString(array('required' => false),array()),
	    ));
    	
	    $this->disableLocalCSRFProtection();
		$this->widgetSchema->setNameFormat('config[%s]');
	}
	
	
	protected function getTimezones()
	{
		return array(
		'US/Eastern' => 'Eastern Time',
		'US/Central' => 'Central Time',
		'US/Mountain' => 'Mountain Time',
		'US/Pacific' => 'Pacitific Time');
	}

}