<?php
/**
 * sfValidatorPhone validates a sfWidgetInputPhone.
 *
 * @package    symfony
 * @subpackage widget
 * @author     Gassan Idriss
 */
class sfValidatorPhone extends sfValidatorBase
{
  protected 
    /* Regular Expressions Map*/
    $expressions = array(
     '/^[0-9]{3}$/',
     '/^[0-9]{3}$/',
     '/^[0-9]{4}$/',
     '/[^0-9]/' // for replace
    ),
    /* The User Value as an Array */
    $user_array_value = array(),
    /**/
    $clean_array_value = array(),
    /* The User Value as a String */
    $string_value;
    
  protected function configure($options = array(), $messages = array())
  {
	$this->addMessage('bad_format', 'Please Check Your Input for Phone. Enter only numbers.');
	$this->addMessage('one_number', 'At least one phone number is required.');
	
	$this->addOption('allow_any', false);
	
	$this->setOption('empty_value', '');
	//$this->setOption('allow_any', isset($options['allow_any']) && $options['allow_any'] == true ? true : false );
  }

  /**
   * @see sfValidatorBase
   */
  protected function doClean($value)
  {
    if( ! is_array($value))
    {
    	throw new sfValidatorError($this, 'invalid');
    }
    
    if( strlen(implode('',$value)) == 0 && $this->getOption('required') == false )
    {
    	return implode('',$value);
    }
    
    if( $this->getOption('allow_any') == true)
    {
    	return implode('',$value);
    }
    
    foreach($value as $key => $val)
    {
    	$this->clean_array_value[$key] = preg_replace($this->expressions[3],'',$val);
    	if( ! preg_match($this->expressions[$key],$this->clean_array_value[$key]))
    	{
    		throw new sfValidatorError($this, $this->getMessage('invalid'), array('value' => $this->user_array_value));
    	} else
    	{
    		$_phone[$key] = $this->clean_array_value[$key];
    	}
    }

    return implode('',$_phone);
  }

}

