<?php use_helper('I18N') ?>

<h1><?php echo __('Please Log In To Continue', null, 'sf_guard') ?></h1>

<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
	<?php echo $form->renderHiddenFields()?>
	<?php echo $form->renderGlobalErrors()?>
	<div class="login_row username">
		<?php echo $form['username']->renderLabel()?>
		<?php echo $form['username']->render()?>
		<?php echo $form['username']->renderError()?>
	</div>
	<div class="login_row password">
		<?php echo $form['password']->renderLabel()?>
		<?php echo $form['password']->render()?>
		<?php echo $form['password']->renderError()?>
	</div>
	<div class="login_row remember">
		<?php echo $form['remember']->renderLabel()?>
		<?php echo $form['remember']->render()?>
		<?php echo $form['remember']->renderError()?>
	</div>
	<div class="login_row actions">
          <input type="submit" value="<?php echo __('Signin', null, 'sf_guard') ?>" />
          
          <?php $routes = $sf_context->getRouting()->getRoutes() ?>
          <?php if (isset($routes['sf_guard_forgot_password'])): ?>
            <a href="<?php echo url_for('@sf_guard_forgot_password') ?>"><?php echo __('Forgot your password?', null, 'sf_guard') ?></a>
          <?php endif; ?>

          <?php if (isset($routes['sf_guard_register'])): ?>
            &nbsp; <a href="<?php echo url_for('@sf_guard_register') ?>"><?php echo __('Want to register?', null, 'sf_guard') ?></a>
          <?php endif; ?>
	</div>

</form>