/**
 * Receipt
 */
$(function () {
	$(".receipt-btn").on("click", function () {
		const id = $(this).data("id");
		$.ajax({
			url: `${url}transactions/getTransactionData`,
			method: "POST",
			data: { id: id },
			dataType: "json",
			success: function (data) {
				console.log(data);
				$("#receiptModalLabel").html(`Receipt #${data.id}`);
				// $("#test").html(`Receipt #${data.id}`);
				// $("#code").val(data.total_amount);
			},
		});
	});
});
