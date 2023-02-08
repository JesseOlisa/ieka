//the modal div
console.log("Mine");
const cancel = document.querySelector(".cancel");
const del = document.querySelector(".delete");
const yes = document.querySelector("#delete");
const no = document.querySelector("#no");

//show the cancel dialog box
del.onclick = () => {
    cancel.style.display = "block";
}

//close the cancel dialog box if 'no' is clicked
no.onclick = () => {
    cancel.style.display = "none";
}

//delete the query from the database
$(".modal").on("submit", function(e) {
    e.preventDefault();
    console.log("delete");
    let formdata = new FormData(this);

    formdata.append("delete", "delete");

    $.ajax({
        //type of the form request
        type: "POST",
        //server file to get the request from
        url: "cancel.php",
        data: formdata,
        contentType: false,
        processData: false,
        success: function(response) {
            if(response === "success") {
                //if the courier was deleted, go to the list courier page
                window.location = "list_courier.php";
            } 
        }
    });
});