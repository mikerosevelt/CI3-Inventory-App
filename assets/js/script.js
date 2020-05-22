// File input
$(".custom-file-input").on("change", function () {
	let fileName = $(this).val().split("\\").pop();
	$(this).next(".custom-file-label").addClass("selected").html(fileName);
});

// Edit Category
$(function () {
	// Add button
	$("#btnAddCategory").on("click", function () {
		$("#formModalLabel").html("Add New Category");
		$(".modal-footer button[type=submit]").html("Add");
		$(".modal-body form").attr("action", `${url}products/categories`);
	});

	// Edit button
	$(".edit-btn").on("click", function () {
		$("#formModalLabel").html("Edit Category");
		$(".modal-footer button[type=submit]").html("Save Changes");
		$(".modal-body form").attr("action", `${url}products/editCategory`);

		// Category Id
		const id = $(this).data("id");
		// Get category data by Id
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

// Edit Supplier
$(function () {
	// Add button
	$("#btnAddCategory").on("click", function () {
		$("#supplierModalLabel").html("Add New Supplier");
		$(".modal-footer button[type=submit]").html("Add");
		$(".modal-body form").attr("action", `${url}suppliers`);
	});

	// Edit button
	$(".edit-btn").on("click", function () {
		$("#supplierModalLabel").html("Edit Supplier");
		$(".modal-footer button[type=submit]").html("Save Changes");
		$(".modal-body form").attr("action", `${url}suppliers/update`);

		// Category Id
		const id = $(this).data("id");
		// Get category data by Id
		$.ajax({
			url: "http://localhost/gudang/suppliers/getSingleSupplier",
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#id").val(data.id);
				$("#code").val(data.code);
				$("#name").val(data.name);
				$("#email").val(data.email);
				$("#phone").val(data.phone);
				$("#address").val(data.address);
				$("#city").val(data.city);
				$("#state").val(data.state);
				$("#postcode").val(data.postcode);
				$("#country").val(data.country);
			},
		});
	});
});

// Edit Customer
$(function () {
	// Add button
	$("#btnAddCustomer").on("click", function () {
		$("#addCustomerModalLabel").html("Add New Customer");
		$(".modal-footer button[type=submit]").html("Add");
		$(".modal-body form").attr("action", `${url}customers`);
	});

	// Edit button
	$(".edit-btn").on("click", function () {
		$("#addCustomerModalLabel").html("Edit Customer");
		$(".modal-footer button[type=submit]").html("Save Changes");
		$(".modal-body form").attr("action", `${url}customers/update`);

		// Category Id
		const id = $(this).data("id");
		// Get category data by Id
		$.ajax({
			url: `${url}customers/getSingleCustomer`,
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#id").val(data.id);
				$("#name").val(data.name);
				$("#email").val(data.email);
				$("#phone").val(data.phone);
				$("#address").val(data.address);
				$("#city").val(data.city);
				$("#state").val(data.state);
				$("#postcode").val(data.postcode);
				$("#country").val(data.country);
			},
		});
	});
});

// Add outgoing product (order)
$(function () {
	function fetchProductOrder() {
		$.ajax({
			url: `${url}orders/fetchProductOrder`,
			method: "get",
			dataType: "json",
			success: function (res) {
				console.log(res);
			},
		});
	}
	fetchProductOrder();

	$("#product").on("change", function () {
		// Product Id
		const id = $(this).find(":selected").val();

		$.ajax({
			url: `${url}orders/getDataProduct`,
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#qty").val(1);
				$("#unit").val(data.unit);
				$("#price").val(data.price);
				$("#subtotal").val(data.price);

				$("#qty").on("change", function () {
					let total = $(this).val() * $("#price").val();
					$("#subtotal").val(total);
				});
			},
		});
	});

	$(".btn-add-product").on("click", function () {
		const id = $("#product").find(":selected").val();
		const product_name = $("#product").find(":selected").text();
		const qty = $("#qty").val();
		const unit = $("#unit").val();
		const price = $("#price").val();
		const subtotal = $("#subtotal").val();

		$.ajax({
			url: `${url}orders/addProductOrder`,
			data: {
				id: id,
				product_name: product_name,
				qty: qty,
				unit: unit,
				price: price,
				subtotal: subtotal,
			},
			method: "post",
			dataType: "json",
			success: function () {
				console.log("saved");
				fetchProductOrder();
			},
		});
	});
});
