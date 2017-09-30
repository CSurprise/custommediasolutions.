<div class="sf_admin_form_row sf_admin_text sf_admin_form_field_url">
	<div>
		<?php echo $form['url']->renderLabel()?>
		<div class="content">
				http://www.<?php echo $form['url']->render(array('size' => 50));?>
		</div>
		<div class="help add"><?php echo $form['url']->renderHelp()?></div>
	</div>
</div>