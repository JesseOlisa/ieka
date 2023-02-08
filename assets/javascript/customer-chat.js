/*$("#typing-area").on("submit", function(e) {
    console.log('yes');
    //prevent the form from submitting on its own
    e.preventDefault();
    //get the message from the input field
    let formdata = new FormData(this);
    formdata.append("send", "send");

    $.ajax({
        type: "POST",
        url: "./customers/insert-chat.php",
        data: formdata,
        contentType: false,
        processData: false,
        success: function(data) {

        }
    });
    $("#input-field").val();
});*/


const form = document.querySelector(".typing-area"),
input = form.querySelector(".input-field"),
send = form.querySelector("button");
const chatbox = document.querySelector(".chat-box");

form.onsubmit = (e) => {
    e.preventDefault();
}

send.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../customers/insert-chat.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                input.value = '';
                chatbox.innerHTML = data;
            }
        }
    }
    let formdata = new FormData(form);
    xhr.send(formdata);
}

/*setInterval(()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "retrieve.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                chatbox.innerHTML = data;
                
            }
        }
    }
    let formdata = new FormData(form);
    xhr.send(formdata);
}, 500);*/