$(document).ready(function () {
	setInterval(function () {
		//if there is no farm id in the search box on the users page
		if (!$('#find').val()) {
			$.ajax({
				url: '../customers/show-chats.php',
				type: 'POST',
				success: function (data) {
					$('#users').html(data);
				},
			});
		} else {
			$('#find').on('keyup', function () {
				let search = $(this).val();
				$.ajax({
					url: '../customers/chatList.php',
					type: 'POST',
					data: { search: search },
					success: function (data) {
						$('#users').html(data);
					},
				});
			});
		}
	}, 500);
});
