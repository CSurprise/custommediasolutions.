<?php

/**
 * Test filter form base class.
 *
 * @package    models
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTestFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'date'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'fname'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lname'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'age'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'height'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'gender'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'weight'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'modeling'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'acting'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'theater'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'address'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'city'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'state'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'zipcode'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'phone'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cellphone' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comments'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'date'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'fname'     => new sfValidatorPass(array('required' => false)),
      'lname'     => new sfValidatorPass(array('required' => false)),
      'age'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'height'    => new sfValidatorPass(array('required' => false)),
      'gender'    => new sfValidatorPass(array('required' => false)),
      'weight'    => new sfValidatorPass(array('required' => false)),
      'modeling'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'acting'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'theater'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'address'   => new sfValidatorPass(array('required' => false)),
      'city'      => new sfValidatorPass(array('required' => false)),
      'state'     => new sfValidatorPass(array('required' => false)),
      'zipcode'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'phone'     => new sfValidatorPass(array('required' => false)),
      'cellphone' => new sfValidatorPass(array('required' => false)),
      'email'     => new sfValidatorPass(array('required' => false)),
      'comments'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('test_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Test';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'date'      => 'Date',
      'fname'     => 'Text',
      'lname'     => 'Text',
      'age'       => 'Number',
      'height'    => 'Text',
      'gender'    => 'Text',
      'weight'    => 'Text',
      'modeling'  => 'Number',
      'acting'    => 'Number',
      'theater'   => 'Number',
      'address'   => 'Text',
      'city'      => 'Text',
      'state'     => 'Text',
      'zipcode'   => 'Number',
      'phone'     => 'Text',
      'cellphone' => 'Text',
      'email'     => 'Text',
      'comments'  => 'Text',
    );
  }
}
