<?php 


class States extends BaseStates
{
	public function __toString()
	{
		return strtoupper($this->getAbbreviation());
	}
}