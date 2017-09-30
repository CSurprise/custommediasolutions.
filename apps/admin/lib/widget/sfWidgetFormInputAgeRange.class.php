<?php
/**
 * sfWidgetFormInputAgeRange represents an HTML input tag for Age Range Filter.
 *
 * @package    symfony
 * @subpackage widget
 * @author     Gassan Idriss
 */
class sfWidgetFormInputAgeRange extends sfWidgetForm
{
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
    return 
    $this->renderTag('input', array_merge(array('type' => $this->getOption('type'), 'name' => $name.'[]', 'value' => isset($value[0]) && $value[0] != '' ? (int)$value[0] : NULL), $attributes))
    .' to '.$this->renderTag('input', array_merge(array('type' => $this->getOption('type'), 'name' => $name.'[]', 'value' => isset($value[1]) && $value[1] != '' ? (int)$value[1] : NULL), $attributes));
  }
}
