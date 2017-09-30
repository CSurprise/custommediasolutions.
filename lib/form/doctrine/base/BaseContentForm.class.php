<?php

/**
 * Content form base class.
 *
 * @method Content getObject() Returns the current form's model object
 *
 * @package    models
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseContentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
      'title'            => new sfWidgetFormInputText(),
      'page_title'       => new sfWidgetFormInputText(),
      'meta_keywords'    => new sfWidgetFormTextarea(),
      'meta_description' => new sfWidgetFormTextarea(),
      'content'          => new sfWidgetFormTextarea(),
      'url_slug'         => new sfWidgetFormInputText(),
      'layout'           => new sfWidgetFormInputText(),
      'stylesheets'      => new sfWidgetFormInputText(),
      'javascripts'      => new sfWidgetFormInputText(),
      'published'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
      'title'            => new sfValidatorString(array('max_length' => 255)),
      'page_title'       => new sfValidatorString(array('max_length' => 255)),
      'meta_keywords'    => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'meta_description' => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'content'          => new sfValidatorString(),
      'url_slug'         => new sfValidatorString(array('max_length' => 255)),
      'layout'           => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'stylesheets'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'javascripts'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'published'        => new sfValidatorInteger(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Content', 'column' => array('url_slug')))
    );

    $this->widgetSchema->setNameFormat('content[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Content';
  }

}
