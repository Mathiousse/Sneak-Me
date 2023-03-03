document.querySelector(".opener").addEventListener(('click'), (e) => {
    e.target.previousElementSibling.classList.toggle("closed")
    e.target.classList.toggle("chat-closed")
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

new rive.Rive({
    src: "https://cdn.rive.app/animations/vehicles.riv",
    // Or the path to a local Rive asset
    // src: './example.riv',
    canvas: document.getElementById("canvas"),
    autoplay: true
});

document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector("#send-message")

    const input = form.querySelector('[name="message"]')

    form.addEventListener('submit', (e) => {
        e.preventDefault()
        fetch('http://localhost:8000/api/products/search?q=' + input.value)
            .then(response => response.json())
            .then(data => {
                const conversation = document.querySelector('#conversation');
                conversation.innerHTML = ""
                data.forEach(product => {
                    conversation.innerHTML += product.name + '<br>'
                });
            })
    })
})



