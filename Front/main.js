// Variables utiles partout
const chatbotTextarea = document.querySelector("#reponse")
const chatbotSubmitButton = document.querySelector("#send")

// Ajouter la possibilité de `sleep([])` pour mettre en pause
function sleep(ms) {
    return new Promise((resolve) => setTimeout(resolve, ms));
}


document.querySelector(".opener").addEventListener(('click'), (e) => {
    const button = e.target.parentElement
    button.classList.toggle("chat-closed")
    document.querySelectorAll(".chatbot-container").forEach(container => {
        container.classList.toggle("button-opened")
    });
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
                if (data.type === "message") {
                    data = data.message
                    const reponses = data.split("---");
                    const reponseAleatoire = reponses[Math.floor(Math.random() * reponses.length)];
                    addMessage('bot', reponseAleatoire)
                }
                if (data.type === "produit") {
                    // code pour afficher un produit
                    console.log("produit")
                }
            })
        input.value = ""
    })



})


function addMessage(role, message) {
    message = message.split("|||")
    message.forEach(element => {
        let div = document.createElement('div')
        div.classList.add(role, 'message')
        let p = document.createElement('p')
        p.innerText = element
        div.appendChild(p)
        document.querySelector(".messages").appendChild(div)
    });
    document.querySelector("textarea").value = ""
    document.querySelector(".messages").scrollTo(0, document.body.scrollHeight);
}




function showUser() {
    let button1 = document.createElement("button");
    let button2 = document.createElement("button");
    let login = document.getElementById("login");
    let register = document.getElementById("register");
    let chatbot = document.getElementById("chatbot");
    let messages = document.querySelector(".messages");

    button1.innerHTML = "Se connecter";
    button2.innerHTML = "S'inscrire";

    let conteneur = document.createElement("div");
    conteneur.classList.add("button-user")
    conteneur.appendChild(button1);
    conteneur.appendChild(button2);
    messages.appendChild(conteneur)

    button1.classList.add("button-login");
    button2.classList.add("button-register");

    button1.addEventListener("click", function () {
        afficherLogin()
    });

    button2.addEventListener("click", function () {
        afficherRegister()
    });
}

function afficherLogin() {
    login.parentElement.classList.add("main")
    register.parentElement.classList.remove("main")
    chatbot.parentElement.classList.remove("main")
}

function afficherRegister() {
    login.parentElement.classList.remove("main")
    register.parentElement.classList.add("main")
    chatbot.parentElement.classList.remove("main")
}

function afficherChatbot() {
    login.parentElement.classList.remove("main")
    register.parentElement.classList.remove("main")
    chatbot.parentElement.classList.add("main")
}

async function boutonCompte() {
    await writeMessage('Je voudrais accéder à mon compte', true);
    const intervalId = setInterval(() => {
        showUser();
        clearInterval(intervalId);
    }, 200);
}

async function boutonSettings() {
    await writeMessage('Je souhaite contacter le support', true);
    const intervalId = setInterval(() => {
        clearInterval(intervalId);
    }, 200);
}

async function boutonPanier() {
    await writeMessage('Je souhaite consulter mon panier', true);
    const intervalId = setInterval(() => {
        clearInterval(intervalId);
    }, 200);
}

async function boutonCatalogue() {
    await writeMessage('Je voudrais accéder au catalogue', true);
    const intervalId = setInterval(() => {
        clearInterval(intervalId);
    }, 200);
}

async function boutonCommande() {
    await writeMessage("Je voudrais voir l'historique de mes commandes", true);
    const intervalId = setInterval(() => {
        clearInterval(intervalId);
    }, 200);
}

async function writeMessage(message, doISendIt) {
    let i = 0;
    chatbotTextarea.value = ""
    await new Promise((resolve) => {
        const intervalId = setInterval(() => {
            chatbotTextarea.value += message.charAt(i);
            i++;
            if (i > message.length) {
                clearInterval(intervalId);
                resolve();
            }
        }, Math.floor(Math.random() * 50) + 20);
    });
    if (doISendIt) {
        chatbotSubmitButton.click()
    }
    return null
}