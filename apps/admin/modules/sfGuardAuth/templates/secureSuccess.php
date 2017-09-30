<?php use_helper('I18N') ?>
<?php include_partial('default/assets')?>
<h2><?php echo __('Oops!', null, 'sf_guard') ?></h2>

<p>The page you requested is secure and you do not have the proper credentials to access it. The page you requested was: <?php echo sfContext::getInstance()->getRequest()->getUri() ?></p>

<h3><?php echo __('Change User Below', null, 'sf_guard') ?></h3>
<p>To change to another user who has the credentials, please log in below</p>
<?php echo get_component('sfGuardAuth', 'signin_form') ?>