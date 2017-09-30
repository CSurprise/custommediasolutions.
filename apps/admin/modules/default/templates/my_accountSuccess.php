<?php include_partial('config/assets')?>

<div class="sf_admin_edit ui-widget ui-widget-content ui-corner-all" id="sf_admin_container">
  <div class="fg-toolbar ui-widget-header ui-corner-all">
    <h1>My Account</h1>
  </div>

  <div class="sf_admin_flashes ui-widget">
<?php include_partial('config/flashes')?>
</div>

  <div id="sf_admin_header">
      </div>

  <div id="sf_admin_content">
    
<div class="sf_admin_form">
    <div class="ui-helper-clearfix"></div>
    <form method="post" action="<?php echo url_for('default/my_account') ?>">
	<?php echo $form->renderHiddenFields()?>
		
   	

        <div id="sf_admin_form_tab_menu" class="ui-tabs ui-widget ui-widget-content ui-corner-all ui-tabs-vertical ui-helper-clearfix">
						
	    	      <div class="ui-corner-all" id="sf_fieldset_none">
  <div class="sf_admin_flashes ui-widget">

	<?php if ($sf_user->isSuperAdmin()):?>
  <div class="notice ui-state-highlight ui-corner-all">
    <span class="ui-icon ui-icon-info floatleft"></span>&nbsp;
    You are an Administrator
  </div>
	<?php endif;?>
</div>
                <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_first_name">
    <div class="label ui-helper-clearfix">
    
    <?php echo $form['first_name']->renderLabel('First Name')?>
          </div>

     <?php echo $form['first_name']->render()?>
      <?php echo $form['first_name']->renderError()?>
      </div>
                <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_last_name">
    <div class="label ui-helper-clearfix">
    <?php echo $form['first_name']->renderLabel('Last Name')?>
          </div>

     <?php echo $form['last_name']->render()?>
      <?php echo $form['last_name']->renderError()?>
      </div>
      
                <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_email_address">
    <div class="label ui-helper-clearfix">
    <?php echo $form['email_address']->renderLabel('E-Mail Address')?>
          </div>

     <?php echo $form['email_address']->render()?>
      <?php echo $form['email_address']->renderError()?>
      </div>
      
                <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_email_address">
    <div class="label ui-helper-clearfix">
    <?php echo $form['email_address']->renderLabel('Status')?>
          </div>

     <?php echo $sf_user->getGuardUser()->getIsActive() == 1 ? 'Active' : 'Inactive'?>
      </div>

    <div class="sf_admin_actions_block ui-widget ui-helper-clearfix">
      <ul class="sf_admin_actions_form">
  	
  	<li class="sf_admin_action_save"><button class="fg-button ui-state-default fg-button-icon-left" type="submit">
  	<span class="ui-icon ui-icon-circle-check"></span>Save</button></li>  </ul>    
  	
  	</div>
                <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_email_address">
    <div class="label ui-helper-clearfix">
    <?php echo $form['email_address']->renderLabel('Available Website Access')?>
          </div>
			<?php if($sf_user->isSuperAdmin()):?>
			     			
			  <div class="sf_admin_flashes ui-widget">
			  <div class="notice ui-state-highlight ui-corner-all">
			    <span class="ui-icon ui-icon-info floatleft"></span>&nbsp;
			   Access to All Websites
			  </div>
			</div>
     			<ul class="website_access">
     			<?php foreach($websites as $website):?>
     				<li><?php echo $website->getName()?> - <a href="http://www.<?php echo $website->getUrl();?>" target=_blank">http://www.<?php echo $website->getUrl();?></a></li>
     			<?php endforeach;?>
     			</ul>
     		<?php else: ?>
     			<?php $w=0;?>
     			<ul class="website_access">
     			<?php foreach($websites as $website):?>
     				<?php if( $sf_user->hasGroup('W'.$website->getId())):?>
     					<li><?php echo $website->getName()?> - <a href="http://www.<?php echo $website->getUrl();?>" target=_blank">http://www.<?php echo $website->getUrl();?></a></li>
     					<?php $w++;?>
     				<?php endif;?>
     			<?php endforeach;?>
     			<?php if($w == 0):?>
     				<li>You Have No Website Permissions</li>
     			<?php endif; ?>
     			</ul>
     		<?php endif;?>
      </div>

                <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_email_address">
    <div class="label ui-helper-clearfix">
    <?php echo $form['email_address']->renderLabel('Available Location Access')?>
          </div>

			<?php if($sf_user->isSuperAdmin()):?>
			     			
			  <div class="sf_admin_flashes ui-widget">
			  <div class="notice ui-state-highlight ui-corner-all">
			    <span class="ui-icon ui-icon-info floatleft"></span>&nbsp;
			   Access to All Locations
			  </div>
			</div>
     			<ul class="location_access">
     			<?php foreach($states as $state):?>
     				<li><?php echo $state->getState()?> - <?php echo $state->getAbbreviation()?></li>
     			<?php endforeach;?>
     			</ul>
     		<?php else: ?>
     			<?php $s=0;?>
     			<ul class="location_access">
     			<?php foreach($states as $state):?>
     				<?php if( $sf_user->hasCredential('L'.$state->getAbbreviation())):?>
     					<li><?php echo $state->getState()?> - <?php echo $state->getAbbreviation()?></li>
     					<?php $s++;?>
     				<?php endif;?>
     			<?php endforeach;?>
     			<?php if($s == 0):?>
     				<li>You Have No Location Permissions</li>
     			<?php endif; ?>
     			</ul>
     		<?php endif;?>
      </div>
      </div>
	    		</div>



  </form>
</div>
  </div>

  <div id="sf_admin_footer">
      </div>

  </div>

