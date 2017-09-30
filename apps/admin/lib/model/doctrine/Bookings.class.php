<?php 

class Bookings extends BaseBookings
{
	public function __toString()
	{
		return $this->getName();
	}
	
	public function getPublishedNamed()
	{
		return $this->getPublished() == 1 ? 'Yes' : 'No';
	}
}