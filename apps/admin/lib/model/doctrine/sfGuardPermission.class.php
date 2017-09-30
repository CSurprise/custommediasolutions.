<?php 


class sfGuardPermission extends BasesfGuardPermission
{
	public function __toString()
	{
		return $this->getName().' - '.$this->getDescription();
	}
	
}