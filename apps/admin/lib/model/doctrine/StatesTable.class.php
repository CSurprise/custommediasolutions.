<?php 

class StatesTable extends Doctrine_Table
{
    public static function getInstance()
    {
        return Doctrine_Core::getTable('States');
    }
    
	public function loadIndex($query)
	{
		return $query->select('r.*')
		 ->where('r.deleted_at IS NULL');
	}
	public function getAll()
	{
		return $this->createQuery('s')
		 ->select('s.*')
		 ->execute();
	}
	
	public function getAllQuery()
	{
		return $this->createQuery('s')
		 ->select('s.*');
	}
	
	public function setupStatePermission(States $state)
	{
		$exists = $this->createQuery('p')
		->select('*')
		->from('sfGuardPermission p')
		->where('p.name = ?', $this->cleanName('Location-'.$state->getAbbreviation()))
		->fetchOne();
	    
		if( ! $exists )
		{
			$permission = new sfGuardPermission;
			$permission->created_at = date('Y-m-d H:i:s');
			$permission->updated_at = date('Y-m-d H:i:s');
			$permission->name = $this->cleanName('Location-'.$state->getAbbreviation());
			$permission->description = 'Location Access Permission for '.$state->getState();
			$permission->save();
		}
		
	}
	
	public function getByIdsQuery(array $ids)
	{
		return $this->createQuery('s')
		  ->whereIn('s.id',$ids);
	}
	
	protected function cleanName($name)
	{
		return preg_replace('/[^A-Za-z0-9-]/','',$name);
	}
}