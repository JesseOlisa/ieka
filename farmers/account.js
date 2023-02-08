$(document).ready(function() {
    //call the form that would house the user report
    $("#account").on("submit", function(e) {
        //prevent automatic submission of the form
        e.preventDefault();
        
        //get all the data inside the report form
        //the THIS variable specifies that our data would come from the report form
        let formdata = new FormData(this);
        //the parameters of the append function are the id and name of the particular input that we would click
        formdata.append("access", "access");

        const box = document.querySelector("#move");
        const feedback = document.getElementById("confirm");
        const issue = document.getElementById("issue");
        const farmer = document.getElementById("farmer_name");

        $.ajax({
            //type of the form request
            type: "POST",
            //server file to get the request from
            url: "account_code.php",
            data: formdata,
            contentType: false,
            processData: false,
            success: function(response) {
                if(response === "Successful") {
                    issue.value = '';
                    farmer.value = '';
                    box.style.display = "block";

                } else {
                    feedback.textContent = "Dear farmer, your report has'nt gotten to us";
                }
            }
        });
    });
    console.log("Love");
    //close the enquiry response box
    $("#close").on("click", function() {
        const container = document.querySelector("#move");
        container.style.display = "none";
    });    

});
