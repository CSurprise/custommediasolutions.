<div align="center">
	<div><strong>Submitted On:</strong> <?php echo date('m/d/Y h:i a',strtotime($form->getObject()->getCreatedAt()))?>
	<strong>Last Updated:</strong> <?php echo date('m/d/Y h:i a',strtotime($form->getObject()->getUpdatedAt()))?>
	<strong>Submitters IP:</strong> <?php echo $form->getObject()->getSubmittersIp()?></div>
</div>

<div class="sf_admin_form_row sf_admin_text sf_admin_form_field_website">
	<div>
		<?php echo $form['website_id']->renderLabel()?>
		<div class="content">
			<?php echo $form->getObject()->getWebsites()->getName(); ?> 
			| <a href="http://www.<?php echo $form->getObject()->getWebsites()->getUrl(); ?>" target="_blank">View Site</a>
		</div>
	</div>
</div>

