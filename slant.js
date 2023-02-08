//Slideshow showing root products
var slanc = 0;
automate();

function automate() {
    var i;
    var sleek = document.getElementsByClassName("slant");
    for (i = 0; i < sleek.length; i++) {
        sleek[i].style.display = "none";  
    }
    slanc++;
    if (slanc > sleek.length) {slanc = 1}    
    sleek[slanc-1].style.display = "block";  
    setTimeout(automate, 5000); // Change image every 5 seconds
}