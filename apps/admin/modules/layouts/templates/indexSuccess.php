<?php include_partial('config/assets')?>

<div class="sf_admin_edit ui-widget ui-widget-content ui-corner-all" id="sf_admin_container">
  <div class="fg-toolbar ui-widget-header ui-corner-all">
    <h1>Layouts</h1>
  </div>

  <div class="sf_admin_flashes ui-widget">
<?php include_partial('config/flashes')?>
</div>

  <div id="sf_admin_header">
      </div>

  <div id="sf_admin_content">
    
<div class="sf_admin_form">
    <div class="ui-helper-clearfix"></div>
    <form method="post" action="<?php echo url_for('layouts/index') ?>">
	<div id="layouts_container">
	<ul>
		<?php $i=1;?>
		<?php foreach($layouts as $file => $layout):?>
		<li><a href="#layout-<?php echo $i;?>"><?php echo $file?></a></li>
		<?php $i++;?>
		<?php endforeach;?>
	</ul>
	<?php $i=1;?>
	<?php foreach($layouts as $file => $layout):?>
		<div id="layout-<?php echo $i?>">
			<textarea class="layout_text" rows="20" name="layouts[<?php echo $file;?>]">
				<?php echo trim(html_entity_decode($layout));?>
			</textarea>
		</div>
		<?php $i++;?>
	<?php endforeach;?>
	</div>
	
    <div class="sf_admin_actions_block ui-widget ui-helper-clearfix">

      <ul class="sf_admin_actions_form">
  			<li class="sf_admin_action_save">
  				<button class="fg-button ui-state-default fg-button-icon-left" type="submit">
  					<span class="ui-icon ui-icon-circle-check"></span>Save
  				</button>
  			</li>  

  	</ul> 
  	</div>
  </form>
</div>
  </div>

  <div id="sf_admin_footer">
  <p>You can reference the templating engine used by Symfony on their website, <a href="http://www.symfony-project.org/doc/1_4/">http://www.symfony-project.com</a>. </p>
  <p>Introduction guide available here <a href="http://www.symfony-project.org/gentle-introduction/1_4/en/07-Inside-the-View-Layer#chapter_07_templating">http://www.symfony-project.org/gentle-introduction/1_4/en/07-Inside-the-View-Layer#chapter_07_templating</a></p>
      </div>

  </div>

