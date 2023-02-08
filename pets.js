//Slideshow showing root products
var pets = 0;
automat();

function automat() {
    var i;
    var slay = document.getElementsByClassName("slay");
    for (i = 0; i < slay.length; i++) {
        slay[i].style.display = "none";  
    }
    pets++;
    if (pets > slay.length) {pets = 1}    
    slay[pets-1].style.display = "block";  
    setTimeout(automat, 4000); // Change image every 6 seconds
}