
$(document).ready(function() {
    $("#signup-data").on("submit", function(e) {
        e.preventDefault();

        //get all the form data
        let formData = new FormData(this);
        formData.append("signup", "signup");

        $.ajax({
            type: "POST",
            url: "./admin_signup_code.php",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if(response == "success") {
                    location.href = "./admin-login.php";
                }else {
                    $("#error").css("display", "block");
                    $("#error").html(response);
                }
            }
        });
    });
});