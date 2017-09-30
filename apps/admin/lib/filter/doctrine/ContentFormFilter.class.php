<?php 

class ContentFormFilter extends BaseContentFormFilter
{
	public function configure()
	{
		parent::setup();
				
		$this->setWidget('published', new sfWidgetFormSelectRadio(array('choices' => $this->getPublishedChoices())));
		$this->setValidator('published', new sfValidatorPass(array('required' => false)));
	}
	
	public function getPublishedChoices()
	{
		return array(1=>'Published',0=>'Unpublished');
	}
  /* function addPublishedColumnQuery
   * Filter Based on State Selection;
   */
   public function addPublishedColumnQuery($query, $field, $value){		
   		return $query->andWhere('r.published = ?', (int) $value );
   }
}