// SWEETALERT
const flashData = $(".flash-data").data("flashdata");

if (flashData) {
	Swal({
		title: "Success",
		text: flashData,
		type: "success",
	});
}

// Delete button
$(".del-btn").on("click", function (e) {
	e.preventDefault();
	const href = $(this).attr("href");

	Swal({
		title: "Are you sure?",
		text: "",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Delete",
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});
