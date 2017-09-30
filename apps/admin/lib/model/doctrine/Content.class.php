<?php 

class Content extends BaseContent
{
	public function __toString()
	{
		return $this->getTitle();
	}
	/* function getPublishedNamed
	 * Returns publish status as a name
	 * @return (string) - Publish Status
	 */
	public function getPublishedNamed()
	{
		return $this->getPublished() == 1 ? 'Yes' : 'No';
	}
}