<?php 


class sfGuardGroup extends BasesfGuardGroup
{
	public function __toString()
	{
		return $this->getName().' - '.$this->getDescription();
	}
	
}