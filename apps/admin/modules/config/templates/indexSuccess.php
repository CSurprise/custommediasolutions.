<?php include_partial('config/assets')?>

<div class="sf_admin_edit ui-widget ui-widget-content ui-corner-all" id="sf_admin_container">
  <div class="fg-toolbar ui-widget-header ui-corner-all">
    <h1>Application Configuration</h1>
  </div>

  <div class="sf_admin_flashes ui-widget">
<?php include_partial('config/flashes')?>
</div>

  <div id="sf_admin_header">
      </div>

  <div id="sf_admin_content">
    
<div class="sf_admin_form">
    <div class="ui-helper-clearfix"></div>
    <form method="post" action="<?php echo url_for('config/index') ?>">
	<?php echo $form->renderHiddenFields()?>
		
   	

        <div id="sf_admin_form_tab_menu" class="ui-tabs ui-widget ui-widget-content ui-corner-all ui-tabs-vertical ui-helper-clearfix">
						
	    	      <div class="ui-corner-all" id="sf_fieldset_none">

                <div class="sf_admin_form_row sf_admin_text">
    <div class="label ui-helper-clearfix">
    
    <?php echo $form['admin_title']->renderLabel('Administration Site Title')?>
          </div>

     <?php echo $form['admin_title']->render()?>
      <?php echo $form['admin_title']->renderError()?>
      </div>
                <div class="sf_admin_form_row sf_admin_text">
    <div class="label ui-helper-clearfix">
    <?php echo $form['submission_email_to']->renderLabel('Submission Notifications To')?>
          </div>

     <?php echo $form['submission_email_to']->render()?>
      <?php echo $form['submission_email_to']->renderError()?>
      </div>
                <div class="sf_admin_form_row sf_admin_text">
    <div class="label ui-helper-clearfix">
    <?php echo $form['submission_email_from']->renderLabel('Submission Notifications From')?>
          </div>

     <?php echo $form['submission_email_from']->render()?>
      <?php echo $form['submission_email_from']->renderError()?>
      </div>
                <div class="sf_admin_form_row sf_admin_text">
    <div class="label ui-helper-clearfix">
    <?php echo $form['fallback_content_id']->renderLabel('Fall Back Content')?>
          </div>

     <?php echo $form['fallback_content_id']->render()?>
      <?php echo $form['fallback_content_id']->renderError()?>
      </div>
      
                <div class="sf_admin_form_row sf_admin_text">
    <div class="label ui-helper-clearfix">
    <?php echo $form['mail_settings_host']->renderLabel('Mail Settings SMTP Host')?>
          </div>

     <?php echo $form['mail_settings_host']->render()?>
      <?php echo $form['mail_settings_host']->renderError()?>
      </div>
      
	    		</div>
	    		
      
                <div class="sf_admin_form_row sf_admin_text">
    <div class="label ui-helper-clearfix">
    <?php echo $form['mail_settings_port']->renderLabel('Mail Settings SMTP Port')?>
          </div>

     <?php echo $form['mail_settings_port']->render()?>
      <?php echo $form['mail_settings_port']->renderError()?>
      </div>
      
	    		</div>
	    		
      
                <div class="sf_admin_form_row sf_admin_text">
    <div class="label ui-helper-clearfix">
    <?php echo $form['mail_settings_encryption']->renderLabel('Mail Settings SMTP Encryption')?>
          </div>

     <?php echo $form['mail_settings_encryption']->render()?>
      <?php echo $form['mail_settings_encryption']->renderError()?>
      </div>
      
	    		</div>
	    		
      
                <div class="sf_admin_form_row sf_admin_text">
    <div class="label ui-helper-clearfix">
    <?php echo $form['mail_settings_username']->renderLabel('Mail Settings SMTP Username')?>
          </div>

     <?php echo $form['mail_settings_username']->render()?>
      <?php echo $form['mail_settings_username']->renderError()?>
      </div>
      
      
      
                <div class="sf_admin_form_row sf_admin_text">
    <div class="label ui-helper-clearfix">
    <?php echo $form['mail_settings_password']->renderLabel('Mail Settings SMTP Password')?>
          </div>

     <?php echo $form['mail_settings_password']->render()?>
      <?php echo $form['mail_settings_password']->renderError()?>
      </div>
      
      
                <div class="sf_admin_form_row sf_admin_text">
    <div class="label ui-helper-clearfix">
    <?php echo $form['default_meta_description']->renderLabel('Default META Description')?>
          </div>

     <?php echo $form['default_meta_description']->render()?>
      <?php echo $form['default_meta_description']->renderError()?>
      </div>
      
                <div class="sf_admin_form_row sf_admin_text">
    <div class="label ui-helper-clearfix">
    <?php echo $form['default_meta_keywords']->renderLabel('Default META Keywords')?>
          </div>

     <?php echo $form['default_meta_keywords']->render()?>
      <?php echo $form['default_meta_keywords']->renderError()?>
      </div>
                <div class="sf_admin_form_row sf_admin_text">
    <div class="label ui-helper-clearfix">
    <?php echo $form['admin_domain']->renderLabel('Admin Domain')?>
          </div>

     http://www.<?php echo $form['admin_domain']->render()?>
      <?php echo $form['admin_domain']->renderError()?>
      </div>
      
                <div class="sf_admin_form_row sf_admin_text">
    <div class="label ui-helper-clearfix">
    <?php echo $form['timezone']->renderLabel('Timezone')?>
          </div>

     <?php echo $form['timezone']->render()?>
      <?php echo $form['timezone']->renderError()?>
      </div>
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
      </div>

  </div>

