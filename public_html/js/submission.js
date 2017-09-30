/**
 * @author Ghassan
 */
$(function () {		

	$("#submission_form").validationEngine({
	      inlineValidation: true,
	});
	
	
	$('#submissions_phone_0').keyup(function(e) {
		if($(this).val().length == $(this).attr('maxlength'))
		{
			$('#submissions_phone_1').focus();
		}
	});

	$('#submissions_phone_1').keyup(function(e) {

		if($(this).val().length == $(this).attr('maxlength'))
		{
			$('#submissions_phone_2').focus();
		}
	});
	
	$('#submissions_cell_0').keyup(function(e) {

		if($(this).val().length == $(this).attr('maxlength'))
		{
			$('#submissions_cell_1').focus();
		}
	});

	$('#submissions_cell_1').keyup(function(e) {

		if($(this).val().length == $(this).attr('maxlength'))
		{
			$('#submissions_cell_2').focus();
		}
	});
	
});