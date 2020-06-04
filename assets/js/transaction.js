/**
 * Receipt
 */
$(function () {
	// Modal Receipt
	$(".receipt-btn").on("click", function () {
		const id = $(this).data("id");
		$.ajax({
			url: `${url}transactions/getTransactionData`,
			method: "POST",
			data: { id: id },
			dataType: "json",
			success: function (data) {
				// console.log(data);
				$("#receiptModalLabel").html(`Receipt #${data.id}`);
				$("#csname").html(data.customer_name);
				$("#email").html(data.customer_email);
				$("#status").html(data.status);
				// convert unix_timestamp to date
				const date = new Date(data.paidAt * 1000)
					.toISOString()
					.slice(0, 19)
					.replace("T", " ");
				$("#date").html(date);
				const address = data.customer_address;
				const array = address.split("|");
				$("#address").html(
					`${array[0]} <br> ${array[1]} - ${array[3]}<br> ${array[2]} - ${array[4]}`
				);
				$("#sub-total-amount").html(
					`Sub - Total Amount : ${data.total_amount}`
				);
				$("#total").html(data.total_amount);
				getItem(data.order_id);
				// $("#test").html(`Receipt #${data.id}`);
			},
		});
	});

	// Load item list
	function getItem(id) {
		$.ajax({
			url: `${url}transactions/getTransactionItems`,
			method: "POST",
			data: { id: id },
			success: function (data) {
				// console.log(data);
				$("#show_data").html(data);
			},
		});
	}
});
