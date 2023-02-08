$(document).ready(function() {
    //call the form that would house the user report
    $(".courier_form").on("submit", function(e) {
        //prevent automatic submission of the form
        e.preventDefault();
        console.log("tough");
        //get all the data inside the report form
        //the THIS variable specifies that our data would come from the report form
        let formdata = new FormData(this);
        //the parameters of the append function are the id and name of the particular input that we would click
        formdata.append("add_courier", "add_courier");

    

        $.ajax({
            //type of the form request
            type: "POST",
            //server file to get the request from
            url: "edit.php",
            data: formdata,
            contentType: false,
            processData: false,
            success: function(response) {
                if(response === "success") {
                    //if the courier was added, go to the list courier page
                    window.location = "view.php";
                } 
            }
        });
    });
});