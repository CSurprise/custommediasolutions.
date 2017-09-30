  
          <?php echo $helper->linkToNew(array(  'params' => 'class= fg-button ui-state-default  ',  'class_suffix' => 'new',  'label' => 'New',)) ?>
 		<?php if($sf_user->hasCredential('CoreSubmissionsPrint')):?>
    	<li class="sf_admin_action_new">
    		<a href="<?php echo url_for('@submissions?sub_action=print')?>">Print Results</a>
    	</li>
    	<?php endif; ?>
    	
    	<?php if($sf_user->hasCredential('CoreSubmissionsExport')):?>
    	<li class="sf_admin_action_new">
    		<a href="<?php echo url_for('@submissions?sub_action=export')?>">Export Results to CSV</a>
    	</li>
    	<?php endif; ?>
  