/**
 * @author Ghassan Idriss
 * @website http://www.splicedmedia.com
 * @package admin
 */
$(function () {		


	if( $("#websites_url"))
	{
		$('#websites_url').blur(function(e){
			$(this).val($(this).val().replace("http://", "").replace("www.", "").replace("/", ""));
		});
	}
	if( $("#add_website_javascript"))
	{
		$('#add_website_javascript').click(function(e){
			if(e) e.preventDefault();

			$('#javascripts_container')
			  .append('<br id="js_br_'+($('select.javascript').length + 1)+'" />').append($('#websites_javascripts_1')
					  .clone()
					  .attr('id', 'websites_javascripts_'+($('select.javascript').length + 1))
			);
			var delete_link = $('<a class="delete_website_javascript" href="#" rel="'+($('select.javascript').length)+'>Delete</a>').click(function(e){
				if(e) e.preventDefault();
				if($(this).attr('rel') != $('select.javascript').length)
				{
					alert('Delete Last First');
					return;
				}
				$('#websites_javascripts_'+$(this).attr('rel')).remove();
				$('#js_br_'+$(this).attr('rel')).remove();
				$(this).remove();
			});
			$('#javascripts_container').append(delete_link);
		});
	}
	
	if( $("#add_website_stylesheets"))
	{
		$('#add_website_stylesheet').click(function(e){
			if(e) e.preventDefault();
			
			$('#stylesheets_container')
			  .append('<br id="css_br_'+($('select.stylesheet').length + 1)+'" />')
			  .append($('#websites_stylesheets_1').clone()
					  .attr('id', 'websites_stylesheets_'+($('select.stylesheet').length + 1))
					  .attr('class','stylesheet')
			);
			var delete_link = $('<a class="delete_website_stylesheet" href="#" rel="'+($('select.stylesheet').length)+'>Delete</a>').click(function(e){
				if(e) e.preventDefault();
				if($(this).attr('rel') != $('select.stylesheet').length)
				{
					alert('Delete Last First');
					return;
				}
				$('#websites_stylesheets_'+$(this).attr('rel')).remove();
				$('#css_br_'+$(this).attr('rel')).remove();
				$(this).remove();
			});
			$('#stylesheets_container').append(delete_link);
		});
	}
	
	$('a.delete_website_javascript').click(function(e){
		if(e) e.preventDefault();
		if($(this).attr('rel') != $('select.javascript').length)
		{
			alert('Delete Last First');
			return;
		}
		$('#websites_javascripts_'+$(this).attr('rel')).remove();
		$('#js_br_'+$(this).attr('rel')).remove();
		$(this).remove();
		
	});
	
	$('a.delete_website_stylesheet').click(function(e){
		if(e) e.preventDefault();
		if($(this).attr('rel') != $('select.stylesheet').length)
		{
			alert('Delete Last First');
			return;
		}
		$('#websites_stylesheets_'+$(this).attr('rel')).remove();
		$('#css_br_'+$(this).attr('rel')).remove();
		$(this).remove();
		
	});
	
	
	if( $("#add_content_javascript"))
	{
		$('#add_content_javascript').click(function(e){
			if(e) e.preventDefault();

			$('#javascripts_container')
			  .append('<br id="js_br_'+($('select.javascript').length + 1)+'" />')
			  .append($('#content_javascripts_1')
				.clone()
				  .attr('id', 'content_javascripts_'+($('select.javascript').length + 1))
			);
			var delete_link = $('<a class="delete_content_javascript" href="#" rel="'+($('select.javascript').length)+'>Delete</a>').click(function(e){
				if(e) e.preventDefault();
				if($(this).attr('rel') != $('select.javascript').length)
				{
					alert('Delete Last First');
					return;
				}
				$('#content_javascripts_'+$(this).attr('rel')).remove();
				$('#js_br_'+$(this).attr('rel')).remove();
				$(this).remove();
			});
			$('#javascripts_container').append(delete_link);
		});
	}
	
	if( $("#add_content_stylesheets"))
	{
		$('#add_content_stylesheet').click(function(e){
			if(e) e.preventDefault();
			
			$('#stylesheets_container')
			  .append('<br id="css_br_'+($('select.stylesheet').length + 1)+'" />')
			  .append($('#content_stylesheets_1').clone()
					  .attr('id', 'content_stylesheets_'+($('select.stylesheet').length + 1))
					  .attr('class','stylesheet')
			);
			var delete_link = $('<a class="delete_content_stylesheet" href="#" rel="'+($('select.stylesheet').length)+'>Delete</a>').click(function(e){
				if(e) e.preventDefault();
				if($(this).attr('rel') != $('select.stylesheet').length)
				{
					alert('Delete Last First');
					return;
				}
				$('#content_stylesheets_'+$(this).attr('rel')).remove();
				$('#css_br_'+$(this).attr('rel')).remove();
				$(this).remove();
			});
			$('#stylesheets_container').append(delete_link);
		});
	}
	
	$('a.delete_content_javascript').click(function(e){
		if(e) e.preventDefault();
		if($(this).attr('rel') != $('select.javascript').length)
		{
			alert('Delete Last First');
			return;
		}
		$('#content_javascripts_'+$(this).attr('rel')).remove();
		$('#js_br_'+$(this).attr('rel')).remove();
		$(this).remove();
		
	});
	
	$('a.delete_content_stylesheet').click(function(e){
		if(e) e.preventDefault();
		if($(this).attr('rel') != $('select.stylesheet').length)
		{
			alert('Delete Last First');
			return;
		}
		$('#content_stylesheets_'+$(this).attr('rel')).remove();
		$('#css_br_'+$(this).attr('rel')).remove();
		$(this).remove();
		
	});
	
	if( $('#layouts_container'))
	{
		$('#layouts_container').tabs();
	}

	
});