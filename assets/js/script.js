// File input
$(".custom-file-input").on("change", function () {
	let fileName = $(this).val().split("\\").pop();
	$(this).next(".custom-file-label").addClass("selected").html(fileName);
});

/**
 * Edit category
 */
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

/**
 * Edit supplier data
 */
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

		// Supplier Id
		const id = $(this).data("id");
		// Get Supplier data by Id
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

/**
 * Edit customer data
 */
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

		// Customer Id
		const id = $(this).data("id");
		// Get Customer data by Id
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

/**
 * Add outgoing product (order)
 * Get total price
 * Add items
 * Remove items
 */
$(function () {
	getTotal();

	function getTotal() {
		$.get(`${url}orders/getTotal`, function (data) {
			// console.log(data);
			$("#totalAmount").text(data);
		});
	}

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
					getTotal();
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
		$.post(
			`${url}orders/addItem`,
			{
				id: id,
				product_name: product_name,
				qty: qty,
				unit: unit,
				price: price,
				subtotal: subtotal,
			},
			function (data) {
				// fetchProductOrder();
				$("#show_data").html(data);
				getTotal();
			}
		);
	});

	// Load items list
	$("#show_data").load(`${url}orders/load_items`);
	// Remove an item
	$(document).on("click", ".romove_cart", function () {
		var row_id = $(this).attr("id");
		$.ajax({
			url: `${url}orders/delete_item`,
			method: "POST",
			data: { row_id: row_id },
			success: function (data) {
				$("#show_data").html(data);
				getTotal();
			},
		});
	});
});

/**
 * Update invoice status
 */
$(function () {
	$("#status").on("change", function () {
		const id = $("#id").val();
		const status = $("#status").val();
		const order_id = $("#order_id").val();
		$.post(
			`${url}invoices/updateStatus`,
			{ id: id, status: status, order_id: order_id },
			function () {
				Swal({
					title: "Success",
					text: "Status changed!",
					type: "success",
				});
			}
		);
	});
});
