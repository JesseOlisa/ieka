//get the clickable button to show the hidden elements
const button = document.querySelector(".courier-btn");

button.onclick = () => {
    const courier_details = document.querySelector(".courier_details");
    if(courier_details.style.display === "") {
        courier_details.style.display = "block";
    }else {
        courier_details.style.display = "";
    } 
      
}

console.log("loce");

//The tracking page AJAX
$(document).ready(function() {
    //call the form that would house the user report
    $(".track_form").on("submit", function(e) {
        //prevent automatic submission of the form
        e.preventDefault();
        console.log("move");
        //get all the data inside the report form
        //the THIS variable specifies that our data would come from the track courier
        let formdata = new FormData(this);
        //the parameters of the append function are the id and name of the particular submit input that we would click
        formdata.append("track_courier", "track_courier");

    

        $.ajax({
            //type of the form request
            type: "POST",
            //server file to get the request from
            url: "track_courier_code.php",
            data: formdata,
            contentType: false,
            processData: false,
            success: function(response) {
                const show = document.querySelector("#firs");
                const track = document.querySelector("#trace");
                const container = document.querySelector(".options");
                show.textContent = response;
                container.style.display = "block";
            }
        });

        const clos = document.querySelector("#clos");
        clos.onclick = () => {
            const options = document.querySelector(".options");
            options.style.display = "none";
        }
    });
});