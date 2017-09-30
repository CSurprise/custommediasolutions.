<?php
/**
 * sfWidgetFormInputPhone represents an HTML input tag for Phone Input.
 *
 * @package    symfony
 * @subpackage widget
 * @author     Gassan Idriss
 */
class sfWidgetFormInputPhone extends sfWidgetForm
{
  protected $_array_value = array();
  /**
   * Constructor.
   *
   * Available options:
   *
   *  * type: The widget type
   *
   * @param array $options     An array of options
   * @param array $attributes  An array of default HTML attributes
   *
   * @see sfWidgetForm
   */
  protected function configure($options = array(), $attributes = array())
  {
    $this->addRequiredOption('type');

    // to maintain BC with symfony 1.2
    $this->setOption('type', 'text');
  }

  /**
   * @param  string $name        The element name
   * @param  string $value       The value displayed in this widget
   * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
   * @param  array  $errors      An array of errors for the field
   *
   * @return string An HTML tag string
   *
   * @see sfWidgetForm
   */
  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
  	$values = $this->breakPhone($value);
    return 
    '('
    .$this->renderTag('input', array_merge(array('type' => $this->getOption('type'), 'name' => $name.'[0]', 'value' => isset($values[0]) ? $values[0] : '', 'size' => 3, 'maxlength' => 3), $attributes))
    .')'
    .$this->renderTag('input', array_merge(array('type' => $this->getOption('type'), 'name' => $name.'[1]', 'value' => isset($values[1]) ? $values[1] : '', 'size' => 3, 'maxlength' => 3), $attributes))
    .'-'
    .$this->renderTag('input', array_merge(array('type' => $this->getOption('type'), 'name' => $name.'[2]', 'value' => isset($values[2]) ? $values[2] : '', 'size' => 4, 'maxlength' => 4), $attributes));
  }
  
  protected function breakPhone($phone)
  {
  	if(is_array($phone))
  	{
  		return $phone;
  	}
  	
  	if(strlen($phone) == 0)
  	{
  		return array(0=>'',1=>'',2=>'');
  	}
  	
  	$_numbers = str_split(preg_replace('/[^0-9]/','',$phone));
  
  	return array(
  	  $_numbers[0].$_numbers[1].$_numbers[2],
  	  $_numbers[3].$_numbers[4].$_numbers[5],
  	  $_numbers[6].$_numbers[7].$_numbers[8].$_numbers[9],
  	);
  }
  

}
