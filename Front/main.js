document.querySelector(".opener").addEventListener(('click'), (e) => {
    const button = e.target.parentElement
    button.classList.toggle("chat-closed")
    const chatbot = button.parentElement.firstElementChild
    chatbot.classList.toggle("closed")
})

let imageOneVisible = false;
function switchImages() {
    if (imageOneVisible) {
        document.getElementById("eye").style.display = "none";
        document.getElementById("eye-crossed").style.display = "block";
        document.getElementById("password").type = "password";
        document.getElementById("password").type = "text";
        imageOneVisible = false;
    } else {
        document.getElementById("eye").style.display = "block";
        document.getElementById("eye-crossed").style.display = "none";
        document.getElementById("password").type = "password";
        imageOneVisible = true;
    }
}
switchImages()

let imageOneVisible1 = false;
function switchImages1() {
    if (imageOneVisible1) {
        document.getElementById("eye1").style.display = "none";
        document.getElementById("eye-crossed1").style.display = "block";
        document.getElementById("password1").type = "password";
        document.getElementById("password1").type = "text";
        imageOneVisible1 = false;
    } else {
        document.getElementById("eye1").style.display = "block";
        document.getElementById("eye-crossed1").style.display = "none";
        document.getElementById("password1").type = "password";
        imageOneVisible1 = true;
    }
}
switchImages1()

new rive.Rive({
    src: "./animation-final.riv",
    stateMachines: 'State Machine 1',
    canvas: document.getElementById("bouton"),
    autoplay: true
});

document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector("#send-message")

    const formTextarea = document.querySelector("#reponse")
    const formSend = document.querySelector("#send")
    formTextarea.addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            formSend.click()
        }
    });

    const input = form.querySelector('[name="message"]')
    form.addEventListener('submit', (e) => {
        e.preventDefault()
        message = input.value
        addMessage('user', message)
        input.value = ""
        fetch('http://localhost:8000/api/chatbot?q=' + message)
            .then(response => response.json())
            .then(data => {
                addMessage('bot', data)
            })
        input.value = ""
    })



})


function addMessage(role, message) {
    let div = document.createElement('div')
    div.classList.add(role, 'message')
    let p = document.createElement('p')
    p.innerText = message
    div.appendChild(p)
    document.querySelector(".messages").appendChild(div)
    document.querySelector("textarea").value = ""
}