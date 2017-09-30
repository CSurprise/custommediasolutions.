<?php

class frontConfiguration extends sfApplicationConfiguration
{
  public function configure()
  {
  	date_default_timezone_set(sfConfig::get('app_timezone'));
  }
}
