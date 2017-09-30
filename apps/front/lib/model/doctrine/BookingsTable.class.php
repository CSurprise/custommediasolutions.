<?php


class BookingsTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Bookings');
    }
    
    public function getPublished()
    {
    	return $this->createQuery('b')
    	 ->select('*')
    	 ->where('b.published = ?', 1)
    	 ->execute();
    }
    
}