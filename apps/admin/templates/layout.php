<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>	
    <?php if($sf_request->getParameter('module') == 'content'):?>
	<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
	//<![CDATA[
	bkLib.onDomLoaded(function() {
	new nicEditor({fullPanel : true}).panelInstance('content_content');
	});
	//]]>
	</script>	
    <?php endif;?>						
  </head>
  <body>
  	<div class="container">
	  	<div class="header">
			<h1 class="fg-toolbar ui-widget-header ui-corner-top">
				<?php echo sfConfig::get('app_admin_title','UNDEFINED')?>
			</h1>
	  	</div>
	  	<div class="nav">
	  		<div class="ui-state-default">
	  		    <?php if($sf_user->hasCredential('CoreWebsitesAdmin')):?>
		  		<a class="nav_item" href="<?php echo url_for('websites/index');?>" title="Websites">Websites</a>
		  		<?php endif; ?>
		  		
		  		<a class="nav_item" href="<?php echo url_for('submissions/index');?>" title="Submissions">Submissions</a>
		  		
		  		<?php if($sf_user->hasCredential('CoreBookingsAdmin')):?>		  		
		  		<a class="nav_item" href="<?php echo url_for('bookings/index');?>" title="Bookings">Bookings</a>
		  		<?php endif; ?>
		  		
		  		<?php if($sf_user->hasCredential('CoreStatesAdmin')):?>
		  		<a class="nav_item" href="<?php echo url_for('states/index');?>" title="States">States</a>
		  		<?php endif; ?>
		  		
		  		<?php if($sf_user->hasCredential('CoreContentAdmin')):?>
		  		<a class="nav_item" href="<?php echo url_for('content/index');?>" title="Content">Content</a>
		  		<a class="nav_item" href="<?php echo url_for('layouts/index');?>" title="Layouts">Layouts</a>
		  		<?php endif; ?>
		  		
		  		<?php if($sf_user->isSuperAdmin()):?>
		  		<a class="nav_item" href="<?php echo url_for('@sf_guard_user');?>" title="Users">Users</a>
		  		<a class="nav_item" href="<?php echo url_for('config/index');?>" title="Configuration">Configuration</a>
		  		<?php endif; ?>
		  		
		  		<a class="nav_item" href="<?php echo url_for('default/my_account');?>" title="My Account">My Account</a>
	  			<a class="nav_item" href="<?php echo url_for('@sf_guard_signout');?>" title="Log Out">Log Out as <?php echo $sf_user->getUsername()?></a>
	  		
	  		</div>
	  	</div>
	    <div class="body"><?php echo $sf_content ?></div>
	    <div class="footer">&copy; 2010 <?php echo sfConfig::get('app_admin_title','UNDEFINED')?> ~ <a href="http://www.splicedmedia.com" target="_blank" title="Spliced Media L.L.C">Developed by Spliced Media</a></div>
    </div>
  </body>
</html>
