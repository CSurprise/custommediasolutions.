<?php 

class StatesForm extends BaseStatesForm
{
	public function configure()
	{
		parent::setup();
		
		unset($this['created_at'],$this['updated_at'],$this['deleted_at']);

	}
	
	protected function doSave($con = null)
	{
		
	 	if (null === $con)
		{
	      $con = $this->getConnection();
	    }
			
	    $this->updateObject();
	    
	    $this->getObject()->save($con);
	
	    // embedded forms
	    $this->saveEmbeddedForms($con);
	    
	    Doctrine::getTable('States')->setupStatePermission($this->getObject());
	    
	}
}	
