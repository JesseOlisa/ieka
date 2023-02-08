
//AJAX for submitting the customer registration form
$(document).ready(function() {
    $("#signup-data").on("submit", function(e) {
        e.preventDefault();

        //get all the form data
        let formData = new FormData(this);
        formData.append("signup", "signup");

        $.ajax({
            type: "POST",
            url: "./customer_signup_code.php",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if(response == "success") {
                    location.href = "./customer-login.php";
                }else {
                    $("#error").css("display", "block");
                    $("#error").html(response);
                }
            }
        });
    });
});


//AJAX for submitting the customer report form
$(document).ready(function() {
    $("#report").on("submit", function(e) {
        e.preventDefault();
        console.log("Yes");

        //get all the form data
        let formData = new FormData(this);
        formData.append("complaints", "complaints");

        $.ajax({
            type: "POST",
            url: "../customers/report_code.php",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if(response == "success") {
                    alert("form was submitted");
                   // location.href = "./customer-login.php";
                }else {
                    $("#error").css("display", "block");
                    $("#error").html(response);
                }
            }
        });
    });
});