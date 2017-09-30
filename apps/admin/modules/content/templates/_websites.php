<div class="sf_admin_form_row sf_admin_text sf_admin_form_field_websites">
	<div>
		<label>Website's Layout Settings</label>
		<div class="content">
			<?php foreach($form->getWebsites() as $website):?>
				<h3><?php echo $website['name']?></h3>
				<div><strong>URL: </strong> http://www.<?php echo $website['url']?></div>
				<div><strong>Javascripts: </strong> <?php echo $website['javascripts']?></div>
				<div><strong>Stylesheets: </strong> <?php echo $website['stylesheets']?></div>
			<?php endforeach;?>
		</div>
	</div>
</div>