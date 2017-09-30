<?php

/**
 * Content filter form base class.
 *
 * @package    models
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseContentFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'title'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'page_title'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'meta_keywords'    => new sfWidgetFormFilterInput(),
      'meta_description' => new sfWidgetFormFilterInput(),
      'content'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'url_slug'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'layout'           => new sfWidgetFormFilterInput(),
      'stylesheets'      => new sfWidgetFormFilterInput(),
      'javascripts'      => new sfWidgetFormFilterInput(),
      'published'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'title'            => new sfValidatorPass(array('required' => false)),
      'page_title'       => new sfValidatorPass(array('required' => false)),
      'meta_keywords'    => new sfValidatorPass(array('required' => false)),
      'meta_description' => new sfValidatorPass(array('required' => false)),
      'content'          => new sfValidatorPass(array('required' => false)),
      'url_slug'         => new sfValidatorPass(array('required' => false)),
      'layout'           => new sfValidatorPass(array('required' => false)),
      'stylesheets'      => new sfValidatorPass(array('required' => false)),
      'javascripts'      => new sfValidatorPass(array('required' => false)),
      'published'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('content_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Content';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
      'title'            => 'Text',
      'page_title'       => 'Text',
      'meta_keywords'    => 'Text',
      'meta_description' => 'Text',
      'content'          => 'Text',
      'url_slug'         => 'Text',
      'layout'           => 'Text',
      'stylesheets'      => 'Text',
      'javascripts'      => 'Text',
      'published'        => 'Number',
    );
  }
}
