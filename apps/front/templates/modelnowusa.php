				<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
  </head>
  <body>
  	<div class="container">
  		<div class="header">
		   <img src="<?php echo public_path('images/modelnow_logo.png')?>" alt="" />
  		</div>
  		<div class="content">
  			<?php echo $sf_content ?>
  		</div>
  		<div class="form-header"></div>
  		<div class="form-container">
  			<div class="form"><?php include_component('default','form')?></div>
  			<div class="bookings"><?php include_component('default','bookings')?></div>
  		</div>
  		<div class="footer">
  			<div class="fcontent">
  				Copyright <?php echo date('Y'); ?> Model Now <br /> <a href="<?php echo url_for('@content_by_slug?slug=model-now-disclaimer');?>" title="Disclaimer & Privacy Policy" class="thickbox">Read our Disclaimer & Privacy Policy</a>
  			</div>
  		</div>
  	</div>
    <?php include_javascripts() ?>



<script type="text/javascript"> if (!window.mstag) mstag = {loadTag : function(){},time : (new Date()).getTime()};</script><script id="mstag_tops"type="text/javascript"src="//flex.atdmt.com/mstag/site/8cd652b9-b4e6-4774-be4f-e7e6e6b2ce2e/mstag.js"></script><script type="text/javascript">mstag.loadTag("conversion", {cp:"5050",dedup:"1"})</script><noscript><iframe src="//flex.atdmt.com/mstag/tag/8cd652b9-b4e6-4774-be4f-e7e6e6b2ce2e/conversion.html?cp=5050&dedup=1"frameborder="0"scrolling="no"width="1"height="1"style="visibility:hidden;display:none"></iframe></noscript>


  </body>
</html>			