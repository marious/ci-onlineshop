const url = 'http://cicms.dev/admin/pages/order_ajax';
$.post(url, {}, function(data) {
	$('#orderResult').html(data);
})






