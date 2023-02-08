//show the login dialog box
var loginBtn = document.querySelector('.login-button');
var signUpBtn = document.querySelector('.signup-button');
var loginForm = document.querySelector('#dropdown-login');
var signUpForm = document.querySelector('#dropdown-signup');
loginBtn.addEventListener('click', function () {
	console.log();
	if (loginForm.style.display === '') {
		// this checks if the signup block is open
		if ((signUpForm.style.display = 'block')) {
			signUpForm.style.display = '';
		}
		loginForm.style.display = 'block';
	} else {
		loginForm.style.display = '';
	}
});
// loginBtn.addEventListener('blur', function () {
// 	signUpForm.style.display = '';
// });
signUpBtn.addEventListener('click', function () {
	if (signUpForm.style.display === '') {
		if ((loginForm.style.display = 'block')) {
			loginForm.style.display = '';
		}
		signUpForm.style.display = 'block';
	} else {
		signUpForm.style.display = '';
	}
});

//the slideshow after the navbar
/**for the next-and-previous controls */
var slideIndex = 1;
slide(slideIndex);
automaticSlide();

function plusSlides(n) {
	slide((slideIndex += n));
}

function currentSlide(n) {
	slide((slideIndex = n));
}

function slide(n) {
	var i;
	var slides = document.getElementsByClassName('photo');
	var dots = document.getElementsByClassName('dot');
	if (n > slides.length) {
		slideIndex = 1;
	}
	if (n < 1) {
		slideIndex = slides.length;
	}
	for (i = 0; i < slides.length; i++) {
		slides[i].style.display = 'none';
	}
	for (i = 0; i < dots.length; i++) {
		dots[i].className = dots[i].className.replace(' active', '');
	}
	slides[slideIndex - 1].style.display = 'block';
	dots[slideIndex - 1].className += ' active';
}

/**for automatic controls */
function automaticSlide() {
	var i;
	var slides = document.getElementsByClassName('photo');
	var dots = document.getElementsByClassName('dot');
	for (i = 0; i < slides.length; i++) {
		slides[i].style.display = 'none';
	}
	slideIndex++;
	if (slideIndex > slides.length) {
		slideIndex = 1;
	}
	for (i = 0; i < dots.length; i++) {
		dots[i].className = dots[i].className.replace(' active', '');
	}
	slides[slideIndex - 1].style.display = 'block';
	dots[slideIndex - 1].className += ' active';
	setTimeout(automaticSlide, 6000); // Change image every 6 seconds
}

//Slideshow showing cereals products
var showco = 1;
automaticslide();

function automaticslide() {
	var i;
	var show = document.getElementsByClassName('slope');
	for (i = 0; i < show.length; i++) {
		show[i].style.display = 'none';
	}
	showco++;
	if (showco > show.length) {
		showco = 1;
	}
	show[showco - 1].style.display = 'block';
	setTimeout(automaticslide, 5000); // Change image every 6 seconds
}

var farmer_product_ids = [];
//getting the farmer details from the database and show in an overlayed board
$('.search-list').on('click', 'li', null, function (event) {
	//get the <li> element containing the results
	var clickedElement = event.currentTarget;
	//get the id of the input
	var farmer_id = clickedElement.dataset.id;

	if (farmer_product_ids.indexOf(farmer_id) === -1) {
		var url = document.location.origin + '/ieka/get_farmer.php';
		$.get(url, { farmer_id: farmer_id }, function (response) {
			//convert the response from a JSON object to a Javascript object
			var farmer = JSON.parse(response);

			//show the format that the data would appear
			var tempData =
				'<div class="show-farmer">' +
				'<div class="show-details">' +
				'<div class="show-personal" id="personal-' +
				farmer.id +
				'">' +
				'<p id="name-' +
				farmer.id +
				'"><strong>Name:</strong> ' +
				farmer.first_name +
				' ' +
				farmer.last_name +
				'</p>' +
				'<p id="phone-' +
				farmer.id +
				'"><strong>Phone Number:</strong> ' +
				farmer.phone +
				'</p>' +
				'<p id="mail-' +
				farmer.id +
				'"><strong>email:</strong> ' +
				farmer.email +
				'</p>' +
				'<p id="address-' +
				farmer.id +
				'"><strong>address:</strong> ' +
				farmer.address +
				', ' +
				farmer.residence_state +
				', ' +
				farmer.residence_country +
				'</p>' +
				'<p id="gender-' +
				farmer.id +
				'"><strong>gender:</strong> ' +
				farmer.gender +
				'</p> ' +
				'</div>' +
				'<div class="show-farm" id="farm-info-' +
				farmer.id +
				'">' +
				'<p id="agros-' +
				farmer.id +
				'"><strong>agro products:</strong> ' +
				farmer.agro_products +
				'</p>' +
				'<p id="farm-ad-' +
				farmer.id +
				'"><strong>farm address:</strong> ' +
				farmer.farm_address +
				', ' +
				farmer.farm_state +
				'</p>' +
				'<p id="farm-co-' +
				farmer.id +
				'"><strong>farm country:</strong> ' +
				farmer.farm_country +
				'</p>' +
				'<p id="farm-nat-' +
				farmer.id +
				'"><strong>farmer nationality:</strong> ' +
				farmer.country_of_origin +
				'</p>' +
				'<div/>' +
				'<div class="enter-and-exit">' +
				'<p>' +
				'<span class="chat-with-farmer">Like this farmer? <a href="" name=""id="chat-farmer-' +
				farmer.id +
				'">Bargain with the farmer </a></span>' +
				'<span class="search-another"><a href="index.php" class="second_search">Search for another farmer </a></span>' +
				'</p>';
			('</div>');

			//store the data in the array
			farmer_product_ids.push(farmer.id);

			//append this to the table body
			$('.overlay').append(tempData);
			document.querySelector('.overlay').style.display = 'block';

			clearSearchInput();
		});
	} else {
		clearSearchInput();
	}
});

function clearSearchInput() {
	document.getElementById('search-list').style.display = 'none';
	document.getElementById('search').value = '';
}

//check if the account is logged in before trying to report a buyer or seller
const report = document.getElementsByClassName('report');
const error = document.getElementById('show_error');

report.onclick = () => {
	let xhr = XMLHttpRequest();
	xhr.onload = () => {
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = response;
				if (data !== 'success') {
					error.textContent = data;
					error.style.display = 'block';
				}
			}
		}
	};
	xhr.open('POST', './farmer_signup_code.php', true);
	let formData = new FormData(form);
	xhr.send(formData);
};
