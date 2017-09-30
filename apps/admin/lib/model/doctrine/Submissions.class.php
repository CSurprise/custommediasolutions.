<?php 
/**
 * @author Ghassan Idriss
 * @website http://www.splicedmedia.com
 * @package Submissions
 */
class Submissions extends BaseSubmissions
{

	public function __toString()
	{
		return $this->getId();
	}
	/* function getFullName
	 * Returns the Submitters Full Name
	 * @return (string) - Submitters Full Name
	 */
	public function getFullName()
	{
		return $this->getFirstName().' '.$this->getLastName();
	}
	/* function getGenderNamed
	 * Returns the Gender as a Name
	 * @return (string) - Gender (Male or Female)
	 */
	public function getGenderNamed()
	{
		return $this->getGender() == 1 ? 'Male' : 'Female';
	}
	/* function getPhoneNumbers
	 * Returns either phone and/or cell as a string
	 * @return (string) - Phone Numbers
	 */
	public function getPhoneNumbers()
	{
		$phones = array();
		
		if($this->getPhone())
		{
			$phones[] = 'H: '.$this->getPhone();
		}
			if($this->getCell())
		{
			$phones[] = 'C: '.$this->getCell();
		}
		return implode(', ',$phones);
	}
	/* function getLocation
	 * Returns submitters city and/or state
	 * @return (string) - Location
	 */
	public function getLocation()
	{
		$location = array();
		
		if($this->getCity())
		{
			$location[] = $this->getCity();
		}
			if($this->getStates() && $this->getStates()->getAbbreviation())
		{
			$location[] = $this->getStates()->getAbbreviation();
		}
		return implode(', ',$location);
	}
	/* function getWebsiteName
	 * Returns the associated website name
	 * @return (string) - Website Name
	 */
	public function getWebsiteName()
	{
		return $this->getWebsites()->getName();
	}
	/* function getStats
	 * Returns the stats of the submitter
	 * @return (string) - Stats
	 */
	public function getStats()
	{
		return 
		'H: '.($this->getHeight() ? $this->getHeight() : '--')
		.' W: '.($this->getWeight() ? $this->getWeight() : '--');
	}
	/* function getSubmissionDate
	 * Returns the creation datetime
	 * @return (string) - Website Name
	 */
	public function getSubmissionDate()
	{
		return date('m/d/Y h:i a',strtotime($this->getCreatedAt()));
	}
	
	
	

}