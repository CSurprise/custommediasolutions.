<div class="sf_admin_form_row sf_admin_text sf_admin_form_field_javascripts">
	<div>
		<?php echo $form['javascripts']->renderLabel()?>
		<div id="javascripts_container" class="content">
			<?php $_javascripts = explode(',',$form->getObject()->getJavascripts())?>
			<?php $i=1; ?>
			<?php foreach($_javascripts as $javascript):?>
				<?php echo $form['javascripts']->render(
					array(
					  'name' => 'websites[javascripts][]',
					  'class' => 'javascript', 
					  'id' => 'websites_javascripts_'.$i
					)
				);?>
				<script>
				$(function () {	
					$('#websites_javascripts_<?php echo $i?>').val('<?php echo $javascript?>');
				});
				</script>
				<?php if( $i != 1 ):?>
				<a href="#" class="delete_website_javascript" rel="<?php echo $i;?>">Delete</a>
				<?php if($i != count($_javascripts)):?>
					<br id="js_br_".$i />
				<?php endif;?>
				<?php elseif( $i == 1 && count($_javascripts) >1): ?>
				<br />
				<?php endif;?>
				<?php $i++;?>
			<?php endforeach;?>
		</div>
		<div class="help add"><a href="#" id="add_website_javascript">Add Another</a></div>
		<div class="help">To get more choices, upload your javascripts to the /web/js directory.</div>
	</div>
</div>