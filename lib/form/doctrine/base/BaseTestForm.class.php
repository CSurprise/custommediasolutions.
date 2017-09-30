<?php

/**
 * Test form base class.
 *
 * @method Test getObject() Returns the current form's model object
 *
 * @package    models
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTestForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'date'      => new sfWidgetFormDateTime(),
      'fname'     => new sfWidgetFormInputText(),
      'lname'     => new sfWidgetFormInputText(),
      'age'       => new sfWidgetFormInputText(),
      'height'    => new sfWidgetFormInputText(),
      'gender'    => new sfWidgetFormInputText(),
      'weight'    => new sfWidgetFormInputText(),
      'modeling'  => new sfWidgetFormInputText(),
      'acting'    => new sfWidgetFormInputText(),
      'theater'   => new sfWidgetFormInputText(),
      'address'   => new sfWidgetFormInputText(),
      'city'      => new sfWidgetFormInputText(),
      'state'     => new sfWidgetFormInputText(),
      'zipcode'   => new sfWidgetFormInputText(),
      'phone'     => new sfWidgetFormInputText(),
      'cellphone' => new sfWidgetFormInputText(),
      'email'     => new sfWidgetFormInputText(),
      'comments'  => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'date'      => new sfValidatorDateTime(),
      'fname'     => new sfValidatorString(array('max_length' => 100)),
      'lname'     => new sfValidatorString(array('max_length' => 100)),
      'age'       => new sfValidatorInteger(),
      'height'    => new sfValidatorString(array('max_length' => 100)),
      'gender'    => new sfValidatorString(array('max_length' => 5)),
      'weight'    => new sfValidatorString(array('max_length' => 100)),
      'modeling'  => new sfValidatorInteger(array('required' => false)),
      'acting'    => new sfValidatorInteger(array('required' => false)),
      'theater'   => new sfValidatorInteger(array('required' => false)),
      'address'   => new sfValidatorString(array('max_length' => 150)),
      'city'      => new sfValidatorString(array('max_length' => 100)),
      'state'     => new sfValidatorString(array('max_length' => 2)),
      'zipcode'   => new sfValidatorInteger(),
      'phone'     => new sfValidatorString(array('max_length' => 10)),
      'cellphone' => new sfValidatorString(array('max_length' => 10)),
      'email'     => new sfValidatorString(array('max_length' => 150)),
      'comments'  => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('test[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Test';
  }

}
