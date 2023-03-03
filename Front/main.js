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
    src: "./newFile.riv",
    stateMachines: 'State Machine 1',
    canvas: document.getElementById("bouton"),
    autoplay: true
});

document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector("#send-message")

    const input = form.querySelector('[name="message"]')

    form.addEventListener('submit', (e) => {
        e.preventDefault()
        fetch('http://localhost:8000/api/chatbot?q=' + input.value)
            .then(response => response.json())
            .then(data => {
                const conversation = document.querySelector('#conversation');
                conversation.innerHTML = data
            })
    })
})

document.addEventListener("DOMContentLoaded", () => {
    const inputField = document.getElementById("#send")
    inputField.addEventListener("keydown", function (e) {
        if (e.code === "Enter") {
            let input = inputField.value;
            inputField.value = "";
            output(input);
        }
    });
});