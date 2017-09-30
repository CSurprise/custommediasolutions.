<?php


class WebsitesTable extends Doctrine_Table
{
    protected function _cleanServerName($url)
    {
    	return str_replace(array('http://','https://','www.'),'',$url);
    }
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Websites');
    }
    
    public function loadWebsiteByServer($url)
    {    	
    	return $this->createQuery('w')
    	  ->select('w.*')
    	  ->where('w.url = ?',$this->_cleanServerName($url))
    	  ->fetchOne();
    }
    
    public function loadWebsiteByServerWithContent($url)
    {
    	
    	
    	return $this->createQuery('w')
    	  ->select('w.*,c.*')
    	  ->leftJoin('w.Content c ON c.id = w.default_content_id')
    	  ->where('w.url = ?',$this->_cleanServerName($url))
    	  ->fetchOne();
    }
    

    
}