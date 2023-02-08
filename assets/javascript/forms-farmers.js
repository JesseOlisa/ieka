
$(document).ready(function() {
    $("#signup-data").on("submit", function(e) {
        e.preventDefault();

        //get all the form data
        let formData = new FormData(this);
        formData.append("signup", "signup");
        console.log("yes");
        $.ajax({
            type: "POST",
            url: "./farmer_signup_code.php",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if(response == "success") {
                    location.href = "./farmer-login.php";
                }else {
                    const error = document.querySelector(".error");
                    error.textContent = response;
                    error.style.display = "block";
                }
            }
        });
    });
});