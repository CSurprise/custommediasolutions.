<?php 

class WebsitesTable extends Doctrine_Table
{
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Websites');
    }
    
	public function loadIndex($query)
	{
		return $query->select('r.*,c.title')
		 ->leftJoin('r.Content c ON c.id = r.default_content_id')
		 ->where('r.deleted_at IS NULL');
	}
	
	public function getAll()
	{
		return $this->createQuery('w')
		 ->select('w.*')
		 ->execute();
	}
	public function getAllQuery()
	{
		return $this->createQuery('w')
		 ->select('w.*');
	}
	
	public function setupWebsitePermission(Websites $website)
	{
		$exists = $this->createQuery('p')
		->select('*')
		->from('sfGuardPermission p')
		->where('p.name = ?', $this->cleanName('Website-'.$website->getName()))
		->fetchOne();
	    
		if( ! $exists )
		{
			$permission = new sfGuardPermission;
			$permission->created_at = date('Y-m-d H:i:s');
			$permission->updated_at = date('Y-m-d H:i:s');
			$permission->name = $this->cleanName('Website-'.$website->getName());
			$permission->description = 'Website Submission Access Permission for '.$website->getName();
			$permission->save();
		}
		
	}
	
	public function getByIdsQuery(array $ids)
	{
		return $this->createQuery('w')
		  ->whereIn('w.id',$ids);
	}
	
	protected function cleanName($name)
	{
		return preg_replace('/[^A-Za-z0-9-]/','',$name);
	}
}