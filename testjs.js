$( document ).ready(function() {
	$('#bulkhead').click(function() {
		var header = $(this).attr('name');
		var value = $('.' + header).first().val();
		$('.' + header).val(value);
	});
});