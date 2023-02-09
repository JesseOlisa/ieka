//Slideshow showing root products
var slanco = 0;
automatic();

function automatic() {
	var i;
	var sleek = document.getElementsByClassName('sleek');
	for (i = 0; i < sleek.length; i++) {
		sleek[i].style.display = 'none';
	}
	slanco++;
	if (slanco > sleek.length) {
		slanco = 1;
	}
	sleek[slanco - 1].style.display = 'flex';
	setTimeout(automatic, 3000); // Change image every 6 seconds
}
