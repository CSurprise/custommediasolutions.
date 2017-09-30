<?php 

class States extends BaseStates
{
	public function __toString()
	{
		return $this->getAbbreviation().' - '.$this->getState();
	}
}