
const form = document.querySelector(".typing-area"),
input = form.querySelector(".input-field"),
send = form.querySelector("button");
const chatbox = document.querySelector(".chat-box");

form.onsubmit = (e) => {
    e.preventDefault();
}

send.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "insert-chat.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                input.value = '';
                let data = xhr.response;
                chatbox.innerHTML = data;
                scrollToBottom();
            }
        }
    }
    let formdata = new FormData(form);
    xhr.send(formdata);
}

chatbox.onmouseenter = () => {
    chatbox.classList.add('active');
}

chatbox.onmouseleave = () => {
    chatbox.classList.remove('active');
}

setInterval(()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "retrieve.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                chatbox.innerHTML = data;
                if(!chatbox.classList.contains('active')) {
                    scrollToBottom();
                }
                
                
            }
        }
    }
    let formdata = new FormData(form);
    xhr.send(formdata);
}, 500);

//let chat scroll up automatically
function scrollToBottom() {
    chatbox.scrollTop = chatbox.scrollHeight;
}