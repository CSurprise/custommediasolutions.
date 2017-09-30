<?php

/**
 * Submissions form base class.
 *
 * @method Submissions getObject() Returns the current form's model object
 *
 * @package    models
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSubmissionsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'website_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Websites'), 'add_empty' => true)),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
      'first_name'    => new sfWidgetFormInputText(),
      'last_name'     => new sfWidgetFormInputText(),
      'age'           => new sfWidgetFormInputText(),
      'gender'        => new sfWidgetFormInputText(),
      'phone'         => new sfWidgetFormInputText(),
      'cell'          => new sfWidgetFormInputText(),
      'height'        => new sfWidgetFormInputText(),
      'weight'        => new sfWidgetFormInputText(),
      'email'         => new sfWidgetFormInputText(),
      'address'       => new sfWidgetFormInputText(),
      'city'          => new sfWidgetFormInputText(),
      'state'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('States'), 'add_empty' => true)),
      'zipcode'       => new sfWidgetFormInputText(),
      'interests'     => new sfWidgetFormInputText(),
      'submitters_ip' => new sfWidgetFormInputText(),
      'comments'      => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'website_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Websites'), 'required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
      'first_name'    => new sfValidatorString(array('max_length' => 255)),
      'last_name'     => new sfValidatorString(array('max_length' => 255)),
      'age'           => new sfValidatorInteger(),
      'gender'        => new sfValidatorInteger(),
      'phone'         => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'cell'          => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'height'        => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'weight'        => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'email'         => new sfValidatorString(array('max_length' => 255)),
      'address'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'city'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'state'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('States'), 'required' => false)),
      'zipcode'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'interests'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'submitters_ip' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'comments'      => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('submissions[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Submissions';
  }

}
