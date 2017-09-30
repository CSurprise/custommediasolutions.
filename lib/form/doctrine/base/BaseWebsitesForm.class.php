<?php

/**
 * Websites form base class.
 *
 * @method Websites getObject() Returns the current form's model object
 *
 * @package    models
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseWebsitesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                        => new sfWidgetFormInputHidden(),
      'created_at'                => new sfWidgetFormDateTime(),
      'updated_at'                => new sfWidgetFormDateTime(),
      'deleted_at'                => new sfWidgetFormDateTime(),
      'url'                       => new sfWidgetFormInputText(),
      'name'                      => new sfWidgetFormInputText(),
      'layout'                    => new sfWidgetFormInputText(),
      'stylesheets'               => new sfWidgetFormInputText(),
      'javascripts'               => new sfWidgetFormInputText(),
      'default_content_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Content'), 'add_empty' => true)),
      'redirect_after_submission' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Content2'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'created_at'                => new sfValidatorDateTime(),
      'updated_at'                => new sfValidatorDateTime(),
      'deleted_at'                => new sfValidatorDateTime(array('required' => false)),
      'url'                       => new sfValidatorString(array('max_length' => 255)),
      'name'                      => new sfValidatorString(array('max_length' => 255)),
      'layout'                    => new sfValidatorString(array('max_length' => 100)),
      'stylesheets'               => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'javascripts'               => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'default_content_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Content'), 'required' => false)),
      'redirect_after_submission' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Content2'))),
    ));

    $this->widgetSchema->setNameFormat('websites[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Websites';
  }

}
