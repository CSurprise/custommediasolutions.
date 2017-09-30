<?php 

class SubmissionsFormFilter extends BaseSubmissionsFormFilter
{
	
	public function configure()
	{
		parent::setup();
		
	  	$this->setWidget('state', new sfWidgetFormSelect(array('choices' => $this->getStates())));
	  	$this->setWidget('gender', new sfWidgetFormSelectRadio(array('choices' => $this->getGenders())));
	  	$this->setWidget('age', new sfWidgetFormInputAgeRange(array(),array('size' => 5)));
	  	$this->setWidget('city', new sfWidgetFormFilterInput(array('with_empty' => false)));
	  	$this->setWidget('website_id', new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Websites'), 'query' => Doctrine::getTable('Submissions')->getUserWebsitePermissions(), 'add_empty' => true)));
	  	$this->setWidget('state', new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('States'), 'query' => Doctrine::getTable('Submissions')->getUserStatePermissions(), 'add_empty' => true)));
	  	
	  	$this->setValidator('gender', new sfValidatorPass(array('required' => false)));
	}

  /* function addStateColumnQuery
   * Filter Based on State Selection;
   */
   public function addStateColumnQuery($query, $field, $value){		
   		return $query->andWhere('r.state = ?', $value );
	}
	
  /* function addGenderColumnQuery
   * Filter Based on State Selection;
   */
   public function addGenderColumnQuery($query, $field, $value){		
   		return $query->andWhere('r.gender = ?', (int) $value );
   }
  /* function addPhoneColumnQuery
   * Filter Based on Phone or Cell Number Match;
   */
   public function addPhoneColumnQuery($query, $field, $value){	
   		if($value['text'] == '')	
   		{
   			return $query;
   		}
   		return $query->andWhere('r.phone = ? OR r.cell = ?', array($value['text'],$value['text']) );
   }
  /* function addAgeColumnQuery
   * Filter Based on State Selection;
   */
   public function addAgeColumnQuery($query, $field, $value){	
   		if($value[0] == '' or $value[1] == '')	
   		{
   			return $query;
   		}
   		return $query->andWhere('r.age BETWEEN ? AND ?', array((int)$value[0],(int)$value[1]) );
   }
  /* function getGenders
   * Gets Gender Selection Array
   */
  protected function getGenders()
  {
  	return array(1 => 'Male', 2 => 'Female');
  }
  
  /* function getStates
   * Gets States Selection Array
   */
  protected function getStates()
  {
  	return array(
  	  NULL => NULL,
  	  'AL' => 'AL', 
  	  'AK' => 'AK',
  	  'AZ' => 'AZ',
  	  'AR' => 'AR',
  	  'AP' => 'AP',
  	  'CA' => 'CA',
  	  'CO' => 'CO',
  	  'CT' => 'CT',
  	  'DE' => 'DE',
  	  'DC' => 'DC',
  	  'FL' => 'FL',
  	  'GA' => 'GA',
  	  'HI' => 'HI',
  	  'ID' => 'ID',
  	  'IL' => 'IL',
  	  'IN' => 'IN',
  	  'IA' => 'IA',
  	  'KS' => 'KS',
  	  'KY' => 'KY',
  	  'LA' => 'LA',
  	  'ME' => 'ME',
  	  'MD' => 'MD',
  	  'MA' => 'MA',
  	  'MI' => 'MI',
  	  'MN' => 'MN',
  	  'MS' => 'MS',
  	  'MO' => 'MO',
  	  'MT' => 'MT',
  	  'NE' => 'NE',
  	  'NV' => 'NV',
  	  'NH' => 'NH',
  	  'NJ' => 'NJ',
  	  'NM' => 'NM',
  	  'NY' => 'NY',
  	  'NC' => 'NC',
  	  'ND' => 'ND',
  	  'OH' => 'OH',
  	  'OK' => 'OK',
  	  'OR' => 'OR',
  	  'PW' => 'PW',
  	  'PR' => 'PR',
  	  'RI' => 'RI',
  	  'SC' => 'SC',
  	  'SD' => 'SD',
  	  'TN' => 'TN',
  	  'TX' => 'TX',
  	  'UT' => 'UT',
  	  'VT' => 'VT',
  	  'VA' => 'VA',
  	  'WA' => 'WA',
  	  'WV' => 'WV',
  	  'WI' => 'WI',
  	  'WY' => 'WY',
  	);
  }
  


}