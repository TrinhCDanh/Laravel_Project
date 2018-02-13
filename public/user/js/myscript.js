$(document).ready(function () {
	$(".updatecart").click(function () {
		var rowId = $(this).attr('id');
		var qty = $(this).parent().parent().find(".qty").val();
		var _token = $("input[name='_token']").val();
		$.ajax({
			url: 'http://localhost/framework/laravel/Laravel_Project/cap-nhat/'+rowId+'/'+qty,
			type: 'GET',
			cache: false,
			data: {"_token":_token,"id":rowId,"qty":qty},
			success: function(data) {
				if (data == "oke")
					window.location = "gio-hang";
			}
		});
	});
});