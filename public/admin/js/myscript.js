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