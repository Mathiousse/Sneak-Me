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
    let type
    const input = form.querySelector('[name="message"]')
    form.addEventListener('submit', (e) => {
        e.preventDefault()
        message = input.value
        input.value = ""
        addMessage('user', message)
        if (message.includes("produit")) {
            type = "produit"
        } else if (message.includes("acheter")) {
            type = "acheter"
        } else {
            type = "message"
        }
        fetch('http://localhost:8000/api/chatbot', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                message: message,
                type: type
            })
        })
            .then(response => response.json())
            .then(data => {
                if (data.type === "message") {
                    message = data.response.message
                    const reponses = message.split("---");
                    const reponseAleatoire = reponses[Math.floor(Math.random() * reponses.length)];
                    addMessage('bot', reponseAleatoire)
                }
                if (data.type === "produit") {
                    addMessage('bot', data.message, 'produit', data.response)
                }
                if (data.type === "catalogue") {
                    // code pour afficher le catalogue
                    productsData = data.response
                    addMessage('bot', data.message, 'catalogue', productsData)
                }
            })
    })
})

let carrouselCount = 0, splides = []
async function addMessage(role, message, type = "default", data) {
    message = message.split("|||")
    message.forEach(element => {
        let div = document.createElement('div')
        div.classList.add(role, 'message')
        let p = document.createElement('p')
        p.innerText = element
        div.appendChild(p)
        document.querySelector(".messages").appendChild(div)
        sleep(1000)
    });



    if (type === "catalogue") {
        sleep(10000)
        const slideItems = data.map(product => {
            return `
              <li class="splide__slide">
                <img src="${"http://localhost:8000/storage/" + product.image}" alt="${product.name}">
                <h3>${product.name}</h3>
                <h4>${product.price / 100} €</h4>
                <button onclick="writeMessage('Je souhaiterais en savoir plus sur le produit \\'${product.name}\\'', true)">En savoir +</button>
              </li>
            `;
        });



        // Insérer les éléments dans le carousel

        let splide = document.createElement('div')
        splide.classList.add("splide", "splide" + carrouselCount)
        let track = document.createElement('div')
        track.classList.add('splide__track')
        let list = document.createElement('ul')
        list.classList.add('splide__list', 'list' + carrouselCount)
        track.appendChild(list)
        splide.appendChild(track)

        document.querySelector(".messages").appendChild(splide)

        const carouselContainer = document.querySelector('.list' + carrouselCount);
        carouselContainer.innerHTML = slideItems.join('');

        // Initialiser le carousel avec Splide.js
        // new Splide('.splide' + carrouselCount, {
        //     perPage: 2,
        //     rewind: true,
        //     gap: 10,
        // }).mount();

        let elms = document.getElementsByClassName('splide');
        if (splides.length > 0) {
            splides.forEach(splide => {
                splide.destroy()
            });
        }

        for (let i = 0; i < elms.length; i++) {
            let splide = new Splide(elms[i], {
                perPage: 2,
                rewind: true,
                gap: 10,
            }).mount();
            splides.push(splide)
        }
        carrouselCount += 1
    } else if (type === "produit") {
        const productHTML = () => {
            return `
            <div class="one-product">
                <div class="left-container">
                    <img src="${"http://localhost:8000/storage/" + data.image}" alt="">
                </div>
                <div class="right-container">
                    <h3>${data.name}</h3>
                    <p>${data.description}</p>
                    <div class="price">
                        <h4>Prix: ${data.price / 100} + "€"</h4>
                        <button onclick="writeMessage('Je souhaiterais acheter la paire \\'${data.name}\\'', true)">Acheter</button>
                    </div>
                </div>
            </div>
            `
        }
        messagesDiv = document.querySelector(".messages")
        // insert the productHTML string as the last child of messagesDiv
        messagesDiv.insertAdjacentHTML('beforeend', productHTML())
    }
    document.querySelector("textarea").value = ""
    messagesDiv = document.querySelector(".messages")
    messagesDiv.scrollTo(0, messagesDiv.scrollHeight, { behavior: "smooth", },);
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
}


// Récupérer les données des produits chaussures (par exemple, à partir d'une source de données)
const products = [
    {
        id: 1,
        name: "Chaussure 1",
        image: "./images/chaussure3.svg",
        price: 49.99,
    },
    {
        id: 2,
        name: "Chaussure 2",
        image: "./images/chaussure1_1.svg",
        price: 59.99,
    },
    {
        id: 3,
        name: "Chaussure 3",
        image: "./images/chaussure3.svg",
        price: 49.99,
    },
    {
        id: 4,
        name: "Chaussure 4",
        image: "./images/chaussure1_1.svg",
        price: 49.99,
    },
    {
        id: 5,
        name: "Chaussure 5",
        image: "./images/chaussure3.svg",
        price: 49.99,
    },
];


