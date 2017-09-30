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
		$this->setDefault('submitters_ip',$_SERVER['REMOTE_ADDR']);
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
  public function getInterests()
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

	    if(is_array($taintedValues['interests']))
	    {
	    	$this->values['interests'] = implode(',',$taintedValues['interests']);
	    }
	    
	    $this->updateObject();
	    
	    $this->getObject()->save($con);
	
	    // embedded forms
	    $this->saveEmbeddedForms($con);


	}
}