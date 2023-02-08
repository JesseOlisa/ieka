
//Send farmers' signup details to the database with AJAX
const form = document.querySelector('.typing-area'),
sendBtn = form.querySelector('button'),
message = form.querySelector('.input-field'),
chatBox = document.querySelector('.chat-box');


//prevent automatic submission when you click the form
form.onsubmit = (e) => {
    e.preventDefault();
}

sendBtn.onclick = () => {
       //start AJAX
       let xhr = new XMLHttpRequest();
       xhr.onload = () => {
           if(xhr.readyState === XMLHttpRequest.DONE) {
               if(xhr.status === 200) {
                   //let the inputs become blank if the message is recorded in the database
                    message.value = '';
                    let data = xhr.response;
                    chatBox.innerHTML = data;
               }
           }
       }
       xhr.open("POST", "../farmers/insert-chat.php", true);
       let formData = new FormData(form);
       xhr.send(formData); //send the form data to php
}

//a function to show recently received chat
setInterval(()=> {
    //start the AJAX machine
    let xhr = new XMLHttpRequest();
    xhr.onload = ()=> {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                chatBox.innerHTML = data;
            }
        }
    }
    xhr.open("POST", "../farmers/retrieve.php", true);
    let formData = new FormData(form);
    xhr.send(formData);
}, 500);