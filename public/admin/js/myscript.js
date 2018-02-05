$(document).ready(function() {
    $('#dataTables-example').DataTable({
            responsive: true
    });
});

$("div.alert").delay(3000).slideUp();

function xacnhanxoa (msg) {
	if (window.confirm(msg)) {
		return true;
	}
	return false;
}

$(document).ready(function() {
	$("#addImages").click(function() {
		$("#insert_image").append('<div class="form-group"><input type="file" name="fEditDetail[]"></div>');
	});
});

$(document).ready(function() {
	$("a#del-img_demo").on('click', function() {
		var url = "http://localhost/framework/laravel/Laravel_Project/admin/product/delimg/";
		var _token = $("form[name='frmEditProduct']").find("input[name='_token']").val();
		var idHinh = $(this).parent().find("img").attr("idHinh");
		var img = $(this).parent().find("img").attr("src");
		var rid = $(this).parent().find("img").attr("id");
		$.ajax({
			url: url + idHinh,
			type: 'POST',
			cache: false,
			date: {"_token":_token, "idHinh":idHinh, "urlHinh":img},
			success: function(data) {
				if(daata == "Oke")
					$("#"+rid).remove();
				else
					alert("Error!!");
			}
		});
	});
});