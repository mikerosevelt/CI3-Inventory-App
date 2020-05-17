// Edit Category
$(function () {
	$("#btnAddCategory").on("click", function () {
		$("#formModalLabel").html("Add New Category");
		$(".modal-footer button[type=submit]").html("Add");
		$(".modal-body form").attr("action", `${url}products/categories`);
	});

	$(".edit-btn").on("click", function () {
		$("#formModalLabel").html("Edit Category");
		$(".modal-footer button[type=submit]").html("Save");
		$(".modal-body form").attr("action", `${url}products/editCategory`);

		const id = $(this).data("id");

		$.ajax({
			url: "http://localhost/gudang/products/getSingleCategory",
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#category").val(data.category);
				$("#status").val(data.isActive);
				$("#id").val(data.id);
			},
		});
	});
});
