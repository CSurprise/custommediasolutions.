<?php

/**
 * Submissions filter form base class.
 *
 * @package    models
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSubmissionsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'website_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Websites'), 'add_empty' => true)),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'first_name'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'last_name'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'age'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'gender'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'phone'         => new sfWidgetFormFilterInput(),
      'cell'          => new sfWidgetFormFilterInput(),
      'height'        => new sfWidgetFormFilterInput(),
      'weight'        => new sfWidgetFormFilterInput(),
      'email'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'address'       => new sfWidgetFormFilterInput(),
      'city'          => new sfWidgetFormFilterInput(),
      'state'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('States'), 'add_empty' => true)),
      'zipcode'       => new sfWidgetFormFilterInput(),
      'interests'     => new sfWidgetFormFilterInput(),
      'submitters_ip' => new sfWidgetFormFilterInput(),
      'comments'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'website_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Websites'), 'column' => 'id')),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'first_name'    => new sfValidatorPass(array('required' => false)),
      'last_name'     => new sfValidatorPass(array('required' => false)),
      'age'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'gender'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'phone'         => new sfValidatorPass(array('required' => false)),
      'cell'          => new sfValidatorPass(array('required' => false)),
      'height'        => new sfValidatorPass(array('required' => false)),
      'weight'        => new sfValidatorPass(array('required' => false)),
      'email'         => new sfValidatorPass(array('required' => false)),
      'address'       => new sfValidatorPass(array('required' => false)),
      'city'          => new sfValidatorPass(array('required' => false)),
      'state'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('States'), 'column' => 'id')),
      'zipcode'       => new sfValidatorPass(array('required' => false)),
      'interests'     => new sfValidatorPass(array('required' => false)),
      'submitters_ip' => new sfValidatorPass(array('required' => false)),
      'comments'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('submissions_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Submissions';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'website_id'    => 'ForeignKey',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
      'first_name'    => 'Text',
      'last_name'     => 'Text',
      'age'           => 'Number',
      'gender'        => 'Number',
      'phone'         => 'Text',
      'cell'          => 'Text',
      'height'        => 'Text',
      'weight'        => 'Text',
      'email'         => 'Text',
      'address'       => 'Text',
      'city'          => 'Text',
      'state'         => 'ForeignKey',
      'zipcode'       => 'Text',
      'interests'     => 'Text',
      'submitters_ip' => 'Text',
      'comments'      => 'Text',
    );
  }
}
