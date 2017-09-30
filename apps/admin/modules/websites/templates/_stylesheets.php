<div class="sf_admin_form_row sf_admin_text sf_admin_form_field_stylesheets">
	<div>
		<?php echo $form['stylesheets']->renderLabel()?>
		<div id="stylesheets_container" class="content">
			<?php $_stylesheets = explode(',',$form->getObject()->getStylesheets())?>
			<?php $i=1; ?>
			<?php foreach($_stylesheets as $stylesheet):?>
				<?php echo $form['stylesheets']->render(
					array(
					  'name' => 'websites[stylesheets][]',
					  'class' => 'stylesheet', 
					  'id' => 'websites_stylesheets_'.$i
					)
				);?>
				<script>
				$(function () {	
					$('#websites_stylesheets_<?php echo $i?>').val('<?php echo $stylesheet?>');
				});
				</script>
				<?php if( $i != 1 ):?>
				<a href="#" class="delete_website_stylesheet" rel="<?php echo $i;?>">Delete</a>
				<?php if($i != count($_stylesheets)):?>
					<br id="js_br_".$i />
				<?php endif;?>
				<?php elseif( $i == 1 && count($_stylesheets) >1): ?>
				<br />
				<?php endif;?>
				<?php $i++;?>
			<?php endforeach;?>
		</div>
		<div class="help add"><a href="#" id="add_website_stylesheet">Add Another</a></div>
		<div class="help">To get more choices, upload your stylesheets to the /web/js directory.</div>
	</div>
</div>