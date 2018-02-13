$(document).ready(function () {
	$(".updatecart").click(function () {
		var rowId = $(this).attr('id');
		var qty = $(this).parent().parent().find(".qty").val();
		var _token = $("input[name='_token']").val();
		alert(_token);
	});
});