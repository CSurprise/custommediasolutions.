<div class="sf_admin_form_row sf_admin_text sf_admin_form_field_interests">
	<div>
		<?php echo $form['interests']->renderLabel()?>
		<div class="content">
			<?php $_interests = explode(',',$form->getObject()->getInterests());?>
			<?php foreach($form->getInterests() as $interest):?>
				<input type="checkbox" name="submissions[interests][]" value="<?php echo $interest; ?>" <?php echo in_array($interest,$_interests) ? 'checked="checked"' : '' ?> /> <?php echo $interest?>
			<?php endforeach;?>
			
		</div>
	</div>
</div>

