
$(document).ready(function() {
    $("#login").on("submit", function(e) {
        e.preventDefault();

        //get all the form data
        let formData = new FormData(this);
        formData.append("form-body", "form-body");

        $.ajax({
            type: "POST",
            url: "./customer_login.php",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if(response == "success") {
                    location.href = "./customers/index.php";
                }else {
                    $("#prompt").css("display", "block");
                    $("#prompt").html(response);
                }
            }
        });
    });
});