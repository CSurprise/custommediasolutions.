<div class="sf_admin_form_row sf_admin_text sf_admin_form_field_comments">
    <div class="label ui-helper-clearfix">
      <label for="submissions_comments">Comments</label>
          </div>
	<div style="width:100%;">
	<textarea name="submissions[comments]" id="submissions_comments" style="margin: 10px; width:95%; height: 300px;" rows="15" cols="120" ><?php echo $form->getObject()->getComments()?></textarea>
	</div>
</div>