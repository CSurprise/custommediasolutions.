<?php
class SubmissionsTable extends Doctrine_Table
{
    protected $user;
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Submissions');
    }
    
	public function getUserWebsitePermissions()
	{
		if($this->getUser()->isSuperAdmin())
		{
			return Doctrine::getTable('Websites')->getAllQuery();
		}
		$websites = Doctrine::getTable('Websites')->getAll();
		
		foreach($websites as $website)
		{
			if($this->getUser()->hasGroup('W'.$website->getId()))
			{
				$_websites_permissions[] = $website->getId();
			}
		}
		
		if(!isset($_websites_permissions))
		{
			$_websites_permissions[] = -99999999999999;
		}
		
		return Doctrine::getTable('Websites')->getByIdsQuery($_websites_permissions);
	}
	
	public function getUserStatePermissions()
	{
			if($this->getUser()->isSuperAdmin())
		{
			return Doctrine::getTable('States')->getAllQuery();
		}
		$states = Doctrine::getTable('States')->getAll();
		
		foreach($states as $state)
		{
			if($this->getUser()->hasCredential('L'.$state->getAbbreviation()))
			{
				$_states_premissions[] = $state->getId();
			}
		}
		
		if(!isset($_states_premissions))
		{
			$_states_premissions[] = -99999999999999;
		}
		
		return Doctrine::getTable('States')->getByIdsQuery($_states_premissions);
	}
	
	public function loadIndex($query)
	{
		if(!$this->getUser()->isSuperAdmin())
		{
			$websites = Doctrine::getTable('Websites');
			$states = Doctrine::getTable('States');
			
			foreach($websites->getAll() as $website)
			{
				if($this->getUser()->hasGroup('W'.$website->getId()))
				{
					$_websites_permissions[] = $website->getId();
				}
			}
			
			if(!isset($_websites_permissions))
			{
				$_websites_permissions[] = -99999999999999;
			}
			
			
			foreach($states->getAll() as $state)
			{
				if($this->getUser()->hasCredential('L'.$state->getAbbreviation()))
				{
					$_states_premissions[] = $state->getId();
				}
			}
			
			if(!isset($_states_premissions))
			{
				$_states_premissions[] = -99999999999999;
			}
			
			return $query->select('r.*,s.*,w.name')
		      ->leftJoin('r.Websites w ON w.id = r.website_id')
		      ->leftJoin('r.States s ON r.state = s.id')
		      ->whereIn('r.website_id',$_websites_permissions)
		      ->andWhereIn('r.state',$_states_premissions);
		}
		 return $query->select('r.*,s.*,w.name')
		     ->leftJoin('r.Websites w ON w.id = r.website_id')
		     ->leftJoin('r.States s ON r.state = s.id');
		 
		 
	}
	
	protected function cleanName($name)
	{
		return preg_replace('/[^A-Za-z0-9-]/','',$name);
	}
	
  /* function setUser
   * set User Object
   */
	public function setUser($user)
	{
		$this->user = $user;
	}
  /* function setUser
   * set User Object
   */
	public function getUser()
	{
		return $this->user;
	}
}