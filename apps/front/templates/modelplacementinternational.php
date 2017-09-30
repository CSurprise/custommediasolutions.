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
  			<div class="head-logo"><img src="<?php echo public_path('images/header_logo.jpg')?>" alt="Model Placement International"/></div>
		    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="756" height="209">
		      <param name="movie" value="<?php echo public_path('swf/')?>banner.swf" />
		      <param name="quality" value="high" />
		      <embed src="<?php echo public_path('swf/')?>banner.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="756" height="209"></embed>
		    </object>
  		</div>
  		<div class="content">
  			<?php echo $sf_content ?>
  		</div>
  		<div class="form-header"></div>
  		<div class="form-container">
  			<div class="form"><?php include_component('default','form')?></div>
  			<div class="bookings"><?php include_component('default','bookings')?></div>
  		</div>
<!-- Place this tag where you want the +1 button to render -->
<g:plusone size="tall" annotation="inline"></g:plusone>

<!-- Place this render call where appropriate -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
  		<div class="footer">
  			<div class="fcontent">
  				Copyright <?php echo date('Y'); ?> Model Placement International <br /> <a href="<?php echo url_for('@content_by_slug?slug=model-placement-disclaimer');?>" title="Disclaimer & Privacy Policy" class="thickbox">Read our Disclaimer & Privacy Policy</a>
  			</div>
  		</div>
  	</div>
    <?php include_javascripts() ?>


<script src="//ah8.facebook.com/js/conversions/tracking.js"></script><script type="text/javascript">
try {
  FB.Insights.impression({
     'id' : 6002638710633,
     'h' : '3392939b71',
     'value' : 2.5// you can change this dynamically
  });
} catch (e) {}
</script>
<script type="text/javascript"> if (!window.mstag) mstag = {loadTag : function(){},time : (new Date()).getTime()};</script><script id="mstag_tops"type="text/javascript"src="//flex.atdmt.com/mstag/site/8cd652b9-b4e6-4774-be4f-e7e6e6b2ce2e/mstag.js"></script><script type="text/javascript">mstag.loadTag("conversion", {cp:"5050",dedup:"1"})</script><noscript><iframe src="//flex.atdmt.com/mstag/tag/8cd652b9-b4e6-4774-be4f-e7e6e6b2ce2e/conversion.html?cp=5050&dedup=1"frameborder="0"scrolling="no"width="1"height="1"style="visibility:hidden;display:none"></iframe></noscript>

  </body>
</html>			