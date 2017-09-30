<?php


class SubmissionsForm extends BaseSubmissionsForm
{
  public function configure()
  {
  	parent::setup();
  	unset($this['created_at'],$this['updated_at']);
  	
  	$this->setWidget('website_id', new sfWidgetFormInputHidden());
  	$this->setWidget('submitters_ip', new sfWidgetFormInputHidden());
  	$this->setWidget('gender', new sfWidgetFormSelectRadio(array('choices' => $this->getGenders())));
  	$this->setWidget('interests', new sfWidgetFormSelectCheckbox(array('choices' => $this->getInterests())));
  	$this->setWidget('phone', new sfWidgetFormInputPhone());
  	$this->setWidget('cell', new sfWidgetFormInputPhone());
  	
  	$this->setValidator('state',new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('States'), 'required' => true)));

  	$this->setValidator('phone', new sfValidatorPhone(array('required' => false)));
  	
  	$this->setValidator('email', new sfValidatorEmail(array('required' => true)));
  	
  	$this->setValidator('cell', new sfValidatorPhone(array('required' => false,'allow_any' => true)));  	

  	$this->validatorSchema->setPostValidator(new sfValidatorCallback(array(
      'callback' => array($this, 'checkPhones'),
    )));
    
  	if( sfConfig::get('sf_environment') === 'dev' )
  	{
  		$this->setDefault('first_name', 'Gassan');
  		$this->setDefault('last_name', 'Idriss');
  		//$this->setDefault('phone', array('817','323','7998'));
  		//$this->setDefault('cell', array('817','323','7998'));
  		$this->setDefault('email', 'ghassani@gmail.com');
  		$this->setDefault('age', 25);
  		$this->setDefault('gender', 1);
  	}
  }
  
  /* function checkPhones
   * 
   */
  public function checkPhones(sfValidatorBase $validator, array $values)
  {

  	if(strlen($values['phone']) == 0 && strlen($values['cell']) == 0)
  	{
     throw new sfValidatorErrorSchema($validator, array(
        'phone' => new sfValidatorError($validator, 'One Number is Required'),
      ));
  	}
  	return $values;
  }

  /* function getGenders
   * Gets Gender Selection Array
   */
  protected function getGenders()
  {
  	return array(1 => 'Male', 2 => 'Female');
  }

  /* function getInterests
   * Gets Interests Selection Array
   */
  protected function getInterests()
  {
  	return array(
  	  'Modeling' => 'Modeling', 
  	  'Acting' => 'Acting',
  	  'Theater' => 'Theater',
  	);
  }
 
	protected function doSave($con = null)
	{
		
 		if (null === $con)
		{
	      $con = $this->getConnection();
	    }
	    
	    $taintedValues = $this->getTaintedValues();

	    if(isset($taintedValues['interests']) && is_array($taintedValues['interests']))
	    {
	    	$this->values['interests'] = implode(',',$taintedValues['interests']);
	    }
	    
	    $this->updateObject();
	    
	    $this->getObject()->save($con);
	
	    // embedded forms
	    $this->saveEmbeddedForms($con);

	}
}
