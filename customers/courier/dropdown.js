//show that the submission was successful
$(document).ready(function () {
	//call the form that would house the user report
	$('.courier_form').on('submit', function (e) {
		//prevent automatic submission of the form
		e.preventDefault();
		console.log('tough');
		//get all the data inside the report form
		//the THIS variable specifies that our data would come from the report form
		let formdata = new FormData(this);
		//the parameters of the append function are the id and name of the particular input that we would click
		formdata.append('add_courier', 'add_courier');

		$.ajax({
			//type of the form request
			type: 'POST',
			//server file to get the request from
			url: 'new_courier_code.php',
			data: formdata,
			contentType: false,
			processData: false,
			success: function (response) {
				if (response === 'success') {
					//if the courier was added, go to the list courier page
					window.location = 'dashboard.php';
				} else {
					const fail = document.querySelector('.successful_submission');
					fail.style.display = 'block';
				}
			},
		});

		//Close the box unsuccessful submission box
		const close = document.querySelector('#close');
		close.onclick = () => {
			const boxed = document.querySelector('.successful_submission');
			boxed.style.display = 'none';
		};
	});
});

//The tracking page AJAX
$(document).ready(function () {
	//call the form that would house the user report
	$('.track_form').on('submit', function (e) {
		//prevent automatic submission of the form
		e.preventDefault();
		console.log('move');
		//get all the data inside the report form
		//the THIS variable specifies that our data would come from the track courier
		let formdata = new FormData(this);
		//the parameters of the append function are the id and name of the particular submit input that we would click
		formdata.append('track_courier', 'track_courier');

		$.ajax({
			//type of the form request
			type: 'POST',
			//server file to get the request from
			url: 'track_courier_code.php',
			data: formdata,
			contentType: false,
			processData: false,
			success: function (response) {
				const show = document.querySelector('#firs');
				const track = document.querySelector('#trace');
				const container = document.querySelector('.options');
				show.textContent = response;
				container.style.display = 'block';
			},
		});

		const clos = document.querySelector('#clos');
		clos.onclick = () => {
			const options = document.querySelector('.options');
			options.style.display = 'none';
		};
	});
});
