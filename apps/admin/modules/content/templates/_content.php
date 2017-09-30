<div class="sf_admin_form_row sf_admin_text sf_admin_form_field_comments">
    <div class="label ui-helper-clearfix">
      <?php echo $form['content']->renderLabel()?>
          </div>
	<div style="width: 600px;">
	<textarea name="content[content]" id="content_content" style="margin: 10px; width:800px; height: 500px;"><?php echo $form->getObject()->getContent()?></textarea>
	</div>
</div>