<?php

/**
 * Websites filter form base class.
 *
 * @package    models
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseWebsitesFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'created_at'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'deleted_at'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'url'                       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'name'                      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'layout'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'stylesheets'               => new sfWidgetFormFilterInput(),
      'javascripts'               => new sfWidgetFormFilterInput(),
      'default_content_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Content'), 'add_empty' => true)),
      'redirect_after_submission' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Content2'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'created_at'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'deleted_at'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'url'                       => new sfValidatorPass(array('required' => false)),
      'name'                      => new sfValidatorPass(array('required' => false)),
      'layout'                    => new sfValidatorPass(array('required' => false)),
      'stylesheets'               => new sfValidatorPass(array('required' => false)),
      'javascripts'               => new sfValidatorPass(array('required' => false)),
      'default_content_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Content'), 'column' => 'id')),
      'redirect_after_submission' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Content2'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('websites_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Websites';
  }

  public function getFields()
  {
    return array(
      'id'                        => 'Number',
      'created_at'                => 'Date',
      'updated_at'                => 'Date',
      'deleted_at'                => 'Date',
      'url'                       => 'Text',
      'name'                      => 'Text',
      'layout'                    => 'Text',
      'stylesheets'               => 'Text',
      'javascripts'               => 'Text',
      'default_content_id'        => 'ForeignKey',
      'redirect_after_submission' => 'ForeignKey',
    );
  }
}
